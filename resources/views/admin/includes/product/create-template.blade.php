<tr id="tr-{{ $product->id }}" item-id={{ $product->id }}>
	<td>
		<input type="checkbox" name="item_ids[]" autocomplete="off" />
	</td>
	<td class="td-id table-show-btn">
		<a class='text-dark'>{{ $product->id }}</a>
	</td>
	<td class="td-title table-show-btn">
		<a class='text-dark'>{{ $product->title }}</a>
	</td>
	<td class="td-user">
		@if ($product->user)
			<a class='text-dark' href='{{ route('admin.user.index') }}?action=show&item-id={{ $product->user->id }}'>{{ $product->user->name }}</a>
		@else
			<span class="text-muted">Unknown</span>
		@endif
	</td>
	<td class="td-category">
		@if ($product->category)
			<a class='text-dark' href='{{ route('admin.category.index') }}?action=show&item-id={{ $product->category->id }}'>{{ $product->category->title }}</a>
		@else
			<span class="text-muted">Unknown</span>
		@endif
	</td>
	<td class="td-action">
		<a class='text-primary table-edit-btn '>
			<i class="fa fa-pen"></i>
		</a>
		<a class='text-danger table-delete-btn'>
			<i class="fa fa-trash"></i>
		</a>
	</td>
</tr>