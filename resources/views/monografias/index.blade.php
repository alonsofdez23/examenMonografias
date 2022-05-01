<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Monografías') }}
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

                        @if ($monografias->isNotEmpty())
                            <div class="border border-gray-200 shadow">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titulo</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Año</th>
                                        <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit/Delete</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @foreach ($monografias as $monografia)
                                            <tr class="whitespace-nowrap">
                                                <td class="px-6 py-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <a href="{{ route('monografias.show', $monografia) }}">
                                                            {{ $monografia->titulo }}
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $monografia->anyo }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 inline-flex">
                                                    <form action="{{ route('autores', $monografia) }}" method="GET">
                                                        <button class="py-1 px-4 text-gray-700 hover:text-white border border-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded text-sm text-center mr-2 mb-2 dark:border-gray-500 dark:text-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Autores</button>
                                                    </form>
                                                    <form action="{{ route('monografias.edit', $monografia) }}" method="GET">
                                                        <button class="py-1 px-4 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-600 dark:focus:ring-blue-800">Editar</button>
                                                    </form>
                                                    <form action="{{ route('monografias.destroy', $monografia) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="py-1 px-4 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded text-sm text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Borrar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="bg-green-100 rounded-lg p-4 mt-4 mb-4 text-sm text-green-700 w-96 text-center" role="alert">
                                    No hay monografías.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
