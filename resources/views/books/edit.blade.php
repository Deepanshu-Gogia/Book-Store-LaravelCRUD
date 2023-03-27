@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a class="btn align-items-right" href="{{url('books')}}">Go to Books Listing</a>
            <div class="card">
                @if (session('status'))
               <div class="alert alert-success" role="alert">
                   {{ session('status') }}
               </div>
               @endif 

               @if (session('error'))
               <div class="alert alert-danger" role="alert">
                   {{ session('error') }}
               </div>
               @endif 
               @if ($errors->any()) @foreach ($errors->all() as $error)
               <div class="alert alert-danger" role="alert">
                   {{ $error }}
               </div>
               @endforeach @endif

                <div class="card-header">Edit Book
                </div>

                <div class="card-body">
                    @foreach($books as $book)
                    <form method="POST" action="{{url('update-book',$book->id)}}">
    @csrf

    <input type="hidden" name="id" value="{{ $book->id }}">

    <div>
        <label for="title">Title:</label>
        <input class="form-control" type="text" name="title" value="{{ $book->title }}" required>
    </div>

    <div>
        <label for="author">Author:</label>
        <input class="form-control" type="text" name="author" value="{{ $book->author }}" required>
    </div>

    <div>
        <label for="publication_date">Publication Date:</label>
        <input class="form-control" type="date" name="publication_date" value="{{ $book->publication_date }}" required>
    </div>

    <div>
        <label for="description">Description:</label>
        <textarea class="form-control" name="description" required>{{ $book->description }}</textarea>
    </div>

    <div>
        <label for="isbn">ISBN:</label>
        <input class="form-control" type="text" name="isbn" value="{{ $book->isbn }}" required>
    </div>

    <div>
        <label for="price">Price:</label>
        <input class="form-control" type="number" name="price" value="{{ $book->price }}" required>
    </div>

    <button type="submit">Save Changes</button>
</form>
@endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
