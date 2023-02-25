<div class="mt-5">
    <h1>Support Tickets</h1>
    <ul class="list-group">
        @foreach ($tickets as $item)
         <li class="list-group-item {{ $active==$item->id ? 'active' : '' }}" wire:click="$emit('ticketSelected',{{ $item->id }})">{{ $item->question }}</li>
        @endforeach
    </ul>
</div>
