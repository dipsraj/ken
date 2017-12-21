<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    public function insert(){
        $book = new Book;
        $book->book_name = 'Sample Book';
        $book->book_author = 'Sample Author';
        $book->book_pages = 121;
        $book->book_price = 100;
        $book->book_category = 'Novel';
        $book->book_code = 'SBN010012ZX';
        $book->save();
    }

    public function delete($bid){

        $book = Book::find($bid);
        if($book==null){
            return abort(404);
        }
        else{
            $book->delete();
            echo "Book deleted...";
        }
    }

}
