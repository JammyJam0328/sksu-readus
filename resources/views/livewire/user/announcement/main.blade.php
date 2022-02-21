<div x-data="{action:'none'}"
    x-on:notify.window="action = event.detail.nextAction">
    @if (auth()->user()->role_type != 'student')
        <div x-show="action=='none'"
            class="flex justify-start mb-2">
            <button x-on:click="action='create'"
                type="button"
                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Create Announcement
            </button>
        </div>
    @endif
    <div>
        <div x-show="action=='none'"
            x-collapse
            class="space-y-2">
            @include('user-pages.components.announcement.announcement-list')
        </div>
        <div>
            @if (auth()->user()->role_type != 'student')
                <div x-cloak
                    x-show="action=='create'">
                    @include('user-pages.components.announcement.create-announcement')
                </div>
            @endif
        </div>
    </div>
    {{-- option --}}
    @include('user-pages.components.announcement.option-panel')
    {{-- delete modal --}}
    @include('user-pages.components.announcement.delete-modal')
</div>
