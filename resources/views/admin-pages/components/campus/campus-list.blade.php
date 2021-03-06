 <div class="flex flex-col">
     <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
         <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
             <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                 <table class="min-w-full divide-y divide-gray-200">
                     <thead class="bg-gray-700">
                         <tr>
                             <th scope="col"
                                 class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                 Name</th>
                             <th scope="col"
                                 class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                 Deparments</th>

                         </tr>
                     </thead>
                     <tbody>
                         <!-- Odd row -->
                         @foreach ($campuses as $key => $campus)
                             <tr class="{{ $key % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                                 <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                     {{ $campus->name }}</td>
                                 <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                     {{ $campus->departments_count }}</td>

                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
             <div class="py-2">
                 {{ $campuses->links() }}
             </div>
         </div>
     </div>
 </div>
