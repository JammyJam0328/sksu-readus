<div
    class="relative rounded-xl {{ $happening_now ? 'bg-gradient-to-tr from-indigo-600 to-red-600' : 'bg-gray-700' }}  p-3 shadow-md flex items-center space-x-3   text-white hover:shadow-2xl">
    @if ($happening_now)
        <div class="absolute right-4 top-4">
            <div class="h-6 w-6 bg-green-500 rounded-full  animate-bounce ">

            </div>
        </div>
    @endif
    <div class="flex-1 min-w-0 ">
        <a href="#"
            class="focus:outline-none">
            <span class="absolute inset-0"
                aria-hidden="true"></span>
            <p class=" font-bold ">
                {{ $event->title }} {{ $happening_now ? ' (Happening Now)' : '' }}
            </p>
            <p class="text-sm">
                {{ $event->description }}
            </p>
            <p class="text-sm text-green-500">
                Event for : <span
                    class="inline-flex items-center px-2.5 py-0.5 text-white rounded-full text-xs font-medium bg-green-600">
                    {{ $for }}
                </span>
            </p>
        </a>
        <div class="pt-1 border-t flex items-center space-x-2 mt-1">
            @if ($happening_now)
                <h1 class="text-sm">Ends : </h1>
            @else
                <h1 class="text-sm">Starts : </h1>
            @endif
            <x-shared.my-countdown :expires="$expire_date" />
        </div>
    </div>
</div>
