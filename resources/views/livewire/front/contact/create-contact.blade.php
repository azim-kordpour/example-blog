
@section('title', 'Azim Kordpour - Contact Me')
@section('description', 'This page provides a form to send me a message. Please, feel free to ask me questions.')
<section class="contact-form">
    <div class="container">
        <div class="row pb-1">
            <div class="col-md-8 col-sm-8 mx-auto">
                <h3 class="h3">Send me a message:</h3>
            </div>
        </div>

        <form wire:submit="save" class="row" id="contact-form">
            <div class="col-md-8 col-sm-8 mx-auto">
                <div class="block">
                    <div class="form-group">
                        <input wire:model="form.name" type="text" class="form-control" placeholder="Your Name">

                        @error('form.name')
                        <div class="col-sm-8">
                            <small class="text-danger">{{$message}}</small>
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input wire:model="form.email" type="text" class="form-control" placeholder="Email Address">
                        @error('form.email')
                        <div class="col-sm-8">
                            <small class="text-danger">{{$message}}</small>
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input wire:model="form.subject" type="text" class="form-control" placeholder="Subject">
                        @error('form.subject')
                        <div class="col-sm-8">
                            <small class="text-danger">{{$message}}</small>
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-8 mx-auto">
                <div class="block">
                    <div class="form-group-2">
                        <textarea wire:model="form.message" class="form-control" rows="4" placeholder="Your Message"></textarea>
                        @error('form.message')
                        <div class="col-sm-8">
                            <small class="text-danger">{{$message}}</small>
                        </div>
                        @enderror
                    </div>

                    <button class="btn btn-default" type="submit">Send Message</button>
                </div>

                @if (session('success'))
                    <div class="alert alert-success mt-2">
                        Thanks, I'll reply to your message as soon as possible.
                    </div>
                @endif
            </div>

        </form>
    </div>
</section>
