<div>
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
            <div class="mt-1">
                <button x-on:click="action='create'"
                    type="button"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Add Event
                </button>
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

                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $event->title }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ date('M d, Y H:s A', strtotime($event->start_date)) }}-
                                            {{ date('M d, Y H:s A', strtotime($event->end_date)) }}
                                        </td>
                                        <td
                                            class="flex justify-center px-6 py-4 space-x-2 text-sm font-medium whitespace-nowrap">
                                            <button wire:click.prevent="edit('{{ $event->id }}')"
                                                type="button"
                                                class="text-yellow-600 hover:text-yellow-900">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-5 h-5"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
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
