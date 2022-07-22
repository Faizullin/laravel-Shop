@extends('layouts.admin')
@section('content')
<div class="row">
	<section class="col-sm-10 col-12">
		<div class="table-block">
			<div class="card">
				<div class="card-header">
					<div class="d-flex justify-content-between">
						<h3><span class="text-capitalize">@yield('meta.table.name.plural')</span> table</h3>
						<button class="btn btn-primary table-create-btn">Add <span class="text-capitalize">@yield('meta.table.name')</span></button>
					</div>
				</div>
				<div class="card-body">
					<table id="index-table" class="table table-borderless table-hover">
						<thead>
							@yield('meta.table.labels')
						</thead>
						<tbody>
							@yield('meta.table.data')
						</tbody>
						<tfoot>
						
						</tfoot>
					</table>
				</div>
				
				<div class="card-footer">
					<div class="d-flex align-items-center">
						<span class="link text-primary cursor select-all-btn" href="">{{ __("Select All") }}</span>
						<input type="button" class="btn btn-danger table-delete-multiple-btn" value="{{ __('Delete') }}">
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@include('admin.includes.dashboard.modal')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@yield('meta.table.script')
<script src="{{ asset('js/dashboard.js') }}"></script>
<style type="text/css">
	td>a{
		cursor: pointer;
	}
	#index-table .td-action{
		display: flex;
		justify-content: space-between;
	}
	#index-table .td-action .table-edit-btn{
		margin-right: 20px;
	}
	.select-all-btn{
		margin-right: 30px;
		cursor: pointer;
	}
	.table-create-template{
		display: none;
	}

</style>
@endsection