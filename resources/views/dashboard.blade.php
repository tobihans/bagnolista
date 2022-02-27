<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="px-3 py-6 bg-white border-b border-gray-200">
                    <h1 class="font-semibold text-xl py-2">Salut {{ Auth::user()->name }}!</h1>
                    <div>
                        <p class="py-1">En résumé</p>
                        <div class="flex">
                            <div class="rounded-lg p-4 bg-purple-700 flex flex-col mx-2">
                                <div class="py-2">
                                    <i class="text-white fa-solid fa-user fa-2xl"></i>
                                </div>
                                <div class="flex items-center">
                                    <div class="text-lg text-white font-light">
                                        {{ $user_stats }} Utilisateurs
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-lg p-4 bg-purple-700 flex flex-col mx-2">
                                <div class="py-2">
                                    <i class="text-white fa-solid fa-car-side fa-2xl"></i>
                                </div>
                                <div class="flex items-center">
                                    <div class="text-lg text-white font-light">
                                        {{ $resa_stats }} Voitures réservées
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-lg p-4 bg-purple-700 flex flex-col mx-2">
                                <div class="py-2">
                                    <i class="text-white fa-solid fa-money-bill-1-wave fa-2xl"></i>
                                </div>
                                <div class="flex items-center">
                                    <div class="text-lg text-white font-light">
                                        {{ $payments_stats }} Transactions
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Last Reservations --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="px-3 py-6 bg-white border-b border-gray-200">
                    <h2 class="capitalize font-semibold text-lg">Dernières Réservations</h2>
                    <hr class="pb-4">
                    <table class="w-full table-auto border-collapse text-align-left">
                        <thead class="font-medium bg-gray-600 text-gray-200">
                            <tr>
                                <th class="p-2 text-left">#</th>
                                <th class="p-2 text-left">Utilisateur</th>
                                <th class="p-2 text-left">Voiture</th>
                                <th class="p-2 text-left">Date</th>
                                <th class="p-2 text-left">Durée</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach($reservations as $r)
                                <tr>
                                    <td class="p-2 font-light text-sm">{{ $loop->index + 1 }}</td>
                                    <td class="p-2">{{ $r->user->name }}</td>
                                    <td class="p-2">
                                        <span class="font-sans font-semibold">{{ $r->car->category->name }},</span>
                                        <span>{{ $r->car->brand->name . ' ' . $r->car->model }}</span>
                                    </td>
                                    <td class="p-2">{{ $r->starts_at }}</td>
                                    <td class="p-2">{{ $r->duration }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right p-2">
                        <a href="/reservations" class="text-gray-700 hover:text-gray-800">Voir plus ...</a>
                    </div>
                </div>
            </div>
            {{-- Last cars --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="px-3 py-6 bg-white border-b border-gray-200">
                    <h2 class="capitalize font-semibold text-lg">Dernières Voitures</h2>
                    <hr class="pb-4">
                    <table class="w-full table-auto border-collapse text-align-left">
                        <thead class="font-medium bg-gray-600 text-gray-200">
                        <tr>
                            <th class="p-2 text-left">#</th>
                            <th class="p-2 text-left">Catégorie</th>
                            <th class="p-2 text-left">Marque</th>
                            <th class="p-2 text-left">Modèle</th>
                            <th class="p-2 text-left">Disponible</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y">
                        @foreach($cars as $c)
                            <tr>
                                <td class="p-2 font-light text-sm">{{ $loop->index + 1 }}</td>
                                <td class="p-2">{{ $c->category->name }}</td>
                                <td class="p-2">{{ $c->brand->name }}</td>
                                <td class="p-2">{{ $c->model }}</td>
                                <td class="p-2 font-semibold">{{ $c->is_available ? 'Oui' : 'Non' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-right p-2">
                        <a href="/cars" class="text-gray-700 hover:text-gray-800">Voir plus ...</a>
                    </div>
                </div>
            </div>
            {{-- Last Payments --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="px-3 py-6 bg-white border-b border-gray-200">
                    <h2 class="capitalize font-semibold text-lg">Dernières Transactions</h2>
                    <hr class="pb-4">
                    <table class="w-full table-auto border-collapse text-align-left">
                        <thead class="font-medium bg-gray-600 text-gray-200">
                        <tr>
                            <th class="p-2 text-left">#</th>
                            <th class="p-2 text-left">Utilisateur</th>
                            <th class="p-2 text-left">Montant</th>
                            <th class="p-2 text-left">Date</th>
                            <th class="p-2 text-left">Solde</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y">
                        @foreach($payments as $p)
                            <tr>
                                <td class="p-2 font-light text-sm">{{ $loop->index + 1 }}</td>
                                <td class="p-2">{{ $r->user->name }}</td>
                                <td class="p-2 font-semibold">{{ $p->amount . ' XOF' }}</td>
                                <td class="p-2">{{ $p->created_at }}</td>
                                <td class="p-2 font-semibold">{{ $p->user->credits . ' XOF' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-right p-2">
                        <a href="/payments" class="text-gray-700 hover:text-gray-800">Voir plus ...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
