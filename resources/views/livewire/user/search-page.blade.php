<div>
    <div class="flex-1 p-3 space-y-4 ">
        <div>
            <form class="relative pt-2 mx-auto text-gray-600">
                @csrf
                <div>
                    <input wire:model.debounce.500ms="searchTerm"
                        class="w-full h-10 px-5 pr-16 text-sm bg-gray-100 border-0 rounded-md focus:outline-none focus:ring-1 focus:ring-gray-100"
                        type="search"
                        name="search"
                        placeholder="Search "
                        autocomplete="search"
                        placeholder="Search">
                    <button type="button"
                        class="absolute top-0 right-0 mt-5 mr-4">
                        <svg class="w-4 h-4 text-gray-400 fill-current"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            version="1.1"
                            id="Capa_1"
                            x="0px"
                            y="0px"
                            viewBox="0 0 56.966 56.966"
                            style="enable-background:new 0 0 56.966 56.966;"
                            xml:space="preserve"
                            width="512px"
                            height="512px">
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                        </svg>
                    </button>
                </div>
            </form>
            <div>

            </div>
        </div>
        <div class="divide-y-2 divide-gray-200">
            <div>
                @if ($searchTerm != '')
                    <div class="p-2">
                        <div class="py-1">
                            <h1 class="text-lg text-gray-400">USERS</h1>
                        </div>
                        <ul role="list"
                            class="divide-y divide-gray-200">
                            @forelse ($userResults as $key => $user)
                                <li wire:key="{{ $key }}-user-{{ $key }}"
                                    class="flex py-4">
                                    @if ($user->google_id)
                                        <img class="w-10 h-10 rounded-full"
                                            src="{{ $user->profile_photo_path == '' ? $user->google_profile_photo : $user->profile_photo_url }}"
                                            alt="">
                                    @else
                                        @php
                                            $tempPhoto = 'https://ui-avatars.com/api/?name=' . $user->name . '&size=128&background=EBF4FF&color=7F9CF5';
                                        @endphp
                                        <img class="w-10 h-10 rounded-full"
                                            src="{{ $tempPhoto }}"
                                            alt="">
                                    @endif

                                    <div class="ml-3">
                                        <a href="{{ route('user-profile', [
                                            'email' => $user->email,
                                            'id' => \Crypt::encrypt($user->id),
                                        ]) }}"
                                            class="text-sm font-medium text-gray-900 underline">{{ $user->name }}</a>
                                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                                    </div>
                                </li>
                            @empty
                                <li class="py-4">
                                    <p class="text-sm text-gray-500">No users found</p>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                @endif
            </div>
            <div>
                @if ($searchTerm != '')
                    <div class="p-2">
                        <div class="py-1">
                            <h1 class="text-lg text-gray-400">POSTS</h1>
                        </div>
                        <ul role="list"
                            class="divide-y divide-gray-200">
                            @forelse ($postResults as $key => $post)
                                <li wire:key="{{ $key }}-post-{{ $key }}"
                                    class="relative px-2 py-3 bg-white focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                    <div class="flex justify-between space-x-3">
                                        <div class="flex-1 min-w-0">
                                            <a href="{{ route('view-post', [
                                                'post_id' => \Crypt::encrypt($post->id),
                                            ]) }}"
                                                class="block focus:outline-none">
                                                <span class="absolute inset-0"
                                                    aria-hidden="true"></span>
                                                <p class="text-sm font-medium text-gray-900 underline truncate">
                                                    {{ $post->title }}
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mt-1">
                                        <p class="text-sm text-gray-600 line-clamp-2">
                                            {{ \Illuminate\Support\Str::limit($post->body, 100) }}
                                        </p>
                                    </div>
                                </li>
                            @empty
                                <li class="py-4">
                                    <p class="text-sm text-gray-500">No posts found</p>
                                </li>
                            @endforelse
                        </ul>

                    </div>
                @endif
            </div>
        </div>
        <div wire:loading.flex
            wire:target="searchTerm"
            class="flex items-center justify-center">
            <h1 class="text-2xl text-gray-400">
                Searching . . .
            </h1>
        </div>
    </div>
</div>
