@extends('layouts.base')
@section('top-nav')
    <livewire:user.search />
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
            <div class=" flex justify-center z-50 items-center">
                <div class="bg-indigo-100 text-indigo-500 p-1  w-full text-center hidden">
                    9+ new posts
                </div>
            </div>
            {{-- <div class="w-full">
                <div class="bg-white px-4 py-6 shadow sm:p-6 sm:rounded-lg">
                    <article aria-labelledby="question-title-81614">
                        <div>
                            <div class="flex space-x-3">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full"
                                        src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-sm font-medium text-gray-900">
                                        <a href="#"
                                            class="hover:underline">Dries Vincent</a>
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        <a href="#"
                                            class="hover:underline">
                                            <time datetime="2020-12-09T11:43:00">December 9 at 11:43 AM</time>
                                        </a>
                                    </p>
                                </div>

                            </div>
                            <h2 id="question-title-81614"
                                class="mt-4 text-base font-medium text-gray-900">
                                What would you have done differently if you ran Jurassic Park?
                            </h2>
                        </div>
                        <div class="mt-2 text-sm text-gray-700 space-y-4">
                            <p>Jurassic Park was an incredible idea and a magnificent feat of engineering, but poor
                                protocols and a disregard for human safety killed what could have otherwise been one of the
                                best businesses of our generation.</p>
                            <p>Ultimately, I think that if you wanted to run the park successfully and keep visitors safe,
                                the most important thing to prioritize would be&hellip;</p>
                        </div>


                    </article>
                </div>
            </div> --}}
            <livewire:user.stateful.post-list>
        </main>
        <x-shared.image-viewer />
    </div>
@endsection
