<div wire:init="initiate()"
    class="mb-10">
    <div>
        <div wire:loading
            wire:target="initiate"
            class="divide-y divide-dashed w-full">
            @for ($i = 0; $i < 10; $i++)
                <div class="w-full h-full mx-auto ">
                    <div class="flex animate-pulse flex-row h-full  space-x-5 p-2">
                        <div class="w-12 bg-gray-300 h-11 rounded-full ">
                        </div>
                        <div class="flex flex-col space-y-3 w-full">
                            <div class="w-36 bg-gray-300 h-6 rounded-md ">
                            </div>
                            <div class="w-24 bg-gray-300 h-6 rounded-md ">
                            </div>
                            <div class="w-full bg-gray-300 h-6 rounded-md ">
                            </div>
                            <div class="w-full bg-gray-300 h-6 rounded-md ">
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>


    <ul role="list"
        class=" z-0 divide-y divide-gray-200 border-b border-gray-200">
        @foreach ($posts as $key => $post)
            <livewire:user.stateful.post-item :post="$post"
                wire:key="{{ $key }}" />
        @endforeach
    </ul>
</div>
