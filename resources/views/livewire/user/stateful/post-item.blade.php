  <li x-data="{comment:false}"
      x-bind:id="$id('post')"
      class="">
      <div class="p-4 border border-gray-200 bg-gray-50 rounded-xl hover:bg-gray-100 hover:shadow">
          <div class="flex justify-between">
              <div class="flex items-center">
                  @if ($post->user->google_id)
                      <img class="border border-gray-400 rounded-full h-11 w-11"
                          src="{{ $post->user->profile_photo_path == '' ? $post->user->google_profile_photo : $post->user->profile_photo_url }}" />
                  @else
                      <img class="border border-gray-400 rounded-full h-11 w-11"
                          src="{{ $post->user->profile_photo_url }}" />
                  @endif
                  <div class="ml-1.5 text-sm leading-tight">
                      <span class="block font-bold text-black dark:text-white ">{{ $post->user->name }}</span>
                      <span class="block font-normal text-gray-500 dark:text-gray-400">
                          {{ $post->user->email }}
                      </span>
                  </div>
              </div>
              <div x-data="{opt:false}"
                  class="flex self-center flex-shrink-0">
                  <div class="relative inline-block text-left">
                      <div>
                          <button x-on:click="opt=!opt"
                              type="button"
                              class="flex items-center p-2 -m-2 text-gray-400 rounded-full hover:text-gray-600"
                              id="options-menu-0-button"
                              aria-expanded="false"
                              aria-haspopup="true">
                              <span class="sr-only">Open options</span>
                              <svg class="w-5 h-5"
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
                          class="absolute right-0 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                          role="menu"
                          aria-orientation="vertical"
                          aria-labelledby="options-menu-0-button"
                          tabindex="-1">
                          <div class="py-1"
                              role="none">
                              <a href="{{ route('view-post', [
                                  'post_id' => \Crypt::encrypt($post->id),
                              ]) }}"
                                  class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:bg-gray-100"
                                  role="menuitem"
                                  tabindex="-1"
                                  id="options-menu-0-item-1">
                                  <svg xmlns="http://www.w3.org/2000/svg"
                                      class="w-5 h-5 mr-3 text-gray-400"
                                      fill="currentColor">
                                      <path fill-rule="evenodd"
                                          d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                          clip-rule="evenodd" />
                                  </svg>
                                  <span>View</span>
                              </a>
                              <a href="#"
                                  class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:bg-gray-100"
                                  role="menuitem"
                                  tabindex="-1"
                                  id="options-menu-0-item-2">
                                  <svg class="w-5 h-5 mr-3 text-gray-400"
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
          <p wire:key="{{ $post->id }}-{{ $post->title }}"
              class="block text-lg leading-snug text-black break-words whitespace-pre-line font-roboto ">
              <span class="font-bold">{{ $post->title }}</span>
              @php
                  $text = html_entity_decode($post_body);
                  $text = ' ' . $text;
                  $text = preg_replace("/(^|[\n ])([\w]*?)([\w]*?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$3\" >$3</a>", $text);
                  $text = preg_replace("/(^|[\n ])([\w]*?)((www|wap)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a class=\"text-blue-600 underline\" target=\"_black\" href=\"http://$3\" >$3</a>", $text);
                  $text = preg_replace("/(^|[\n ])([\w]*?)((ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$4://$3\" >$3</a>", $text);
                  $text = preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a class=\"text-blue-600 underline\" target=\"_black\" href=\"mailto:$2@$3\">$2@$3</a>", $text);
                  $text = preg_replace("/(^|[\n ])(mailto:[a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$2@$3\">$2@$3</a>", $text);
                  $text = preg_replace("/(^|[\n ])(skype:[^ \,\"\t\n\r<]*)/i", "$1<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$2\">$2</a>", $text);
                  
              @endphp
              {!! $text !!}

              </pre>
              @if ($post->hasMedia)
                  <div class="py-1"
                      x-id="['media-container']">
                      <livewire:user.media-container :medias="$post->medias" />
                  </div>
              @endif
          <p class="text-gray-500 dark:text-gray-400 text-base py-1 my-0.5">
              @if ($post->created_at->diffInSeconds(Carbon\Carbon::now()) < 60)
                  Just now
              @else
                  {{ $post->created_at->diffForhumans() }}
              @endif
          </p>
          <div class="my-1 border border-b-0 border-gray-200"></div>
          <div class="flex justify-end gap-2 mt-3 text-gray-500">
              <div class="flex items-center ">
                  <svg x-on:click="alert('This feature is currently disabled')"
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-auto h-5"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <span class="ml-3"></span>
              </div>
              <a href="{{ route('view-post', [
                  'post_id' => \Crypt::encrypt($post->id),
              ]) }}"
                  class="flex items-center ">
                  <svg xmlns="http://www.w3.org/2000/svg"
                      class="w-5 h-5"
                      viewBox="0 0 20 20"
                      fill="currentColor">
                      <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                      <path
                          d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                  </svg>
                  <span class="ml-1">{{ $commentCount }}</span>
              </a>
          </div>
      </div>

  </li>
  {{-- <article aria-labelledby="question-title-81614">
          <div>
              <div class="flex space-x-3">
                  <div class="flex-shrink-0">
                      <img class="w-10 h-10 border rounded-full"
                          src="{{ $post->user->profile_photo_url }}"
                          alt="">
                  </div>
                  <div class="flex-1 min-w-0">
                      <p class="text-sm font-medium text-gray-900">
                          <a href="{{ route('user-profile', [
                              'email' => $post->user->email,
                              'id' => \Crypt::encrypt($post->user->id),
                          ]) }}"
                              class="hover:underline">{{ $post->user->name }}</a>
                      </p>
                      <p class="text-sm text-gray-500">
                          @if ($post->created_at->diffInSeconds(Carbon\Carbon::now()) < 60)
                              Just now
                          @else
                              <span>
                                  <time datetime="2020-12-09T11:43:00">{{ $post->created_at->diffForhumans() }}</time>
                              </span>
                          @endif

                      </p>
                  </div>
                  <div x-data="{opt:false}"
                      class="flex self-center flex-shrink-0">
                      <div class="relative inline-block text-left">
                          <div>
                              <button x-on:click="opt=!opt"
                                  type="button"
                                  class="flex items-center p-2 -m-2 text-gray-400 rounded-full hover:text-gray-600"
                                  id="options-menu-0-button"
                                  aria-expanded="false"
                                  aria-haspopup="true">
                                  <span class="sr-only">Open options</span>
                                  <!-- Heroicon name: solid/dots-vertical -->
                                  <svg class="w-5 h-5"
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
                              class="absolute right-0 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                              role="menu"
                              aria-orientation="vertical"
                              aria-labelledby="options-menu-0-button"
                              tabindex="-1">
                              <div class="py-1"
                                  role="none">
                                  <a href="{{ route('view-post', [
                                      'post_id' => \Crypt::encrypt($post->id),
                                  ]) }}"
                                      class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:bg-gray-100"
                                      role="menuitem"
                                      tabindex="-1"
                                      id="options-menu-0-item-1">
                                      <svg xmlns="http://www.w3.org/2000/svg"
                                          class="w-5 h-5 mr-3 text-gray-400"
                                          fill="currentColor">
                                          <path fill-rule="evenodd"
                                              d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                              clip-rule="evenodd" />
                                      </svg>
                                      <span>View</span>
                                  </a>

                                  <a href="#"
                                      class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:bg-gray-100"
                                      role="menuitem"
                                      tabindex="-1"
                                      id="options-menu-0-item-2">
                                      <!-- Heroicon name: solid/flag -->
                                      <svg class="w-5 h-5 mr-3 text-gray-400"
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
              x-on:dblclick="window.location.href='{{ route('view-post', [
                  'post_id' => \Crypt::encrypt($post->id),
              ]) }}'"
              class="text-sm text-gray-700 md:ml-12">
              <h2 x-bind:id="$id('title')"
                  class="mt-2 text-base font-bold text-gray-900">
                  {{ $post->title }}
              </h2>
              <pre wire:key="{{ $post->id }}-{{ $post->title }}"
                  class="break-words whitespace-pre-line font-poppins">
                      @php
                          $text = html_entity_decode($post_body);
                          $text = ' ' . $text;
                          $text = preg_replace("/(^|[\n ])([\w]*?)([\w]*?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$3\" >$3</a>", $text);
                          $text = preg_replace("/(^|[\n ])([\w]*?)((www|wap)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a class=\"text-blue-600 underline\" target=\"_black\" href=\"http://$3\" >$3</a>", $text);
                          $text = preg_replace("/(^|[\n ])([\w]*?)((ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$4://$3\" >$3</a>", $text);
                          $text = preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a class=\"text-blue-600 underline\" target=\"_black\" href=\"mailto:$2@$3\">$2@$3</a>", $text);
                          $text = preg_replace("/(^|[\n ])(mailto:[a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$2@$3\">$2@$3</a>", $text);
                          $text = preg_replace("/(^|[\n ])(skype:[^ \,\"\t\n\r<]*)/i", "$1<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$2\">$2</a>", $text);
                          
                      @endphp
                    {!! $text !!}
                    @if ($trancated_post_body)
                            @if ($see_more)
                                <a wire:click.prevent="less" href="#{{ $post->title }}"
                                    class="italic font-medium text-indigo-500">
                                    see less
                                </a>
                            @else
                                <a wire:click.prevent="more"
                                    href="#{{ $post->title }}"
                                    class="italic font-medium text-indigo-500">
                                    see more
                                </a>
                            @endif
                    @endif
                 
              </pre>

          </div>
          <div>
              @if ($post->hasMedia)
                  <div class="py-1"
                      x-id="['media-container']">
                      <livewire:user.media-container :medias="$post->medias" />
                  </div>
              @endif
          </div>
          <div class="flex justify-end space-x-8">
              <a href="{{ route('view-post', [
                  'post_id' => \Crypt::encrypt($post->id),
              ]) }}"
                  type="button"
                  class="inline-flex space-x-2 text-gray-400 hover:text-gray-500 focus:outline-none">
                  <!-- Heroicon name: solid/chat-alt -->
                  <svg class="w-5 h-5"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                      fill="currentColor"
                      aria-hidden="true">
                      <path fill-rule="evenodd"
                          d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                          clip-rule="evenodd" />
                  </svg>
                  <div wire:key="{{ $post->id }}"
                      class="font-medium text-gray-900">{{ $commentCount }}</div>
              </a>
          </div>
      </article> --}}


  {{-- <li x-data="{comment:false}"
      x-bind:id="$id('post')"
      class="">

      <div class="p-4 bg-white rounded-xl hover:shadow">
          <div class="flex justify-between">
              <div class="flex items-center">
                  @if ($post->user->google_id)
                      <img class="border border-gray-400 rounded-full h-11 w-11"
                          src="{{ $post->user->profile_photo_path == '' ? $post->user->google_profile_photo : $post->user->profile_photo_url }}" />

                  @else
                      <img class="border border-gray-400 rounded-full h-11 w-11"
                          src="{{ $post->user->profile_photo_url }}" />
                  @endif

                  <div class="ml-1.5 text-sm leading-tight">
                      <span class="block font-bold text-black dark:text-white ">{{ $post->user->name }}</span>
                      <span class="block font-normal text-gray-500 dark:text-gray-400">
                          {{ $post->user->email }}
                      </span>
                  </div>
              </div>
              <div x-data="{opt:false}"
                  class="flex self-center flex-shrink-0">
                  <div class="relative inline-block text-left">
                      <div>
                          <button x-on:click="opt=!opt"
                              type="button"
                              class="flex items-center p-2 -m-2 text-gray-400 rounded-full hover:text-gray-600"
                              id="options-menu-0-button"
                              aria-expanded="false"
                              aria-haspopup="true">
                              <span class="sr-only">Open options</span>
                              <!-- Heroicon name: solid/dots-vertical -->
                              <svg class="w-5 h-5"
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
                          class="absolute right-0 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                          role="menu"
                          aria-orientation="vertical"
                          aria-labelledby="options-menu-0-button"
                          tabindex="-1">
                          <div class="py-1"
                              role="none">
                              <a href="{{ route('view-post', [
                                  'post_id' => \Crypt::encrypt($post->id),
                              ]) }}"
                                  class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:bg-gray-100"
                                  role="menuitem"
                                  tabindex="-1"
                                  id="options-menu-0-item-1">
                                  <svg xmlns="http://www.w3.org/2000/svg"
                                      class="w-5 h-5 mr-3 text-gray-400"
                                      fill="currentColor">
                                      <path fill-rule="evenodd"
                                          d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                          clip-rule="evenodd" />
                                  </svg>
                                  <span>View</span>
                              </a>

                              <a href="#"
                                  class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:bg-gray-100"
                                  role="menuitem"
                                  tabindex="-1"
                                  id="options-menu-0-item-2">
                                  <!-- Heroicon name: solid/flag -->
                                  <svg class="w-5 h-5 mr-3 text-gray-400"
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

          <p wire:key="{{ $post->id }}-{{ $post->title }}"
              class="block text-lg leading-snug text-black break-words whitespace-pre-line font-poppins ">
              <span class="font-bold">{{ $post->title }}</span>
              @php
                  $text = html_entity_decode($post_body);
                  $text = ' ' . $text;
                  $text = preg_replace("/(^|[\n ])([\w]*?)([\w]*?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$3\" >$3</a>", $text);
                  $text = preg_replace("/(^|[\n ])([\w]*?)((www|wap)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a class=\"text-blue-600 underline\" target=\"_black\" href=\"http://$3\" >$3</a>", $text);
                  $text = preg_replace("/(^|[\n ])([\w]*?)((ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$4://$3\" >$3</a>", $text);
                  $text = preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a class=\"text-blue-600 underline\" target=\"_black\" href=\"mailto:$2@$3\">$2@$3</a>", $text);
                  $text = preg_replace("/(^|[\n ])(mailto:[a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$2@$3\">$2@$3</a>", $text);
                  $text = preg_replace("/(^|[\n ])(skype:[^ \,\"\t\n\r<]*)/i", "$1<a class=\"text-blue-600 underline\" target=\"_black\" href=\"$2\">$2</a>", $text);
                  
              @endphp
              {!! $text !!}
              @if ($trancated_post_body)
                  @if ($see_more)
                      <a wire:click.prevent="less"
                          href="#{{ $post->title }}"
                          class="text-sm italic font-medium text-indigo-500 underline">see less</a>
                  @else
                      <a wire:click.prevent="more"
                          href="#{{ $post->title }}"
                          class="text-sm italic font-medium text-indigo-500 underline">
                          see more
                      </a>
                  @endif
              @endif
              </pre>
              @if ($post->hasMedia)
                  <div class="py-1"
                      x-id="['media-container']">
                      <livewire:user.media-container :medias="$post->medias" />
                  </div>
              @endif
          <p class="text-gray-500 dark:text-gray-400 text-base py-1 my-0.5">
              @if ($post->created_at->diffInSeconds(Carbon\Carbon::now()) < 60)
                  Just now
              @else

                  {{ $post->created_at->diffForhumans() }}
              @endif
          </p>
          <div class="my-1 border border-b-0 border-gray-200"></div>
          <div class="flex justify-end gap-2 mt-3 text-gray-500">
              <div class="flex items-center ">
                  <svg x-on:click="alert('This feature is currently disabled')"
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-auto h-5"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                  </svg>
                  <span class="ml-3"></span>
              </div>
              <a href="{{ route('view-post', [
                  'post_id' => \Crypt::encrypt($post->id),
              ]) }}"
                  class="flex items-center ">
                  <svg xmlns="http://www.w3.org/2000/svg"
                      class="w-auto h-5 hover:text-green-700"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                  </svg>

                  <span class="ml-1">{{ $commentCount }}</span>
              </a>
          </div>
      </div>

  </li> --}}
