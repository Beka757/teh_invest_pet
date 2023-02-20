@extends('layout.app')
@section('content')
    <h3 class="me-3">Книги</h3>
    <br>
    <table class="table table-striped border">
        <thead>
        <tr>
            <th scope="col">Наименование</th>
            <th scope="col">Автор</th>
            <th scope="col">Количество страниц</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->name }}</td>
                <td>{{ $book->author->name }}</td>
                <td>{{ $book->page_count }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row justify-content-md-center p-5">
        <div class="col-md-auto">
            {{ $books->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
