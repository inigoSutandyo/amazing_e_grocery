@extends('template.layout', ['title' => 'Detail'])
@section('header')
    <link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection
@section('content')
    <div class="container px-5 my-3">
        <div class="row">
            <div class="col-6 text-center flex-column d-flex align-items-center justify-content-center">
                <span class="fs-3 fw-bold">{{$item->item_name}}</span>
                <img class="item-image" src="{{ asset('/storage/'.$item->image_url) }}" alt="">
            </div>
            <div class="col-6 d-flex justify-content-center pt-5 flex-column align-items-start">
                <span class="fs-5 fw-bold mb-3">Price: Rp. {{number_format($item->price,2,",",".");}}</span>
                <span class="mb-3">{{$item->item_desc}}</span>
                <a class="btn btn-warning mt-5 w-75" href="">Buy</a>
            </div>
        </div>
    </div>
@endsection
