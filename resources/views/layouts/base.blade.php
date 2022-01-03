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
        content="#4F46E5">
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

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap"
        rel="stylesheet">
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

<body x-data
    x-on:swiped-right="$dispatch('open-nav')"
    x-on:swiped-left="$dispatch('close-nav')"
    x-on:scroll.window="$dispatch('close-nav')"
    class="h-full">

    <div class="fixed top-0 left-0 w-1/2 h-full bg-white  hidden md:block"
        aria-hidden="true"></div>
    <div class="fixed top-0 right-0 w-1/2 h-full bg-white  hidden md:block"
        aria-hidden="true"></div>
    <div class="relative min-h-full flex flex-col h-full">
        <div class="flex-grow w-full max-w-7xl mx-auto xl:px-8 lg:flex">
            <div class="flex-1 min-w-0 bg-white xl:flex">
                <div class="xl:flex-shrink-0 xl:w-64 xl:border-r xl:border-gray-200 bg-white hidden md:block">
                    <div class="pl-4 pr-6 py-6 sm:pl-6 lg:pl-8 xl:pl-0 space-y-10 sticky top-0">
                        <x-user.left-profile />

                        <x-user.navigation />
                    </div>
                </div>
                <div id="main"
                    class=" w-full">
                    @yield('top-nav')
                    @yield('main')
                </div>
            </div>
            <div
                class="bg-white pr-4 sm:pr-6 lg:pr-8 lg:flex-shrink-0 lg:border-l lg:border-gray-200 xl:pr-0 space-y-4 hidden md:block">
                <x-user.quotes />
            </div>
        </div>
        {{-- <x-user.bottom-nav /> --}}
        <x-user.mobile-nav />
        <div>
            <x-shared.alert />

        </div>

    </div>


    @livewireScripts
    @stack('livewireScripts')
    @stack('scripts')
    {{-- <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('shared', () => ({
                createButtonText: 'Create post',
                createPost: false,


                toggleCreatePost() {
                    this.createPost = !this.createPost;
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                    if (this.createPost) {
                        this.createButtonText = 'Cancel';
                    } else {
                        this.createButtonText = 'Create post';
                    }
                },


                openCreatePost() {
                    this.createPost = true;
                    this.createButtonText = 'Close';
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                },

                closeCreatePost() {
                    this.createPost = false;
                    this.createButtonText = 'Create post';
                }
            }))
        })
    </script> --}}


    <script src="{{ asset('/sw.js') }}"></script>
    <script>
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
