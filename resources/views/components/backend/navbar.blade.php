@auth()
    <nav class="w-full h-18 bg-white border-b  border-slate-100  shadow-sm z-50 ">
        <x-app-partials.container class="flex  items-center h-full justify-between ">
            <a href="{{ url('/') }}">
                <x-app-partials.application-logo/>
            </a>
            <div class="flex items-center w-full justify-between">
                <x-navbar.left-menu/>
                <x-navbar.right-menu/>
            </div>
        </x-app-partials.container>
    </nav>
@endauth
