<?php

namespace App\Http\Controllers;

use http\Exception;
use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Input;

class BooksController extends Controller
{
    public function insertBookForm(Request $request){
        $msg = $request->session()->get('message');
        $request->session()->forget('message');
        return view('pages.insert')->with('msg',$msg);

    }

    public function insertBook(){

        $input = Input::all();

        $book = new Book;
        $book->book_name = $input['book_name'];
        $book->book_author = $input['book_author'];
        $book->book_pages = $input['book_pages'];
        $book->book_price = $input['book_price'];
        $book->book_category = $input['book_category'];
        $book->book_code = $input['book_code'];
        $book->save();

        session(['message' => 'Book Inserted Successfully']);

        return redirect('/insert/book');
    }

    public function delete($bid){

        $book = Book::find($bid);
        if($book==null){
            return abort(404,'Book Not Found.');
        }
        else{
            $book->delete();
            echo "Book deleted...";
        }
    }

    public function edit($bid){

        $book = Book::find($bid);
        if($book==null){
            return abort(404 , 'Book Not Found.');
        }
        else{
            $book->book_name = 'New Book';
            $book->save();
            echo "Book Edited...";
        }
    }

}
