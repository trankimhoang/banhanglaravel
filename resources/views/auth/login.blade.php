@extends('layout.master_user')

@section('content')
    <form action="{{ route('login') }}" method="post">
        @csrf
        @error('error')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror

        <h3>Dang Nhap</h3>
        <input type="text" name="email" class="form-control" placeholder="email"><br>
        <input type="password" name="password" class="form-control" placeholder="password"><br>
        <button name="submit" class="btn btn-primary">{{ __('login') }}</button>
    </form>
@endsection
