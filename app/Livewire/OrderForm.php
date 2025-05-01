<?php

namespace App\Livewire;

use App\Models\Stone;
use Livewire\Component;
use App\Services\OrderService;

class OrderForm extends Component
{
    public Stone $stone;
    public $orderData;
    public $subTotalAmount;
    public $promoCode = null;
    public $promoCodeId = null;
    public $quantity = 1;
    public $discount = 0;
    public $grandTotalAmount;
    public $totalDiscountAmount = 0;
    public $name;
    public $email;

    protected $orderService;

    public function boot(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function mount(Stone $stone, $orderData)
    {
        $this->stone = $stone;
        $this->orderData = $orderData;
        $this->subTotalAmount = $stone->price;
        $this->grandTotalAmount = $stone->price;
    }

    public function updatedQuantity()
    {
        $this->validateOnly('quantity', [
            'quantity' => 'required|integer|min:1|max:' . $this->stone->stock,
        ], [
            'quantity.max' => 'Stock tidak tersedia.'
        ]);
        $this->calculateTotal();
    }

    public function calculateTotal(): void
    {
        $this->subTotalAmount = $this->stone->price * $this->quantity;
        $this->grandTotalAmount = $this->subTotalAmount - $this->discount;
    }

    public function incrementQuantity()
    {
        if($this->quantity < $this->stone->stock) {
            $this->quantity++;
            $this->calculateTotal();
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            $this->calculateTotal();
        }
    }

    public function updatedPromoCode()
    {
        $this->applyPromoCode();
    }

    public function applyPromoCode()
    {
        if(!$this->promoCode) {
            $this->resetDiscount();
            return;
        }

        $result = $this->orderService->applyPromoCode($this->promoCode, $this->subTotalAmount);

        // dd($result);

        if (isset($result['error'])) {
            session()->flash('error', $result['error']);
            $this->resetDiscount();
        } else {
            session()->flash('message', 'Kode promo tersedia, yay!');
            $this->discount = $result['discount'];
            $this->calculateTotal();
            $this->promoCodeId = $result['promoCodeId'];
            $this->totalDiscountAmount = $result['discount'];
        }
    }

    protected function resetDiscount()
    {
        $this->discount = 0;
        $this->calculateTotal();
        $this->promoCodeId = null;
        $this->totalDiscountAmount = 0;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'quantity' => 'required|integer|min:1|max:' .  $this->stone->stock,
        ];
    }

    protected function gatherBookingData(array $validateData): array
    {
        return [
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'grand_total_amount' => $this->grandTotalAmount,
            'sub_total_amount' => $this->subTotalAmount,
            'total_discount_amount' => $this->totalDiscountAmount,
            'discount' => $this->discount,
            'promo_code' => $this->promoCode,
            'promo_code_id' => $this->promoCodeId,
            'quantity' => $this->quantity
        ];
    }

    public function submit()
    {
        $validateData = $this->validate();

        $bookingData = $this->gatherBookingData($validateData);

        $this->orderService->updateCustomerData($bookingData);

        return redirect()->route('front.customer_data');
    }

    public function render()
    {
        return view('livewire.order-form');
    }
}
