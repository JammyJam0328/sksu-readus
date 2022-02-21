<div x-data
    wire:init="initiate()"
    class="mb-10">

    <div>
        <div wire:loading
            wire:target="initiate"
            class="w-full divide-y divide-dashed">
            @for ($i = 0; $i < 10; $i++)
                <x-shared.loader />
            @endfor
        </div>
    </div>
    <ul role="list"
        class="z-0 p-2 space-y-2 border-gray-200 ">
        @foreach ($posts as $key => $post)
            <livewire:user.stateful.post-item :post="$post"
                wire:key="{{ $key }}-{{ $post->id }}-post-{{ $key }}" />
        @endforeach
    </ul>
    @if (count($posts) > 0)
        <div class="flex justify-center mt-5">
            <button wire:loading.remove
                wire:target="loadMore"
                wire:click.prevent="loadMore"
                type="button"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Load more</button>

        </div>
    @else
        <div class="flex justify-center mt-10">
            <p class="text-gray-600">
                No posts yet.
            </p>
        </div>
    @endif

</div>
