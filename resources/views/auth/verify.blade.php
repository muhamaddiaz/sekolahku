@extends('home')

@section('content-2')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header primary-color-background text-white">{{ __('Verifikasi email anda terlebih dahulu!') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Link verifikasi telah berhasil dikirim kembali') }}
                        </div>
                    @endif

                    {{ __('Sebelum melanjutkan, dimohon cek email terlebih dahulu untuk memverifikasi') }}
                    {{ __('Jika tidak menerima email verifikasi') }}, <a href="{{ route('verification.resend') }}">{{ __('Kirim ulang link verifikasi') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
