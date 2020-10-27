@extends('admin.adminLayout.mainlayout')
@section('title', 'Admin Wallet')
@section('content')
@section('page_title', 'Admin Wallet')
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
                <h4 class="card-title">Admin Wallet List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Client ID</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Client ID</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @foreach($adminWallet as $key => $u)
                        <?php
                            $user = DB::table('users')->where('client_id', $u->client_id)->first();
                        ?>
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $u->client_id }}</td>
                                <td>@if(isset($user) && !empty($user))
                                {{ $user->name }} @endif</td>
                                <td>{{ $u->amount }}</td>
                                <td>{{ $u->income_date }}</td>
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

    $('#multi-filter-select').DataTable( {
        "pageLength": 10,
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select class="form-control"><option value=""></option></select>')
                .appendTo( $(column.footer()).empty() )
                .on( 'change', function () {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                        );

                    column
                    .search( val ? '^'+val+'$' : '', true, false )
                    .draw();
                } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    });
});
</script>
@endsection