<!DOCTYPE html>
<html class="h-full bg-gray-100"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">
    <meta name="csrf-token"
        content="{{ csrf_token() }}">

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

<body class="h-full overflow-hidden font-poppins">

    <div class="flex h-full">
        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-20">
                <div class="flex flex-col flex-1 min-h-0 overflow-y-auto bg-blue-600">
                    <div class="flex-1">
                        <div class="flex items-center justify-center py-4 bg-blue-700">
                            <img class="w-auto h-8"
                                src="https://tailwindui.com/img/logos/workflow-mark.svg?color=white"
                                alt="Workflow">
                        </div>
                        <nav aria-label="Sidebar"
                            class="flex flex-col items-center py-6 space-y-3">
                            <a href="#"
                                class="flex items-center p-4 text-blue-200 rounded-lg hover:bg-blue-700">
                                <svg class="w-6 h-6"
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
                                <span class="sr-only">Home</span>
                            </a>

                            <a href="#"
                                class="flex items-center p-4 text-blue-200 rounded-lg hover:bg-blue-700">
                                <svg class="w-6 h-6"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" />
                                </svg>
                                <span class="sr-only">Trending</span>
                            </a>

                            <a href="#"
                                class="flex items-center p-4 text-blue-200 rounded-lg hover:bg-blue-700">
                                <svg class="w-6 h-6"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="sr-only">Bookmarks</span>
                            </a>

                            <a href="#"
                                class="flex items-center p-4 text-blue-200 rounded-lg hover:bg-blue-700">
                                <svg class="w-6 h-6"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                <span class="sr-only">Messages</span>
                            </a>

                            <a href="#"
                                class="flex items-center p-4 text-blue-200 rounded-lg hover:bg-blue-700">
                                <svg class="w-6 h-6"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span class="sr-only">Profile</span>
                            </a>
                        </nav>
                    </div>
                    <div class="flex flex-shrink-0 pb-5">
                        <a href="#"
                            class="flex-shrink-0 w-full">
                            <img class="block w-10 h-10 mx-auto rounded-full"
                                src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2.5&w=256&h=256&q=80"
                                alt="">
                            <div class="sr-only">
                                <p>Lisa Marie</p>
                                <p>Account settings</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col flex-1 min-w-0 overflow-hidden">

            <main class="flex flex-1 overflow-hidden">
                <div class="flex flex-col flex-1 overflow-y-auto xl:overflow-hidden">
                    <nav aria-label="Breadcrumb"
                        class="sticky top-0 z-50 bg-white border-b border-blue-gray-200 xl:hidden">
                        <div class="flex items-start max-w-3xl px-4 py-3 mx-auto sm:px-6 lg:px-8">

                            @yield('title')
                        </div>
                    </nav>

                    <div class="flex flex-1 xl:overflow-hidden">
                        <div class="flex-1 xl:overflow-y-auto">
                            <div class="max-w-3xl p-5 px-2 pb-10 mx-auto sm:px-6 lg:py-5 lg:px-8">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>



    @livewireScripts
    @stack('livewireScripts')
    @stack('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('sharedstates', () => ({
                replaceURLs(message) {
                    if (!message) return;

                    var urlRegex = /(((https?:\/\/)|(www\.))[^\s]+)/g;
                    return message.replace(urlRegex, function(url) {
                        var hyperlink = url;
                        if (!hyperlink.match('^https?:\/\/')) {
                            hyperlink = 'http://' + hyperlink;
                        }
                        return '<a href="' + hyperlink +
                            '" target="_blank" rel="noopener noreferrer">' + url + '</a>'
                    });
                }
            }))
        })
    </script>

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        function askNotificationPermision() {
            if (Notification.permission !== "granted") {
                Notification.requestPermission();
            }
        }

        function fireNotification() {
            new Notification('SKSU ReadUs', {
                icon: '{{ asset('images/ReadUsLogo128.png') }}',
                body: 'You have a new notification',
            });
        }
        window.addEventListener('DOMContentLoaded', askNotificationPermision);
        window.livewire.on('new-notification', function() {
            fireNotification();
        });
        try {
            if (!navigator.serviceWorker.controller) {
                navigator.serviceWorker.register("/sw.js").then(function(reg) {
                    console.log("Service worker has been registered for scope: " + reg.scope);
                });
            }
        } catch (error) {
            console.log(error);
        }
    </script>
</body>

</html>
