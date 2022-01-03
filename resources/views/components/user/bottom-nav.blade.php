<div class="w-full block md:hidden">
    <section id="bottom-navigation"
        class="block fixed inset-x-0 bottom-0 z-10 bg-indigo-500 text-gray-100  border-t-2 border-gray-200 shadow-xl ">
        <div id="tabs"
            class="flex justify-between">
            <a href="#"
                class="w-full  justify-center inline-block text-center pt-2 pb-1 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-8 w-8 inline-block mb-1 "
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </a>
            <a href="#"
                class="w-full  justify-center inline-block text-center pt-2 pb-1 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-8 w-8 inline-block mb-1 "
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                </svg>
            </a>

            @if (Request::routeIs('home'))
                <button x-show="createPost==false"
                    x-on:click="openCreatePost()"
                    type="button"
                    class="w-full justify-center inline-block text-center pt-2 pb-1 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8 inline-block mb-1 "
                        viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <button x-show="createPost==true"
                    x-on:click="closeCreatePost()"
                    type="button"
                    class="w-full justify-center inline-block text-center pt-2 pb-1 text-red-600 hover:text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8 inline-block mb-1 "
                        viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            @endif



            <a href="#"
                class="w-full  justify-center inline-block text-center pt-2 pb-1 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-8 w-8 inline-block mb-1 "
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </a>
            <a href="#"
                class="w-full  justify-center inline-block text-center pt-2 pb-1 focus:outline-none">
                <img src="{{ auth()->user()->profile_photo_url }}"
                    class="h-6 w-6 mt-1 ring ring-indigo-500 inline-block mb-1 rounded-full"
                    alt="">
            </a>
        </div>
    </section>
</div>
