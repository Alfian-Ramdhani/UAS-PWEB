<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pricing — LEARNBASE.</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --deep-green: #0E6853; --deep-green-dark: #0a4f3f; --deep-green-light: #E7F2EF;
      --orange: #FF5B35; --orange-light: #FFEFEA; --charcoal: #1A1A1A;
      --gray: #666; --gray-soft: #8A8A8A; --bg: #F7F9F8; --line: #EAEDEC; --border-light: #e8edec;
      --sidebar-w: 264px; --card-bg: #fff;
    }
    body.dark-mode {
      --deep-green: #1ABC9C; --deep-green-dark: #16A085; --deep-green-light: #1A3E3A;
      --orange: #FF7F50; --orange-light: #3E2A20; --charcoal: #E8E8E8;
      --gray: #B0B0B0; --gray-soft: #888; --bg: #0F171E; --line: #1F2A33;
      --border-light: #1F2A33; --card-bg: #1A2530;
    }
    * { box-sizing: border-box; }
    html { overflow-x: clip; }
    body {
      font-family: 'Inter', sans-serif; color: var(--charcoal); background: var(--bg);
      overflow-x: clip; position: relative; transition: background .3s, color .3s;
    }
    h1,h2,h3,h4,h5,h6,.brand-logo { font-family: 'Poppins', sans-serif; }
    a { text-decoration: none; }

    /* Decorative bg */
    .dash-bg-shapes { position: fixed; inset: 0; z-index: 0; pointer-events: none; overflow: hidden; }
    .dash-bg-shapes .bg-circle { position: absolute; border-radius: 50%; }
    .dash-bg-shapes .bg-circle.c1 { width: 520px; height: 520px; background: radial-gradient(circle, rgba(14,104,83,0.05) 0%, transparent 70%); top: -200px; right: -120px; }
    .dash-bg-shapes .bg-circle.c2 { width: 380px; height: 380px; background: radial-gradient(circle, rgba(255,91,53,0.04) 0%, transparent 70%); bottom: -150px; left: -100px; }
    .dash-bg-shapes .bg-dots { position: absolute; inset: 0; opacity: 0.25; background-image: radial-gradient(var(--border-light) 1px, transparent 1px); background-size: 32px 32px; }

    /* Navbar */
    .pricing-nav {
      position: sticky; top: 0; z-index: 1030;
      background: var(--card-bg); border-bottom: 1px solid var(--line);
      padding: 1rem 2rem; display: flex; align-items: center; gap: 1rem;
      transition: background .3s;
    }
    .pricing-nav .brand-logo { font-weight: 800; font-size: 1.3rem; color: var(--charcoal); letter-spacing: -.5px; }
    .pricing-nav .brand-logo span { color: var(--orange); }
    .pricing-nav .nav-back { margin-left: auto; color: var(--gray); font-weight: 500; font-size: .88rem; }
    .pricing-nav .nav-back:hover { color: var(--deep-green); }

    .content-wrap { padding: 3rem 2rem; position: relative; z-index: 1; }

    .pricing-head { text-align: center; margin-bottom: 2.5rem; }
    .pricing-head h1 { font-weight: 800; font-size: 2.2rem; color: var(--charcoal); margin-bottom: .5rem; }
    .pricing-head h1 span { color: var(--orange); }
    .pricing-head p { font-size: 1rem; color: var(--gray-soft); max-width: 520px; margin: 0 auto; }

    .pricing-row { display: flex; gap: 2rem; justify-content: center; align-items: stretch; flex-wrap: wrap; max-width: 800px; margin: 0 auto; }

    .pricing-card {
      flex: 1; min-width: 280px; max-width: 380px;
      background: var(--card-bg); border: 1px solid var(--line); border-radius: 24px;
      padding: 2.5rem 2rem; display: flex; flex-direction: column;
      transition: box-shadow .3s, transform .3s, background .3s;
      position: relative;
    }
    .pricing-card:hover { transform: translateY(-4px); box-shadow: 0 20px 40px rgba(0,0,0,.08); }
    .pricing-card.featured {
      border: 2px solid var(--deep-green);
      box-shadow: 0 8px 32px rgba(14,104,83,.12);
    }
    .pricing-card.featured:hover { box-shadow: 0 16px 40px rgba(14,104,83,.18); }

    .pricing-badge {
      position: absolute; top: -13px; left: 50%; transform: translateX(-50%);
      background: var(--deep-green); color: #fff;
      font-size: .72rem; font-weight: 700; text-transform: uppercase; letter-spacing: .5px;
      padding: .3rem 1.2rem; border-radius: 50px;
    }

    .pricing-plan { font-weight: 700; font-size: 1.2rem; color: var(--charcoal); margin-bottom: .25rem; }
    .pricing-price { font-weight: 800; font-size: 2.6rem; color: var(--deep-green); margin-bottom: .25rem; line-height: 1.1; }
    .pricing-price span { font-size: .95rem; font-weight: 500; color: var(--gray); }
    .pricing-desc { font-size: .85rem; color: var(--gray-soft); margin-bottom: 1.5rem; }

    .pricing-features { list-style: none; padding: 0; margin: 0 0 1.8rem; flex: 1; }
    .pricing-features li {
      padding: .6rem 0; font-size: .88rem; color: var(--charcoal);
      display: flex; align-items: center; gap: .65rem;
      border-bottom: 1px solid var(--bg);
    }
    .pricing-features li:last-child { border-bottom: none; }
    .pricing-features li .check { color: var(--deep-green); font-weight: 700; font-size: 1.1rem; }
    .pricing-features li .cross { color: var(--gray-soft); font-size: 1.1rem; }
    .pricing-features li .na { color: var(--gray-soft); }
    .pricing-features li.disabled { color: var(--gray-soft); }

    .btn-pricing {
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 60%, var(--deep-green));
      color: #fff; font-weight: 600; font-size: .92rem;
      padding: .75rem 1.5rem; border-radius: 50px; border: none;
      display: inline-flex; align-items: center; justify-content: center; gap: .5rem;
      transition: transform .2s; text-decoration: none;
    }
    .btn-pricing:hover { transform: translateY(-2px); color: #fff; }
    .btn-pricing-outline {
      background: transparent; color: var(--deep-green);
      border: 2px solid var(--deep-green);
    }
    .btn-pricing-outline:hover { background: var(--deep-green); color: #fff; }

    @media (max-width: 575.98px) {
      .content-wrap { padding: 1.5rem; }
      .pricing-head h1 { font-size: 1.6rem; }
      .pricing-card { padding: 1.8rem 1.5rem; }
    }
  </style>
</head>
<body>
  <script>if(localStorage.getItem("learnbase_dark_mode")==="true")document.body.classList.add("dark-mode");</script>

  <div class="dash-bg-shapes">
    <div class="bg-circle c1"></div>
    <div class="bg-circle c2"></div>
    <div class="bg-dots"></div>
  </div>

  <nav class="pricing-nav">
    <a href="#" class="brand-logo">LEARNBASE<span>.</span></a>
    <a href="<?= site_url('dashboard') ?>" class="nav-back">← Kembali</a>
  </nav>

  <div class="content-wrap">
    <div class="pricing-head">
      <h1>Pilih Paket <span>Belajarmu</span></h1>
      <p>Mulai perjalanan belajar coding dengan paket yang sesuai kebutuhanmu.</p>
    </div>

    <div class="pricing-row">
      <!-- FREE -->
      <div class="pricing-card">
        <div class="pricing-plan">Free</div>
        <div class="pricing-price">Gratis</div>
        <p class="pricing-desc">Coba belajar tanpa biaya, cukup daftar akun.</p>
        <ul class="pricing-features">
          <li><span class="check">✓</span> Akses ke semua modul (12 bahasa)</li>
          <li><span class="check">✓</span> Mini teks editor / code playground</li>
          <li><span class="check">✓</span> Progress tracking</li>
          <li><span class="cross">✗</span> Live chat mentor</li>
          <li><span class="cross">✗</span> Video pembelajaran terkait modul</li>
          <li><span class="cross">✗</span> Chatbot / AI assistant</li>
        </ul>
        <?php if (!$logged_in): ?>
        <a href="<?= site_url('auth/register') ?>" class="btn-pricing btn-pricing-outline">Daftar Gratis</a>
        <?php else: ?>
        <span style="display:inline-block;background:var(--deep-green-light);color:var(--deep-green);font-weight:600;font-size:.85rem;padding:.75rem 1.5rem;border-radius:50px;">✓ Sudah Terdaftar</span>
        <?php endif; ?>
      </div>

      <!-- PRO -->
      <div class="pricing-card featured">
        <div class="pricing-badge">Paling Populer</div>
        <div class="pricing-plan">Pro</div>
        <div class="pricing-price">Rp149K <span>/bulan</span></div>
        <p class="pricing-desc">Akses penuh semua fitur premium.</p>
        <ul class="pricing-features">
          <li><span class="check">✓</span> Semua fitur Free</li>
          <li><span class="check">✓</span> Live chat mentor</li>
          <li><span class="check">✓</span> Video pembelajaran terkait modul</li>
          <li><span class="check">✓</span> Chatbot / AI assistant</li>
          <li><span class="check">✓</span> Sertifikat premium</li>
        </ul>
        <?php if ($membership === 'premium'): ?>
        <span style="display:inline-block;background:var(--deep-green-light);color:var(--deep-green);font-weight:600;font-size:.85rem;padding:.75rem 1.5rem;border-radius:50px;">✓ Sudah Premium</span>
        <?php elseif ($logged_in): ?>
        <a href="<?= site_url('payment') ?>" class="btn-pricing">Langganan Pro</a>
        <?php else: ?>
        <a href="<?= site_url('auth/login') ?>" class="btn-pricing">Langganan Pro</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</body>
</html>
