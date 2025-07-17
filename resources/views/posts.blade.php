<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Daftar Postingan</h1>
    <table style="width: 100%;" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataPost as $post)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$post->judul}}</td>
                    <td>{{$post->isi}}</td>
                    <td>
                        <a href="/edit-posts/{{$post->id}}">Edit</a>
                        <a href="#">Detail</a>
                        <a href="#">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/tambah-posts">Tambah Post</a>
    <br>
    <a href="/">Kembali ke Home</a>
</body>

</html>
