<div>
    <div class="w-full">
        <form class="w-full">
            @csrf
            <div class="space-y-8 divide-y divide-gray-200">
                <div>
                    <div>
                        <h3 class="text-xl font-medium leading-6 text-gray-900">Personal Information </h3>
                    </div>
                    <div class="grid grid-cols-1 mt-2 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <label for="new_first-name"
                                class="block text-sm font-medium text-gray-700"> Name </label>
                            <div class="mt-1">
                                <input type="text"
                                    wire:model.defer="new_name"
                                    name="new_first-name"
                                    id="new_first-name"
                                    autocomplete="new_given-name"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('new_name')
                                <span class="text-sm italic text-red-600 ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="new_last-name"
                                class="block text-sm font-medium text-gray-700">Email </label>
                            <div class="mt-1">
                                <input type="text"
                                    wire:model.defer="new_email"
                                    name="new_last-name"
                                    id="new_last-name"
                                    autocomplete="new_family-name"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('new_email')
                                <span class="text-sm italic text-red-600 ">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="sm:col-span-6">
                            <label for="new_user_type"
                                class="block text-sm font-medium text-gray-700"> User Type </label>
                            <div class="mt-1">
                                <select id="new_user_type"
                                    name="new_user_type"
                                    wire:model.defer="new_user_type"
                                    autocomplete="new_user_type-name"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="student">Student</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="office-admin">Office Administrator</option>
                                </select>
                            </div>
                            @error('new_user_type')
                                <span class="text-sm italic text-red-600 ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="new_campus"
                                class="block text-sm font-medium text-gray-700"> Campus </label>
                            <div class="mt-1">
                                <select id="new_campus"
                                    wire:model="new_campus"
                                    name="new_campus"
                                    autocomplete="new_campus-name"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value=""></option>
                                    @foreach ($campuses as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('new_campus')
                                <span class="text-sm italic text-red-600 ">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button x-on:click="action='none'"
                        type="button"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                    <button wire:click.prevent="updateUser()"
                        type="submit"
                        class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                </div>
            </div>
        </form>


    </div>

</div>
