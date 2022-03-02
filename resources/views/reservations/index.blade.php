<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Last reservations --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <hr class="pb-4">
                <div class="px-3 py-6 bg-white border-b border-gray-200">
                    <table class="w-full table-auto border-collapse text-align-left">
                        <thead class="font-medium bg-gray-600 text-gray-200">
                        <tr>
                            <th class="p-2 text-left">#</th>
                            @if($is_admin)
                            <th class="p-2 text-left">Utilisateur</th>
                            @endif
                            <th class="p-2 text-left">Voiture</th>
                            <th class="p-2 text-left">Date</th>
                            <th class="p-2 text-left">Durée</th>
                            @if(!$is_admin)
                                <th class="p-2 text-left"></th>
                            @endif
                        </tr>
                        </thead>
                        <tbody class="divide-y">
                        @foreach($reservations as $r)
                            <tr>
                                <td class="p-2 font-light text-sm">{{ $loop->index + 1 }}</td>
                                @if($is_admin)
                                <td class="p-2">{{ $r->user->name }}</td>
                                @endif
                                <td class="p-2">
                                    <span class="font-sans font-semibold">{{ $r->car->category->name }},</span>
                                    <span>{{ $r->car->brand->name . ' ' . $r->car->model }}</span>
                                </td>
                                <td class="p-2">{{ $r->starts_at }}</td>
                                <td class="p-2">{{ $r->duration }}</td>
                                @if(!$is_admin)
                                    <td class="p-2 text-sm">
                                        <form method="POST" action="{{ route('reservations.destroy', ['reservation' => $r->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" onclick="event.preventDefault();this.closest('form').submit();">
                                                Libérer
                                            </a>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="text-right p-2">
                        {{ $reservations->links() }}
                        {{--                        <a href="/reservations" class="text-gray-700 hover:text-gray-800">Voir plus ...</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
