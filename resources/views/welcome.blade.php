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
        <div class="w-3/12 flex flex-col">
            <div class="grow">
                <div class="h12">Marques</div>
                <div class="flex wrap"></div>
            </div>
            <div class="grow">
                <div class="h12">Catégories</div>
                <div class="flex wrap"></div>
            </div>
        </div>
        <div class="w-9/12 flex flex-col">
            <div class="h-16"></div>
            <div class="grow"></div>
        </div>
    </div>
</x-app-layout>
