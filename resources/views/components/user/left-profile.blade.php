<div class="flex items-center justify-between rounded-xl p-2   border bg-white  ">
    <a href="#"
        class="flex-shrink-0 group block">
        <div class="flex items-center ">
            <div>
                <img class="inline-block h-9 w-9 rounded-full"
                    src="{{ auth()->user()->profile_photo_url }}"
                    alt="">
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium  text-gray-700">
                    {{ auth()->user()->name }}
                </p>
                <p class="text-xs font-medium text-gray-400">
                    View profile
                </p>
            </div>
        </div>
    </a>
</div>
