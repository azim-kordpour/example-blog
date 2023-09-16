@section('title', 'All Posts')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('back.create.post')}}">
                            <button class="btn btn-warning btn-sm col-1">
                                New post
                            </button>
                        </a>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                       placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Writer</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Published At</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        <a href="{{route('front.show.post', $post->slug)}}" wire:navigate>
                                            {{str($post->title)->limit(30)}}
                                        </a>
                                    </td>
                                    <td>{{$post->writer->name}}</td>
                                    <td>{{$post->created_at->toDateString()}}</td>
                                    <td>{{$post->status->label()}}</td>
                                    <td><livewire:Back.Post.PublishPost :post="$post" wire:key="{{$post->id}}-p" /></td>
                                    <td><livewire:Back.Post.DeletePost :id="$post->id" wire:key="{{$post->id}}-d" /></td>
                                    <td>
                                        <a href="{{route('back.edit.post', $post)}}">
                                            <button class="btn btn-block btn-info btn-sm">
                                                Edit
                                            </button>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="d-flex justify-content-center mb-4">
                    {{ $posts->links() }}
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

