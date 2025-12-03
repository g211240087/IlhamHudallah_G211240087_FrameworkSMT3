<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pinjam Buku</title>

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
        to   { opacity: 1; transform: translateY(0); }
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

    select, input[type="date"] {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #cbd5e1;
        margin-bottom: 18px;
        font-size: 15px;
        transition: 0.2s;
    }

    select:focus,
    input[type="date"]:focus {
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
        margin-top: 6px;
    }

    .btn-submit:hover {
        background: #1e40af;
        transform: translateY(-1px);
    }

    .btn-reset {
        width: 100%;
        padding: 12px;
        background: #6b7280;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        cursor: pointer;
        margin-top: 12px;
        transition: 0.2s;
    }

    .btn-reset:hover {
        background: #4b5563;
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

    /* Mobile */
    @media (max-width: 600px) {
        body { padding: 18px; }
        .container { padding: 26px; }
    }
</style>
</head>

<body>
<div class="container">
    <h2>Form Pinjam Buku</h2>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ url('pinjam/save') }}" method="post" accept-charset="utf-8">
        @csrf

        <label>Anggota</label>
        <select name="ID_Anggota">
            <option value="">-- Pilih Anggota --</option>
            @foreach ($anggota as $a)
                <option value="{{ $a->ID_Anggota }}"
                    {{ old('ID_Anggota') == $a->ID_Anggota ? 'selected' : '' }}>
                    {{ $a->nama }}
                </option>
            @endforeach
        </select>

        <label>Buku</label>
        <select name="ID_Buku">
            <option value="">-- Pilih Buku --</option>
            @foreach ($buku as $b)
                <option value="{{ $b->ID_Buku }}"
                    {{ old('ID_Buku') == $b->ID_Buku ? 'selected' : '' }}>
                    {{ $b->Judul }}
                </option>
            @endforeach
        </select>

        <label>Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam" value="{{ old('tgl_pinjam') }}">

        <label>Tanggal Kembali</label>
        <input type="date" name="tgl_kembali" value="{{ old('tgl_kembali') }}">

        <button type="submit" class="btn-submit">Simpan</button>
        <button type="reset" class="btn-reset">Batal</button>
    </form>

    <a href="{{ url('pinjam') }}" class="btn-back">Kembali</a>
</div>
</body>
</html>
