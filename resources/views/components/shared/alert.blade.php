<div x-data="alerts"
    x-on:notify.window="notify()">
    <div x-cloak
        x-show="show"
        class="fixed z-50 flex items-center justify-center w-full p-2 mb-3 bottom-2 md:mb-0">
        <div class="flex self-center px-2 py-2 space-x-4 text-white bg-gray-800 rounded-md w-96">
            <div class="mt-1">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
            </div>
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
                message: '',
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
