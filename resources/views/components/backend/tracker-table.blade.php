@if( isset($module->trackers) && count($module->trackers) )
    <h2 class="text-xl mt-4  text-slate-600 dark:text-navy-100">
        {{ __('general.operator_action') }}
    </h2>
    <table class="table-auto w-full">
        <tbody>
        @foreach($module->trackers as $tracker)
            <tr class="text-sm border-b-2 border-slate-200">
                <td class="p-2 w-2/4">
                    {{ $tracker->user->name }}
                </td>
                <td class="p-2 w-1/4">
                    {{ __('general.action.'.$tracker->action) }}
                </td>
                <td class="p-2 w-1/4 text-right">
                    {{ $tracker->created_at->format('d/m/Y') }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
