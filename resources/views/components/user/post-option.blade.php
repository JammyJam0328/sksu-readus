  <div x-data="{opt:false}"
      class="flex-shrink-0 self-center flex">
      <div class="relative inline-block text-left">
          <div>
              <button x-on:click="opt=!opt"
                  type="button"
                  class="-m-2 p-2 rounded-full flex items-center text-gray-400 hover:text-gray-600"
                  id="options-menu-0-button"
                  aria-expanded="false"
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
              x-show="opt"
              x-on:click.away="opt=false"
              x-transition:enter="transition ease-out duration-100"
              x-transition:enter-start="opacity-0 scale-95"
              x-transition:enter-end="opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-75"
              x-transition:leave-start="opacity-100 scale-100"
              x-transition:leave-end="opacity-0 scale-95"
              class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
              role="menu"
              aria-orientation="vertical"
              aria-labelledby="options-menu-0-button"
              tabindex="-1">
              <div class="py-1"
                  role="none">
                  <a href="#"
                      class="text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100 focus:bg-gray-100"
                      role="menuitem"
                      tabindex="-1"
                      id="options-menu-0-item-1">
                      <svg xmlns="http://www.w3.org/2000/svg"
                          class="mr-3 h-5 w-5 text-gray-400"
                          viewBox="0 0 20 20"
                          fill="currentColor">
                          <path
                              d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                      </svg>
                      <span>View</span>
                  </a>
                  @if ($usersPost)
                      <a href="#"
                          class="text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100 focus:bg-gray-100"
                          role="menuitem"
                          tabindex="-1"
                          id="options-menu-0-item-1">
                          <svg xmlns="http://www.w3.org/2000/svg"
                              class="mr-3 h-5 w-5 text-gray-400"
                              viewBox="0 0 20 20"
                              fill="currentColor">
                              <path
                                  d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                          </svg>

                          <span>Manage</span>
                      </a>

                  @endif
                  <a href="#"
                      class="text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100 focus:bg-gray-100"
                      role="menuitem"
                      tabindex="-1"
                      id="options-menu-0-item-2">
                      <!-- Heroicon name: solid/flag -->
                      <svg class="mr-3 h-5 w-5 text-gray-400"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                          aria-hidden="true">
                          <path fill-rule="evenodd"
                              d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                              clip-rule="evenodd" />
                      </svg>
                      <span>Report content</span>
                  </a>
              </div>
          </div>
      </div>
  </div>
