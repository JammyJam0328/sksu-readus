<div wire:init="ready"
    x-data="{editComment:false,deleteComment:false}"
    x-on:start-editing.window="editComment=true"
    x-on:end-editing.window="editComment=false"
    x-on:comment-deleting.window="deleteComment=true"
    x-on:notify.window="event.detail.action=='donedeleting' ? deleteComment=false : '' "
    class="">
    <div class="flow-root">
        <div class="p-4 pt-3 border-b">
            <form>
                @csrf
                <label for="comment"
                    class="block text-sm font-medium text-gray-700">Add comment</label>
                <div class="mt-1">
                    <textarea wire:model.defer="comment"
                        rows="4"
                        name="comment"
                        id="comment"
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                </div>
                <div class="flex justify-end mt-3">
                    <button wire:click.prevent="addComment"
                        class="px-2 py-1 font-bold text-white bg-indigo-600 rounded focus:outline-none focus:shadow-outline">
                        Comment
                    </button>
                </div>
            </form>
        </div>
        <div wire:loading
            wire:target="ready"
            class="w-full">
            @for ($i = 0; $i < 5; $i++)
                <x-shared.loader />
            @endfor
        </div>


        <!-- This example requires Tailwind CSS v2.0+ -->
        <div>
            {{-- <section aria-labelledby="notes-title">
                <div>
                    <div class="border-b ">
                        <div class="">
                            <div role="list"
                                class="space-y-2">
                                @forelse ($comments as $key => $comment)
                                    <div class="flex p-2">
                                        <div class="flex-shrink-0 mr-4">
                                            @if ($comment->user->google_id)
                                                <img class="w-10 h-10 border rounded-full"
                                                    src="{{ $comment->user->profile_photo_path == ''? $comment->user->google_profile_photo: $comment->user->profile_photo_url }}" />

                                            @else
                                                <img class="w-10 h-10 border rounded-full"
                                                    src="{{ $comment->user->profile_photo_url }}" />
                                            @endif
                                        </div>
                                        <div class="p-3 bg-white rounded-xl">
                                            <h4 class="font-bold">{{ $comment->user->name }}</h4>
                                            <p class="-mt-3 text-sm text-gray-700 break-normal whitespace-pre-line">
                                                @php
                                                    $text = html_entity_decode($comment->message);
                                                    $text = ' ' . $text;
                                                    $text = preg_replace("/(^|[\n ])([\w]*?)([\w]*?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$3\" >$3</a>", $text);
                                                    $text = preg_replace("/(^|[\n ])([\w]*?)((www|wap)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a class=\"text-blue-600 underline\" target=\"_black\" href=\"http://$3\" >$3</a>", $text);
                                                    $text = preg_replace("/(^|[\n ])([\w]*?)((ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$4://$3\" >$3</a>", $text);
                                                    $text = preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a class=\"text-blue-600 underline\" target=\"_black\" href=\"mailto:$2@$3\">$2@$3</a>", $text);
                                                    $text = preg_replace("/(^|[\n ])(mailto:[a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$2@$3\">$2@$3</a>", $text);
                                                    $text = preg_replace("/(^|[\n ])(skype:[^ \,\"\t\n\r<]*)/i", "$1<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$2\">$2</a>", $text);
                                                @endphp
                                                {!! $text !!}
                                            </p>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @if (count($comments) > 0)
                <div class="flex justify-center py-5 ">
                    <button type="button"
                        wire:click="loadMoreComments"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Load more
                    </button>
                </div>
            @endif --}}
            <ul role="list"
                class="divide-y divide-gray-200">
                @forelse ($comments as $key=>$comment)
                    <li wire:key="{{ $key }}"
                        class="px-3 py-3">
                        <div class="flex space-x-1">
                            @if ($comment->user->google_id)
                                <img class="w-10 h-10 border rounded-full"
                                    src="{{ $comment->user->profile_photo_path == ''? $comment->user->google_profile_photo: $comment->user->profile_photo_url }}" />

                            @else
                                <img class="w-10 h-10 border rounded-full"
                                    src="{{ $comment->user->profile_photo_url }}" />
                            @endif

                            <div class="flex-1 space-y-1 ">
                                <div class="flex-1 px-3 pb-3">
                                    <div class="flex items-center justify-between">
                                        <h3 class="font-bold ">
                                            {{ $comment->user->name }}
                                        </h3>

                                    </div>
                                    <p class="-mt-3 text-sm text-gray-700 break-normal whitespace-pre-line">
                                        @php
                                            $text = html_entity_decode($comment->message);
                                            $text = ' ' . $text;
                                            $text = preg_replace("/(^|[\n ])([\w]*?)([\w]*?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$3\" >$3</a>", $text);
                                            $text = preg_replace("/(^|[\n ])([\w]*?)((www|wap)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a class=\"text-blue-600 underline\" target=\"_black\" href=\"http://$3\" >$3</a>", $text);
                                            $text = preg_replace("/(^|[\n ])([\w]*?)((ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$4://$3\" >$3</a>", $text);
                                            $text = preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a class=\"text-blue-600 underline\" target=\"_black\" href=\"mailto:$2@$3\">$2@$3</a>", $text);
                                            $text = preg_replace("/(^|[\n ])(mailto:[a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$2@$3\">$2@$3</a>", $text);
                                            $text = preg_replace("/(^|[\n ])(skype:[^ \,\"\t\n\r<]*)/i", "$1<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$2\">$2</a>", $text);
                                        @endphp
                                        {!! $text !!}
                                    </p>
                                </div>
                                <div class="ml-2">
                                    @if ($comment->user_id == auth()->user()->id)
                                        <div class="flex mt-1 space-x-3">
                                            <button
                                                wire:click.prevent="editComment('{{ \Crypt::encrypt($comment->id) }}')"
                                                class="text-xs text-blue-600 focus:outline-none hover:underline">Edit</button>
                                            <button
                                                wire:click.prevent="deleting('{{ \Crypt::encrypt($comment->id) }}')"
                                                class="text-xs text-blue-600 focus:outline-none hover:underline">Delete</button>

                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                @empty
                @endforelse
                @if (count($comments) > 0)
                    <div class="flex justify-center py-5">
                        <button type="button"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Load more
                        </button>
                    </div>
                @endif
            </ul>

        </div>


        {{--  --}}
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div x-cloak
            x-show="editComment"
            class="fixed inset-0 z-50 overflow-y-auto"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

                <div x-show="editComment"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
                    aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    aria-hidden="true">&#8203;</span>


                <div x-show="editComment"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block w-full p-3 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="sm:flex sm:items-start">
                        <div class="w-full text-center sm:mt-0 sm:text-left">
                            <div class="w-full">
                                <label for="comment"
                                    class="block text-sm font-medium text-gray-700">Update your comment</label>
                                <div class="mt-1">
                                    <textarea rows="4"
                                        wire:model.defer="new_comment"
                                        name="comment"
                                        id="comment"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-5 space-x-2 sm:mt-4">
                        <button x-on:click.prevent="editComment=false;$wire.editCommentId=''"
                            type="button"
                            class="justify-center w-full px-4 py-2 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                        <button wire:click.prevent="updateComment()"
                            type="button"
                            class="justify-center w-full px-4 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div x-cloak
            x-show="deleteComment"
            class="fixed inset-0 z-50 overflow-y-auto"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

                <div x-show="deleting"
                    class="fixed inset-0 transition-opacity bg-gray-300 bg-opacity-75"
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
                                    Are you sure you want to delete this comment?
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="sm:flex sm:flex-row-reverse">
                        <div class="flex w-full border-t border-gray-200 divide-x">
                            <div class="w-full">
                                <button x-on:click="deleteComment=false"
                                    type="button"
                                    class="items-center w-full px-3 py-2 text-sm font-medium leading-4 text-gray-700 bg-white shadow-sm hover:font-extrabold focus:outline-none">
                                    Cancel
                                </button>
                            </div>
                            <div class="w-full">
                                <button wire:click.prevent="deleteComment()"
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
