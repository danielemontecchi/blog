@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-bold text-gray-800">Blog</h1>
    <ul class="mt-6 space-y-4">
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('blog.show', $post->slug) }}" class="text-blue-500 hover:underline">
                    {{ $post->title }}
                </a>
                <p class="text-gray-600 text-sm">
                    Published on {{ optional($post->published_at)->format('d M Y') }}
                </p>
            </li>
        @endforeach
    </ul>
@endsection
