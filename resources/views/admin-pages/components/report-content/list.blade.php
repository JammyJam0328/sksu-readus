 <div>
     <div class="sm:flex sm:items-center">
         @if (session()->has('success'))
             <div class="w-full">
                 <div class="w-full p-4 rounded-md bg-green-50">
                     <div class="flex">
                         <div class="flex-shrink-0">
                             <svg class="w-5 h-5 text-green-400"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20"
                                 fill="currentColor"
                                 aria-hidden="true">
                                 <path fill-rule="evenodd"
                                     d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                     clip-rule="evenodd" />
                             </svg>
                         </div>
                         <div class="ml-3">
                             <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                         </div>
                         <div class="pl-3 ml-auto">
                             <div class="-mx-1.5 -my-1.5">
                                 <button wire:click.prevent="removeSession"
                                     type="button"
                                     class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
                                     <span class="sr-only">Dismiss</span>
                                     <svg class="w-5 h-5"
                                         xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20"
                                         fill="currentColor"
                                         aria-hidden="true">
                                         <path fill-rule="evenodd"
                                             d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                             clip-rule="evenodd" />
                                     </svg>
                                 </button>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         @endif
     </div>
     <div class="mt-4 -mx-4 overflow-hidden border border-gray-200 rounded-md sm:-mx-6 md:mx-0 md:rounded-lg">
         <table class="min-w-full divide-y divide-gray-300 ">
             <thead class="bg-gray-600">
                 <tr>
                     <th scope="col"
                         class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-6">Title</th>
                     <th scope="col"
                         class="hidden px-3 py-3.5 text-left text-sm font-semibold text-white sm:table-cell">
                         Reason</th>

                     <th scope="col"
                         class="px-3 py-3.5 text-center text-sm font-semibold text-white">Action</th>
                 </tr>
             </thead>
             <tbody class="bg-white divide-y divide-gray-200">
                 @forelse ($reports as $report)
                     <tr>
                         <td class="py-4 pl-4 pr-3 text-xs font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                             {{ $report->post->title }}
                         </td>
                         <td class="hidden px-3 py-4 text-sm text-gray-500 whitespace-nowrap sm:table-cell">
                             {{ $report->reason->title }}
                         </td>

                         <td class="py-4 pl-3 pr-4 text-sm font-medium text-right uppercase whitespace-nowrap sm:pr-6">
                             <button wire:click="viewDetails({{ $report->id }})"
                                 wire:loading.attr="disabled"
                                 wire:target="viewDetails"
                                 type="button"
                                 class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                 View Details
                             </button>
                             <button type="button"
                                 class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                 Delete
                             </button>
                         </td>
                     </tr>
                 @empty
                     <tr>
                         <td colspan="3"
                             class="p-4 text-center">
                             <p class="text-gray-500">No reports yet.</p>
                         </td>
                     </tr>
                 @endforelse
             </tbody>
         </table>
     </div>
 </div>
