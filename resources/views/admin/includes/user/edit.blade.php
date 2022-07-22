<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<form method="POST">
			<input type="hidden" name="id" value="{{ $user->id }}">
			<div class="form-group mb-3">
				<label for="user-name">{{ __('Name') }}</label>
				<input type="text" class="form-control" id="user-name" name='name' value="{{ $user->name }}">
				<span class="invalid-feedback validation-error" for="name"></span>
			</div>
			<div class="form-group mb-3">
				<label for="user-email">{{ __('Email') }}</label>
				<input type="email" class="form-control" id="user-email" name='email' value="{{ $user->email }}">
				<span class="invalid-feedback validation-error" for="email"></span>
			</div>
			<div class="form-group mb-3">
				<label for="user-surname text-capitalize">{{ __('surname') }}</label>
				<input type="text" class="form-control" id="user-surname" name='surname' value="{{ $user->surname }}">
				<span class="invalid-feedback validation-error" for="surname"></span>
			</div>
			<div class="form-group mb-3">
				<label for="user-age text-capitalize">{{ __('age') }}</label>
				<input type="number" class="form-control" id="user-age" name='age' value="{{ $user->age }}">
				<span class="invalid-feedback validation-error" for="age"></span>
			</div>
			<div class="form-group mb-3">
				<label for="user-address text-capitalize">{{ __('address') }}</label>
				<input type="text" class="form-control" id="user-address" name='address' value="{{ $user->address }}">
				<span class="invalid-feedback validation-error" for="address"></span>
			</div>
			<div class="form-group mb-3">
				<label for="user-gender text-capitalize">{{ __('gender') }}</label>
				<select class="form-control" id="user-gender" name='gender'>
					<option class="text-capitalize" disabled selected value='0'>gender</option>
					<option class="text-capitalize" value='1' {{ $user->gender===1 ? 'selected' : '' }}>male</option>
					<option class="text-capitalize" value='2' {{ $user->gender===2 ? 'selected' : '' }}>female</option>
				</select>
				<span class="invalid-feedback validation-error" for="gender"></span>
			</div>
		</form>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary table-submit" item-id="{{ $user->id }}">Update</button>
	</div>
</div>