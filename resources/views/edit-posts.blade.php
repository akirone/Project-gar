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
    <form action="/update/{{$postingan->id}}" method="post">
        @csrf
        @method('PUT')

        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul" value="{{$postingan->judul}}">

        <br>

        <label for="isi">Isi:</label>
        <textarea name="isi" id="isi" rows="8">{{$postingan->isi}}</textarea>

        <br>

        <button type="submit">Simpan</button>
    </form>

    <br>
    </body>
    <a href="/posts">Kembali ke posts</a>
</body>


</html>
