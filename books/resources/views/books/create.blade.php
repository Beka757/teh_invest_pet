@extends('layout.app')

@section('content')
    <h1>Добавление новой книги</h1>
    <form enctype="multipart/form-data" method="post" action="{{ route('books.store') }}">
        @csrf
        <div class="form-group">
            @if ($errors->has('name'))
                <label for="name">Наименование</label>
                <input style="border-color: red" type="text" class="form-control" id="name" name="name">
                <span class="help-block text-danger">{{ $errors->first('name') }}</span>
            @else
                <label for="name">Наименование</label>
                <input type="text" class="form-control" id="name" name="name">
            @endif
        </div>
        <div class="form-group">
            @if ($errors->has('page_count'))
                <label for="page_count">Количество страниц</label>
                <input style="border-color: red" type="number" class="form-control" id="page_count" name="page_count">
                <span class="help-block text-danger">{{ $errors->first('page_count') }}</span>
            @else
                <label for="page_count">Количество страниц</label>
                <input type="number" class="form-control" id="page_count" name="page_count">
            @endif
        </div>
        <div class="form-group">
            @if ($errors->has('description'))
                <label for="description">Описание</label>
                <textarea style="border-color: red" class="form-control" id="description" name="description"></textarea>
                <span class="help-block text-danger">{{ $errors->first('description') }}</span>
            @else
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            @endif
        </div>
        <div class="form-group">
            <label for="author_id" class="form-label">Автор</label>
            <select id="author_id" class="form-select" aria-label="Default select example" name="author_id">
                @foreach($authors as $author)
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection
