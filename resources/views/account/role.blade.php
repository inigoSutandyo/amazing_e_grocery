@extends('template.layout', ['title' => 'Home'])
@section('header')
@endsection
@section('content')
    <div class="px-5 py-3 d-flex justify-content-start w-100">
        <form action="" method="POST" enctype="multipart/form-data" class="w-100">
            @csrf
            <div class="w-100 mb-3">
                <label for="role_id" class="form-label">{{ __('form.role') }}</label>
                <select name="role_id" class="w-50 form-select @error('role_id') is-invalid @enderror" id="role_id">
                    <option value="-1">{{ __('form.role') }}</option>
                    <option value="2" {{$account->role_id == 2 ? "selected" : ""}}>User</option>
                    <option value="1" {{$account->role_id == 1 ? "selected" : ""}}>Admin</option>
                </select>
                @error('role_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="w-50">
                <button type="submit" class="btn btn-primary w-100">{{__('account.update_role')}}</button>
            </div>
        </form>
    </div>
@endsection
