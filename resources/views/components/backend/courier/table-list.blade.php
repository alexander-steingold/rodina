<div class="overflow-x-auto">
    <table class="is-hoverable w-full text-left">
        <thead>
        <tr class="border border-transparent border-b-slate-200 dark:border-b-navy-500">
            <th class="whitespace-nowrap px-3 py-6 font-semibold  text-slate-800 dark:text-navy-100 lg:px-5 w-1/6">
                {{ __('general.user.first_name') }}
            </th>
            <th class="whitespace-nowrap px-3 py-6 font-semibold  text-slate-800 dark:text-navy-100 lg:px-5 w-1/6">
                {{ __('general.user.last_name') }}
            </th>
            <th class="whitespace-nowrap px-3 py-6 font-semibold  text-slate-800 dark:text-navy-100 lg:px-5 w-1/6">
                {{ __('general.order.orders') }}
            </th>
            <th class="whitespace-nowrap px-3 py-6 font-semibold  text-slate-800 dark:text-navy-100 lg:px-5 w-1/6">
                {{ __('general.user.status') }}
            </th>
            <th class="whitespace-nowrap px-3 py-6 font-semibold  text-slate-800 dark:text-navy-100 lg:px-5 w-1/6">
                {{ __('general.user.created_at') }}
            </th>
            <th class="whitespace-nowrap px-3 py-6 font-semibold  text-slate-800 dark:text-navy-100 lg:px-5 w-1/6">
                {{ __('general.actions') }}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($couriers as $courier)
            <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                <td class="whitespace-nowrap px-4 py-6 sm:px-5 text-slate-700 ">
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('courier.show', $courier) }}">
                            {{ $courier->first_name }}
                        </a>
                    </div>
                </td>
                <td class="whitespace-nowrap px-4 py-6 sm:px-5 text-slate-700 ">
                    <div class="flex items-center space-x-4">
                        {{ $courier->last_name }}
                    </div>
                </td>
                <td class="whitespace-nowrap px-4 py-6 sm:px-5 text-slate-700 ">
                    <div class="flex items-center justify-center space-x-4">
                        {{ $courier->orders_count }}
                    </div>
                </td>
                <td class="whitespace-nowrap px-4 py-6 sm:px-5 text-slate-700">
                    <div class="flex items-center justify-center space-x-4">
                        @if($courier->status->value == 'active')
                            <div class="h-3.5 w-3.5 rounded-full border-2 border-success"></div>
                        @else
                            <div class="h-3.5 w-3.5 rounded-full border-2 border-error"></div>
                        @endif
                    </div>
                </td>
                <td class="whitespace-nowrap px-4 py-6 sm:px-5 text-slate-700">
                    <div class="flex items-center space-x-4">
                        {{ $courier->created_at->format('d/m/Y') }}
                    </div>
                </td>
                <td class="whitespace-nowrap px-4 py-6 sm:px-5 text-slate-700">
                    <div class="flex items-center justify-center space-x-2">
                        <a href="{{ route('courier.show', $courier) }}"
                           title="{{ __('general.courier.courier_profile') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mt-px h-4.5 w-4.5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </a>
                        <a href="{{ route('courier.edit', $courier) }}"
                           title="{{ __('general.courier.edit_courier') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                        </a>
                        <form action="{{ route('courier.destroy', $courier) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-red-500" fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@isset( $couriers)
    <div class=" mt-6">
        @if(method_exists($couriers, 'links'))
            {{ $couriers->links('vendor.pagination.tailwind') }}
        @endif
    </div>
@endif
