<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Halooo cuy</h1>
    @if (@auth()->check())
        <form action="{{ route('do-logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <h1>Hajimimashite, {{ auth()->user()->name }}!</h1>
        <h2>PILIH SAJA</h2>
        <a href="{{ route('posts.index') }}">Lihat posts</a>
        <br><br>
        <a href="{{ route('users.index') }}">Lihat users</a>
        <br><br>
        <a href="{{ route('komentar.index') }}">Lihat komentar</a>
        <br><br>
    @endif

    @guest
        <h2>Belum login? Login atau register dulu yak :D</h2>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endguest
</body>

</html>
