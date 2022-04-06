<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artículos') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col items-center">
                    <div class="flex flex-col items-center mt-4">
                        <!-- Variable Session -->
                        @if (session()->has('error'))
                            <div class="bg-red-100 p-4 mb-4 text-sm text-red-700" role="alert">
                                <span class="font-semibold">{{ session('error') }}</span>
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <div class="bg-green-100 p-4 mb-4 text-sm text-green-700" role="alert">
                                <span class="font-semibold">{{ session('success') }}</span>
                            </div>
                        @endif

                        @if ($articles->isNotEmpty())
                            <div class="border border-gray-200 shadow">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Artículo</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Número de autores</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Número de monografías</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @foreach ($articles as $article)
                                            <tr class="whitespace-nowrap">
                                                <td class="px-6 py-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <p>{{ $article->title }}</p>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    @if ($article->authors_count == 0)
                                                        Este artículo no tiene autor
                                                    @else
                                                        {{ $article->authors_count }}
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4">
                                                    @if ($article->monographs_count == 0)
                                                        Este artículo no tiene monografías
                                                    @else
                                                        {{ $article->monographs_count }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="bg-green-100 rounded-lg p-4 mt-4 mb-4 text-sm text-green-700 w-96 text-center" role="alert">
                                    No hay artículos.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
