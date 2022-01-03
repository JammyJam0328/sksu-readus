  <li x-data="{comment:false}"
      x-bind:id="$id('post')"
      class="bg-white px-4 py-2  sm:p-3 hover:bg-gray-100 ">
      <a href="#">
          <article aria-labelledby="question-title-81614">
              <div>
                  <div class="flex space-x-3">
                      <div class="flex-shrink-0">
                          <img class="h-10 w-10 rounded-full border"
                              src="{{ $post->user->profile_photo_url }}"
                              alt="">
                      </div>
                      <div class="min-w-0 flex-1">
                          <p class="text-sm font-medium text-gray-900">
                              <a href="#"
                                  class="hover:underline">{{ $post->user->name }}</a>
                          </p>
                          <p class="text-sm text-gray-500">
                              @if ($post->created_at->diffInSeconds(Carbon\Carbon::now()) < 60)
                                  Just now
                              @else
                                  <a href="#"
                                      class="hover:underline">
                                      <time
                                          datetime="2020-12-09T11:43:00">{{ $post->created_at->diffForhumans() }}</time>
                                  </a>
                              @endif

                          </p>
                      </div>
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
                                      <a href="{{ route('view-post', [
                                          'post_id' => \Crypt::encrypt($post->id),
                                      ]) }}"
                                          class="text-gray-700 flex px-4 py-2 text-sm hover:bg-gray-100 focus:bg-gray-100"
                                          role="menuitem"
                                          tabindex="-1"
                                          id="options-menu-0-item-1">
                                          <svg xmlns="http://www.w3.org/2000/svg"
                                              class="mr-3 h-5 w-5 text-gray-400"
                                              fill="currentColor">
                                              <path fill-rule="evenodd"
                                                  d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                                  clip-rule="evenodd" />
                                          </svg>
                                          <span>View</span>
                                      </a>
                                      @if ($post->user_id == auth()->user()->id)
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

                  </div>
              </div>
              <div x-data="{showMore:false}"
                  class="mt-2 text-sm text-gray-700 ">
                  <h2 x-bind:id="$id('title')"
                      class="mt-4 text-base font-bold text-gray-900">
                      {{ $post->title }}
                  </h2>
                  <pre class="break-normal whitespace-pre-line font-sans">
                  {{ $post_body }} 
                  @if ($trancated_post_body)
                      @if ($see_more)
                          <a wire:click.prevent="less"
                              href="#{{ $post->title }}"
                              class="italic text-indigo-500 font-medium">see less</a>
@else
                          <a wire:click.prevent="more"
                              href="#{{ $post->title }}"
                              class="italic text-indigo-500 font-medium">see more</a>
                      @endif
                  @endif
                 
              </pre>

              </div>
              @if ($post->hasMedia)
                  <div class="py-1">
                      <livewire:user.media-container :medias="$post->medias" />
                  </div>
              @endif
              <div class="mt-2 flex justify-end space-x-8">
                  <div class="flex space-x-6">
                      <span class="inline-flex items-center text-sm">
                          <div>
                              <button x-on:click="comment=!comment"
                                  type="button"
                                  class="inline-flex space-x-2 text-gray-400 hover:text-gray-500 focus:outline-none">
                                  <!-- Heroicon name: solid/chat-alt -->
                                  <svg x-bind:class="comment? 'animate-bounce':''"
                                      class="h-5 w-5"
                                      xmlns="http://www.w3.org/2000/svg"
                                      viewBox="0 0 20 20"
                                      fill="currentColor"
                                      aria-hidden="true">
                                      <path fill-rule="evenodd"
                                          d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                          clip-rule="evenodd" />
                                  </svg>
                                  <span class="font-medium text-gray-900">{{ $post->comments_count }}</span>
                                  <span class="sr-only">replies</span>
                              </button>
                          </div>
                      </span>
                  </div>
              </div>
          </article>
          <div x-cloak
              x-show="comment"
              x-collapse>
              <div class="py-2 border-t">
                  <div>
                      <label for="comment"
                          class="block text-sm font-medium text-gray-700">Add your comment</label>
                      <div class="mt-1">
                          <textarea rows="4"
                              name="comment"
                              id="comment"
                              class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                      </div>
                  </div>
              </div>
              <div class="flex justify-between px-2 items-center">
                  <a href="#"
                      class="underline text-blue-500">See all comments</a>
                  <button type="button"
                      class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      Comment
                  </button>
              </div>
          </div>
  </li>
