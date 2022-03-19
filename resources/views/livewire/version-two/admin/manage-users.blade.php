 <div class="py-6">
     <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
         <h1 class="text-2xl font-semibold text-gray-900">Manage Users</h1>
     </div>
     <div class="px-4 mx-auto mt-2 max-w-7xl sm:px-6 md:px-8">
         <div class="p-3 bg-white border rounded-md">
             @if ($action == 'list')
                 @include('vtwo-admin.manage-users.list')
             @elseif ($action == 'create')
                 @include('vtwo-admin.manage-users.create')
             @elseif ($action == 'edit')
                 @include('vtwo-admin.manage-users.edit')
             @endif

             @if ($deleting)
                 @include('vtwo-admin.manage-users.delete-modal')
             @endif
         </div>
     </div>
 </div>
