<x-app-layout>
    <div class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 flex items-center justify-center py-10 px-4 w-full">
        <form  method="POST" action="{{ route('order.tracking_details') }}" class="w-full lg:w-1/3">
        @csrf
        <div class="bg-white dark:bg-gray-800 w-full rounded-3xl shadow-xl text-center p-6 space-y-6">

            <!-- Title -->
            <h2 class="text-xl font-bold">Check My Order</h2>

            <!-- Booking ID Input -->
            <div class="text-left space-y-1">
                <label for="booking_trx" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order ID</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400 dark:text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h13M9 21h6a2 2 0 002-2v-5H5v5a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <input name="booking_trx_id" type="text" id="booking_trx" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="TRX0001">
                </div>
            </div>

                <!-- Email Input -->
                <div class="text-left space-y-1">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400 dark:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4H1m3 4H1m3 4H1m3 4H1m6.071.286a3.429 3.429 0 1 1 6.858 0M4 1h12a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Zm9 6.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                            </svg>
                        </div>
                        <input name="email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="What's your email?">
                    </div>
                </div>

                <!-- Button -->
                <button class="w-full bg-sky-600 hover:bg-sky-700 text-white font-semibold py-2 rounded-full transition duration-200">
                Find Booking
                </button>

            </div>
        </form>
    </div>


</x-app-layout>
