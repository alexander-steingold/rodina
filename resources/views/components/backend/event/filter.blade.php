<form action="{{ route('event.index') }}" method="get">
    <div class="grid grid-cols-3 flex items-center">
        <div class="col-span-1">
            <button type="button" @click="$dispatch('show-drawer', { drawerId: 'left-drawer' })"
                    class="btn h-6 w-6 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                </svg>
            </button>
        </div>
        <div class="flex items-center w-full col-span-2">
            <div class="flex items-center w-full border border-slate-200">
                <div class="mt-1 ml-2 font-medium">
                    {{ __('general.the_year') }}
                </div>
                <x-forms.select name="year" class="border-0 ">
                    <option value=""></option>
                    @for($i=2023; $i<2033; $i++)
                        <option value="{{ $i }}" @selected(request('year') == $i)>
                            {{ $i }}
                        </option>
                    @endfor
                </x-forms.select>
            </div>

            <div class="flex items-center w-full border border-slate-200 ml-2">
                <div class="mt-1 ml-2 font-medium">
                    {{ __('general.the_month') }}
                </div>
                <x-forms.select name="month" class="border-0">
                    <option value=""></option>
                    @for($i=1; $i<=12; $i++)
                        <option value="{{ $i }}" @selected(request('month') == $i)>
                            {{ $i }}
                        </option>
                    @endfor
                </x-forms.select>
            </div>

            <div class="flex items-center w-full border border-slate-200 ml-2">
                <div class="mt-1 ml-2 font-medium">
                    {{ __('general.route.route') }}
                </div>
                <x-forms.select name="route_id" class="border-0">
                    <option value=""></option>
                    @foreach($routes as $route)
                        <option value="{{ $route->id }}" @selected(request('route_id') == $route->id )>
                            {{ $route->title }}
                        </option>
                    @endforeach
                </x-forms.select>
            </div>
            <div class="flex items-center w-full border border-slate-200 ml-2 mr-2">
                <div class="mt-1 ml-2 font-medium">
                    {{ __('general.courier.courier') }}
                </div>
                <x-forms.select name="courier_id" class="border-0">
                    <option value=""></option>
                    @foreach($couriers as $courier)
                        <option value="{{ $courier->id }}" @selected(request('courier_id') == $courier->id )>
                            {{ $courier->first_name }}  {{ $courier->last_name }}
                        </option>
                    @endforeach
                </x-forms.select>
            </div>
            <button
                class="btn h-8 w-8 rounded-full text-success p-2 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                </svg>
            </button>


            <a href="{{ route('event.index') }}"
               class="btn h-8 w-8 rounded-full text-slate-700 p-2 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-6 6m0 0l-6-6m6 6V9a6 6 0 0112 0v3"/>
                </svg>

            </a>
        </div>
    </div>
</form>
<x-app-partials.divider class="mt-6"/>
