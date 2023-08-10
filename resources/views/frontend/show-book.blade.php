@extends('layouts.index')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
            <img src={{ $book->img }} class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">{{ $book->title }}</h5>
                <p class="card-text">{{ $book->resume }}</p>
                <p class="card-text">Price : {{ $book->price }} £ / Stock : {{ $book->stock }}</p>
                @if ($book->stock > 0)
                    <form action={{ route('paniers.addFromBook', $book->id) }} method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-success" type="submit">Add to panier</button>
                    </form>
                    @if ($exist)
                        <form action={{ route('paniers.removeFromBook', $book->id) }} method="POST">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-danger" type="submit">Remove from panier</button>
                        </form>
                    @endif
                @else
                    <form action={{ route('paniers.removeFromBook', $book->id) }} method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-danger" type="submit">Remove from panier</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
