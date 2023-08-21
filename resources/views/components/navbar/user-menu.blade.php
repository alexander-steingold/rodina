<div
    x-data="usePopper({placement:'bottom-start',offset:4})"
    @click.outside="if(isShowPopper) isShowPopper = false"
    class="inline-flex  ml-2">
    <button
        x-ref="popperRef"
        @click="isShowPopper = !isShowPopper"
        class="">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 shrink-0" fill="none"
             viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-width="2"
                  d="M5 19.111c0-2.413 1.697-4.468 4.004-4.848l.208-.035a17.134 17.134 0 015.576 0l.208.035c2.307.38 4.004 2.435 4.004 4.848C19 20.154 18.181 21 17.172 21H6.828C5.818 21 5 20.154 5 19.111zM16.083 6.938c0 2.174-1.828 3.937-4.083 3.937S7.917 9.112 7.917 6.937C7.917 4.764 9.745 3 12 3s4.083 1.763 4.083 3.938z"></path>
        </svg>
    </button>
    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
        <div
            class="w-72 popper-box rounded-md border border-slate-150 bg-white p-2 font-inter dark:border-navy-500 dark:bg-navy-700">
            <div class="p-2 flex items-center justify-start space-x-2">
                <div>
                    {{ Auth::user()->name }}
                </div>
            </div>
            <ul>
                @can('is_admin', auth()->user())
                    <li>
                        <x-app-partials.dropdown-link :href="route('user.index')">
                            {{ __('navbar.users') }}
                        </x-app-partials.dropdown-link>
                    </li>
                    <li>
                        <x-app-partials.dropdown-link :href="route('report.index')">
                            {{ __('navbar.reports') }}
                        </x-app-partials.dropdown-link>
                    <li>
                @endcan
            </ul>
            <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
            <ul>
                <li>
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <x-app-partials.dropdown-link :href="route('admin.logout')"
                                                      onclick="event.preventDefault();
                                                                                   this.closest('form').submit();">
                            {{ __('auth.logout') }}
                        </x-app-partials.dropdown-link>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
