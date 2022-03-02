<div>
    <div class="max-w-6xl mx-auto ">
        <div class="grid grid-cols-1 gap-5 mt-2 sm:grid-cols-2 lg:grid-cols-3">
            <x-shared.card title="Total Users"
                count="{{ $users_count }}">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="text-gray-600 w-7 h-7"
                        viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                </x-slot>
                <x-slot name="actions">
                    <a href="#"
                        class="flex space-x-1 font-medium text-cyan-700 hover:text-cyan-900"><span>More Info</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg></a>
                </x-slot>
            </x-shared.card>
            <x-shared.card title="Total Posts"
                count="{{ $posts_count }}">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="text-gray-600 w-7 h-7"
                        viewBox="0 0 20 20"
                        fill="currentColor">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                            clip-rule="evenodd" />
                    </svg>

                </x-slot>
                <x-slot name="actions">
                    <a href="#"
                        class="flex space-x-1 font-medium text-cyan-700 hover:text-cyan-900"><span>More Info</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg></a>
                </x-slot>
            </x-shared.card>
            <x-shared.card title="Total Events"
                count="{{ $events_count }}">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="text-gray-600 w-7 h-7"
                        viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd" />
                    </svg>

                </x-slot>
                <x-slot name="actions">
                    <a href="#"
                        class="flex space-x-1 font-medium text-cyan-700 hover:text-cyan-900"><span>More Info</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg></a>
                </x-slot>
            </x-shared.card>
            <x-shared.card title="Total Announcement"
                count="{{ $announcements_count }}">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="text-gray-600 w-7 h-7"
                        viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z"
                            clip-rule="evenodd" />
                    </svg>

                </x-slot>
                <x-slot name="actions">
                    <a href="#"
                        class="flex space-x-1 font-medium text-cyan-700 hover:text-cyan-900"><span>More Info</span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg></a>
                </x-slot>
            </x-shared.card>
        </div>
    </div>
</div>
