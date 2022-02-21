@extends('layouts.base')
@section('top-nav')
    <div class="sticky top-0 z-50">
        <div class="pt-2 pb-2 pl-4 pr-6 border-b sm:pl-6 lg:pl-8 xl:pl-6 xl:pt-2 xl:border-t-0 bg-indigo-500 text-white">
            <div class="w-full">
                <div class="flex items-center justify-between space-x-2">
                    <div class="flex items-center justify-start w-full px-2 py-2 md:px-0">
                        <a href="{{ Request::server('HTTP_REFERER') }}"
                            class=""><svg xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 "
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg></a>
                        <div class="flex items-center justify-center min-w-0 ml-3 ">
                            <p class="font-medium ">
                                <a href="#">Back</a>
                            </p>
                        </div>
                    </div>
                    <div class="-mb-1">
                        <livewire:user.notification />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('main')
    <div class="flex-1 p-5 space-y-2">
        <div>
            <div>
                <h3 class="text-lg font-medium leading-6 text-gray-900">Announcement</h3>
            </div>
            <div class="mt-5 border-t border-gray-200">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Author</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $announcement->user->name }}</dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Title</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $announcement->title }}</dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500 ">Description</dt>
                        <pre
                            class="mt-1 text-sm text-gray-900 break-words whitespace-pre-line sm:mt-0 sm:col-span-2 font-roboto">
                                                {{ $announcement->body }}
                                            </pre>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Created</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $announcement->created_at->format('M d, Y H:m A') }}</dd>
                    </div>
                    <hr>
                </dl>
            </div>
        </div>
    </div>
@endsection
