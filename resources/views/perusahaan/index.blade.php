<!DOCTYPE html>
<html>
<head>
    <title>🏢Data Perusahaan</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            margin:40px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table, th, td{
            border:1px solid #ddd;
        }

        th, td{
            padding:10px;
            text-align:left;
        }

        th{
            background:#0d6efd;
            color:white;
        }

        .btn{
            padding:8px 15px;
            text-decoration:none;
            color:white;
            border-radius:5px;
        }

        .tambah{
            background:green;
        }


        h2{
            color:black;
            background-color:blue;
            border:1px solid black;
            border-radius:5px;
        }
    </style>
</head>
<body>

<h2>🏢Data Perusahaan</h2>

@if(session('success'))
<p style="color:green">
    {{ session('success') }}
</p>
@endif

<table>
    <tr>
        <th>No</th>
        <th>Nama Perusahaan</th>
        <th>Alamat</th>
    </tr>

@foreach($perusahaan as $item)

<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $item->nama_perusahaan }}</td>
    <td>{{ $item->alamat }}</td>

    <td>

        <a href="{{ route('perusahaan.edit',$item->id) }}"
        class="btn edit">
            Edit
        </a>

        <form action="{{ route('perusahaan.destroy',$item->id) }}"
            method="POST"
            style="display:inline;">

        </form>

    </td>
</tr>

@endforeach

</table>

</body>
</html>