<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
</head>
<body>

<h2>Tambah Data Siswa</h2>

<form action="{{ route('siswa.store') }}" method="POST">
    @csrf

    <label>NIS</label><br>
    <input type="text" name="nis"><br><br>

    <label>Nama</label><br>
    <input type="text" name="nama"><br><br>

    <label>Kelas</label><br>
    <input type="text" name="kelas"><br><br>

    <label>Tanggal Mulai PKL</label><br>
    <input type="date" name="tanggal_mulai_pkl"><br><br>

    <label>Tanggal Selesai PKL</label><br>
    <input type="date" name="tanggal_selesai_pkl"><br><br>

    <label>Perusahaan</label><br>
    <select name="perusahaan_id">
        @foreach($perusahaan as $item)
            <option value="{{ $item->id }}">
                {{ $item->nama_perusahaan }}
            </option>
        @endforeach
    </select>

    <br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>