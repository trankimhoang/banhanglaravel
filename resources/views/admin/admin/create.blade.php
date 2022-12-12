@extends('layout.master_admin')

@section('page_title', 'Add Admin')

@section('content')
    <form action="{{ route('admin.admin.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
@endsection
