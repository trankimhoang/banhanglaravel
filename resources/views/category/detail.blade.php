@extends('layout.master_user')
@section('content')
    <h1>{{ $category->name }}</h1>
    <div>
        <img src="{{ $category->getImage() }}" alt="">
    </div>
@endsection
