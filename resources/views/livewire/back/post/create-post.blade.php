@section('title', 'Create a new Post')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create a new post</h3>
                    </div>
                    <!-- form start -->
                    <form wire:submit="save">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input wire:model="form.title" id="title" type="text" class="form-control">
                            </div>
                            @error('form.title')
                            <div class="alert alert-danger">
                                <span>{{$message}}</span>
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <input wire:model="form.description" id="description" type="text" class="form-control">
                            </div>
                            @error('form.description')
                            <div class="alert alert-danger">
                                <span>{{$message}}</span>
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="introduction">Introduction:</label>
                                <input wire:model="form.introduction" id="introduction" type="text"
                                       class="form-control">
                            </div>
                            @error('form.introduction')
                            <div class="alert alert-danger">
                                <span>{{$message}}</span>
                            </div>
                            @enderror


                            <div class="form-group" wire:ignore wire:key="body_input">
                                <textarea wire:ignore id="body_editor"></textarea>
                                <script
                                    src="https://cdn.tiny.cloud/1/uz9uma330eosfuqioyusl4uhwfg3lf9wsn6egbug98j3176r/tinymce/6/tinymce.min.js"
                                    referrerpolicy="origin"></script>
                                <script>
                                    tinymce.init({
                                        selector: 'textarea#body_editor', // Replace this CSS selector to match the placeholder element for TinyMCE
                                        plugins: 'code table lists codesample',
                                        toolbar: 'undo redo | forecolor backcolor | codesample | blocks | bold italic | alignleft aligncenter alignright alignjustify | indent outdent | bullist numlist | code | table | fontsize',
                                        font_size_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
                                        setup: function (editor) {
                                            editor.on('init change', function () {
                                                editor.save();
                                            });
                                            editor.on('change', function (e) {
                                                @this.
                                                set('form.body', editor.getContent());
                                            });
                                        },
                                    });

                                </script>
                            </div>
                            <input wire:model="form.body" id="body" type="hidden">
                            @error('form.body')
                            <div class="alert alert-danger">
                                <span>{{$message}}</span>
                            </div>
                            @enderror


                            <div class="form-group" wire:ignore wire:key="publish_input">
                                <label for="published_at">Publish at:</label>
                                <div class="input-group date" id="publish_date" data-target-input="nearest">
                                    <input wire:model="form.published_at" type="text"
                                           class="form-control datetimepicker-input">
                                    <div class="input-group-append" data-target="#publish_date"
                                         data-toggle="datetimepicker">
                                        <div class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                                @section('headerScripts')
                                    @parent
                                    <link rel="stylesheet"
                                          href="{{asset('/back-ui/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"/>
                                @endsection
                                @section('footerScripts')
                                    @parent
                                    <script type="text/javascript"
                                            src="{{asset('/back-ui/plugins/moment/moment.min.js')}}"></script>
                                    <script type="text/javascript"
                                            src="{{asset('/back-ui/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
                                    <script>
                                        $(function () {
                                            $('#publish_date').datetimepicker({
                                                icons: {time: 'far fa-clock'},
                                                format: 'yy-MM-DD HH:mm:ss',
                                            });
                                        });

                                        $("#publish_date").on("change.datetimepicker", ({date, oldDate}) => {
                                            @this.
                                            set('form.published_at', date.format('yy-MM-DD HH:mm:ss'));
                                        })

                                    </script>
                                @endsection
                            </div>
                            @error('form.published_at')
                            <div class="alert alert-danger">
                                <span>{{$message}}</span>
                            </div>
                            @enderror

                            <div class="form-group" wire:ignore wire:key="category_input">
                                <label for="categories">Categories: </label>
                                <select wire:model="form.categories" class="select2bs4" id="categories" multiple
                                        data-placeholder="Select a Category" style="width: 100%;" data-select2-id="23"
                                        tabindex="-1" aria-hidden="true">
                                    @foreach($categoryList as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                                @section('headerScripts')
                                    @parent
                                    <link
                                        href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
                                        rel="stylesheet"/>
                                @endsection
                                @section('footerScripts')
                                    @parent
                                    <script
                                        src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                                    <script>
                                        $(document).ready(function () {
                                            $('.select2bs4').select2().on("change", function (e) {
                                                @this.
                                                set('form.categories', $('.select2bs4').val());
                                            });
                                        });
                                    </script>
                                @endsection
                            </div>
                            @error('form.categories')
                            <div class="alert alert-danger">
                                <span>{{$message}}</span>
                            </div>
                            @enderror
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>


                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
