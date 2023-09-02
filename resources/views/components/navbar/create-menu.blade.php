<div
    x-data="usePopper({placement:'bottom-start',offset:4})"
    @click.outside="if(isShowPopper) isShowPopper = false"
    class="inline-flex  ml-2">
    <button
        x-ref="popperRef"
        @click="isShowPopper = !isShowPopper"
        class="">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500 dark:text-navy-100"
             fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
        </svg>
    </button>
    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
        <div
            class="w-72  popper-box rounded-md border border-slate-150 bg-white p-4 font-inter dark:border-navy-500 dark:bg-navy-700">
            <ul>
                <li>
                    <x-app-partials.nav-link href="{{ route('customer.create') }}">
                        {{ __('navbar.create.customer') }}
                    </x-app-partials.nav-link>
                </li>
                <li class="mt-4">
                    <x-app-partials.nav-link href="{{ route('courier.create') }}">
                        {{ __('navbar.create.courier') }}
                    </x-app-partials.nav-link>
                </li>
                <li class="mt-4">
                    <x-app-partials.nav-link href="{{ route('order.create') }}">
                        {{ __('navbar.create.order') }}
                    </x-app-partials.nav-link>
                </li>
                <li class="mt-4">
                    <x-app-partials.nav-link href="{{ route('route.create') }}">
                        {{ __('navbar.create.route') }}
                    </x-app-partials.nav-link>
                </li>

                <li class="mt-4">
                    <x-app-partials.nav-link href="{{ route('event.create') }}">
                        {{ __('navbar.create.event') }}
                    </x-app-partials.nav-link>
                </li>

                <li class="mt-4">
                    <x-app-partials.nav-link href="{{ route('container.create') }}">
                        {{ __('navbar.create.container') }}
                    </x-app-partials.nav-link>
                </li>
                @can('is_admin', auth()->user())
                    <li class="mt-4">
                        <x-app-partials.nav-link href="{{ route('user.create') }}">
                            {{ __('navbar.create.user') }}
                        </x-app-partials.nav-link>
                    </li>
                @endcan
                <li class="mt-4">
                    <x-app-partials.nav-link href="{{ route('contact.create') }}">
                        {{ __('navbar.create.contact') }}
                    </x-app-partials.nav-link>
                </li>
            </ul>
        </div>
    </div>
</div>
