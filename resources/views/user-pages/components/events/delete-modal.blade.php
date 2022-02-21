 <div x-data="{deleting:false}"
     x-on:start-deleting.window="deleting=true"
     x-on:end-deleting.window="deleting=false">
     <div x-cloak
         x-show="deleting"
         class="fixed inset-0 z-50 overflow-y-auto"
         aria-labelledby="modal-title"
         role="dialog"
         aria-modal="true">
         <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">

             <div x-show="deleting"
                 class="fixed inset-0 transition-opacity bg-gray-100 bg-opacity-75"
                 aria-hidden="true"></div>

             <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                 aria-hidden="true">&#8203;</span>
             <div
                 class="inline-block pt-2 overflow-hidden text-left align-middle transition-all transform bg-white rounded-lg shadow-xl sm:max-w-lg sm:w-full ">
                 <div class="flex justify-center px-4">
                     <div class="mt-1 text-center first-letter ">
                         <h3 class="text-lg font-medium leading-6 text-gray-900"
                             id="modal-title">
                             Confirm
                         </h3>
                         <div class="mt-2 mb-4">
                             <p class="text-sm text-gray-500">
                                 Are you sure you want to delete this Event?
                             </p>
                         </div>
                     </div>
                 </div>
                 <div class="sm:flex sm:flex-row-reverse">
                     <div class="flex w-full border-t border-gray-200 divide-x">
                         <div class="w-full">
                             <button x-on:click="deleting=false"
                                 type="button"
                                 class="items-center w-full px-3 py-2 text-sm font-medium leading-4 text-gray-700 bg-white shadow-sm hover:font-extrabold focus:outline-none">
                                 Cancel
                             </button>
                         </div>
                         <div class="w-full">
                             <button wire:click.prevent="deleteEvent()"
                                 type="button"
                                 class="items-center w-full px-3 py-2 text-sm font-medium leading-4 text-gray-700 bg-white shadow-sm hover:font-extrabold focus:outline-none">
                                 Continue
                             </button>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
