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
                <a href="/course"><img src="{{asset('image/Vector.png')}}" width="30px" class="ms-n1" alt="nav"></a>
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
                        <a href="/coursedetail/{{$course->id_course}}" class="nav_sub_link bg-secondary">
                            <h6 class="nav_name py-2">Summary</h6>
                        </a>
                        <a href="/coursecontent/{{$course->id_course}}" class="nav_sub_link bg-secondary">
                            <h6 class="nav_name py-2"><span class="iconify me-2" data-icon="material-symbols:circle" style="color: white;" data-width="15" data-height="15"></span> Content</h6>
                        </a>
                        <a href="/coursetest/{{$course->id_course}}" class="nav_sub_link bg-secondary">
                            <h6 class="nav_name py-2"><span class="iconify me-2" data-icon="material-symbols:circle" style="color: white;" data-width="15" data-height="15"></span> Test</h6>
                        </a>
                        <a href="/result/{{$course->id_course}}" class="nav_sub_link bg-primary">
                            <h6 class="nav_name py-2"><span class="iconify me-2" data-icon="material-symbols:circle" style="color: white;" data-width="15" data-height="15"></span> Results</h6>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="py-3">
            <div class="px-3">
                <h3 style="font-weight: 500">Result</h3>
                <hr style="height:2px;border-width:5;color:black;background-color:black; width: 100%">
                <table class="table table-sm table-bordered table-striped px-3">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Date</th>
                            <th>Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($results) > 0)
                        @foreach ($results as $result)
                        <tr>
                            <td>{{ $user->name }} ({{ $user->email }})</td>
                            <td>{{ $result->created_at}}</td>
                            <td>{{ $result->result }}/10</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">no_entries_in_table</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            @if (count($results) > 0)
            <div class="py-2">
                <h3 style="font-weight: 500">Answer Key</h3>
                <hr style="height:2px;border-width:5;color:black;background-color:black; width: 100%">
            </div>
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
                            <strong>Answer: {{$question->answer}}</strong><br>
                            <strong>Explanation: {{$question->answer_explanation}}</strong>
                        </div>
                        <?php $i++; ?>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            @endif
            <!--Container pilihan ganda-->
            <div class="py-2">
                <hr style="height:2px;border-width:5;color:black;background-color:black; width: 100%">
            </div>

        </div>
        <!--Container Main end-->
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript' src='user.js'></script>


    </body>

</html>