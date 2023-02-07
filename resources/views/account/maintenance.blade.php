@extends('template.layout', ['title' => 'Home'])
@section('header')
@endsection
@section('content')
    <div class="p-3 mt-2 d-flex justify-content-center">
        <table class="table table-bordered table-hover w-50">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="d-flex w-100 justify-content-center">
                            {{__('account.account')}}
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex w-100 justify-content-center">
                            {{__('account.action')}}
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td>
                            <div class="d-flex w-100 justify-content-center">
                                {{$account->first_name . ' ' . $account->last_name . ' - ' . $account->roleName}}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex w-100 justify-content-center">
                                <a class="btn btn-warning mx-2" href="{{ route('account.role', ['id'=>$account->account_id]) }}">{{__('account.update_role')}}</a>

                                <a class="btn btn-danger mx-2" href="{{ route('account.delete', ['id'=>$account->account_id]) }}">{{__('account.delete')}}</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
