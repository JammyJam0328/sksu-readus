<div x-data="alerts"
    x-on:notify.window="notify()">
    <div x-cloak
        x-show="show"
        class="w-full  bottom-2   p-2    mb-3 md:mb-0 z-50  fixed flex justify-center">
        <div class="bg-gray-800 rounded-md px-2 py-2 flex self-center space-x-4 text-green-500 w-96">
            <template x-if="type=='success'">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </template>

            <div>
                <span class="text-semibold "
                    x-text="message"></span>
            </div>

        </div>
    </div>
</div>

@push('livewireScripts')
    <script>
        document.addEventListener('alpine:init', function() {
            Alpine.data('alerts', () => ({
                show: false,
                message: 'asdasdsa',
                type: '',


                notify() {

                    this.message = event.detail.message;
                    this.type = event.detail.type;
                    this.show = true;

                    setTimeout(() => {
                        this.show = false;
                    }, 3000);
                }
            }));
        });
    </script>
@endpush
