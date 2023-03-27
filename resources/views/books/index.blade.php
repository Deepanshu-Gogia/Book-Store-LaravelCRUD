@extends('layouts.app')
<style type="text/css">
	.hidden{
		display: none;
	}
</style>
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<a class="btn align-items-right" href="{{url('create-book')}}">Go to Add Book</a>
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

                <div class="card-header">Book Store
                </div>

                <div class="card-body">
                    <table class="table">
		<thead>
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th>Author</th>
				<th>Price</th>
				<th>Isbn</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
									<?php $sno=1; $myid=0; ?>      
                @foreach($books as $value)   
                <?php $myid++; ?>

									<tr>
										<td>{{ $value->title }}</td>
										<td>{{ $value->description }}</td>
										<td>{{ $value->author }}</td>
										<td>{{ $value->price }}</td>
										<td>{{ $value->isbn }}</td>
										<td><a class="btn btn-alt-outline-primary btn-sm" href='{{url("edit-book",$value->id)}}'>Edit</a>
											<a class="btn btn-alt-outline-dark btn-sm" href='{{url("destroy-book",$value->id)}}'>Delete</a>
										</td>
									</tr>
									
								@endforeach
								</tbody>
	</table>
	<div class="d-flex justify-content-center">
    {!! $books->links() !!}
    <p>Note: Pagination is applied on 2 products because of low product count.</p>
	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
