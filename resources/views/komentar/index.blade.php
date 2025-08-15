<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Daftar Komentar</h1>
    @if (@session('success'))
        <p style="color: rgb(255, 0, 0);">{{ session('success') }}</p>
    @endif
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Postingan</th>
                <th>Nama Pengomentar</th>
                <th>Isi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($komentars as $komentar)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $komentar->post->judul }}</td>
                    <td>{{ $komentar->user->name }}, {{ $komentar->user->email }}</td>
                    <td>{{ $komentar->isi }}</td>
                    <td>
                        <a href="{{ route('komentar.edit', $komentar->id) }}">Edit</a>
                        <a href="{{ route('komentar.show', $komentar->id) }}">Detail</a>
                        <form action="{{ route('komentar.destroy', $komentar->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Kamu yakin ??');">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center">Tidak ada komentar bro</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('komentar.create') }}">Tambah Komentar</a>
    <br>
    <br>
    <a href="{{ url('/') }}">Kembali ke Home</a>
</body>

</html>
