<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Aplikasi Perpustakaan - Login</title>

  <style>
    /* Reset ringan */
    * { box-sizing: border-box; margin: 0; padding: 0; }
    html,body { height: 100%; }

    /* Warna — mudah disesuaikan */
    :root{
      --bg: #f3f6fb;
      --card: #ffffff;
      --primary: #2563eb; /* biru */
      --accent: #06b6d4;  /* aqua */
      --muted: #6b7280;
      --shadow: rgba(34,36,38,0.08);
      --radius: 12px;
      --max-width: 420px;
    }

    body{
      font-family: Inter, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
      background: linear-gradient(180deg,var(--bg) 0%, #eef4ff 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 32px;
      color: #111827;
    }

    /* Kartu form */
    .auth-card{
      width: 100%;
      max-width: var(--max-width);
      background: var(--card);
      border-radius: var(--radius);
      box-shadow: 0 8px 28px var(--shadow);
      padding: 28px;
      border: 1px solid rgba(16,24,40,0.04);
    }

    .brand {
      display: flex;
      gap: 12px;
      align-items: center;
      margin-bottom: 18px;
    }
    .brand .logo {
      width: 48px;
      height: 48px;
      border-radius: 10px;
      display: grid;
      place-items: center;
      background: linear-gradient(135deg,var(--primary),var(--accent));
      color: #fff;
      font-weight: 700;
      font-size: 20px;
      box-shadow: 0 6px 18px rgba(37,99,235,0.14);
    }
    .brand h1{
      font-size: 18px;
      letter-spacing: -0.2px;
      font-weight: 700;
    }
    .brand p{
      margin-top: 2px;
      font-size: 13px;
      color: var(--muted);
    }

    form {
      margin-top: 6px;
    }

    .field {
      display: flex;
      flex-direction: column;
      gap: 8px;
      margin-bottom: 14px;
    }

    label {
      font-size: 13px;
      color: #374151;
      font-weight: 600;
    }

    input[type="text"],
    input[type="password"]{
      width: 100%;
      padding: 12px 14px;
      border-radius: 10px;
      border: 1px solid rgba(15,23,42,0.06);
      background: #fbfdff;
      font-size: 14px;
      outline: none;
      transition: box-shadow .18s ease, border-color .12s ease, transform .12s ease;
    }

    input[type="text"]::placeholder,
    input[type="password"]::placeholder{
      color: #9ca3af;
    }

    input[type="text"]:focus,
    input[type="password"]:focus{
      border-color: rgba(37,99,235,0.9);
      box-shadow: 0 6px 18px rgba(37,99,235,0.12);
      transform: translateY(-1px);
    }

    .actions {
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap: 12px;
      margin-top: 8px;
    }

    .btn {
      display: inline-block;
      padding: 10px 16px;
      border-radius: 10px;
      border: none;
      cursor: pointer;
      font-weight: 600;
      font-size: 14px;
      transition: transform .12s ease, box-shadow .12s ease;
      text-decoration: none;
      color: white;
      background: linear-gradient(90deg,var(--primary), #1e40af);
      box-shadow: 0 8px 20px rgba(37,99,235,0.12);
    }
    .btn:active { transform: translateY(1px); }

    .btn.secondary {
      background: transparent;
      color: var(--muted);
      border: 1px solid rgba(15,23,42,0.06);
      box-shadow: none;
    }

    .note {
      font-size: 13px;
      color: var(--muted);
      margin-top: 12px;
      text-align: center;
    }

    /* small screens */
    @media (max-width:420px){
      body { padding: 18px; }
      .auth-card { padding: 20px; }
      .brand h1 { font-size: 16px; }
    }

    /* Accessible focus outline for keyboard users */
    :focus {
      outline: 3px solid rgba(37,99,235,0.14);
      outline-offset: 3px;
    }
  </style>
</head>
<body>
  <main class="auth-card" role="main" aria-labelledby="loginHeading">
    <div class="brand">
      <div class="logo" aria-hidden="true">P</div>
      <div>
        <h1 id="loginHeading">Aplikasi Perpustakaan</h1>
        <p>Silahkan masuk untuk melanjutkan</p>
      </div>
    </div>

    <!-- Form (sama seperti yang Anda berikan) -->
    <form action="{{ url('login') }}" method="post" autocomplete="on" novalidate>
        @csrf {{-- Token keamanan wajib di Laravel --}}

        <div class="field">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" required placeholder="Masukkan username" />
        </div>

        <div class="field">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" required placeholder="Masukkan password" />
        </div>

        <div class="actions">
          <input class="btn" type="submit" value="Login" />
        </div>

        <p class="note">Lupa password? Hubungi admin untuk reset.</p>
    </form>
  </main>
</body>
</html>
