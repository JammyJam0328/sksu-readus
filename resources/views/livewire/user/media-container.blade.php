<div>
    <div>
        @if ($images)
            <div x-data="{images:@js($images)}"
                class="container mx-auto">
                <div x-bind:class="images.length >=4 ? 'grid-cols-4' :  'grid-cols-'+images.length"
                    class="p-2  bg-indigo-200 lg:space-y-0 grid ring-1 ring-indigo-200 "
                    x-on:click="$dispatch('view-image',images)">
                    <template x-for="(image,index) in images"
                        :key="index">
                        <template x-if="index <=6">
                            <div class="w-full rounded h-full">
                                <img x-bind:src="'https://drive.google.com/uc?export=view&id='+image.file_id"
                                    class="h-full"
                                    alt="image">
                            </div>
                        </template>
                    </template>
                </div>
            </div>
        @endif
    </div>
    <div>
        @if ($videos)
            <div x-data="{videos:@js($videos)}"
                class="container mx-auto">
                <div x-bind:class="videos.length >=4 ? 'grid-cols-4' :  'grid-cols-'+videos.length"
                    class=" p-1 bg-indigo-200 lg:space-y-0 grid ring-1 ring-indigo-200">
                    <template x-for="(video,index) in videos"
                        :key="index">
                        <div class="w-full rounded h-full">
                            {{-- <img x-bind:src="'https://drive.google.com/uc?export=view&id='+image.file_id"
                                    class="h-full"
                                    alt="image"> --}}
                            <video x-bind:id="'video-'+index+'-'+video.id"
                                class="h-full object-cover"
                                controls>
                                <source x-bind:src="'https://drive.google.com/uc?export=view&id='+video.file_id"
                                    type="video/mp4">
                            </video>
                            {{-- <iframe x-bind:src="'https://drive.google.com/file/d/'+video.file_id+'/preview'"
                                    allow="autoplay"></iframe> --}}
                        </div>
                    </template>
                </div>
            </div>
        @endif
    </div>
    <div>
        @if ($documents)
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <ul role="list"
                    class="border border-gray-200 rounded-md divide-y divide-gray-200">
                    @foreach ($documents as $key => $document)
                        <li wire:key="{{ $key }}-{{ $document->file_id }}"
                            class="px-2 py-1 flex items-center justify-between text-sm">
                            <a href="https://drive.google.com/file/d/{{ $document->file_id }}"
                                target="_blank"
                                class="w-0 flex-1 flex items-center">
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
                                <span class="ml-2 flex-1 w-0 truncate underline text-indigo-500">
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
