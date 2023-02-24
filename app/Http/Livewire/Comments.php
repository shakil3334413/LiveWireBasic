<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments;

    public $newComment;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'newComment' =>'required|max:255'
        ]);
    }

    public function addComment()
    {
        $this->validate([
            'newComment' =>'required|max:255'
        ]);

       $createComment=Comment::create([
            'body'=>$this->newComment,
            'user_id'=>2
       ]);

       $this->comments->prepend($createComment);
       $this->newComment="";
    }

    public function mount()
    {
        $allcomments=Comment::latest()->get();
        $this->comments=$allcomments;
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
