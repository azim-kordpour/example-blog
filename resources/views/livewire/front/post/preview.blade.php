<div class="post">
    <h3 class="post-title">
        <a  href="{{route('front.show.post', $post->slug)}}" wire:navigate.hover>{{$post->title}}</a></h3>
    <div class="post-meta">
        <ul>
            <li>
                <i class="ion-calendar"></i> {{$post->published_at?->format('d, M Y')}}
            </li>
            <li>
                <i class="ion-android-people"></i> Written BY {{$post->writer->name}}
            </li>
            <li>
                @include('livewire.front.category.preview',['categories' => $post->categories])
            </li>

        </ul>
    </div>
    <div class="post-content">
        <p class="text-justify">{{$post->introduction}}</p>
        <a wire:navigate.hover title="Continue Reading" href="{{route('front.show.post', $post->slug)}}" class="btn btn-main">Continue Reading</a>
    </div>

</div>
