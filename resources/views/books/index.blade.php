<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <!-- include summernote css/js -->
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
      <title>PHP Word</title>
  </head>
  <body>
    <div class="container">
        <div class="mt-5">
            <a href="{{ url('/books/create') }}" class="btn bg-primary pull-right text-white">
                <i class="fa fa-pencil"></i> أضافة كتاب
            </a>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="">
                <table class="table table-bordered mt-5 mb-5 table-responsive text-center">
                    <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">creator</th>
                          <th scope="col">depNameEn</th>
                          <th scope="col">depName</th>
                          <th scope="col">toPerson</th>
                          <th scope="col">variableName</th>
                          <th scope="col">signDate</th>
                          <th scope="col">الاجراء</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                      <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->creator }}</td>
                        <td>{{ $book->depNameEn }}</td>
                        <td>{{ $book->depName }}</td>
                        <td>{{ $book->toPerson }}</td>
                        <td>{{ $book->variableName }}</td>
                        <td>{{ $book->signDate }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-sm btn-warning text-white" href="{{ url('book/' . $book->id) }}">عرض</a>
                                <a class="btn btn-sm bg-success text-white mx-1" href="{{ url('book/edit/' . $book->id) }}">تعديل</a>
                                <a class="btn btn-sm bg-danger text-white delete" href="{{ url('book/delete/' . $book->id) }}">حذف</a>
                            </div>
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
    <!-- include summernote js -->
{{--    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>--}}

{{--    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>--}}

  </body>
</html>
