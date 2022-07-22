<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">
			<span class="text-capitalize">User</span>
		</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">
				&times;
			</span>
		</button>
	</div>
	<div class="modal-body">
		<table id="table-show-item" class="table table-bordered table-hover" item-id="{{ $user->id }}">
			<thead>
				<tr>
					<th>ID</th>
					<td class="td-id">{{ $user->id }}</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Name</th>
					<td class="td-name">{{ $user->name }}</td>
				</tr>
				<tr>
					<th>Surname</th>
					<td class="td-surname">
						@if ($user->surname )
						{{ $user->surname  }}
						@else
						<span class="text-muted">Unknown</span>
						@endif
					</td>
				</tr>
				<tr>
					<th>Email</th>
					<td class="td-email">
						@if ($user->email )
						{{ $user->email  }}
						@else
						<span class="text-muted">Unknown</span>
						@endif
					</td>
				</tr>
				<tr>
					<th>Age</th>
					<td class="td-age">
						@if ($user->age )
						{{ $user->age  }}
						@else
						<span class="text-muted">Unknown</span>
						@endif
					</td>
				</tr>
				<tr>
					<th>Gender</th>
					<td class="td-gender">
						@if ($user->gender )
						{{ $user->genderTitle  }}
						@else
						<span class="text-muted">Unknown</span>
						@endif
					</td>
				</tr>
				<tr>
					<th>Address</th>
					<td class="td-address">
						@if ($user->address )
						{{ $user->address  }}
						@else
						<span class="text-muted">Unknown</span>
						@endif
					</td>
				</tr>
				<tr>
					<th>Products</th>
					<td class="td-prodcuts">
						<a href="{{ route('admin.product.index') }}?user={{ $user->id }}">
							{{ $user->products()->count() }}
						</a>
					</td>
				</tr>
				<tr>
					<th>Role</th>
					<td class="td-role">
						{{ $user->roleTitle }}
					</td>
				</tr>
				<tr>
					<th>Created at</th>
					<td class="td-created_at">
						{{ $user->created_at }}
					</td>
				</tr>
				<tr>
					<th>Last updated at</th>
					<td class="td-updated_at">{{ $user->updated_at }}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary table-submit">Edit</button>
	</div>
</div>