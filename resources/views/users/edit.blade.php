<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <body>
        <h1>Edit Isi Pengguna</h1>
        <form action="{{ route('users.update', $pengguna->id) }}" method="post">
            @csrf
            @method('PUT')

            <label for="name">Nama:</label>
            <input type="text" name="name" value="{{ $pengguna->name }}">
            @error('name')
                <p style="color: red">{{ $message }}</p>
            @enderror

            <br>
            <label for="email">Email:</label>
            <input type="email" name="email">
            @error('email')
                <p style="color: red">{{ $message }}</p>
            @enderror

            <br>
            <label for="password">Password:</label>
            <input name="password" id="password" type="password" rows="8" placeholder="Kosongkan jika gk mau mengubah password" enabled>
            @error('password')
                <p style="color: red">{{ $message }}</p>
            @enderror

            <br>
            <button type="submit">Simpan</button>
        </form>

        <br>
    </body>
    <a href="{{ route('users.index') }}">Kembali ke user</a>
</body>

</html>
