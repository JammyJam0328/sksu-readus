<div x-data="{isOpen:false,url:''}"
    class=" p-10"
    x-on:view-image.window="isOpen=true;url=event.detail">
    <div x-show="isOpen"
        x-cloak
        x-trap.noscroll="isOpen"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="h-full w-full fixed bg-gray-500 z-50 top-0 left-0 p-10">
        <button x-on:click="url='';isOpen=false"
            class="p-1 rounded-lg border border-white text-white bg-gray-600 font-mono focus:outline-none absolute right-5 top-5">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="h-full w-full flex items-center justify-center ">
            <img x-bind:src="url"
                alt=""
                class="max-h-full max-w-full ">
        </div>
    </div>
</div>
