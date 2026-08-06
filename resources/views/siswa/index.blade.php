<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Data Siswa PKL</h3>
        </div>

        <div class="card-body">

            <div class="d-flex justify-content-between mb-3">

                <a href="{{ route('siswa.create') }}" class="btn btn-success">
                    + Tambah Siswa
                </a>

                <form action="{{ route('siswa.index') }}" method="GET" class="d-flex">
                    <input type="text"
                           name="cari"
                           class="form-control me-2"
                           placeholder="Cari Nama / NIS"
                           value="{{ request('cari') }}">

                    <button class="btn btn-primary">
                        Cari
                    </button>
                </form>

            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered table-hover table-striped">

                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Mulai PKL</th>
                        <th>Selesai PKL</th>
                        <th>Perusahaan</th>
                        <th width="170">Aksi</th>
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

                        <td class="text-center">

                            <a href="{{ route('siswa.edit',$item->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('siswa.destroy',$item->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data?')">
                                    Hapus
                                </button>

                            </form>

                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="8" class="text-center">
                            Tidak ada data.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

            <div class="d-flex justify-content-center">
                {{ $siswa->links() }}
            </div>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>