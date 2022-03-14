<div class="space-y-5">
    <div class="overflow-hidden bg-white border sm:rounded-lg">
        <div class="flex items-center justify-between px-4 py-3 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Report Details</h3>
            <div class="flex space-x-2">
                <button wire:click="approve"
                    type="button"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Approve</button>
                <button wire:click="deny"
                    type="button"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Deny</button>
            </div>
        </div>
        <div class="px-4 py-5 border-t border-gray-200 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Reported by</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $this->report->user->name }}
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Reason</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $this->report->reason->title }}
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Other Reason</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $this->report->other_reason }}
                    </dd>
                </div>

            </dl>
        </div>
    </div>
    <div class="overflow-hidden bg-white border sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Post Details</h3>
        </div>
        <div class="px-4 py-5 border-t border-gray-200 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Post User</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $this->report->post->user->name }}
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Title</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $this->report->post->title }}</dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Body</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $this->report->post->body }}
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Medias</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <div class="container grid grid-cols-3 gap-2 mx-auto">
                            @forelse ($this->report->post->medias as $media)
                                <div class="w-full rounded">
                                    <iframe
                                        src="https://drive.google.com/file/d/{{ $media->file_id }}/preview?embedded=true"
                                        class="flex-wrap w-20 h-20 border-2 rounded-lg border-main"></iframe>
                                </div>
                            @empty
                                <div class="w-full rounded">
                                    <p class="">None</p>
                                </div>
                            @endforelse
                        </div>
                    </dd>
                </div>
            </dl>
        </div>
    </div>

</div>
