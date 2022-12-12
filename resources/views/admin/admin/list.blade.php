@extends('layout.master_admin')
@section('page_title', 'List Admin')

@section('content')
    <a href="{{ route('admin.admin.create') }}" class="btn btn-primary mb-2">Add</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @foreach($listAdmin as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td><a href="{{ route('admin.admin.edit', $admin->id) }}">Edit</a></td>
            </tr>
        @endforeach
    </table>
@endsection
