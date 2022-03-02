<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @endpush
    <div class="w-full bg-white min-h-screen flex justify-between cover">
        <div class="w-5/12 px-8 py-12 flex flex-col justify-center items-start text-white">
            <p class="text-7xl uppercase font-bold brand-name">Bagnolista</p>
            <p class="my-4 text-2xl uppercase">
                {{--                Tous les gouts.--}}
                {{--                <br>--}}
                Etreignez le volant des plus belles <span class="font-semibold">montures</span>!
            </p>
            <a href="#shop" class="block text-sm text-slate-500
            text-xl
                              m-2 py-2 px-4 ml-0
                              rounded border-0
                              text-sm font-semibold
                              bg-white text-gray-900
                              hover:bg-white-800">Trouver une voiture
            </a>
        </div>
    </div>
    <div id="shop" class="pt-20 min-h-screen flex max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-white">
        <div class="w-2/12 flex flex-col">
            <div class="">
                <div class="h16 bg-cyan-600 text-cyan-50 py-2 px-4 border-x-2 border-cyan-600">Marques</div>
                <div class="flex flex-wrap border-x">
                    @foreach($brands as $b)
                        @php
                            $selected = $b == $search_brand
                        @endphp
                        <a href="?brand={{$b}}#shop" @class([
                                        'block',
                                        'text-sm',
                                        'm-2',
                                        'p-2',
                                        'rounded-full',
                                        'border-0',
                                        'text-xs',
                                        'font-semibold',
                                        'bg-cyan-700' => $selected,
                                        'text-cyan-50' => $selected,
                                        'hover:bg-cyan-600' => $selected,
                                        'bg-cyan-50' => !$selected,
                                        'text-cyan-700' => !$selected,
                                        'hover:bg-cyan-100' => !$selected,
])>
                            {{ $b }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="my-2">
                <div class="h16 bg-emerald-600 text-emerald-50 py-2 px-4 border-x-2 border-emerald-600">Catégories</div>
                <div class="flex flex-wrap border-x">
                    @foreach($categories as $c)
                        @php
                            $selected = $c == $search_category
                        @endphp
                        <a href="?category={{$c}}#shop" @class([
                                        'block',
                                        'text-sm',
                                        'm-2',
                                        'p-2',
                                        'rounded-full',
                                        'border-0',
                                        'text-xs',
                                        'font-semibold',
                                        'bg-emerald-700' => $selected,
                                        'text-emerald-50' => $selected,
                                        'hover:bg-emerald-600' => $selected,
                                        'bg-emerald-50' => !$selected,
                                        'text-emerald-700' => !$selected,
                                        'hover:bg-emerald-100' => !$selected,
])>
                            {{ $c }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="w-10/12 flex flex-col">
            <div class="h-16 px-4 flex justify-center items-center relative">
                <form class="flex justify-center grow">
                    <input type="search" placeholder="E.g Bentley 1960, Chevrolet Camaro (Not impl...)"
                           class="rounded min-w-64 w-5/12">
                    <button class="ml-4 block text-sm text-slate-500
                              mr-2 py-2 px-4
                              rounded-md border-0
                              text-sm font-semibold
                              bg-violet-700 text-violet-50
                              hover:bg-violet-600">Rechercher
                    </button>
                </form>
                <hr class="w-full absolute" style="bottom: 0;">
            </div>
            <div class="cars-container grow p-6 flex flex-wrap justify-center gap-y-0.5 gap-x-2">
                @foreach($cars->items() as $c)
                    @php
                        $photos = explode(PHP_EOL, $c->photos);
                        $url = $photos[0];
                        $is_full_url = Str::startsWith($url, ['http://', 'https://']);
                    @endphp
                    <div class="car-card max-h-80 rounded overflow-hidden shadow-lg my-2">
                        <img class="w-full" src="{{ $is_full_url ? $url : asset('storage/' . $url) }}"
                             alt="Sunset in the mountains">
                        <div class="px-6 py-2">
                            <div class="font-bold text-xl mb-2">{{ $c->model }}</div>
                            <p class="text-gray-700 text-base">{{ $c->brand->name }}</p>
                        </div>
                        <div class="px-6 py-4 flex">
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
             #{{ Str::substr($c->category->name, 0, 15) }}{{ Str::length($c->category->name) > 15 ? '...' : '' }}
           </span>
                            <a
                                href="{{ route('cars.show', ['car' => $c->id]) }}"
                                class="inline-block
                            bg-gray-200 rounded-full px-3 py-1 text-sm
                            font-semibold text-white mr-2
                            ml-auto bg-gradient-to-br from-cyan-600 to-emerald-800">Voir&nbsp;<i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="ml-4 mb-4">
                {{ $cars->fragment('shop')->links() }}
            </div>
        </div>
    </div>
    <style>
        .cars-container {
            align-items: flex-start;
        }

        .car-card {
            max-width: 18rem;
        }
    </style>
</x-app-layout>
