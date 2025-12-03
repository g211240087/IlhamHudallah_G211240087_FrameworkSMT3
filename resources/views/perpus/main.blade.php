<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Aplikasi Perpustakaan</title>

   <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

body {
    font-family: Inter, Arial, sans-serif;
    background: linear-gradient(180deg, #eef3ff, #d8e5ff);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center; /* ❗ ubah flex-start → center */
    padding: 20px;
    color: #1e293b;
}


.container {
    width: 100%;
    max-width: 680px; /* tambah sedikit */
    background: #ffffff;
    padding: 32px;
    border-radius: 14px;
    box-shadow: 0 8px 28px rgba(0, 0, 0, 0.08);
    border: 1px solid rgba(0, 0, 0, 0.05);
    animation: fade 0.3s ease-in-out;
}


    @keyframes fade {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    h2 {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 6px;
        color: #0f172a;
        letter-spacing: -0.5px;
        text-align: center;
    }

    p.subtitle {
        font-size: 14px;
        margin-bottom: 22px;
        color: #64748b;
        text-align: center;
    }

    b {
        font-size: 16px;
    }

    ol {
        margin: 14px 0 26px 20px;
        font-size: 16px;
        display: grid;
        gap: 14px;
    }

    a {
        text-decoration: none;
        color: #2563eb;
        font-weight: 600;
        transition: 0.2s ease;
    }

    a:hover {
        color: #1e40af;
        text-decoration: underline;
    }

    .logout {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 16px;
        background: #ef4444;
        color: #fff !important;
        border-radius: 8px;
        font-size: 14px;
        transition: 0.2s ease;
    }

    .logout:hover {
        background: #b91c1c;
        transform: translateY(-1px);
    }

    /* ==========================
       🌟 RESPONSIVE OPTIMIZATION
       ========================== */

    @media (max-width: 600px) {
        body {
            padding: 18px;
            align-items: center;
        }

        .container {
            padding: 24px;
            border-radius: 10px;
        }

        h2 {
            font-size: 20px;
        }

        ol {
            font-size: 15px;
            margin-left: 16px;
            gap: 10px;
        }

        .logout {
            width: 100%;
            text-align: center;
            font-size: 15px;
        }
    }

    @media (max-width: 380px) {
        .container {
            padding: 20px;
        }

        h2 {
            font-size: 19px;
        }

        p.subtitle {
            font-size: 13px;
        }

        ol {
            font-size: 14px;
            margin-left: 14px;
        }
    }
</style>

</head>

<body>
    <div class="container">
        <h2>Aplikasi Perpustakaan FTIK USM</h2>
        <p class="subtitle">Silahkan pilih menu untuk mengelola data.</p>

        <b>Pilihan menu :</b>
        <ol>
            <li><a href="{{ url('buku') }}">Kelola data buku</a></li>
            <li><a href="{{ url('anggota') }}">Kelola data anggota</a></li>
            <li><a href="{{ url('pinjam') }}">Kelola Transaksi Pinjam</a></li>
        </ol>

        <a class="logout" href="{{ url('logout') }}">Logout</a>
    </div>
</body>

</html>
