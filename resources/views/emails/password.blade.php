<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Password</title>
</head>
<body>
    <div class="primary-color-background">
        <div class="container">
            <h1 class="pt-5 pb-5">Selamat datang di sekolahku, {{$user->name}}</h1>
        </div>
    </div>
    <div class="container">
        <p>Kata sandi akun sekolahku anda: </p>
        <p><b>{{$password}}</b></p>
    </div>
</body>
</html>