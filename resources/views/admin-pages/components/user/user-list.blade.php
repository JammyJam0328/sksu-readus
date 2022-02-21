<div class="flex items-center justify-between mb-2">

    <button x-on:click="action='create-user'"
        type="button"
        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Add New User
        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5 ml-2 -mr-1"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
    </button>
    <div class="md:w-1/4">
        <div class="mt-1">
            <input type="text"
                wire:model.debounce="searchTerm"
                name="seach"
                id="seach"
                class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="Search">
        </div>
    </div>
</div>

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-700">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                Name</th>

                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                Email</th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                Role</th>
                            <th scope="col"
                                class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr class="{{ $key % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                    {{ $user->name }}</td>

                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ $user->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap"> {{ $user->role_type }}
                                </td>
                                <td
                                    class="flex justify-center px-6 py-4 space-x-2 text-sm font-medium whitespace-nowrap">
                                    <button type="button"
                                        wire:click.prevent="editUser('{{ $user->id }}')"
                                        class="text-yellow-600 hover:text-yellow-900"><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5"
                                            viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg></button>
                                    <button wire:click.prevent="deleting('{{ $user->id }}')"
                                        type="button"
                                        class="text-red-600 hover:text-red-900"><svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5"
                                            viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg></button>
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
            <div class="py-2">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
