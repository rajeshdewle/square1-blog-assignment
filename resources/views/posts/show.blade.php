<x-app-layout>
    <div class="text-sm text-gray-600 mb-4">
        <a href="{{ route('home') }}">Home</a> / <span class="text-gray-900">{{ $post->title }}</span>
    </div>
    <div class="overflow-hidden">
        <div class="mb-4 w-full text-center">
            <h2 class="text-5xl font-bold text-gray-800 py-3">{{ $post->title }}</h2>
            <div class="text-gray-600">
                <span class="px-3">
                    {{ date('d M, Y', strtotime($post->published_at)) }}
                </span> |
                <span class="px-3">{{ $post->user->name }}</span>
            </div>
        </div>
        <p class="text-gray-600 text-xl text-justify">{{ $post->description }}</p>
    </div>
</x-app-layout>
