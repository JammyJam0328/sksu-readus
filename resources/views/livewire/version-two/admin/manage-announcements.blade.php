 <div class="py-6">
     <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
         <h1 class="text-2xl font-semibold text-gray-900">Manage Announcement</h1>
     </div>
     <div class="px-4 mx-auto mt-2 max-w-7xl sm:px-6 md:px-8">
         <div class="p-3 bg-white border rounded-md">
             @if ($action == 'list')
                 @include('vtwo-admin.manage-announcement.list')
             @elseif ($action == 'create')
                 @include('vtwo-admin.manage-announcement.create')
             @endif
         </div>
     </div>
 </div>
