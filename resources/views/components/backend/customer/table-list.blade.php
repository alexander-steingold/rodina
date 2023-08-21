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
                {{--                {{ __('general.actions') }}--}}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                <td class="whitespace-nowrap px-4 py-6 sm:px-5 text-slate-700 ">
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('customer.show', $customer) }}">
                            {{ $customer->first_name }}
                        </a>
                    </div>
                </td>
                <td class="whitespace-nowrap px-4 py-6 sm:px-5 text-slate-700 ">
                    <div class="flex items-center space-x-4">
                        {{ $customer->last_name }}
                    </div>
                </td>
                <td class="whitespace-nowrap px-4 py-6 sm:px-5 text-slate-700 ">
                    <div class="flex items-center justify-center space-x-4">
                        {{ $customer->orders_count }}
                    </div>
                </td>
                <td class="whitespace-nowrap px-4 py-6 sm:px-5 text-slate-700">
                    <div class="flex items-center justify-center space-x-4">
                        @if($customer->status->value == 'active')
                            <div class="h-3.5 w-3.5 rounded-full border-2 border-success"></div>
                        @else
                            <div class="h-3.5 w-3.5 rounded-full border-2 border-error"></div>
                        @endif
                    </div>
                </td>
                <td class="whitespace-nowrap px-4 py-6 sm:px-5 text-slate-700">
                    <div class="flex items-center space-x-4">
                        {{ $customer->created_at->format('d/m/Y') }}
                    </div>
                </td>
                <td class="whitespace-nowrap px-4 py-6 sm:px-5 text-slate-700">
                    <div class="flex items-center justify-center space-x-2">
                        <a href="{{ route('customer.show', $customer) }}"
                           title="{{ __('general.customer.customer_profile') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mt-px h-4.5 w-4.5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </a>
                        <a href="{{ route('customer.edit', $customer) }}"
                           title="{{ __('general.customer.edit_customer') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                        </a>


                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@isset( $customers)
    <div class=" mt-6">
        @if(method_exists($customers, 'links'))
            {{ $customers->links('vendor.pagination.tailwind') }}
        @endif
    </div>
@endif
