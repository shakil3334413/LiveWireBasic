<?php

namespace App\Http\Livewire;

use App\Models\SuperTic;
use Livewire\Component;

class SupportTic extends Component
{
    public $active;
    protected $listeners = [
        'ticketSelected'=>'ticketSelected'
    ];

    public function ticketSelected($ticketId)
    {
        $this->active=$ticketId;
    }


    public function render()
    {
        return view('livewire.support-tic',[
            'tickets' => SuperTic::latest()->get(),
        ]);
    }
}
