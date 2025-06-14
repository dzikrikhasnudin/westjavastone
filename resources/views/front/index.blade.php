<x-app-layout>
    <x-slot:title>Homepage - West Java Stone</x-slot:title>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- CTA Section --}}
    <section class="bg-sky-50 dark:bg-gray-900">
        <div
            class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <img class="w-full hidden md:block" src="{{ asset('images/agate-hero.png') }}" alt="dashboard image">
            <div class="mt-4 md:mt-0">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-sky-900 dark:text-white">Own a Piece of
                    Nature’s Legacy.</h2>
                <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">Browse our collection and
                    experience the natural elegance of Garut’s finest petrified wood.</p>
                <a href="{{ route('product.index') }}"
                    class="inline-flex items-center text-white border  border-sky-700  bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-sky-900">
                    Get started
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="{{ route('order.tracking') }}"
                    class="ml-2 hidden lg:inline-flex items-center text-sky-700 border border-sky-700 bg-sky-50 hover:bg-gray-100 hover:font-semibold focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-sky-900">
                    Check My Order
                </a>
            </div>
        </div>
    </section>

    {{-- Content Section --}}
    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
            <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-sky-900 dark:text-white">From the City of
                    Diamonds, to the World</h2>
                <p class="mb-4">From the volcanic heart of Garut, we bring you rare petrified wood and agate — crafted
                    by nature, perfected by artisans. From polished slabs to raw treasures, our stones are handpicked to
                    meet the eyes of
                    collectors,
                    designers, and creators around the globe. We connect Earth’s rarest forms with those who truly
                    appreciate them.</p>
                <p class="font-semibold dark:text-gray-100">Authentic. Timeless. Truly Indonesian.</p>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-8">
                <img class="w-full rounded-lg" src="{{ asset('assets/images/stones/agate.jpg') }}"
                    alt="office content 1">
                <img class="mt-4 w-full lg:mt-10 rounded-lg"
                    src="{{ asset('assets/images/stones/stone collection.jpg') }}" alt="office content 2">
            </div>
        </div>
    </section>

    @include('partials.list-product')


    <section class="bg-sky-50 dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-10 lg:px-6">
            <h1 class="text-3xl font-bold mb-8 text-center text-sky-900 dark:text-white">Explore Our Stone Categories
            </h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Category Card -->
                @foreach ($data['categories'] as $category)
                @if ($category->stones->count() != 0)
                <div class="bg-white rounded-2xl  shadow hover:shadow-lg transition p-4 dark:bg-gray-800">
                    @if ($category->icon)
                    <img src="{{ asset('media/' . $category->icon) }}" alt="{{ $category->name }}"
                        class="w-full aspect-square object-cover rounded-xl mb-4">
                    @else
                    <img src="{{ asset('images/no-image-icon.png') }}" alt="{{ $category->name }}"
                        class="w-full aspect-square object-cover rounded-xl mb-4">
                    @endif
                    <div class="flex justify-between">
                        <h2 class="text-xl font-semibold mb-1 text-gray-900 dark:text-white">{{ $category->name }}</h2>
                        <a href="{{ route('product.category', $category->slug) }}"
                            class="text-sky-600 font-medium hover:underline dark:text-sky-400">View Products →</a>
                    </div>
                </div>
                @endif
                @endforeach

            </div>
        </div>
    </section>

    {{-- Blog Section --}}
    <section class="bg-sky-50 dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-sky-900 dark:text-white">From
                    Stone to Story</h2>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Insights, inspirations, and stories
                    from the heart of the City of Diamonds.</p>
            </div>
            <div class="grid gap-8 lg:grid-cols-2">
                @foreach ($articles as $article)
                <article
                    class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        <span
                            class="bg-sky-100 text-sky-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-sky-200 dark:text-sky-800">
                            <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                    clip-rule="evenodd"></path>
                                <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                            </svg>
                            Article
                        </span>

                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">{{
                            $article->title }}</a></h2>
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ $article->description }}</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <span class="text-sm dark:text-gray-50">{{ $article->created_at->diffForHumans() }}</span>
                        </div>
                        <a href="{{ route('page.article', $article->slug) }}"
                            class="inline-flex items-center font-medium text-sky-600 dark:text-sky-500 hover:underline">
                            Read more
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

</x-app-layout>