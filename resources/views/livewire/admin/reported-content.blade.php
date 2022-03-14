<div>
    <div>
        @if ($action == 'showList')
            @include('admin-pages.components.report-content.list')
        @endif
    </div>
    <div>
        @if ($action == 'viewDetails')
            @include(
                'admin-pages.components.report-content.view-details'
            )
        @endif

    </div>
</div>
