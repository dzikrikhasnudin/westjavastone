<x-app-layout>
        <x-slot:title>Payment - West Java Stone</x-slot:title>
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <form action="{{ route('front.payment_confirm') }}" method="POST" enctype="multipart/form-data" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            @csrf
            <div class="mx-auto">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Payment and Order summary
                </h2>

                <div class="mt-6 space-y-4 border-b border-t border-gray-200 py-8 dark:border-gray-700 sm:mt-8">
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Billing & Delivery information</h4>

                    <dl>
                        <dt class="text-base font-medium text-gray-900 dark:text-white">Individual</dt>
                        <dd class="mt-1 text-base font-normal text-gray-500 dark:text-gray-400">
                            {{ $orderData['name'].' - '.$orderData['phone'] . ', '.$orderData['city'].',
                            '.$orderData['country'].', '.$orderData['post_code'].', '.$orderData['address'] }}
                        </dd>
                    </dl>

                    <a href="{{ route('front.booking') }}"
                        class="text-base font-medium text-sky-700 hover:underline dark:text-sky-500">Edit</a>
                </div>

                <div class="">
                    <div class="relative overflow-x-auto border-b border-gray-200 dark:border-gray-800">
                        <table class="w-full text-left font-medium text-gray-900 dark:text-white md:table-fixed">
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                                <tr>
                                    <td class="whitespace-nowrap py-4 md:w-[384px]">
                                        <div class="flex items-center gap-4">
                                            <a href="#" class="flex items-center aspect-square w-10 h-10 shrink-0">
                                                <img class="h-auto w-full max-h-full rounded-sm"
                                                    src="{{ Storage::url($stone->thumbnail) }}"
                                                    alt="{{ $stone->name }}" />

                                            </a>
                                            <a href="#" class="hover:underline">{{ $stone->name }}</a>
                                        </div>
                                    </td>

                                    <td class="p-4 text-base font-normal text-gray-900 dark:text-white">x1</td>

                                    <td class="p-4 text-right text-base font-bold text-gray-900 dark:text-white">${{
                                        number_format($stone->price, 0,',','.') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 space-y-6">
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</h4>

                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-gray-500 dark:text-gray-400">Original Price</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">${{
                                        number_format($orderData['sub_total_amount'], 0,',','.') }}</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-gray-500 dark:text-gray-400">Discount</dt>
                                    <dd class="text-base font-medium text-red-600">-${{
                                        number_format($orderData['total_discount_amount'], 0,',','.') }}</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-gray-500 dark:text-gray-400">Tax</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">${{
                                        number_format($orderData['total_tax'], 0,',','.') }}</dd>
                                </dl>
                            </div>

                            <dl
                                class="flex items-center justify-between gap-4 border-gray-200 py-2 dark:border-gray-700 border-y">
                                <dt class="text-lg font-bold text-gray-900 dark:text-white">Grand Total</dt>
                                <dd class="text-lg font-bold text-gray-900 dark:text-white">${{
                                    number_format($orderData['grand_total_amount'], 0,',','.') }}</dd>
                            </dl>
                        </div>
                        <div class="relative overflow-x-auto border-b border-gray-200 dark:border-gray-800">
                            <h4 class="text-xl font-semibold text-gray-900 dark:text-white">Payment</h4>

                            <div class="flex items-center gap-16">
                                <div class="max-w-md">
                                    <img class="w-24 h-auto" src="{{ asset('assets/images/logos/paypal.png') }}" alt="">
                                </div>
                                <div>
                                    <p class="text-md font-semibold text-gray-900 dark:text-white">westjavastone@gmail.com</p>
                                    <p class="text-sky-600">@westjavastone</p>
                                </div>
                            </div>
                        </div>
                        <div class="relative overflow-x-auto border-gray-200 dark:border-gray-800">
                            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Upload Proof of Transaction</h4>

                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Please upload a clear image of your payment receipt to help us verify your transaction. </label>
                            <input name="proof" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="proof" type="file">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Accepted file formats: JPG, JPEG, or PNG.</p>
                              @error('proof')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message}}</p>
                            @enderror
                        </div>

                        <div class="flex items-start sm:items-center">
                            <input id="terms-checkbox-2" type="checkbox" value=""
                                class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-sky-600 focus:ring-2 focus:ring-sky-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-sky-600"  />
                            <label for="terms-checkbox-2"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> I agree with the <a
                                    href="#" title=""
                                    class="text-sky-700 underline hover:no-underline dark:text-sky-500">Terms
                                    and Conditions</a> of use of the West Java Stone store </label>
                        </div>

                        <div class="gap-4 sm:flex sm:items-center">

                            <button type="submit"
                                class="mt-4 flex w-full items-center justify-center rounded-lg bg-sky-700  px-5 py-2.5 text-sm font-medium text-white hover:bg-sky-800 focus:outline-none focus:ring-4 focus:ring-sky-300  dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800 sm:mt-0">Send
                                the order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</x-app-layout>
