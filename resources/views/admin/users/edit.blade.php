@extends('admin.adminLayout.mainlayout')
@section('title', 'Edit User')
@section('content')
@section('page_title', 'Edit User')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit User</div>
            </div>
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div  class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control @error('reference_id') is-invalid @enderror" id="reference_id" placeholder="Enter Reference ID (Optional)" name="reference_id" value="@if($user->reference_id != '0')  {{ $user->reference_id }} @endif">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6" >
                    <div id="reference_name"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" name="name" value="{{ $user->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="client_id">Client ID</label>
                            <input type="text" class="form-control @error('client_id') is-invalid @enderror" id="client_id" placeholder="Enter Client ID" name="client_id" value="{{ $user->client_id }}">
                            @error('client_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email2">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email2" placeholder="Enter Email" name="email" value="{{ $user->email }}" >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact_no">Contact No.</label>
                            <input type="number" class="form-control @error('contact_no') is-invalid @enderror" id="contact_no" placeholder="Enter Contact No." name="contact_no" value="{{ $user->contact_no }}">
                            @error('contact_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="4">
                            {{ $user->address }}
							</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="card-action">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ route('admin.users.index') }}"><button class="btn btn-danger">Cancel</button></a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('customjs')
<script>
$(document).ready(function () {
    // keyup function looks at the keys typed on the search box
    $('#reference_id').on('keyup',function() {
        // the text typed in the input field is assigned to a variable 
        var query = $(this).val();
        // alert(query);
        // call to an ajax function
        $.ajax({
            // assign a controller function to perform search action - route name is search
            url:"{{ route('admin.users.search') }}",
            // since we are getting data methos is assigned as GET
            type:"GET",
            // data are sent the server
            data:{'reference_id':query},
            // if search is succcessfully done, this callback function is called
            success:function (data) {
                // print the search results in the div called country_list(id)
                $('#reference_name').html(data);
            }
        })
        // end of ajax call
    });
})
</script>
@endsection