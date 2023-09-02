<x-admin-layout title="Login">
    <main class="grid w-full grow grid-cols-1 place-items-center">
        <div class="w-full max-w-[26rem] p-4 sm:px-5">
            <div class="text-center">
                {{--                <img class="mx-auto h-16 w-16 " src="{{asset('images/app-logo.svg')}}" alt="logo"/>--}}
                <div class="mt-4">
                    <p class="logo text-4xl tracking-tight font-semibold  text-slate-700 dark:text-navy-100 lette">
                        {{ config('app.name') }}
                    </p>
                    <p class="text-slate-400 dark:text-navy-300">
                        {{ __('auth.enter_system') }}
                    </p>
                </div>
            </div>
            <form class="mt-10" action="{{ route('admin.login') }}" method="post">
                @method('POST') @csrf
                <div>
                    <label class="relative flex">
                        <input
                            class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                            placeholder="Username or email" type="text" name="email"
                            value="{{ old('email') ?? 'alex@gmail.com' }}"/>
                        <span
                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </span>
                    </label>
                    @error('email')
                    <span class="text-tiny+ text-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="relative flex">
                        <input
                            class="form-input peer w-full rounded-lg bg-slate-150 px-3 py-2 pl-9 ring-primary/50 placeholder:text-slate-400 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:ring-accent/50 dark:placeholder:text-navy-300 dark:hover:bg-navy-900 dark:focus:bg-navy-900"
                            placeholder="Password" type="password" name="password"
                            value="{{ old('password') ?? 'password' }}"/>
                        <span
                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </span>
                    </label>
                    @error('password')
                    <span class="text-tiny+ text-error">{{ $message }}</span>
                    @enderror
                </div>


                <x-forms.button-success class="w-full mt-4 ">
                    {{ __('auth.login') }}
                </x-forms.button-success>

                {{--                <div class="mt-4 text-center text-xs+">--}}
                {{--                    <p class="line-clamp-1">--}}
                {{--                        <span>Dont have Account?</span>--}}

                {{--                        <a class="text-primary transition-colors  dark:text-accent-light dark:hover:text-accent"--}}
                {{--                           href="{{ route('admin.register') }}">Create account</a>--}}
                {{--                    </p>--}}
                {{--                </div>--}}
            </form>
        </div>
    </main>
</x-admin-layout>
