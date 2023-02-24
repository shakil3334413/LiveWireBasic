<div class="container mt-5">
   <div class="row">
        <div class="col-md-12">
            <h1>Comments</h1>
        </div>
        <div class="col-md-12">
            @error('newComment')<span class="text-danger">{{ $message }}</span> @enderror
            <form wire:submit.prevent="addComment">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Add Comment" aria-label="Add Comment" aria-describedby="button-addon2" wire:model.debounce.500ms="newComment">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Add</button>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            @foreach($comments as  $comment)
                <div class="card">
                    <div class="card-body just" >
                        <div>
                            <h5 class="card-title">{{$comment->user->name}} <span class="mr-3 fs-6">{{$comment->created_at->diffForHumans()}}</span></h5>
                        </div>
                        <div>
                            <h1>X</h1>
                        </div>
                        <p class="card-text">{{$comment->body}}</p>
                    </div>
                </div>              
            @endforeach
        </div>
   </div>
</div>
