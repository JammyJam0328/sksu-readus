<div>
    <div>
        <div>
            @if ($images)
                <ul role="list"
                    class="flex mb-2 relative border border-gray-600 ">
                    @foreach ($images as $image)
                        @php
                            $imageLimit++;
                            if ($imageLimit > 4) {
                                break;
                            }
                        @endphp
                        <li x-on:click="$dispatch('view-image','https://drive.google.com/uc?export=view&id={{ $image->file_id }}')"
                            class="w-full">
                            <div
                                class="group block w-full aspect-w-10 aspect-h-7   bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                                <img src="https://drive.google.com/uc?export=view&id={{ $image->file_id }}"
                                    alt="image-of-post-{{ $image->file_id }}"
                                    class="object-cover pointer-events-none group-hover:opacity-75 h-56 w-full">
                            </div>
                        </li>
                    @endforeach
                    <div>
                        @if ($lastImageToDisplay == count($images))
                            <div
                                class="absolute bottom-0 p-1 bg-gray-600 opacity-40 w-full text-white text-center hover:opacity-95 focus:opacity-95">
                                See +{{ count($images) - 4 }} more
                            </div>
                        @endif
                    </div>
                </ul>
            @endif
        </div>
    </div>
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
