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
    @php
        if ($msg != null) {
            echo "<script>";
            echo "
                    swal({
                        type: 'success',
                        title: '" . $msg . "'
                    }).then((result) => {
                        if (result) {
                            location.href = '/books'
                        }
                    });
                ";
            echo "</script>";
            $msg = null;
        }
    @endphp
    <div class="flex-center position-ref full-height">
        <div class="container">
            @if(count($books)>0)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Author</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        @php
                            $id = $book->id
                        @endphp
                        <tr>
                            <td>{{ $book->book_name }}</td>
                            <td>{{ $book->book_author }}</td>
                            <td>
                                <button type="button" class="btn btn-info"
                                        onclick="location.href='{{ url('/book/'.$id) }}'">
                                    View
                                </button>
                            </td>
                            @if(!Auth::guest())
                                @if(Auth::user()->id == $book->user_id)
                                    <td>
                                        <button type="button" class="btn btn-warning"
                                                onclick="location.href='{{ url('/edit/book/'.$id) }}'">Edit
                                        </button>
                                    </td>
                                    @php
                                        $delete_url = '/delete/book/' . $id
                                    @endphp
                                    <td>
                                        <button type="button" class="btn btn-danger"
                                                onclick="return confirmDelete('{{ $delete_url }}')">Delete
                                        </button>
                                    </td>
                                @else
                                    <td>
                                        <button type="button" class="btn btn-warning" disabled="">Edit</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" disabled="">Delete</button>
                                    </td>
                                @endif
                            @else
                                <td>
                                    <button type="button" class="btn btn-warning" disabled="">Edit</button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" disabled="">Delete</button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$books->links()}}
            @else
                @php
                    echo "<script>";
                    echo "
                    swal({
                        type: 'error',
                        title: 'No Books Found.'
                    }).then((result) => {
                        if (result) {
                            location.href = '/'
                        }
                    });
                    ";
                    echo "</script>";
                @endphp
            @endif
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