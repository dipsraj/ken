<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $msg = $request->session()->get('message');
        $request->session()->forget('message');
        $books = Book::all();
        return view('books.index')->with('msg',$msg)->with('books',$books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $msg = $request->session()->get('message');
        $request->session()->forget('message');
        return view('books.insert')->with('msg',$msg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $input = Input::all();

        $book = new Book;
        $book->book_name = $input['book_name'];
        $book->book_author = $input['book_author'];
        $book->book_pages = $input['book_pages'];
        $book->book_price = $input['book_price'];
        $book->book_category = $input['book_category'];
        $book->book_code = $input['book_code'];
        $book->save();

        session(['message' => 'Book Inserted Successfully.']);

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        $msg = $request->session()->get('message');
        $request->session()->forget('message');
        $book = Book::find($id);
        return view('books.show')->with('book',$book)->with('id',$id)->with('msg',$msg);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $msg = $request->session()->get('message');
        $request->session()->forget('message');
        $book = Book::find($id);
        if($book==null){
            return abort(404 , 'Book Not Found.');
        }
        return view('books.edit')->with('msg',$msg)->with('book',$book)->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $book = Book::find($id);
        if($book==null){
            return abort(404 , 'Book Not Found.');
        }
        else{
            $input = Input::all();
            $book->book_name = $input['book_name'];
            $book->book_author = $input['book_author'];
            $book->book_pages = $input['book_pages'];
            $book->book_price = $input['book_price'];
            $book->book_category = $input['book_category'];
            $book->book_code = $input['book_code'];
            $book->save();
            session(['message' => 'Book Details Updated Successfully.']);
            return redirect('/book/'.$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if($book==null){
            return abort(404,'Book Not Found.');
        }
        else{
            $book->delete();

            session(['message' => 'Book Deleted Successfully.']);

            return redirect('/books');
        }
    }
}
