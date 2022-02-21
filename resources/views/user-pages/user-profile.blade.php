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
    <div>
        <livewire:user.stateful.user-profile :userid="$user_id" />
        <div>
            <x-shared.image-viewer />
        </div>
    </div>
@endsection
