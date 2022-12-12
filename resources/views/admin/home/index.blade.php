@extends('layout.master_admin')
@section('page_title', 'Dashboard')
@section('content')
    @if(\Illuminate\Support\Facades\Auth::guard('admin')->check())
    @endif
    <a href="{{ route('admin.logout') }}">Logout</a>
@endsection
