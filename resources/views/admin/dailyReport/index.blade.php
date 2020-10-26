@extends('admin.adminLayout.mainlayout')
@section('title', 'Daily Report')
@section('content')
@section('page_title', 'Daily Report')
<div class="row justify-content-center">
    <div class="col-md-6">
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
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Upload File</div>
            </div>
            <form method="POST" action="{{ route('admin.uploadFile') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="email2">File</label>
                    <input type="file" class="form-control @error('file') is-invalid @enderror" id="email2" name="file">
                    @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-action">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>
        </div>
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
                                <th>Client ID</th>
                                <th>Name</th>
                                <th>Gross</th>
                                <th>Remiser</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Client ID</th>
                                <th>Name</th>
                                <th>Gross</th>
                                <th>Remiser</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @foreach($dailyReports as $key => $d)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $d->client_id }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->gross }}</td>
                                <td>{{ $d->remiser }}</td>
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