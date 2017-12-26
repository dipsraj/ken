@extends('layouts.master')
<?php $title = 'View Books - ' . config('app.name'); ?>
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
    <?php
    if ($msg != null) {
        echo "<script>";
        echo "
                swal({
                    type: 'success',
                    title: '" . $msg . "'
                }).then((result) => {
                    if (result) {
                        location.href = '/book/" . $id . "'
                    }
                });
            ";
        echo "</script>";
        $msg = null;
    }
    ?>
    <div class="jumbotron" style="text-align: center">
        <h1>{{ $book->book_name }}</h1>
        @if(!Auth::guest())
            @if(Auth::user()->id == $book->user_id)
                <button type="button" class="btn btn-warning"
                        onclick="location.href='{{ url('/edit/book/'.$id) }}'">Edit
                </button>
                <?php $delete_url = '/delete/book/' . $id ?>
                <button type="button" class="btn btn-danger"
                        onclick="return confirmDelete('<?php echo $delete_url ?>')">Delete
                </button>
            @else
                <button type="button" class="btn btn-warning" disabled="">Edit</button>
                <button type="button" class="btn btn-danger" disabled="">Delete</button>
            @endif
        @else
            <button type="button" class="btn btn-warning" disabled="">Edit</button>
            <button type="button" class="btn btn-danger" disabled="">Delete</button>
        @endif
    </div>
    <div class="flex-center">
        <div class="container">
            <div class="well">
                <small>Author</small>
                <h2>{{ $book->book_author }}</h2>
            </div>
            <div class="well">
                <small>No. of Pages</small>
                <h2>{{ $book->book_pages }}</h2>
            </div>
            <div class="well">
                <small>Price</small>
                <h2>{{ $book->book_price }}</h2>
            </div>
            <div class="well">
                <small>Category</small>
                <h2>{{ $book->book_category }}</h2>
            </div>
            <div class="well">
                <small>Book Code</small>
                <h2>{{ $book->book_code }}</h2>
            </div>
            <div class="well">
                <small>Created At</small>
                <h2>{{ $book->created_at }}</h2>
            </div>
            <div class="well">
                <small>Inserted By</small>
                <h2>{{ $book->user->name }}</h2>
            </div>
        </div>
    </div>
    </body>
@endsection
@section('custom-script')
    <script>
        function confirmDelete(url) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    location.href = url;
                }
            })
        }
    </script>
@endsection