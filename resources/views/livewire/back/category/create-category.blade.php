@section('title', 'Create a new Category')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create a new Category</h3>
                    </div>
                    <!-- form start -->
                    <form wire:submit="save">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input wire:model="form.name" id="name" type="text" class="form-control">
                            </div>
                            @error('form.name')
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
