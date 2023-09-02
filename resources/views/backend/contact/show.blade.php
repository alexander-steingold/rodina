<x-admin-layout title="{{ __('general.contact.contact_profile') }}">
    <div
        class="grid lg:gap-6 lg:grid cols-2  sm:grid-cols-2 sm:mb-4 xs:mb-4">
        <div>
            <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
                {{ __('general.contact.contact_profile') }}
            </h2>
        </div>
        <div class="flex lg:justify-end sm:justify-end">
            <x-app-partials.link-button class="text-xs uppercase font-medium py-1.5"
                                        href="{{ route('contact.edit', $contact) }}"
                                        type="success">
                {{--                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"--}}
                {{--                     stroke="currentColor" stroke-width="2">--}}
                {{--                    <path stroke-linecap="round" stroke-linejoin="round"--}}
                {{--                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>--}}
                {{--                </svg>--}}
                {{ __('general.contact.edit_contact') }}
            </x-app-partials.link-button>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-3 ">
        <div class="col-span-2">
            <x-app-partials.card class="p-6">

                <div class="grid gap-x-6 gap-y-4 lg:grid-cols-2">
                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ $contact->name }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.first_name') }}
                            {{ __('general.user.last_name') }}
                        </p>
                    </div>

                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{$contact->title }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.title') }}
                        </p>
                    </div>

                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ $contact->email }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.email') }}
                        </p>
                    </div>

                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ $contact->mobile }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.mobile') }}
                        </p>
                    </div>

                    <div>
                        <h3 class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                            {{ $contact->created_at->format('d/m/Y') }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.created_at') }}
                        </p>
                    </div>
                    <div class="lg:col-span-2">
                        <h3 class="font-medium text-slate-700  dark:text-navy-100">
                            {{ $contact->remarks }}
                        </h3>
                        <p class="text-sm font-medium line-clamp-1 text-success">
                            {{ __('general.user.remarks') }}
                        </p>
                    </div>
                </div>
            </x-app-partials.card>
        </div>
        <div>

        </div>
    </div>
</x-admin-layout>
