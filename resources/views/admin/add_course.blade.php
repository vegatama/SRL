<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Course</title>

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
                <a href="/home-admin"><img src="image/Vector.png" width="30px" class="ms-n1" alt="nav" ></a>
                <img src="image/logo.png" width="85px" class="ms-4" alt="logo">               
            </div>
        </header>

    <!-- Form add course -->
    <section>
        <div class="text-center my-4 py-3">
            <h2>Add Course</h2>
        </div>
    </section>

    <section>
        <div class="container my-4">
            <form  class="signin_form" method="post" action="{{route('store_course')}}">
                @csrf
                <!-- Subject -->
                <div class="mb-3">
                    <label for="kode_barang" class="form-label">Subject</label>
                    <input type="text" class="form-control" name="subject" required>
                </div>
                <!-- Title -->
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <!-- Hours -->
                <div class="mb-3">
                    <label for="kuantitas" class="form-label">Hours</label>
                    <input type="text" class="form-control" name="hours" required>
                </div>
                <!-- Button -->
                <div class="py-3">
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="input" class="btn btn-secondary" style="width:150px">Add Course</button>
                    </div>
                </div>
            </form>
        </div>        
    </section>
        </div>
        <!--Container Main end-->
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>          
        <script type='text/javascript' src='user.js'></script>

    </body>

</html>
