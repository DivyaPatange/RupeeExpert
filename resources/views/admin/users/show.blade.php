@extends('admin.adminLayout.mainlayout')
@section('title', 'Users')
@section('content')
@section('page_title', 'Users')
<div class="row">
    <div class="col-md-12">
    <a href="{{ route('admin.users.create') }}" class="btn btn-secondary">
        Login to User
    </a>
    </div>
</div>
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
        <div class="card mt-4">
        </div>
    </div>
</div>
@endsection
@section('customjs')

@endsection