     <div x-data="{isOpen:false}"
         class="relative inline-block text-left">
         <div>
             <button x-on:click="isOpen=!isOpen"
                 type="button"
                 class=" rounded-full flex items-center text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"
                 id="menu-button"
                 aria-expanded="true"
                 aria-haspopup="true">
                 <span class="sr-only">Open options</span>
                 <!-- Heroicon name: solid/dots-vertical -->
                 <svg class="h-5 w-5"
                     xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20"
                     fill="currentColor"
                     aria-hidden="true">
                     <path
                         d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                 </svg>
             </button>
         </div>


         <div x-cloak
             x-show="isOpen"
             x-on:click.away="isOpen=false"
             x-transition:enter="transition ease-out duration-100"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-75"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
             role="menu"
             aria-orientation="vertical"
             aria-labelledby="menu-button"
             tabindex="-1">
             <div class="py-1"
                 role="none">
                 <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                 @if ($post->user_id == Auth::user()->id)
                     <a href="#"
                         class="text-gray-700 block px-4 py-2 text-sm"
                         role="menuitem"
                         tabindex="-1"
                         id="menu-item-0">Edit</a>
                     <a href="#"
                         class="text-gray-700 block px-4 py-2 text-sm"
                         role="menuitem"
                         tabindex="-1"
                         id="menu-item-1">Delete</a>
                 @endif
                 <a href="#"
                     class="text-gray-700 block px-4 py-2 text-sm"
                     role="menuitem"
                     tabindex="-1"
                     id="menu-item-2">Report</a>

             </div>
         </div>
     </div>
