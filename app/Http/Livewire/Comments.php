<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments=[
        [
            'body'=>'Some quick example text to build on the card title and make up the bulk of the card content',
            'created_at'=>'3 min ago',
            'creator'=>'Shakil'
        ]
    ];

    public $newComment;

    public function addComment()
    {
        // $this->comments[]=[
        //     'body'=>'New Comment',
        //     'created_at'=>'10 min ago',
        //     'creator'=>'Unknon'
        // ];

        array_unshift($this->comments,[
                'body'=>$this->newComment,
                'created_at'=>Carbon::now()->diffForHumans(),
                'creator'=>'Unknon'
        ]);
        $this->newComment="";
    }
    public function render()
    {
        return view('livewire.comments');
    }
}
