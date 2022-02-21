 <form>
     @csrf
     <div class="divide-y divide-gray-200">
         <div>
             <div>
                 <h3 class="text-lg font-medium leading-6 text-center text-indigo-500">Update Event
                 </h3>
             </div>
             <div class="grid grid-cols-1 mt-2 gap-y-3 gap-x-4 sm:grid-cols-6">
                 <div class="sm:col-span-6">
                     <label for="event-title"
                         class="block text-sm font-medium text-gray-700">Title </label>
                     <div class="flex mt-1 rounded-md shadow-sm">
                         <input wire:model.defer="new_title"
                             type="text"
                             name="event-title"
                             id="event-title"
                             autocomplete="event-title"
                             class="flex-1 block w-full min-w-0 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                     </div>
                 </div>
                 <div class="sm:col-span-6">
                     <label for="description"
                         class="block text-sm font-medium text-gray-700"> Description </label>
                     <div class="mt-1">
                         <textarea wire:model.defer="new_description"
                             id="description"
                             name="description"
                             rows="10"
                             class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                     </div>
                 </div>
                 <div class="sm:col-span-6">
                     <label for="date-start"
                         class="block text-sm font-medium text-gray-700">Starting Date</label>
                     <div class="mt-1">
                         <input wire:model.defer="new_start_date"
                             type="datetime-local"
                             name="date-start"
                             id="date-start"
                             class="flex-1 block w-full min-w-0 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                     </div>
                     <p class="mt-2 text-xs text-gray-500"
                         id="email-description">e.g 03/28/2022 08:00 PM</p>
                 </div>
                 <div class="sm:col-span-6">
                     <label for="date-end"
                         class="block text-sm font-medium text-gray-700">Ending Date</label>
                     <div class="mt-1">
                         <input wire:model.defer="new_end_date"
                             type="datetime-local"
                             name="date-end"
                             id="date-end"
                             class="flex-1 block w-full min-w-0 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                     </div>
                     <p class="mt-2 text-xs text-gray-500"
                         id="email-description">e.g 03/28/2022 08:00 PM</p>
                 </div>

                 <div class="sm:col-span-6">
                     <label for="for"
                         class="block text-sm font-medium text-gray-700">For :</label>
                     <select wire:model.defer="new_publicity"
                         id="for"
                         name="for"
                         class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                         @foreach ($publicities as $publicity)
                             <option value="{{ $publicity['key'] }}">{{ $publicity['value'] }}
                             </option>
                         @endforeach
                     </select>
                 </div>
             </div>
         </div>
     </div>

     <div class="pt-5 pb-12 mt-3 border-t border-gray-300">
         <div class="flex justify-end">
             <button x-on:click="action='none'"
                 type="button"
                 class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
             <button wire:click.prevent="updateEvent"
                 type="submit"
                 class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
         </div>
     </div>
 </form>
