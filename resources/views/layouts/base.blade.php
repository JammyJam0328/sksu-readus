<!DOCTYPE html>
<html class="h-full bg-white"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1">
    <meta name="csrf-token"
        content="{{ csrf_token() }}">
    {{-- theme color --}}
    <meta name="theme-color"
        content="#6366F1">
    <link rel="icon"
        href="{{ asset('images/ReadUsLogo128.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="apple-touch-icon"
        href="{{ asset('images/ReadUsLogo128.png') }}">
    <link rel="manifest"
        href="{{ asset('/manifest.json') }}">
    <link rel="preconnect"
        href="https://fonts.googleapis.com">
    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="{{ mix('css/app.css') }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"
        defer></script>
</head>

<body x-data="sharedstates"
    x-on:scroll.window="$dispatch('close-nav')"
    class="h-full text-gray-600 font-roboto">

    <div class="fixed top-0 left-0 hidden w-1/2 h-full bg-white md:block"
        aria-hidden="true"></div>
    <div class="fixed top-0 right-0 hidden w-1/2 h-full bg-white md:block"
        aria-hidden="true"></div>
    <div class="relative flex flex-col h-full min-h-full">
        <div class="flex-grow w-full mx-auto max-w-7xl xl:px-8 lg:flex">
            <div class="flex-1 min-w-0 bg-white xl:flex">
                <div class="hidden bg-white xl:flex-shrink-0 xl:w-64 xl:border-r xl:border-gray-200 md:block">
                    <div class="sticky top-0 py-6 pl-4 pr-6 space-y-10 sm:pl-6 lg:pl-8 xl:pl-0">
                        <x-user.left-profile />

                        <x-user.navigation />
                    </div>
                </div>
                <div id="main"
                    class="relative w-full ">
                    @yield('top-nav')
                    @yield('main')
                </div>
            </div>
            <div
                class="hidden pt-4 pl-4 pr-4 space-y-4 bg-white sm:pr-6 lg:pr-8 lg:flex-shrink-0 lg:border-l lg:border-gray-200 xl:pr-0 md:block">
                <x-user.quotes />
            </div>
        </div>
        <x-user.bottom-nav />

        <div>
            <x-shared.alert />

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
