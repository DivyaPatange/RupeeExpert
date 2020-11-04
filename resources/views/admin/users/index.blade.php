@extends('admin.adminLayout.mainlayout')
@section('title', 'Users')
@section('content')
@section('page_title', 'Users')
<div class="row">
    <div class="col-md-12">
    <a href="{{ route('admin.users.create') }}" class="btn btn-secondary">
        <span class="btn-label">
            <i class="fa fa-plus"></i>
        </span>
        User
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
            <div class="card-header">
                <h4 class="card-title">Users List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Client ID</th>
                                <th>Mobile No.</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Client ID</th>
                                <th>Mobile No.</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $key => $u)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->reference_client_id }}</td>
                                <td>{{ $u->contact_no }}</td>
                                <td>
                                <a href="{{ route('admin.users.show', $u->id) }}"><button class="btn btn-info">Profile</button></a>
                                <a href="{{ route('admin.users.edit', $u->id) }}"><button class="btn btn-danger">Edit</button></a>
                                </td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customjs')
<script >
$(document).ready(function() {
    $('#multi-filter-select').DataTable({
    });
});
</script>
@endsection