<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Intervention\Image\ImageManagerStatic;

class Comments extends Component
{
    use WithPagination;
    public $newComment;
    public $image;
    public $ticket_id=1;
    protected $listeners = [
        'fileupload' => 'handlefileUpload',
        'ticketSelected'=>'ticketSelected'
    ];

    public function ticketSelected($ticketId)
    {
        $this->ticket_id=$ticketId;
    }
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
        $image=$this->storImage();
        $createComment=Comment::create([
                'body'=>$this->newComment,
                'image'=>$image,
                'super_tic_id'=>$this->ticket_id,
                'user_id'=>2
        ]);
        $this->newComment="";
        $this->image="";
        session()->flash('message', 'Post successfully Created.');
    }

    public function storImage(){
        if(!$this->image){
            return null;
        } 
        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $name=Str::random().'.jpg';
        Storage::disk('public')->put($name,$img);
        return $name;
    }

    public function remove($commentId)
    {
        $comment=Comment::find($commentId);
        Storage::disk('public')->delete($comment->image);
        $comment->delete();
        session()->flash('message', 'Post successfully Deleted.');
    }

    public function render()
    {
        return view('livewire.comments',[
            'comments' => Comment::where('super_tic_id',$this->ticket_id)->latest()->paginate(2)
        ]);
    }
   
}
