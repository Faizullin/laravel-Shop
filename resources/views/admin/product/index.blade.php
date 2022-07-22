@extends('admin.layouts.dashboard')
@section('title')
Products
@endsection
@section('meta.table.name')
product
@endsection
@section('meta.table.name.plural')
products
@endsection
@section('meta.table.labels')
<tr>
	<th class="col-1"></th>
	<th class="col-1 table-show-th">ID</th>
	<th class="col-3 table-show-th">Title</th>
	<th class="col-3">Author</th>
	<th class="col-3">Category</th>
	<th class="col-1"></th>
</tr>
@endsection
@section('meta.table.data')
	@foreach ($products as $product)
		@include('admin.includes.product.create-template')
	@endforeach
@endsection
@section('meta.table.create')
<form method="POST">
	<div class="form-group mb-3">
		<label for="product-title">{{ __('Title') }}</label>
		<input type="text" class="form-control" id="product-title" name='title' value="{{old('title')}}">
	</div>
	<div class="form-group">
		<label for="product-description">Description</label>
		<textarea type="text" class="form-control" id="product-description" name="description" placeholder="Enter text" value="{{ old('description') }}"></textarea>
		<span class="invalid-feedback validation-error" for='description'></span>
	</div>
	<div class="form-group">
		<label for="product-content">Content</label>
		<textarea type="text" class="form-control" id="product-content" name="content" placeholder="Enter text" value="{{ old('content') }}"></textarea>
		<span class="invalid-feedback validation-error" for='content'></span>
	</div>
	<div class="form-group">
		<label for="product-preview_image">Preview_image</label>
		<input type="file" class="form-control" id="product-preview_image" name="preview_image" placeholder="Enter text" value=""></input>
		<span class="invalid-feedback validation-error" for='preview_image'></span>
	</div>
	<div class="form-group">
		<label for="product-product_images">Product images</label>
		<input type="file" class="form-control" id="product-product_images" name="product_images[]"></input>
		<span class="invalid-feedback validation-error" for='product_images[]'></span>
	</div>
	<div class="form-group">
		<label for="product-price">Price</label>
		<input type="number" class="form-control" id="product-price" name='price' value="{{old('price')}}">
		<span class="invalid-feedback validation-error" for='price'></span>
	</div>
	<div class="form-group">
		<label for="product-count">Count</label>
		<input type="number" class="form-control" id="product-count" name='count' value="{{old('count')}}">
		<span class="invalid-feedback validation-error" for='count'></span>
	</div>
	<div class="form-group">
		<label for="product-category" class="">{{ __('Category') }}</label>
		<select id='product-category' class="custom-select" name="category_id" >
			<option selected value='' disabled selected>Choose Category</option>
			@foreach ($categories as $category)
			<option value="{{ $category->id }}">{{ $category->title }}</option>
			@endforeach
		</select>
		<span class="invalid-feedback validation-error" for='category_id'></span>
	</div>
	<div class="form-group">
		<label for="product-tags">Tags</label>
		<select class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" aria-hidden="true" id='product-tags'  multiple="multiple" name="tag_ids[]">
			@foreach ($tags as $tag)
			<option value="{{ $tag->id }}">
				{{ $tag->title }}
			</option>
			@endforeach
		</select>
		<span class="invalid-feedback validation-error" for='tag_ids[]'></span>
	</div>
	<div class="form-group">
		<label for="product-colors">Colors</label>
		<select class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" aria-hidden="true" id='product-colors'  multiple="multiple" name="color_ids[]">
			@foreach ($colors as $color)
			<option value="{{ $color->id }}">
				{{ $color->title }}
			</option>
			@endforeach
		</select>
		<span class="invalid-feedback validation-error" for='color_ids[]'></span>
	</div>
</form>
@endsection
@section('meta.table.show')
@section('meta.table.script')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<script type="text/javascript" src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
{{-- <script src="{{ asset('js/JqueryFileUploader.js') }}"></script> --}}
<script type="text/javascript">
	LURL['store'] = "{{ route('admin.product.store') }}";
	LURL['delete']="{{ route('admin.product.delete') }}";
	LURL['show']="{{ route('admin.product.show','') }}";
	LURL['update'] = "{{ route('admin.product.update','') }}";
	LURL['edit'] = "{{ route('admin.product.edit','') }}";
	LURL['asset.img'] = "{{ Storage::url('') }}";

	var files1Uploader=null;
	$(document).ready(function(){
		$('#product-tags').select2({
			theme:'bootstrap4',
		});
		$('#product-colors').select2({
			theme:'bootstrap4',
		});
		
	});
</script>
<style type="text/css">
	.select2-results__option[aria-selected=true] {
	display: none;
	}
	.table-create-img-show-btn{
		cursor: pointer;
		font-weight: 700;
		color: black;
	}
</style>
</script>
@endsection