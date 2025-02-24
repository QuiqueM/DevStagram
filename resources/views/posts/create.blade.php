@extends('layouts.app')

@section('title', 'Crear un nuevo post')

@push('styles')
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
  <div class=" md:flex md:items-center">
    <div class="md:w-1/2 px-10">
      <form id="upload-posts" action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data"
        class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
        @csrf
      </form>
    </div>
    <div class="md:w-1/2 p-6 bg-white rounded-lg shadow-md mt-10 md:mt-0">
      <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-5">
          <label for="title" class="mb-2 font-bold uppercase text-gray-500 block">Titulo</label>
          <input id="title" name="title" type="text" placeholder="Tu titulo"
            class="border border-gray-400 p-3 w-full rounded-lg @error('title') border-red-500 @enderror"
            value="{{ old('title') }}">
          @error('title')
            <div class="text-red-500 text-sm">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-5">
          <label for="description" class="mb-2 font-bold uppercase text-gray-500 block">description</label>
          <textarea id="description" name="description" placeholder="Descripcion de la publicación"
            class="border border-gray-400 p-3 w-full rounded-lg @error('description') border-red-500 @enderror">
            {{ old('description') }}
          </textarea>
          @error('description')
            <div class="text-red-500 text-sm">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-5">
          <input type="hidden" name="image" id="image" value="{{ old('image') }}">
          @error('image')
            <div class="text-red-500 text-sm">{{ $message }}</div>
          @enderror
        </div>
        <input type="submit" value="Publicar"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 w-full rounded-lg cursor-pointer uppercase transition-colors" />
      </form>
    </div>
  </div>
@endsection
@pushOnce('scripts')
  @vite('resources/js/app.js')
@endpushOnce
