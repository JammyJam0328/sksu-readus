<!DOCTYPE html>
<html class="h-full bg-gray-100"
    class="h-full bg-white"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">
    <meta name="csrf-token"
        content="{{ csrf_token() }}">
    <link rel="icon"
        href="{{ asset('images/ReadUsLogo128.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="manifest"
        href="{{ asset('manifest.json') }}">
    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet"
        href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"
        defer></script>
</head>

<body x-data="{mobileNav:false}"
    class="h-full overflow-hidden text-gray-700 font-poppins">
    <div class="flex flex-col h-full">
        <div class="flex flex-1 min-h-0 overflow-hidden ">
            <nav aria-label="Sidebar"
                class="grid items-center bg-gray-900 ">
                <div class="w-20 p-3 space-y-3 ">
                    <a href="{{ route('admin-dashboard') }}"
                        class="{{ Request::routeIs('admin-dashboard') ? 'bg-gray-700 text-white' : 'text-gray-400' }} inline-flex h-14 w-14  items-center justify-center flex-shrink-0  rounded-lg ">
                        <span class="sr-only">Dashboard</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </a>
                    <a href="{{ route('admin-users') }}"
                        class="{{ Request::routeIs('admin-users') ? 'bg-gray-700  text-white' : 'text-gray-400' }}  inline-flex items-center justify-center flex-shrink-0  rounded-lg  h-14 w-14 ">
                        <span class="sr-only">Users</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </a>

                    <a href="{{ route('admin-posts') }}"
                        class="{{ Request::routeIs('admin-posts') ? 'bg-gray-700  text-white' : 'text-gray-400' }}  inline-flex items-center justify-center flex-shrink-0  rounded-lg  h-14 w-14 ">
                        <span class="sr-only">Post</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </a>
                    <a href="{{ route('admin-announcements') }}"
                        class="{{ Request::routeIs('admin-announcements') ? 'bg-gray-700 text-white' : 'text-gray-400' }}   inline-flex items-center justify-center flex-shrink-0  rounded-lg h-14 w-14 ">
                        <span class="sr-only">Announcements</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                    </a>
                    <a href="{{ route('admin-events') }}"
                        class="{{ Request::routeIs('admin-events') ? 'bg-gray-700  text-white' : 'text-gray-400' }} inline-flex items-center justify-center flex-shrink-0  rounded-lg  h-14 w-14 ">
                        <span class="sr-only">Events</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </a>
                    <a href="{{ route('admin-school') }}"
                        class="{{ Request::routeIs('admin-school') ? 'bg-gray-700 text-white' : 'text-gray-400' }} inline-flex items-center justify-center flex-shrink-0  rounded-lg  h-14 w-14 ">
                        <span class="sr-only">School</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                        </svg>
                    </a>

                    <a href="#"
                        class="inline-flex items-center justify-center flex-shrink-0 text-gray-400 rounded-lg hover:bg-gray-700 h-14 w-14 hover:text-white">
                        <span class="sr-only">Reported Post</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>

                    <a href="/user/profile"
                        class="inline-flex items-center justify-center flex-shrink-0 text-gray-400 rounded-lg hover:bg-gray-700 h-14 w-14 hover:text-white">
                        <span class="sr-only">Setting</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </a>
                </div>
            </nav>

            <main class="w-full pb-10 overflow-y-auto border-t border-gray-200 ">


                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="max-w-3xl mx-auto">

                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
        <x-shared.alert />
    </div>

    @livewireScripts()
    @stack('livewireScripts')
</body>

</html>
