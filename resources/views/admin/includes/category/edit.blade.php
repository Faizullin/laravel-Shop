<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<form method="POST">
			<input type="hidden" name="id" value="{{ $category->id }}">
			<div class="form-group mb-3">
				<label for="category-title">{{ __('Title') }}</label>
				<input type="text" class="form-control" id="category-title" name='title' value="{{ $category->title }}">
				<span class="invalid-feedback validation-error" for="title"></span>
			</div>
		</form>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary table-submit" item-slug="{{ $category->slug }}">Update</button>
	</div>
</div>
