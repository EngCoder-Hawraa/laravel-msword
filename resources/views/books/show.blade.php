<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Laravel MS Word</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col">
            <table class="table bg-primary table-bordered mt-5 text-white">
                <thead>
                  <tr>
                    <th scope="col" colspan="2">Book's information</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{ $book->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">creator</th>
                        <td>{{ $book->creator }}</td>
                    </tr>
                    <tr>
                        <th scope="row">depNameEn</th>
                        <td>{{ $book->depNameEn }}</td>
                    </tr>
                    <tr>
                        <th scope="row">depName</th>
                        <td>{{ $book->depName }}</td>
                    </tr>
                    <tr>
                        <th scope="row">toPerson</th>
                        <td>{{ $book->toPerson }}</td>
                    </tr>
                    <tr>
                        <th scope="row">variableName</th>
                        <td>{{ $book->variableName }}</td>
                    </tr>
                    <tr>
                        <th scope="row">signDate</th>
                        <td>{{ $book->signDate }}</td>
                    </tr>
                    <tr>
                        <th scope="row">content</th>
                        <td class="bg-white text-dark">{!! $book->content !!}</td>
                    </tr>
                    <tr>
                        <th scope="row">thanks</th>
                        <td>{{ $book->thanks }}</td>
                    </tr>
                    <tr>
                        <th scope="row">greeting</th>
                        <td>{{ $book->greeting }}</td>
                    </tr>
                    <tr>
                        <th scope="row">toDo</th>
                        <td>{{ $book->toDo }}</td>
                    </tr>
                    <tr>
                        <th scope="row">attach</th>
                        <td>{{ $book->attach }}</td>
                    </tr>
                    <tr>
                        <th scope="row">signatory</th>
                        <td>{{ $book->signatory }}</td>
                    </tr>
                    <tr>
                        <th scope="row">image</th>
                        <td>{{ $book->image }}</td>
                    </tr>
                    <tr>
                        <th scope="row">position</th>
                        <td>{{ $book->position }}</td>
                    </tr>
                    </tbody>
              </table>
            <a href="{{ route('book.wordExport', ['id' => $book->id]) }}" class="btn btn-sm btn-primary mb-5">Export Word</a>

{{--            <a href="{{ url('books/word-export/' . $book->id) }}" class="btn btn-sm btn-primary">Export Word</a>--}}
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
