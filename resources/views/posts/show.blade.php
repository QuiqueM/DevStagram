@extends('layouts.app')

@section('title', 'Crear un nuevo post')

@section('content')
  <div class="container mx-auto flex">
    <div class="md:w-1/2">
      <img src="{{ asset('uploads') . '/' . $post->image }}" alt="imagen de {{ $post->title }}">
      <div class="p-3">
        <p>0 likes</p>
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
