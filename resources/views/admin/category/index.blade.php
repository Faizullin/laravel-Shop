@extends('admin.layouts.dashboard')
@section('title')
Categories
@endsection
@section('meta.table.name')
category
@endsection
@section('meta.table.name.plural')
categories
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
	@foreach ($categories as $category)
		@include('admin.includes.category.create-template')
	@endforeach
@endsection
@section('meta.table.create')
<form method="POST">
	<div class="form-group mb-3">
		<label for="category-title">{{ __('Title') }}</label>
		<input type="text" class="form-control" id="category-title" name='title' value="{{old('title')}}">
		<span class="invalid-feedback validation-error" for='title'></span>
	</div>
</form>
@endsection
@section('meta.table.script')
<script type="text/javascript">
	LURL['store'] = "{{ route('admin.category.store') }}";
	LURL['delete']="{{ route('admin.category.delete') }}";
	LURL['show']="{{ route('admin.category.show','') }}";
	LURL['update'] = "{{ route('admin.category.update','') }}";
	LURL['edit'] = "{{ route('admin.category.edit','') }}";
</script>
@endsection