@section('title', 'Create a new Post')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Profile</h3>
                    </div>
                    <!-- form start -->
                    <form wire:submit="save" >
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

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input wire:model="form.email" id="email" type="text" class="form-control">
                            </div>
                            @error('form.email')
                            <div class="alert alert-danger">
                                <span>{{$message}}</span>
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="password">Current Password:</label>
                                <input wire:model="form.password" id="password" type="password" class="form-control">
                            </div>
                            @error('form.password')
                            <div class="alert alert-danger">
                                <span>{{$message}}</span>
                            </div>
                            @enderror


                            <div class="form-group">
                                <label for="new_password">New Password:</label>
                                <input wire:model="form.new_password" id="new_password" type="password" class="form-control">
                            </div>
                            @error('form.new_password')
                            <div class="alert alert-danger">
                                <span>{{$message}}</span>
                            </div>
                            @enderror

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            @if (session('success'))
                                <div class="alert alert-success mt-2">
                                    The profile has been updated.
                                </div>
                            @endif
                        </div>



                    </form>


                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
