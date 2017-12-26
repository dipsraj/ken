@extends('layouts.master')
<?php
$user_show = isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email;
$title = 'Dashboard - ' . $user_show;
?>
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

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .links > a:hover {
            color: #da2210;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
@endsection
@section('content')
    <body>
    @include('inc.navbar')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3>Your Inserted Books</h3>
                        @if(count($books) > 0)
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
                                    <?php $id = $book->id ?>
                                    <tr>
                                        <td>{{ $book->book_name }}</td>
                                        <td>{{ $book->book_author }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info"
                                                    onclick="location.href='{{ url('/book/'.$id) }}'">
                                                View
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>You have not inserted any books</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection