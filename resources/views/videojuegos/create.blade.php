@extends('layouts.web')

@section('titulo_apartado')
Videojuegos - Nuevo
@endsection

@php
    $consola = ['XBOX' => 'Xbox',
                'PS' => 'Play Station',
                'PC' => 'PC',
                'Celular' => 'Celular'];
@endphp

@section('content')
@if (session('status'))
    <div class="flex justify-center items-center py-4">
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md py-4 lg:w-2/5 sm:w-full" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                    <p class="font-bold">¡Éxito!</p>
                    <p class="text-sm">{{ session('status') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif
<!-- En esta parte mostramos los errores -->
@if($errors->any())
    <div role="alert">
        <div class="w-auto flex flex-col justify-center items-center py-4">
            <div class="lg:w-2/5 sm:w-full bg-red-500 text-white font-bold rounded-t px-4 py-2">
                !Error!
            </div>
            <div class="lg:w-2/5 sm:w-full border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            @foreach($errors->all() as $error)
                <p>- {{ $error }} <br></p>
            @endforeach
            </div>
        </div>
    </div>
@endif
<!-- Fin de los errores -->
<div class="flex justify-center items-center">
    <form class="w-full max-w-lg" action="{{ route('videojuegos.store') }}" method="POST">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-3/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Nombre del videojuego
                </label>
                <input class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="nombre_videojuego" name="nombre_videojuego" type="text" placeholder="Nombre del videojuego">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Clasificación
                </label>
                <input
                    class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="clasificacion" name="clasificacion" type="text" placeholder="Clasificación Ejemplo">
            </div>
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Consola
                </label>
                <select class="block appearance-none w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" name="consola" id="consola">
                    <option value="">Seleccionar...</option>
                    @foreach($consola as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                    Precio de adquisición
                </label>
                <input
                    class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="precio_adquisicion" name="precio_adquisicion" type="number" placeholder="0.00">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                    Precio de venta
                </label>
                <input
                    class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="precio_adquisicion" name="precio_venta" type="number" placeholder="0.00">
            </div>
        </div>
        <div class="w-full flex justify-end items-center">
            <button type="submit" class="bg-emerald-500 hover:bg-emerald-700 text-white font-bold py-2 px-4 rounded-full">Guardar</button>
        </div>
    </form>
</div>
@endsection
