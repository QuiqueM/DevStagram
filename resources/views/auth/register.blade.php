@extends('layouts.app')

@section('title', 'Registrate en DevStagram')

@section('content')
  <div class="md:flex md:justify-center gap-4 ">
    <div class="md:w-4/12">
      <img src="{{ asset('img/registrar.jpeg') }}" alt="Imagen Registro" class="w-full h-full object-cover rounded-lg">
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-md">
      <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-5">
          <label for="name" class="mb-2 font-bold uppercase text-gray-500 block">Name</label>
          <input id="name" name="name" type="text" placeholder="Tu nombre"
            class="border border-gray-400 p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
            value="{{ old('name') }}">
          @error('name')
            <div class="text-red-500 text-sm">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-5">
          <label for="username" class="mb-2 font-bold uppercase text-gray-500 block">User Name</label>
          <input id="username" name="username" type="text" placeholder="Tu nombre de usuario "
            class="border border-gray-400 p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
            value="{{ old('username') }}">
          @error('name')
            <div class="text-red-500 text-sm">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-5">
          <label for="email" class="mb-2 font-bold uppercase text-gray-500 block">Email</label>
          <input id="email" name="email" type="email" placeholder="Email "
            class="border border-gray-400 p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
            value="{{ old('email') }}">
          @error('name')
            <div class="text-red-500 text-sm">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-5">
          <label for="password" class="mb-2 font-bold uppercase text-gray-500 block">Password</label>
          <input id="password" name="password" type="password" placeholder="Password "
            class="border border-gray-400 p-3 w-full rounded-lg">
        </div>
        <div class="mb-5">
          <label for="password_confirmation" class="mb-2 font-bold uppercase text-gray-500 block">Confirmar
            Password</label>
          <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Password "
            class="border border-gray-400 p-3 w-full rounded-lg">
        </div>

        <input type="submit" value="Crear cuenta"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 w-full rounded-lg cursor-pointer uppercase transition-colors" />
      </form>
    </div>
  </div>
@endsection
