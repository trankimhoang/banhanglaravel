@extends('layout.master_admin')
@section('page_title', 'Edit Product')
@section('content')
    <form action="{{ route('admin.product.edit.post') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $product->id }}">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
        </div>
        <div class="form-group">
            @if(!empty($product->image))
                <img src="{{ asset($product->image) }}" width="256px" class="img-preview">
            @else
                <img src="{{ asset('images/not_found.jpg') }}" width="256px" class="img-preview">
            @endif
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" value="{{ old('price', $product->price) }}">
        </div>
        <div class="form-group">
            <label for="des">Description</label>
            <textarea name="description" class="form-control ckeditor" cols="30" rows="10">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#image').change(function (event) {
                $(".img-preview").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
            });
        });
    </script>
@endsection
