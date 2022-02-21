<div x-data="{action:''}"
    x-on:notify.window="action = event.detail.nextAction">
    <div>
        <div x-show="action==''"
            class="space-y-2">
            <div>
                @include('admin-pages.components.announcement.announcement-list')
            </div>
        </div>


    </div>
</div>
