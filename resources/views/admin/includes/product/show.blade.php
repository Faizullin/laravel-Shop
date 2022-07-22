<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel"><span class="text-capitalize">Product</span></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<table id="show-table" class="table table-bordered table-hover" item-id='{{ $product->id }}'>
			<thead>
				<tr>
					<th>ID</th>
					<td class="td-id">
						{{ $product->id }}
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Title</th>
					<td class="td-title">
						{{ $product->title }}
					</td>
				</tr>
				<tr>
					<th>Description</th>
					<td class="td-description">
						{{ $product->description }}
					</td>
				</tr>
				<tr>
					<th>Content</th>
					<td class="td-content">
						{{ $product->content }}
					</td>
				</tr>
				<tr>
					<th>Preview image</th>
					<td class="td-preview_image">
						@if($product->imageUrl)
							<img src="{{ $product->imageUrl }}" alt="{{ $product->imageUrl }}" class="img-fluid img-thumbnail img-thumbnail w-50">
						@else
							<span class="text-muted">Empty</span>
						@endif
					</td>
				</tr>
				<tr>
					<th>Product image</th>
					<td class="td-preview_image">
						@if ($product->productImages()->count()>0 )
							@foreach ($product->productImages as $productImage)
								<img src="{{ $productImage->imageUrl }}" alt="{{ $productImage->imageUrl }}" class="img-fluid img-thumbnail img-thumbnail w-50 mt-3">
							@endforeach
						@else
							<span class="text-muted">Empty</span>
						@endif
					</td>
				</tr>
				<tr>
					<th>Price</th>
					<td class="td-price">
						{{ $product->price }}
					</td>
				</tr>
				<tr>
					<th>Count</th>
					<td class="td-count">
						{{ $product->count }}
					</td>
				</tr>
				<tr>
					<th>Published state</th>
					<td class="td-isPublished">
						{{ $product->isPublished ? "True" : "False" }}
					</td>
				</tr>
				<tr>
					<th>Category</th>
					<td class="td-category">
						@if ($product->category)
							<a href="{{ route('admin.category.index') }}?action=show&item-id={{ $product->category->id }}">{{ $product->category->title }}</a>
						@else
							<span class="text-muted">Unknown</span>
						@endif
					</td>
				</tr>
				<tr>
					<th>Tags</th>
					<td class="td-tags">
						@if ($product->tags()->count()>0)
						@foreach ($product->tags as $product_tag)
						<a class="badge badge-info" href="{{ route('admin.tag.index') }}?action=show&item-id={{ $product_tag->id }}">{{ $product_tag->title }}</a>
						@endforeach
						@else
						<span class="text-muted">Empty</span>
						@endif
					</td>
				</tr>
				<tr>
					<th>Colors</th>
					<td class="td-colors">
						@if ($product->colors()->count()>0)
						@foreach ($product->colors as $product_color)
						<a class="badge badge-info" href="{{ route('admin.color.index') }}?action=show&item-id={{ $product_color->id }}">{{ $product_color->title }}</a>
						@endforeach
						@else
						<span class="text-muted">Empty</span>
						@endif
					</td>
				</tr>
				<tr>
					<th>Author</th>
					<td class="td-user">
						@if ($product->user)
						<a href="{{ route('admin.user.index') }}?action=show&item-id={{ $product->user->id }}">{{ $product->user->name }}</a>
						@else
						<span class="text-muted">Unknown</span>
						@endif
					</td>
				</tr>
				<tr>
					<th>Created at</th>
					<td class="td-created_at">
						{{ $product->created_at }}
					</td>
				</tr>
				<tr>
					<th>Last updated at</th>
					<td class="td-updated_at">
						{{ $product->updated_at }}
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary table-submit" item-id={{ $product->id }}>Edit</button>
	</div>
</div>