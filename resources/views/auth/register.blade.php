@extends('layout.master_user')
@section('content')
    @error('server_error')
        <div class="alert alert-danger">
            {{ $errors->first('server_error') }}
        </div>
    @enderror

    <form action="" method="post">
        @csrf
        <h3>Dang Ky</h3>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" placeholder="email" value="{{ old('email') }}">
            @error('email')
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="name" value="{{ old('name') }}">
            @error('name')
                <div class="alert alert-danger">
                    {{ $errors->first('name') }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="password" value="{{ old('password') }}">
            @error('password')
                <div class="alert alert-danger">
                    {{ $errors->first('password') }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm password</label>
            <input type="password" name="confirm_password" class="form-control" placeholder="confirm-password" value="{{ old('confirm_password') }}">
            @error('confirm_password')
                <div class="alert alert-danger">
                    {{ $errors->first('confirm_password') }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    @if(session('success'))
        {{ session('success') }}
    @endif
@endsection
