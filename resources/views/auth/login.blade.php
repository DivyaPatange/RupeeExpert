<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
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
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Sign In</h3>
			<div class="login-form">
            <form method="POST" action="{{ route('login') }}">
            @csrf
				<div class="form-group form-floating-label">
					<input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror input-border-bottom" value="{{ old('email') }}" >
					<label for="email" class="placeholder">Email</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
				</div>
				<div class="form-group form-floating-label">
					<input id="password" name="password" type="password" class="form-control  @error('password') is-invalid @enderror input-border-bottom" >
					<label for="password" class="placeholder">Password</label>
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
				</div>
				<div class="row form-sub m-0">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" name="remember" class="custom-control-input" id="rememberme" {{ old('remember') ? 'checked' : '' }}>
						<label class="custom-control-label" for="rememberme">Remember Me</label>
					</div>
					
					<!-- <a href="#" class="link float-right">Forget Password ?</a> -->
				</div>
				<div class="form-action mb-3">
					<button type="submit" class="btn btn-primary btn-rounded btn-login">Sign In</button>
				</div>
                </form>
				<div class="login-account">
					<span class="msg">Don't have an account yet ?</span>
					<a href="{{ url('/register') }}" id="show-signup" class="link">Sign Up</a>
				</div>
			</div>
		</div>

	</div>
	<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/ready.js') }}"></script>
</body>
</html>
