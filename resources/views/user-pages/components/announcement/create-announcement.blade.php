 <form>
     @csrf
     <div class="space-y-8 divide-y divide-gray-200">
         <div>
             <div>
                 <h3 class="text-lg font-medium leading-6 text-center text-indigo-500">
                     Create New Announcement
                 </h3>
             </div>
             <div class="grid grid-cols-1 mt-2 gap-y-4 gap-x-4 sm:grid-cols-6">
                 <div class="sm:col-span-6">
                     <label for="username"
                         class="block text-sm font-medium text-gray-700"> Title </label>
                     <div class="flex mt-1 rounded-md shadow-sm ">
                         <input wire:model.defer="title"
                             type="text"
                             name="title"
                             id="title"
                             autocomplete="title"
                             class="flex-1 block w-full min-w-0 border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                     </div>
                     @error('title')
                         <span class="text-xs italic text-red-500"
                             role="alert">
                             {{ $message }}
                         </span>
                     @enderror
                 </div>
                 <div class="sm:col-span-6">
                     <label for="about"
                         class="block text-sm font-medium text-gray-700">Body </label>
                     <div class="mt-1">
                         <textarea wire:model.defer="body"
                             id="body"
                             name="body"
                             rows="10"
                             class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>

                     </div>
                     @error('body')
                         <span class="text-xs italic text-red-500"
                             role="alert">
                             {{ $message }}
                         </span>
                     @enderror
                 </div>

                 <div class="sm:col-span-6">
                     <label for="location"
                         class="block text-sm font-medium text-gray-700">For : </label>
                     <select wire:model.defer="visibility"
                         id="visibility"
                         name="visibility"
                         class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                         @foreach ($visibilities as $item)
                             <option value="{{ $item['key'] }}">{{ $item['value'] }}</option>
                         @endforeach
                     </select>
                     @error('visibility')
                         <span class="text-xs italic text-red-500"
                             role="alert">
                             {{ $message }}
                         </span>
                     @enderror
                 </div>
             </div>
         </div>
     </div>
     <div class="pt-5">
         <div class="flex justify-end">
             <button x-on:click="action='none'"
                 type="button"
                 class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
             <button wire:click.prevent="create"
                 type="submit"
                 class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
         </div>
     </div>
 </form>
