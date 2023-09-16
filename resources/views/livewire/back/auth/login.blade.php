<form wire:submit="authenticate">


    <div class="input-group mb-3">
        <input wire:model="form.email" type="email" class="form-control" placeholder="Email">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>


    </div>
    @error('form.email')
    <div class="alert alert-danger">
        <span>{{$message}}</span>
    </div>
    @enderror
    <div class="input-group mb-3">
        <input wire:model="form.password" type="password" class="form-control" placeholder="Password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    @error('form.password')
    <div class="alert alert-danger">
        <span>{{$message}}</span>
    </div>
    @enderror

    <div class="row">
        <div class="col-8">
            <div class="icheck-primary">
                <input wire:model="form.remember_me" value="1" type="checkbox" id="remember_me">
                <label for="remember_me">
                    Remember Me
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
    </div>

    @error('form.remember_me')
    <div class="alert alert-danger">
        <span>{{$message}}</span>
    </div>
    @enderror
</form>
