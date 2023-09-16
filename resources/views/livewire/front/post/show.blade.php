
@section('title', $post->title)
@section('description', $post->description)
@section('headerStylesheets')
    <link href="{{asset('/ui/css/prism.css')}}" rel="stylesheet"/>
@endsection
@section('headerScripts')
    <script src="{{asset('/ui/js/prism.js')}}"></script>
@endsection

<section class="page-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="post post-single">
                    <h2 class="post-title">{{$post->title}}</h2>
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
                    <div class="post-content post-excerpt">
                        {!! $post->body !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
