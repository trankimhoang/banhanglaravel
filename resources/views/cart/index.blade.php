@extends('layout.master_user')
@section('content')
    <table class="table table-bordered">
        <tr>
            <th>STT</th>
            <th>Image</th>
            <th>Name</th>
            <th>Quality</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        @php
            $stt = 1;
            $total = 0;

        @endphp

        @foreach(\Illuminate\Support\Facades\Auth::guard('web')->user()->Carts as $cart)
            @php
                $totalRow = $cart->quality * $cart->Product->price;
                $total += $totalRow;
            @endphp

            <tr>
                <td>{{ $stt++ }}</td>
                <td>
                    <img src="{{ $cart->Product->getImage() }}" alt="" width="128px">
                </td>
                <td>{{ $cart->Product->name }}</td>
                <td>{{ $cart->quality }}</td>
                <td>{{ $cart->Product->getPriceWithFormat() }}</td>
                <td>{{ formartPriceVnd($totalRow) }}</td>
            </tr>
        @endforeach

        <tr>
            <td colspan="5"></td>
            <td>
                <h3>{{ formartPriceVnd($total) }}</h3>
            </td>
        </tr>
    </table>
    <a href="{{ route('home') }}">Tiep tuc mua hang</a>
@endsection
