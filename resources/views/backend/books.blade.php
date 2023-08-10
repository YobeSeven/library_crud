@extends('layouts.index')
@section('content')
    <h1>Page Books</h1>

    <div class="d-flex justify-content-center align-items-center mb-5">
        @include('backend.components.modal-create')
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">COVER</th>
                <th scope="col">TITLE</th>
                <th scope="col">SHOW</th>
                <th scope="col">UPDATE</th>
                <th scope="col">DELETE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr valign="middle">
                    <th scope="row">{{$book->id}}</th>
                    <td><img src={{$book->img}} alt="" width="50"></td>
                    <td>{{$book->title}}</td>
                    <td>@include("backend.components.modal-show")</td>
                    <td>@include("backend.components.modal-update")</td>
                    <td>
                        <form action={{route("books.destroy" , $book->id)}} method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
