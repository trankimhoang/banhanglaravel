@extends('layout.master_admin')

@section('page_title', 'Edit product')

@section('content')
    <form action="{{ route('admin.admin.update', $admin->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $admin->name) }}">
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" value="{{ old('name', $admin->email) }}">
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="text" name="password" class="form-control" value="{{ old('password') }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
