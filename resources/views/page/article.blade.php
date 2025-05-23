<x-app-layout>
    <x-slot:title>{{ $post->title . ' - West Java Stone' }}</x-slot:title>
    <x-slot:description>{{ $post->description }}</x-slot:description>
    <x-slot:metaimage>{{ Storage::url($post->thumbnail) }}</x-slot:metaimage>
    <h2 class="text-2xl font-bold mb-2"></h2>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 antialiased">
             <nav class="flex mx-auto max-w-screen-md px-4 lg:px-0 mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="#"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-sky-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="me-2.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m9 5 7 7-7 7" />
                        </svg>
                        <a href="{{ route('page.blog') }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-sky-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Articles</a>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto prose prose-lg dark:prose-invert">
                <header class="mb-4 lg:mb-6 not-prose">
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $post->title }}</h1>
                </header>

                @if ($post->thumbnail)
                <img src="{{ Storage::url($post->thumbnail) }}" class="w-full object-cover rounded" alt="">
                @endif

                {!! $post->content !!}
            </article>
        </div>
    </main>
</x-app-layout>
