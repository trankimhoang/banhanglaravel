@extends('layout.master_admin')
@section('page_title', 'List Product')
@section('content')
    <table class="table table-bordered">
        <tr>
            <th width="5%">ID</th>
            <th width="30%">Name</th>
            <th width="10%">Image</th>
            <th width="10%">Price</th>
            <th width="35%">Description</th>
            <th width="10%">Action</th>
        </tr>
        @foreach($listProduct as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    @if(!empty($product->image))
                        <img src="{{ asset($product->image) }}" width="100%">
                    @else
                        <img src="{{ asset('images/not_found.jpg') }}" width="100%">
                    @endif

                </td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a href="{{ route('admin.product.delete', ['id' => $product->id]) }}" class="btn btn-danger">Delete</a>
                    <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>

    <div>
        {{ $listProduct->links('pagination::bootstrap-4') }}
    </div>
@endsection
