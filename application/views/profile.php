<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile — LEARNBASE.</title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

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
    }
    body.dark-mode .sidebar,
    body.dark-mode .top-header,
    body.dark-mode .profile-dropdown,
    body.dark-mode .profile-stat-card,
    body.dark-mode .profile-section,
    body.dark-mode .site-footer { background: var(--card-bg); }
    body.dark-mode .profile-stat-card,
    body.dark-mode .profile-section,
    body.dark-mode .top-header,
    body.dark-mode .sidebar,
    body.dark-mode .site-footer { border-color: var(--line); }
    body.dark-mode .icon-btn { background: var(--card-bg); border-color: var(--line); }
    body.dark-mode .dash-bg-shapes .bg-circle.c1 { background: radial-gradient(circle, rgba(26,188,156,0.08) 0%, transparent 70%); }
    }

    * { box-sizing: border-box; }

    html { overflow-x: clip; }
    body {
      font-family: 'Inter', sans-serif;
      color: var(--charcoal);
      background-color: var(--bg);
      overflow-x: clip;
      position: relative;
    }

    /* ===== Sidebar collapse state ===== */
    body.sidebar-collapsed .sidebar {
      transform: translateX(calc(var(--sidebar-w) * -1));
    }
    body.sidebar-collapsed .main-area {
      margin-left: 0;
    }
    body.sidebar-collapsed .sidebar-toggle-collapse svg {
      transform: rotate(180deg);
    }

    .dash-bg-shapes {
      position: fixed;
      inset: 0;
      z-index: 0;
      pointer-events: none;
      overflow: hidden;
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
      position: absolute;
      inset: 0;
      opacity: 0.25;
      background-image: radial-gradient(var(--border-light) 1px, transparent 1px);
      background-size: 32px 32px;
    }

    h1, h2, h3, h4, h5, h6, .brand-logo { font-family: 'Poppins', sans-serif; }
    a { text-decoration: none; }

    /* ===== SIDEBAR ===== */
    .sidebar {
      position: fixed;
      top: 0; left: 0; bottom: 0;
      width: var(--sidebar-w);
      background: #FFFFFF;
      border-right: 1px solid var(--line);
      padding: 1.75rem 1.25rem;
      display: flex;
      flex-direction: column;
      transition: transform 0.25s ease;
      z-index: 1050;
    }

    .sidebar .brand-logo {
      font-weight: 800;
      font-size: 1.35rem;
      color: var(--charcoal);
      letter-spacing: -0.5px;
      padding: 0 0.5rem;
      margin-bottom: 2.25rem;
      display: inline-block;
    }

    .sidebar .brand-logo span { color: var(--orange); }

    .side-nav { list-style: none; padding: 0; margin: 0; flex: 1; }

    .side-nav .nav-label {
      font-size: 0.72rem;
      font-weight: 600;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: var(--gray-soft);
      padding: 0 0.75rem;
      margin: 0.25rem 0 0.75rem;
    }

    .side-nav li { margin-bottom: 0.3rem; }

    .side-link {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 0.7rem 0.9rem;
      border-radius: 12px;
      color: var(--gray);
      font-weight: 500;
      font-size: 0.95rem;
      transition: background-color 0.15s ease, color 0.15s ease;
    }

    .side-link svg { flex-shrink: 0; opacity: 0.85; }
    .side-link:hover { background-color: var(--deep-green-light); color: var(--deep-green-dark); }

    .side-link.active {
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green));
      color: #fff;
      box-shadow: 0 10px 22px rgba(14,104,83,0.25);
    }

    .side-link.active svg { opacity: 1; }

    .sidebar-footer { border-top: 1px solid var(--line); padding-top: 1rem; margin-top: 1rem; }

    .upgrade-card { background: var(--deep-green-light); border-radius: 16px; padding: 1rem; text-align: center; }

    .upgrade-card p {
      font-size: 0.8rem;
      color: var(--deep-green-dark);
      margin-bottom: 0.7rem;
      font-weight: 500;
      line-height: 1.4;
    }

    .btn-upgrade {
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 60%, var(--deep-green));
      color: #fff;
      font-weight: 600;
      font-size: 0.82rem;
      padding: 0.5rem 1rem;
      border-radius: 50px;
      border: none;
      display: inline-block;
    }

    /* ===== MAIN AREA ===== */
    .main-area { margin-left: var(--sidebar-w); min-height: 100vh; position: relative; z-index: 1; background: transparent; }

    .sidebar-backdrop {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.35);
      z-index: 1040;
    }
    .sidebar-backdrop.show { display: block; }

    /* ===== TOP HEADER ===== */
    .top-header {
      position: sticky;
      top: 0;
      z-index: 1030;
      background: #FFFFFF;
      border-bottom: 1px solid var(--line);
      padding: 1rem 2rem;
      display: flex;
      align-items: center;
      gap: 1.25rem;
    }

    .sidebar-toggle { display: none; background: none; border: none; padding: 0.4rem; color: var(--charcoal); }

    .sidebar-toggle-collapse {
      background: none;
      border: none;
      padding: 0.4rem;
      color: var(--gray-soft);
      display: inline-flex;
      align-items: center;
      transition: color 0.15s ease;
    }
    .sidebar-toggle-collapse:hover { color: var(--deep-green); }
    .sidebar-toggle-collapse svg { transition: transform 0.25s ease; }

    .header-right { margin-left: auto; display: flex; align-items: center; gap: 1.1rem; }

    .icon-btn {
      position: relative;
      width: 42px; height: 42px;
      border-radius: 50%;
      background: var(--bg);
      border: 1px solid var(--line);
      display: flex; align-items: center; justify-content: center;
      color: var(--charcoal);
      transition: background-color 0.15s ease;
    }

    .icon-btn:hover { background: var(--deep-green-light); }

    .icon-btn .dot-badge {
      position: absolute; top: 9px; right: 10px;
      width: 8px; height: 8px; border-radius: 50%;
      background: var(--orange); border: 2px solid #fff;
    }

    .profile-wrap { position: relative; }

    .profile-chip {
      display: flex; align-items: center; gap: 0.65rem;
      padding-left: 1rem;
      border-left: 1px solid var(--line);
      cursor: pointer;
      user-select: none;
    }

    .profile-avatar {
      width: 42px; height: 42px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green));
      display: flex; align-items: center; justify-content: center;
      color: #fff; font-weight: 700;
      font-family: 'Poppins', sans-serif;
      font-size: 0.95rem;
    }

    .profile-chip .name { font-weight: 600; font-size: 0.88rem; color: var(--charcoal); line-height: 1.2; }
    .profile-chip .role { font-size: 0.75rem; color: var(--gray-soft); }

    .profile-dropdown {
      position: absolute;
      top: calc(100% + 10px);
      right: 0;
      min-width: 210px;
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 14px;
      box-shadow: 0 16px 32px rgba(0,0,0,0.1);
      padding: 0.5rem;
      display: none;
      z-index: 1060;
    }

    .profile-dropdown.open { display: block; }

    .profile-dropdown-item {
      width: 100%;
      display: flex;
      align-items: center;
      gap: 0.6rem;
      background: none;
      border: none;
      text-align: left;
      padding: 0.6rem 0.7rem;
      border-radius: 10px;
      font-size: 0.85rem;
      font-weight: 500;
      color: var(--charcoal);
      transition: background-color 0.15s ease;
    }

    .profile-dropdown-item:hover { background: var(--deep-green-light); color: var(--deep-green-dark); }
    .profile-dropdown-item.danger { color: var(--orange); }
    .profile-dropdown-item.danger:hover { background: var(--orange-light); }

    .profile-dropdown-divider { height: 1px; background: var(--line); margin: 0.4rem 0.2rem; }

    /* ===== PROFILE CONTENT ===== */
    .content-wrap { padding: 2rem; }

    /* Profile Banner */
    .profile-banner {
      background: linear-gradient(120deg, var(--deep-green-dark), var(--deep-green) 55%, #12806A);
      border-radius: 24px;
      padding: 2.5rem;
      color: #fff;
      position: relative;
      overflow: hidden;
      margin-bottom: 1.75rem;
      display: flex;
      align-items: center;
      gap: 2rem;
      flex-wrap: wrap;
    }

    .profile-banner::after {
      content: "";
      position: absolute;
      right: -60px;
      top: -60px;
      width: 300px;
      height: 300px;
      background: radial-gradient(circle, rgba(255,91,53,0.3), transparent 70%);
      border-radius: 50%;
    }

    .profile-banner-avatar {
      width: 90px;
      height: 90px;
      min-width: 90px;
      border-radius: 50%;
      background: rgba(255,255,255,0.2);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 2rem;
      color: #fff;
      border: 3px solid rgba(255,255,255,0.4);
      position: relative;
      z-index: 1;
    }

    .profile-banner-info { position: relative; z-index: 1; flex: 1; min-width: 0; }

    .profile-banner-name {
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 1.6rem;
      margin-bottom: 0.2rem;
    }

    .profile-banner-email {
      font-size: 0.9rem;
      color: rgba(255,255,255,0.8);
    }

    .profile-banner-badge {
      display: inline-block;
      background: rgba(255,255,255,0.15);
      backdrop-filter: blur(4px);
      padding: 0.35rem 1rem;
      border-radius: 50px;
      font-size: 0.78rem;
      font-weight: 600;
      margin-top: 0.6rem;
    }

    /* Stat Cards */
    .profile-stats {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 1rem;
      margin-bottom: 1.75rem;
    }

    .profile-stat-card {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 18px;
      padding: 1.4rem 1.5rem;
      display: flex;
      align-items: center;
      gap: 1rem;
      transition: box-shadow 0.2s ease, transform 0.2s ease;
    }

    .profile-stat-card:hover {
      box-shadow: 0 12px 28px rgba(0,0,0,0.06);
      transform: translateY(-2px);
    }

    .profile-stat-icon {
      width: 48px;
      height: 48px;
      min-width: 48px;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.3rem;
    }

    .profile-stat-icon.green { background: var(--deep-green-light); }
    .profile-stat-icon.orange { background: var(--orange-light); }
    .profile-stat-icon.charcoal { background: #F0EFED; }
    .profile-stat-icon.gold { background: #FFF3D6; }

    .profile-stat-value {
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 1.4rem;
      line-height: 1.2;
      color: var(--charcoal);
    }

    .profile-stat-label { font-size: 0.8rem; color: var(--gray-soft); font-weight: 500; }

    /* Detail Sections */
    .profile-section {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 18px;
      padding: 1.5rem 2rem;
      margin-bottom: 1.25rem;
    }

    .profile-section-title {
      font-weight: 700;
      font-size: 1.05rem;
      color: var(--charcoal);
      margin-bottom: 1rem;
      padding-bottom: 0.6rem;
      border-bottom: 1px solid var(--line);
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .profile-info-row {
      display: flex;
      align-items: flex-start;
      padding: 0.7rem 0;
      border-bottom: 1px solid var(--bg);
    }

    .profile-info-row:last-child { border-bottom: none; }

    .profile-info-label {
      font-size: 0.82rem;
      color: var(--gray-soft);
      font-weight: 500;
      width: 140px;
      min-width: 140px;
    }

    .profile-info-value {
      font-size: 0.9rem;
      color: var(--charcoal);
      font-weight: 500;
      flex: 1;
    }

    .profile-badge-path {
      display: inline-block;
      background: var(--deep-green-light);
      color: var(--deep-green-dark);
      font-size: 0.78rem;
      font-weight: 600;
      padding: 0.25rem 0.75rem;
      border-radius: 50px;
      margin-right: 0.4rem;
      margin-bottom: 0.3rem;
    }

    .profile-edit-input {
      background: var(--bg);
      border: 2px solid var(--line);
      border-radius: 10px;
      padding: 0.5rem 0.8rem;
      font-size: 0.88rem;
      color: var(--charcoal);
      font-family: 'Inter', sans-serif;
      width: 100%;
      max-width: 320px;
      outline: none;
      transition: border-color 0.2s ease;
    }

    .profile-edit-input:focus {
      border-color: var(--deep-green);
      background: #fff;
    }

    .btn-save {
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 60%, var(--deep-green));
      color: #fff;
      font-weight: 600;
      font-size: 0.85rem;
      padding: 0.55rem 1.3rem;
      border-radius: 50px;
      border: none;
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      cursor: pointer;
      transition: transform 0.2s ease;
    }

    .btn-save:hover { transform: translateY(-1px); color: #fff; }

    /* Completed courses mini list */
    .mini-course-item {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 0.6rem 0;
      border-bottom: 1px solid var(--bg);
    }

    .mini-course-item:last-child { border-bottom: none; }

    .mini-course-icon {
      width: 36px;
      height: 36px;
      min-width: 36px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.8rem;
    }

    .mini-course-name {
      flex: 1;
      font-weight: 600;
      font-size: 0.88rem;
    }

    .mini-course-date {
      font-size: 0.78rem;
      color: var(--gray-soft);
    }

    .link-viewall {
      font-size: 0.82rem;
      font-weight: 600;
      color: var(--deep-green);
      display: inline-block;
      margin-top: 0.6rem;
    }

    /* ===== FOOTER ===== */
    .site-footer {
      margin-top: 2.5rem;
      padding: 2rem;
      border-top: 1px solid var(--line);
    }

    .footer-inner {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 1.5rem;
      margin-bottom: 1rem;
    }

    .footer-brand {
      display: flex;
      align-items: center;
      gap: 0.6rem;
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 1rem;
      color: var(--charcoal);
      margin-bottom: 0.5rem;
    }

    .brand-mark {
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green));
      color: #fff;
      display: flex; align-items: center; justify-content: center;
      border-radius: 9px;
      font-family: 'Poppins', sans-serif;
    }

    .footer-tagline { font-size: 0.85rem; color: var(--gray-soft); max-width: 320px; }

    .footer-links, .footer-bottom-links { display: flex; flex-wrap: wrap; gap: 1.1rem; }

    .footer-link { font-size: 0.85rem; color: var(--gray); font-weight: 500; }
    .footer-link:hover { color: var(--deep-green); }

    .footer-social { display: flex; gap: 0.6rem; }

    .footer-social-icon {
      width: 36px; height: 36px;
      border-radius: 50%;
      background: var(--bg);
      border: 1px solid var(--line);
      display: flex; align-items: center; justify-content: center;
      color: var(--charcoal);
      font-size: 0.9rem;
    }

    .footer-social-icon:hover { background: var(--deep-green-light); color: var(--deep-green-dark); }

    .footer-divider { border-color: var(--line); margin: 1rem 0; }

    .footer-bottom {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 0.75rem;
      font-size: 0.8rem;
      color: var(--gray-soft);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 991.98px) {
      .sidebar { transform: translateX(-100%); box-shadow: 0 0 40px rgba(0,0,0,0.15); }
      .sidebar.show { transform: translateX(0); }
      .main-area { margin-left: 0; }
      .sidebar-toggle { display: inline-flex; align-items: center; }
    }

    @media (max-width: 575.98px) {
      .content-wrap { padding: 1.25rem; }
      .top-header { padding: 0.85rem 1.25rem; }
      .profile-chip .name, .profile-chip .role { display: none; }
      .profile-banner { padding: 1.75rem; text-align: center; justify-content: center; }
      .profile-banner-avatar { width: 72px; height: 72px; min-width: 72px; font-size: 1.5rem; }
      .profile-banner-name { font-size: 1.2rem; }
      .profile-stats { grid-template-columns: repeat(2, 1fr); }
      .profile-info-row { flex-direction: column; gap: 0.3rem; }
      .profile-info-label { width: auto; }
    }
  </style>
  <script>
    
  </script>
</head>

<body>
  <script>if(localStorage.getItem("learnbase_dark_mode")==="true")document.body.classList.add("dark-mode");</script>

  <div class="dash-bg-shapes">
    <div class="bg-circle c1"></div>
    <div class="bg-circle c2"></div>
    <div class="bg-dots"></div>
  </div>

  <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

  <!-- ===== SIDEBAR ===== -->
  <aside class="sidebar" id="sidebar">
    <a href="<?= site_url('dashboard') ?>" class="brand-logo">LEARNBASE<span>.</span></a>

    <ul class="side-nav">
      <li class="nav-label">Menu</li>
      <li>
        <a href="<?= site_url('dashboard') ?>" class="side-link">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"></rect><rect x="14" y="3" width="7" height="5"></rect><rect x="14" y="12" width="7" height="9"></rect><rect x="3" y="16" width="7" height="5"></rect></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="<?= site_url('library') ?>" class="side-link">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
          Library
        </a>
      </li>
      <li>
        <a href="<?= site_url('courses/my_courses') ?>" class="side-link">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
          My Courses
        </a>
      </li>
      <li>
        <a href="<?= site_url('courses/completed') ?>" class="side-link">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.9 6.3 6.9.7-5.2 4.7 1.6 6.8L12 17l-6.2 3.5 1.6-6.8-5.2-4.7 6.9-.7z"></path></svg>
          Completed Courses
        </a>
      </li>
    </ul>

    <div class="sidebar-footer">
      <?php if (($user['membership'] ?? 'free') !== 'premium'): ?>
      <div class="upgrade-card">
        <p>Unlock all 100+ courses with Learnbase Pro.</p>
        <a href="<?= site_url('pricing') ?>" class="btn-upgrade">Upgrade to Pro</a>
      </div>
      <?php else: ?>
      <div class="upgrade-card" style="background:linear-gradient(135deg,var(--deep-green),#12806A);color:#fff;">
        <p style="color:rgba(255,255,255,.9);"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" style="vertical-align:middle;margin-right:4px;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg> Kamu sudah member Premium!</p>
      </div>
      <?php endif; ?>
    </div>
  </aside>

  <!-- ===== MAIN AREA ===== -->
  <div class="main-area">

    <!-- TOP HEADER -->
    <header class="top-header">
      <button class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle menu">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
      </button>
      <button class="sidebar-toggle-collapse" id="sidebarCollapse" aria-label="Toggle sidebar">
        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>
      </button>

      <div class="header-right">
        <button class="icon-btn" aria-label="Notifikasi">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
          <span class="dot-badge"></span>
        </button>

        <div class="profile-wrap">
          <div class="profile-chip" id="profileAvatarChip">
            <div class="profile-avatar" id="profileAvatar"><?= strtoupper(substr($user['nama'], 0, 1)) ?></div>
            <div>
              <div class="name" id="profileName"><?= $user['nama'] ?></div>
              <div class="role" style="color:<?= ($user['membership'] ?? 'free') === 'premium' ? 'var(--deep-green)' : 'var(--gray-soft)' ?>;"><?= ($user['membership'] ?? 'free') === 'premium' ? 'Premium' : 'Free' ?></div>
            </div>
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

    <!-- CONTENT -->
    <div class="content-wrap">

      <!-- PROFILE BANNER -->
      <div class="profile-banner">
        <div class="profile-banner-avatar" id="profileBannerAvatar"><?= strtoupper(substr($user['nama'], 0, 1)) ?></div>
        <div class="profile-banner-info">
          <div class="profile-banner-name" id="profileBannerName"><?= $user['nama'] ?></div>
          <div class="profile-banner-email" id="profileBannerEmail"><?= $user['email'] ?></div>
          <div class="profile-banner-badge"><?= ucfirst($user['role']) ?> • <?= ucfirst($user['membership']) ?></div>
        </div>
      </div>

      <!-- STATS -->
      <div class="profile-stats">
        <div class="profile-stat-card">
          <div class="profile-stat-icon green"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div>
          <div>
            <div class="profile-stat-value" id="statCourses"><?= $completed_modules ?></div>
            <div class="profile-stat-label">Courses Completed</div>
          </div>
        </div>
        <div class="profile-stat-card">
          <div class="profile-stat-icon orange"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
          <div>
            <div class="profile-stat-value"><span id="statHours"><?= $learning_hours ?></span></div>
            <div class="profile-stat-label">Learning Hours</div>
          </div>
        </div>
        <div class="profile-stat-card">
          <div class="profile-stat-icon gold"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg></div>
          <div>
            <div class="profile-stat-value"><span id="statStreak"><?= $streak ?></span> <span style="font-size:0.75rem;color:var(--gray-soft);font-weight:500;">hari</span></div>
            <div class="profile-stat-label">Day Streak</div>
          </div>
        </div>
        <div class="profile-stat-card">
          <div class="profile-stat-icon charcoal"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5C7 4 9 6 9 9v1a4 4 0 0 0 4 4h1"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5C17 4 15 6 15 9v1a4 4 0 0 1-4 4h-1"/><path d="M5 18h14"/><path d="M10 14v4"/><path d="M14 14v4"/></svg></div>
          <div>
            <div class="profile-stat-value" id="statCertificates"><?= $cert_count ?></div>
            <div class="profile-stat-label">Certificates</div>
          </div>
        </div>
      </div>

      <div class="row g-3">
        <!-- Account Info -->
        <div class="col-lg-6 col-12">
          <div class="profile-section">
            <div class="profile-section-title"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;margin-right:6px;"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> Account Information</div>
            <div class="profile-info-row">
              <span class="profile-info-label">Nama Lengkap</span>
              <span class="profile-info-value" id="infoFullName"><?= $user['nama'] ?></span>
            </div>
            <div class="profile-info-row">
              <span class="profile-info-label">Email</span>
              <span class="profile-info-value" id="infoEmail"><?= $user['email'] ?></span>
            </div>
            <div class="profile-info-row">
              <span class="profile-info-label">Status Akun</span>
              <span class="profile-info-value">
                <span class="profile-badge-path" style="color:<?= ($user['membership'] ?? 'free') === 'premium' ? 'var(--deep-green)' : 'var(--gray-soft)' ?>;font-weight:600;"><?= ($user['membership'] ?? 'free') === 'premium' ? 'Premium' : 'Free' ?></span>
              </span>
            </div>
            <div class="profile-info-row">
              <span class="profile-info-label">Bergabung Sejak</span>
              <span class="profile-info-value" id="infoJoined"><?= date('d F Y', strtotime($user['created_at'])) ?></span>
            </div>
          </div>
        </div>

        <!-- Completed Courses -->
        <div class="col-lg-6 col-12">
          <div class="profile-section">
            <div class="profile-section-title"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;margin-right:6px;"><polyline points="20 6 9 17 4 12"/></svg> Recent Completed</div>
            <div id="recentCompleted">
            <?php
            $dm = ['javascript'=>'javascript','php'=>'php','python'=>'python','java'=>'java','cpp'=>'cplusplus','c'=>'c','csharp'=>'csharp','go'=>'go','ruby'=>'ruby','rust'=>'rust','typescript'=>'typescript','sqlite'=>'sqlite'];
            if (!empty($completed_list)):
              foreach (array_slice($completed_list, 0, 5) as $m):
                $d = $dm[$m['slug']] ?? 'devicon';
            ?>
              <div class="mini-course-item">
                <div class="mini-course-icon" style="background:linear-gradient(135deg,<?= $m['icon_color'] ?>,#fff3);">
                  <i class="devicon-<?= $d ?>-plain colored" style="font-size:16px;"></i>
                </div>
                <span class="mini-course-name"><?= $m['name'] ?></span>
                <span class="mini-course-date">✓ Selesai</span>
              </div>
            <?php endforeach;
            else: ?>
              <div class="mini-course-item">
                <span class="mini-course-name" style="color:var(--gray-soft);">Belum ada kursus selesai</span>
              </div>
            <?php endif; ?>
            </div>
            <a href="<?= site_url('courses/completed') ?>" class="link-viewall">Lihat Semua →</a>
          </div>
        </div>
      </div>

      <!-- ===== FOOTER ===== -->
      <footer class="site-footer">
        <div class="footer-inner">
          <div>
            <a href="#" class="footer-brand">
              <div class="brand-mark" style="width:28px;height:28px;font-size:12px;">LB</div>
              LearnBase
            </a>
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
        <hr class="footer-divider">
        <div class="footer-bottom">
          <span>&copy; 2026 LearnBase. All rights reserved.</span>
          <div class="footer-bottom-links">
            <a href="#" class="footer-link">Cookie Policy</a>
            <a href="#" class="footer-link">Accessibility</a>
          </div>
        </div>
      </footer>

    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
  <script>

    const avatarChip = document.getElementById('profileAvatarChip');
    const dropdown = document.getElementById('profileDropdown');

    if (avatarChip) {
      avatarChip.addEventListener('click', function(e) {
        e.stopPropagation();
        dropdown.classList.toggle('open');
      });

      document.addEventListener('click', function() {
        dropdown.classList.remove('open');
      });

      dropdown.addEventListener('click', function(e) {
        e.stopPropagation();
      });

    }

    // ===== Sidebar toggle (mobile) =====
    const sidebar = document.getElementById('sidebar');
    const toggle = document.getElementById('sidebarToggle');
    const backdrop = document.getElementById('sidebarBackdrop');

    function closeSidebar() {
      sidebar.classList.remove('show');
      backdrop.classList.remove('show');
    }

    if (toggle) {
      toggle.addEventListener('click', () => {
        sidebar.classList.toggle('show');
        backdrop.classList.toggle('show');
      });
    }

    if (backdrop) {
      backdrop.addEventListener('click', closeSidebar);
    }

    // ===== Sidebar collapse toggle (desktop) =====
    const collapseBtn = document.getElementById('sidebarCollapse');
    const savedState = localStorage.getItem('learnbase_sidebar_collapsed');

    if (savedState === 'true') {
      document.body.classList.add('sidebar-collapsed');
    }

    if (collapseBtn) {
      collapseBtn.addEventListener('click', () => {
        document.body.classList.toggle('sidebar-collapsed');
        localStorage.setItem('learnbase_sidebar_collapsed', document.body.classList.contains('sidebar-collapsed'));
      });
    }
  </script>

</body>
</html>
