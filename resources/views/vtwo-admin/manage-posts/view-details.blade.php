<div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="overflow-hidden bg-white border sm:rounded-lg">
        <div class="flex items-center justify-between px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Post Information</h3>
            <button wire:click="$set('action','list')"
                type="button"
                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Return
            </button>
        </div>
        <div class="px-4 py-5 border-t border-gray-200 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">User</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $this->post->user->name }}</dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Title</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $this->post->title }}</dd>
                </div>

                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Body</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <p class="block leading-snug text-black break-words whitespace-pre-line font-roboto">
                            {{ $this->post->body }}
                        </p>
                    </dd>
                </div>
            </dl>
        </div>
    </div>

</div>
