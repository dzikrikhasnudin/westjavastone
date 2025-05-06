@props(['status'])

{{-- @php
switch ($status) {
case 'reserved':
$classes = 'me-2 rounded bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900
dark:text-yellow-300 capitalize';
break;
case 'sold':
$classes = 'me-2 rounded bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900
dark:text-red-300 capitalize';
break;
default:
$classes = 'me-2 rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900
dark:text-green-300 capitalize';
break;
}
@endphp --}}
@php
if ($status == 'sold') {
$classes = 'me-2 rounded bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900
dark:text-yellow-300 capitalize';
} else {
$classes = 'me-2 rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900
dark:text-green-300 capitalize';
}

@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $status }}
</span>