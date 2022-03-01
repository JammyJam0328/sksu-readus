<div>
    <div>
        @if ($images)
            <div x-data="{images:@js($images), currentImage:0}"
                x-id="['image-gallery']"
                class="container relative flex items-center w-full mx-auto">
                <div x-on:mouseover="scroll=true"
                    x-on:mouseleave="scroll=false"
                    class="w-full p-2 bg-gradient-to-tr from-indigo-700 to-red-400 lg:space-y-0 rounded-xl "
                    x-on:dblclick="$dispatch('view-image',images)">
                    <template x-for="(image,index) in images"
                        :key="index">
                        <div x-cloak
                            x-show="index==currentImage"
                            class="w-full h-64 rounded md:h-96">
                            <img x-bind:src="'https://drive.google.com/uc?export=view&id='+image.file_id"
                                class="object-contain w-full h-full"
                                x-bind:alt="'image-' +image.file_id">
                        </div>
                    </template>
                </div>
                <div class="absolute px-1 text-white bg-gray-700 rounded right-2 top-2 opacity-70">
                    <span x-text="currentImage+1 + ' / ' + images.length"></span>
                </div>
                <div x-show="images.length>1 "
                    class="absolute my-auto align-middle left-3">
                    <button type="button"
                        x-on:click.prevent="currentImage>0? currentImage--:''"
                        class="inline-flex items-center p-1 text-white bg-gray-600 border border-transparent rounded-full shadow-sm opacity-50 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                </div>
                <div x-show="images.length>1"
                    class="absolute my-auto align-middle right-3">
                    <button type="button"
                        x-on:click.prevent="currentImage==images.length-1?currentImage=0:currentImage++"
                        class="inline-flex items-center p-1 text-white bg-gray-600 border border-transparent rounded-full shadow-sm opacity-50 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif
    </div>
    <div>
        @if ($videos)
            <div x-data="{videos:@js($videos),current:0,playing:''}"
                class="container mx-auto">
                <div x-bind:class="videos.length >=4 ? 'grid-cols-4' :  'grid-cols-'+videos.length"
                    class="grid p-2 lg:space-y-0 bg-gradient-to-tr from-indigo-700 to-red-400">
                    <template x-for="(video,index) in videos"
                        :key="index">
                        <div x-cloak
                            x-show="current==index"
                            class="w-full h-full rounded">
                            {{-- <img x-bind:src="'https://drive.google.com/uc?export=view&id='+image.file_id"
                                    class="h-full"
                                    alt="image"> --}}
                            <video x-on:play="playing=video.file_id"
                                x-on:pause="playing=''"
                                x-intersect:leave="playing==video.file_id ? $el.pause() : ''"
                                x-on:ended="playing=''"
                                x-bind:id="'video-'+index+'-'+video.id"
                                class="object-cover h-full"
                                controls>
                                <source x-bind:src="'https://drive.google.com/uc?export=view&id='+video.file_id"
                                    type="video/mp4">
                            </video>
                            {{-- <iframe x-bind:src="'https://drive.google.com/file/d/'+video.file_id+'/preview'"
                                    allow="autoplay"></iframe> --}}


                        </div>
                    </template>
                </div>
                <div class="w-full p-2">
                    <template x-if="videos.length > 1">
                        <div class="flex justify-end space-x-2">
                            <button x-on:click="current--"
                                x-bind:disabled="current==0"
                                class="text-sm text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M15.707 15.707a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 010 1.414zm-6 0a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 011.414 1.414L5.414 10l4.293 4.293a1 1 0 010 1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <span class="text-sm text-gray-400"
                                x-text="current + 1 + ' of ' + videos.length "></span>

                            <button x-on:click.prevent="current + 1 == videos.length ? current=0 : current ++"
                                class="text-sm text-gray-400"><svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg></button>
                        </div>
                    </template>
                </div>
            </div>
        @endif
    </div>
    <div>
        @if ($documents)
            <dd
                class="p-2 mt-2 text-sm text-gray-900 sm:mt-0 sm:col-span-2 bg-gradient-to-tr from-indigo-700 to-red-400">
                <ul role="list"
                    class="bg-white border border-gray-200 divide-y divide-gray-200">
                    @foreach ($documents as $key => $document)
                        <li wire:key="{{ $key }}-{{ $document->file_id }}"
                            class="flex items-center justify-between px-2 py-1 text-sm">
                            <a href="https://drive.google.com/file/d/{{ $document->file_id }}"
                                target="_blank"
                                class="flex items-center flex-1 w-0">
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
                                <span class="flex-1 w-0 ml-2 text-indigo-500 underline truncate">
                                    https://drive.google.com/file/d/{{ $document->file_id }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </dd>
        @endif
    </div>
</div>
