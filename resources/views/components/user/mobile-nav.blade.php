    <div x-data="mobileNav"
        class="fixed left-2 bottom-16  block md:hidden "
        x-show="show"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-x-1/2"
        x-transition:enter-end="opacity-100 transform translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-x-0"
        x-transition:leave-end="opacity-0 transform -translate-x-1/2"
        x-on:click.away="show=false">
        <div x-on:open-nav.window="openNav()"
            x-on:close-nav.window="closeNav()"
            class="grid  space-y-2 ">
            <nav class="space-y-1 bg-indigo-600 z-50  justify-center rounded-full shadow-2xl py-3 text-gray-50"
                aria-label="Sidebar">
                <a href="#"
                    class=" group flex items-center px-3 py-2 text-sm font-medium rounded-md">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-9 w-9"
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
                    class=" group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/folder -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-9 w-9"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>

                </a>

                <a href="#"
                    class=" group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/calendar -->
                    <svg class=" flex-shrink-0  h-9 w-9"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>

                </a>

                <a href="#"
                    class=" group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                    <!-- Heroicon name: outline/inbox -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class=" flex-shrink-0  h-9 w-9"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </a>
            </nav>

        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('mobileNav', () => ({
                show: false,
                openNav() {
                    this.show = true;
                },
                closeNav() {
                    this.show = false;
                }
            }))
        })
    </script>
