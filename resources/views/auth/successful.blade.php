@extends('template.layout', ['title' => 'Success'])
@section('header')
@endsection
@section('content')
    <div class="d-flex w-100 justify-content-center p-5">
        <span class="fs-2 fw-bold">{{__('auth.successful')}}</span>
    </div>
@endsection
