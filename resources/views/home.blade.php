@extends('layouts.index')
@section('content')
    <h1 class="text-danger">Hello home</h1>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($last_three_books as $book)
                <div class="carousel-item {{$last_three_books[0] === $book ? "active" : ""}}" data-bs-interval="2000">
                    <img src={{$book->img}} class="d-block w-100 object-fit-cover" alt="..." height="600">
                    <div class="carousel-caption d-none d-md-block">
                        <a href={{route("books.showFrontEnd" , $book->id)}}>
                            <h5>Show Book</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    @foreach ($books as $book)
        <h2>{{$book->title}}</h2>
        <a href={{route("books.showFrontEnd" , $book->id)}}>
            show book
        </a>
    @endforeach
@endsection
