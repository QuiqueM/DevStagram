@extends('layouts.app')

@section('title', 'Home')

@section('content')
  @if($posts->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
      @foreach($posts as $post)
        <div>
          <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Post image" class="w-full h-80 object-cover rounded-lg">
          <div class="p-5">
            <p class="text
            -gray-500 text-sm"> {{ $post->user->username }} </p>
            <p class="text-gray-700 text-lg font-bold"> {{ $post->title }} </p>
            <p class="text-gray-500 text-sm"> {{ $post->created_at->diffForHumans() }} </p>
            <p class="text-gray-500 text-sm"> {{ $post->likes->count() }} <span> @choice('Like|Likes', $post->likes->count()) </span> </p>
            <p class="text-gray-500 text-sm"> {{ $post->comments->count() }} <span> @choice('Comment|Comments', $post->comments->count()) </span> </p>
            <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-5 text-xs font-bold cursor-pointer"> Ver Publicacion </a>
          </div>
        </div>
    @endforeach
  </div>
  @else
    <p class="text-center text-2xl font-black"> No hay publicaciones </p>
  @endif
      
@endsection