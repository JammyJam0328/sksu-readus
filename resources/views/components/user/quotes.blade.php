<div x-data="quotes"
    x-init="get()"
    class="pl-6 lg:w-80 sticky top-0">
    <div class="pt-6 pb-2">
        <h2 class="text-sm font-semibold">Hi {{ auth()->user()->name }}</h2>
    </div>
    <div>
        <ul role="list"
            class="divide-y divide-gray-200">
            <li class="py-4">
                <div class="flex space-x-3">
                    <div class="flex-1 space-y-1">
                        <blockquote class="">
                            <p class=" text-gray-800 font-dance">"<span x-text="quotes.content"></span>"</p>
                            <span class="text-gray-400 text-sm"
                                x-text="quotes.author"></span>
                        </blockquote>
                    </div>
                </div>
            </li>
        </ul>
        <div class="py-4 text-sm border-b border-gray-200">
            <button x-on:click.prevent="get()"
                class="text-indigo-600 font-semibold hover:text-indigo-900 focus:outline-none"
                x-text="isLoading ? 'Loading . . .' : 'New'"><span aria-hidden="true">&rarr;</span></button>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('quotes', () => ({
                quotes: {},
                isLoading: false,

                get() {
                    this.isLoading = true;
                    let url = "https://api.quotable.io/random";
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            this.quotes = data;
                            this.isLoading = false;
                        });
                }
            }))
        })
    </script>
@endpush
