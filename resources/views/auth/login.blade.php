@extends('template.layout', ['title' => 'Login'])
@section('header')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection
@section('content')
<span class="mt-4 fs-2 d-flex w-100 justify-content-center fw-bold">
    {{ __('form.login') }}
</span>
<div class="d-flex justify-content-center">
    <form class="w-50 form-container p-5 mt-2">
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('form.email') }}</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{ __('form.password') }}</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary w-100">{{__('form.login')}}</button>
    </form>
</div>
@endsection
