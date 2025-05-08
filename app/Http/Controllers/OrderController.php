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

    public function booking()
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

        if($productTransactionId) {
            return redirect()->route('front.order_finished', $productTransactionId);
        }

        return redirect()->route('front.index')->withErrors(['error' => 'Payment failed. Please try again.']);
    }

    public function orderFinished(ProductTransaction $productTransaction)
    {
        return view('order.order_finished', compact('productTransaction'));
    }

    public function checkBooking(){
        return view('order.my_order');
    }

    public function checkBookingDetails(StoreCheckBookingRequest $request){
        $validated = $request->validated();

        $orderDetails = $this->orderService->getMyOrderDetails($validated);

        if ($orderDetails) {
            return view('order.my_order_details', compact('orderDetails'));
        }

        return redirect()->route('front.check_booking')->withErrors(['error' => 'Transaction not found!']);
    }
}
