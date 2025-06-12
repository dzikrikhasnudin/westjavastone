<x-app-layout>
    <x-slot:title>My Order Details - West Java Stone</x-slot:title>
    <div class="flex justify-center mt-10">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Order Details</h2>
    </div>
    <div class="lg:max-w-4xl mx-auto py-6 px-4 text-base">
        <div id="accordion-open" data-accordion="open">
            <h2 id="accordion-open-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-open-body-1" aria-expanded="true"
                    aria-controls="accordion-open-body-1">
                    <span class="flex items-center font-semibold text-lg">Your Order</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-open-body-1" class="hidden p-6" aria-labelledby="accordion-open-heading-1">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('media/' . $orderDetails->stone->thumbnail) }}"
                        alt="{{ $orderDetails->stone->name }}" class="w-20 h-16 object-cover rounded" />
                    <h3 class="font-semibold text-lg text-gray-800 dark:text-white">{{ $orderDetails->stone->name }}
                    </h3>
                </div>

                <div class="border-t border-gray-300 mt-4 pt-4 space-y-2 text-sm text-gray-700">
                    <div class="flex justify-between text-base">
                        <span class="dark:text-gray-50">Category</span>
                        <span class="text-gray-700 font-semibold dark:text-white">{{
                            $orderDetails->stone->category->name }}</span>
                    </div>
                    <div class="flex justify-between text-base">
                        <span class="dark:text-gray-50">Price</span>
                        <span class="text-gray-700 font-semibold dark:text-white ">${{
                            number_format($orderDetails->stone->price,
                            0,',','.') }}</span>
                    </div>
                    <div class="flex justify-between text-base">
                        <span class="dark:text-gray-50">Weight</span>
                        <span class="text-gray-700 font-semibold dark:text-white">{{
                            number_format($orderDetails->stone->weight, 0,',','.') . ' killograms' }}</span>
                    </div>
                    <div class="flex justify-between text-base text-gray-700">
                        <span class="dark:text-gray-50">Dimensions</span>
                        <span class="text-gray-700 font-semibold dark:text-white">{{ $orderDetails->stone->dimensions ??
                            '-' }}</span>
                    </div>
                    <div class="flex justify-between text-green-600 dark:text-green-400 font-bold text-lg pt-2">
                        <span>Grand Total</span>
                        <span>${{ number_format($orderDetails->grand_total_amount, 0,',','.') }}</span>
                    </div>
                    <div class="flex justify-between pt-1 text-base text-gray-700">
                        <span class="text-gray-700 dark:text-gray-50">Checkout At</span>
                        <span class="font-semibold dark:text-white">{{ $orderDetails->created_at->format('d F Y h:i:s')
                            }}</span>
                    </div>
                    <div class="flex justify-between items-center pt-1 text-base">
                        <span class="dark:text-white">Status</span>
                        @if ($orderDetails->is_paid)
                        <span
                            class="bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full">SUCCESS</span>
                        @else
                        <span
                            class="bg-yellow-500 text-white text-xs font-semibold px-3 py-1 rounded-full">PENDING</span>
                        @endif
                    </div>
                </div>
            </div>
            <h2 id="accordion-open-heading-2">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-open-body-2" aria-expanded="false"
                    aria-controls="accordion-open-body-2">
                    <span class="flex items-center font-semibold text-lg">Customer Data</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-open-body-2" class="hidden p-6" aria-labelledby="accordion-open-heading-2">
                <div class="space-y-4 text-sm text-gray-800">
                    <div class="flex items-start space-x-3 text-base ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-bag-check w-5 h-5 mt-0.5 text-gray-500" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                            <path
                                d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                        </svg>
                        <div>
                            <div class=" dark:text-gray-50">Booking ID</div>
                            <div class="text-gray-800 font-bold dark:text-white">{{ $orderDetails->booking_trx_id }}
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3 text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person w-5 h-5 mt-0.5 text-gray-500" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                        <div>
                            <div class=" dark:text-gray-50">Name</div>
                            <div class="text-gray-700 font-bold dark:text-white">{{ $orderDetails->name }}</div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3 text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-telephone w-5 h-5 mt-0.5 text-gray-500" viewBox="0 0 16 16">
                            <path
                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                        </svg>
                        <div>
                            <div class=" dark:text-gray-50">Phone No.</div>
                            <div class="text-gray-700 font-bold dark:text-white">{{ $orderDetails->phone }}</div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3 text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-envelope w-5 h-5 mt-0.5 text-gray-500" viewBox="0 0 16 16">
                            <path
                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                        </svg>
                        <div>
                            <div class=" dark:text-gray-50">Email</div>
                            <div class="text-gray-700 font-bold dark:text-white">{{ $orderDetails->email }}</div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3 text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-house-door w-5 h-5 mt-0.5 text-gray-500" viewBox="0 0 16 16">
                            <path
                                d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                        </svg>
                        <div>
                            <div class=" dark:text-gray-50">Delivery to</div>
                            <div class="text-gray-700 font-bold dark:text-white">{{ $orderDetails->address . ', ' .
                                $orderDetails->city . ', ' . $orderDetails->country . ', ' . $orderDetails->post_code}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('stye')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    @endpush

</x-app-layout>