<x-app-layout>

   <div class="lg:max-w-4xl mx-auto py-10 px-4">
     <div id="accordion-open" data-accordion="open">
    <h2 id="accordion-open-heading-1">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-1" aria-expanded="true" aria-controls="accordion-open-body-1">
        <span class="flex items-center font-semibold text-lg">Your Order</span>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
        </svg>
        </button>
    </h2>
    <div id="accordion-open-body-1" class="hidden p-6" aria-labelledby="accordion-open-heading-1">
        <div class="flex items-center space-x-4">
            <img src="{{ Storage::url($orderDetails->stone->thumbnail) }}" alt="{{ $orderDetails->stone->name }}" class="w-20 h-16 object-cover rounded" />
            <h3 class="font-semibold text-gray-800">{{ $orderDetails->stone->name }}</h3>
        </div>

        <div class="border-t border-gray-300 mt-4 pt-4 space-y-2 text-sm text-gray-700">
            <div class="flex justify-between">
                <span>Category</span>
                <span class="font-medium">{{ $orderDetails->stone->category->name }}</span>
            </div>
            <div class="flex justify-between">
                <span>Price</span>
                <span class="font-medium">${{ number_format($orderDetails->stone->price, 0,',','.') }}</span>
            </div>
            <div class="flex justify-between">
                <span>Weight</span>
                <span class="font-medium">{{
                    number_format($orderDetails->stone->weight, 0,',','.') . ' killograms' }}</span>
            </div>
            <div class="flex justify-between">
                <span>Dimensions</span>
                <span class="font-medium">{{ $orderDetails->stone->dimensions ?? '-' }}</span>
            </div>
            <div class="flex justify-between text-green-600 font-bold text-lg pt-2">
                <span>Grand Total</span>
                <span>${{ number_format($orderDetails->grand_total_amount, 0,',','.') }}</span>
            </div>
            <div class="flex justify-between pt-1">
                <span>Checkout At</span>
                <span class="font-medium">{{ $orderDetails->created_at->format('d F Y h:i:s') }}</span>
            </div>
            <div class="flex justify-between items-center pt-1">
                <span>Status</span>
                @if ($orderDetails->is_paid)
                <span class="bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full">SUCCESS</span>
                @else
                <span class="bg-yellow-500 text-white text-xs font-semibold px-3 py-1 rounded-full">PENDING</span>
                @endif
            </div>
        </div>
    </div>
    <h2 id="accordion-open-heading-2">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-2" aria-expanded="false" aria-controls="accordion-open-body-2">
        <span class="flex items-center text-lg font-semibold text-lg">Customer Data</span>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
        </svg>
        </button>
    </h2>
    <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-heading-2">
        <div class="space-y-4 text-sm text-gray-800">
            <div class="flex items-start space-x-3">
                <svg class="w-5 h-5 mt-0.5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 3h18l-1 13H4L3 3zm0 0L4 17h16M5 21h14"></path></svg>
                <div>
                <div class="font-medium">Booking ID</div>
                <div class="font-bold">{{ $orderDetails->booking_trx_id }}</div>
                </div>
            </div>

      <div class="flex items-start space-x-3">
        <svg class="w-5 h-5 mt-0.5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
             d="M5.121 17.804A4 4 0 017 16h10a4 4 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
        <div>
          <div class="font-medium">Name</div>
          <div class="font-bold">{{ $orderDetails->name }}</div>
        </div>
      </div>

      <div class="flex items-start space-x-3">
        <svg class="w-5 h-5 mt-0.5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
             d="M3 5h2l.4 2M7 10h10l1-3H6.4M7 10l1 5h8l1-5M9 21h6"></path></svg>
        <div>
          <div class="font-medium">Phone No.</div>
          <div class="font-bold">{{ $orderDetails->phone }}</div>
        </div>
      </div>

      <div class="flex items-start space-x-3">
        <svg class="w-5 h-5 mt-0.5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
             d="M16 12H8m0 0l4-4m-4 4l4 4"></path></svg>
        <div>
          <div class="font-medium">Email</div>
          <div class="font-bold text-sm">{{ $orderDetails->email }}</div>
        </div>
      </div>

      <div class="flex items-start space-x-3">
        <svg class="w-5 h-5 mt-0.5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
             d="M3 10l9-7 9 7v10a2 2 0 01-2 2H5a2 2 0 01-2-2V10z" /></svg>
        <div>
          <div class="font-medium">Delivery to</div>
          <div class="font-bold text-sm">{{ $orderDetails->address . ', ' . $orderDetails->city . ', ' . ', ' .  $orderDetails->country . ', ' . $orderDetails->post_code}}</div>
        </div>
      </div>
    </div>
    </div>
   </div>

</x-app-layout>
