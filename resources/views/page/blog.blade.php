<div>
    <!-- Blog Section -->
    <section class="max-w-7xl mx-auto px-4 py-10 ">
        <h2 class="text-3xl font-bold mb-4 text-gray-900 dark:text-white">Latest Articles</h2>

        <!-- Search Form -->

        <form wire:submit='refresh' class="w-full mx-auto mb-4">
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input wire:model.live="search" type="search" id="search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                    placeholder="Search Agate, Petrified Wood..." required />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Search</button>
            </div>
        </form>

        <div class="grid md:grid-cols-3 gap-8 ">

            <!-- Blog Card -->
            @forelse ($articles as $article)
            <article class="border-b pb-4 dark:border-gray-400">
                <a href="{{ route('page.article', $article->slug) }}">
                    <img src="{{ Storage::url($article->thumbnail) }}" alt="{{ $article->title }}"
                        class="w-full h-56 object-cover rounded" />
                </a>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">Release — {{ $article->created_at->format('d F
                    Y') }}</p>
                <a href="{{ route('page.article', $article->slug) }}">
                    <h3 class="mt-2 text-xl text-gray-700 dark:text-white font-semibold hover:underline cursor-pointer">
                        {{
                        $article->title
                        }}</h3>
                </a>
                <p class="text-sm mt-1 text-gray-700 dark:text-gray-400 line-clamp-2">{{ $article->description }}.</p>
            </article>
            @empty
            <div class="flex flex-col items-center col-span-full py-8">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-2">No Articles Found</h2>
                <p class="text-gray-500 dark:text-gray-400 text-center">Try adjusting your search or check back later
                    for new updates.
                </p>
            </div>
            @endforelse
        </div>

        <div class="mt-10">
            {{ $articles->links() }}
        </div>
    </section>
</div>
