<tr id="tr-{{ $tag->id }}" item-id='{{ $tag->id }}' item-slug='{{ $tag->slug }}'>
	<td>
		<input type="checkbox" name="item_ids[]" autocomplete="off" />
	</td>
	<td>
		<a class='text-dark table-show-btn'>
			{{ $tag->id }}
		</a>
	</td>
	<td class="td-title">
		<a class='text-dark table-show-btn'>
			{{ $tag->title }}
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