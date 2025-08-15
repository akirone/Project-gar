<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Tambah Akun User</h1>
    <form action="{{ route('users.store') }}" method="post">
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

        <br>

        <button type="submit">Simpan</button>
    </form>
    <br>
    <a href="{{ route('users.index') }}">Kembali ke users</a>
</body>

</html>
