<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>PHP Word</title>
  </head>
  <body>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <table class="table table-bordered mt-5 table-responsive">
                    <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">creator</th>
                          <th scope="col">depNameEn</th>
                          <th scope="col">depName</th>
                          <th scope="col">toPerson</th>
                          <th scope="col">variableName</th>
                          <th scope="col">signDate</th>
                          <th scope="col">content</th>
                          <th scope="col">thanks</th>
                          <th scope="col">greeting</th>
                          <th scope="col">toDo</th>
                          <th scope="col">attach</th>
                          <th scope="col">signatory</th>
                          <th scope="col">image</th>
                          <th scope="col">position</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                      <tr>
                        <th scope="row">{{ $book->id }}</th>
                        <td>{{ $book->creator }}</td>
                        <td>{{ $book->depNameEn }}</td>
                        <td>{{ $book->depName }}</td>
                        <td>{{ $book->toPerson }}</td>
                        <td>{{ $book->variableName }}</td>
                        <td>{{ $book->signDate }}</td>
                        <td>{{ $book->content }}</td>
                        <td>{{ $book->thanks }}</td>
                        <td>{{ $book->greeting }}</td>
                        <td>{{ $book->toDo }}</td>
                        <td>{{ $book->attach }}</td>
                        <td>{{ $book->signatory }}</td>
                        <td>{{ $book->image }}</td>
                        <td>{{ $book->position }}</td>
                        <td>
                            <a href="{{ url('books/' . $book->id) }}" class="btn btn-sm btn-warning">View</a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
