<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBooks">
    Create new Book
</button>

<!-- Modal -->
<div class="modal fade" id="createBooks" tabindex="-1" aria-labelledby="createBooksLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createBooksLabel">Create new Book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action={{ route('books.store') }} method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">title of book</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ old('title') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="auteur" class="form-label">auteur of book</label>
                        <input type="text" name="auteur" id="auteur" class="form-control"
                            value="{{ old('auteur') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="resume" class="form-label">resume of book</label>
                        <textarea name="resume" id="resume" cols="30" rows="10" class="form-control" required>
                            {{ old('resume') }}
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">img of book</label>
                        <input type="url" name="img" id="img" class="form-control"
                            value="{{ old('img') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">price of book</label>
                        <input type="number" name="price" id="price" min="0" class="form-control"
                            value="{{ old('price') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">stock</label>
                        <input type="number" name="stock" id="stock" min="0" class="form-control"
                            value="{{ old('stock') }}" required>
                    </div>
                    <button class="btn btn-primary" type="submit">Create new book</button>
                </form>
            </div>
        </div>
    </div>
</div>
