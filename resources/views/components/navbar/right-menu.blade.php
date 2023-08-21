<div class="inline-flex items-center">
    <div class="ml-4">
        <x-app-partials.nav-link href="{{ route('courier.index') }}">
            {{ __('navbar.couriers') }}
        </x-app-partials.nav-link>
    </div>

    @can('is_admin', auth()->user())
        <div class="ml-4">
            <x-app-partials.nav-link href="{{ route('route.index') }}">
                {{ __('navbar.routes') }}
            </x-app-partials.nav-link>
        </div>
    @endcan

    <div class="ml-4 mr-8">
        <x-app-partials.nav-link href="{{ route('event.index') }}">
            {{ __('navbar.events') }}
        </x-app-partials.nav-link>
    </div>

    <x-navbar.create-menu/>
    <x-navbar.user-menu/>
</div>
