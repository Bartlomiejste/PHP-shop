@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Numer telefonu</th>
                <th scope="col">Akcje</th>
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
                        <button class="btn btn-success btn-sm"><i class="far fa-edit"></i>Edit</button>
                    </a>
                    <button class="btn btn-danger btn-sm delete" data-id="{{$user->id}}">
                        <i class="far fa-trash-alt">Delete</i>
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
<script>
    $(function() {
        $('.delete').click(function() {
            $.ajax({
                    method: "DELETE",
                    url: "http://localhost/users/" + $(this).data("id"),
                })
                .done(function(response) {
                    window.location.reload();
                    console.log("usunięto");
                })
                .fail(function(response) {
                    console.log("error");
                })
        })
    });
</script>
@endsection