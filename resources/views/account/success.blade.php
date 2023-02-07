@extends('template.layout', ['title' => 'Home'])
@section('header')

@endsection
@section('content')
<div class="d-flex w-100 justify-content-center p-5 flex-column align-items-center">
    <span class="fs-2 fw-bold">{{__('account.success')}}</span>
    <div class="mt-2 fs-6">
        {{__('account.message')}}
    </div>
    <div>
        <a href="{{ route('home', ['locale' => app()->getLocale()]) }}">
            {{__('home.home')}}
        </a>
    </div>
</div>
@endsection
