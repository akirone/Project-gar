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
    <form action="/store" method="post">
        @csrf

        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul">

        <br>
        
        <label for="isi">Isi:</label>
        <textarea name="isi" id="isi" rows="8"></textarea>

        <br>

        <button type="submit">Simpan</button>
    </form>

    <br>

    <a href="/posts">Kembali ke posts</a>
</body>

</html>
