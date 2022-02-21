<div x-data="quotes"
    x-init="get()"
    class="sticky px-4 bg-gray-100 rounded-lg lg:w-80 top-6 ">
    <div class="pt-2 pb-2">
        <h2 class="text-sm font-semibold text-gray-600">Hi {{ auth()->user()->name }}</h2>
    </div>
    <div>
        <ul role="list"
            class="divide-y divide-gray-200">
            <li class="py-2">
                <div class="grid space-y-2">
                    <div class="flex-1 space-y-1">
                        <blockquote class="">
                            <p class="text-gray-800  font-dance">"<span x-text="quotes.content"></span>"</p>

                        </blockquote>
                        <div class="flex space-x-1">

                            <span class="text-sm text-gray-400"
                                x-text="'-' + quotes.author"></span>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

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
