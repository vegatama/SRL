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


<body classname='snippet-body' class="body-pd">

    <body id="body-pd">

        <header class="header body-pd bg-primary" id="header">
            <div class="header_toggle ">
                <img src="image/navmenu.png" width="30px" class="ms-n1" alt="nav">
                <img src="image/logo.png" width="85px" class="ms-4" alt="logo">
            </div>
            <div class="nav-item dropdown py-3 align-items-center">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
                    <span class="iconify" data-icon="clarity:avatar-line" data-width="30" data-height="30" style="color: white"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item link account" href="{{ route('account_admin') }}">
                            <span class="iconify" data-icon="mdi:user-outline" style="color: black;" data-width="35" data-height="35"></span>
                            <h7 class="text-black">Profile</h7>
                        </a></li>
                    <li><a class="dropdown-item" href="{{ route('logout_action') }}">
                            <span class="iconify" data-icon="mdi:user-outline" style="color: black;" data-width="35" data-height="35"></span>
                            <h7 class="text-black">Logout</h7>
                        </a></li>
                </ul>
            </div>
        </header>
        <div class="l-navbar show" id="nav-bar">
            <nav class="nav pt-2">
                <div class="pt-5">

                    <div class="nav_list">

                        <a href="/home-admin" class="nav_link bg-primary">
                            <h6 class="nav_name py-2">Make Course</h6>
                        </a>
                        <a href="/leaderboard" class="nav_sub_link bg-secondary">
                            <h6 class="nav_name py-2">Leaderboard</h6>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="py-3">
            <div class="container m-3 mt-5">
                <div class="row mx-auto mt-5 pb-5 text-center">
                    <h3 style="font-weight: 600" class="mt-5">Select a Course</h3>
                </div>
                <div class="row">
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between w-50 p-3" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                </div>
                <div class="py-3">
                    <div class="d-flex justify-content-left">
                        <a href="/add_course" class="btn btn-secondary" style="width:150px">Add Course</a>
                    </div>
                </div>

                <?php foreach ($subject as $elements) : ?>
                    <h3><?php echo $elements->subject ?></h3>
                    <hr style="height:2px;border-width:5;color:black;background-color:black; width: 100%">
                    <div class="row m-auto" style="grid-auto-flow: row">
                        <?php foreach ($courses as $course) : ?>
                            <?php if ($course->subject == $elements->subject) : ?>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <a class="card">
                                        <h5 class="card-header d-flex justify-content-between align-items-center">
                                            <?php echo $course->subject ?>
                                            <div class="col-lg-4">
                                                <button onclick="location.href='/edit_course/{{$course->id_course}}'" type="button" class="btn btn-sm btn-warning">Edit</button>
                                                <button onclick="location.href='/delete_course/{{$course->id_course}}'" type="button" class="btn btn-sm btn-danger">Delete</button>
                                            </div>
                                        </h5>
                                        <div class="card-body">
                                            <div class="pb-3">
                                                <span class="iconify" style="color: black !important;" data-icon="ic:outline-watch-later" data-width="20" data-height="20"></span>
                                                <span class="mb-5" style="color: black !important;">Course Hours: <?php echo $course->hours ?></span>
                                            </div>
                                            <h6 style="color: black !important;"><?php echo $course->title ?></h6>
                                            <div class="d-flex justify-content-center">
                                                <button onclick="location.href='/coursedetail-admin/{{$course->id_course}}'" type="button" class="btn btn-sm btn-primary">Content</button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        </div>
        <!--Container Main end-->
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript' src='user.js'></script>

    </body>

</html>