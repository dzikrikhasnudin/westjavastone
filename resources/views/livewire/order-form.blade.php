<div>
    <form wire:submit.prevent='submit' class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <ol
            class="items-center flex mx-auto w-full max-w-2xl text-center text-sm font-medium text-gray-500 dark:text-gray-400 sm:text-base">

            <li
                class="after:border-1 flex items-center text-sky-700 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 dark:text-sky-500 dark:after:border-gray-700 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10">
                <span
                    class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                    <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Checkout
                </span>
            </li>

            <li class="flex shrink-0 items-center">
                <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Order summary
            </li>
        </ol>

        <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
            <div class="min-w-0 flex-1 space-y-8">
                <div class="rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <img src="{{ Storage::url($stone->thumbnail) }}" alt="{{ $stone->name }}"
                            class="w-24 h-24 rounded object-cover mr-4">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $stone->name }}</h2>
                            <p class="text-base text-sky-500">{{ $stone->category->name }}</p>
                            <p class="text-base text-gray-500 dark:text-gray-400">{{ $stone->weight }} kg</p>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Details</h2>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="your_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Your name<span class="text-red-500">*</span> </label>
                            <input wire:model='name' type="text" id="your_name"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-sky-500 focus:ring-sky-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-sky-500 dark:focus:ring-sky-500"
                                placeholder="John Doe" required />
                            @error('name') <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Your email<span class="text-red-500">*</span> </label>
                            <input wire:model='email' type="email" id="email"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-sky-500 focus:ring-sky-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-sky-500 dark:focus:ring-sky-500"
                                placeholder="name@yourmail.com" required />
                            @error('email') <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="mb-2 flex items-center gap-2">
                                <label for="country" class="block text-sm font-medium text-gray-900 dark:text-white">
                                    Country<span class="text-red-500">*</span> </label>
                            </div>
                            <input wire:model='country' type="text" id="country"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-sky-500 focus:ring-sky-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-sky-500 dark:focus:ring-sky-500"
                                placeholder="United States, Spain, Germany" required />
                            @error('country') <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="mb-2 flex items-center gap-2">
                                <label for="city" class="block text-sm font-medium text-gray-900 dark:text-white">
                                    City<span class="text-red-500">*</span> </label>
                            </div>
                            <input wire:model='city' type="text" id="city"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-sky-500 focus:ring-sky-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-sky-500 dark:focus:ring-sky-500"
                                placeholder="San Fransisco, California" required />
                            @error('city') <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Phone Number<span class="text-red-500">*</span> </label>
                            <div class="flex items-center">
                                <div class="relative w-full">
                                    <input wire:model='phone' type="text" id="phone"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-sky-500 focus:ring-sky-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-sky-500 dark:focus:ring-sky-500"
                                        placeholder="+1 234-567-8910" required />
                                    @error('phone')
                                    <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message}}</p>
                                    @enderror

                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="postcode" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Postal Code<span class="text-red-500">*</span> </label>
                            <input wire:model='postcode' type="text" id="postcode"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-sky-500 focus:ring-sky-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-sky-500 dark:focus:ring-sky-500"
                                placeholder="6497" required />
                            @error('postcode')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message}}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="address"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Address<span
                                    class="text-red-500">*</span> </label>
                            <textarea wire:model='address' type="text" id="address"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-sky-500 focus:ring-sky-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-sky-500 dark:focus:ring-sky-500"
                                placeholder="Type your full address" required></textarea>
                            @error('address')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <label for="voucher" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Enter a
                        gift card, voucher or promotional code </label>
                    <div class="flex items-center gap-4">
                        <input type="text" id="voucher" wire:model.live.debounce.500ms='promoCode'
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-sky-500 focus:ring-sky-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-sky-500 dark:focus:ring-sky-500"
                            placeholder="" />

                    </div>
                    @if (session()->has('message'))
                    <span class="font-semibold text-sm leading-[21px] text-[#01A625]">Great! Your promo code is valid
                        and has been applied.
                    </span>
                    @endif
                    @if (session()->has('error'))
                    <span class="font-semibold text-sm leading-[21px] text-[#FF1943]">Sorry, this promo code does not
                        exist or is no longer active.</span>
                    @endif
                </div>
            </div>

            <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
                <div class="flow-root">
                    <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                        <dl class="flex items-center justify-between gap-4 py-3">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-white">${{
                                number_format($subTotalAmount, 0,',','.') }}</dd>
                        </dl>

                        <dl class="flex items-center justify-between gap-4 py-3">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Discount</dt>
                            <dd class="text-base font-medium text-red-500">- ${{ number_format($discount, 0,',','.')
                                }}</dd>
                        </dl>
                        <dl class="flex items-center justify-between gap-4 py-3">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-white">${{
                                number_format($totalTax, 0,',','.') }}</dd>
                        </dl>

                        <dl class="flex items-center justify-between gap-4 py-3">
                            <dt class="text-base font-bold text-gray-900 dark:text-white">Grand Total</dt>
                            <dd class="text-base font-bold text-gray-900 dark:text-white">${{
                                number_format($grandTotalAmount, 0,',','.') }}</dd>
                        </dl>
                    </div>
                </div>

                <div class="space-y-3">
                    <button type="submit"
                        class="flex w-full items-center justify-center rounded-lg bg-sky-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-sky-800 focus:outline-none focus:ring-4  focus:ring-sky-300 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Proceed
                        to Payment</button>

                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Shop with ease — every order comes
                        with <span class="font-semibold text-sky-600">FREE SHIPPING</span> , no minimum purchase
                        required!</p>
                </div>
            </div>
        </div>
    </form>
</div>
