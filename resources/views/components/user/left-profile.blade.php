<div class="flex items-center justify-between p-2 bg-gray-100  rounded-xl ">
    <div class="flex items-center ">
        <div>
            @if (auth()->user()->google_id)
                <img class="inline-block text-gray-700 border border-gray-300 rounded-full h-9 w-9"
                    src="{{ auth()->user()->profile_photo_path == ''? auth()->user()->google_profile_photo: auth()->user()->profile_photo_url }}"
                    alt="">
            @else
                <img class="inline-block text-gray-700 border border-gray-300 rounded-full h-9 w-9"
                    src="{{ auth()->user()->profile_photo_url }}"
                    alt="">
            @endif
        </div>
        <div class="ml-3">
            <p class="text-sm font-bold text-gray-700">
                {{ auth()->user()->name }}
            </p>
            <a class="text-xs font-medium text-gray-700 hover:underline"
                href="{{ route('user-profile', [
                    'email' => auth()->user()->email,
                    'id' => \Crypt::encrypt(auth()->user()->id),
                ]) }}">View
                profile</a>
        </div>
    </div>
</div>
