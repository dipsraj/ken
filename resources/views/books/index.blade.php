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
    <?php
    if ($msg != null) {
        echo "<script>";
        echo "
                swal({
                    type: 'success',
                    title: '" . $msg . "'
                });
            ";
        echo "</script>";
    }
    ?>
    <div class="flex-center position-ref full-height">
        <div class="container">
            @if(count($books)>0)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <?php $id = $book->id ?>
                        <tr>
                            <td>{{ $book->book_name }}</td>
                            <td>{{ $book->book_author }}</td>
                            <td>
                                <button type="button" class="btn btn-info" onclick="location.href='{{ url('/book') }}'">
                                    View
                                </button>
                                <button type="button" class="btn btn-warning"
                                        onclick="location.href='{{ url('/edit/book/'.$id) }}'">Edit
                                </button>
                                <?php $delete_url = '/delete/book/'.$id ?>
                                <button type="button" class="btn btn-danger"
                                        onclick="return confirmDelete('<?php echo $delete_url ?>')">Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <?php
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
                ?>
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
                location.href=url;
            }
        })
        }
    </script>
@endsection