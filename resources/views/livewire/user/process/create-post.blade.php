<div x-data="creatingPost">
    <div class="border-b p-5">
        <div class="flex items-start space-x-4"
            x-on:notify.window="txtarea=''">
            <div class="min-w-0 flex-1">
                <form class="space-y-2">
                    @csrf
                    <div x-data="{isOpen:false}"
                        class="flex justify-end">
                        <div x-on:done-selecting.window="isOpen=false">
                            <label id="listbox-label"
                                class="sr-only">
                                Change Privacy
                            </label>
                            <div class="relative">
                                <div class="inline-flex shadow-sm rounded-md divide-x divide-indigo-600">
                                    <div
                                        class="relative z-0 inline-flex shadow-sm rounded-md divide-x divide-indigo-600">
                                        <div
                                            class="relative inline-flex items-center bg-indigo-500  pl-2 pr-4 border border-transparent rounded-l-md shadow-sm text-white">

                                            <p class="ml-2.5 text-sm font-medium">
                                                {{ $selectedPrivacyName }}
                                            </p>
                                        </div>
                                        <button x-on:click="isOpen=!isOpen"
                                            type="button"
                                            class="relative inline-flex items-center bg-indigo-500 p-2 rounded-l-none rounded-r-md text-sm font-medium text-white hover:bg-indigo-600 focus:outline-none focus:z-10 focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500"
                                            aria-haspopup="listbox"
                                            aria-expanded="true"
                                            aria-labelledby="listbox-label">
                                            <span class="sr-only">Change published status</span>
                                            <!-- Heroicon name: solid/chevron-down -->
                                            <svg x-bind:class="isOpen ? 'transform -rotate-180 transition duration-150 ease-in-out' : 'transition duration-150 ease-in-out'"
                                                class="h-5 w-5 text-white"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                                aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>


                                <ul x-cloak
                                    x-show="isOpen"
                                    class="origin-top-right absolute z-10 right-0 mt-2 w-72 rounded-md shadow-lg overflow-hidden bg-white divide-y divide-gray-200 ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    tabindex="-1"
                                    role="listbox"
                                    aria-labelledby="listbox-label"
                                    aria-activedescendant="listbox-option-0">

                                    @foreach ($privacies as $key => $privacy)
                                        <li wire:click="selectPrivacy('{{ $key }}')"
                                            class="text-gray-900 cursor-default select-none relative px-4 py-1 text-sm hover:bg-gray-50 transition ease-in-out duration-150"
                                            id="listbox-option-0"
                                            role="option">
                                            <div class="flex flex-col">
                                                <div class="flex justify-between">
                                                    <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                                    <p class="font-normal">
                                                        {{ $privacy->name }}
                                                    </p>

                                                    @if ($selectedPrivacy == $key)
                                                        <span class="text-indigo-500">
                                                            <svg class="h-5 w-5"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20"
                                                                fill="currentColor"
                                                                aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </span>
                                                    @endif
                                                </div>
                                                <p class="text-gray-500 mt-2">
                                                    {{ $privacy->description }}
                                                </p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="mt-1 border-b border-gray-300 focus-within:border-indigo-600">
                            <input type="text"
                                wire:model.defer="post_title"
                                name="title"
                                id="title"
                                class="block w-full border-0 border-b border-transparent bg-gray-50 focus:border-indigo-600 focus:ring-0 sm:text-sm"
                                placeholder="Title">
                            @error('post_title')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="border-b border-gray-300 focus-within:border-indigo-600">
                        <textarea name="post"
                            wire:model.defer="post_body"
                            x-model="txtarea"
                            id="post"
                            x-on:input="resize()"
                            style="height: 99px"
                            class="block w-full border-0 border-b border-transparent  px-2 pb-2 bg-gray-50 resize-none focus:ring-0 focus:border-indigo-600 sm:text-sm"
                            placeholder="Create post..."></textarea>
                        @error('post_body')
                            <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative">
                        @if ($images)
                            <button wire:click.prevent="removeImages"
                                type="button"
                                class="inline-flex items-center absolute right-5 top-5 p-1 border border-transparent rounded-full shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                            <div wire:key="image-container-preview"
                                class="grid grid-cols-3 {{ $images ? ' p-1 border border-gray-400' : '' }}">
                                @foreach ($images as $key => $image)
                                    <div wire:key="{{ $key }}"
                                        class="h-full w-full">
                                        <img src="{{ $image->temporaryUrl() }}"
                                            alt=""
                                            class="max-h-44 h-44 object-cover">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="flex justify-center">
                            <div wire:loading.flex
                                wire:target="images"
                                class="">
                                Uploading Images ...
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        @if ($videos)
                            <button wire:click.prevent="removeVideos"
                                type="button"
                                class="inline-flex items-center absolute right-5 top-5 p-1 border border-transparent rounded-full shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            <div class="grid grid-cols-3 p-1 border border-gray-400">
                                @foreach ($videos as $key => $videos)
                                    <video class="h-44 w"
                                        controls>
                                        <source src="{{ $videos->temporaryUrl() }}"
                                            type="video/mp4">
                                        <source src="movie.ogg"
                                            type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
                                @endforeach
                            </div>
                        @endif
                        <div class="flex justify-center">
                            <div wire:loading.flex
                                wire:target="videos"
                                class="">
                                Uploading Videos ...
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        @if ($documents)
                            <button wire:click.prevent="removeDocuments"
                                type="button"
                                class="inline-flex items-center absolute right-5 top-5 p-1 border border-transparent rounded-full shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            <div class="text-sm text-gray-900  sm:col-span-2">
                                <ul role="list"
                                    class="border border-gray-200 rounded-md divide-y divide-gray-200">

                                    @foreach ($documents as $key => $document)
                                        <li wire:key="{{ $key }}"
                                            class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                            <div class="w-0 flex-1 flex items-center">
                                                <!-- Heroicon name: solid/paper-clip -->
                                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                    aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span class="ml-2 flex-1 w-0 truncate">
                                                    {{ $document->getClientOriginalName() }}
                                                </span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="flex justify-center">
                            <div wire:loading.flex
                                wire:target="documents"
                                class="">
                                Uploading documents ...
                            </div>
                        </div>
                    </div>
                    <div class="pt-2 flex justify-between">
                        <div class="flex space-x-5">
                            <div class="relative h-5 w-5">
                                <button type="button"
                                    class="  rounded-full inline-flex items-center justify-center text-gray-400 hover:text-gray-500 h-full w-full absolute">
                                    <!-- Heroicon name: outline/paper-clip -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5"
                                        viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="sr-only">Attach an image</span>
                                </button>
                                <input wire:model="images"
                                    type="file"
                                    class=" h-5 w-5 z-50 opacity-0"
                                    name="image"
                                    multiple
                                    id="images">
                            </div>
                            <div class="relative h-5 w-5">
                                <button type="button"
                                    class="  rounded-full inline-flex items-center justify-center text-gray-400 hover:text-gray-500 h-full w-full absolute">
                                    <!-- Heroicon name: outline/paper-clip -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="sr-only">Attach an Documents</span>
                                </button>
                                <input type="file"
                                    wire:model="documents"
                                    id="documents"
                                    name="documents"
                                    multiple
                                    accept="application/*"
                                    class="h-5 w-5 z-50 opacity-0">
                            </div>
                            <div class="relative h-5 w-5">
                                <button type="button"
                                    class="  rounded-full inline-flex items-center justify-center text-gray-400 hover:text-gray-500 h-full w-full absolute">
                                    <!-- Heroicon name: outline/paper-clip -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                    <span class="sr-only">Attach an Video</span>
                                </button>
                                <input type="file"
                                    wire:model="videos"
                                    id="videos"
                                    name="videos"
                                    multiple
                                    accept="video/*"
                                    class="h-5 w-5 z-50 opacity-0">
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <button type="button"
                                wire:click.prevent="create"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div wire:loading.flex
            wire:target="create">
            <x-shared.loading />
        </div>
    </div>
</div>

@push('livewireScripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('creatingPost', () => ({
                //   reactive textarea
                txtarea: '',
                scrollHeight: 0,
                height: 0,
                el: document.querySelector('#post'),



                init() {
                    this.el.style.height = 100 + 'px';
                },
                resize() {
                    this.el.style.height = 100 + 'px';
                    this.scrollHeight = this.el.scrollHeight + 1;
                    this.el.style.height = this.scrollHeight + 'px';
                },

            }))
        })
    </script>
@endpush
