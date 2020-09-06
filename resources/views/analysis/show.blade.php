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

        @foreach($nilai as $n)
            <?php

            $rata = $n->total / 3;

            if ($n->a > $rata) {
                ?>
                @include('analysis.opportunist')
                <?php
            }

            if ($n->b > $rata) {
                ?>
                @include('analysis.yolo')
           <?php
            }

            if ($n->c > $rata) {
                ?>
                @include('analysis.optimist')
                <?php
            }

            ?>

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
