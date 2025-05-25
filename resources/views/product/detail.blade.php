<x-app-layout>
    <x-slot:title>{{ $stone->name . ' - West Java Stone' }}</x-slot:title>
    <x-slot:description>{{ $stone->name }}</x-slot:description>
    <x-slot:metaimage>{{ Storage::url($stone->thumbnail) }}</x-slot:metaimage>
    <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10">

        <!-- Left: Image Gallery -->
        <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
            <div>
                <img id="main-thumbnail"
                    class="w-full aspect-square object-cover object-center rounded shrink-0 overflow-hidden"
                    src="{{ Storage::url($stone->thumbnail) }}" alt="" />
            </div>
            <div class="swiper w-full overflow-hidden mt-4">
                <div class="swiper-wrapper">
                    @foreach ($stone->photos as $itemPhoto)
                    <div class="swiper-slide !w-fit py-[2px]">
                        <label
                            class="thumbnail-selector flex flex-col shrink-0 w-20 h-20 p-2 rounded bg-white dark:bg-gray-800 transition-all duration-300 hover:ring-2 hover:ring-sky-400 has-[:checked]:ring-2 has-[:checked]:ring-sky-400">
                            <input type="radio" name="image" class="hidden" checked>
                            <img src="{{ Storage::url($itemPhoto->photo) }}" class="w-full h-full object-cover"
                                alt="thumbnail">
                        </label>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

        <!-- Right: Product Info -->
        <div class="sm:mt-8 lg:mt-0">
            <div class="mb-3"> <span
                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300 capitalize">{{
                    $stone->status }}</span></div>
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                {{ $stone->name }}
            </h1>
            <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
                    ${{ number_format($stone->price, 0,',','.') }}
                </p>
            </div>
            <hr class="my-6 md:my-4 border-gray-200 dark:border-gray-800" />
            <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Details</h3>
            <div class="grid grid-cols-3 mb-2">
                <p class="text-gray-600 dark:text-gray-400">Category</p>
                <a href="{{ route('product.category', $stone->category->slug) }}"
                    class="col-span-2 text-sky-800 dark:text-sky-400 font-semibold cursor-pointer hover:underline">{{
                    $stone->category->name }}</a>
            </div>
            <div class="grid grid-cols-3 mb-2">
                <p class="text-gray-600 dark:text-gray-400">Weight</p>
                <p class="col-span-2 text-gray-800 dark:text-white ">{{
                    number_format($stone->weight, 0,',','.') . ' killograms' }}</p>
            </div>
            <div class="grid grid-cols-3 mb-2">
                <p class="text-gray-600 dark:text-gray-400">Dimensions</p>
                <p class="col-span-2 text-gray-800 dark:text-white ">{{ $stone->dimensions ?? '-' }}</p>
            </div>

            <hr class="my-6 md:my-4 border-gray-200 dark:border-gray-800" />

            <div class="text-gray-500 dark:text-gray-400">
                <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Description</h3>
                {!! $stone->description !!}
            </div>

            <hr class="my-6 md:my-4 border-gray-200 dark:border-gray-800" />

            <form action="{{ route('front.save_order', $stone->slug) }}" method="POST">
                @csrf
                <input type="hidden" name="stone_id" id="stone_id" value="{{ $stone->id }}">
                <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                    <button type="submit"
                        class="text-white mt-4 sm:mt-0 bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:ring-sky-300 font-semibold text-md rounded-lg px-5 py-2.5 dark:bg-sky-600 dark:hover:bg-sky-700 focus:outline-none dark:focus:ring-sky-800 flex items-center justify-center"
                        role="button">
                        <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                        </svg>
                        Checkout
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush

    @push('script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/details.js') }}"></script>
    @endpush
</x-app-layout>