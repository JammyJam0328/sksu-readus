<div x-data="{option:false}"
    x-on:open-option.window="option=true"
    x-on:close-option.window="option=false">
    <div x-cloak
        x-show="option"
        class="fixed inset-0 z-50 overflow-y-auto"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="option"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
                aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                aria-hidden="true">&#8203;</span>

            <div x-show="option"
                x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                x-transition:enter-start="translate-y-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full px-4 pb-4 overflow-hidden text-left align-bottom transition-all transform rounded-lg shadow-xl bg-gray-50 sm:my-8 sm:align-middle sm:max-w-sm">
                <div class="">
                    <h1 class="text-2xl font-extrabold text-center ">-</h1>
                </div>
                <div class="grid w-full space-y-2">
                    <a href="{{ route('view-announcement', [
                        'announcement_id' => \Crypt::encrypt($set_id),
                    ]) }}"
                        type="button"
                        class="items-center px-4 py-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">View
                    </a>
                    @if ($owner_id == auth()->user()->id)
                        <button type="button"
                            class="items-center px-4 py-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit
                        </button>
                        <button wire:click.prevent="deleteConfirmation"
                            type="button"
                            class="items-center px-4 py-2 text-sm font-medium text-center text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Delete
                        </button>
                    @endif
                    <button x-on:click="option=false"
                        type="button"
                        class="items-center px-4 py-2 text-sm font-medium text-center text-red-700 bg-white border border-red-300 rounded-md shadow-sm hover:bg-red-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Cancel
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
