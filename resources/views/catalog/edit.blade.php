<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="" method="POST">
                        @method('PUT')
                        @csrf
                        <div>
                            <x-input-label for="titulo" :value="__('Titulo')" />
                            <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="title"
                                :value="$peli->title" required autofocus />
                            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="year" :value="__('Año')" />
                            <x-text-input id="year" class="block mt-1 w-full" type="text" name="year"
                                :value="$peli->year" required />
                            <x-input-error :messages="$errors->get('year')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="dir" :value="__('Director')" />
                            <x-text-input id="dir" class="block mt-1 w-full" type="text" name="director"
                                :value="$peli->director" required />
                            <x-input-error :messages="$errors->get('director')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="poster" :value="__('Poster')" />
                            <x-text-input id="poster" class="block mt-1 w-full" type="text" name="poster"
                                :value="$peli->poster" required />
                            <x-input-error :messages="$errors->get('poster')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="res" :value="__('Resumen')" />
                            <textarea name="synopsis" id="res"
                                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ $peli->synopsis }}</textarea>
                        </div>
                        <div>
                            <x-primary-button>Modificar pelicula</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
