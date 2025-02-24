@extends('layouts.app')

@section('title', 'Inicia Sesion en DevStagram')

@section('content')
  <div class="md:flex md:justify-center gap-4 ">
    <div class="md:w-4/12">
      <img src="{{ asset('img/login.jpeg') }}" alt="Imagen login" class="w-full h-full object-cover rounded-lg">
    </div>
    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-md">
      <form action="{{ route('login') }}" method="POST">
        @csrf
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
          <input type="checkbox" name="remember" id="remember" class="mr-2">
          <label for="remember" class="uppercase text-gray-500">Recuerdame</label>
        </div>

        <input type="submit" value="Iniciar Sesión"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 w-full rounded-lg cursor-pointer uppercase transition-colors">
      </form>
    </div>
  </div>
@endsection
