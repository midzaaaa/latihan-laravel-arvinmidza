<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Perusahaan</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background:#f5f5f5;
            margin:40px;
        }

        h2{
            text-align:center;
        }

        .btn{
            display:inline-block;
            padding:10px 18px;
            background:#0d6efd;
            color:white;
            text-decoration:none;
            border-radius:5px;
            margin-bottom:20px;
        }

        .btn:hover{
            background:#0b5ed7;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
        }

        table th{
            background:#0d6efd;
            color:white;
            padding:12px;
        }

        table td{
            padding:10px;
            border:1px solid #ddd;
        }

        tr:nth-child(even){
            background:#f8f8f8;
        }

        tr:hover{
            background:#eef5ff;
        }

        .aksi a{
            text-decoration:none;
            padding:6px 12px;
            border-radius:4px;
            color:white;
        }

        .edit{
            background:orange;
        }

        .hapus{
            background:red;
            border:none;
            color:white;
            padding:6px 12px;
            border-radius:4px;
            cursor:pointer;
        }
    </style>

</head>
<body>

<h2>🏢 Data Perusahaan</h2>

<a href="{{ route('perusahaan.create') }}" class="btn">
    + Tambah Perusahaan
</a>

<table>

    <tr>
        <th>No</th>
        <th>Nama Perusahaan</th>
        <th>Bidang Usaha</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Aksi</th>
    </tr>

    @foreach($perusahaan as $item)

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->nama_perusahaan }}</td>
        <td>{{ $item->bidang_usaha }}</td>
        <td>{{ $item->alamat }}</td>
        <td>{{ $item->telepon }}</td>

        <td class="aksi">

            <a href="{{ route('perusahaan.edit',$item->id) }}" class="edit">
                Edit
            </a>

            <form action="{{ route('perusahaan.destroy',$item->id) }}"
                  method="POST"
                  style="display:inline">

                @csrf
                @method('DELETE')

                <button type="submit"
                    class="hapus"
                    onclick="return confirm('Yakin ingin menghapus data?')">
                    Hapus
                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

</body>
</html>