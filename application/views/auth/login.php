<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LEARNBASE. — Sign In</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --deep-green: #0E6853;
      --deep-green-dark: #0a4f3f;
      --orange: #FF5B35;
      --charcoal: #1A1A1A;
      --gray: #666666;
      --light-bg: #f7faf9;
      --border-light: #e8edec;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    html, body {
      height: 100%;
      font-family: 'Inter', sans-serif;
      color: var(--charcoal);
    }

    h1, h2, h3, h4, .brand-font {
      font-family: 'Poppins', sans-serif;
    }

    .form-control:focus { box-shadow: none !important; }


    .auth-wrap {
      min-height: 100vh;
      min-height: 100dvh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
      background: #FFFFFF;
    }

    /* Decorative shapes */
    .auth-bg-shapes {
      position: absolute;
      inset: 0;
      z-index: 0;
      pointer-events: none;
      overflow: hidden;
    }

    .bg-circle {
      position: absolute;
      border-radius: 50%;
    }
    .bg-circle.c1 {
      width: 520px; height: 520px;
      background: radial-gradient(circle, rgba(14,104,83,0.07) 0%, transparent 70%);
      top: -160px; right: -120px;
    }
    .bg-circle.c2 {
      width: 380px; height: 380px;
      background: radial-gradient(circle, rgba(255,91,53,0.06) 0%, transparent 70%);
      bottom: -100px; left: -80px;
    }
    .bg-circle.c3 {
      width: 200px; height: 200px;
      background: radial-gradient(circle, rgba(14,104,83,0.05) 0%, transparent 70%);
      bottom: 20%; right: 10%;
    }

    /* Dot grid overlay */
    .bg-dots {
      position: absolute;
      inset: 0;
      z-index: 0;
      opacity: 0.35;
      background-image:
        radial-gradient(var(--border-light) 1px, transparent 1px);
      background-size: 32px 32px;
    }

    /* Brand watermark */
    .bg-watermark {
      position: absolute;
      z-index: 0;
      font-family: 'Poppins', sans-serif;
      font-weight: 800;
      font-size: 180px;
      color: rgba(14,104,83,0.025);
      letter-spacing: -6px;
      bottom: -20px;
      left: -20px;
      line-height: 1;
      pointer-events: none;
      user-select: none;
    }

    /* Floating accent line */
    .bg-accent-line {
      position: absolute;
      z-index: 0;
      width: 300px;
      height: 4px;
      background: linear-gradient(90deg, transparent, var(--deep-green), var(--orange), transparent);
      border-radius: 2px;
      top: 120px;
      right: 80px;
      transform: rotate(-12deg);
      opacity: 0.15;
    }
    .bg-accent-line.l2 {
      width: 200px;
      top: auto;
      bottom: 160px;
      right: auto;
      left: 60px;
      transform: rotate(8deg);
      opacity: 0.10;
    }

    /* Top-left fixed brand mark */
    .page-brand {
      position: absolute;
      top: 28px;
      left: 32px;
      z-index: 2;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .page-brand-mark {
      width: 38px; height: 38px;
      border-radius: 10px;
      background: linear-gradient(135deg, var(--deep-green), #12856b);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 14px;
      color: #fff;
      box-shadow: 0 4px 12px rgba(14,104,83,0.2);
    }
    .page-brand-name {
      font-family: 'Poppins', sans-serif;
      font-size: 16px;
      font-weight: 700;
      color: var(--charcoal);
      letter-spacing: -0.3px;
    }
    .page-brand-name span { color: var(--orange); }

    @media (max-width: 576px) {
      .page-brand { top: 18px; left: 18px; }
    }

    /* ===== FORM CONTAINER (no card) ===== */
    .auth-form-wrap {
      position: relative;
      z-index: 1;
      width: 100%;
      max-width: 420px;
      padding: 1rem;
    }

    .auth-form-wrap .form-stage {
      width: 100%;
    }

    /* ===== FORM STAGES ===== */
    .form-stage {
      position: relative;
      width: 100%;
    }

    .form-panel {
      width: 100%;
    }

    .form-panel.panel-login { display: block; }
    .form-panel.panel-register { display: none; }

    body.mode-register .form-panel.panel-login { display: none; }
    body.mode-register .form-panel.panel-register { display: block; }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(8px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    body.mode-register .form-panel.panel-register,
    body.mode-login .form-panel.panel-login {
      animation: fadeUp .3s ease both;
    }

    .form-panel h2 {
      font-family: 'Poppins', sans-serif;
      font-size: 22px;
      font-weight: 700;
      color: var(--charcoal);
      letter-spacing: -0.5px;
      margin-bottom: 4px;
      text-align: center;
    }
    .form-sub {
      font-size: 14px;
      color: var(--gray);
      line-height: 1.5;
      margin-bottom: 20px !important;
      text-align: center;
    }

    /* Form controls */
    .form-panel .form-label {
      font-size: 12.5px;
      font-weight: 600;
      color: var(--charcoal);
      margin-bottom: 6px;
    }

    .form-panel .form-control {
      border-radius: 12px;
      border: 2px solid var(--border-light);
      background: #fafcfb;
      font-family: 'Inter', sans-serif;
      font-size: 14px;
      color: var(--charcoal);
      padding: 10px 14px;
      min-height: auto;
      transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
    }
    .form-panel .form-control::placeholder {
      color: var(--gray);
      opacity: 0.4;
    }
    .form-panel .form-control:focus {
      border-color: var(--deep-green);
      background: #fff;
      box-shadow: 0 0 0 4px rgba(14,104,83,0.1) !important;
    }

    .password-wrap { position: relative; }
    .toggle-pass {
      position: absolute; right: 12px; top: 50%;
      transform: translateY(-50%);
      background: none; border: none;
      cursor: pointer;
      padding: 4px;
      color: var(--gray);
      z-index: 2;
      display: flex;
      align-items: center;
      transition: color .2s ease;
    }
    .toggle-pass:hover { color: var(--deep-green); }

    /* Checkbox */
    .form-panel .form-check {
      margin-bottom: 0;
      min-height: auto;
    }
    .form-panel .form-check-input {
      width: 16px; height: 16px;
      margin-top: 0;
      border-radius: 4px;
      border: 2px solid var(--border-light);
      background: #fafcfb;
      cursor: pointer;
      flex-shrink: 0;
    }
    .form-panel .form-check-input:checked {
      background-color: var(--deep-green);
      border-color: var(--deep-green);
    }
    .form-panel .form-check-input:focus {
      box-shadow: 0 0 0 4px rgba(14,104,83,0.1) !important;
      border-color: var(--deep-green);
    }
    .form-panel .form-check-label {
      font-size: 12.5px;
      color: var(--gray);
      cursor: pointer;
    }
    .forgot-link {
      font-size: 12.5px;
      color: var(--deep-green);
      text-decoration: none;
      font-weight: 500;
      transition: color 0.2s ease;
    }
    .forgot-link:hover { color: var(--orange); }

    /* CTA Button */
    .btn-primary-custom {
      width: 100%;
      padding: 11px;
      border: none;
      border-radius: 12px;
      background: linear-gradient(135deg, var(--deep-green), #12856b);
      color: #fff;
      font-family: 'Poppins', sans-serif;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: transform .15s ease, box-shadow .2s ease;
      position: relative;
      overflow: hidden;
    }
    .btn-primary-custom::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, transparent, rgba(255,255,255,0.08));
      pointer-events: none;
    }
    .btn-primary-custom:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(14,104,83,0.3);
    }
    .btn-primary-custom:active {
      transform: translateY(0);
    }
    .btn-primary-custom.loading {
      opacity: 0.7;
      pointer-events: none;
    }

    /* Divider */
    .divider {
      display: flex; align-items: center; gap: 12px;
      font-size: 12px; color: var(--gray); opacity: 0.6;
    }
    .divider::before, .divider::after {
      content: ''; flex: 1; height: 1px; background: var(--border-light);
    }

    /* Social */
    .social-row {
      display: flex;
      gap: 10px;
    }
    .social-btn {
      flex: 1;
      padding: 9px;
      border-radius: 12px;
      border: 2px solid var(--border-light);
      background: #fafcfb;
      font-size: 13px; font-weight: 500;
      color: var(--gray); cursor: pointer;
      transition: border-color .2s, background .2s, transform .15s;
      font-family: 'Inter', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
    }
    .social-btn:hover {
      border-color: var(--deep-green);
      background: #fff;
      transform: translateY(-1px);
    }

    /* Switch auth mode */
    .form-switch {
      text-align: center;
      font-size: 13px;
      color: var(--gray);
    }
    .form-switch a {
      color: var(--deep-green);
      font-weight: 600;
      cursor: pointer;
      text-decoration: none;
      transition: color 0.2s ease;
    }
    .form-switch a:hover { color: var(--orange); }

    .terms {
      font-size: 11.5px; color: var(--gray);
      line-height: 1.5;
    }
    .terms a { color: var(--deep-green); text-decoration: none; }
    .terms a:hover { color: var(--orange); }

    /* Alert message (error / success) */
    .auth-alert {
      display: none;
      align-items: center;
      gap: 8px;
      font-size: 12.5px;
      font-weight: 500;
      padding: 10px 12px;
      border-radius: 10px;
      margin-bottom: 14px;
      line-height: 1.4;
    }
    .auth-alert.show { display: flex; }
    .auth-alert.error {
      background: #FFEFEA;
      color: #C13B15;
    }
    .auth-alert.success {
      background: #E7F2EF;
      color: var(--deep-green-dark);
    }
    .auth-alert svg { flex-shrink: 0; }

    /* Back to home */
    .back-home {
      text-align: center;
      margin-top: 1rem;
    }
    .back-home a {
      font-size: 0.85rem;
      color: var(--gray);
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      transition: color 0.2s ease;
    }
    .back-home a:hover { color: var(--deep-green); }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 576px) {
      .auth-form-wrap { padding: 0.75rem; }
      .form-panel h2 { font-size: 20px; }
      .bg-watermark { display: none; }
      .bg-accent-line { display: none; }
    }
    @media (max-width: 414px) {
      .name-row { flex-direction: column; gap: 0; }
      .social-row { flex-direction: column; }
    }
  </style>
</head>
<body class="mode-login">

<div class="auth-wrap">

  <div class="auth-bg-shapes">
    <div class="bg-circle c1"></div>
    <div class="bg-circle c2"></div>
    <div class="bg-circle c3"></div>
    <div class="bg-dots"></div>
    <div class="bg-watermark">LEARNBASE.</div>
    <div class="bg-accent-line"></div>
    <div class="bg-accent-line l2"></div>
  </div>

  <div class="page-brand">
    <div class="page-brand-mark">LB</div>
    <span class="page-brand-name">LEARNBASE<span>.</span></span>
  </div>

  <div class="auth-form-wrap">
      <div class="form-stage">

        <form class="form-panel panel-login" method="POST" action="<?= site_url('auth/login') ?>">
          <h2>Selamat Datang</h2>
          <p class="form-sub">Masuk untuk melanjutkan belajar.</p>

          <?php $reg_msg = $this->session->flashdata('reg_success'); ?>
          <div class="auth-alert success" id="loginSuccess" style="display:<?= $reg_msg ? 'block' : 'none' ?>;color:#0E6853;background:#e6f7f2;border:1px solid #0E6853;padding:10px;border-radius:8px;margin-bottom:12px;">
            <?= $reg_msg ?>
          </div>
          <div class="auth-alert error" id="loginAlert"><?= isset($error) ? $error : '' ?></div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="saya@email.com" autocomplete="email" id="loginEmail" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Kata Sandi</label>
            <div class="password-wrap">
              <input type="password" name="password" class="form-control" placeholder="Masukkan kata sandi" autocomplete="current-password" id="loginPass" required>
              <button class="toggle-pass" type="button" onclick="togglePass(this)" aria-label="Toggle password">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                  <circle cx="12" cy="12" r="3"></circle>
                </svg>
              </button>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="remember" id="rememberMe" checked>
              <label class="form-check-label" for="rememberMe">Ingat saya</label>
            </div>
            <a href="#" class="forgot-link">Lupa kata sandi?</a>
          </div>
          <button class="btn-primary-custom" type="submit">Masuk</button>
          <div class="divider my-4">atau masuk dengan</div>
          <div class="social-row mb-4">
            <a href="#" class="social-btn text-decoration-none">
              <svg width="16" height="16" viewBox="0 0 48 48"><path fill="#FFC107" d="M43.6 20.5h-1.9V20.4H24v7.2h11.3c-1.6 4.6-6 7.9-11.3 7.9-6.6 0-12-5.4-12-12s5.4-12 12-12c3.1 0 5.9 1.2 8 3.1l5.1-5.1C33.6 6.1 29 4.4 24 4.4 13.2 4.4 4.4 13.2 4.4 24S13.2 43.6 24 43.6 43.6 34.8 43.6 24c0-1.2-.1-2.4-.4-3.5z"/><path fill="#FF3D00" d="M6.3 14.7l5.9 4.3C13.7 15.6 18.5 12.4 24 12.4c3.1 0 5.9 1.2 8 3.1l5.1-5.1C33.6 6.1 29 4.4 24 4.4c-7.7 0-14.3 4.4-17.7 10.3z"/><path fill="#4CAF50" d="M24 43.6c5 0 9.5-1.9 12.9-5l-6-5c-2 1.4-4.5 2.2-6.9 2.2-5.3 0-9.7-3.3-11.3-7.9l-5.9 4.6c3.3 6.6 10 11.1 17.2 11.1z"/><path fill="#1976D2" d="M43.6 20.5h-1.9V20.4H24v7.2h11.3c-.8 2.2-2.2 4.1-4.1 5.4l6 5c-.4.4 6.4-4.6 6.4-13.6 0-1.2-.1-2.4-.4-3.5z"/></svg>
              Google
            </a>
            <a href="#" class="social-btn text-decoration-none">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.44 9.82 8.2 11.4.6.11.82-.26.82-.58v-2.17c-3.34.72-4.04-1.61-4.04-1.61-.55-1.39-1.34-1.76-1.34-1.76-1.09-.74.08-.73.08-.73 1.2.08 1.83 1.24 1.83 1.24 1.07 1.84 2.82 1.31 3.5 1 .11-.77.42-1.31.76-1.61-2.66-.3-5.46-1.33-5.46-5.93 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.12-3.17 0 0 1-.32 3.3 1.23.96-.27 1.98-.4 3-.4s2.04.13 3 .4c2.3-1.55 3.3-1.23 3.3-1.23.66 1.65.25 2.87.12 3.17.77.84 1.24 1.91 1.24 3.22 0 4.6-2.8 5.63-5.48 5.92.43.37.82 1.1.82 2.22v3.29c0 .32.22.7.83.58C20.57 21.82 24 17.31 24 12 24 5.37 18.63 0 12 0z"/></svg>
              GitHub
            </a>
          </div>
          <div class="form-switch">
            Belum punya akun? <a href="#" onclick="switchMode('register'); return false;">Daftar Sekarang</a>
          </div>
          <div class="back-home">
            <a href="<?= site_url('landingpage') ?>">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
              </svg>
              Kembali ke Beranda
            </a>
          </div>
        </form>

        <form class="form-panel panel-register" method="POST" action="<?= site_url('auth/register') ?>">
          <h2>Buat Akun</h2>
          <p class="form-sub">Mulai perjalanan belajarmu — gratis.</p>

          <div class="auth-alert error" id="regAlert"><?= isset($reg_error) ? $reg_error : '' ?></div>

          <div class="row mb-3 name-row">
            <div class="col">
              <label class="form-label">Nama Depan</label>
              <input type="text" name="first_name" class="form-control" placeholder="John" id="regFirst" required>
            </div>
            <div class="col">
              <label class="form-label">Nama Belakang</label>
              <input type="text" name="last_name" class="form-control" placeholder="Doe" id="regLast" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="saya@email.com" autocomplete="email" id="regEmail" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Kata Sandi</label>
            <div class="password-wrap">
              <input type="password" name="password" class="form-control" placeholder="Min. 8 karakter" autocomplete="new-password" id="regPass" required>
              <button class="toggle-pass" type="button" onclick="togglePass(this)" aria-label="Toggle password">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                  <circle cx="12" cy="12" r="3"></circle>
                </svg>
              </button>
            </div>
          </div>
          <div class="terms mb-4">
            Dengan mendaftar, kamu menyetujui <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a>.
          </div>
          <button class="btn-primary-custom" type="submit">Daftar Sekarang</button>
          <div class="divider my-4">atau daftar dengan</div>
          <div class="social-row mb-4">
            <a href="#" class="social-btn text-decoration-none">
              <svg width="16" height="16" viewBox="0 0 48 48"><path fill="#FFC107" d="M43.6 20.5h-1.9V20.4H24v7.2h11.3c-1.6 4.6-6 7.9-11.3 7.9-6.6 0-12-5.4-12-12s5.4-12 12-12c3.1 0 5.9 1.2 8 3.1l5.1-5.1C33.6 6.1 29 4.4 24 4.4 13.2 4.4 4.4 13.2 4.4 24S13.2 43.6 24 43.6 43.6 34.8 43.6 24c0-1.2-.1-2.4-.4-3.5z"/><path fill="#FF3D00" d="M6.3 14.7l5.9 4.3C13.7 15.6 18.5 12.4 24 12.4c3.1 0 5.9 1.2 8 3.1l5.1-5.1C33.6 6.1 29 4.4 24 4.4c-7.7 0-14.3 4.4-17.7 10.3z"/><path fill="#4CAF50" d="M24 43.6c5 0 9.5-1.9 12.9-5l-6-5c-2 1.4-4.5 2.2-6.9 2.2-5.3 0-9.7-3.3-11.3-7.9l-5.9 4.6c3.3 6.6 10 11.1 17.2 11.1z"/><path fill="#1976D2" d="M43.6 20.5h-1.9V20.4H24v7.2h11.3c-.8 2.2-2.2 4.1-4.1 5.4l6 5c-.4.4 6.4-4.6 6.4-13.6 0-1.2-.1-2.4-.4-3.5z"/></svg>
              Google
            </a>
            <a href="#" class="social-btn text-decoration-none">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.44 9.82 8.2 11.4.6.11.82-.26.82-.58v-2.17c-3.34.72-4.04-1.61-4.04-1.61-.55-1.39-1.34-1.76-1.34-1.76-1.09-.74.08-.73.08-.73 1.2.08 1.83 1.24 1.83 1.24 1.07 1.84 2.82 1.31 3.5 1 .11-.77.42-1.31.76-1.61-2.66-.3-5.46-1.33-5.46-5.93 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.12-3.17 0 0 1-.32 3.3 1.23.96-.27 1.98-.4 3-.4s2.04.13 3 .4c2.3-1.55 3.3-1.23 3.3-1.23.66 1.65.25 2.87.12 3.17.77.84 1.24 1.91 1.24 3.22 0 4.6-2.8 5.63-5.48 5.92.43.37.82 1.1.82 2.22v3.29c0 .32.22.7.83.58C20.57 21.82 24 17.31 24 12 24 5.37 18.63 0 12 0z"/></svg>
              GitHub
            </a>
          </div>
          <div class="form-switch">
            Sudah punya akun? <a href="#" onclick="switchMode('login'); return false;">Masuk</a>
          </div>
          <div class="back-home">
            <a href="<?= site_url('landingpage') ?>">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
              </svg>
              Kembali ke Beranda
            </a>
          </div>
        </form>

      </div>
  </div>
</div>

<script>
  // UI Function: Mengubah tipe input password (Text <-> Password)
  function togglePass(btn) {
    var wrap = btn.parentElement;
    var inp = wrap.querySelector('input');
    if (!inp) return;
    inp.type = inp.type === 'password' ? 'text' : 'password';
    btn.innerHTML = inp.type === 'text'
      ? '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>'
      : '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>';
  }

  // UI Function: Berpindah panel dari Login ke Register atau sebaliknya
  function switchMode(mode) {
    var body = document.body;
    if (mode === 'register') {
      if (body.classList.contains('mode-register')) return;
      body.classList.remove('mode-login');
      body.classList.add('mode-register');
      document.title = 'LEARNBASE. — Daftar Akun';
    } else {
      if (body.classList.contains('mode-login')) return;
      body.classList.remove('mode-register');
      body.classList.add('mode-login');
      document.title = 'LEARNBASE. — Masuk';
    }
  }
</script>

</body>
</html>