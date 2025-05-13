<?php

namespace App\Http\Controllers;

use App\Models\Stone;
use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Models\ProductTransaction;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\StoreCheckBookingRequest;
use App\Http\Requests\StoreCustomerDataRequest;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function saveOrder(Request $request, Stone $stone)
    {
        // proses penyimpanan ke session
        // $validated = $request->validated(['stone_id']);

        // $validated['stone_id'] = $stone->id;
        $validated = $request->validate([
            'stone_id' => ['required']
        ]);

        $this->orderService->beginOrder($validated);

        return redirect()->route('front.booking', $stone->slug);
    }

    public function checkout()
    {
        $data = $this->orderService->getOrderDetails();
        // dd($data);
        return view('order.order', $data);
    }

    public function customerData()
    {
        $data = $this->orderService->getOrderDetails();

        return view('order.customer_data', $data);
    }

    public function saveCustomerData(StoreCustomerDataRequest $request)
    {
        $validated = $request->validated();
        $this->orderService->updateCustomerData($validated);

        return redirect()->route('front.payment');
    }

    public function payment()
    {
        $data = $this->orderService->getOrderDetails();
        // dd($data);
        return view('order.payment', $data);
    }

    public function paymentConfirm(StorePaymentRequest $request)
    {
        $validated = $request->validated();

        $productTransactionId = $this->orderService->paymentConfirm($validated);

        if ($productTransactionId) {
            return redirect()->route('order.finished', $productTransactionId);
        }

        return redirect()->route('front.index')->withErrors(['error' => 'Payment failed. Please try again.']);
    }

    public function orderFinished(ProductTransaction $productTransaction)
    {
        return view('order.finished', compact('productTransaction'));
    }

    public function checkOrder()
    {
        return view('order.tracking');
    }

    public function checkOrderDetails(StoreCheckBookingRequest $request)
    {
        $validated = $request->validated();

        $orderDetails = $this->orderService->getMyOrderDetails($validated);

        if ($orderDetails) {
            return view('order.tracking-details', compact('orderDetails'));
        }

        return redirect()->route('order.tracking')->withErrors(['error' => 'Transaction not found!']);
    }
}
