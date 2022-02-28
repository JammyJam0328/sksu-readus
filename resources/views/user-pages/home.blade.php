@extends('layouts.base')
@section('top-nav')
    <div class="sticky top-0 z-50">
        <div class="pt-2 pb-2 pl-4 pr-6 text-white bg-indigo-500 border-b sm:pl-6 lg:pl-8 xl:pl-6 xl:pt-2 xl:border-t-0">
            <div class="w-full">
                <div class="flex items-center justify-between space-x-2">
                    <div class="flex space-x-2">
                        <img class="w-10 h-9"
                            src="{{ asset('images/ReadUsLogo128.png') }}"
                            alt="logo">
                    </div>
                    <div class="flex items-center space-x-2">
                        <div>
                            <a href="{{ route('search') }}"
                                class="mt-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-8 h-8 font-light md:font-bold "
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </a>
                        </div>
                        <div>
                            <button x-on:click="$dispatch('create-post')"
                                class="mt-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-8 h-8 font-light md:font-bold "
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
                        <div>
                            <livewire:user.notification />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('main')
    <div x-data="{formOpen:false}"
        x-on:create-post.window="formOpen=!formOpen">
        <div x-cloak
            x-show="formOpen"
            x-collapse.duration.500ms>
            <div>
                <livewire:user.process.create-post />
            </div>
        </div>
        <main>
            <div class="z-50 flex items-center justify-center ">
                <div class="hidden w-full p-1 text-center text-indigo-500 bg-indigo-100">
                    9+ new posts
                </div>
            </div>
            <div class="mt-2">
                <h1 class="text-xl font-semibold text-center text-gray-500">Posts</h1>
            </div>
            <livewire:user.stateful.post-list>
        </main>
        <x-shared.image-viewer />
    </div>
@endsection

{{-- @extends('layouts.newbase')
@section('title')
    <span class="inline-flex items-center space-x-3 text-sm font-medium text-blue-gray-900">
        <a href="#"
            class="text-lg font-semibold text-gray-600">
            Home
        </a>
    </span>
@endsection
@section('content')
    <div x-data="{formOpen:false}"
        x-on:create-post.window="formOpen=!formOpen">
        <div x-cloak
            x-show="formOpen"
            x-collapse.duration.500ms>
            <div>
                <livewire:user.process.create-post />
            </div>
        </div>
        <main>
            <div class="z-50 flex items-center justify-center ">
                <div class="hidden w-full p-1 text-center text-indigo-500 bg-indigo-100">
                    9+ new posts
                </div>
            </div>

            <livewire:user.stateful.post-list>
        </main>
        <x-shared.image-viewer />
    </div>
@endsection --}}
