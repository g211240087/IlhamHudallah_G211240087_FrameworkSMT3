<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Inter, Arial, sans-serif;
        background: #eef3ff;
        padding: 30px;
        display: flex;
        justify-content: center;
    }

    .container {
        width: 100%;
        max-width: 900px;
        background: #fff;
        padding: 28px;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        animation: fade .3s ease-in-out;
    }

    @keyframes fade {
        from { opacity: 0; transform: translateY(6px); }
        to { opacity: 1; transform: translateY(0); }
    }

    h2 {
        text-align: center;
        margin-bottom: 18px;
        color: #0f172a;
    }

    .btn-add {
        display: inline-block;
        margin-bottom: 14px;
        background: #2563eb;
        color: white !important;
        padding: 10px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 15px;
        transition: 0.2s;
    }

    .btn-add:hover {
        background: #1d4ed8;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 8px;
    }

    th {
        background: #1e40af;
        color: white;
        padding: 10px;
        font-size: 15px;
    }

    td {
        padding: 10px;
        font-size: 15px;
        border-bottom: 1px solid #d9d9d9;
        text-align: center;
    }

    tr:hover {
        background: #f1f5ff;
    }

    a.action {
        margin: 0 5px;
        color: #2563eb;
        font-weight: 600;
        text-decoration: none;
    }

    a.action:hover {
        text-decoration: underline;
        color: #1e3a8a;
    }

    .back {
        display: inline-block;
        margin-top: 18px;
        background: #6b7280;
        color: #fff !important;
        padding: 9px 14px;
        border-radius: 8px;
        font-size: 14px;
        text-decoration: none;
        transition: 0.2s;
    }

    .back:hover {
        background: #4b5563;
    }

    /* RESPONSIVE MODE */
    @media (max-width: 700px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }

        th {
            display: none;
        }

        tr {
            background: #f9fbff;
            margin-bottom: 10px;
            border-radius: 8px;
            padding: 12px;
        }

        td {
            border: none;
            text-align: left;
            padding: 6px 0;
            font-size: 15px;
        }

        td::before {
            content: attr(data-label);
            font-weight: 700;
            color: #475569;
            display: block;
        }

        .btn-add, .back {
            width: 100%;
            text-align: center;
        }
    }
</style>
</head>

<body>
<div class="container">
    <h2>Daftar Buku</h2>

    <a class="btn-add" href="{{ url('buku/add') }}"> Tambah Buku</a>

    <table>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>

        @php $no = 0; @endphp
        @foreach($query as $row)
        @php $no++; @endphp
        <tr>
            <td data-label="No">{{ $no }}</td>
            <td data-label="Judul">{{ $row['Judul'] }}</td>
            <td data-label="Pengarang">{{ $row['Pengarang'] }}</td>
            <td data-label="Kategori">{{ $optkategori[$row['Kategori']] }}</td>
            <td data-label="Aksi">
                <a class="action" href="{{ url('buku/edit/'.$row['ID_Buku']) }}">Edit</a>
                <a class="action" href="{{ url('buku/delete/'.$row['ID_Buku']) }}" onclick="return confirm('Yakin ingin menghapus buku ini?')">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>

    <p>{{ $query->links('vendor.pagination.mypage') }}</p>

    <a class="back" href="{{ url('perpus') }}">Kembali</a>
</div>
</body>
</html>
