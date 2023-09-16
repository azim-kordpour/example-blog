@section('title', 'All Contacts')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

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
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td><a href="mailto: {{$contact->email}}"> {{$contact->name}}</a></td>
                                    <td>{{$contact->subject}}</td>
                                    <td>{!!$contact->message!!}</td>
                                    <td>{{$contact->created_at->toDateString()}}</td>
                                    <td><livewire:Back.Contact.MarkAsAnswered :contact="$contact" wire:key="{{$contact->id}}"/></td>
                                    <td>
                                        <livewire:Back.Contact.DeleteContact :id="$contact->id" wire:key="{{$contact->id}}"/>
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
                    {{$contacts->links()}}
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

