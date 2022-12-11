@extends('layout.master_admin')
@section('page_title', 'Dashboard')
@section('content')
    @if(\Illuminate\Support\Facades\Auth::guard('admin')->check())
        <h1>{{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->name }}</h1>
    @endif
    <a href="{{ route('admin.logout') }}">Logout</a>
@endsection
