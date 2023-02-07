@extends('template.layout', ['title' => 'Register   '])
@section('header')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection
@section('content')
    <span class="mt-4 fs-2 d-flex w-100 justify-content-center fw-bold">
        {{ __('form.register') }}
    </span>
    <div class="d-flex justify-content-center">
        <form class="w-50 form-container p-5 mt-2" enctype="multipart/form-data" action="{{ route('register-validate') }}"
            method="POST">
            @csrf
            <div class="mb-3">
                <div class="input-group">
                    <label for="first_name" class="input-group-text">{{ __('form.first_name') }}</label>
                    <input type="text" class="form-control me-4 @error('first_name') is-invalid @enderror"
                        id="first_name" name="first_name">

                    <label for="last_name" class="input-group-text">{{ __('form.last_name') }}</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                        name="last_name">
                </div>
                <div>
                    @error('first_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @error('last_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('form.email') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role_id" class="form-label">{{ __('form.role') }}</label>
                <select name="role_id" class="form-select @error('role_id') is-invalid @enderror" id="role_id">
                    <option value="-1">{{ __('form.role') }}</option>
                    <option value="2">User</option>
                    <option value="1">Admin</option>
                </select>
                @error('role_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="w-100 mb-3">
                <div class="input-group w-100">
                    <div class="me-3">
                        <label class="form-label">{{ __('form.gender') }}</label>
                        <div class="d-flex">
                            <div class="form-check me-2">
                                <input class="form-check-input" type="radio" id="male" name="gender_id"
                                    value="1">
                                <label class="form-check-label" for="male">
                                    {{ __('form.male') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="female" name="gender_id"
                                    value="2">
                                <label class="form-check-label" for="female">
                                    {{ __('form.female') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div style="flex: 1;">
                        <label for="display_picture_link" class="form-label">{{ __('form.display_picture') }}</label>
                        <input type="file" class="form-control @error('display_picture_link') is-invalid @enderror"
                            id="display_picture_link" name="display_picture_link">
                    </div>
                </div>
                <div>
                    @error('gender_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @error('display_picture_link')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <label for="password" class="input-group-text">{{ __('form.password') }}</label>
                    <input type="password" class="form-control me-4 @error('password') is-invalid @enderror" id="password"
                        name="password">

                    <label for="confirm_password" class="input-group-text">{{ __('form.confirm_password') }}</label>
                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror"
                        id="confirm_password" name="confirm_password">
                </div>
                <div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @error('confirm_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">{{ __('form.register') }}</button>
        </form>
    </div>
@endsection
