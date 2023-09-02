<div class="flex justify-start w-full">
    <div class="ml-10">
        <x-app-partials.nav-link
            href="{{ route('admin.dashboard') }}">
            {{ __('navbar.dashboard') }}
        </x-app-partials.nav-link>
    </div>
    <div class="ml-4">
        <x-app-partials.nav-link
            href="{{ route('customer.index') }}">
            {{ __('navbar.customers') }}
        </x-app-partials.nav-link>
    </div>
    <div class="ml-4">
        <x-app-partials.nav-link
            href="{{ route('order.index') }}">
            {{ __('navbar.orders') }}
        </x-app-partials.nav-link>
    </div>
</div>
