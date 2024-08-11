<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test</title>

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


<body classname='snippet-body' class="body-px">

    <body id="body-px">

        <header class="header body-pd bg-primary" id="header">
            <div class="header_toggle ">
                <a href="/coursetest/{{$course->id_course}}"><img src="{{asset('image/Vector.png')}}" width="30px" class="ms-n1" alt="nav"></a>
                <img src="{{asset('image/logo.png')}}" width="85px" class="ms-4" alt="logo">
            </div>
            <h5 class="text-white" id="timer"></h5>
        </header>
        <!--Container Main start-->
        <div class="p-2">
            <form method="post" action="{{route('store_test_result')}}">
                @csrf
                <div class="container m-3 mt-5">
                    <div class="row">
                        <hr style="height:2px;border-width:5;color:black;background-color:black; width: 100%">
                        <div class="container d-flex justify-content-center">
                            <!-- id -->
                            <input class="form-control" type="hidden" name="id_course" id="id_course" value="{{$course->id_course}}">
                            @if(count($questions) > 0)
                            <div class="card border-secondary" style="width: 70rem;">
                                <div class="card-body">
                                    <?php $i = 1; ?>
                                    @foreach($questions as $question)
                                    @if ($i > 1)
                                    <hr /> @endif
                                    <input type="hidden" name="questions[{{ $i }}]" value="{{ $question->id }}">
                                    <input type="hidden" name="correct_answer[{{ $question->id }}]" value="{{$question->answer}}">
                                    <div class="mb-3 py-3">
                                        <strong>Question {{ $i }}.<br />{{$question->question_text}}</strong>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="row">
                                                    <div class="d-inline-flex p-2">
                                                        <div class="flex justify-start w-full items-center">
                                                            <input id="option1" type="radio" name="answers[{{ $question->id }}]" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 mt-[4px]" value="{{$question->option1}}">
                                                            <label for="option1" class="ml-2 w-full flex justify-start items-center hover:bg-gray-100 rounded-sm h-8 text-sm font-medium text-gray-900 mt-[1px] cursor-pointer">
                                                                <span class="text-[15px] ml-2">{{$question->option1}}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="d-inline-flex p-2">
                                                        <div class="flex justify-start w-full items-center">
                                                            <input id="option2" type="radio" name="answers[{{ $question->id }}]" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 mt-[4px]" value="{{$question->option2}}">
                                                            <label for="option2" class="ml-2 w-full flex justify-start items-center hover:bg-gray-100 rounded-sm h-8 text-sm font-medium text-gray-900 mt-[1px] cursor-pointer">
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
                                                            <input id="option3" type="radio" name="answers[{{ $question->id }}]" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 mt-[4px]" value="{{$question->option3}}">
                                                            <label for="option3" class="ml-2 w-full flex justify-start items-center hover:bg-gray-100 rounded-sm h-8 text-sm font-medium text-gray-900 mt-[1px] cursor-pointer">
                                                                <span class="text-[15px] ml-2">{{$question->option3}}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="d-inline-flex p-2">
                                                        <div class="flex justify-start w-full items-center">
                                                            <input id="option4" type="radio" name="answers[{{ $question->id }}]" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 mt-[4px]" value="{{$question->option4}}">
                                                            <label for="option4" class="ml-2 w-full flex justify-start items-center hover:bg-gray-100 rounded-sm h-8 text-sm font-medium text-gray-900 mt-[1px] cursor-pointer">
                                                                <span class="text-[15px] ml-2">{{$question->option4}}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                    <div class="py-3">
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="input" class="btn btn-primary text-white">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--Container Main end-->
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript' src='user.js'></script>

        <!--timer-->
        <script>
            // Set the date we're counting down to
            var currentDate = new Date().getTime();
            var endDate = new Date(currentDate + (15 * 60 * 1000));

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = endDate - now;

                // Time calculations for days, hours, minutes and seconds
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Output the result in an element with id="timer"
                document.getElementById("timer").innerHTML = hours + ":" +
                    minutes + ":" + seconds;

                // If the count down is over, write some text 
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("timer").innerHTML = "EXPIRED";
                }
            }, 1000);
        </script>

    </body>

</html>