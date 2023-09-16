<div>
    @if($contact->status->isNew())
        <button wire:click="mark" class="btn btn-block btn-success btn-sm">
            Mark as Answered
        </button>
    @else
       {{$contact->status->label()}}
    @endif
</div>
