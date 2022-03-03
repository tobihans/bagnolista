<x-app-layout>
    @push('scripts')
        <script>
            const data = {{ Js::from(['pricing' => $car->pricing, 'credits' => Auth::user()->credits]) }};
        </script>
        <script src="{{ asset('js/reserve_car.js') }}"></script>
    @endpush
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
                <form x-data="form" x-ref="form" method="POST" action="{{ route('cars.reserve', ['car' => $car->id]) }}"
                      class="w-6/12 bg-white rounded">
                    @csrf
                    @php
                        $photos = explode(PHP_EOL, $car->photos);
                        $url = $photos[0];
                        $is_full_url = Str::startsWith($url, ['http://', 'https://']);
                    @endphp
                    <div class="relative">
                        <img src="{{ $is_full_url ? $url : asset('storage/' . $url) }}"
                             alt="Photo de la voiture a emprunter"
                             class="object-cover rounded-lg">
                        <p class="my-4 px-6 text-2xl font-bold text-gray-700">
                            Location de la <span class="text-3xl">{{ $car->brand->name }} {{ $car->model }}</span>
                            <br>
                            <span class="text-sm font-light">
                                Veuillez remplir le formulaire ci-dessous.
                                Tous les éléments marqués <sup class="text-red-600">*</sup> sont obligatoires.
                            </span>
                        </p>
                    </div>
                    <div class="p-6">
                        <div>
                            <x-label for="starts_at" :value="__('Date')" :required="true"/>

                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input x-model="date" datepicker type="text" datepicker-format="yyyy-mm-dd" required
                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg
                                       focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5
                                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                       dark:text-white dark:focus:ring-blue-500
                                       dark:focus:border-blue-500"
                                       placeholder="Date de depart" name="date">
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-label for="duration" :value="__('Temps(Heure -> Minute)')" :required="true"/>

                            <div class="relative">
                                <div class="flex justify-start">
                                    <select x-model="hour" name="hour"
                                        class="mr-2 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg
                                       focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5
                                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                       dark:text-white dark:focus:ring-blue-500
                                       dark:focus:border-blue-500"
                                    >
                                        @for($i = 8; $i < 19; $i++)
                                            <option @selected($i == 8)>{{ $i < 10 ? "0$i" : $i }}</option>
                                        @endfor
                                    </select>
                                    <select x-model="minutes" name="minutes"
                                        class="ml-2 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg
                                       focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5
                                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                       dark:text-white dark:focus:ring-blue-500
                                       dark:focus:border-blue-500"
                                    >
                                        @for($i = 0; $i < 60; $i++)
                                            <option @selected($i == 0)>{{ $i < 10 ? "0$i" : $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-label for="duration" :value="__('Duree(en jours)')" :required="true"/>

                            <div class="relative">
                                <input x-model="duration" type="number" required name="duration"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg
                                       focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5
                                       dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                       dark:text-white dark:focus:ring-blue-500
                                       dark:focus:border-blue-500"
                                       placeholder="E.g 2" min="1" max="90">
                            </div>
                        </div>
                        <div class="block font-medium text-sm text-gray-700 my-4">
                            <span class="font-semibold">Coût Final:</span>
                            <span x-text="`${pricing * duration} XOF`"></span>
                            <div x-show="errors.length > 0" class="mt-4">
                                <div class="text-red-700">Attention!</div>
                                <ul>
                                    <template x-for="(e, i) in errors" x-key="i">
                                        <li x-text="e"></li>
                                    </template>
                                </ul>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button :disabled="disableSubmit" @@click.prevent="submit" class="ml-4 block text-sm text-slate-500
                                  p-2
                                  rounded-md border-0
                                  text-sm font-semibold
                                  bg-violet-700 text-violet-50
                                  hover:bg-violet-600">
                                {{ __('Confirmer') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
