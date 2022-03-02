<x-app-layout>
    @push('scripts')
        <script>
            @php
                $desc = json_decode($car->description, true)
            @endphp
            const data = {{ Js::from($desc) }};
        </script>
        <script src="{{ asset('js/readonly-editor.js') }}"></script>
    @endpush
    @php
        $photos = explode(PHP_EOL, $car->photos);
        $url = $photos[0];
        $is_full_url = Str::startsWith($url, ['http://', 'https://']);
    @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4 p-6">
                <!-- Photos -->
                <div class="flex justify-between">
                    <div class="w-10/12 mr-4">
                        <img class="rounded"
                             src="{{ $is_full_url ? $url : asset('storage/' . $url) }}"
                             alt="Image descriptive de {{ $car->model }}">
                    </div>
                    @php
                        $count = count($photos);
                    @endphp
                    <div class="w-2/12 p-2 bg-violet-100 rounded flex flex-col justify-start">
                        @foreach($photos as $p)
                            @continue($loop->index == 0)
                            @php
                                $url = $p;
                                $is_full_url = Str::startsWith($url, ['http://', 'https://']);
                            @endphp
                            <img
                                src="{{ $is_full_url ? $url : asset('storage/' . $url) }}"
                                width="150" height="150" class="mx-auto my-2 rounded self-center">
                            @break($loop->iteration == 7)
                        @endforeach
                    </div>
                </div>
                <!-- Name + Desc -->
                <div class="mt-6">
                    <div class="text-4xl font-semibold flex">
                        <span class="mr-auto">{{ $car->brand->name . ' ' . $car->model }}</span>
                        @if($car->is_available)
                        <a href="#" class="block text-sm text-slate-500
                              m-2 py-2 px-4
                              rounded-md border-0
                              text-sm font-semibold
                              bg-violet-700 text-violet-100
                              hover:bg-violet-600">Réserver</a>
                        @endif
                        @if(Auth::user() && Auth::user()->is_admin)
                            <a href="{{ route('cars.edit', ['car' => $car->id]) }}" class="block text-sm text-slate-500
                              m-2 py-2 px-4
                              rounded-md border-0
                              text-sm font-semibold
                              bg-red-700 text-violet-50
                              hover:bg-red-600">Modifier</a>
                        @endif
                    </div>
                    <p class="text-violet-700">
                        @if(!($desc) || ($desc && count($desc['blocks']) == 0))
                            Aucune
                        @endif
                        Description
                    </p>
                    <div id="editor"></div>
                    <div class="mt-6">
                        <table class="table-auto border-collapse w-6/12">
                            <thead class="font-semibold text-lg">
                            <tr>
                                <th colspan="2" class="p-2 font-medium text-normal align-center border">
                                    Caractéristiques
                                </th>
                            </tr>
                            </thead>
                            @php
                                $specs = json_decode($car->specs, true)
                            @endphp
                            <tbody class="divide-y">
                            @foreach($specs as $k => $v)
                                <tr>
                                    <td class="p-2 font-light text-sm border">{{ $k }}</td>
                                    <td class="p-2 font-light text-sm border">{{ $v }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        td {
            text-align: center;
        }

        /* Customize Editor.JS blocks to fit into the page */
        .codex-editor__redactor {
            padding-bottom: 0 !important;
            text-align: left !important;
        }

        .ce-block__content {
            margin: 0;
        }
    </style>
</x-app-layout>
