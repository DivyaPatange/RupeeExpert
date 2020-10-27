@extends('admin.adminLayout.mainlayout')
@section('title', 'User Profile')
@section('content')
@section('page_title', 'Profile')
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
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $user->name }} - Daily Income</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Client ID</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        @if($total > 0)
                        <tfoot>
                            <tr>
                                <th colspan="3">Total</th>
                                <th>{{ $total }}</th>
                            </tr>
                        </tfoot>
                        @endif
                        <tbody>
                            @foreach($userWallet as $u)
                            <tr>
                            <?php
                            $clientName = DB::table('users')->where('client_id', $u->client_id)->first();
                            ?>
                                <td>{{ $u->client_id }}</td>
                                <td>@if(isset($clientName) && !empty($clientName)) {{ $clientName->name }} @endif</td>
                                <td>{{ $u->income_date }}}</td>
                                <td>{{ $u->amount }}</td>
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
    $('#basic-datatables').DataTable({
    });
})
</script>
@endsection