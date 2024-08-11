<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Domain-Course</title>

    <!-- Fonts -->
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css')}}" rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">
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
                <a href="/home-admin"><img src="{{asset('image/Vector.png')}}" width="30px" class="ms-n1" alt="nav"></a>
                <img src="{{asset('image/logo.png')}}" width="85px" class="ms-4" alt="logo">
            </div>
            <div class="nav-item dropdown py-3 align-items-center">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">
                    <span class="iconify" data-icon="clarity:avatar-line" data-width="30" data-height="30" style="color: white"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item link account" href="{{ route('account') }}">
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
                        <a href="/coursedetail-admin/{{$course->id_course}}" class="nav_sub_link bg-secondary">
                            <h6 class="nav_name py-2">Summary</h6>
                        </a>
                        <a href="/edit_video/{{$course->id_course}}" class="nav_sub_link bg-secondary">
                            <h6 class="nav_name py-2"><span class="iconify me-2" data-icon="material-symbols:circle" style="color: white;" data-width="15" data-height="15"></span> Video</h6>
                        </a>
                        <a href="/edit_audio/{{$course->id_course}}" class="nav_sub_link bg-secondary">
                            <h6 class="nav_name py-2"><span class="iconify me-2" data-icon="material-symbols:circle" style="color: white;" data-width="15" data-height="15"></span> Audio</h6>
                        </a>
                        <a href="/edit_text/{{$course->id_course}}" class="nav_sub_link bg-secondary">
                            <h6 class="nav_name py-2"><span class="iconify me-2" data-icon="material-symbols:circle" style="color: white;" data-width="15" data-height="15"></span> Text</h6>
                        </a>
                        <a href="/test_admin/{{$course->id_course}}" class="nav_sub_link bg-primary">
                            <h6 class="nav_name py-2"><span class="iconify me-2" data-icon="material-symbols:circle" style="color: white;" data-width="15" data-height="15"></span> Test</h6>
                        </a>
                        <a href="/results_admin/{{$course->id_course}}" class="nav_sub_link bg-secondary">
                            <h6 class="nav_name py-2">Results</h6>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="py-3">
            <div class="container m-3 mt-5">
                <div class="row w-75">
                    <div class="card border-secondary">
                        <div class="card-body px-5">
                            <div class="row ">
                                <form method="post" enctype="multipart/form-data" action="{{route('store_test')}}">
                                    @csrf
                                    <!-- id -->
                                    <input class="form-control" type="hidden" name="id_course" id="id_course" value="{{$course->id_course}}">
                                    <!-- test upload -->
                                    <h3 style="font-weight: 500">Upload Test</h3>
                                    <div class="col py-3">
                                        <input class="form-control" type="file" name="file" id="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                    </div>
                                    <div class="col py-3">
                                        <button type="submit" name="input" class="btn btn-primary text-white">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="height:2px;border-width:5;color:black;background-color:black; width: 100%">

            <div class="container m-3 mt-5">
                <div class="row">
                    <div class="container d-flex justify-content-center">
                        @if(count($questions) > 0)
                        <div class="card border-secondary" style="width: 70rem;">
                            <div class="card-body">
                                <?php $i = 1; ?>
                                @foreach($questions as $question)
                                @if ($i > 1)
                                <hr /> @endif
                                <div class="mb-3 py-3">
                                    <strong>Question {{ $i }}.<br />{{$question->question_text}}</strong>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="row">
                                                <div class="d-inline-flex p-2">
                                                    <div class="flex justify-start w-full items-center">
                                                        <input id="question-353-0" type="radio" name="question0" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 mt-[4px]" value="Margon Stan">
                                                        <label for="question-353-0" class="ml-2 w-full flex justify-start items-center hover:bg-gray-100 rounded-sm h-8 text-sm font-medium text-gray-900 mt-[1px] cursor-pointer">
                                                            <span class="text-[15px] ml-2">{{$question->option1}}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="d-inline-flex p-2">
                                                    <div class="flex justify-start w-full items-center">
                                                        <input id="question-354-1" type="radio" name="question0" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 mt-[4px]" value="Taylor Otwell">
                                                        <label for="question-354-1" class="ml-2 w-full flex justify-start items-center hover:bg-gray-100 rounded-sm h-8 text-sm font-medium text-gray-900 mt-[1px] cursor-pointer">
                                                            <span class="text-[15px] ml-2">{{$question->option2}}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="row">
                                                <div class="d-inline-flex p-2">
                                                    <div class="flex justify-start w-full items-center">
                                                        <input id="question-355-2" type="radio" name="question0" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 mt-[4px]" value="Samsy Twig">
                                                        <label for="question-355-2" class="ml-2 w-full flex justify-start items-center hover:bg-gray-100 rounded-sm h-8 text-sm font-medium text-gray-900 mt-[1px] cursor-pointer">
                                                            <span class="text-[15px] ml-2">{{$question->option3}}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="d-inline-flex p-2">
                                                    <div class="flex justify-start w-full items-center">
                                                        <input id="question-356-3" type="radio" name="question0" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 mt-[4px]" value="None of these">
                                                        <label for="question-356-3" class="ml-2 w-full flex justify-start items-center hover:bg-gray-100 rounded-sm h-8 text-sm font-medium text-gray-900 mt-[1px] cursor-pointer">
                                                            <span class="text-[15px] ml-2">{{$question->option4}}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <strong>Answer: {{$question->answer}}</strong>
                                </div>
                                <?php $i++; ?>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    <!--Container pilihan ganda-->
                    <div class="py-2">
                        <hr style="height:2px;border-width:5;color:black;background-color:black; width: 100%">
                    </div>
                </div>
            </div>

        </div>
        <!--Container Main end-->
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript' src='user.js'></script>
        <script>
            $('.datetime').datetimepicker({
                autoclose: true,
                dateFormat: "{{ config('app.date_format_js') }}",
                timeFormat: "hh:mm:ss"
            });
        </script>

    </body>

</html>