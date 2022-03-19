{{-- <div class="space-y-3">
    <div>
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Post Per Campus</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <a href="{{ route('admin-report-per-campus') }}"
                    target="_blank"
                    type="button"
                    class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 sm:w-auto">Generate
                    Report</a>
            </div>
        </div>
        <div class="flex flex-col mt-8">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Campus</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Number of Post
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($campuses as $campus)
                                    <tr>
                                        <td
                                            class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                            {{ $campus->name }}
                                        </td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{ $this->getAllUsersPostsCount($campus->id) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-y-2">
        <h1 class="text-xl font-semibold text-gray-900">Number of Post</h1>
        <div class="flex space-x-2">
            <button type="button"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-700 border border-transparent rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Per Day (generate report)
            </button>
            <button type="button"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-700 border border-transparent rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Per Month (generate report)
            </button>
        </div>
    </div>
</div> --}}

<div x-data="{ctr:true}"
    x-on:keyup.escape.window="ctr = true">

    <nav x-show="ctr"
        class="absolute top-0 w-full bg-gray-800 noprint">
        <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-2 space-x-2">
                <h1 class="text-lg text-white">Report Preview</h1>
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
        class="p-5">
        <div class="flex space-x-3">
            <div>
                <img src="{{ asset('images/sksu1.png') }}"
                    class="w-16 h-16 mt-2"
                    alt="">
            </div>
            <div class="grid ">
                <h1 class="text-lg font-bold text-gray-700">Sultan Kudarat State University</h1>
                <h1 class="font-semibold text-gray-700">SKSU-ReadUs report</h1>
                <h1 class="text-sm font-semibold text-gray-700">Total Post Per Campus</h1>

            </div>
        </div>
        @php
            $total = 0;
        @endphp
        <div class="flex flex-col mt-8">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 ">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">
                                        Campus</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-white">Number of Post
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($campuses as $campus)
                                    <tr>
                                        <td
                                            class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                            {{ $campus->name }}
                                        </td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            @php
                                                $count = $this->getAllUsersPostsCount($campus->id);
                                                $total += $count;
                                            @endphp
                                            {{ $count }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td
                                        class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                        <span class="text-lg font-bold">Total Post</span>
                                    </td>
                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        <span class="text-lg font-bold">{{ $total }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
