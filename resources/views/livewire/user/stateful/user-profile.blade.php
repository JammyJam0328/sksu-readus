  <div x-data="{tab:'post'}"
      class="pb-14">
      <article>
          <div>
              <div>
                  <img class="object-cover w-full h-32 lg:h-48"
                      src="{{ asset('images/cover.png') }}"
                      alt="">
              </div>
              <div class="max-w-5xl px-4 mx-auto sm:px-6 lg:px-8">
                  <div class="-mt-8 sm:-mt-8 sm:flex sm:items-end sm:space-x-5">
                      <div x-data="{showEditPhoto:false}"
                          x-on:click="showEditPhoto = !showEditPhoto"
                          x-on:mouseover="showEditPhoto = true"
                          x-on:mouseleave="showEditPhoto = false"
                          class="relative flex">
                          @if (auth()->user()->google_id)
                              <img class="w-16 h-16 rounded-full ring-4 ring-white sm:h-16 sm:w-16"
                                  src="{{ auth()->user()->profile_photo_path == ''? auth()->user()->google_profile_photo: auth()->user()->profile_photo_url }}"
                                  alt="">
                          @else
                              <img class="w-16 h-16 rounded-full ring-4 ring-white sm:h-16 sm:w-16"
                                  src="{{ auth()->user()->profile_photo_url }}"
                                  alt="">
                          @endif
                          <div x-cloak
                              x-show="showEditPhoto"
                              class="absolute bottom-0 right-0 w-5 h-5">
                              <form class="relative">
                                  @csrf
                                  <svg xmlns="http://www.w3.org/2000/svg"
                                      class="z-0 w-5 h-5 "
                                      viewBox="0 0 20 20"
                                      fill="currentColor">
                                      <path fill-rule="evenodd"
                                          d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4zm6 9a3 3 0 100-6 3 3 0 000 6z"
                                          clip-rule="evenodd" />
                                  </svg>
                                  <input type="file"
                                      wire:model="new_profile_photo"
                                      class="absolute top-0 left-0 z-20 w-5 h-5 opacity-0"
                                      name="profile_photo"
                                      accept="image/*"
                                      id="profile_photo">
                              </form>
                          </div>
                      </div>
                      <div class="sm:flex-1 sm:min-w-0 sm:flex sm:items-start sm:justify-end sm:space-x-6 sm:pb-1">
                          <div class="flex-1 min-w-0 mt-3 sm:hidden 2xl:block">
                              <h1 class="text-2xl font-bold text-gray-900 truncate">
                                  {{ $user->name }}
                              </h1>
                          </div>
                      </div>
                  </div>
                  <div class="flex-1 hidden min-w-0 mt-6 sm:block 2xl:hidden">
                      <h1 class="text-2xl font-bold text-gray-900 truncate">
                          {{ $user->name }}
                      </h1>
                  </div>
              </div>
          </div>
          <div class="mt-6 sm:mt-2 2xl:mt-5">
              <div class="border-b border-gray-200">
                  <div class="max-w-5xl px-4 mx-auto sm:px-6 lg:px-8">
                      <nav class="flex -mb-px space-x-8"
                          aria-label="Tabs">
                          <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                          <button x-on:click.prevent="tab='post'"
                              type="button"
                              x-bind:class="{'border-pink-500 text-gray-900': tab === 'post', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'post'}"
                              class="px-1 py-4 text-sm font-medium text-gray-500 duration-500 ease-in-out transform border-b-2 border-transparent whitespace-nowrap ">
                              Post
                          </button>

                          @if ($user->id == auth()->user()->id)
                              {{-- <button x-on:click.prevent="tab='bookmark'"
                                  type="button"
                                  x-bind:class="{'border-pink-500 text-gray-900': tab === 'bookmark', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'bookmark'}"
                                  class="px-1 py-4 text-sm font-medium text-gray-500 duration-500 ease-in-out transform border-b-2 border-transparent whitespace-nowrap ">
                                  Bookmarks
                              </button> --}}

                              <button x-on:click.prevent="tab='information'"
                                  type="button"
                                  x-bind:class="{'border-pink-500 text-gray-900': tab === 'information', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'information'}"
                                  class="px-1 py-4 text-sm font-medium text-gray-500 duration-500 ease-in-out transform border-b-2 border-transparent whitespace-nowrap ">
                                  Informations
                              </button>
                              <button x-on:click.prevent="tab='setting'"
                                  type="button"
                                  x-bind:class="{'border-pink-500 text-gray-900': tab === 'setting', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'setting'}"
                                  class="px-1 py-4 text-sm font-medium text-gray-500 duration-500 ease-in-out transform border-b-2 border-transparent whitespace-nowrap ">
                                  Settings
                              </button>
                          @endif
                      </nav>
                  </div>
              </div>
          </div>
          <div x-show="tab=='post'"
              x-collapse>
              <livewire:user.stateful.my-post-list :userid="$userid" />
          </div>
          <div x-cloak
              x-show="tab=='setting'"
              x-collapse>
              @include('user-pages.components.user-profile.settings')
          </div>

          @if ($user->id == auth()->user()->id)
              <div x-cloak
                  x-show="tab=='information'"
                  x-data="{action:'none'}"
                  x-on:notify.window="action = event.detail.nextAction"
                  x-id="['user-information']"
                  x-collapse>
                  @include('user-pages.components.user-profile.information')
              </div>
          @endif
      </article>
  </div>
