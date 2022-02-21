<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
// use livewire pagination
use Livewire\WithPagination;
class NotificationList extends Component
{
    use WithPagination;
    public $take=5;
    protected $listeners=['new-notification'=>'$refresh'];
    public function render()
    {
        return view('livewire.user.notification-list',[
            'notifications'=>auth()->user()->notifications()->paginate($this->take)
        ]);
    }
    public function loadMore()
    {
        $this->take+=10;
    }
    public function read($id)
    {
        $notification = auth()->user()->notifications()->find($id);
        $notification->markAsRead();
        return redirect()->route('view-post', ['post_id' => \Crypt::encrypt($notification->data['post_id'])]);
    }
    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        $this->emit('read-notification');
    }
}