<x-app-layout>
    <x-slot:title>About Us - West Java Stone</x-slot:title>
    <h2 class="text-2xl font-bold mb-2"></h2>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto prose prose-lg dark:prose-invert">
                <header class="mb-4 lg:mb-6 not-prose">
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-sky-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $page->title }}</h1>
                </header>


                {!! $page->content !!}
            </article>
        </div>
    </main>
</x-app-layout>