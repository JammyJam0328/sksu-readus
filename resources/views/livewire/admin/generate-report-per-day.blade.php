<div x-data="{ctr:true}"
    x-on:keyup.escape.window="ctr = true">

    <nav x-show="ctr"
        class="absolute top-0 w-full bg-gray-800 noprint">
        <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-2 space-x-2">
                <div class="flex items-center space-x-2">
                    <div class="flex items-center ml-2 space-x-2">
                        <label class="text-white"
                            for="">Select Day</label>
                        <input type="date"
                            wire:model.debounce="day"
                            name="day"
                            id="day"
                            class="p-1 bg-white rounded-md">
                    </div>
                    <div class="flex items-center ml-2 space-x-2">
                        <label class="text-white"
                            for="">Select Month</label>
                        <input type="date"
                            wire:model="month"
                            name="month"
                            id="month"
                            class="p-1 bg-white rounded-md">
                    </div>
                </div>
                <div>
                    <button x-on:click="ctr=false; alert('Press Esc Key to show Navigation')"
                        type="button"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Hide Navigation
                    </button>
                    <button x-on:click="window.print()"
                        type="button"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Print (Ctrl + P)
                    </button>
                </div>
            </div>
        </div>

    </nav>
    <div id="reportBody"
        class="p-5 space-y-3">
        <div class="flex space-x-3 ">
            <div>
                <img src="
        {{ asset('images/sksu1.png') }}"
                    class="w-16 h-16 mt-2"
                    alt="">
            </div>
            <div class="grid ">
                <h1 class="text-lg font-bold text-gray-700">Sultan Kudarat State University</h1>
                <h1 class="font-semibold text-gray-700">SKSU-ReadUs report</h1>
                <h1 class="text-sm font-semibold text-gray-700">
                    @if ($action == 'day')
                        Total Post Per Day
                    @elseif ($action == 'month')
                        Total Post Per Month
                    @endif
                </h1>

            </div>

        </div>
        <div class="border-t-2 border-gray-900 ">
            <div>
                @if ($action == 'day')
                    <div class="grid mt-3 space-y-3">
                        @php
                            $new_day = date('MM d, Y', strtotime($day));
                        @endphp
                        <span class="text-xl font-bold"> Date : {{ $new_day }}</span>
                        <span class="text-xl font-bold"> Total Post : {{ $day_total_post }}</span>
                    </div>
                @elseif ($action == 'month')
                    <div class="grid mt-3 space-y-3">
                        @php
                            $new_month = date('F Y', strtotime($month));
                        @endphp
                        <span class="text-xl font-bold"> Month : {{ $new_month }}</span>
                        <span class="text-xl font-bold"> Total Post : {{ $month_total_post }}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
