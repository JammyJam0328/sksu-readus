<div x-data="{ expire: @js($expire_date),days: 00,hrs: 00,min: 00,sec: 00,
    start() {
                        const now = new Date();
                        const expire = new Date(this.expire);
                        const diff = expire - now;
                        this.days = Math.floor(diff / (1000 * 60 * 60 * 24));
                        this.hrs = Math.floor((diff / (1000 * 60 * 60)) % 24);
                        this.min = Math.floor((diff / 1000 / 60) % 60);
                        this.sec = Math.floor((diff / 1000) % 60);

                        setTimeout(() => this.start(), 1000);
                    },
    }"
    x-init="start();">
    <div class="flex space-x-2">
        <div x-cloak
            x-show="days>00">
            <span class="text-sm font-bold "
                x-text="days">00</span>
            <span class="text-sm">days</span>
        </div>
        <div x-cloak
            x-show="hrs>00">
            <span class="text-sm font-bold "
                x-text="hrs">00</span>
            <span class="text-sm">hrs</span>

        </div>
        <div x-cloak
            x-show="min>00">
            <span class="text-sm font-bold "
                x-text="min">00</span>
            <span class="text-sm">min</span>
        </div>
        <div x-cloak
            x-show="sec>00">
            <span class="text-sm font-bold "
                x-text="sec">00</span>
            <span class="text-sm">sec</span>
        </div>
    </div>
</div>
