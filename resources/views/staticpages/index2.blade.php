@extends('layouts.app')
@section('content')
<style>
    .index-navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        background-color: #000080;
        color: white;
    }

    .index-navbar .index-navbar__header {
        font-weight: 600;
        font-size: 2rem;
        margin-top: -5px;
        padding: 0 26px;
    }

    .index-navbar__menu {
        margin: 0;
        padding: 0;
    }

    .index-navbar__menu .menu-item {
        float: left;
        list-style: none;
    }

    .menu-item a {
        display: block;
        color: white;
        padding: 20px 26px;
        font-size: 1.2rem;
    }

    .menu-item a:hover {
        text-decoration: none;
        background-color: #000050;
    }

    .top-index {
        background: linear-gradient(160deg, #000080, #000050);
        color: white;
    }

    .top-index .top-index__center {
        display: flex;
        flex-direction: column;
        min-height: 80vh;
        justify-content: center;
        align-items: center;
    }

    .top-index .top-index__image {
        width: 100%;
    }

    .kotak-daftar {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #000080;
        color: white;
        border-radius: 5px;
        padding: 10px;
    }

    .list-fitur__items {
        width: 100%;
        border-radius: 5px;
        color: white;
        background-color: #000080;
        box-shadow: 0 0 10px grey;
    }
</style>
<nav class="index-navbar">
    <div class="index-navbar__header">
        Sekolahku
    </div>
    <ul class="index-navbar__menu">
        <li class="menu-item">
            <a href="#beranda">Beranda</a>
        </li>
        <li class="menu-item">
            <a href="#fitur">Fitur</a>
        </li>
        <li class="menu-item">
            <a href="#kontak">Tentang kami</a>
        </li>
    </ul>
</nav>
<div class="top-index" id="beranda">
    <div class="container text-center">
        <div class="top-index__center pt-5">
            <div class="top-index__text mt-5 mb-5">
                <h1>Sekolahku</h1>
                <h4>Portal sistem informasi sekolah</h4>
            </div>
            <div class="top-index__image text-center mt-5">
                <img src="{{asset('images/intro.png')}}" alt="intro.png" style="width: 80%; border-top-left-radius: 5px; border-top-right-radius: 5px;">
            </div>
        </div>
    </div>
</div>
<div class="fitur" id="fitur">
    <div class="container mb-5">
        <div class="fitur-siapa_kita mt-5">
            <div class="row mt-5">
                <div class="col-md-6">
                    <h2>Siapa kita ?</h2>
                    <p>
                        Kami adalah sebuah layanan Learning Management System yang berfokus
                        kepada kebutuhan sekolah untuk mengelola setiap pelajar dan juga memberikan
                        fitur fitur yang akan berguna bagi para pelajar yang terdaftar di sekolahku
                        kita berdiskusi dan belajar bersama.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="kotak-daftar text-center">
                        <div class="m-5">
                            <h3>Pelajari selengkapnya</h3>
                            <br>
                            <button class="btn btn-outline-light" style="padding: 5px 30px; border-radius: 10px; border-width: 2px;">Daftar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="list-fitur mb-5">
    <div class="container">
        <div class="list-fitur__items p-5">
            <div class="list-fitur__items--text">
                <h2>Sekolahku Fitur </h2>
                <br>
                <p>
                    Didalam aplikasi website ini kami menawarkan banyak fitur
                    yang dapat membantu siswa ataupun guru dalam mengatur setiap
                    tugasnya dengan mudah, untuk mengelola siswa kami memiliki fitur
                    yang bernama ClassMates, untuk mengelola Perpustakaan kami memiliki
                    fitur E-Library, untuk mengelola informasi dari setiap sekolah
                    kami memiliki E-Mading dan masih banyak lagi fitur lainnya.
                </p>
            </div>
            <div class="list-fitur__items--image mt-4">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="mb-3 mt-5">Class Mates</h4>
                        <img src="{{asset('images/classmates.png')}}" alt="" style="width: 100%">
                    </div>
                    <div class="col-md-4">
                        <h4 class="mb-3 mt-5">E-Mading</h4>
                        <img src="{{asset('images/elibrary.png')}}" alt="" style="width: 100%">
                    </div>
                    <div class="col-md-4">
                        <h4 class="mb-3 mt-5">E-Library</h4>
                        <img src="{{asset('images/emading.png')}}" alt="" style="width: 100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="detail-fitur mb-5">
    <div class="container">
        <div class="detail-fitur__text mb-5">
            <h2>Masih belum jelas ?</h2>
            <p>Oke, kami akan jelaskan setiap fiturnya</p>
        </div>

        <div class="detail-fitur__pertama mb-5">
            <div class="row">
                <div class="col-md-6 p-4">
                    <h2>Classmates</h2>
                    <p>
                        Fitur ini digunakan untuk mengelola setiap siswa dan juga fitur ini memiliki kegunaan lainnya
                        yaitu
                        untuk melihat setiap profil pelajar yang terdaftar disekolahku
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('images/classmates.png')}}" alt="" style="width: 100%; box-shadow: 5px 0 50px grey">
                </div>
            </div>
        </div>

        <div class="detail-fitur__pertama mb-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('images/emading.png')}}" alt="" style="width: 100%; box-shadow: 5px 0 50px grey">
                </div>
                <div class="col-md-6 p-4">
                    <h2>E - Mading</h2>
                    <p>
                        Fitur ini berguna untuk memberikan informasi terkait lomba atau juga informasi event sekolah
                        , dari berbagai sekolah dan juga sekolah terdekat
                    </p>
                </div>
            </div>
        </div>

        <div class="detail-fitur__pertama mb-5">
            <div class="row">
                <div class="col-md-6 p-4">
                    <h2>E - Library</h2>
                    <p>
                        Dengan fitur ini memungkinkan setiap sekolah untuk menyimpan ebook yang sekolah miliki kedalam
                        penyimpanan cloud dari sekolahku, untuk dibaca setiap pengguna yang terdaftar di sekolahku
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('images/elibrary.png')}}" alt="" style="width: 100%; box-shadow: 5px 0 50px grey">
                </div>
            </div>
        </div>

        <div class="detail-fitur__pertama mb-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('images/analytic.png')}}" alt="" style="width: 100%; box-shadow: 5px 0 50px grey">
                </div>
                <div class="col-md-6 p-4">
                    <h2>Analytic Monitoring System</h2>
                    <p>
                        Fitur ini berguna untuk memberikan informasi terkait nilai dan juga dapat memberikan anda
                        sebuah
                        pola dari nilai tersebut yang dapat kami analisis sehingga bisa merekomendasikan apa yang harus
                        anda pelajari
                    </p>
                </div>
            </div>
        </div>

        <div class="detail-fitur__pertama mb-5">
            <div class="row">
                <div class="col-md-6 p-4">
                    <h2>Ekskul Center</h2>
                    <p>
                        Fitur ini memungkinkan anda untuk bergabung kedalam grup ekskul yang anda pilih disekolah anda,
                        disana
                        anda dapat berbagi informasi dan juga melihat informasi mengenai ekskul tersebut
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('images/ekskul.png')}}" alt="" style="width: 100%; box-shadow: 5px 0 50px grey">
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="jumbotron text-white text-center" style="background-color: #000080">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Sudah cukup jelas ?</h3>
                <p>Jika belum maka anda harus mencoba nya sendiri</p>
                <a href="{{route('register')}}" class="btn btn-outline-light" style="padding: 8px 30px; border-radius: 10px; border-width: 2px;">Daftar
                    sekarang</a>
            </div>
            <div class="col-md-6">
                <h3>Sudah punya akun ?</h3>
                <p>Tunggu apalagi masuk sekarang juga</p>
                <a href="{{route('login')}}" class="btn btn-outline-light" style="padding: 8px 30px; border-radius: 10px; border-width: 2px;">Masuk
                    akun</a>
            </div>
        </div>
    </div>
</div>
<br>
<footer class="mt-4" id="kontak">
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <h2>Sekolahku</h2>
                <p>Riset oleh divisi web Application & Security Laboratory</p>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <h4>Alamat</h4>
                        <p>Jl. Telekomunikasi, Jl. Terusan Buah Batu No.01, Sukapura, Dayeuhkolot, Bandung, Jawa Barat
                            40257</p>
                    </div>
                    <div class="col-md-4">
                        <h4>Sosial media</h4>
                        <ul style="list-style: none; margin: 0; padding: 0">
                            <li>
                                <a href="#">Facebook</a>
                            </li>
                            <li>
                                <a href="#">Instagram</a>
                            </li>
                            <li>
                                <a href="#">Twitter</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h4>Kontak kami</h4>
                        <p>admin@sekolahku.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="support mb-4">
            <h4>Supported by: </h4>
            <br>
            <div class="image-support">
                <img src="{{asset('images/ans.png')}}" alt="ans.png" style="width: 100px">
                <img src="{{asset('images/fte.png')}}" alt="ans.png" style="width: 100px">
                <img src="{{asset('images/seefest.png')}}" alt="ans.png" style="width: 100px">
            </div>
        </div>
    </div>
</footer>
@endsection