@extends('layout.master_admin')
@section('page_title', 'List User')

@section('content')
    <table class="table table-bordered">
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @php
            $stt = 1;
        @endphp
        @foreach($listUser as $user)
            <tr>
                <td>{{ $stt++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('admin.user.detail', ['id' => $user])  }}">View</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
