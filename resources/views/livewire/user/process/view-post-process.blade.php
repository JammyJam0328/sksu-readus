<div x-data="{editing:false,deleting:false}"
    x-on:confirm-delete.window="deleting=true"
    x-on:cancel-delete.window="deleting=false"
    x-on:end-post-edit.window="editing=false">
    <main x-show="editing==false"
        wire:key="view-384cniwaerb8wa4yrtncheuh324chfas">
        <div class="p-4 bg-white border-b">
            <div class="flex justify-between">
                <div class="flex items-center">
                    @if ($post->user->google_id)
                        <img class="rounded-full h-11 w-11"
                            src="{{ $post->user->profile_photo_path == '' ? $post->user->google_profile_photo : $post->user->profile_photo_url }}" />
                    @else
                        <img class="rounded-full h-11 w-11"
                            src="{{ $post->user->profile_photo_url }}" />
                    @endif

                    <div class="ml-1.5 leading-tight">
                        <span class="block font-bold text-black dark:text-white ">{{ $post->user->name }}</span>
                        <span class="block font-normal text-gray-500 dark:text-gray-400">
                            {{ $post->user->email }}
                        </span>
                    </div>
                </div>
                <div x-data="{isOpen:false}"
                    class="relative inline-block text-left">
                    <div>
                        <button x-on:click="isOpen=!isOpen"
                            type="button"
                            class="flex items-center text-gray-400 rounded-full hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"
                            id="menu-button"
                            aria-expanded="true"
                            aria-haspopup="true">
                            <span class="sr-only">Open options</span>
                            <!-- Heroicon name: solid/dots-vertical -->
                            <svg class="w-5 h-5"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                            </svg>
                        </button>
                    </div>


                    <div x-cloak
                        x-show="isOpen"
                        x-on:click.away="isOpen=false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 z-30 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu"
                        aria-orientation="vertical"
                        aria-labelledby="menu-button"
                        tabindex="-1">
                        <div class="py-1 "
                            role="none">
                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                            @if ($post->user_id == Auth::user()->id)
                                <a x-on:click="editing=true;isOpen=false"
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="menu-item-0">Edit</a>
                                <a x-on:click="deleting=true;isOpen=false"
                                    href="#"
                                    class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="menu-item-1">Delete</a>
                            @endif
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700"
                                role="menuitem"
                                tabindex="-1"
                                id="menu-item-2">Report</a>
                        </div>
                    </div>
                </div>
            </div>
            <p wire:key="{{ $post->id }}-{{ $post->title }}"
                class="block text-xl leading-snug text-black break-words whitespace-pre-line ">
                <span class="font-bold">{{ $post->title }}</span>
                @php
                    $text = html_entity_decode($post->body);
                    $text = ' ' . $text;
                    $text = preg_replace("/(^|[\n ])([\w]*?)([\w]*?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a class=\"text-blue-600 underline \" target=\"_black\" href=\"$3\" >$3</a>", $text);
                    $text = preg_replace("/(^|[\n ])([\w]*?)((www|wap)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a class=\"text-blue-600 underline \" target=\"_black\" href=\"http://$3\" >$3</a>", $text);
                    $text = preg_replace("/(^|[\n ])([\w]*?)((ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a class=\"text-blue-600 underline \" target=\"_black\" href=\"$4://$3\" >$3</a>", $text);
                    $text = preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a class=\"text-blue-600 underline \" target=\"_black\" href=\"mailto:$2@$3\">$2@$3</a>", $text);
                    $text = preg_replace("/(^|[\n ])(mailto:[a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a class=\"text-blue-600 underline \" target=\"_black\" href=\"$2@$3\">$2@$3</a>", $text);
                    $text = preg_replace("/(^|[\n ])(skype:[^ \,\"\t\n\r<]*)/i", "$1<a class=\"text-blue-600 underline \" target=\"_black\" href=\"$2\">$2</a>", $text);
                @endphp
                {!! $text !!}
            </p>
            @if ($post->hasMedia)
                <div class="z-20 py-1"
                    x-id="['media-container']">
                    <livewire:user.media-container :medias="$post->medias" />
                </div>
            @endif
            <p class="text-gray-500 dark:text-gray-400 text-base py-1 my-0.5">
                @if ($post->created_at->diffInSeconds(Carbon\Carbon::now()) < 60)
                    Just now
                @else
                    {{ $post->created_at->diffForhumans() }}
                @endif
            </p>


        </div>
        {{-- <div class="px-4 pt-4 bg-white border-b border-gray-500">
            <article class="mb-5"
                aria-labelledby="question-title-81614">
                <div class="flex items-center justify-between">
                    <a href="#"
                        class="flex-shrink-0 block group">
                        <div class="flex items-center">
                            <div>
                                <img class="inline-block w-10 h-10 rounded-full"
                                    src="{{ $post->user->profile_photo_url }}"
                                    alt="Profile Picture">
                            </div>
                            <div class="ml-3">
                                <p class="font-medium text-gray-700 group-hover:text-gray-900">
                                    {{ $post->user->name }}'s post
                                </p>
                            </div>
                        </div>
                    </a>
                    <div x-data="{isOpen:false}"
                        class="relative inline-block text-left">
                        <div>
                            <button x-on:click="isOpen=!isOpen"
                                type="button"
                                class="flex items-center text-gray-400 rounded-full hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"
                                id="menu-button"
                                aria-expanded="true"
                                aria-haspopup="true">
                                <span class="sr-only">Open options</span>
                                <!-- Heroicon name: solid/dots-vertical -->
                                <svg class="w-5 h-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                </svg>
                            </button>
                        </div>


                        <div x-cloak
                            x-show="isOpen"
                            x-on:click.away="isOpen=false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu"
                            aria-orientation="vertical"
                            aria-labelledby="menu-button"
                            tabindex="-1">
                            <div class="py-1"
                                role="none">
                                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                @if ($post->user_id == Auth::user()->id)
                                    <a x-on:click="editing=true;isOpen=false"
                                        href="#"
                                        class="block px-4 py-2 text-sm text-gray-700"
                                        role="menuitem"
                                        tabindex="-1"
                                        id="menu-item-0">Edit</a>
                                    <a x-on:click="deleting=true;isOpen=false"
                                        href="#"
                                        class="block px-4 py-2 text-sm text-gray-700"
                                        role="menuitem"
                                        tabindex="-1"
                                        id="menu-item-1">Delete</a>
                                @endif
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="menu-item-2">Report</a>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="flex justify-between mt-4">
                    <div>
                        <h2 id="question-title-81614"
                            class="text-lg font-semibold text-gray-900 font-poppins">
                            {{ $post->title }}
                        </h2>
                    </div>
                </div>
                <div class="mt-1 space-y-4 text-base text-gray-700">
                    <pre class="break-words whitespace-pre-line font-poppins">
                         @php
                             $text = html_entity_decode($post->body);
                             $text = ' ' . $text;
                             $text = preg_replace("/(^|[\n ])([\w]*?)([\w]*?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a class=\"text-blue-600 underline \" target=\"_black\" href=\"$3\" >$3</a>", $text);
                             $text = preg_replace("/(^|[\n ])([\w]*?)((www|wap)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a class=\"text-blue-600 underline \" target=\"_black\" href=\"http://$3\" >$3</a>", $text);
                             $text = preg_replace("/(^|[\n ])([\w]*?)((ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a class=\"text-blue-600 underline \" target=\"_black\" href=\"$4://$3\" >$3</a>", $text);
                             $text = preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a class=\"text-blue-600 underline \" target=\"_black\" href=\"mailto:$2@$3\">$2@$3</a>", $text);
                             $text = preg_replace("/(^|[\n ])(mailto:[a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a class=\"text-blue-600 underline \" target=\"_black\" href=\"$2@$3\">$2@$3</a>", $text);
                             $text = preg_replace("/(^|[\n ])(skype:[^ \,\"\t\n\r<]*)/i", "$1<a class=\"text-blue-600 underline \" target=\"_black\" href=\"$2\">$2</a>", $text);
                             
                         @endphp
                    {!! $text !!}
                    </pre>
                </div>
            </article>
            @if ($post->hasMedia)
                <div x-data="{mediaOpen:false}"
                    class="w-full mb-3 ">
                    <div class="w-fill">
                        <button x-on:click="mediaOpen=!mediaOpen"
                            class="flex items-center justify-center w-full pt-2 text-gray-400"
                            x-text="mediaOpen ? 'Hide' : ' See attached media'">

                        </button>
                    </div>
                    <div x-cloak
                        x-show="mediaOpen"
                        x-collapse>
                        <div>
                            <livewire:user.media-container :medias="$post->medias" />
                        </div>
                    </div>
                </div>
            @endif

            <div class="text-xs text-gray-400">{{ $post->created_at->format('F j, Y ') }} at
                {{ $post->created_at->format('g:i a') }}</div>
        </div> --}}
        <div>
            <livewire:user.stateful.comments :postid="$post->id"
                :postuser="$post->user_id" />
        </div>
    </main>
    {{-- editing --}}
    {{-- https://drive.google.com/uc?export=view&id= --}}
    <main x-cloak
        x-show="editing==true"
        x-transtision
        wire:key="editing-asjdhfnachniwayrawu4cyrwa4yta47r44t54768467n4vatnth">
        <div class="px-4 pt-4 bg-white border-b border-gray-500">
            <article class="mb-3"
                aria-labelledby="question-title-81614">
                <div class="flex items-center justify-between">
                    <a href="#"
                        class="flex-shrink-0 block group">
                        <div class="flex items-center">
                            <div>
                                @if ($post->user->google_id)
                                    <img class="rounded-full h-11 w-11"
                                        src="{{ $post->user->profile_photo_path == '' ? $post->user->google_profile_photo : $post->user->profile_photo_url }}" />
                                @else
                                    <img class="rounded-full h-11 w-11"
                                        src="{{ $post->user->profile_photo_url }}" />
                                @endif
                            </div>
                            <div class="ml-3">
                                <p class="font-medium text-gray-700 group-hover:text-gray-900">
                                    {{ $post->user->name }}'s Post
                                </p>
                            </div>
                        </div>
                    </a>
                    <div class="relative inline-block text-left">
                        <div>
                            <button x-on:click="editing=false"
                                type="button"
                                class="flex items-center text-gray-400 rounded-full hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"
                                id="menu-button"
                                aria-expanded="true"
                                aria-haspopup="true">
                                <span class="sr-only">Stop Editing</span>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>


                <div class="mt-4 space-y-4 text-lg text-gray-700">

                    <form action="#"
                        class="">
                        @csrf
                        <div
                            class="overflow-hidden bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">
                            <label for="title"
                                class="sr-only">Title</label>
                            <input wire:model.defer="title"
                                type="text"
                                name="title"
                                id="title"
                                class="block w-full border-0 pt-2.5 text-lg font-medium placeholder-gray-500 focus:ring-0 bg-transparent"
                                placeholder="Title">
                            <label for="description"
                                class="sr-only">Description</label>
                            <textarea wire:model.defer="body"
                                rows="10"
                                name="body"
                                id="body"
                                class="block w-full py-0 placeholder-gray-500 bg-transparent border-0 resize-none focus:ring-0"
                                placeholder="Write a description..."></textarea>
                        </div>
                        <div class="mt-1 ">
                            <div
                                class="flex items-center justify-end px-2 py-2 space-x-3 bg-white border-gray-200 sm:px-3">
                                <div class="flex-shrink-0">
                                    <button wire:click.prevent="updatePost"
                                        type="button"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </article>
            <div>
                @if ($post->hasMedia)
                    <div class="container grid grid-cols-3 gap-2 mx-auto my-2">
                        @foreach ($post->medias->where('type', 'image') as $key => $media)
                            <div wire:key="image-{{ $key }}"
                                class="relative h-full">
                                <div class="h-full rounded">
                                    <img class="w-full h-full"
                                        src="https://drive.google.com/uc?export=view&id={{ $media->file_id }}"
                                        alt="image">
                                </div>
                                <div
                                    class="absolute top-0 left-0 flex items-start justify-end w-full h-full p-2 bg-transparent">
                                    <button
                                        wire:click.prevent="deleteMedia('{{ \Crypt::encrypt($media->id) }}','{{ $media->type }}','{{ \Crypt::encrypt($media->file_id) }}')"
                                        type="button"
                                        class="p-2 text-red-600 bg-white rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5"
                                            viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="container grid grid-cols-3 gap-2 mx-auto my-2">
                        @foreach ($post->medias->where('type', 'video') as $key => $media)
                            <div wire:key="video-{{ $key }}"
                                class="relative">
                                <div class="w-full h-full rounded">
                                    <video class="h-full"
                                        controls>
                                        <source
                                            src="https://drive.google.com/uc?export=view&id={{ $media->file_id }}"
                                            type="video/mp4">
                                    </video>
                                </div>
                                <div
                                    class="absolute top-0 left-0 flex items-start justify-end w-full h-full p-2 bg-transparent">
                                    <button
                                        wire:click.prevent="deleteMedia('{{ \Crypt::encrypt($media->id) }}','{{ $media->type }}','{{ \Crypt::encrypt($media->file_id) }}')"
                                        type="button"
                                        class="p-2 text-red-600 bg-white rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5"
                                            viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <ul role="list"
                            class="border border-gray-200 divide-y divide-gray-200 rounded-md">
                            @foreach ($post->medias->where('type', 'document') as $key => $media)
                                <li wire:key="document-{{ $key }}"
                                    class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                    <div class="flex items-center flex-1 w-0">
                                        <!-- Heroicon name: solid/paper-clip -->
                                        <svg class="flex-shrink-0 w-5 h-5 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="flex-1 w-0 ml-2 text-indigo-500 underline truncate"
                                            x-on:click="window.open(' https://drive.google.com/file/d/{{ $media->file_id }}')">
                                            https://drive.google.com/file/d/{{ $media->file_id }}
                                        </span>
                                    </div>
                                    <div class="flex-shrink-0 ml-4">
                                        <a wire:click.prevent="deleteMedia('{{ \Crypt::encrypt($media->id) }}','{{ $media->type }}','{{ \Crypt::encrypt($media->file_id) }}')"
                                            href="#"
                                            class="font-medium text-red-600 hover:text-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-5 h-5"
                                                viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                @endif
            </div>


            <div class="text-xs text-gray-400">{{ $post->created_at->format('F j, Y ') }} at
                {{ $post->created_at->format('g:i a') }}</div>
        </div>
        <div wire:loading.flex
            wire:target="updatePost">
            <div class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full bg-white opacity-75">
                <span class="font-mono text-3xl text-center text-gray-600 animate-bounce">Updating . . .</span>
            </div>
        </div>

    </main>
    <div x-cloak
        x-show="deleting"
        class="fixed inset-0 z-50 overflow-y-auto"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

            <div x-show="deleting"
                class="fixed inset-0 transition-opacity bg-gray-100 bg-opacity-75"
                aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                aria-hidden="true">&#8203;</span>
            <div
                class="inline-block pt-2 overflow-hidden text-left align-middle transition-all transform bg-white rounded-lg shadow-xl sm:max-w-lg sm:w-full ">
                <div class="flex justify-center px-4">
                    <div class="mt-1 text-center first-letter ">
                        <h3 class="text-lg font-medium leading-6 text-gray-900"
                            id="modal-title">
                            Confirm
                        </h3>
                        <div class="mt-2 mb-4">
                            <p class="text-sm text-gray-500">
                                Are you sure you want to delete this post?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="sm:flex sm:flex-row-reverse">
                    <div class="flex w-full border-t border-gray-200 divide-x">
                        <div class="w-full">
                            <button x-on:click="deleting=false"
                                type="button"
                                class="items-center w-full px-3 py-2 text-sm font-medium leading-4 text-gray-700 bg-white shadow-sm hover:font-extrabold focus:outline-none">
                                Cancel
                            </button>
                        </div>
                        <div class="w-full">
                            <button wire:click.prevent="confirmDelete()"
                                type="button"
                                class="items-center w-full px-3 py-2 text-sm font-medium leading-4 text-gray-700 bg-white shadow-sm hover:font-extrabold focus:outline-none">
                                Continue
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
