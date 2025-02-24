@extends('layouts.app')
@section('title')
  Perfil de {{ $user->username }}
@endsection

@section('content')
  <div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:6/12 flex flex-col md:flex-row items-center">
      <div class="w-8/12 lg:w-6/12 px-5">
        <img src="{{ asset('img/avatar-1.jpg') }}" alt="Imagen de usuario" class="w-full h-full object-cover rounded-lg">
      </div>
      <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
        <p class="text-gray-700 text-2xl"> {{ $user->username }} </p>
        <p class="text-gray-500 text-sm"> 0 <span>Seguidores</span> </p>
        <p class="text-gray-500 text-sm"> 0 <span>Siguiendo</span> </p>
        <p class="text-gray-500 text-sm"> {{ $posts->count() }} <span>Post</span> </p>
      </div>
    </div>
  </div>

  <section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
      @forelse ($posts as $post)
        <div>
          <a href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}">
            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Imagen de usuario {{ $post->title }}"
              class="">
          </a>
        </div>

      @empty
        <p class="text-center text-gray-600 uppercase text-sm font-bold">No hay publicaciones</p>
      @endforelse

      <div class="my-10">
        {{ $posts->links() }}
      </div>
    </div>
  </section>
@endsection
