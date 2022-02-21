<div class="pb-10">
    <ul role="list"
        class="border-b divide-y divide-gray-200">
        @foreach ($notifications as $notification)
            <li wire:click.prevent="read('{{ $notification->id }}')"
                class="p-4 {{ $notification->read_at ? '' : 'bg-indigo-50 hover:bg-gray-50' }} ">
                <div class="flex space-x-3">
                    @switch($notification->data['type'])
                        @case('comment')
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 text-green-600"
                                viewBox="0 0 20 20"
                                fill="currentColor">
                                <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                                <path
                                    d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                            </svg>
                        @break
                        @case('author_comment')
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-indigo-600"
                                viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                    clip-rule="evenodd" />
                            </svg>
                        @break
                        @default
                    @endswitch
                    <div class="flex-1 space-y-1">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-bold underline">{{ $notification->data['commentator_name'] }}</h3>
                            <p class="text-sm text-gray-500">{{ $notification->created_at->diffForhumans() }}</p>
                        </div>
                        <p class="text-sm text-gray-500">{{ $notification->data['message'] }}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    @if (count($notifications) > 0)
        <div class="flex items-center justify-between p-5 space-x-2">
            <button wire:click.prevent="markAllAsRead"
                type="button"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Mark all as read
            </button>
            <button wire:click.prevent="loadMore"
                type="button"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Load more
            </button>
        </div>
    @endif
</div>
