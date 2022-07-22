@extends('admin.layouts.dashboard')
@section('title')
Colors
@endsection
@section('meta.table.name')
color
@endsection
@section('meta.table.name.plural')
colors
@endsection
@section('meta.table.labels')
<tr>
	<th class="col-1"></th>
	<th class="col-1">ID</th>
	<th class="col-3">Title</th>
	<th class="col-1"></th>
</tr>
@endsection
@section('meta.table.data')
	@foreach ($colors as $color)
		@include('admin.includes.color.create-template')
	@endforeach
@endsection
@section('meta.table.create')
<form method="POST">
	<div class="form-group mb-3">
		<label for="color-title">{{ __('Title') }}</label>
		<input type="text" class="form-control" id="color-title" name='title' value="{{old('title')}}">
		<span class="invalid-feedback validation-error" for="title"></span>
	</div>
</form>
@endsection

@section('meta.table.script')
<script type="text/javascript">
	LURL['store'] = "{{ route('admin.color.store') }}";
	LURL['delete']="{{ route('admin.color.delete') }}";
	LURL['show']="{{ route('admin.color.show','') }}";
	LURL['update'] = "{{ route('admin.color.update','') }}";
	LURL['edit'] = "{{ route('admin.color.edit','') }}";
</script>
@endsection