<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Book;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::paginate('10');
        return response()->json($books);
    }
}

?>