<div x-data="{action:'none',deleting:false}"
    class="w-full"
    x-on:notify.window="action = event.detail.nextAction"
    x-on:start-editing.window="action='edit-user'"
    x-on:start-deleting.window="deleting = true"
    x-on:end-deleting.window="deleting = false">
    {{-- <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="p-4 mb-2 rounded-md bg-green-50">
        <div class="flex">
            <div class="flex-shrink-0">
                <!-- Heroicon name: solid/check-circle -->
                <svg class="w-5 h-5 text-green-400"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800">Successfully uploaded</p>
            </div>
            <div class="pl-3 ml-auto">
                <div class="-mx-1.5 -my-1.5">
                    <button type="button"
                        class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
                        <span class="sr-only">Dismiss</span>
                        <!-- Heroicon name: solid/x -->
                        <svg class="w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div> --}}

    <div x-show="action=='none'"
        x-collapse
        class="w-full">
        @include('admin-pages.components.user.user-list')
    </div>
    <div x-cloak
        x-show="action=='create-user'"
        class="w-full">
        @include('admin-pages.components.user.create-user')
    </div>
    <div x-cloak
        x-show="action=='edit-user'"
        class="w-full">
        @include('admin-pages.components.user.edit-user')
    </div>
    <div x-cloak
        x-show="deleting"
        class="fixed inset-0 top-0 left-0 z-50 flex items-center justify-center h-screen bg-center bg-no-repeat bg-cover outline-none min-w-screen animated fadeIn faster focus:outline-none"
        id="modal-id">
        <div class="absolute inset-0 z-0 bg-black opacity-80"></div>
        <div class="relative w-full max-w-lg p-5 mx-auto my-auto bg-white shadow-lg rounded-xl ">
            <div class="">
                <div class="justify-center flex-auto p-5 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="flex items-center w-4 h-4 mx-auto -m-1 text-red-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="flex items-center w-16 h-16 mx-auto text-red-500"
                        viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <h2 class="py-4 text-xl font-bold ">Are you sure?</h3>
                        <p class="px-8 text-sm text-gray-500">Do you really want to delete this account?
                            This process cannot be undone</p>
                </div>
                <!--footer-->
                <div class="p-3 mt-2 space-x-4 text-center md:block">
                    <button x-on:click="deleting=false"
                        class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-gray-600 bg-white border rounded-full shadow-sm md:mb-0 hover:shadow-lg hover:bg-gray-100">
                        Cancel
                    </button>
                    <button wire:click.prevent="deleteUser"
                        class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white bg-red-500 border border-red-500 rounded-full shadow-sm md:mb-0 hover:shadow-lg hover:bg-red-600">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
