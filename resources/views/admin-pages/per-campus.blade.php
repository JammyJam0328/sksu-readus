<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
        content="ie=edge">
    <title>Print-Report</title>
    <link rel="stylesheet"
        href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <style>
        @media print {
            .noprint {
                visibility: hidden;
            }
        }

    </style>
</head>

<body onload="window.print()"
    class="p-5 bg-white">
    <div id="noprint"
        class="absolute top-0 right-0 w-full py-3 text-white bg-black noprint">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat praesentium tempora soluta laborum asperiores
        fugiat dolorum, natus iste veritatis iure fuga sed temporibus, facilis veniam facere ad modi atque rem?
    </div>
    <div class="-mt-5">
        <div class="flex space-x-2">
            <div class="mt-2">
                <img src="{{ asset('images/sksu1.png') }}"
                    class="h-14 w-14"
                    alt="">
            </div>
            <div class="grid w-full text-xl ">
                <span class="font-semibold text-gray-600"> Sultan Kudarat State University</span>
                <span>SKSU-<span class="text-indigo-600">ReadUs</span> </span>
                <span> Report</span>
            </div>
        </div>
        <div>
            <div class="flex justify-end">
                <span>
                    Date : @php
                        $date = date('M d, Y');
                        echo $date;
                        
                    @endphp
                </span>
            </div>
            @php
                $post_total = 0;
            @endphp
            <div class="flex flex-col ">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border-2 border-gray-700">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">
                                            Campus</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-white">Number of
                                            Post
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
                                                    $post_count = \App\Models\Post::whereHas('user', function ($query) use ($campus) {
                                                        $query->where('campus_id', $campus->id);
                                                    })->count();
                                                    $post_total += $post_count;
                                                @endphp
                                                {{ $post_count }}

                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td
                                            class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                            <span class="text-lg font-bold text-gray-700"> Total Post</span>
                                        </td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            <span class="text-lg font-bold text-gray-700">{{ $post_total }}</span>
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
</body>

</html>
