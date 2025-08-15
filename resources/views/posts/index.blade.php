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

    <a href="{{ route('posts.create') }}">Tambah Post</a>

    <br>
    <br>

    <a href="{{ url('/') }}">Kembali ke Halaman utama</a>
    @if (@session('success'))
        <p style="color: rgb(0, 255, 76);">{{ session('success') }}</p>
    @endif
    <table style="width: 100%;" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $post->foto) }}" style="width: 10px; height: 10px; object-fit: cover;">
                    </td>
                    <td>{{ $post->judul }}</td>
                    <td>{{ $post->isi }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        <a href="{{ route('posts.show', $post->id) }}">Detail</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Kamu yakin ??');">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
