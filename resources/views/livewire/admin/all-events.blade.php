<div x-data="{action:''}"
    x-on:start-deleting.window="action='delete-confirmation'"
    x-on:notify.window="action = event.detail.nextAction"
    x-on:start-editing.window="action = 'edit'">
    <div x-show="action==''">
        @include('admin-pages.components.event.event-list')
    </div>
    <div x-cloak
        x-show="action=='create'">
        <div>
            <form>
                <div class="space-y-8 divide-y divide-gray-200">
                    <div>
                        <div>
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Create Event</h3>
                        </div>
                        <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-6">
                                <label for="title"
                                    class="block text-sm font-medium text-gray-700"> Title </label>
                                <div class="mt-1">
                                    <input type="text"
                                        wire:model.defer="title"
                                        name="title"
                                        id="title"
                                        autocomplete="title"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('title')
                                        <p class="text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-6">
                                <label for="description"
                                    class="block text-sm font-medium text-gray-700"> Description </label>
                                <div class="mt-1">
                                    <textarea rows="4"
                                        wire:model.defer="description"
                                        name="description"
                                        id="description"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                    @error('description')
                                        <p class="text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="date_start"
                                    class="block text-sm font-medium text-gray-700"> Starting Date </label>
                                <div class="mt-1">
                                    <input type="datetime-local"
                                        wire:model.defer="start_date"
                                        name="date_start"
                                        id="date_start"
                                        autocomplete="date_start"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('start_date')
                                        <p class="text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="end_date"
                                    class="block text-sm font-medium text-gray-700"> End Date </label>
                                <div class="mt-1">
                                    <input type="datetime-local"
                                        wire:model.defer="end_date"
                                        name="end_date"
                                        id="end_date"
                                        autocomplete="end_date"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('end_date')
                                        <p class="text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="publicity"
                                    class="block text-sm font-medium text-gray-700"> Publicity </label>
                                <div class="mt-1">
                                    <select id="publicity"
                                        wire:model.defer="publicity"
                                        name="publicity"
                                        autocomplete="publicity"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="All">All</option>
                                        @foreach ($publicities as $publicity)
                                            <option value="{{ $publicity->id }}">{{ $publicity->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('publicity')
                                        <p class="text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        <button x-on:click="action=''"
                            type="button"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                        <button wire:click.prevent="createEvent"
                            type="button"
                            class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div x-cloak
        x-show="action=='edit'">
        <div>
            <form>
                <div class="space-y-8 divide-y divide-gray-200">
                    <div>
                        <div>
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Update Event</h3>
                        </div>
                        <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-6">
                                <label for="title"
                                    class="block text-sm font-medium text-gray-700"> Title </label>
                                <div class="mt-1">
                                    <input type="text"
                                        wire:model.defer="new_title"
                                        name="title"
                                        id="title"
                                        autocomplete="title"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('new_title')
                                        <p class="text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-6">
                                <label for="description"
                                    class="block text-sm font-medium text-gray-700"> Description </label>
                                <div class="mt-1">
                                    <textarea rows="4"
                                        wire:model.defer="new_description"
                                        name="description"
                                        id="description"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                    @error('new_description')
                                        <p class="text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="date_start"
                                    class="block text-sm font-medium text-gray-700"> Starting Date </label>
                                <div class="mt-1">
                                    <input type="datetime-local"
                                        wire:model.defer="new_start_date"
                                        name="date_start"
                                        id="date_start"
                                        autocomplete="date_start"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('new_start_date')
                                        <p class="text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="end_date"
                                    class="block text-sm font-medium text-gray-700"> End Date </label>
                                <div class="mt-1">
                                    <input type="datetime-local"
                                        wire:model.defer="new_end_date"
                                        name="end_date"
                                        id="end_date"
                                        autocomplete="end_date"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @error('new_end_date')
                                        <p class="text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <label for="publicity"
                                    class="block text-sm font-medium text-gray-700"> Publicity </label>
                                <div class="mt-1">
                                    <select id="publicity"
                                        wire:model.defer="new_publicity"
                                        name="publicity"
                                        autocomplete="publicity"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="All">All</option>
                                        @foreach ($publicities as $publicity)
                                            <option value="{{ $publicity->id }}">{{ $publicity->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('new_publicity')
                                        <p class="text-red-500">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        <button x-on:click="action=''"
                            type="button"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                        <button wire:click.prevent="update"
                            type="button"
                            class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div x-cloak
        x-show="action=='delete-confirmation'"
        class="fixed inset-0 top-0 left-0 z-50 flex items-center justify-center h-screen bg-center bg-no-repeat bg-cover outline-none min-w-screen animated fadeIn faster focus:outline-none"
        id="modal-id">
        <div class="absolute inset-0 z-0 bg-black opacity-80"></div>
        <div class="relative w-full max-w-lg p-5 mx-auto my-auto bg-white shadow-lg rounded-xl ">
            <!--content-->
            <div class="">
                <!--body-->
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
                        <p class="px-8 text-sm text-gray-500">Do you really want to delete this event?
                            This process cannot be undone</p>
                </div>
                <!--footer-->
                <div class="p-3 mt-2 space-x-4 text-center md:block">
                    <button x-on:click="action=''"
                        class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-gray-600 bg-white border rounded-full shadow-sm md:mb-0 hover:shadow-lg hover:bg-gray-100">
                        Cancel
                    </button>
                    <button wire:click.prevent="deleteEvent"
                        class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white bg-red-500 border border-red-500 rounded-full shadow-sm md:mb-0 hover:shadow-lg hover:bg-red-600">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
