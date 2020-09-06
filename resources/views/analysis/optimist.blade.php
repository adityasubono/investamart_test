<style type="text/css">
    .jumbotron {
        background-color: #8CC63F;
        background-image: url("../assets/image/grafik.png");
        background-size: cover;
        color: white;
        text-shadow: 4px 4px 4px #1b1e21;
    }

    #title_2 {
        color: gold;
        font-weight: bold;
        font-size: 23px;
    }

    ::placeholder {
        color: gray;
        font-size: 30px;
        font-weight: 700;
    }
</style>
<form action="/user/{{$user}}" method="post">
    @csrf
    <div class="jumbotron mt-5">
        <h1 class="display-4">Hello, Saya The Optimistic</h1>
        <p class="lead">"The Optimistic Kamu memiliki toleransi terhadap resiko
            yang tidak terlalu tinggi dimana return yang di harapkan diatas suku bunga
            deposito dengan fluktuasi nilai
            pasar yang moderat untuk mencapai tujuan investasi kamu."</p>
        <hr class="my-4">
        <p id="title_2">AYO MULAI BERINVESTASI DARI SEKARANG
            DAN DAPATKAN BONUS  DIAWAL SEBESAR
            IDR 1,000,000 REKSADANA TUNAI</p>

        <p>Cukup dengan mendaftarkan diri kamu dengan mengisi form dibawah ini,
            kamu akan mendapatkan bonus langsung reksadana di aplikasi Invesnow!</p>

        <form action="/user/{{$user}}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="name" placeholder="Nama">
            </div>
            <div class="form-group">
                <input type="email" class="form-control form-control-lg" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="number" class="form-control form-control-lg" name="mobile" placeholder="Mobile">
            </div>
            <button type="submit" class="btn bg-dark float-right text-white">SUBMIT ></button>
        </form>
    </div>

</form>

