@props(['active'])

@php
$classes = ($active ?? false)
? 'block py-2 pr-4 pl-3 text-white border-b bg-primary-700 lg:bg-transparent lg:text-sky-500 lg:font-semibold
lg:p-0 dark:text-white cursor-pointer'
: 'block py-2 pr-4 pl-3 text-gray-50 border-b lg:hover:font-semibold border-gray-100 hover:bg-gray-50 hover:text-sky-700
lg:hover:bg-transparent lg:border-0 lg:hover:text-sky-600 lg:p-0 dark:text-gray-400
lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent
dark:border-gray-700 cursor-pointer';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>