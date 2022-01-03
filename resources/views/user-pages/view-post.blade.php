@extends('layouts.base')
@section('top-nav')
    <div class="sticky top-0 z-50"
        x-data="{atTop:window.pageYOffset || document.documentElement.scrollTop}"
        @scroll.window="atTop = window.pageYOffset || document.documentElement.scrollTop">
        <div class="pl-4 pr-6 pt-2 pb-2 border-b   sm:pl-6 lg:pl-8 xl:pl-6 xl:pt-2 xl:border-t-0 "
            x-bind:class="atTop>0 ? 'bg-indigo-600 text-white' : '  text-indigo-600 bg-white'">
            <div class="w-full">
                <div class="flex space-x-2 items-center justify-between">
                    <div class="w-full py-2 flex items-center justify-start px-2 md:px-0">
                        <a href="{{ route('home') }}"
                            class=""><svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 "
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg></a>
                        <div class="min-w-0 flex items-center justify-center ml-3 ">
                            <p class="font-medium ">
                                <a href="#">{{ $post->user->name }}'s Post</a>
                            </p>
                        </div>
                    </div>
                    <livewire:user.notification />
                </div>
            </div>
        </div>
    </div>
@endsection
@section('main')
    <div>
        <main>
            <div class="bg-white px-4 pt-4  border-b">
                <article class="mb-5"
                    aria-labelledby="question-title-81614">
                    <div>
                        <h2 id="question-title-81614"
                            class="text-xl font-bold text-gray-900">
                            {{ $post->title }}
                        </h2>
                    </div>
                    <div class="mt-2 text-lg text-gray-700 space-y-4">
                        <pre class="break-normal whitespace-pre-line font-sans">
                                                                                                                                                                                                                                {{ $post->body }}
                                                                                                                                                                                                                    </pre>
                    </div>

                </article>
                @if ($post->hasMedia)
                    <div x-data="{mediaOpen:false}"
                        class=" w-full mb-3">
                        <div class="w-fill">
                            <button x-on:click="mediaOpen=!mediaOpen"
                                class="w-full pt-2 flex items-center justify-center text-gray-400"
                                x-text="mediaOpen ? 'Hide' : ' See attached media'">

                            </button>
                        </div>
                        <div x-cloak
                            x-show="mediaOpen"
                            x-collapse>
                            <div>
                                <livewire:user.media-container :medias="$post->medias" />
                            </div>
                        </div>
                    </div>
                @endif

                <div class="text-xs text-gray-400">{{ $post->created_at->format('F j, Y ') }} at
                    {{ $post->created_at->format('g:i a') }}</div>
            </div>
        </main>
        <x-shared.image-viewer />
    </div>
@endsection
