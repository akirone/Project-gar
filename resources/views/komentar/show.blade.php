<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Detail Komentar</h1>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Postingan</th>
                <th>Nama Pengomentar</th>
                <th>Isi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $komentar->id }}</td>
                <td>{{ $komentar->post->judul }}</td>
                <td>{{ $komentar->user->name }}, {{ $komentar->user->email }}</td>
                <td>{{ $komentar->isi }}</td>
            </tr>
        </tbody>
</body>

</html>
