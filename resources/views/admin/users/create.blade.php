@extends('admin.adminLayout.mainlayout')
@section('title', 'Users')
@section('content')
@section('page_title', 'Add User')
<div class="row">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
		<div class="alert alert-success alert-block mt-3">
			<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong><i class="fa fa-check text-white">&nbsp;</i>{{ $message }}</strong>
		</div>
		@endif
		@if ($message = Session::get('danger'))
		<div class="alert alert-danger alert-block mt-3">
			<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong>{{ $message }}</strong>
		</div>
		@endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card mt-3">
            <div class="card-header">
                <div class="card-title">User Register</div>
            </div>
            <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf
            <div class="card-body">
                <div  class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control @error('reference_id') is-invalid @enderror" id="reference_id" placeholder="Enter Reference ID (Optional)" name="reference_id" value="{{ old('reference_id') }}">
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
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" name="name" value="{{ old('name') }}">
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
                            <input type="text" class="form-control @error('client_id') is-invalid @enderror" id="client_id" placeholder="Enter Client ID" name="client_id" value="{{ old('client_id') }}">
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
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email2" placeholder="Enter Email" name="email" value="{{ old('email') }}" >
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
                            <input type="number" class="form-control @error('contact_no') is-invalid @enderror" id="contact_no" placeholder="Enter Contact No." name="contact_no" value="{{ old('correct_no') }}">
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
                            {{ old('address') }}
							</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" placeholder="Confirmed Password" name="password_confirmation">
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