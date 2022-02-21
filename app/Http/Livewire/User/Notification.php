<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class Notification extends Component
{
    public function getListeners()
    {
         return [
            "echo-private:notification.".auth()->user()->id.",NotificationEvent" => 'crawl',
            'read-notification' => '$refresh',
        ];
    }

    public function crawl()
    {
        $this->emit('new-notification');
    }
    
    public function render()
    {
        return view('livewire.user.notification',[
            'unreadNotifCount' => auth()->user()->unreadNotifications->count(),
        ]);
    }
}