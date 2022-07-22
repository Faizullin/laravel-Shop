@extends('admin.layouts.dashboard')
@section('title')
Tags
@endsection
@section('meta.table.name')
tag
@endsection
@section('meta.table.name.plural')
tags
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
	@foreach ($tags as $tag)
		@include('admin.includes.tag.create-template')
	@endforeach
@endsection
@section('meta.table.create')
<form method="POST">
	<div class="form-group mb-3">
		<label for="tag-title">{{ __('Title') }}</label>
		<input type="text" class="form-control" id="tag-title" name='title' value="{{old('title')}}">
	</div>
</form>
@endsection
@section('meta.table.script')
<script type="text/javascript">
	LURL['store'] = "{{ route('admin.tag.store') }}";
	LURL['delete']="{{ route('admin.tag.delete') }}";
	LURL['show']="{{ route('admin.tag.show','') }}";
	LURL['update'] = "{{ route('admin.tag.update','') }}";
	LURL['edit'] = "{{ route('admin.tag.edit','') }}";
</script>
@endsection