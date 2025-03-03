@extends('layouts.app')
@section('title')
  Editar perfil {{ Auth::user()->username }}
@endsection

@section('content')
  <div class="md:flex md:justify-center">
    <div class="md:1/2 bg-white shadow p-6 rounded-md">
      <form action="{{ route('profile.store') }}" class="mt-10 md:mt-0" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
          <label for="username" class="mb-2 font-bold uppercase text-gray-500 block">username</label>
          <input id="username" name="username" type="text" placeholder="Tu nombre de usuario"
            class="border border-gray-400 p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
            value="{{ auth()->user()->username }}">
          @error('username')
            <div class="text-red-500 text-sm">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-5">
          <label for="imageProfile" class="mb-2 font-bold uppercase text-gray-500 block">Image</label>
          <input id="imageProfile" name="imageProfile" type="file" class="border border-gray-400 p-3 w-full rounded-lg"
            accept=".jpg, .jpeg, .png">

        </div>
        <input type="submit" value="Guardar cambios"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 w-full rounded-lg cursor-pointer uppercase transition-colors" />
      </form>
    </div>
  @endsection
