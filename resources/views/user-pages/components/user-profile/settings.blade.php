<div>
    <div class="px-5">
        <ul role="list"
            class="divide-y divide-gray-200">
            <li class="flex items-center justify-between py-4">
                <div class="flex flex-col">
                    <p class="text-sm font-medium text-gray-900"
                        id="privacy-option-1-label">Allow Event Notification</p>
                    <p class="text-sm text-gray-500"
                        id="privacy-option-1-description">
                        Allow us to send you notifications about upcoming events through your institutional email.
                    </p>
                </div>
                <button type="button"
                    wire:click.prevent="toggleEventNotification"
                    class="{{ auth()->user()->event_notification ? 'bg-red-500' : 'bg-gray-200' }} relative inline-flex flex-shrink-0 h-6 ml-4 transition-colors duration-200 ease-in-out bg-gray-200 border-2 border-transparent rounded-full cursor-pointer w-11 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
                    role="switch"
                    aria-checked="true"
                    aria-labelledby="privacy-option-1-label"
                    aria-describedby="privacy-option-1-description">
                    <span aria-hidden="true"
                        class="{{ auth()->user()->event_notification ? 'translate-x-5' : 'translate-x-0' }} inline-block w-5 h-5 transition duration-200 ease-in-out transform  bg-white rounded-full shadow ring-0"></span>
                </button>
            </li>






            <li class="flex items-center justify-between py-4">
                <div class="flex flex-col">
                    <p class="text-sm font-medium text-gray-900"
                        id="privacy-option-2-label">Allow Announcement Notification</p>
                    <p class="text-sm text-gray-500"
                        id="privacy-option-2-description">
                        Allow us to send you notifications about announcements through your institutional email.
                    </p>
                </div>
                <button type="button"
                    wire:click.prevent="toggleAnnouncementNotification"
                    class="{{ auth()->user()->announcement_notification ? 'bg-red-500' : 'bg-gray-200' }} relative inline-flex flex-shrink-0 h-6 ml-4 transition-colors duration-200 ease-in-out bg-gray-200 border-2 border-transparent rounded-full cursor-pointer w-11 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
                    role="switch"
                    aria-checked="true"
                    aria-labelledby="privacy-option-1-label"
                    aria-describedby="privacy-option-1-description">
                    <span aria-hidden="true"
                        class="{{ auth()->user()->announcement_notification ? 'translate-x-5' : 'translate-x-0' }} inline-block w-5 h-5 transition duration-200 ease-in-out transform  bg-white rounded-full shadow ring-0"></span>
                </button>
            </li>

        </ul>

        <div class="pt-2 mt-2 border-t border-gray-200">
            <form method="POST"
                action="{{ route('logout') }}">
                @csrf

                <x-jet-dropdown-link href="{{ route('logout') }}"
                    class="flex items-center p-2 space-x-10 text-white bg-red-600 border rounded-md hover:text-red-600"
                    onclick="event.preventDefault();
                          this.closest('form').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>
                        {{ __('Log Out') }}
                    </span>
                </x-jet-dropdown-link>
            </form>
        </div>
    </div>
</div>
