<div class="overflow-x-auto">
    <table class="is-hoverable w-full text-left">
        <thead>
        <tr class="border border-transparent border-b-slate-200 dark:border-b-navy-500">

            <th class="whitespace-nowrap px-3 py-6 font-semibold  text-slate-800 dark:text-navy-100 lg:px-5 w-1/4">
                {{ __('general.user.first_name') }}
            </th>
            <th class="whitespace-nowrap px-3 py-6 font-semibold  text-slate-800 dark:text-navy-100 lg:px-5 w-1/5">
                {{ __('general.user.phone') }}
            </th>

            <th class="whitespace-nowrap px-3 py-6 font-semibold  text-slate-800 dark:text-navy-100 lg:px-5 w-1/5">
                {{ __('general.user.status') }}
            </th>

            <th class="whitespace-nowrap px-3 py-6 font-semibold  text-slate-800 dark:text-navy-100 lg:px-5 w-1/5">
                {{ __('general.operator') }}
            </th>

            <th class="whitespace-nowrap px-3 py-6 font-semibold  text-slate-800 dark:text-navy-100 lg:px-5 w-1/5">
                {{ __('general.date') }}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($quotes as $quote)
            <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                <td class="whitespace-nowrap px-4 py-6 sm:px-5 text-slate-700 ">
                    <div class="flex items-center space-x-4">
                        {{ $quote->name }}
                    </div>
                </td>
                <td class="whitespace-nowrap px-4 py-6 sm:px-5 text-slate-700 ">
                    <div class="flex items-center space-x-4">
                        {{ $quote->phone }}
                    </div>
                </td>
                <td class="whitespace-nowrap px-4 py-6 sm:px-5 text-slate-700 ">
                    <div class="flex items-center space-x-4">
                        {{--                        <form action="{{ route('quote.update', $quote) }}" method="POST">--}}
                        {{--                            @csrf--}}
                        {{--                            @method('PUT')--}}

                        {{--                            <input--}}
                        {{--                                name="status"--}}
                        {{--                                class="form-switch h-5 w-10 rounded-full bg-slate-300 before:rounded-full before:bg-slate-50 checked:!bg-success checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:before:bg-white"--}}
                        {{--                                type="checkbox"--}}
                        {{--                                {{ $quote->status == 'completed' ? 'checked' : '' }}--}}
                        {{--                            />--}}
                        {{--                        </form>--}}
                        <div x-data="{ status: {{ $quote->status == 'completed' ? 'true' : 'false' }} }">
                            <form action="{{ route('quote.update', $quote) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <input
                                    name="status"
                                    type="hidden"
                                    x-bind:value="status ? 'completed' : 'waiting'"
                                />
                                <input
                                    name="status_checkbox"
                                    class="form-switch h-5 w-10 rounded-full bg-slate-300 before:rounded-full before:bg-slate-50 checked:!bg-success checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:before:bg-white"
                                    type="checkbox"
                                    x-model="status"
                                    x-on:change=$event.target.form.submit()
                                />
                            </form>
                        </div>
                    </div>
                </td>

                <td class="whitespace-nowrap px-4 py-6 sm:px-5 text-slate-700 ">
                    <div class="flex items-center space-x-4">
                        @if($quote->lastTracker)
                            {{ $quote->lastTracker->user->name }}
                        @else
                            {{ __('general.website_request') }}
                        @endif
                    </div>
                </td>
                <td class="whitespace-nowrap px-4 py-6 sm:px-5 text-slate-700 ">
                    <div class="flex items-center  space-x-4">
                        {{ date('d/m/Y', strtotime( $quote->created_at)) }}
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script>
    function submitForm() {
        const form = document.querySelector('#quoteForm');
        form.submit();
    }
</script>
