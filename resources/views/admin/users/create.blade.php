@extends('admin.adminLayout.mainlayout')
@section('title', 'Users')
@section('customcss')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#client_code").click(function(){
    $("#dvtext").toggle();
    $("#hidecontent").toggle();
  });
});
</script>
@endsection
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
                            
                            <div class="input-group mb-3">

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><input type="radio"  id="client_code"></span>
                                    <span class="input-group-text" id="basic-addon"><div id="hidecontent">AKHG</div><div id="dvtext"  style="display: none">
    <input type="text" id="txtBox" name="client_code" />
</div></span>
                                </div>
                                <input type="number" class="form-control @error('client_id') is-invalid @enderror" placeholder="Enter Client ID" aria-label="Enter Client ID" name="client_id" value="{{ old('client_id') }}" aria-describedby="basic-addon1">
                                @error('client_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pan_card_no">PAN Card No.</label>
                            <input type="text" class="form-control @error('pan_card_no') is-invalid @enderror" id="pan_card_no" placeholder="Enter PAN Card No." name="pan_card_no" value="{{ old('pan_card_no') }}">
                            @error('pan_card_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bank_acc_no">Bank Account No.</label>
                            <input type="text" class="form-control @error('bank_acc_no') is-invalid @enderror" id="bank_acc_no" placeholder="Enter Bank Account No." name="bank_acc_no" value="{{ old('bank_acc_no') }}">
                            @error('bank_acc_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ifsc_code">IFSC Code</label>
                            <input type="text" class="form-control @error('ifsc_code') is-invalid @enderror" id="ifsc_code" placeholder="Enter IFSC Code" name="ifsc_code" value="{{ old('ifsc_code') }}">
                            @error('ifsc_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" placeholder="Enter State" name="state" value="{{ old('state') }}">
                            @error('state')
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
                            <label for="city">City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" placeholder="Enter City" name="city" value="{{ old('city') }}">
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pin_code">Pin Code</label>
                            <input type="number" class="form-control @error('pin_code') is-invalid @enderror" id="pin_code" placeholder="Enter Pin Code" name="pin_code" value="{{ old('pin_code') }}">
                            @error('pin_code')
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