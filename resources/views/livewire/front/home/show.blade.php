@section('title', 'Azim Kordpour - Personal Blog')
@section('description', 'This is my personal blog and I intend to write useful articles about PHP, Laravel, Docker,... etc.')

<div class="page-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @each('livewire.front.post.preview', $posts, 'post')

                {{$posts->links()}}
            </div>
        </div>
    </div>
</div>
