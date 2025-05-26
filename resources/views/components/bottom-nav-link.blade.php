@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex flex-col items-center justify-center px-5 bg-gray-50 dark:bg-gray-800 text-blue-600 dark:text-blue-500 text-xs'
: 'inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group text-gray-500
dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 text-xs';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>