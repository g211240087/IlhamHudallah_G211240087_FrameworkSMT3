<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Inter, Arial, sans-serif;
        background: #eef3ff;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 40px;
    }

    .container {
        width: 100%;
        max-width: 600px;
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 28px rgba(0, 0, 0, 0.08);
        animation: fade .25s ease-in-out;
    }

    @keyframes fade {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    h2 {
        text-align: center;
        margin-bottom: 22px;
        color: #0f172a;
        font-size: 22px;
    }

    .errors {
        background: #fee2e2;
        color: #b91c1c;
        padding: 14px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
        border-left: 4px solid #dc2626;
    }

    label {
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 6px;
        display: block;
        color: #334155;
    }

    input[type="text"], select {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #cbd5e1;
        margin-bottom: 18px;
        font-size: 15px;
        transition: 0.2s;
    }

    input[type="text"]:focus,
    select:focus {
        border-color: #2563eb;
        outline: none;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        background: #2563eb;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        cursor: pointer;
        font-weight: 600;
        transition: 0.2s;
    }

    .btn-submit:hover {
        background: #1e40af;
        transform: translateY(-1px);
    }

    .btn-back {
        display: block;
        text-align: center;
        margin-top: 14px;
        padding: 10px;
        border-radius: 8px;
        background: #6b7280;
        color: #fff;
        text-decoration: none;
        transition: 0.2s;
        font-size: 14px;
    }

    .btn-back:hover {
        background: #4b5563;
    }

    /* Responsif Mobile */
    @media (max-width: 600px) {
        body { padding: 18px; }
        .container { padding: 26px; }
        h2 { font-size: 20px; }
        .btn-submit, .btn-back { font-size: 15px; }
    }
</style>
</head>

<body>
<div class="container">
    <h2>Tambah Buku Baru</h2>

    @if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ url('buku/save') }}" method="post" accept-charset="utf-8">
        @csrf
        <input type="hidden" name="id" value="">
        <input type="hidden" name="is_update" value="{{ $is_update }}">

        <label>Judul Buku</label>
        <input type="text" name="Judul" value="{{ old('Judul') }}" maxlength="100">

        <label>Pengarang</label>
        <input type="text" name="Pengarang" value="{{ old('Pengarang') }}" maxlength="150">

        <label>Kategori</label>
        <select name="Kategori">
            @foreach ($optkategori as $key => $value)
                <option value="{{ $key }}" {{ old('Kategori') == $key ? 'selected' : '' }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn-submit">Simpan Buku</button>
    </form>

    <a href="{{ url('buku') }}" class="btn-back">Kembali</a>
</div>
</body>
</html>
