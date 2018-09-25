@extends('layouts.app')

@section('content')
<div class="container">
    <div class="login-flex">
        <div class="login-flex__form-ct">
            <div class="side-color"></div>
            <div class="login-flex__form">
                <h2 class="secondary-color">Masuk akun</h2>
                <hr>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input id="email" type="email" 
                                 class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                 name="email" value="{{ old('email') }}"
                                 placeholder="Email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password" type="password"
                                 class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                 name="password" value="{{ old('password') }}" 
                                 placeholder="Kata sandi" required autofocus>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn secondary-color-background text-white btn-block mb-4">
                                    {{ __('Login') }}
                                </button>
                                <div class="text-center">
                                    <span>
                                        Lupa kata sandi ?
                                        <a href="{{ route('password.request') }}">
                                            {{ __('klik disini') }}
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title secondary-color">
                                    Did you know ?
                                </h3>
                                <p class="card-text" style="font-size: 1rem">
                                    Untuk menggunakan aplikasi web ini
                                    anda akan mendapatkan id pengguna
                                    dari sekolah yang siap digunakan
                                    untuk menggunakan setiap fitur pada
                                    aplikasi ini.
                                    Salam hangat team sekolahku.id
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
