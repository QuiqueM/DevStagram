@extends('layouts.app')

@section('title', 'Crear un nuevo post')

@section('content')
  <div class="container mx-auto flex">
    <div class="md:w-1/2">
      <img src="{{ asset('uploads') . '/' . $post->image }}" alt="imagen de {{ $post->title }}">
      <div class="p-3 flex items-center gap-4">
        @auth
          @if ($post->checkLike(Auth::user()))
            <form action="{{ route('posts.likes.destroy', $post) }}" method="POST">
              @csrf
              @method('DELETE')
              <div class="my-4">
                <button type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                  </svg>
                </button>
              </div>
            </form>
          @else
            <form action="{{ route('posts.likes.store', $post) }}" method="POST">
              @csrf
              <div class="my-4">
                <button type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                  </svg>
                </button>
              </div>
            </form>
          @endif
        @endauth
        <p>{{ $post->likes->count() }} likes</p>
      </div>
      <div class="">
        <p class="font-bold"> {{ $post->user->username }}</p>
        <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
        <p class="mt-5">{{ $post->description }}</p>
      </div>

      @auth
        @if ($post->user_id === Auth::user()->id)
          <form action="{{ route('posts.destroy', $post) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Eliminar"
              class="bg-red-500 hover:bg-red-700 text-white font-bold p-3 w-full rounded-lg cursor-pointer uppercase transition-colors" />
          </form>
        @endif
      @endauth
    </div>
    <div class="md:w-1/2 px-5">
      <div class="shadow bg-white p-5 mb-5">
        @auth
          <p class="text-xl font-bold text-center mb-4"> Agrega un nuevo Comentario</p>
          @if (session('message'))
            <div class="bg-green-500 p-3 text-white text-center mb-3 rounded-md">
              {{ session('message') }}
            </div>
          @endif
          <form action="{{ route('comments.store', ['post' => $post, 'user' => $user]) }}" method="POST">
            @csrf
            <div class="mb-5">
              <label for="comment" class="mb-2 font-bold uppercase text-gray-500 block">Comentario</label>
              <textarea id="comment" name="comment"
                class="border border-gray-400 p-3 w-full rounded-lg @error('comment') border-red-500 @enderror">
            </textarea>
              @error('comment')
                <div class="text-red-500 text-sm">{{ $message }}</div>
              @enderror
            </div>
            <input type="submit" value="Publicar"
              class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 w-full rounded-lg cursor-pointer uppercase transition-colors" />
          </form>
        @endauth

        <div>
          <p class="text-xl font-bold text-center mb-4">Comentarios</p>
          @forelse ($post->comments as $comment)
            <div class="bg-gray-100 p-3 mb-3 rounded-lg">
              <a href="{{ route('posts.index', ['user' => $comment->user]) }}">
                <p class="font-bold">{{ $comment->user->username }}</p>
              </a>
              <p class="">{{ $comment->comment }}</p>
              <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
          @empty
            <p class="text-center text-gray-600 uppercase text-sm font-bold">No hay comentarios</p>
          @endforelse

        </div>
      </div>
    </div>
  </div>
@endsection
