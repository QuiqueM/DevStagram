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
        <div class="flex gap-3 items-center">
          <p class="text-gray-700 text-2xl"> {{ $user->username }} </p>
          @auth
            @if ($user->id === auth()->user()->id)
              <a href="{{ route('profile.index', $user) }}" class="text-graay-500 hover:text-gray-700 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>
              </a>
            @endif
          @endauth
        </div>
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
