<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
</head>
<body>

<h2>Edit Data Siswa</h2>

<form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>NIS</label><br>
    <input type="text" name="nis" value="{{ old('nis', $siswa->nis) }}">
    <br><br>

    <label>Nama</label><br>
    <input type="text" name="nama" value="{{ old('nama', $siswa->nama) }}">
    <br><br>

    <label>Kelas</label><br>
    <input type="text" name="kelas" value="{{ old('kelas', $siswa->kelas) }}">
    <br><br>

    <label>Tanggal Mulai PKL</label><br>
    <input type="date" name="tanggal_mulai_pkl"
        value="{{ old('tanggal_mulai_pkl', $siswa->tanggal_mulai_pkl) }}">
    <br><br>

    <label>Tanggal Selesai PKL</label><br>
    <input type="date" name="tanggal_selesai_pkl"
        value="{{ old('tanggal_selesai_pkl', $siswa->tanggal_selesai_pkl) }}">
    <br><br>

    <label>Perusahaan</label><br>
    <select name="perusahaan_id">
        @foreach($perusahaan as $item)
            <option value="{{ $item->id }}"
                {{ $item->id == $siswa->perusahaan_id ? 'selected' : '' }}>
                {{ $item->nama_perusahaan }}
            </option>
        @endforeach
    </select>

    <br><br>

    <button type="submit">Update</button>
    <a href="{{ route('siswa.index') }}">Kembali</a>

</form>

</body>
</html>