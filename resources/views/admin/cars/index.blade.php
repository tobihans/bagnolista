<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Last cars --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-3 flex justify-end">
                    <x-button onclick="location.assign('/cars/new')">Nouveau</x-button>
                </div>
                <hr class="pb-4">
                <div class="px-3 py-6 bg-white border-b border-gray-200">
                    <table class="w-full table-auto border-collapse text-align-left">
                        <thead class="font-medium bg-gray-600 text-gray-200">
                        <tr>
                            <th class="p-2 text-left">#</th>
                            <th class="p-2 text-left">Catégorie</th>
                            <th class="p-2 text-left">Marque</th>
                            <th class="p-2 text-left">Modèle</th>
                            <th class="p-2 text-left">Disponible</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="divide-y">
                        @foreach($cars->items() as $c)
                            <tr>
                                <td class="p-2 font-light text-sm">{{ $loop->index + 1 }}</td>
                                <td class="p-2"><a href="{{ route('cars.show', $c->id)    }}">{{ $c->category->name }}</a></td>
                                <td class="p-2">{{ $c->brand->name }}</td>
                                <td class="p-2">{{ $c->model }}</td>
                                <td class="p-2 font-semibold">{{ $c->is_available ? 'Oui' : 'Non' }}</td>
                                <td class="p-2">
                                    <a class="font-light text-sm" href="{{ route('cars.edit', ['id' => $c->id]) }}">
                                        <i class="fa-solid fa-pen-to-square fa"></i>&nbsp;&nbsp;Editer
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="text-right p-2">
                        {{ $cars->links() }}
{{--                        <a href="/cars" class="text-gray-700 hover:text-gray-800">Voir plus ...</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
