<div class="sticky top-0 z-50"
    x-data="{atTop:window.pageYOffset || document.documentElement.scrollTop,searching:false}"
    @scroll.window="atTop = window.pageYOffset || document.documentElement.scrollTop">
    <div class="pl-4 pr-6 pt-2 pb-2 border-b   sm:pl-6 lg:pl-8 xl:pl-6 xl:pt-2 xl:border-t-0 "
        x-bind:class="atTop>0 ? 'bg-indigo-600 text-white' : '  text-indigo-600 bg-white'">
        <div class="w-full">
            <div class="flex space-x-2 items-center">
                <img class="h-9 w-10"
                    src="{{ asset('images/ReadUsLogo128.png') }}"
                    alt="logo">
                <div class="w-full flex">
                    <input type="text"
                        x-on:focus="searching=true"
                        x-on:blur="searching=false"
                        name="search"
                        id="search"
                        class="ease-in-out shadow-sm text-indigo-600 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 px-4 rounded-full bg-gray-50"
                        placeholder="Search">
                </div>
                <div class="flex space-x-2 items-center mt-1">
                    <div>
                        <button x-show="searching==false"
                            x-on:click="$dispatch('create-post')"
                            class="rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-8 w-8 font-light md:font-bold  "
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                    </div>
                    <div x-show="searching==false">
                        <livewire:user.notification />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
