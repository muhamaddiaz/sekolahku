@extends('layouts.app')

@section('content')
<div class="container">
    <div class="register-flex">
        <div class="register-flex__form-ct animated zoomInDown">
            <div class="side-color"></div>
            <div class="register-flex__form">
                <h2 class="secondary-color">Registrasi admin sekolah</h2>
                <hr>
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="school_name" type="text" 
                                    class="form-control{{ $errors->has('school_name') ? ' is-invalid' : '' }}" 
                                    name="school_name" value="{{ old('school_name') }}"
                                    placeholder="Nama Sekolah" required autofocus>
                                @if ($errors->has('school_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('school_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {{-- <input id="school_region" type="text" 
                                    class="form-control{{ $errors->has('school_region') ? ' is-invalid' : '' }}" 
                                    name="school_region" value="{{ old('school_region') }}"
                                    placeholder="Provinsi" required autofocus> --}}
                                <select name="school_region" id="school_region" class="form-control">
                                    <option>Pilih Provinsi</option>
                                </select>
                                @if ($errors->has('school_region'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('school_region') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {{-- <input id="school_city" type="text" 
                                    class="form-control{{ $errors->has('school_city') ? ' is-invalid' : '' }}" 
                                    name="school_city" value="{{ old('school_city') }}"
                                    placeholder="Kota / Kabupaten" required autofocus> --}}
                                <select name="school_city" id="school_city" class="form-control">
                                    <option>Pilih kota</option>
                                </select>
                                @if ($errors->has('school_city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('school_city') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="phone_number" type="number" 
                                    class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" 
                                    name="phone_number" value="{{ old('phone_number') }}"
                                    placeholder="Nomor Telepon" required autofocus>
                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="name" type="text" 
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                    name="name" value="{{ old('name') }}"
                                    placeholder="Nama Lengkap" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="username" type="text" 
                                    class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" 
                                    name="username" value="{{ old('username') }}"
                                    placeholder="Nama Pengguna" required autofocus>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
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
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" 
                                 placeholder="Konfirmasi kata sandi" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-block secondary-color-background text-white mb-4">
                            {{ __('register') }}
                        </button>
                        <span>Sudah punya akun ? <a href="{{ route('login') }}">Klik disini</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        let school = $('#school_region');
        let city = $('#school_city');
        $.get('http://localhost:8000/ajax/province', function(data, status) {
            data.map((val) => {
                let option = $('<option' + ' value=' + val.id + '></option>');
                option.text(val.province);
                school.append(option);
            });
        });
        school.change(function(event) {
            let id = event.target.value;
            city.empty();
            $.get('http://localhost:8000/ajax/' + id + '/city', function(data, status) {
                data.map((val) => {
                    let option = $('<option' + ' value=' + val.city_name + '></option>');
                    option.text(val.city_name);
                    city.append(option);
                });
            });
        });
    });
</script>
@endsection
