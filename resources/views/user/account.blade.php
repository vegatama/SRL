<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <style>
        /* body {
                font-family: 'Nunito', sans-serif;
            } */
    </style>
</head>


<body classname='snippet-body' class="body-px">

    <body id="body-px">

        <header class="header body-pd bg-primary" id="header">
            <div class="header_toggle ">
                <a href="/home"><img src="image/Vector.png" width="30px" class="ms-n1" alt="nav"></a>
                <img src="image/logo.png" width="85px" class="ms-4" alt="logo">
            </div>
        </header>
        <!--Container Main start--> 
        <div class="py-5">
            <div class="container m-3 mt-5">
                <div class="col me-5 pe-5 d-flex align-items-center justify-content-center">
                    <div class="card mb-4 px-3">
                        <div class="card-body text-center">
                            <a href="#">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            </a>
                            <h5 class="my-3">{{Auth::user()->name}}</h5>
                            <p class="text-muted mb-1">{{Auth::user()->level}}</p>
                        </div>
                    </div>
                    <div class="px-3">
                        <hr style="border:none; border-right:1px solid hsla(200, 10%, 50%,100); height:50vh; width:4px;">
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <form action="{{route('update_account') }}" method="post" class="signin_form">
                                <div class="card-body">
                                @auth
                                @method("put")
                                @csrf
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0" for="name">Username</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <input type="text" class="form-control rounded-pill"
                                                    value="{{ old('name', Auth::user()->name) }}" name="name" required>
                                                    @error('name')
                                                        <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <input type="text" class="form-control rounded-pill"
                                                    value="{{ old('full_name', Auth::user()->full_name) }}" name="full_name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <input type="text" class="form-control rounded-pill"
                                                    value="{{ old('email', Auth::user()->email) }}" name="email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <input type="text" class="form-control rounded-pill"
                                                    value="{{ old('contact_number', Auth::user()->contact_number) }}" name="contact_number" required>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                        <div class="form-group">
                                                <input type="text" class="form-control rounded-pill"
                                                    value="{{ old('address', Auth::user()->address) }}" name="address" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endauth
                                <div class="d-flex justify-content-center mb-3 mt-4">
                                <button type="submit"
                                    class="px-5 btn btn-primary submit rounded-pill">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Container Main end-->
                <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
                <script type='text/javascript' src='user.js'></script>
    </body>

</html>