<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Include Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <title>PHP Word</title>
</head>

<body>
<div class="container">
    <body class="bg-default">
    <div class="main-content">
        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="card bg-dark border-0" style="box-shadow:
                        0px 2px 10px rgba(0,0,0,0.2),
                        0px 10px 20px rgba(0,0,0,0.3),
                        0px 30px 60px 1px rgba(0,0,0,0.5);
                      border-radius: 8px;">
                        <div class="card-header bg-transparent text-white mx-4">
                            <small style="font-size:16px;">اضافة كتاب</small>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                            </div>
                            <form role="form" name="addBookForm" action="{{ url('book/store') }}" method="post" id="addBookForm">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 shadow"><i class="fa-solid fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow px-2"
                                               style="border-radius:4px 0 0 4px; margin-right:-2px" required name="creator"
                                               id="creator" value=""
                                               oninput="this.setCustomValidity('')" placeholder="creator">
                                    </div>
                                    <small id="creator_err" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 shadow"><i class="fa-solid fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow px-2"
                                               style="border-radius:4px 0 0 4px; margin-right:-2px" required name="depNameEn"
                                               id="depNameEn" value=""
                                               oninput="this.setCustomValidity('')" placeholder="depNameEn">
                                    </div>
                                    <small id="depNameEn_err" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 shadow"><i class="fa-solid fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow px-2"
                                               style="border-radius:4px 0 0 4px; margin-right:-2px" required name="depName"
                                               id="depName" value=""
                                               oninput="this.setCustomValidity('')" placeholder="depName">
                                    </div>
                                    <small id="depName_err" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 shadow"><i class="fa-solid fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow px-2"
                                               style="border-radius:4px 0 0 4px; margin-right:-2px" required name="toPerson"
                                               id="toPerson" value=""
                                               oninput="this.setCustomValidity('')" placeholder="toPerson">
                                    </div>
                                    <small id="toPerson_err" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 shadow"><i class="fa-solid fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow px-2"
                                               style="border-radius:4px 0 0 4px; margin-right:-2px" required name="variableName"
                                               id="variableName" value=""
                                               oninput="this.setCustomValidity('')" placeholder="variableName">
                                    </div>
                                    <small id="variableName_err" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 shadow"><i class="fa-solid fa-user"></i></span>
                                        </div>
                                        <input type="date" class="form-control border-0 shadow px-2"
                                               style="border-radius:4px 0 0 4px; margin-right:-2px" id="signDate" name="signDate" oninput="this.setCustomValidity('')" value="" placeholder="signDate">
                                    </div>
                                    <small id="signDate_err" class="form-text text-danger"></small>
                                </div>
                                <div class="mb-3">
                                    <div class="bg-white border-0 shadow" style="border-radius:4px">
                                        <textarea class="form-control border-0 shadow"
                                                  placeholder="content" id="content" name="content" cols="30"
                                                  rows="10">
                                        </textarea>
                                    </div>
                                    <small id="content_err" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 shadow"><i class="fa-solid fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow px-2"
                                               style="border-radius:4px 0 0 4px; margin-right:-2px" required name="thanks"
                                               id="thanks" value=""
                                               oninput="this.setCustomValidity('')" placeholder="thanks">
                                    </div>
                                    <small id="thanks_err" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 shadow"><i class="fa-solid fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow px-2"
                                               style="border-radius:4px 0 0 4px; margin-right:-2px" required name="greeting"
                                               id="greeting" value=""
                                               oninput="this.setCustomValidity('')" placeholder="greeting">
                                    </div>
                                    <small id="greeting_err" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 shadow"><i class="fa-solid fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow px-2"
                                               style="border-radius:4px 0 0 4px; margin-right:-2px" required name="toDo"
                                               id="toDo" value=""
                                               oninput="this.setCustomValidity('')" placeholder="toDo">
                                    </div>
                                    <small id="toDo_err" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 shadow"><i class="fa-solid fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow px-2"
                                               style="border-radius:4px 0 0 4px; margin-right:-2px" required name="attach"
                                               id="attach" value=""
                                               oninput="this.setCustomValidity('')" placeholder="attach">
                                    </div>
                                    <small id="attach_err" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 shadow"><i class="fa-solid fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow px-2"
                                               style="border-radius:4px 0 0 4px; margin-right:-2px" required name="signatory"
                                               id="signatory" value=""
                                               oninput="this.setCustomValidity('')" placeholder="signatory">
                                    </div>
                                    <small id="signatory_err" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 shadow"><i class="fa-solid fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow px-2"
                                               style="border-radius:4px 0 0 4px; margin-right:-2px" required name="image"
                                               id="image" value=""
                                               oninput="this.setCustomValidity('')" placeholder="image">
                                    </div>
                                    <small id="image_err" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 shadow"><i class="fa-solid fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-0 shadow px-2"
                                               style="border-radius:4px 0 0 4px; margin-right:-2px" required name="position"
                                               id="position" value=""
                                               oninput="this.setCustomValidity('')" placeholder="position">
                                    </div>
                                    <small id="position_err" class="form-text text-danger"></small>
                                </div>
                                <div class="row mt-3 pt-2">
                                    <div class="col">
                                        <button type="submit"
                                                class="col-12 btn-primary btn-block py-2"
                                                style="border-radius:4px">أضافة
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Include Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


{{--    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>--}}
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/balloon/ckeditor.js"></script>--}}

    <script>
        $('#content').summernote({
            placeholder: 'content...',
            tabSize: 2,
            height: 300
        });
    </script>


{{--    <script>--}}
{{--        ClassicEditor--}}
{{--            .create(document.querySelector('#content'), {--}}
{{--                placeholder: 'Your placeholder text goes here...',--}}
{{--            })--}}
{{--            .then(editor => {--}}
{{--                editor.catch(error => {--}}
{{--                    console.error(error);--}}
{{--                });--}}
{{--            });--}}
{{--    </script>--}}



    </body>
</html>






