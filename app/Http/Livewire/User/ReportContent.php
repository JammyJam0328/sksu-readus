<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Reason;
use App\Models\Report;

class ReportContent extends Component
{
    public $reasons=[];
    public $selectedReason=0;
    public $postId;
    public $other =false;
    public $specific_reason;
    public function mount($id)
    {
        $this->reasons=Reason::all();
        $this->postId=$id;
    }
    public function render()
    {
        return view('livewire.user.report-content');
    }

    public function getReasonProperty()
    {
        return Reason::where('id',$this->selectedReason)->first();
    }

    public function select($id)
    {
        $this->selectedReason=$id;
        if ($this->reason->title=='Other') {
            $this->other=true;
        }else{
            $this->other=false;
        }
    }


    public function submit()
    {
        $this->validate([
            'specific_reason'=> $this->reason->title=='Other' ? 'required' : '',
        ]);

        Report::create([
            'user_id'=>auth()->id(),
            'post_id'=>$this->postId,
            'reason_id'=>$this->reason->id,
            'other_reason'=>$this->specific_reason,
        ]);

        return redirect()->route('home');

    }

  
   



}