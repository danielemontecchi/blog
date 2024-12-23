@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-bold text-gray-800">{{ $post->title }}</h1>
    <p class="text-gray-600 text-sm mt-2">Published on {{ optional($post->published_at)->format('d M Y') }}</p>
    <div class="mt-6 text-gray-700">
        {!! nl2br(e($post->content)) !!}
    </div>
@endsection
