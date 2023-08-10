<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#show{{ $book->id }}">
    INFO
</button>

<!-- Modal -->
<div class="modal fade" id="show{{ $book->id }}" tabindex="-1" aria-labelledby="show{{ $book->id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="show{{ $book->id }}Label">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card" style="width: 18rem;">
                    <img src={{$book->img}} class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$book->title}}</h5>
                        <p class="card-text">{{$book->resume}}</p>
                        <p class="card-text">Price : {{$book->price}} £ / Stock : {{$book->stock}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
