<div class="container mt-5">
   <div class="row">
        <div class="col-md-12">
            <h1>Comments</h1>
        </div>

        <div class="col-md-12 p-3 bg-green-300 text-green-600">
            @if (session()->has('message'))
                    <div class="alert alert-success bg-green-300 text-green-600">
                        {{ session('message') }}
                    </div>
                @endif
            @error('newComment')<span class="text-danger">{{ $message }}</span> @enderror
            @if($image)
                <img src="{{ $image }}" alt="" srcset="" width="50px" height="50px">
            @endif
            <input type="file" name="" id="image" wire:change="$emit('fileChose')">
            <form wire:submit.prevent="addComment">
                
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Add Comment" aria-label="Add Comment" aria-describedby="button-addon2" wire:model.debounce.500ms="newComment">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Add</button>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            @foreach($comments as  $comment)
                <div class="card ">
                    <div class="card-body" >
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="card-title">{{$comment->user->name}} <span class="mr-3 fs-6">{{$comment->created_at->diffForHumans()}}</span></h5>
                            </div>
                            <div class="">
                                <button type="button" wire:click="remove({{ $comment->id }})"><i class="fa-solid fa-xmark text-red-200 :hover:text-red-600"  style="cursor: pointer;"></i></button>
                                
                            </div>
                        </div>
                        <p class="card-text">{{$comment->body}}</p>
                    </div>
                </div>              
            @endforeach
        </div>
        {{ $comments->links('livewire.pagination-link') }}
   </div>
</div>

<script>
    Livewire.on('fileChose',() => {
       let inputField=document.getElementById('image');
       let file=inputField.files[0];
       let reder=new FileReader();
       reder.onloadend=()=>{
        Livewire.emit('fileupload',reder.result);
       }
       reder.readAsDataURL(file);

    });
    // console.log(window);
</script>