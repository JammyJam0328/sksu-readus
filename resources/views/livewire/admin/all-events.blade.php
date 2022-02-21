<div x-data="{action:''}"
    x-on:start-deleting.window="action='delete-confirmation'"
    x-on:notify.window="action = event.detail.nextAction">
    <div x-show="action==''">
        <section>
            <div class="flex w-full pb-2 space-x-2 border-b">
                <div class="w-1/3 mt-1">
                    <input type="text"
                        wire:model.debounce="searchTerm"
                        name="search"
                        id="search"
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Search . . .">
                </div>
                <div class="flex space-x-2">

                    <div>
                        <select id="location"
                            name="location"
                            class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="all">All</option>
                            <option value="upcoming">Upcoming</option>
                            <option value="happening">Happening</option>
                        </select>
                    </div>

                </div>
            </div>
        </section>
        <div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                            #</th>

                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                            Title</th>

                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                            Duration</th>
                                        <th scope="col"
                                            class="relative px-6 py-3">
                                            <span class="sr-only">Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($events as $key => $event)
                                        <tr class="{{ $key % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                {{ $key + 1 }}</td>

                                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                {{ $event->title }}</td>

                                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                {{ date('M d, Y H:s A', strtotime($event->start_date)) }}-
                                                {{ date('M d, Y H:s A', strtotime($event->end_date)) }}
                                            </td>
                                            <td
                                                class="flex justify-center px-6 py-4 space-x-2 text-sm font-medium whitespace-nowrap">
                                                <button type="button"
                                                    wire:click.prevent="editEvent('{{ $event->id }}')"
                                                    class="text-yellow-600 hover:text-yellow-900"><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                    </svg></button>
                                                <button wire:click.prevent="deleting('{{ $event->id }}')"
                                                    type="button"
                                                    class="text-red-600 hover:text-red-900"><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="w-5 h-5"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg></button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="bg-white">
                                            <td colspan="4"
                                                class="text-center">
                                                <h3>No Events Found</h3>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-2">
                {{ $events->links() }}
            </div>

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
                        <p class="px-8 text-sm text-gray-500">Do you really want to delete this account?
                            This process cannot be undone</p>
                </div>
                <!--footer-->
                <div class="p-3 mt-2 space-x-4 text-center md:block">
                    <button x-on:click="action='none'"
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
