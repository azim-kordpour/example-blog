<div>
    @if($post->status->isPublished())
        {{$post->published_at->toDateString()}}
    @else
        <button wire:click="publish" class="btn btn-block btn-success btn-sm">
            Publish
            @if($post->published_at)
                at {{$post->published_at->toDateString()}}
            @else
                Now
            @endif

        </button>
    @endif
</div>
