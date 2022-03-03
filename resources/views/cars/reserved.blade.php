<x-app-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100
            overflow-hidden
            shadow-sm
            sm:rounded-lg
            mb-4 p-4
            mw-full
            flex
            justify-center
            items-center">
                <div class="w-6/12 bg-white rounded bg-green-400 text-white p-8 font-medium">
                    🥳 Réservation effectuée. Ordre de reservation: resa-{{ $reservation->id }}-id
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
