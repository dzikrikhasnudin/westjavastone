<x-app-layout>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-10 lg:px-6">
            <h1 class="text-3xl font-bold mb-8 text-center text-gray-800 dark:text-white">Explore Our Stone Categories
            </h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Category Card -->
                @foreach ($data['categories']->take(3) as $category)
                <div class="bg-white rounded-2xl  shadow hover:shadow-lg transition p-4 dark:bg-gray-800">
                    <!--<img src="{{ Storage::url($category->icon) }}" alt="{{ $category->name }}"-->
                    <!--    class="w-full h-48 object-cover rounded-xl mb-4">-->
                    <img src="{{ asset('media/' . $category->icon) }}" alt="{{ $category->name }}"
                        class="w-full h-48 object-cover rounded-xl mb-4">
                    <div class="flex justify-between">
                        <h2 class="text-xl font-semibold mb-1 text-gray-900 dark:text-white">{{ $category->name }}</h2>
                        <a href="{{ route('product.category', $category->slug) }}"
                            class="text-sky-600 font-medium hover:underline dark:text-sky-400">View Products →</a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
</x-app-layout>