<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col items-center">
                    <div class="flex flex-col items-center mt-4">
                        <div class="flex flex-col items-center md:flex-row md:max-w-xl">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $monograph_articles->title }}</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $monograph_articles->year }}</p>

                                @foreach ($monograph_articles->articles as $article)
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $article->title }}</p>
                                @endforeach

                                @if ($monograph_articles->articles->count() == 0)
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Esta monografía no contiene artículos</p>
                                @else
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Numero total de páginas de todos los artículos: <span class="font-bold">{{ $monograph_articles->articles_sum_number_pages }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
