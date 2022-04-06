<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Monografía {{ $monograph->title }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col items-center">
                    <div class="flex flex-col items-center mt-4">
                        <div class="flex flex-col items-center md:flex-row md:max-w-xl">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Autores que han participado en la Monografía {{ $monograph->title }}</h5>

                                @php
                                    $array = [];

                                    foreach ($monograph->articles as $articles) {
                                        foreach ($articles->authors as $author) {
                                            array_push($array, $author->name);
                                        }
                                    }
                                    $authors = array_unique($array);
                                @endphp

                                @foreach ($authors as $author)
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $author }}</p>
                                @endforeach

                                {{-- @foreach ($monograph->articles as $articles)
                                    @foreach ($articles->authors as $author)
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $author->name }}</p>
                                    @endforeach
                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
