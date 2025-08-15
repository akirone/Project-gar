<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit Komentar</h1>
    <form action="{{ route('komentar.update', $komentar->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="post">Postingan</label>

        <select name="post_id">
            <option value="">Pilih Postingan</option>
            @foreach ($posts as $post)
                <option @selected($post->id == old('post_id', $komentar->post_id)) value="{{ $post->id }}">{{ $post->judul }}</option>
            @endforeach
        </select>
        @error('post_id')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br>
        <br>

        <label for="user">User</label>

        <select name="user_id">
            <option value="">Pilih User</option>
            @foreach ($users as $user)
                <option @selected($user->id == old('user_id', $komentar->user_id)) value="{{ $user->id }}">{{ $user->name }}</option>
                {{ $user->name }}
            @endforeach
        </select>
        @error('user_id')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br>
        <br>

        <label for="isi">Isi</label>
        <input type="text" name="isi" id="isi" value="{{ old('isi', $komentar->isi) }}">

        <br>
        <br>

        <button type="submit">Simpan</button>
        @error('isi')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br>
        <br>
        <a href="{{ route('komentar.index') }}">Kembali ke Daftar Komentar</a>
</body>

</html>
