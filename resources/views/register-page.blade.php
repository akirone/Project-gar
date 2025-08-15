<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Register Akun</h1>
    <form action="{{ route('do-Register') }}" method="post">
        @csrf

        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        @error('email')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br>

        <label for="password">Password:</label>
        <input name="password" id="password" type="password">
        @error('password')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br>

        <button type="submit">Simpan</button>
    </form>
    <br>
    <a href="{{ route('login') }}">Kembali ke login</a>
</body>

</html>
