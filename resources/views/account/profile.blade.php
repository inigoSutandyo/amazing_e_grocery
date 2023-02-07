@extends('template.layout', ['title' => 'Home'])
@section('header')
    <link rel="stylesheet" href="{{ asset('css/account.css') }}">
@endsection
@section('content')
    <div class="p-3">
        <span class="fw-bold fs-2 ms-5">{{__('home.profile')}}</span>
        <div class="row">
            <div class="col-4 d-flex justify-content-end align-items-start mt-3">
                <img src="{{ asset('/storage/'.$account->display_picture_link) }}" class="profile-image" alt="">
            </div>
            <div class="col-8">
                <div class="d-flex justify-content-center">
                    <form class="w-100 form-container px-5 mt-3" enctype="multipart/form-data"
                        action="{{ route('account.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="input-group">
                                <label for="first_name" class="input-group-text">{{ __('form.first_name') }}</label>
                                <input type="text" class="form-control me-4 @error('first_name') is-invalid @enderror"
                                    id="first_name" name="first_name" value="{{ old('first_name', $account->first_name) }}">

                                <label for="last_name" class="input-group-text">{{ __('form.last_name') }}</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                    id="last_name" name="last_name" value="{{ old('last_name', $account->last_name) }}">
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
                                name="email" value="{{ old('email', $account->email) }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="role_id" class="form-label">{{ __('form.role') }}</label>
                            <input type="text" class="form-control" name="role_id" id="role_id" value="{{ old('role_id', $account->roleName) }}" readonly>
                            {{-- <select name="role_id" class="form-select @error('role_id') is-invalid @enderror"
                                id="role_id">
                                <option value="-1">{{ __('form.role') }}</option>
                                <option value="2" {{$account->role_id == 2 ? "selected" : ""}}>User</option>
                                <option value="1" {{$account->role_id == 1 ? "selected" : ""}}>Admin</option>
                            </select> --}}
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
                                                value="1" {{$account->genderDesc == "Male" ? "checked" : ""}}>
                                            <label class="form-check-label" for="male">
                                                {{ __('form.male') }}
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="female" name="gender_id"
                                                value="2" {{$account->genderDesc == "Female" ? "checked" : ""}}>
                                            <label class="form-check-label" for="female">
                                                {{ __('form.female') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div style="flex: 1;">
                                    <label for="display_picture_link"
                                        class="form-label">{{ __('form.display_picture') }}</label>
                                    <input type="file"
                                        class="form-control @error('display_picture_link') is-invalid @enderror"
                                        id="display_picture_link" name="display_picture_link"
                                        value="{{ old('display_picture_link') }}">
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
                                <input type="password" class="form-control me-4 @error('password') is-invalid @enderror"
                                    id="password" name="password">

                                <label for="password_confirmation"
                                    class="input-group-text">{{ __('form.confirm_password') }}</label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" name="password_confirmation">
                            </div>
                            <div>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">{{ __('form.update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
