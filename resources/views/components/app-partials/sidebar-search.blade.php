<x-app-partials.card>
    <h2 class="text-lg text-slate-500">Search Properties</h2>
    <x-app-partials.divider/>
    <form method="GET" action="{{ route('item.index') }}">
        <!-- Target -->
        <div class="mt-4">
            <x-forms.input-label for="status" value="Property Status"/>
            <x-forms.select name="target">
                <option value="">Any</option>
                @foreach($targets as $target)
                    <option
                        value="{{ $target }}" @selected(request('target') === $target)>{{ Str::ucfirst($target)  }}</option>
                @endforeach
            </x-forms.select>
        </div>

        <!-- Type -->
        <div class="mt-4">
            <x-forms.input-label for="status" value="Property Type"/>
            <x-forms.select name="type">
                <option value="">Any</option>
                @foreach($types as $type)
                    <option
                        value="{{ $type }}" @selected(request('type') === $type)>{{ Str::ucfirst($type)  }}</option>
                @endforeach
            </x-forms.select>
        </div>

        <!-- Bedrooms -->
        <div class="mt-4">
            <x-forms.input-label for="bedrooms" value="Bedrooms"/>
            <x-forms.select name="bedrooms">
                <option value="">Any</option>
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" @selected(request('bedrooms') == $i)>{{ $i }}</option>
                @endfor
            </x-forms.select>
        </div>

        <!-- Baths -->
        <div class="mt-4">
            <x-forms.input-label for="bathrooms" value="Bathrooms"/>
            <x-forms.select name="bathrooms">
                <option value="">Any</option>
                @for($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" @selected(request('bathrooms') == $i)>{{ $i }}</option>
                @endfor
            </x-forms.select>
        </div>

        <!-- Building Age -->
        <div class="mt-4">
            <x-forms.input-label for="building" value="Building Age"/>
            <x-forms.select name="building">
                <option value="">Any</option>
                @for($i = 5; $i <= 50; $i+=5)
                    <option value="{{ $i }}" @selected(request('building') == $i)>0-{{ $i }}</option>
                @endfor
            </x-forms.select>
        </div>
        <!-- Available -->
        <div class="mt-4">
            <x-forms.input-label for="available" value="Available From"/>
            <x-forms.select name="available">
                <option value="">Any</option>
                <option value="-1" @selected(request('available') == '-1')>Immediately</option>
                @for($i = 1; $i <= 12; $i++)
                    <option
                        value="{{ $i }}" @selected(request('available') == $i)>{{ $i }} {{ Str::plural('month', $i) }}</option>
                @endfor
            </x-forms.select>
        </div>
        <!-- Search Term -->
        <div class="mt-4">
            <x-forms.input-label for="search" value="Search Term"/>
            <x-forms.text-input name="search" value="{{ request('search') }}"/>
        </div>

        <!-- Area -->
        <div class="mt-4">
            <x-forms.input-label for="area" value="Area"/>
            <div x-data="{range:{{ request('area') ?? 0 }}}">
                <div class="flex justify-between">
                    <span>0</span>
                    <span>500 sqm</span>
                </div>
                <label class="block">
                    <input
                        x-model="range"
                        class="form-range text-slate-500 dark:text-navy-300"
                        type="range"
                        name="area"
                        max="500"
                        step="10"
                        value="{{ request('area') }}"
                    />
                </label>
                <div class="mt-2">
                    <p class="text-xs">Minimum: <span x-text="range"></span></p>
                </div>
            </div>
        </div>

        <!-- Pricing -->
        <div class="mt-4">
            <x-forms.input-label for="price" value="Price"/>
            <div x-data="{range:{{ request('price') ?? 0 }}}">
                <div class="flex justify-between">
                    <span>0</span>
                    <span>$5000000</span>
                </div>
                <label class="block">
                    <input
                        x-model="range"
                        class="form-range text-slate-500 dark:text-navy-300"
                        type="range"
                        name="price"
                        max="5000000"
                        step="10000"
                        value="{{ request('price') }}"
                    />
                </label>
                <div class="mt-2">
                    <p class="text-xs">Maximum: <span x-text="range"></span></p>
                </div>
            </div>
        </div>

        <div class="text-lg text-slate-500 mt-4">
            Features
        </div>
        <x-app-partials.divider/>
        @foreach($features as $feature)
            <div class="mt-2">
                <x-forms.checkbox name="{{ $feature }}" value="{{ request($feature) }}">
                    {{ Str::headline(Str::replace('_', ' ',$feature)) }}
                </x-forms.checkbox>
            </div>
        @endforeach
        <div>
            <x-forms.button-success class="w-full mt-4 ">
                Apply Filter
            </x-forms.button-success>
        </div>

        <div class="flex justify-center items-center mt-2">
            <a href="{{ route('item.index') }}" class="text-indigo-500 hover:underline">Reset Filter</a>
        </div>
    </form>
</x-app-partials.card>
