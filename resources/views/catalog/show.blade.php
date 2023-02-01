<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-rows-1">
                        @if (session('msg') != null)
                            @if (session('msg') == 1)
                                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                                    role="alert">
                                    <span class="font-medium">Todo ha ido bien!</span> Tu película ha sido alquilada
                                    correctamente
                                </div>
                            @else
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    <span class="font-medium">Algo ha ido mal!</span> Tu película no ha podido ser
                                    alquilada
                                </div>
                            @endif
                        @endif
                        <div class="grid grid-cols-2">
                            <div><img src="{{ $peli->poster }}" style="height: 500px;"></div>
                            <div>
                                <h1>{{ $peli->title }}</h1>
                                <h3>Año {{ $peli->year }} Director {{ $peli->director }}</h3>
                                <p>Resumen: {{ $peli->synopsis }}</p>
                                <p>Estado: {{ $estado }}</p>
                                <div class="grid grid-cols-4">
                                    <div>
                                        @if ($peli->rented)
                                            <form action="{{ url('catalog/return/' . $id) }}" method="post"
                                                style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Devolver
                                                    pelicula
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ url('catalog/rent/' . $id) }}" method="post"
                                                style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Alquilar
                                                    pelicula
                                                </button>
                                            </form>
                                        @endif
                                        <a href="">

                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ url('catalog/edit/' . $id) }}">
                                            <button type="button"
                                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Editar
                                                pelicula
                                            </button>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('catalog') }}">
                                            <button type="button"
                                                class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Volver
                                                al listado
                                            </button>
                                        </a>
                                    </div>
                                    <div>
                                        <form action="{{ url('catalog/delete/' . $id) }}" method="post"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Eliminar
                                                pelicula
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
