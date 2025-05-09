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
    public $totalTax;
    public $grandTotalAmount;
    public $totalDiscountAmount = 0;
    public $name;
    public $email;
    public $phone;
    public $country;
    public $city;
    public $postcode;
    public $address;

    protected $orderService;

    public function boot(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function mount(Stone $stone, $orderData)
    {
        $this->totalTax = $orderData['total_tax'];
        $this->stone = $stone;
        $this->orderData = $orderData;
        $this->subTotalAmount = $stone->price;
        $this->grandTotalAmount = $stone->price + $this->totalTax;
    }

    public function calculateTotal(): void
    {
        $this->subTotalAmount = $this->stone->price * $this->quantity;
        $this->grandTotalAmount = $this->subTotalAmount - $this->discount + $this->totalTax;
    }

    public function updatedPromoCode()
    {
        $this->applyPromoCode();
    }

    public function applyPromoCode()
    {
        if (!$this->promoCode) {
            $this->resetDiscount();
            return;
        }

        $result = $this->orderService->applyPromoCode($this->promoCode, $this->subTotalAmount);

        // dd($result);

        if (isset($result['error'])) {
            session()->flash('error', $result['error']);
            $this->resetDiscount();
        } else {
            session()->flash('message', 'Promo code applied successfully!!');
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
            'phone' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string']
        ];
    }

    protected function gatherBookingData(array $validateData): array
    {
        return [
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'phone' => $validateData['phone'],
            'country' => $validateData['country'],
            'city' => $validateData['city'],
            'post_code' => $validateData['postcode'],
            'address' => $validateData['address'],

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

        return redirect()->route('front.payment');
    }

    public function render()
    {
        return view('livewire.order-form');
    }
}
