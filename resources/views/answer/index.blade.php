@extends('layouts/main')

@section('title', 'Answer User')

@section('container')

    <style type="text/css">
        .jumbotron {
            height: 500px;
            background-image: url("../assets/image/jumbotron/jb.png");
            background-size: cover;
        }
        #question {

            font-family: 'Raleway', sans-serif;
            color: #ED1E79;
            font-weight: 800;

        }

        #question_2{
            font-family: 'Raleway', sans-serif;
            color: #ED1E79;
            font-weight: 800;
            position: absolute;
            top: 22%;
            left: 13%;
            font-size: 60px;
            text-shadow: 4px 4px 8px #0b2e13;
            font-style: italic;
        }
        #answer {
            font-family: 'Raleway', sans-serif;
            color: white;
            font-size: 35px;
            font-weight: 800;
            margin-left: 25px;
        }
        #answer_1 {
            font-family: 'Raleway', sans-serif;
            color: white;
            font-size: 23px;
            font-weight: 800;
        }

        #prev{
            position: absolute;
            bottom: 45px;
            left: 60px;
        }

        #next{
            position: absolute;
            bottom: 45px;
            right: 60px;
        }
        #caption{
            position: absolute;
            width: 300px;
            height: 300px;
            right: 45px;
            bottom: 100px;
        }
        #invesnow{
            position: absolute;
            width: 150px;
            height: 80px;
            left: 45px;
            top: 45px;
        }
        #btn_submit {
            position: absolute;
            top: 50%;
            left: 12%;
            width: 275px;
            height: 75px;
            font-size: 40px;
        }
        #cross{
            position: absolute;
            top: 10%;
            left: 5%;
            font-size: 180px;
            color: white;
            text-shadow: 4px 4px 4px #0b2e13;
            font-weight: 600;
        }
    </style>
    <img src="../assets/image/jumbotron/invesnow.png" id="invesnow">
    <img src="../assets/image/jumbotron/caption.png" id="caption">

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="divs">
                @foreach($question as $a)
                    <div class="cls{{$loop->iteration}}">
                        <h3 id="question">{{$loop->iteration}}. {{$a->question}}</h3>
                        @foreach($a->answer as $t)
                            <span id="answer">{{$t->answer_option}} </span><input type="radio" name="answer" value="{{$t->answer_option}}">
                            <span id="answer_1">{{$t->answer}}</span><br>
                        @endforeach


                    </div>
                @endforeach
                    <div class="cls11">
                        <span id="cross">#</span>
                        <h3 id="question_2">Klik Disini Untuk Melihat <br>Hasilnya</h3>
                        <button type="submit" class="btn btn-success btn-lg" id="btn_submit">SUBMIT</button>
                    </div>
            </div>



            <a class="btn btn-secondary float-left m-3" id="prev">Ulangi</a>
            <a class="btn btn-success float-right m-3" id="next">Lanjut</a>
        </div>
    </div>




    <script type="text/javascript">
        $(document).ready(function () {
            $(".divs div").each(function (e) {
                if (e != 0)
                    $(this).hide();
            });

            $("#next").click(function () {
                if ($(".divs div:visible").next().length != 0)
                    $(".divs div:visible").next().show().prev().hide();
                else {
                    $(".divs div:visible").hide();
                    $(".divs div:first").show();
                }
                return false;
            });

            $("#prev").click(function () {
                if ($(".divs div:visible").prev().length != 0)
                    $(".divs div:visible").prev().show().next().hide();
                else {
                    $(".divs div:visible").hide();
                    $(".divs div:last").show();
                }
                return false;
            });
        });

    </script>
@endsection






