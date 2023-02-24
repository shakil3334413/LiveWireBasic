<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments;

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

    public function mount()
    {
        $allcomments=Comment::all();
        $this->comments=$allcomments;
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
