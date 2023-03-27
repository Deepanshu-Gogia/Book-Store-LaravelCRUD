<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\AddBookRequest;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate('2');

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBookRequest $request)
    {
    $bookData = [
    'title' => $request['title'],
    'author' => $request['author'],
    'publication_date' => $request['publication_date'],
    'description' => $request['description'],
    'price' => $request['price'],
    'isbn' => $request['isbn'],
    ];
    // Create a new Book model instance with the validated data
    $book = new Book($bookData);
    // Save the book to the database
    $book->save();
    $message = 'Book added successfully.';

// Redirect back to the book index page with a success message
return redirect('books')->with('success', $message);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $books = Book::where('id',$id)->select('*')->get();
        return view('books.edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
    $validatedData = $request->validate([
        'title' => 'required|max:100',
        'author' => 'required|max:100',
        'publication_date' => 'required|date',
        'description' => 'required',
        'isbn' => 'required',
        'price' => 'required|numeric',
    ]);

    $bookData = [
    'title' => $validatedData['title'],
    'author' => $validatedData['author'],
    'publication_date' => $validatedData['publication_date'],
    'description' => $validatedData['description'],
    'price' => $validatedData['price'],
    'isbn' => $validatedData['isbn'],
    ];
        // Update an existing book with the new data
    $book = Book::findOrFail($request->id);
    $book->update($bookData);
    $message = 'Book updated successfully.';
    // Redirect back to the book index page with a success message
return redirect('books')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $book = Book::findOrFail($id);
    $book->delete();

    return redirect('books')
                     ->with('success', 'Book has been deleted successfully');
    }
}
