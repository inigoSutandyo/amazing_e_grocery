@extends('template.layout', ['title' => 'Home'])
@section('header')

@endsection
@section('content')
    <div class="p-3 d-flex justify-content-center fs-4 align-items-center" style="min-height: 320px">
        {{__('home.welcome')}}
    </div>
@endsection
