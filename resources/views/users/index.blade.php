@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{ __('Email') }}</th>
                <th scope="col">{{ __('Name') }}</th>
                <th scope="col">{{ __('Surname') }}</th>
                <th scope="col">{{ __('Phone number') }}</th>
                <th scope="col">{{ __('shop.columns.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->email}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->phone_number}}</td>
                <td>
                    <a href="#">
                        <button class="btn btn-success btn-sm"><i class="far fa-edit"></i>{{ __('shop.button.edit') }}</button>
                    </a>
                    <button class="btn btn-danger btn-sm delete" data-id="{{$user->id}}">
                        <i class="far fa-trash-alt">{{ __('shop.button.delete') }}</i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$users->links()}}
</div>
@endsection

@section('javascript')
const deleteUrl = "{{ url('users') }}/";
const confirmDelete = "{{__('shop.messages.delete_confirm')}}"
@endsection

@section('js-files')
<script src="{{ asset('js/delete.js') }}"></script>
@endsection