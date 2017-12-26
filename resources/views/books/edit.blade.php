@extends('layouts.master')
<?php $title = 'Edit Book - ' . config('app.name'); ?>
@section('page-title',$title)
@section('custom-internal-css')
    <style>
        html, body {
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }
    </style>
@endsection
@section('content')
    <body>
    @include('inc.navbar')
    @include('inc.messages')
    <div class="jumbotron" style="text-align: center">
        <h1>Edit Book Details</h1>
    </div>
    <div class="flex-center position-ref full-height">
        <div class="container" id="form-container">
            <div class="row">
                <div class="col col-sm-1 col-md-3 col-lg-3"></div>
                <div class="col col-sm-10 col-md-6 col-lg-6">
                    <form action="{{ url('/edit/book/'.$id) }}" method="post">
                        <label>Book Name</label>
                        <input type="text" class="form-control" id="book-name" placeholder="Enter Book Name"
                               name="book_name" value="{{ $book->book_name }}"><br>
                        <label>Author</label>
                        <input type="text" class="form-control" id="book-author" placeholder="Enter Author"
                               name="book_author" value="{{ $book->book_author }}"><br>
                        <label>No. of Pages</label>
                        <input type="text" class="form-control" id="book-pages" placeholder="Enter No of Pages"
                               name="book_pages" value="{{ $book->book_pages }}"><br>
                        <label>Price</label>
                        <input type="text" class="form-control" id="book-price" placeholder="Enter Price"
                               name="book_price" value="{{ $book->book_price }}"><br>
                        <label>Book Category</label>
                        <input type="text" class="form-control" id="book-category" placeholder="Enter Book Category"
                               name="book_category" value="{{ $book->book_category }}"><br>
                        <label>Book Code</label>
                        <input type="text" class="form-control" id="book-code" placeholder="Enter Book Code"
                               name="book_code" value="{{ $book->book_code }}"><br>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
                <div class="col col-sm-1 col-md-3 col-lg-3"></div>
            </div>
        </div>
    </div>
    </body>
@endsection