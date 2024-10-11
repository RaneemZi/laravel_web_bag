@extends('book.layouts')
@section('content')

    <div class="container">
        @if ($message = Session::get('fail'))
            <div class="alert alert-danger " role="alert">
                {{ $message }}
            </div>
        @endif
    </div>
    <div class="container" style="padding: 10%">
        <form action="{{ route('book.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Book name</label>
                <input type="text" name="name" class="form-control" placeholder="Write book name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Author name</label>
                <input type="text" name="author_name" class="form-control" placeholder="Write author name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Pages number</label>
                <input type="number" name="page_num" class="form-control" placeholder="Pages number">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>
    </div>
@endsection
