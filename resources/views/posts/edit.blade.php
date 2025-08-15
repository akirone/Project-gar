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
        <h1>Isi Postingan</h1>
        <form action="{{ route('posts.update', $postingan->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($postingan->foto)
                <img src="{{ asset('storage/' . $postingan->foto) }}" alt="Foto Postingan"
                    style="max-width: 200px; max-height: 200px;">
            @endif
            <br><br>

            <label for="foto">Foto:</label>
            <input type="file" name="foto" accept="image/*">
            @error('foto')
                <p style="color: red;">{{ $message }}</p>
            @enderror
            <br>

            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" value="{{ $postingan->judul }}">

            <br>

            <label for="isi">Isi:</label>
            <textarea name="isi" id="isi" rows="8">{{ $postingan->isi }}</textarea>

            <br>

            <button type="submit">Simpan</button>
        </form>

        <br>
    </body>
    <a href="{{ route('posts.index') }}">Kembali ke posts</a>
</body>


</html>
