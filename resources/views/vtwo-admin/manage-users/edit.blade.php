<div>

    <form>
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div class="space-y-6 sm:space-y-5">
                <div>
                    <h3 class="text-lg font-bold leading-6 text-gray-900">Update User Information</h3>
                </div>
                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="name"
                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Name </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="text"
                                wire:model.defer="new_name"
                                name="name"
                                id="name"
                                autocomplete="name"
                                class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm">
                            @error('new_name')
                                <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="email"
                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Email </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input type="email"
                                wire:model.defer="new_email"
                                name="email"
                                id="email"
                                autocomplete="email"
                                class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm">
                            @error('new_email')
                                <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="type"
                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> User Type </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select id="type"
                                wire:model.defer="new_type"
                                name="type"
                                autocomplete="type"
                                class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm">
                                <option value=""
                                    disabled
                                    selected>Select Type</option>
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                                <option value="office-admin">Office Admin</option>
                            </select>
                            @error('new_type')
                                <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="campus"
                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Campus </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select id="campus"
                                wire:model.defer="new_campus"
                                name="campus"
                                autocomplete="campus"
                                class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm">
                                <option value=""
                                    disabled
                                    selected>Select Campus</option>
                                @foreach ($campuses as $campus)
                                    <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                @endforeach
                            </select>
                            @error('new_campus')
                                <p class="text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <button wire:click="showList"
                    type="button"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                <button type="button"
                    wire:click.prevent="updateUser"
                    class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
            </div>
        </div>
    </form>

</div>
