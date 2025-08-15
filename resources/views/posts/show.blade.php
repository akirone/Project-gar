<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Detail Postingan</h1>
    <a href="/posts">Kembali ke Daftar Postingan</a>
    <h2>{{ $posts->judul }}</h2>
    <h2>{{ $posts->isi }}</h2>

    <br>
    <h3>Data Komentar</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Nama Pengirim</th>
                <th>Nama Pengomentar</th>
                <th>Isi Komentar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts->komentars as $komentar)
                <tr>
                    <td>{{ $komentar->user->name }}</td>
                    <td>{{ $komentar->user->email }}</td>
                    <td>{{ $komentar->isi }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align: center">Tidak ada komentar bro</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
