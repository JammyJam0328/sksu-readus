<div>
    <div class="p-5">
        <div class="mb-2">
            <h1 class="text-xl text-gray-600">
                Tell us the reason for reporting this post
            </h1>
        </div>

        <form>
            @csrf
            <fieldset>
                <div class="mt-4 space-y-2">
                    @foreach ($reasons as $reason)
                        <div wire:click.prevent="select({{ $reason->id }})"
                            class="relative flex items-start px-2 py-4 border rounded-md hover:bg-gray-100 focus:bg-gray-100">
                            <div class="flex-1 min-w-0 text-sm">
                                <label for="side-null"
                                    class="font-medium text-gray-700 select-none">{{ $reason->title }}</label>
                            </div>
                            <div class="flex items-center h-5 ml-3">
                                @if ($reason->id == $selectedReason)
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 text-green-700"
                                        viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    @if ($other)
                        <div class="mt-2">
                            <div>
                                <label for="reason"
                                    class="block text-sm font-medium text-gray-700">
                                    Specific reason
                                </label>
                                <div class="mt-1">
                                    <textarea rows="4"
                                        wire:model.defer="specific_reason"
                                        name="reason"
                                        id="reason"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </fieldset>
        </form>
        <div class="flex justify-end m-3">
            @if ($selectedReason)
                <button wire:click.prevent='submit'
                    type="button"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span wire:loading.remove
                        wire:target="submit"> Submit report</span>
                    <span wire:loading
                        wire:target="submit"> Loading. . .</span>
                </button>
            @endif
        </div>


    </div>
</div>
