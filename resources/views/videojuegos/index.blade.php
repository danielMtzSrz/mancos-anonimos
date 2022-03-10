@extends('layouts.web')

@section('titulo_apartado')
Videojuegos
@endsection

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
<div class="w-full flex justify-end">
    <a href="{{ route('videojuegos.create') }}"
        class="bg-sky-500 hover:bg-sky-700 text-white font-bold py-2 px-4 rounded-full transform hover:-translate-y-1 hover:scale-110 my-4">
        Nuevo
    </a>
</div>
<div class="overflow-x-auto">
    <table class="min-w-full animate__animated animate__zoomInUp">
        <thead class="border-b bg-gray-50">
            <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    #
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Nombre videojuego
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Clasificación
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Consola
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Precio adquisición
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Precio venta
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Imagen
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($videojuegos as $videojuego)
            <tr class="border-b">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $videojuego->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $videojuego->nombre_videojuego }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $videojuego->clasificacion }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $videojuego->tipo_consola_id }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ number_format($videojuego->precio_adquisicion, 2) }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ number_format($videojuego->precio_venta, 2) }}</td>
                @if($videojuego->image)
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <img class="object-cover w-20 h-20" src="/storage/{{ $videojuego->image }}" alt="">
                    </td>
                @endif
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 w-auto">
                    <div class="flex justify-center items-center flex space-x-2 ">
                        <a href="{{ route('videojuegos.edit', $videojuego->id) }}"
                            class="bg-amber-400 hover:bg-amber-600 text-white font-bold py-2 px-4 rounded-full transform hover:-translate-y-1 hover:scale-110">
                            Modificar
                        </a>
                        <form action="{{ route('videojuegos.destroy', $videojuego->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit"
                                    value="Eliminar"
                                    class="bg-red-400 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full transform hover:-translate-y-1 hover:scale-110"
                                    onclick="return confirm('¿Desea eliminar este registro?')">
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
