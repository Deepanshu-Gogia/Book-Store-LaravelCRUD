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

                <div class="card-header">Add Book
                </div>

                <div class="card-body">
                	<form method="POST" action="{{url('store-book')}}">
    				@csrf
					<div class="form-group">
					<label for="title">Title:</label>
					<input type="text" class="form-control" id="title" name="title" required>
					</div>
					<div class="form-group">
					<label for="author">Author:</label>
					<input type="text" class="form-control" id="author" name="author" required>
					</div>
					<div class="form-group">
					<label for="publisher">Publication Date:</label>
					<input type="date" class="form-control" id="publication_date" name="publication_date" required>
					</div>
					<div class="form-group">
					<label for="description">Description:</label>
					<textarea class="form-control" id="description" name="description" required></textarea>
					</div>
					<div class="form-group">
					<label for="isbn">ISBN:</label>
					<input type="number" class="form-control" id="isbn" name="isbn" required>
					</div>
					<div class="form-group">
					<label for="price">Price:</label>
					<input type="number" class="form-control" id="price" name="price" required>
					</div>
					<button type="submit" class="btn btn-primary">Add Book</button>
				</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
