<div x-data="{isOpen:false,images:'',current:0}"
    x-id="['image-viewer']"
    class="p-10 "
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
        class="fixed top-0 left-0 z-50 w-full h-full p-10 bg-gray-800 ">
        <button x-on:click="url='';isOpen=false"
            class="absolute p-1 font-mono text-white bg-gray-600 border border-white rounded-lg focus:outline-none right-5 top-5">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6"
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
            class="relative flex items-center justify-center w-full h-full">
            <button x-show="images.length>1"
                x-on:click="current>0 ? current-- : current = images.length-1"
                type="button"
                class="absolute items-center hidden p-1 text-gray-400 bg-white border border-transparent rounded-full shadow-sm md:inline-flex left-2 opacity-70 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-400">
                <!-- Heroicon name: solid/plus-sm -->
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6"
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
                    class="max-w-full max-h-full cursor-pointer"
                    x-bind:src="'https://drive.google.com/uc?export=view&id='+image.file_id"
                    x-bind:alt="'image - '+image.file_id" />
            </template>
            <button x-show="images.length>1"
                x-on:click="current < images.length-1 ? current++: current = 0"
                type="button"
                class="absolute items-center hidden p-1 text-gray-400 bg-white border border-transparent rounded-full shadow-sm md:inline-flex right-2 opacity-70 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-400">
                <!-- Heroicon name: solid/plus-sm -->
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6"
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
