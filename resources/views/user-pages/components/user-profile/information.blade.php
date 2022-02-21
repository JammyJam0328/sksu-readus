<div>
    <div x-show="action=='none'"
        class="p-5">
        <div class="max-w-5xl px-4 mx-auto mt-2 sm:px-4 lg:px-4">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Name
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $user->name }}
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Email
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $user->email }}
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Sex
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $user->information->sex ? $user->information->sex : 'Not Set' }}
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Birth Date
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $user->information->birthdate ? $user->information->birthdate : 'Not Set' }}
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Address
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $user->information->address ? $user->information->address : 'Not Set' }}
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Course
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{-- check if user information has program --}}
                        @if ($user->information->program)
                            {{ $user->information->program->name }}
                        @else
                            {{ 'Not Set' }}
                        @endif
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Campus
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        @if ($user->information->campus)
                            {{ $user->information->campus->name }}
                        @else
                            {{ 'Not Set' }}
                        @endif
                    </dd>
                </div>
            </dl>
        </div>
        <div class="flex justify-end w-full py-4 mt-3 border-t border-gray-200">
            {{-- edit button --}}
            <button x-on:click="action='edit'"
                type="button"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm l hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
        </div>
    </div>
    <div x-cloak
        x-show="action=='edit'"
        class="p-5">
        <form class="">
            @csrf
            <div class="space-y-8 divide-y divide-gray-200">
                <div class="">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                    </div>
                    <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-6">
                            <label for="first-name"
                                class="block text-sm font-medium text-gray-700"> First name </label>
                            <div class="mt-1">
                                <input type="text"
                                    wire:model.defer="firstname"
                                    name="first-name"
                                    id="first-name"
                                    autocomplete="given-name"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('firsrtname')
                                <span class="text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="middle-name"
                                class="block text-sm font-medium text-gray-700"> Middle name </label>
                            <div class="mt-1">
                                <input type="text"
                                    wire:model.defer="middlename"
                                    name="middle-name"
                                    id="middle-name"
                                    autocomplete="middle-name"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('middlename')
                                <span class="text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="last-name"
                                class="block text-sm font-medium text-gray-700"> Last name </label>
                            <div class="mt-1">
                                <input type="text"
                                    wire:model.defer="lastname"
                                    name="last-name"
                                    id="last-name"
                                    autocomplete="family-name"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('lastname')
                                <span class="text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-3">
                            <label for="sex"
                                class="block text-sm font-medium text-gray-700">Sex</label>
                            <select id="sex"
                                wire:model.defer="sex"
                                name="sex"
                                class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value=""></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('sex')
                                <span class="text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-3">
                            <label for="date-of-birth"
                                class="block text-sm font-medium text-gray-700"> Date of Birth </label>
                            <div class="mt-1">
                                <input type="date"
                                    wire:model.defer="date_of_birth"
                                    name="date-of-birth"
                                    id="date-of-birth"
                                    autocomplete="date-of-birth"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('date_of_birth')
                                <span class="text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="address"
                                class="block text-sm font-medium text-gray-700"> Address </label>
                            <div class="mt-1">
                                <input type="text"
                                    wire:model.defer="address"
                                    name="address"
                                    id="address"
                                    autocomplete="address"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            @error('address')
                                <span class="text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="campus"
                                class="block text-sm font-medium text-gray-700"> Campus </label>
                            <select id="campus"
                                wire:model="campus"
                                name="campus"
                                class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value=""></option>
                                @foreach ($campuses as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('campus')
                                <span class="text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="department"
                                class="block text-sm font-medium text-gray-700"> Department </label>
                            <select id="department"
                                wire:model="department"
                                name="department"
                                class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value=""></option>
                                @foreach ($departments as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('department')
                                <span class="text-sm italic text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="course"
                                class="block text-sm font-medium text-gray-700"> Course </label>
                            <select id="course"
                                wire:model="course"
                                name="course"
                                class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value=""></option>
                                @foreach ($courses as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}
                                    </option>
                                @endforeach
                                @error('course')
                                    <span class="text-sm italic text-red-600">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-5">
                <div class="flex justify-end">
                    <button x-on:click="action='none'"
                        type="button"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                    <button wire:click.prevent="update"
                        type="button"
                        wire:loading.attr="disabled"
                        class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save
                        Update</button>
                </div>
            </div>
        </form>

    </div>
</div>
