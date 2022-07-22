<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<form method="POST">
			<input type="hidden" name="id" value="{{ $product->id }}">
			<div class="form-group mb-3">
				<label for="product-title">{{ __('Title') }}</label>
				<input type="text" class="form-control" id="product-title" name='title' value="{{ $product->title }}">
				<span class="invalid-feedback validation-error" for='title'></span>
			</div>
			<div class="form-group">
				<label for="product-description">Description</label>
				<textarea type="text" class="form-control" id="product-description" name="description" placeholder="Enter text">{{ $product->description }}</textarea>
				<span class="invalid-feedback validation-error" for='description'></span>
			</div>
			<div class="form-group">
				<label for="product-content">Content</label>
				<textarea type="text" class="form-control" id="product-content" name="content" placeholder="Enter text">{{ $product->content }}</textarea>
				<span class="invalid-feedback validation-error" for='content'></span>
			</div>
			<div class="form-group">
				<label for="product-preview_image">Preview image</label>
				<input type="file" class="form-control" id="product-preview_image" name="preview_image">
				<img src="{{ $product->imageUrl }}" alt="{{ $product->imageUrl }}" class="img-fluid img-thumbnail img-thumbnail w-50 mt-3">
				<span class="invalid-feedback validation-error" for='preview_image'></span>
			</div>
			<div class="form-group productFilesList">
				<label for="product-product_images">Product images</label>
				{{-- @if ($product->productImages()->count() ) --}}
					<input type="file" class="form-control" id="product-product_images" name="product_images[]" multiple></input>
					<span class="invalid-feedback validation-error" for='product_images[]'></span>
				{{-- @endif --}}
				<ul class="fileList">
					@if ($product->productImages()->count()>0 )
						@foreach ($product->productImages as $productImage)
{{-- 							<li>
								<a class="table-create-img-show-btn" data-fileid="files{{ $productImage->id }}">{{ $productImage->file_path }}
								</a>
								<span>
									 - {{ Storage::size("public/".$productImage->file_path) }} bytes.
								</span>
								<a class="removeFile" href="#" data-fileid="files{{ $productImage->id }}">
									Remove
								</a>
							</li> --}}
							<img src="{{ Storage::url($productImage->file_path) }}" alt="{{ $productImage->file_path }}" class="img-fluid img-thumbnail img-thumbnail w-50 mt-3">
						@endforeach
					@endif
				</ul>
			</div>
			<div class="form-group">
				<label for="product-price">Price</label>
				<input type="number" class="form-control" id="product-price" name='price' value="{{ $product->price }}">
				<span class="invalid-feedback validation-error" for='price'></span>
			</div>
			<div class="form-group">
				<label for="product-count">Count</label>
				<input type="number" class="form-control" id="product-count" name='count' value="{{ $product->count }}">
				<span class="invalid-feedback validation-error" for='count'></span>
			</div>
			<div class="form-group">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" id="product-isPublished" name="isPublished" {{ $product->isPublished ? 'selected':'' }}>
					<label class="form-check-label" for="product-isPublished">Published State</label>
				</div>
				<span class="invalid-feedback validation-error" for='isPublished'></span>
			</div>
			<div class="form-group">
				<label for="product-category" class="">{{ __('Category') }}</label>
				<select id='product-category' class="custom-select" name="category_id" >
					<option selected value='' disabled selected>Choose Category</option>
					@foreach ($categories as $category)
					<option value="{{ $category->id }}" {{ $category->id===$product->category->id ? 'selected' : '' }}>{{ $category->title }}</option>
					@endforeach
				</select>
				<span class="invalid-feedback validation-error" for='category_id'></span>
			</div>
			<div class="form-group">
				<label for="product-tags">Tags</label>
				<select class="form-control select2 select2-primary product-tags" data-dropdown-css-class="select2-primary" aria-hidden="true" id='product-tags'  multiple="multiple" name="tag_ids[]">
					@foreach ($tags as $tag)
					<option value="{{ $tag->id }}"
						@foreach ($product->tags as $product_tag)
						{{ $product_tag->id === $tag->id ? 'selected' : '' }}
						@endforeach
						>
						{{ $tag->title }}
					</option>
					@endforeach
				</select>
				<span class="invalid-feedback validation-error" for='tag_ids[]'></span>
			</div>
			<div class="form-group">
				<label for="product-colors">Colors</label>
				<select class="form-control select2 select2-primary product-colors" data-dropdown-css-class="select2-primary" aria-hidden="true" id=''  multiple="multiple" name="color_ids[]">
					@foreach ($colors as $color)
					<option value="{{ $color->id }}"
						@foreach ($product->colors as $product_color)
						{{ $product_color->id === $color->id ? 'selected' : '' }}
						@endforeach
						>
						{{ $color->title }}
					</option>
					@endforeach
				</select>
				<span class="invalid-feedback validation-error" for='color_ids[]'></span>
			</div>
		</form>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary table-submit" item-id={{ $product->id }}>Update</button>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.product-tags').select2({
			theme:'bootstrap4',
		});
		$('.product-colors').select2({
			theme:'bootstrap4',
		});
		// filesUploaderForEdit = $(".table-edit-modal .productFilesList").fileUploader([],{!! json_encode($product->productImages->toArray()) !!} ,"files");
		// $('.table-create-img-show-modal').on('click',".table-submit",function (event) {
		// 	event.preventDefault();
		// 	var formData = new FormData();
		// 	for (var i = 0, len = filesToUpload.length; i < len; i++) {
		// 		formData.append("files", filesToUpload[i].file);
		// 	}
		// 	console.log(formData.getAll('files'))
		// });
	});
</script>