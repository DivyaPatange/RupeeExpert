
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Register</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/azzara.min.css') }}">
</head>
<body class="login" style="background-color:#7da940">
	<div class="wrapper wrapper-login d-block">
	<div style="width: 400px;position:relative; margin:auto" class="mt-3">
			@if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong><i class="fa fa-check text-white">&nbsp;</i>{{ $message }}</strong>
		</div>
		@endif
		@if ($message = Session::get('danger'))
		<div class="alert alert-danger alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong>{{ $message }}</strong>
		</div>
		@endif
		</div>
        <div class="container container-login animated fadeIn">
			<h3 class="text-center">Sign Up</h3>
			<div class="login-form">
            <form method="POST" action="{{ route('register') }}">
            @csrf
				<div class="form-group form-floating-label">
					<input  id="fullname" name="name" type="text" class="form-control @error('name') is-invalid @enderror input-border-bottom" value="{{ old('name') }}">
					<label for="fullname" class="placeholder">Fullname</label>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group form-floating-label">
					<input  id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror input-border-bottom" value="{{ old('email') }}">
					<label for="email" class="placeholder">Email</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
                <div class="form-group form-floating-label">
					<input  id="contact_no" name="contact_no" type="number" class="form-control @error('contact_no') is-invalid @enderror input-border-bottom" value="{{ old('contact_no') }}">
					<label for="contact_no" class="placeholder">Contact No.</label>
                    @error('contact_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
                <div class="form-group form-floating-label">
					<input  id="address" name="address" type="text" class="form-control @error('address') is-invalid @enderror input-border-bottom" value="{{ old('address') }}">
					<label for="address" class="placeholder">Address</label>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
                <div class="form-group form-floating-label">
					<input  id="client_id" name="client_id" type="text" class="form-control @error('client_id') is-invalid @enderror input-border-bottom" value="{{ old('client_id') }}">
					<label for="client_id" class="placeholder">Client ID</label>
                    @error('client_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
                <div class="form-group form-floating-label">
					<input  id="referenceID" name="reference_id" type="text" class="form-control @error('reference_id') is-invalid @enderror input-border-bottom" value="{{ old('reference_id') }}">
					<label for="referenceID" class="placeholder">Reference ID</label>
                    
                </div>
                <div class="form-group form-floating-label">
                    <h5 id="reference_name" class="text-success"></h5>
					@if ($message = Session::get('error'))
                  <span class="text-danger error">{{$message}}</span>
                  @endif
                </div>
				<div class="form-group form-floating-label">
					<input  id="passwordsignin" name="password" type="password" class="form-control @error('password') is-invalid @enderror input-border-bottom">
					<label for="passwordsignin" class="placeholder">Password</label>
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group form-floating-label">
					<input  id="confirmpassword" name="password_confirmation" type="password" class="form-control input-border-bottom">
					<label for="confirmpassword" class="placeholder">Confirm Password</label>
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
				</div>
				<div class="row form-sub m-0">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="agree" id="agree">
						<label class="custom-control-label" for="agree">I Agree the terms and conditions.</label>
					</div>
				</div>
				<div class="form-action">
					
					<button type="submit" href="#" class="btn btn-primary btn-rounded btn-login">Sign Up</button>
				</div>
            </form>
            <div class="login-account">
					<span class="msg">Have an account yet!</span>
					<a href="{{ url('/login') }}" id="show-signup" class="link">Sign In</a>
				</div>
			</div>
		</div>
    </div>
	<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/ready.js') }}"></script>
	<script>
	$(document).ready(function () {
		// keyup function looks at the keys typed on the search box
		$('#referenceID').on('keyup',function() {
			// the text typed in the input field is assigned to a variable 
			var query = $(this).val();
			// call to an ajax function
			$.ajax({
				// assign a controller function to perform search action - route name is search
				url:"{{ route('user.search') }}",
				// since we are getting data methos is assigned as GET
				type:"GET",
				// data are sent the server
				data:{'referenceID':query},
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
</body>
</html>
