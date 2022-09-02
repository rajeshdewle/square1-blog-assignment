<x-app-layout>
    @if ($posts->count())
    <div class="flex flex-wrap overflow-hidden border-b -mx-6">
        @foreach ($posts as $post)
        <div class="my-6 px-4 w-full overflow-hidden lg:w-1/2">
            <div class="text-gray-600 text-sm">
                {{ date('d M, Y', strtotime($post->published_at)) }}
            </div>
            <a href="{{ route('posts.show', $post->id) }}"
                class="text-3xl font-bold text-gray-800 py-3 ease-in duration-300 hover:text-indigo-900 inline-block">
                {{ $post->title }}
            </a>
            <p class="text-gray-600">
                {{ $post->short_description }}
            </p>
        </div>
        @endforeach
    </div>
    @else
    <x-no-posts />
    @endif
    <div class="py-8">
        {{$posts->links()}}
    </div>
</x-app-layout>