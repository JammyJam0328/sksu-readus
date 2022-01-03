<div x-data="{isOpen:false,images:'',current:0}"
    x-id="['image-viewer']"
    class=" p-10"
    x-on:view-image.window="isOpen=true;images=event.detail;current=0;">
    <div x-show="isOpen"
        x-cloak
        x-trap.noscroll="isOpen"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="h-full w-full fixed bg-gray-500 z-50 top-0 left-0 p-10 ">
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
        <div x-on:swiped-left="current>0 ? current-- : current = images.length-1"
            x-on:swiped-right="current < images.length-1 ? current++: current = 0"
            class="h-full w-full items-center justify-center flex relative">
            <button x-on:click="current>0 ? current-- : current = images.length-1"
                type="button"
                class="md:inline-flex hidden  absolute left-2 opacity-70  items-center p-1 border border-transparent rounded-full shadow-sm text-white bg-indigo-400 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-400">
                <!-- Heroicon name: solid/plus-sm -->
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <template x-for="(image,index) in images"
                :key="index">
                <img x-cloak
                    x-show="index==current"
                    class="max-h-full max-w-full cursor-pointer"
                    x-bind:src="'https://drive.google.com/uc?export=view&id='+image.file_id"
                    x-bind:alt="'image - '+image.file_id" />
            </template>
            <button x-on:click="current < images.length-1 ? current++: current = 0"
                type="button"
                class="md:inline-flex hidden  absolute right-2 opacity-70  items-center p-1 border border-transparent rounded-full shadow-sm text-white bg-indigo-400 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-400">
                <!-- Heroicon name: solid/plus-sm -->
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</div>
