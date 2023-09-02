<div>
    <div class="px-4 py-4 sm:px-5 bg-white">
        <div x-data="{ showModal: false, modalContent: '' }">
            @if(count($files) > 0)
                <table class="w-full text-left">
                    <tbody>
                    @foreach($files as $file)
                        <tr class="border border-transparent border-b-slate-200 dark:border-b-navy-500">
                            <td class="whitespace-nowrap py-3 ">
                                <button
                                    @click="showModal = true; modalContent = `<object data='{{ url("storage/{$file->url}") }}' type='application/pdf' width='100%' height='640px'></object>`"
                                    class="font-medium text-slate-800 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                    {{ $file->name }}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                {{ __('general.no_files')}}
            @endif
            <template x-if="showModal">
                <div
                    class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5">
                    <div
                        class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300"
                        x-on:click="showModal = false"></div>
                    <div
                        class="relative max-w-6xl w-full rounded-lg bg-white px-4 py-10 text-center transition-opacity duration-300 dark:bg-navy-700 sm:px-5">
                        <div class="mt-4">
                                                    <span x-html="modalContent">
                                                    </span>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
