<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    public $newComment;
    public $image;
    protected $listeners = ['fileupload' => 'handlefileUpload'];

    public function handlefileUpload($imageData)
    {
        $this->image=$imageData;
    }
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
       $this->newComment="";
       session()->flash('message', 'Post successfully Created.');
    }

    public function remove($commentId)
    {
        $comment=Comment::find($commentId);
        $comment->delete();
        session()->flash('message', 'Post successfully Deleted.');
    }

    public function render()
    {
        return view('livewire.comments',[
            'comments' => Comment::latest()->paginate(2)]);
    }
   
}
