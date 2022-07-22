@extends('admin.layouts.dashboard')
@section('title')
Users
@endsection
@section('meta.table.name')
user
@endsection
@section('meta.table.name.plural')
user
@endsection
@section('meta.table.labels')
<tr>
	<th class=""></th>
	<th class="table-show-th col">ID</th>
	<th class="table-show-th col">Name</th>
	<th class="col">Surname</th>
	<th class="col">Email</th>
	<th class="col">Gender</th>
	<th class="col">Address</th>
	<th class=""></th>
</tr>
@endsection
@section('meta.table.data')
	@foreach ($users as $user)
		@include('admin.includes.user.create-template')
	@endforeach
@endsection
@section('meta.table.create')
<form method="POST">
	<div class="form-group mb-3">
		<label for="user-name">{{ __('Name') }}</label>
		<input type="text" class="form-control" id="user-name" name='name' value="{{old('name')}}">
		<span class="invalid-feedback validation-error" for='name'></span>
	</div>
	<div class="form-group mb-3">
		<label for="user-email">{{ __('Email') }}</label>
		<input type="email" class="form-control" id="user-email" name='email' value="{{old('email')}}">
		<span class="invalid-feedback validation-error" for='email'></span>
	</div>
	<div class="form-group mb-3">
		<label for="user-password">{{ __('Password') }}</label>
		<input type="text" class="form-control" id="user-password" name='password' value="{{old('password')}}">
		<span class="invalid-feedback validation-error" for='password'></span>
	</div>
	<div class="form-group mb-3">
		<label for="user-password_confirmation">{{ __('Confirm password') }}</label>
		<input type="text" class="form-control" id="user-password_confirmation" name='password_confirmation' value="{{old('password_confirmation')}}">
		<span class="invalid-feedback validation-error" for='password_confirmation'></span>
	</div>
	<div class="form-group mb-3">
		<label for="user-surname text-capitalize">{{ __('surname') }}</label>
		<input type="text" class="form-control" id="user-surname" name='surname' value="{{old('surname')}}">
		<span class="invalid-feedback validation-error" for='surname'></span>
	</div>
	<div class="form-group mb-3">
		<label for="user-age text-capitalize">{{ __('age') }}</label>
		<input type="number" class="form-control" id="user-age" name='age' value="{{old('age')}}">
		<span class="invalid-feedback validation-error" for='age'></span>
	</div>
	<div class="form-group mb-3">
		<label for="user-address text-capitalize">{{ __('address') }}</label>
		<input type="text" class="form-control" id="user-address" name='address' value="{{old('address')}}">
		<span class="invalid-feedback validation-error" for='address'></span>
	</div>
	<div class="form-group mb-3">
		<label for="user-gender text-capitalize">{{ __('gender') }}</label>
		<select class="form-control" id="user-gender" name='gender'>
			<option class="text-capitalize" disabled selected value='0'>gender</option>
			<option class="text-capitalize" value='1' {{ old('gender')==1? 'selected':'' }}>male</option>
			<option class="text-capitalize" value='2'	{{ old('gender')==2? 'selected':'' }}>female</option>
		</select>
		<span class="invalid-feedback validation-error" for='gender'></span>
	</div>
</form>
@endsection

@section('meta.table.script')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<script type="text/javascript" src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
	LURL['store'] = "{{ route('admin.user.store') }}";
	LURL['edit'] = "{{ route('admin.user.edit','') }}";
	LURL['delete']="{{ route('admin.user.delete') }}";
	LURL['show']="{{ route('admin.user.show','') }}";
	LURL['update'] = "{{ route('admin.user.update','') }}";
	$(document).ready(function(){
		$('#user-gender').select2({
			theme:'bootstrap4',
		});		
	});
</script>
@endsection