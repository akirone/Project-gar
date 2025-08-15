<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Isi Postingan</h1>
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="foto">Foto:</label>
        <input type="file" name="foto" accept="image/*">
        @error('foto')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>

        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul" value="{{ old('judul') }}">
        @error('judul')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>

        <label for="isi">Isi:</label>
        <input type="text" name="isi" id="isi" value="{{ old('isi') }}">
        @error('isi')
            <p style="color: red;">{{ $message }}</p>
        @enderror
        <br>

        <button type="submit">Simpan</button>
    </form>

    <br>

    <a href="{{ route('posts.index') }}">Kembali ke posts</a>
</body>

</html>
