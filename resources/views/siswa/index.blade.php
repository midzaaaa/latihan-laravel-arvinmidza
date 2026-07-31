@extends('layouts.app')
@section('content')
 <a href="{{ route('siswa.create') }}" class="btn btn-primary">+ Tambah Siswa
PKL</a>
 <table class="table">
 <thead>
 <tr><th>NIS</th><th>Nama</th><th>Perusahaan</th><th>Periode
PKL</th><th>Aksi</th></tr>
 </thead>
 <tbody>
 @foreach ($siswa as $s)
 <tr>
 <td>{{ $s->nis }}</td>
 <td>{{ $s->nama }}</td>
 <td>{{ $s->perusahaan->nama_perusahaan }}</td>
 <td>{{ $s->tanggal_mulai_pkl }} s.d. {{ $s->tanggal_selesai_pkl }}</td>
 <td>
 <a href="{{ route('siswa.edit', $s->id) }}">Edit</a>
 <form action="{{ route('siswa.destroy', $s->id) }}" method="POST"
style="display:inline">
 @csrf @method('DELETE')
 <button onclick="return confirm('Yakin hapus?')">Hapus</button>
 </form>
 </td>
 </tr>
 @endforeach
 </tbody>
 </table>
 {{ $siswa->links() }}
@endsection