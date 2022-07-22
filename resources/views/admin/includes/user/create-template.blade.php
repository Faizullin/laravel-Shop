<tr id="tr-{{ $user->id }}" item-id='{{ $user->id }}'>
	<td>
		<input type="checkbox" name="item_ids[]" autocomplete="off" />
	</td>
	<td class="td-id">
		<a class='text-dark table-show-btn'>{{ $user->id }}</a>
	</td>
	<td class="td-name">
		<a class='text-dark table-show-btn'>{{ $user->name }}</a>
	</td>
	<td class="td-surname">
		@if ($user->surname)
			<a class='text-dark'>{{ $user->surname }}</a>
		@else
			<span class="text-muted">Unknown</span>
		@endif
	</td>
	<td class="td-email">
		<a class='text-dark'>{{ $user->email }}</a>
	</td>
	<td class="td-gender">
		@if ($user->gender)
			<a class='text-dark'>{{ $user->genderTitle }}</a>
		@else
			<span class="text-muted">Unknown</span>
		@endif
	</td>
	<td class="td-address">
		@if ($user->address)
			<a class='text-dark'>{{ $user->address }}</a>
		@else
			<span class="text-muted">Unknown</span>
		@endif
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