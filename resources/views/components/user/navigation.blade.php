<nav class="space-y-2"
    aria-label="Sidebar">
    <a href="{{ route('home') }}"
        class="{{ Request::routeIs('home')? 'text-indigo-600 font-extrabold hover:bg-gray-200': 'text-gray-600  hover:bg-indigo-500 hover:text-white' }}  flex items-center px-3 py-2  font-medium rounded-md transform transition ease-in-out duration-300"
        aria-current="page">

        <svg class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 "
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span class="truncate">
            Home
        </span>
    </a>

    <a href="{{ route('announcements') }}"
        class="{{ Request::routeIs('announcements')? 'text-indigo-600 font-extrabold hover:bg-gray-200': 'text-gray-600  hover:bg-indigo-500 hover:text-white' }}  flex items-center px-3 py-2  font-medium rounded-md transform transition ease-in-out duration-300">
        <svg xmlns="http://www.w3.org/2000/svg"
            class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 "
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
        </svg>
        <span class="truncate">
            Announcements
        </span>

        {{-- <span class="bg-gray-200 text-gray-600  ml-auto inline-block py-0.5 px-3 text-xs rounded-full">
            19
        </span> --}}
    </a>

    <a href="{{ route('events') }}"
        class="{{ Request::routeIs('events')? 'text-indigo-600 font-extrabold hover:bg-gray-200': 'text-gray-600  hover:bg-indigo-500 hover:text-white' }}  flex items-center px-3 py-2  font-medium rounded-md transform transition ease-in-out duration-300">
        <svg class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 "
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
        <span class="truncate">
            Events
        </span>

        {{-- <span class="bg-gray-200 text-gray-600  ml-auto inline-block py-0.5 px-3 text-xs rounded-full">
            20+
        </span> --}}
    </a>

    <form method="POST"
        action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();this.closest('form').submit();"
            class="flex items-center px-3 py-2 font-medium text-gray-600 transition duration-300 ease-in-out transform rounded-md  hover:bg-indigo-500 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 "
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>

            <span class="truncate">
                Logout
            </span>

        </a>

    </form>



</nav>
