<!DOCTYPE html>
<html>
<head>
    <title>Management Pengguna</title>
</head>
<body>
    <h2>Daftar Pengguna (Read User)</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->nama }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <button>Edit</button>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <hr>

    <h2>Tambah Pengguna Baru (Create User)</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="text" name="nama" placeholder="Nama Lengkap" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <select name="role">
            <option value="admin">Admin</option>
            <option value="pengurus">Pengurus</option>
            <option value="mahasantri">Mahasantri</option>
        </select><br><br>
        <button type="submit">Simpan Pengguna</button>
    </form>
</body>
</html>