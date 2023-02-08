@extends('template.layout', ['title' => 'Cart'])
@section('header')
    <link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection
@section('content')
    <div class="p-3">
        <span class="fw-bold fs-3">{{ __('cart.cart') }}</span>
        <div class="d-flex justify-content-center flex-column ms-2">
            <div hidden>
                {{ $total = 0 }}
            </div>
            @forelse ($orders as $order)
                <div class="card w-100 mb-3">
                    <div class="card-body d-flex">
                        <div class="me-3">
                            <img src="{{ asset('/storage/'.$order->image_url) }}" class="item-image-small" alt="">
                        </div>
                        <div>
                            <h5 class="card-title">{{ $order->item_name }}</h5>
                            <p class="card-text">Price: Rp. {{ number_format($order->price, 2, ',', '.') }}</p>
                            <a href="{{ route('cart.delete', ['id'=>$order->item_id]) }}" class="btn btn-primary">{{ __('cart.delete') }}</a>
                        </div>
                        <div hidden>
                            {{ $total += $order->price }}
                        </div>
                    </div>
                </div>
            @empty
                <span class="fs-4">{{__('cart.empty')}}</span>
            @endforelse
        </div>
        @if ($total > 0)
            <div class="d-flex w-100 justify-content-end px-3 align-items-center">
                <span class="fs-5 fw-bold">{{ __('cart.total') }} : Rp. {{ number_format($total, 2, ',', '.') }}</span>
                <a class="btn btn-warning mx-2" href="{{ route('cart.checkout') }}">
                    {{ __('cart.check_out') }}
                </a>
            </div>
        @endif
    </div>
@endsection
