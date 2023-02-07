@extends('template.layout', ['title' => 'Register   '])
@section('header')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection
@section('content')

    <span class="mt-4 fs-2 d-flex w-100 justify-content-center fw-bold">
        {{ __('form.register') }}
    </span>
    <div class="d-flex justify-content-center">
        <form class="w-50 form-container p-5 mt-2">
            <div class="input-group mb-3">
                <label for="first_name" class="input-group-text">{{ __('form.first_name') }}</label>
                <input type="text" class="form-control me-4" id="first_name" name="first_name">

                <label for="last_name" class="input-group-text">{{ __('form.last_name') }}</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('form.email') }}</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">{{ __('form.role') }}</label>
                <select name="role" class="form-select" id="role">
                    <option value="2">User</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <div class="input-group w-100 mb-3">
                <div class="me-3">
                    <label class="form-label">Gender</label>
                    <div class="d-flex">
                        <div class="form-check me-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="male" name="male">
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="female" name="female">
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                    </div>
                </div>
                <div style="flex: 1;">
                    <label for="display_picture" class="form-label">{{ __('form.display_picture') }}</label>
                    <input type="file" class="form-control" id="display_picture" name="display_picture">
                </div>
            </div>
            <div class="input-group mb-3">
                <label for="password" class="input-group-text">{{ __('form.password') }}</label>
                <input type="password" class="form-control me-4" id="password" name="password">

                <label for="confirm_password" class="input-group-text">{{ __('form.confirm_password') }}</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
