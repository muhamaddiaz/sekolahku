@extends('layouts.app')

@section('content')
    <header class="index-head">
        <img class="icon-animate1" src="{{ asset('svg/desktop.svg') }}" alt="school.svg" 
        style="width: 10%; right: 30%; top: 55%; transform: translate(0,70%)">
        <img src="{{ asset('svg/chat.svg') }}" alt="school.svg" 
        style="width: 10%; right: 30%; top: 5%; transform: translate(0, 70%);">
        <img src="{{ asset('svg/ereader-2.svg') }}" alt="school.svg" 
        style="width: 10%; right: 35%; top: 30%; transform: translate(0, 70%);">
        <img class="animated bounceInRight" src="{{ asset('svg/school.svg') }}" alt="school.svg" 
        style="width: 30%; right: -170px; top: 15%; ">
        <div class="index-head__flex">
            <div class="index-head__text">
                <div class="container">
                    <h1 style="margin-left: 0, font-weight: 900">Sekolahku.id</h1>
                    <p style="width: 50%; font-size: 20px">
                        Aplikasi berbasis web yang menyediakan berbagai macam fitur
                        yang dapat membantu pihak sekolah dan juga siswa dalam 
                        mengelola setiap kegiatan yang ada di sekolah dengan mudah.
                    </p>
                    <a class="button__gradient button__gradient--pilled" href="{{ route('login') }}">Coba sekarang!</a>
                </div>
            </div>
        </div>
    </header>
    <div class="intro">
        <div class="intro--text">
            <div class="container">
                <h1>Apa itu Sekolahku.id ?</h1>
                <div class="hr-border"></div>
                <div class="row mt-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <p>
                            Sekolahku.id dirancang untuk menggantikan sistem sekolah yang sudah lama digunakan, 
                            dengan menggunakan aplikasi berbasis web ini setiap sekolah dapat memiliki
                            sebuah aplikasi web yang powerful dan akan membawa setiap dan mengikuti setiap
                            perkembangan teknologi dengan fitur fitur menarik yang kami tawarkan
                        </p>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="feature">
        <div class="container">
            <div class="text-center mb-5">
                <h1>Meet our awesome feature</h1>
                <div class="hr-border hr-border--base"></div>
                <p>
                    Oke!, akan kami jelaskan beberapa fitur yang terdapat pada sekolahku.id ini 
                    antara lain adalah
                </p>
            </div>
            <div class="feature__icon-ct">
                <div class="row">
                    <div class="col-md-4">
                        <div class="feature__icon">
                            <img style="width: 50%" src="{{asset('svg/desktop.svg')}}" alt="desktop.svg">
                            <h3 class="mt-3">E-Mading</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature__icon">
                            <img style="width: 50%" src="{{asset('svg/chat.svg')}}" alt="desktop.svg">
                            <h3 class="mt-3">E-Library</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature__icon">
                            <img style="width: 50%" src="{{asset('svg/ereader-2.svg')}}" alt="desktop.svg">
                            <h3 class="mt-3">Analyctic</h3>
                        </div>
                    </div>
                </div>
                <div class="card-deck mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-text">
                                <p>
                                    E-Mading fitur ini sangat berguna untuk mendapatkan informasi 
                                    terkini darisekolah bukan hanya sekedar informasi dari sekolah anda 
                                    melainkan semua sekolah yang terdaftar di sekolahku.id menarik bukan
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-text">
                                <p>
                                    E-Library bukan hanya sekedar kumpulan pdf online yang dapat anda 
                                    baca namun terdapat video tutorialdari setiap sekolah yang terdaftar 
                                    di sekolahku.id setiap sekolah dapat berkontribusi untuk memberikan 
                                    pengalaman belajar terbaik di E-Library ini
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-text">
                                <p>
                                    Analytic Student Monitoringfitur ini berguna untuk orang tua 
                                    siswa yang dapat memonitoring setiap perkembangan belajar anaknya.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="closure">
        <div class="closure__closure-text">
            <div class="container">
                <p style="font-size: 25px">
                    Apakah anda sudah terdaftar ?,<br>
                    Ayo tunggu apalagi masuk sekarang juga
                </p>
                <a class="btn btn-outline-light" href="{{ route('login') }}">
                    Masuk sekarang!
                </a>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <span>Sekolahku Team &copy; 2018</span>
        </div>
    </footer>
@endsection