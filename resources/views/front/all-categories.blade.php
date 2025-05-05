<x-app-layout>
<ul>
    @forelse ($data['categories'] as $category)
        <li>{{ $category->name }}</li>
    @empty

    @endforelse
</ul>
</x-app-layout>
