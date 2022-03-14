<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use App\Models\Report;

use Livewire\WithPagination;
class ReportedContent extends Component
{
    use WithPagination;
    public $action='showList';
    public $set_id;

    public function getReportProperty()
    {
        return Report::where('id',$this->set_id)->with(['post.medias','post.user'])->first();
    }
    public function render()
    {
        return view('livewire.admin.reported-content',[
            'reports'=>Report::where('status','pending')->with('post')->paginate(10)
        ]);
    }

     public function viewDetails($id)
    {
        $this->action='viewDetails';
        $this->set_id=$id;
    }

    public function approve()
    {
        $post = $this->report->post;
        $post->blocked=true;
        $post->save();

        $this->report->status='approved';
        $this->report->save();

        $this->report->post->user->notify(new \App\Notifications\PostReported($this->report->post));
        $this->action='showList';
        session()->flash('success','Post has been blocked');
    }

    public function removeSession()
    {
        session()->forget('success');
    }

    public function deny()
    {
        $this->report->status='denied';
        $this->report->save();
        
        $this->action='showList';
        session()->flash('success','Report has been denied');
    }

}