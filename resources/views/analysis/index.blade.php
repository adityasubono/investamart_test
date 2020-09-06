@extends('layouts/main')

@section('title', 'Investamart Test')

@section('container')

    <div class="container mt-3">

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
        <h4 class="display-4">
            Hasil Analisis Karakter
        </h4>

        @foreach($nilai as $n)
            <?php
            $opportunis = ($n->a / $n->total) * 100;
            $yolo = ($n->b / $n->total) * 100;
            $optimistic = ($n->c / $n->total) * 100;

            ?>

            <h4>ID: {{$n->user_id}}</h4>
            <h5>Opportunist</h5>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-primary progress-bar-animated"
                     role="progressbar"
                     style="width: <?php echo round($opportunis)?>%"
                     aria-valuenow="10"
                     aria-valuemin="0"
                     aria-valuemax="100"><?php echo round($opportunis)?>%
                </div>
            </div>

            <h5>Yolo</h5>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-info progress-bar-animated"
                     role="progressbar"
                     style="width: <?php echo round($yolo)?>%"
                     aria-valuenow="10"
                     aria-valuemin="0"
                     aria-valuemax="100"><?php echo round($yolo)?>%
                </div>
            </div>

            <h5>Optimistic</h5>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-success progress-bar-animated"
                     role="progressbar"
                     style="width: <?php echo round($optimistic)?>%"
                     aria-valuenow="10"
                     aria-valuemin="0"
                     aria-valuemax="100"><?php echo round($optimistic)?>%
                </div>
            </div>


            <table class="table table-sm mt-5">
                <thead>
                <tr>
                    <th scope="col">Opportunist</th>
                    <th scope="col">Yolo</th>
                    <th scope="col">Optimistic</th>
                    <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$n->a}}</td>
                    <td>{{$n->b}}</td>
                    <td>{{$n->c}}</td>
                    <td>{{$n->total}}</td>
                </tr>

                </tbody>
            </table>
        @endforeach
    </div>


    <script type="text/javascript">
        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 4000);
    </script>




@endsection
