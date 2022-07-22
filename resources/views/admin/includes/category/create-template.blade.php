<tr id="tr-{{ $category->id }}" item-id='{{ $category->id }}' item-slug='{{ $category->slug }}'>
	<td>
		<input type="checkbox" name="item_ids[]" autocomplete="off" />
	</td>
	<td>
		<a class='text-dark table-show-btn'>
			{{ $category->id }}
		</a>
	</td>
	<td class="td-title">
		<a class='text-dark table-show-btn'>
			{{ $category->title }}
		</a>
	</td>
	<td class="td-action">
		<a class='text-primary table-edit-btn'>
			<i class="fa fa-pen"></i>
		</a>
		<a class='text-danger table-delete-btn'>
			<i class="fa fa-trash"></i>
		</a>
	</td>
</tr>