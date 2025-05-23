<x-app-layout>
    <x-slot:title>Checkout - West Java Stone</x-slot:title>
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        @livewire('order-form', ['stone' => $stone, 'orderData' => $orderData])
      </section>
</x-app-layout>
