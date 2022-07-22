<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel"><span class="text-capitalize">Tag</span></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<table id="table-show-item" class="table table-bordered table-hover" item-id="{{ $tag->id }}">
			<thead>
				<tr>
					<th>ID</th>
					<td class="td-id">{{ $tag->id }}</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Title</th>
					<td class="td-title">
						{{ $tag->title }}
					</td>
				</tr>
				<tr>
					<th>
						Products
					</th>
					<td class="td-prodcuts">
						<a href="{{ route('admin.product.index') }}?tag={{ $tag->id }}">
							{{ $tag->products()->count() }}
						</a>
					</td>
				</tr>
				<tr>
					<th>Created at</th>
					<td class="td-created_at">
						{{ $tag->created_at }}
					</td>
				</tr>
				<tr>
					<th>Last updated at</th>
					<td class="td-updated_at">
						{{ $tag->updated_at }}
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary table-submit" item-slug={{ $tag->slug }}>Edit</button>
	</div>
</div>