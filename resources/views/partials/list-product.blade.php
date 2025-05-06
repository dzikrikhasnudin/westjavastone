<section class="bg-sky-50 py-8 antialiased md:py-12">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <!-- Heading & Filters -->
        <div class="mb-4 items-center justify-between space-y-4 flex sm:space-y-0 md:mb-8">
            <div>
                <h2 class="mt-3 text-xl font-bold text-sky-900 dark:text-white sm:text-2xl">Explore Our Feature
                </h2>
            </div>
            <div
                class="inline-flex items-center text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-sky-900">
                <a href="{{ route('product.index') }}" class="dark:text-gray-50">View More</a>
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($data['popularStones'] as $stone)
            <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="w-full">
                    <a href="#">
                        <img class="mx-auto w-full aspect-square rounded object-cover"
                            src="{{ Storage::url($stone->thumbnail)}}" alt="" />
                    </a>
                </div>
                <div class="pt-6">
                    <div class="mb-4 flex items-center justify-between gap-4">
                        <x-status-badge :status="$stone->status"></x-status-badge>
                        {{-- <span
                            class="me-2 rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300 capitalize">
                            {{ $stone->status }} </span> --}}

                    </div>

                    <a href="#"
                        class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">{{
                        $stone->name }}</a>

                    <ul class="mt-2 flex items-center gap-4">
                        <li class="flex items-center gap-2">

                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Category: <a href="#"
                                    class="hover:underline hover:text-sky-700 dark:hover:text-sky-400">{{
                                    $stone->category->name }}</a></p>
                        </li>
                    </ul>

                    <div class="mt-4 flex items-center justify-between gap-4">
                        <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">${{
                            number_format($stone->price, 0,',','.') }}</p>

                        <button type="button"
                            class="inline-flex items-center rounded-lg bg-sky-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-sky-800 focus:outline-none focus:ring-4  focus:ring-sky-300 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                            <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                            </svg>
                            BUY NOW
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>