@extends('layouts.index')
@section('content')
    <h1>Panier</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">TITLE</th>
                <th scope="col">SHOW</th>
                <th scope="col">NUMBER</th>
                <th scope="col">ADD</th>
                <th scope="col">REMOVE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paniers as $panier)
                @php
                    $exist = $books->where("title" , $panier->title)->first();
                @endphp

                <tr valign="middle">
                    <th scope="row">{{$loop->iteration}} / {{$panier->id}}</th>
                    <td>{{$panier->title}}</td>
                    <td>@include("frontend.components.modal-for-show")</td>
                    <td>{{$panier->number}}</td>
                    <td>
                        <form action={{route("paniers.addFromPanier" , $panier->id)}} method="POST">
                            @csrf
                            @method("PUT")
                            <button class="btn btn-primary" type="submit">Add</button>
                        </form>
                    </td>
                    <td>
                        <form action={{route("paniers.removeFromPanier" , $panier->id)}} method="POST">
                            @csrf
                            @method("PUT")
                            <button class="btn btn-danger" type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
