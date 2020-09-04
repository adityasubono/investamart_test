@extends('layouts/main')

@section('title', 'Investamart Test')

@section('container')

    <div class="container">
        @forelse( $data_question as $id )
            @php
                $id_plus= $id->id + 1;
            @endphp
        @empty
            @php
                $id_plus= 1;
            @endphp
        @endforelse


        <h4 class="display-3"># Create Question {{$id_plus}}</h4>

        @if (session('success'))
            <div class="alert alert-success fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger fade show" role="alert">
                {{ session('error') }}
            </div>
        @endif
        {{-- FORM INPUT --}}
        <form action="/question" method="post">
            @csrf
            <div class="form-group row">
                <label for="question" class="col-sm-2 col-form-label">Question</label>
                <div class="col-sm-10">
                    <input type="text"
                           class="form-control"
                           id="question"
                           name="input_question">
                </div>
            </div>
            <div class="form-group row">
                <label for="answer_options" class="col-sm-2 col-form-label">Answer Options :</label>
                <div class="col-sm-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="Options">Options</label>
                        </div>
                        <select class="custom-select"
                                id="Options"
                                name="question[0][answer_option]">
                            <option selected>Choose...</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-5">
                    <input type="text"
                           class="form-control"
                           id="answer_options"
                           name="question[0][answer]">
                </div>

                <div class="col-sm-2">
                    <button type="button"
                            class="btn btn-success"
                            id="add_question">+
                    </button>

                    <button type="reset"
                            class="btn btn-info"
                            id="btn-reset-form">Reset
                    </button>
                </div>
            </div>

            <input type="hidden" id="jumlah-form" value="0">
            <input type="hidden"
                   id="question_id"
                   name="question[0][question_id]"
                   value="{{$id_plus}}">
            <div id="question_form"></div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        {{--            FORM INPUT          --}}

            <h5 class="mt-3">Total Points Opportunitis
                @foreach($opportunist as $to)
                    <?php
                    $sum = $to->a;
                    $total =( $sum / 200) * 100 ."%";
                    echo $total ." dari ".$sum." points";
                    ?>
                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-success"
                             role="progressbar"
                             style="width:<?php echo $total; ?>;"
                             aria-valuenow="<?php echo $to->a ?>"
                             aria-valuemin="45"
                             aria-valuemax="300"><?php echo $total; ?></div>
                    </div>

                @endforeach
            </h5>

            <h5>Total Points Optimistic
                @foreach($optimistic as $op)
                    <?php
                    $sum = $op->a;
                    $total =( $sum / 200) * 100 ."%";
                    echo $total ." dari ".$sum." points";
                    ?>
                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-success"
                             role="progressbar"
                             style="width:<?php echo $total; ?>;"
                             aria-valuenow="<?php echo $to->a ?>"
                             aria-valuemin="45"
                             aria-valuemax="300"><?php echo $total; ?></div>
                    </div>
                @endforeach
            </h5>

            <h5>Total Points Yolo
                @foreach($yolo as $yo)
                    <?php
                    $sum = $yo->a;
                    $total =( $sum / 200) * 100 ."%";
                    echo $total ." dari ".$sum." points";
                    ?>
                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar progress-bar-striped bg-success"
                             role="progressbar"
                             style="width:<?php echo $total; ?>;"
                             aria-valuenow=""
                             aria-valuemin="45"
                             aria-valuemax="300"><?php echo $total; ?></div>
                    </div>
                @endforeach
            </h5>


        {{--            TABLE QUESTION     --}}


        @foreach($question as $a)
            <table class="table table-sm mt-5">
                <thead>
                <tr>
                    <th class="bg-warning p-2">{{$loop->iteration}}. Pertanyaan</th>
                    <th colspan="3" class="bg-success p-2">{{$a->question}}</th>
                </tr>
                <tr>
                    <th scope="col">Anwser Option</th>
                    <th scope="col">Anwser</th>
                    <th scope="col">Character Category</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($a->answer as $t)
                    <tr>
                        <td>{{$t->answer_option}}</td>
                        <td>{{$t->answer}}</td>
                        <td>
                            <form action="/question/{{$t->id}}" method="post">
                                @method('put')
                                @csrf

                                @if($t->opportunist == "")
                                    <?php
                                    $checklist = "";
                                    ?>
                                @else
                                    <?php
                                    $checklist = "checked";
                                    ?>
                                @endif


                                <div class="input-group mb-3">
                                    @if($t->opportunist == "")
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox"
                                                       name="opportunist"
                                                       value="20">
                                            </div>
                                        </div>
                                    @else
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox"
                                                       name="opportunist"
                                                       value="20" checked>
                                            </div>
                                        </div>
                                    @endif
                                    <input type="text"
                                           class="form-control"
                                           aria-label="Text input with checkbox"
                                           value="The Opportunist"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="Kamu memiliki toleransi terhadap resiko yang cenderung rendah dimana return yang diharapkan minimal setara dengan suku bunga deposito dengan fluktuasi nilai pasar yang minimal untuk mencapai tujuan investasi kamu."
                                           disabled>
                                </div>

                                <div class="input-group mb-3">

                                    @if($t->optimistic == "")
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox"
                                                       name="optimistic"
                                                       value="20">
                                            </div>
                                        </div>
                                    @else
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox"
                                                       name="optimistic"
                                                       value="20" checked>
                                            </div>
                                        </div>
                                    @endif
                                    <input type="text"
                                           class="form-control"
                                           aria-label="Text input with checkbox"
                                           value="The Optimistic"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="Kamu memiliki toleransi terhadap resiko yang tidak terlalu tinggi dimana return yang di harapkan diatas suku bunga deposito dengan fluktuasi nilai pasar yang moderat untuk mencapai tujuan investasi kamu."
                                           disabled>
                                </div>

                                <div class="input-group mb-3">

                                    @if($t->yolo == "")
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox"
                                                       name="yolo"
                                                       value="20">
                                            </div>
                                        </div>
                                    @else
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox"
                                                       name="yolo"
                                                       value="20" checked>
                                            </div>
                                        </div>
                                    @endif

                                    <input type="text"
                                           class="form-control"
                                           aria-label="Text input with checkbox"
                                           value="The Yolo"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="Kamu memiliki toleransi terhadap resiko yang tinggi supaya dapat memperoleh return tertinggi guna meraih tujuan investasi kamu."
                                           disabled>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </td>
                        <td>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endforeach
    </div>







    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 4000);
    </script>

    <script type="text/javascript" src="../assets/form/question.js"></script>



@endsection






