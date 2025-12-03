<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Anggota</title>

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

    /* RESPONSIVE */
    @media (max-width: 700px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }
        th { display: none; }
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
    <h2>Daftar Anggota</h2>

    <a class="btn-add" href="/anggota/add">Tambah Anggota Baru</a>

    <table>
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Progdi</th>
            <th>Aksi</th>
        </tr>

        @foreach ($anggota as $a)
        <tr>
            <td data-label="ID">{{ $a->ID_Anggota }}</td>
            <td data-label="NIM">{{ $a->nim }}</td>
            <td data-label="Nama">{{ $a->nama }}</td>
            <td data-label="Progdi">{{ $a->progdi }}</td>
            <td data-label="Aksi">
                <a class="action" href="/anggota/edit/{{ $a->ID_Anggota }}">Edit</a>
                <a class="action" href="/anggota/delete/{{ $a->ID_Anggota }}" onclick="return confirm('Yakin ingin menghapus anggota ini?')">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>

    <p style="margin-top: 12px;">{{ $anggota->links('vendor.pagination.mypage') }}</p>

    <a class="back" href="{{ url('perpus') }}">Kembali</a>
</div>
</body>
</html>
