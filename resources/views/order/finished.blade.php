<x-app-layout>
<section class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 py-12 flex items-center justify-center px-4">
  <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg w-full max-w-md text-center p-6 space-y-6">

    <!-- Image -->
    <img src="{{ Storage::url($productTransaction->stone->thumbnail ) }}" alt="{{ $productTransaction->stone->name }}" class="w-auto h-32 mx-auto rounded-xl shadow-md">

    <!-- Title and description -->
    <h2 class="text-2xl font-bold">Your Order is on the Way!</h2>
    <p class="text-sm">
      Thank you for ordering from <strong>West Java Stone</strong>.<br>
      Please check your order status regularly for updates.
    </p>

    <!-- Transaction Code -->
    <div class="border-2 border-sky-400 dark:border-sky-800 rounded-lg px-4 py-2 flex items-center justify-center space-x-2">
      <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h13M9 21h6a2 2 0 002-2v-5H5v5a2 2 0 002 2z" />
      </svg>
      <span class="text-sm">Booking ID <strong>{{ $productTransaction->booking_trx_id }}</strong></span>
      <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd" />
      </svg>
    </div>

    <!-- Buttons -->
    <div class="space-y-3 text-center">
      <a href="{{ route('product.index') }}" class="inline-flex justify-center text-center w-full bg-sky-700 text-white font-semibold py-2 rounded-lg hover:bg-sky-600 transition duration-200">
        Order More
      </a>
      <a href="{{ route('order.tracking') }}" class="inline-flex justify-center text-center w-full bg-gray-900 dark:bg-white text-white dark:text-black font-semibold py-2 rounded-lg hover:opacity-90 transition duration-200">
        Track Order
      </a>
    </div>

  </div>
</section>
</x-app-layout>
