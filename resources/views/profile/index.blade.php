@extends('layouts/main')

@section('title', 'Investamart Test')

@section('container')

    <link href="../assets/styles/jumbotron.css" rel="stylesheet">


    <div class="jumbotron">
        <img src="../assets/image/jumbotron/invesnow.png" id="invesnow">
        <img src="../assets/image/jumbotron/caption.png" id="image_caption">
        <p class="lead">Penjelasan tentang apa itu Profil Resiko Gue dan iming2 hadiah.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident,
            sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <a href="/users/<?php echo uniqid();?>"
                class="btn btn-lg"
                role="button"
                id="btn_jumbotron">Mulai Sekarang >
            </a>


    </div>

@endsection






