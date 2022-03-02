<div class="overflow-hidden bg-white border border-gray-300 rounded-lg">
    <div class="w-full h-2 bg-gray-700">
    </div>
    <div class="p-2">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                {{ $icon }}
            </div>
            <div class="flex-1 w-0 ml-3">
                <dl>
                    <dt class="text-lg font-medium text-gray-500 truncate ">{{ $title }}</dt>
                    <dd>
                        <div class="text-lg font-medium text-gray-700">{{ $count }}</div>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <div class="flex justify-end px-5 mb-2 ">
        <div class="text-sm">
            {{ $actions }}
        </div>
    </div>
</div>
