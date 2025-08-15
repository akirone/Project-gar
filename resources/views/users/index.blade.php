<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Data Pengguna</h1>
    @if (@session('success'))
        <p style="color: rgb(51, 255, 0);">{{ session('success') }}</p>
    @endif
    <table style="width: 100%;" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengguna as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Kamu yakin ingin hapus ??');">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('users.create') }}">Tambah Data User</a>
    <br>
    <br>
    <a href="{{ url('/') }}">Kembali ke Halaman utama</a>
    <br>
</body>

</html>
