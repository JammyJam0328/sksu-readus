        <section>
            <h2 class="font-semibold text-gray-700">Happening Now</h2>
            <ol class="mt-2 space-y-3 text-sm">
                @foreach ($happeningNowEvents as $key => $event)
                    <li wire:key="{{ $key }}-{{ $event->title }}"
                        class="flex p-4 space-x-3 bg-gray-100 rounded-md cursor-pointer hover:bg-gray-200">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="flex-auto">
                            <h3 class="font-semibold text-indigo-700 underline cursor-pointer ">
                                {{ $event->title }}</h3>
                            <dl class="flex flex-col mt-2 text-gray-500 xl:flex-row">
                                <div class="flex items-start space-x-3">
                                    <dt>
                                        Ends:
                                    </dt>
                                    <dd class="text-gray-600">
                                        <time
                                            datetime="2022-01-10T17:00">{{ date('M d, Y H:s A', strtotime($event->end_date)) }}</time>
                                    </dd>
                                </div>
                                <div
                                    class="flex items-start space-x-1 xl:mt-0 xl:ml-3.5 xl:border-l  xl:border-opacity-50 xl:pl-3.5">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 text-gray-400"
                                        viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <x-shared.my-countdown :expires="$event->end_date" />
                                </div>
                            </dl>

                        </div>
                        <div x-data="{isOpen:false}"
                            x-on:click.away="isOpen = false"
                            x-on:action.window="isOpen = false"
                            class="relative inline-block text-left">
                            <div>
                                <button x-on:click="isOpen=!isOpen"
                                    type="button"
                                    class="flex items-center text-gray-400 bg-gray-100 rounded-full hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"
                                    id="menu-button"
                                    aria-expanded="true"
                                    aria-haspopup="true">
                                    <span class="sr-only">Open options</span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                </button>
                            </div>

                            <div x-cloak
                                x-show="isOpen"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 transform scale-95"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                class="absolute right-0 z-10 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu"
                                aria-orientation="vertical"
                                aria-labelledby="menu-button"
                                tabindex="-1">
                                <div class="py-1"
                                    role="none">
                                    <a href="{{ route('view-event', [
                                        'event_id' => \Crypt::encrypt($event->id),
                                    ]) }}"
                                        class="block px-4 py-2 text-sm text-gray-700"
                                        role="menuitem"
                                        tabindex="-1"
                                        id="menu-item-0">View</a>
                                    @if ($event->user_id == auth()->user()->id)
                                        <button wire:click.prevent="editEvent('{{ $event->id }}')"
                                            type="button"
                                            class="block px-4 py-2 text-sm text-gray-700"
                                            role="menuitem"
                                            tabindex="-1"
                                            id="menu-item-1">
                                            Edit
                                        </button>
                                        <button wire:click.prevent="deleting('{{ $event->id }}')"
                                            type="button"
                                            class="block px-4 py-2 text-sm text-gray-700"
                                            role="menuitem"
                                            tabindex="-1"
                                            id="menu-item-2">
                                            Delete
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ol>
        </section>
