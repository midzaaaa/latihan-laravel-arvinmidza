<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <style>
        table{
            border-collapse: collapse;
            width:100%;
            background-color:sage;
        }
        table, th, td{
            border:1px solid black;
            padding:8px;
            font-family:jetbrains mono, monospace;
        }
        th{
            background-color:lightblue;
        }
        a{
            text-decoration:none;
        }
        h2{
            color:black;
            background-color:lightblue;
        }
        a{
            color:white;
        background-color:blue;
        border:1px solid black;
        border-radius:5px;
        font-family:jetbrains mono, monospace;
        }
    </style>
</head>
<body>

<h2> 🎓Data Siswa PKL</h2>


<a href="{{ route('siswa.create') }}">+ Tambah Data</a>

<br><br>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Mulai PKL</th>
            <th>Selesai PKL</th>
            <th>Perusahaan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($siswa as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nis }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->kelas }}</td>
            <td>{{ $item->tanggal_mulai_pkl }}</td>
            <td>{{ $item->tanggal_selesai_pkl }}</td>
            <td>{{ $item->perusahaan->nama_perusahaan }}</td>
            <td>
                <a href="{{ route('siswa.edit', $item->id) }}">Edit</a>

                <form action="{{ route('siswa.destroy', $item->id) }}"
                      method="POST"
                      style="display:inline">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" align="center">Belum ada data.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<br>

{{ $siswa->links() }}

</body>
</html>