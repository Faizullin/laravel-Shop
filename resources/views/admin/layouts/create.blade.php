@extends('layouts.admin')
@section('title')
Create <span class="text-capitalize">@yield('meta.table.name')</span>
@endsection
@section('content')
<div class="row">
	<div class="col-6">
		@yield('meta.table.create')
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.table-insert-btn').click(function(){

		});
		$('.table-insert-btn').click(function(){
			
		});
	});
</script>
@endsection