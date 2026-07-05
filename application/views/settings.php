<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Settings — LEARNBASE.</title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" />

  <style>
    :root {
      --deep-green: #0E6853;
      --deep-green-dark: #0a4f3f;
      --deep-green-light: #E7F2EF;
      --orange: #FF5B35;
      --orange-light: #FFEFEA;
      --charcoal: #1A1A1A;
      --gray: #666666;
      --gray-soft: #8A8A8A;
      --bg: #F7F9F8;
      --line: #EAEDEC;
      --border-light: #e8edec;
      --sidebar-w: 264px;
      --card-bg: #fff;
      --text-primary: #1A1A1A;
      --text-secondary: #666;
    }

    body.dark-mode {
      --deep-green: #1ABC9C;
      --deep-green-dark: #16A085;
      --deep-green-light: #1A3E3A;
      --orange: #FF7F50;
      --orange-light: #3E2A20;
      --charcoal: #E8E8E8;
      --gray: #B0B0B0;
      --gray-soft: #888;
      --bg: #0F171E;
      --line: #1F2A33;
      --border-light: #1F2A33;
      --card-bg: #1A2530;
      --text-primary: #E8E8E8;
      --text-secondary: #999;
    }

    * { box-sizing: border-box; }
    html { overflow-x: clip; }
    body {
      font-family: 'Inter', sans-serif;
      color: var(--text-primary);
      background-color: var(--bg);
      overflow-x: clip;
      position: relative;
      transition: background-color .3s, color .3s;
    }

    body.dark-mode .sidebar,
    body.dark-mode .top-header,
    body.dark-mode .profile-dropdown,
    body.dark-mode .settings-card,
    body.dark-mode .site-footer {
      background: var(--card-bg);
    }
    body.dark-mode .settings-card,
    body.dark-mode .top-header,
    body.dark-mode .sidebar,
    body.dark-mode .site-footer { border-color: var(--line); }
    body.dark-mode .search-box input,
    body.dark-mode .settings-input,
    body.dark-mode .settings-select {
      background: #0F171E;
      border-color: var(--line);
      color: var(--text-primary);
    }
    body.dark-mode .icon-btn { background: var(--card-bg); border-color: var(--line); }
    body.dark-mode .dash-bg-shapes .bg-circle.c1 {
      background: radial-gradient(circle, rgba(26,188,156,0.08) 0%, transparent 70%);
    }

    body.sidebar-collapsed .sidebar {
      transform: translateX(calc(var(--sidebar-w) * -1));
    }
    body.sidebar-collapsed .main-area { margin-left: 0; }
    body.sidebar-collapsed .sidebar-toggle-collapse svg { transform: rotate(180deg); }

    .dash-bg-shapes {
      position: fixed; inset: 0; z-index: 0; pointer-events: none; overflow: hidden;
    }
    .dash-bg-shapes .bg-circle { position: absolute; border-radius: 50%; }
    .dash-bg-shapes .bg-circle.c1 {
      width: 520px; height: 520px;
      background: radial-gradient(circle, rgba(14,104,83,0.05) 0%, transparent 70%);
      top: -200px; right: -120px;
    }
    .dash-bg-shapes .bg-circle.c2 {
      width: 380px; height: 380px;
      background: radial-gradient(circle, rgba(255,91,53,0.04) 0%, transparent 70%);
      bottom: -150px; left: -100px;
    }
    .dash-bg-shapes .bg-dots {
      position: absolute; inset: 0; opacity: 0.25;
      background-image: radial-gradient(var(--border-light) 1px, transparent 1px);
      background-size: 32px 32px;
    }

    h1,h2,h3,h4,h5,h6,.brand-logo { font-family: 'Poppins', sans-serif; }
    a { text-decoration: none; }

    .sidebar {
      position: fixed; top: 0; left: 0; bottom: 0;
      width: var(--sidebar-w); background: #fff;
      border-right: 1px solid var(--line);
      padding: 1.75rem 1.25rem;
      display: flex; flex-direction: column;
      transition: transform .25s ease, background .3s;
      z-index: 1050;
    }
    .sidebar .brand-logo {
      font-weight: 800; font-size: 1.35rem;
      color: var(--charcoal); letter-spacing: -.5px;
      padding: 0 .5rem; margin-bottom: 2.25rem; display: inline-block;
    }
    .sidebar .brand-logo span { color: var(--orange); }
    .side-nav { list-style: none; padding: 0; margin: 0; flex: 1; }
    .side-nav .nav-label {
      font-size: .72rem; font-weight: 600; letter-spacing: .08em;
      text-transform: uppercase; color: var(--gray-soft);
      padding: 0 .75rem; margin: .25rem 0 .75rem;
    }
    .side-nav li { margin-bottom: .3rem; }
    .side-link {
      display: flex; align-items: center; gap: .75rem;
      padding: .7rem .9rem; border-radius: 12px;
      color: var(--gray); font-weight: 500; font-size: .95rem;
      transition: background .15s, color .15s;
    }
    .side-link svg { flex-shrink: 0; opacity: .85; }
    .side-link:hover { background: var(--deep-green-light); color: var(--deep-green-dark); }
    .side-link.active {
      background: linear-gradient(135deg,var(--orange),var(--deep-green) 65%,var(--deep-green));
      color: #fff; box-shadow: 0 10px 22px rgba(14,104,83,.25);
    }
    .side-link.active svg { opacity: 1; }
    .sidebar-footer { border-top: 1px solid var(--line); padding-top: 1rem; margin-top: 1rem; }
    .upgrade-card { background: var(--deep-green-light); border-radius: 16px; padding: 1rem; text-align: center; }
    .upgrade-card p { font-size: .8rem; color: var(--deep-green-dark); margin-bottom: .7rem; font-weight: 500; line-height: 1.4; }
    .btn-upgrade {
      background: linear-gradient(135deg,var(--orange),var(--deep-green) 60%,var(--deep-green));
      color: #fff; font-weight: 600; font-size: .82rem; padding: .5rem 1rem;
      border-radius: 50px; border: none; display: inline-block;
    }

    .main-area { margin-left: var(--sidebar-w); min-height: 100vh; position: relative; z-index: 1; background: transparent; }
    .sidebar-backdrop { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.35); z-index: 1040; }
    .sidebar-backdrop.show { display: block; }

    .top-header {
      position: sticky; top: 0; z-index: 1030; background: #fff;
      border-bottom: 1px solid var(--line);
      padding: 1rem 2rem;
      display: flex; align-items: center; gap: 1.25rem;
      transition: background .3s;
    }
    .sidebar-toggle { display: none; background: none; border: none; padding: .4rem; color: var(--charcoal); }
    .sidebar-toggle-collapse {
      background: none; border: none; padding: .4rem; color: var(--gray-soft);
      display: inline-flex; align-items: center; transition: color .15s;
    }
    .sidebar-toggle-collapse:hover { color: var(--deep-green); }
    .sidebar-toggle-collapse svg { transition: transform .25s; }
    .header-right { margin-left: auto; display: flex; align-items: center; gap: 1.1rem; }

    .icon-btn {
      position: relative; width: 42px; height: 42px; border-radius: 50%;
      background: var(--bg); border: 1px solid var(--line);
      display: flex; align-items: center; justify-content: center;
      color: var(--charcoal); transition: background .15s;
    }
    .icon-btn:hover { background: var(--deep-green-light); }
    .icon-btn .dot-badge {
      position: absolute; top: 9px; right: 10px;
      width: 8px; height: 8px; border-radius: 50%;
      background: var(--orange); border: 2px solid #fff;
    }

    .profile-wrap { position: relative; }
    .profile-chip {
      display: flex; align-items: center; gap: .65rem;
      padding-left: 1rem; border-left: 1px solid var(--line);
      cursor: pointer; user-select: none;
    }
    .profile-avatar {
      width: 42px; height: 42px; border-radius: 50%;
      background: linear-gradient(135deg,var(--orange),var(--deep-green) 65%,var(--deep-green));
      display: flex; align-items: center; justify-content: center;
      color: #fff; font-weight: 700; font-family: 'Poppins', sans-serif; font-size: .95rem;
    }
    .profile-chip .name { font-weight: 600; font-size: .88rem; color: var(--charcoal); line-height: 1.2; }
    .profile-chip .role { font-size: .75rem; color: var(--gray-soft); }

    .profile-dropdown {
      position: absolute; top: calc(100% + 10px); right: 0;
      min-width: 210px; background: #fff; border: 1px solid var(--line);
      border-radius: 14px; box-shadow: 0 16px 32px rgba(0,0,0,.1);
      padding: .5rem; display: none; z-index: 1060;
      transition: background .3s;
    }
    .profile-dropdown.open { display: block; }
    .profile-dropdown-item {
      width: 100%; display: flex; align-items: center; gap: .6rem;
      background: none; border: none; text-align: left;
      padding: .6rem .7rem; border-radius: 10px;
      font-size: .85rem; font-weight: 500; color: var(--charcoal);
      transition: background .15s;
    }
    .profile-dropdown-item:hover { background: var(--deep-green-light); color: var(--deep-green-dark); }
    .profile-dropdown-item.danger { color: var(--orange); }
    .profile-dropdown-item.danger:hover { background: var(--orange-light); }
    .profile-dropdown-divider { height: 1px; background: var(--line); margin: .4rem .2rem; }

    /* ===== SETTINGS CONTENT ===== */
    .content-wrap { padding: 2rem; }
    .settings-header { margin-bottom: 1.75rem; }
    .settings-title { font-weight: 700; font-size: 1.6rem; color: var(--charcoal); margin-bottom: .35rem; }
    .settings-subtitle { font-size: .92rem; color: var(--gray-soft); }

    .settings-card {
      background: #fff; border: 1px solid var(--line); border-radius: 18px;
      padding: 1.75rem 2rem; margin-bottom: 1.25rem;
      transition: background .3s;
    }
    .settings-card-title {
      font-weight: 700; font-size: 1.1rem; color: var(--charcoal);
      margin-bottom: .25rem;
    }
    .settings-card-desc { font-size: .85rem; color: var(--gray-soft); margin-bottom: 1.25rem; }

    .settings-row {
      display: flex; align-items: center; justify-content: space-between;
      padding: .85rem 0; border-bottom: 1px solid var(--bg);
      gap: 1rem; flex-wrap: wrap;
    }
    .settings-row:last-child { border-bottom: none; }
    .settings-row-label { font-weight: 600; font-size: .9rem; color: var(--charcoal); min-width: 140px; }
    .settings-row-desc { font-size: .8rem; color: var(--gray-soft); margin-top: .15rem; }
    .settings-row-value { flex: 1; min-width: 0; }
    .settings-input {
      width: 100%; max-width: 340px; background: var(--bg);
      border: 2px solid var(--line); border-radius: 10px;
      padding: .6rem .9rem; font-size: .88rem; color: var(--charcoal);
      font-family: 'Inter', sans-serif; outline: none;
      transition: border .2s;
    }
    .settings-input:focus { border-color: var(--deep-green); background: #fff; }
    body.dark-mode .settings-input:focus { background: #0F171E; }

    .settings-select {
      background: var(--bg); border: 2px solid var(--line); border-radius: 10px;
      padding: .55rem .9rem; font-size: .88rem; color: var(--charcoal);
      font-family: 'Inter', sans-serif; outline: none; min-width: 160px;
    }
    .settings-select:focus { border-color: var(--deep-green); }

    .btn-settings {
      background: linear-gradient(135deg,var(--orange),var(--deep-green) 60%,var(--deep-green));
      color: #fff; font-weight: 600; font-size: .85rem;
      padding: .55rem 1.3rem; border-radius: 50px; border: none;
      display: inline-flex; align-items: center; gap: .4rem;
      cursor: pointer; transition: transform .2s;
    }
    .btn-settings:hover { transform: translateY(-1px); color: #fff; }
    .btn-settings-outline {
      background: transparent; color: var(--deep-green);
      border: 2px solid var(--deep-green);
    }
    .btn-settings-outline:hover { background: var(--deep-green); color: #fff; }
    .btn-settings-danger {
      background: var(--orange); color: #fff;
    }

    /* Dark mode toggle switch */
    .toggle-wrap { display: flex; align-items: center; gap: 1rem; }
    .toggle-switch {
      position: relative; width: 52px; height: 28px; flex-shrink: 0;
      background: var(--line); border-radius: 50px; cursor: pointer;
      transition: background .3s;
    }
    .toggle-switch.active { background: var(--deep-green); }
    .toggle-switch .knob {
      position: absolute; top: 3px; left: 3px;
      width: 22px; height: 22px; border-radius: 50%;
      background: #fff; box-shadow: 0 2px 6px rgba(0,0,0,.15);
      transition: transform .3s;
    }
    .toggle-switch.active .knob { transform: translateX(24px); }
    .toggle-label { font-size: .88rem; font-weight: 500; color: var(--charcoal); }
    .toggle-sub { font-size: .78rem; color: var(--gray-soft); }

    /* Alert */
    .settings-alert {
      padding: .75rem 1rem; border-radius: 12px;
      font-size: .85rem; font-weight: 500; margin-bottom: 1rem;
      display: none;
    }
    .settings-alert.show { display: block; }
    .settings-alert.success { background: var(--deep-green-light); color: var(--deep-green-dark); }
    .settings-alert.error { background: var(--orange-light); color: var(--orange); }

    /* ===== FOOTER ===== */
    .site-footer {
      margin-top: 2.5rem; padding: 2rem; border-top: 1px solid var(--line);
      transition: background .3s;
    }
    .footer-inner { display: flex; flex-wrap: wrap; justify-content: space-between; gap: 1.5rem; margin-bottom: 1rem; }
    .footer-brand { display: flex; align-items: center; gap: .6rem; font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 1rem; color: var(--charcoal); margin-bottom: .5rem; }
    .brand-mark {
      background: linear-gradient(135deg,var(--orange),var(--deep-green) 65%,var(--deep-green));
      color: #fff; display: flex; align-items: center; justify-content: center;
      border-radius: 9px; font-family: 'Poppins', sans-serif;
    }
    .footer-tagline { font-size: .85rem; color: var(--gray-soft); max-width: 320px; }
    .footer-links, .footer-bottom-links { display: flex; flex-wrap: wrap; gap: 1.1rem; }
    .footer-link { font-size: .85rem; color: var(--gray); font-weight: 500; }
    .footer-link:hover { color: var(--deep-green); }
    .footer-social { display: flex; gap: .6rem; }
    .footer-social-icon {
      width: 36px; height: 36px; border-radius: 50%;
      background: var(--bg); border: 1px solid var(--line);
      display: flex; align-items: center; justify-content: center;
      color: var(--charcoal); font-size: .9rem;
      transition: background .3s;
    }
    .footer-social-icon:hover { background: var(--deep-green-light); color: var(--deep-green-dark); }
    .footer-divider { border-color: var(--line); margin: 1rem 0; }
    .footer-bottom { display: flex; flex-wrap: wrap; justify-content: space-between; gap: .75rem; font-size: .8rem; color: var(--gray-soft); }

    @media (max-width: 991.98px) {
      .sidebar { transform: translateX(-100%); box-shadow: 0 0 40px rgba(0,0,0,.15); }
      .sidebar.show { transform: translateX(0); }
      .main-area { margin-left: 0; }
      .sidebar-toggle { display: inline-flex; align-items: center; }
    }
    @media (max-width: 575.98px) {
      .content-wrap { padding: 1.25rem; }
      .top-header { padding: .85rem 1.25rem; }
      .profile-chip .name, .profile-chip .role { display: none; }
      .settings-card { padding: 1.25rem; }
    }
  </style>
</head>

<body>
  <div class="dash-bg-shapes">
    <div class="bg-circle c1"></div>
    <div class="bg-circle c2"></div>
    <div class="bg-dots"></div>
  </div>
  <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

  <!-- SIDEBAR -->
  <aside class="sidebar" id="sidebar">
    <a href="<?= site_url('dashboard') ?>" class="brand-logo">LEARNBASE<span>.</span></a>
    <ul class="side-nav">
      <li class="nav-label">Menu</li>
      <li><a href="<?= site_url('dashboard') ?>" class="side-link"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"></rect><rect x="14" y="3" width="7" height="5"></rect><rect x="14" y="12" width="7" height="9"></rect><rect x="3" y="16" width="7" height="5"></rect></svg>Dashboard</a></li>
      <li><a href="<?= site_url('library') ?>" class="side-link"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>Library</a></li>
      <li><a href="<?= site_url('courses/my_courses') ?>" class="side-link"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>My Courses</a></li>
      <li><a href="<?= site_url('courses/completed') ?>" class="side-link"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.9 6.3 6.9.7-5.2 4.7 1.6 6.8L12 17l-6.2 3.5 1.6-6.8-5.2-4.7 6.9-.7z"></path></svg>Completed Courses</a></li>
    </ul>
    <div class="sidebar-footer">
      <?php if (($user['membership'] ?? 'free') !== 'premium'): ?>
      <div class="upgrade-card"><p>Unlock all 100+ courses with Learnbase Pro.</p><a href="<?= site_url('pricing') ?>" class="btn-upgrade">Upgrade to Pro</a></div>
      <?php else: ?>
      <div class="upgrade-card" style="background:linear-gradient(135deg,var(--deep-green),#12806A);color:#fff;">
        <p style="color:rgba(255,255,255,.9);"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" style="vertical-align:middle;margin-right:4px;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg> Kamu sudah member Premium!</p>
      </div>
      <?php endif; ?>
    </div>
  </aside>

  <div class="main-area">
    <header class="top-header">
      <button class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle menu"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></button>
      <button class="sidebar-toggle-collapse" id="sidebarCollapse" aria-label="Toggle sidebar"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg></button>
      <div class="header-right">
        <button class="icon-btn" aria-label="Notifikasi"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg><span class="dot-badge"></span></button>
        <div class="profile-wrap">
          <div class="profile-chip" id="profileAvatarChip">
            <div class="profile-avatar" id="profileAvatar"><?= strtoupper(substr($user['nama'], 0, 1)) ?></div>
            <div><div class="name" id="profileName"><?= $user['nama'] ?></div><div class="role" style="color:<?= ($user['membership'] ?? 'free') === 'premium' ? 'var(--deep-green)' : 'var(--gray-soft)' ?>;"><?= ($user['membership'] ?? 'free') === 'premium' ? 'Premium' : 'Free' ?></div></div>
          </div>
          <div class="profile-dropdown" id="profileDropdown">
            <a href="<?= site_url('profile') ?>" class="profile-dropdown-item">My Profile</a>
            <a href="<?= site_url('settings') ?>" class="profile-dropdown-item">Account Settings</a>
            <div class="profile-dropdown-divider"></div>
            <a href="<?= site_url('library?tab=favorites') ?>" class="profile-dropdown-item">Favorite Modules</a>
            <div class="profile-dropdown-divider"></div>
            <a href="<?= site_url('auth/logout') ?>" class="profile-dropdown-item danger">Logout</a>
          </div>
        </div>
      </div>
    </header>

    <div class="content-wrap">
      <div class="settings-header">
        <h1 class="settings-title">Settings</h1>
        <p class="settings-subtitle">Kelola akun, keamanan, dan preferensi tampilan kamu.</p>
      </div>

      <div class="settings-alert" id="settingsAlert"></div>

      <!-- ACCOUNT INFO -->
      <div class="settings-card">
        <div class="settings-card-title"> Account Information</div>
        <div class="settings-card-desc">Informasi dasar akun kamu.</div>
        <div class="settings-row">
          <div><div class="settings-row-label">Nama Lengkap</div><div class="settings-row-desc">Username yang ditampilkan</div></div>
          <div class="settings-row-value"><input class="settings-input" id="inputFullName" type="text" value="<?= $user['nama'] ?>" /></div>
        </div>
        <div class="settings-row">
          <div><div class="settings-row-label">Email</div><div class="settings-row-desc">Alamat email terdaftar</div></div>
          <div class="settings-row-value"><input class="settings-input" id="inputEmail" type="email" value="<?= $user['email'] ?>" /></div>
        </div>
        <div class="settings-row">
          <div><div class="settings-row-label">Path Belajar</div></div>
          <div><span class="profile-badge-path" id="displayPath"><?= ($user['membership'] ?? 'free') === 'premium' ? 'Premium' : 'Free' ?></span></div>
        </div>
        <div style="margin-top:1rem;">
          <button class="btn-settings" id="btnSaveAccount">Simpan Perubahan</button>
        </div>
      </div>

      <!-- CHANGE PASSWORD -->
      <div class="settings-card">
        <div class="settings-card-title"> Change Password</div>
        <div class="settings-card-desc">Perbarui password akun kamu secara berkala.</div>
        <div class="settings-row">
          <div><div class="settings-row-label">Password Saat Ini</div></div>
          <div class="settings-row-value"><input class="settings-input" id="inputCurrentPassword" type="password" placeholder="Password saat ini" /></div>
        </div>
        <div class="settings-row">
          <div><div class="settings-row-label">Password Baru</div><div class="settings-row-desc">Min. 8 karakter</div></div>
          <div class="settings-row-value"><input class="settings-input" id="inputPassword" type="password" placeholder="••••••••" /></div>
        </div>
        <div class="settings-row">
          <div><div class="settings-row-label">Konfirmasi Password</div></div>
          <div class="settings-row-value"><input class="settings-input" id="inputPasswordConfirm" type="password" placeholder="••••••••" /></div>
        </div>
        <div style="margin-top:1rem;">
          <button class="btn-settings" id="btnChangePassword">Update Password</button>
        </div>
      </div>

      <!-- APPEARANCE: DARK MODE -->
      <div class="settings-card">
        <div class="settings-card-title"> Appearance</div>
        <div class="settings-card-desc">Atur tema tampilan aplikasi.</div>
        <div class="settings-row">
          <div><div class="settings-row-label">Dark Mode</div><div class="settings-row-desc">Gunakan tema gelap untuk kenyamanan mata</div></div>
          <div class="toggle-wrap">
            <div class="toggle-switch" id="darkModeToggle"><div class="knob"></div></div>
            <div><div class="toggle-label" id="darkModeLabel">Terang</div><div class="toggle-sub">Klik untuk beralih</div></div>
          </div>
        </div>
      </div>

      <!-- DANGER ZONE -->
      <div class="settings-card" style="border-color:var(--orange);">
        <div class="settings-card-title" style="color:var(--orange);"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;margin-right:6px;"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg> Danger Zone</div>
        <div class="settings-card-desc">Tindakan yang tidak bisa dibatalkan.</div>
        <div class="settings-row" style="border:none;">
          <div><div class="settings-row-label">Hapus Akun</div><div class="settings-row-desc">Hapus permanen akun dan seluruh data</div></div>
          <button class="btn-settings btn-settings-danger" id="btnDeleteAccount">Hapus Akun</button>
        </div>
      </div>

      <footer class="site-footer">
        <div class="footer-inner">
          <div>
            <a href="#" class="footer-brand"><div class="brand-mark" style="width:28px;height:28px;font-size:12px;">LB</div> LearnBase</a>
            <p class="footer-tagline">Platform belajar coding interaktif dengan 12 modul bahasa pemrograman.</p>
          </div>
          <div class="footer-links">
            <a href="#" class="footer-link">About</a>
            <a href="#" class="footer-link">Terms</a>
            <a href="#" class="footer-link">Privacy</a>
            <a href="#" class="footer-link">Contact</a>
            <a href="#" class="footer-link">FAQ</a>
          </div>
          <div class="footer-social">
            <a href="#" class="footer-social-icon" title="GitHub"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.44 9.82 8.2 11.4.6.11.82-.26.82-.58v-2.17c-3.34.72-4.04-1.61-4.04-1.61-.55-1.39-1.34-1.76-1.34-1.76-1.09-.74.08-.73.08-.73 1.2.08 1.83 1.24 1.83 1.24 1.07 1.84 2.82 1.31 3.5 1 .11-.77.42-1.31.76-1.61-2.66-.3-5.46-1.33-5.46-5.93 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.12-3.17 0 0 1-.32 3.3 1.23.96-.27 1.98-.4 3-.4s2.04.13 3 .4c2.3-1.55 3.3-1.23 3.3-1.23.66 1.65.25 2.87.12 3.17.77.84 1.24 1.91 1.24 3.22 0 4.6-2.8 5.63-5.48 5.92.43.37.82 1.1.82 2.22v3.29c0 .32.22.7.83.58C20.57 21.82 24 17.31 24 12 24 5.37 18.63 0 12 0z"/></svg></a>
            <a href="#" class="footer-social-icon" title="Twitter / X"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M22 5.9c-.7.3-1.5.6-2.4.7.8-.5 1.5-1.3 1.8-2.3-.8.5-1.7.8-2.6 1a4.1 4.1 0 0 0-7 3.7A11.6 11.6 0 0 1 3.4 4.6a4.1 4.1 0 0 0 1.3 5.5c-.7 0-1.3-.2-1.9-.5v.1c0 2 1.4 3.6 3.3 4a4.1 4.1 0 0 1-1.9.1 4.1 4.1 0 0 0 3.8 2.9A8.2 8.2 0 0 1 2 18.4a11.6 11.6 0 0 0 6.3 1.9c7.5 0 11.7-6.3 11.7-11.7v-.5c.8-.6 1.5-1.3 2-2.2z"/></svg></a>
            <a href="#" class="footer-social-icon" title="YouTube"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.5 12 3.5 12 3.5s-7.5 0-9.4.6a3 3 0 0 0-2.1 2.1C0 8.1 0 12 0 12s0 3.9.5 5.8a3 3 0 0 0 2.1 2.1c1.9.6 9.4.6 9.4.6s7.5 0 9.4-.6a3 3 0 0 0 2.1-2.1C24 15.9 24 12 24 12s0-3.9-.5-5.8zM9.5 15.5V8.5l6.3 3.5-6.3 3.5z"/></svg></a>
            <a href="#" class="footer-social-icon" title="Discord"><svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M20.3 4.5A18 18 0 0 0 14.7 3c-.2.4-.5.9-.6 1.3a16.1 16.1 0 0 0-4.2 0A12 12 0 0 0 9.3 3a17.9 17.9 0 0 0-5.6 1.5C1.2 8.8.5 13 0 17.2a18.2 18.2 0 0 0 5.5 2.8c.4-.6.8-1.2 1.1-1.8a11.8 11.8 0 0 1-1.8-.8l.4-.3a13 13 0 0 0 10.8 0s.3.2.4.3c-.6.3-1.2.6-1.8.9.3.6.7 1.2 1.1 1.8a18 18 0 0 0 5.5-2.8c.6-4.4-1-8.6-4.2-12.7zM8.1 14.5c-1 0-1.8-1-1.8-2.1s.8-2.2 1.8-2.2 1.8 1 1.8 2.2-.8 2.1-1.8 2.1zm6.8 0c-1 0-1.8-1-1.8-2.1s.8-2.2 1.8-2.2 1.8 1 1.8 2.2-.8 2.1-1.8 2.1z"/></svg></a>
          </div>
        </div>
        <hr class="footer-divider" />
        <div class="footer-bottom">
          <span>&copy; 2026 LearnBase. All rights reserved.</span>
          <div class="footer-bottom-links"><a href="#" class="footer-link">Cookie Policy</a><a href="#" class="footer-link">Accessibility</a></div>
        </div>
      </footer>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
  <script>
    // ===== Utility =====
    function showAlert(msg, type) {
      const el = document.getElementById('settingsAlert');
      el.textContent = msg;
      el.className = 'settings-alert show ' + (type || 'success');
      setTimeout(() => el.classList.remove('show'), 5000);
    }

    function postForm(url, data, cb) {
      const fd = new FormData();
      for (let k in data) fd.append(k, data[k]);
      fetch(url, { method: 'POST', body: fd })
        .then(r => r.json())
        .then(cb)
        .catch(e => showAlert('Terjadi kesalahan: ' + e.message, 'error'));
    }

    // ===== Dark Mode =====
    (function() {
      const isDark = localStorage.getItem('learnbase_dark_mode') === 'true';
      if (isDark) document.body.classList.add('dark-mode');
    })();

    const dmToggle = document.getElementById('darkModeToggle');
    const dmLabel = document.getElementById('darkModeLabel');
    function updateDarkUI() {
      const isDark = document.body.classList.contains('dark-mode');
      dmToggle.classList.toggle('active', isDark);
      dmLabel.textContent = isDark ? 'Gelap' : 'Terang';
    }
    if (dmToggle) {
      dmToggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        localStorage.setItem('learnbase_dark_mode', document.body.classList.contains('dark-mode'));
        updateDarkUI();
      });
    }
    updateDarkUI();

    // ===== Save Account =====
    document.getElementById('btnSaveAccount').addEventListener('click', function() {
      const nama = document.getElementById('inputFullName').value.trim();
      const email = document.getElementById('inputEmail').value.trim();

      if (!nama) { showAlert('Nama tidak boleh kosong.', 'error'); return; }
      if (!email || !email.includes('@')) { showAlert('Email tidak valid.', 'error'); return; }

      postForm('<?= site_url('settings/update_account') ?>', { nama, email }, function(res) {
        if (res.success) {
          showAlert(res.message, 'success');
          document.getElementById('profileName').textContent = nama;
        } else {
          showAlert(res.message, 'error');
        }
      });
    });

    // ===== Change Password =====
    document.getElementById('btnChangePassword').addEventListener('click', function() {
      const current = document.getElementById('inputCurrentPassword').value;
      const pass = document.getElementById('inputPassword').value;
      const confirm = document.getElementById('inputPasswordConfirm').value;

      if (!current || !pass || !confirm) { showAlert('Semua field harus diisi.', 'error'); return; }
      if (pass.length < 8) { showAlert('Password baru minimal 8 karakter.', 'error'); return; }
      if (pass !== confirm) { showAlert('Konfirmasi password tidak cocok.', 'error'); return; }

      postForm('<?= site_url('settings/change_password') ?>', {
        current_password: current,
        new_password: pass
      }, function(res) {
        if (res.success) {
          showAlert(res.message, 'success');
          document.getElementById('inputCurrentPassword').value = '';
          document.getElementById('inputPassword').value = '';
          document.getElementById('inputPasswordConfirm').value = '';
        } else {
          showAlert(res.message, 'error');
        }
      });
    });

    // ===== Delete Account =====
    document.getElementById('btnDeleteAccount').addEventListener('click', function() {
      const pwd = prompt('<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;margin-right:6px;"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg> PERINGATAN: Semua data akan hilang permanen!\n\nKetikkan password kamu untuk konfirmasi:');
      if (!pwd) return;

      postForm('<?= site_url('settings/delete_account') ?>', { password: pwd }, function(res) {
        if (res.success) {
          alert('✅ ' + res.message);
          window.location.href = '<?= site_url('landingpage') ?>';
        } else {
          showAlert(res.message, 'error');
        }
      });
    });

    // ===== Profile Dropdown =====
    const avatarChip = document.getElementById('profileAvatarChip');
    const dropdown = document.getElementById('profileDropdown');
    if (avatarChip) {
      avatarChip.addEventListener('click', function(e) { e.stopPropagation(); dropdown.classList.toggle('open'); });
      document.addEventListener('click', function() { dropdown.classList.remove('open'); });
      dropdown.addEventListener('click', function(e) { e.stopPropagation(); });
    }

    // ===== Sidebar =====
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');
    const backdrop = document.getElementById('sidebarBackdrop');
    function closeSidebar() { sidebar.classList.remove('show'); backdrop.classList.remove('show'); }
    if (toggleBtn) toggleBtn.addEventListener('click', () => { sidebar.classList.toggle('show'); backdrop.classList.toggle('show'); });
    if (backdrop) backdrop.addEventListener('click', closeSidebar);

    const collapseBtn = document.getElementById('sidebarCollapse');
    const savedState = localStorage.getItem('learnbase_sidebar_collapsed');
    if (savedState === 'true') document.body.classList.add('sidebar-collapsed');
    if (collapseBtn) collapseBtn.addEventListener('click', () => {
      document.body.classList.toggle('sidebar-collapsed');
      localStorage.setItem('learnbase_sidebar_collapsed', document.body.classList.contains('sidebar-collapsed'));
    });
  </script>
</body>
</html>
