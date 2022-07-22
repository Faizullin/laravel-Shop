<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel"><span class="text-capitalize">Color</span></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<table id="table-show-item" class="table table-bordered table-hover" item-id="{{ $color->id }}">
			<thead>
				<tr>
					<th>ID</th>
					<td class="td-id">{{ $color->id }}</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Title</th>
					<td class="td-title">
						{{ $color->title }}
					</td>
				</tr>
				<tr>
					<th>
						Products
					</th>
					<td class="td-prodcuts">
						<a href="{{ route('admin.product.index') }}?color={{ $color->id }}">
							{{ $color->products()->count() }}
						</a>
					</td>
				</tr>
				<tr>
					<th>Created at</th>
					<td class="td-created_at">
						{{ $color->created_at }}
					</td>
				</tr>
				<tr>
					<th>Last updated at</th>
					<td class="td-updated_at">
						{{ $color->updated_at }}
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary table-submit">Edit</button>
	</div>
</div>
