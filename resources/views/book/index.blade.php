@extends('book.layouts')
@section('content')
    <div class="jumbotron container">
        <p class="lead"> Enjoy your time here reading all the books you want.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('book.create') }}" role="button">Create</a>
    </div>

    <div class="container">
         @if ($message = Session::get('success'))
    <div class="alert alert-success " role="alert">
            {{ $message }}
        </div>
       @endif
    </div>

    <div class= "container">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">name</th>
                    <th scope="col">author name</th>
                    <th scope="col">page number</th>
                    <th scope="col" style="width: 30%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($books as $item)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->author_name }}</td>
                        <td>{{ $item->page_num }}</td>
                        <td>
                            <div class="row">
                                <div class="col-sm">
                                    <a class="btn btn-success" href="{{ route('book.edit', $item->id) }}">Edit</a>
                                </div>
                                <div class="col-sm">
                                    <a class="btn btn-primary" href="{{ route('book.show', $item->id) }}">Show</a>
                                </div>
                                <div class="col-sm">
                                    <form action="{{ route('book.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>


                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $books->links() }}
    </div>
@endsection
