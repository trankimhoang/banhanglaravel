@extends('layout.master_admin')
@section('page_title', 'List Category')

@section('content')
    <a href="{{ route('admin.category.create') }}" class="btn btn-primary mb-2">Add</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        @foreach($listCategory as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td><img src="{{ $category->getImage() }}" alt="" width="128px"></td>
                <td><a href="{{ route('admin.category.edit', $category->id) }}">Edit</a></td>
            </tr>
        @endforeach
    </table>
@endsection
