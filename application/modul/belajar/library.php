<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library — LEARNBASE.</title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">

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

    /* ===== DECORATIVE BACKGROUND (matching dashboard.html) ===== */
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

    /* ===================== SIDEBAR ===================== */
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

    /* ===================== MAIN AREA ===================== */
    .main-area { margin-left: var(--sidebar-w); min-height: 100vh; position: relative; z-index: 1; background: transparent; }

    .sidebar-backdrop {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.35);
      z-index: 1040;
    }
    .sidebar-backdrop.show { display: block; }

    /* ===================== TOP HEADER ===================== */
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

    .search-box { position: relative; flex: 1; max-width: 420px; }

    .search-box svg { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--gray-soft); }

    .search-box input {
      width: 100%;
      background: var(--bg);
      border: 2px solid var(--line);
      border-radius: 12px;
      padding: 0.62rem 1rem 0.62rem 2.6rem;
      font-size: 0.9rem;
      color: var(--charcoal);
      outline: none;
      transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
    }

    .search-box input:focus {
      border-color: var(--deep-green);
      background: #fff;
      box-shadow: 0 0 0 4px rgba(14,104,83,0.1);
    }

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

    /* ===================== CONTENT ===================== */
    .content-wrap { padding: 2rem; }

    /* Page header */
    .library-header { margin-bottom: 1.75rem; }

    .library-title {
      font-weight: 700;
      font-size: 1.6rem;
      color: var(--charcoal);
      margin-bottom: 0.35rem;
    }

    .library-subtitle { font-size: 0.92rem; color: var(--gray-soft); margin-bottom: 1.5rem; }

    /* Sub-navigation tabs */
    .subnav-tabs {
      display: inline-flex;
      gap: 0.35rem;
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 50px;
      padding: 0.35rem;
      margin-bottom: 1.25rem;
    }

    .subnav-tab {
      background: none;
      border: none;
      padding: 0.55rem 1.25rem;
      border-radius: 50px;
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--gray);
      transition: background-color 0.15s ease, color 0.15s ease;
      white-space: nowrap;
    }

    .subnav-tab:hover { color: var(--deep-green-dark); }

    .subnav-tab.active {
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green));
      color: #fff;
      box-shadow: 0 8px 18px rgba(14,104,83,0.2);
    }

    /* Filter bar */
    .filter-bar {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 16px;
      padding: 1rem 1.25rem;
      display: flex;
      flex-wrap: wrap;
      align-items: flex-end;
      gap: 1.25rem;
      margin-bottom: 1.75rem;
    }

    .filter-group { display: flex; flex-direction: column; gap: 0.4rem; }

    .filter-label {
      font-size: 0.72rem;
      font-weight: 600;
      letter-spacing: 0.04em;
      text-transform: uppercase;
      color: var(--gray-soft);
    }

    .filter-select {
      background: var(--bg);
      border: 2px solid var(--line);
      border-radius: 12px;
      padding: 0.55rem 2rem 0.55rem 0.9rem;
      font-size: 0.88rem;
      font-weight: 500;
      color: var(--charcoal);
      outline: none;
      min-width: 190px;
      transition: border-color 0.2s ease, background 0.2s ease;
    }

    .filter-select:focus { border-color: var(--deep-green); background: #fff; }

    .filter-reset-btn {
      background: var(--bg);
      border: 2px solid var(--line);
      color: var(--charcoal);
      font-weight: 600;
      font-size: 0.85rem;
      padding: 0.55rem 1.1rem;
      border-radius: 12px;
      transition: background-color 0.15s ease, border-color 0.15s ease;
      margin-left: auto;
    }

    .filter-reset-btn:hover { background: var(--orange-light); border-color: var(--orange); color: var(--orange); }

    /* Modules grid */
    .modules-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
      gap: 1rem;
    }

    .mod-card {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 18px;
      padding: 1.35rem 1.4rem 1.15rem;
      display: flex;
      flex-direction: column;
      gap: 0.9rem;
      color: var(--charcoal);
      transition: box-shadow 0.2s ease, transform 0.2s ease;
    }

    .mod-card:hover {
      box-shadow: 0 16px 32px rgba(0,0,0,0.07);
      transform: translateY(-3px);
      color: var(--charcoal);
    }

    .mod-card-icon {
      width: 52px; height: 52px;
      border-radius: 14px;
      display: flex; align-items: center; justify-content: center;
      color: #fff;
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 0.85rem;
      letter-spacing: -0.3px;
    }

    .mod-card-type {
      font-size: 0.72rem;
      font-weight: 600;
      color: var(--deep-green);
      text-transform: uppercase;
      letter-spacing: 0.04em;
    }

    .mod-card-name {
      font-weight: 700;
      font-size: 1rem;
      color: var(--charcoal);
      line-height: 1.35;
      flex: 1;
    }

    .mod-card-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-top: 1px solid var(--line);
      padding-top: 0.85rem;
    }

    .mod-card-progress-track {
      height: 5px;
      border-radius: 50px;
      background: var(--line);
      overflow: hidden;
      margin: 0.6rem 0 0.7rem;
      display: none;
    }
    .mod-card-progress-track.visible { display: block; }
    .mod-card-progress-fill {
      height: 100%;
      border-radius: 50px;
      background: linear-gradient(90deg, var(--orange), var(--deep-green));
      transition: width 0.4s ease;
    }
    .mod-card-progress-label {
      font-size: 0.72rem;
      font-weight: 600;
      color: var(--deep-green-dark);
      margin-bottom: 0.2rem;
      display: none;
    }
    .mod-card-progress-label.visible { display: block; }
    .mod-card-progress-label.done { color: var(--deep-green); }

    .mod-card-badge {
      font-size: 0.72rem;
      font-weight: 600;
      padding: 0.3rem 0.7rem;
      border-radius: 50px;
    }

    .mod-card-badge.beginner { background: var(--deep-green-light); color: var(--deep-green); }
    .mod-card-badge.intermediate { background: var(--orange-light); color: var(--orange); }
    .mod-card-badge.advanced { background: #F0EFED; color: var(--charcoal); }

    .mod-card-fav {
      width: 34px; height: 34px;
      border-radius: 50%;
      background: var(--bg);
      border: 1px solid var(--line);
      display: flex; align-items: center; justify-content: center;
      color: var(--gray-soft);
      font-size: 0.95rem;
      transition: color 0.15s ease, background-color 0.15s ease;
    }

    .mod-card-fav:hover { color: var(--orange); background: var(--orange-light); }
    .mod-card-fav.favorited { color: var(--orange); background: var(--orange-light); }

    /* Empty state */
    .empty-state {
      display: none;
      grid-column: 1 / -1;
      background: #fff;
      border: 1px dashed var(--line);
      border-radius: 18px;
      padding: 3rem 1.5rem;
      text-align: center;
    }

    .empty-state.visible { display: block; }

    .empty-state-icon { font-size: 2rem; margin-bottom: 0.6rem; }
    .empty-state-text { font-size: 0.9rem; color: var(--gray-soft); font-weight: 500; }

    /* ===================== FOOTER ===================== */
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

    /* ===================== RESPONSIVE ===================== */
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
      .search-box { max-width: none; }
      .filter-bar { flex-direction: column; align-items: stretch; }
      .filter-select { min-width: 0; width: 100%; }
      .filter-reset-btn { margin-left: 0; }
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

  <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

  <!-- ===================== SIDEBAR ===================== -->
  <aside class="sidebar" id="sidebar">
    <a href="#" class="brand-logo">LEARNBASE<span>.</span></a>

    <ul class="side-nav">
      <li class="nav-label">Menu</li>
      <li>
        <a href="<?= site_url('dashboard') ?>" class="side-link">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"></rect><rect x="14" y="3" width="7" height="5"></rect><rect x="14" y="12" width="7" height="9"></rect><rect x="3" y="16" width="7" height="5"></rect></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="#" class="side-link active">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
          Library
        </a>
      </li>
      <li>
        <a href="#" class="side-link">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
          My Courses
        </a>
      </li>
      <li>
        <a href="#" class="side-link">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.9 6.3 6.9.7-5.2 4.7 1.6 6.8L12 17l-6.2 3.5 1.6-6.8-5.2-4.7 6.9-.7z"></path></svg>
          Completed Courses
        </a>
      </li>
      <li>
        <a href="#" class="side-link">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
          Settings
        </a>
      </li>
    </ul>

    <div class="sidebar-footer">
      <div class="upgrade-card">
        <p>Unlock all 100+ courses with Learnbase Pro.</p>
        <a href="#" class="btn-upgrade">Upgrade to Pro</a>
      </div>
    </div>
  </aside>

  <!-- ===================== MAIN AREA ===================== -->
  <div class="main-area">

    <!-- TOP HEADER -->
    <header class="top-header">
      <button class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle menu">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
      </button>

      <div class="search-box">
        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        <input type="text" placeholder="Cari modul..." id="searchInput">
      </div>

      <div class="header-right">
        <button class="icon-btn" aria-label="Notifikasi">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
          <span class="dot-badge"></span>
        </button>

        <div class="profile-wrap">
          <div class="profile-chip" id="profileAvatarChip">
            <div class="profile-avatar" id="profileAvatar">AN</div>
            <div>
              <div class="name">Aulia Nabila</div>
              <div class="role"><?= $membership === 'premium' ? 'Premium' : 'Free' ?></div>
            </div>
          </div>
          <div class="profile-dropdown" id="profileDropdown">
            <button class="profile-dropdown-item" data-action="profile">My Profile</button>
            <button class="profile-dropdown-item" data-action="settings">Account Settings</button>
            <div class="profile-dropdown-divider"></div>
            <button class="profile-dropdown-item" data-action="favorites">Favorite Modules</button>
            <div class="profile-dropdown-divider"></div>
            <a href="<?= site_url('auth/logout') ?>" class="profile-dropdown-item danger">Logout</a>
          </div>
        </div>
      </div>
    </header>

    <!-- CONTENT -->
    <div class="content-wrap">

      <!-- PAGE HEADER -->
      <div class="library-header">
        <h1 class="library-title">Library Modul</h1>
        <p class="library-subtitle">Jelajahi semua modul pembelajaran yang tersedia untuk kamu.</p>

        <!-- Sub-navigation tabs -->
        <div class="subnav-tabs" id="subnavTabs">
          <button class="subnav-tab active" data-tab="all">All Modules</button>
          <button class="subnav-tab" data-tab="favorites">Favorite Modules</button>
        </div>

        <!-- Filters -->
        <div class="filter-bar" id="filterBar">
          <div class="filter-group">
            <span class="filter-label">Category</span>
            <select class="filter-select" id="filterCategory">
              <option value="all">All Categories</option>
              <option value="web">Web Development</option>
              <option value="server">Server-Side</option>
              <option value="general">General Purpose</option>
              <option value="enterprise">Enterprise</option>
              <option value="systems">Systems & Performance</option>
              <option value="classic">Classic Systems</option>
              <option value="dotnet">.NET / Microsoft</option>
              <option value="cloud">Cloud & Concurrency</option>
              <option value="elegant">Elegant & Productive</option>
              <option value="safe">Safe & Fast</option>
              <option value="superset">TypeScript Superset</option>
              <option value="database">Database</option>
            </select>
          </div>

          <div class="filter-group">
            <span class="filter-label">Difficulty</span>
            <select class="filter-select" id="filterDifficulty">
              <option value="all">All Levels</option>
              <option value="beginner">Beginner</option>
              <option value="intermediate">Intermediate</option>
              <option value="advanced">Advanced</option>
            </select>
          </div>

          <button class="filter-reset-btn" id="filterReset">Reset Filter</button>
        </div>
      </div>

      <!-- MODULES GRID -->
      <div class="modules-grid" id="modulesGrid">

        <!-- JavaScript -->
        <a href="<?= site_url('modul/belajar/javascript') ?>" class="mod-card" data-lang="js" data-category="web" data-difficulty="beginner" data-name="JavaScript">
          <div class="mod-card-icon" style="background:transparent;">JS</div>
          <div class="mod-card-type">Web Development</div>
          <div class="mod-card-name">JavaScript Fundamentals</div>
          <div class="mod-card-progress-label" data-progress-label></div>
          <div class="mod-card-progress-track" data-progress-track><div class="mod-card-progress-fill" style="width:0%;"></div></div>
          <div class="mod-card-footer">
            <span class="mod-card-badge beginner">Beginner</span>
            <button class="mod-card-fav" data-fav="js" title="Favorite">&#x2661;</button>
          </div>
        </a>

        <!-- PHP -->
        <a href="<?= site_url('modul/belajar/php') ?>" class="mod-card" data-lang="php" data-category="server" data-difficulty="beginner" data-name="PHP">
          <div class="mod-card-icon" style="background:transparent;">PHP</div>
          <div class="mod-card-type">Server-Side</div>
          <div class="mod-card-name">PHP Essentials</div>
          <div class="mod-card-progress-label" data-progress-label></div>
          <div class="mod-card-progress-track" data-progress-track><div class="mod-card-progress-fill" style="width:0%;"></div></div>
          <div class="mod-card-footer">
            <span class="mod-card-badge beginner">Beginner</span>
            <button class="mod-card-fav" data-fav="php" title="Favorite">&#x2661;</button>
          </div>
        </a>

        <!-- Python -->
        <a href="<?= site_url('modul/belajar/python') ?>" class="mod-card" data-lang="py" data-category="general" data-difficulty="beginner" data-name="Python">
          <div class="mod-card-icon" style="background:transparent;">PY</div>
          <div class="mod-card-type">General Purpose</div>
          <div class="mod-card-name">Python Programming</div>
          <div class="mod-card-progress-label" data-progress-label></div>
          <div class="mod-card-progress-track" data-progress-track><div class="mod-card-progress-fill" style="width:0%;"></div></div>
          <div class="mod-card-footer">
            <span class="mod-card-badge beginner">Beginner</span>
            <button class="mod-card-fav" data-fav="py" title="Favorite">&#x2661;</button>
          </div>
        </a>

        <!-- Java -->
        <a href="<?= site_url('modul/belajar/java') ?>" class="mod-card" data-lang="java" data-category="enterprise" data-difficulty="intermediate" data-name="Java">
          <div class="mod-card-icon" style="background:transparent;">JV</div>
          <div class="mod-card-type">Enterprise</div>
          <div class="mod-card-name">Java Programming</div>
          <div class="mod-card-progress-label" data-progress-label></div>
          <div class="mod-card-progress-track" data-progress-track><div class="mod-card-progress-fill" style="width:0%;"></div></div>
          <div class="mod-card-footer">
            <span class="mod-card-badge intermediate">Intermediate</span>
            <button class="mod-card-fav" data-fav="java" title="Favorite">&#x2661;</button>
          </div>
        </a>

        <!-- C++ -->
        <a href="<?= site_url('modul/belajar/cpp') ?>" class="mod-card" data-lang="cpp" data-category="systems" data-difficulty="advanced" data-name="C++">
          <div class="mod-card-icon" style="background:transparent;">C++</div>
          <div class="mod-card-type">Systems & Performance</div>
          <div class="mod-card-name">C++ Mastery</div>
          <div class="mod-card-progress-label" data-progress-label></div>
          <div class="mod-card-progress-track" data-progress-track><div class="mod-card-progress-fill" style="width:0%;"></div></div>
          <div class="mod-card-footer">
            <span class="mod-card-badge advanced">Advanced</span>
            <button class="mod-card-fav" data-fav="cpp" title="Favorite">&#x2661;</button>
          </div>
        </a>

        <!-- C -->
        <a href="<?= site_url('modul/belajar/c') ?>" class="mod-card" data-lang="c" data-category="classic" data-difficulty="intermediate" data-name="C">
          <div class="mod-card-icon" style="background:transparent;">C</div>
          <div class="mod-card-type">Classic Systems</div>
          <div class="mod-card-name">C Language</div>
          <div class="mod-card-progress-label" data-progress-label></div>
          <div class="mod-card-progress-track" data-progress-track><div class="mod-card-progress-fill" style="width:0%;"></div></div>
          <div class="mod-card-footer">
            <span class="mod-card-badge intermediate">Intermediate</span>
            <button class="mod-card-fav" data-fav="c" title="Favorite">&#x2661;</button>
          </div>
        </a>

        <!-- C# -->
        <a href="<?= site_url('modul/belajar/csharp') ?>" class="mod-card" data-lang="cs" data-category="dotnet" data-difficulty="intermediate" data-name="C#">
          <div class="mod-card-icon" style="background:transparent;">C#</div>
          <div class="mod-card-type">.NET / Microsoft</div>
          <div class="mod-card-name">C# &amp; .NET</div>
          <div class="mod-card-progress-label" data-progress-label></div>
          <div class="mod-card-progress-track" data-progress-track><div class="mod-card-progress-fill" style="width:0%;"></div></div>
          <div class="mod-card-footer">
            <span class="mod-card-badge intermediate">Intermediate</span>
            <button class="mod-card-fav" data-fav="cs" title="Favorite">&#x2661;</button>
          </div>
        </a>

        <!-- Go -->
        <a href="<?= site_url('modul/belajar/go') ?>" class="mod-card" data-lang="go" data-category="cloud" data-difficulty="intermediate" data-name="Go">
          <div class="mod-card-icon" style="background:transparent;">GO</div>
          <div class="mod-card-type">Cloud &amp; Concurrency</div>
          <div class="mod-card-name">Go (Golang)</div>
          <div class="mod-card-progress-label" data-progress-label></div>
          <div class="mod-card-progress-track" data-progress-track><div class="mod-card-progress-fill" style="width:0%;"></div></div>
          <div class="mod-card-footer">
            <span class="mod-card-badge intermediate">Intermediate</span>
            <button class="mod-card-fav" data-fav="go" title="Favorite">&#x2661;</button>
          </div>
        </a>

        <!-- Ruby -->
        <a href="<?= site_url('modul/belajar/ruby') ?>" class="mod-card" data-lang="ruby" data-category="elegant" data-difficulty="beginner" data-name="Ruby">
          <div class="mod-card-icon" style="background:transparent;">RB</div>
          <div class="mod-card-type">Elegant &amp; Productive</div>
          <div class="mod-card-name">Ruby Programming</div>
          <div class="mod-card-progress-label" data-progress-label></div>
          <div class="mod-card-progress-track" data-progress-track><div class="mod-card-progress-fill" style="width:0%;"></div></div>
          <div class="mod-card-footer">
            <span class="mod-card-badge beginner">Beginner</span>
            <button class="mod-card-fav" data-fav="ruby" title="Favorite">&#x2661;</button>
          </div>
        </a>

        <!-- Rust -->
        <a href="<?= site_url('modul/belajar/rust') ?>" class="mod-card" data-lang="rust" data-category="safe" data-difficulty="advanced" data-name="Rust">
          <div class="mod-card-icon" style="background:transparent;">RS</div>
          <div class="mod-card-type">Safe &amp; Fast</div>
          <div class="mod-card-name">Rust Programming</div>
          <div class="mod-card-progress-label" data-progress-label></div>
          <div class="mod-card-progress-track" data-progress-track><div class="mod-card-progress-fill" style="width:0%;"></div></div>
          <div class="mod-card-footer">
            <span class="mod-card-badge advanced">Advanced</span>
            <button class="mod-card-fav" data-fav="rust" title="Favorite">&#x2661;</button>
          </div>
        </a>

        <!-- TypeScript -->
        <a href="<?= site_url('modul/belajar/typescript') ?>" class="mod-card" data-lang="ts" data-category="superset" data-difficulty="intermediate" data-name="TypeScript">
          <div class="mod-card-icon" style="background:transparent;">TS</div>
          <div class="mod-card-type">TypeScript Superset</div>
          <div class="mod-card-name">TypeScript</div>
          <div class="mod-card-progress-label" data-progress-label></div>
          <div class="mod-card-progress-track" data-progress-track><div class="mod-card-progress-fill" style="width:0%;"></div></div>
          <div class="mod-card-footer">
            <span class="mod-card-badge intermediate">Intermediate</span>
            <button class="mod-card-fav" data-fav="ts" title="Favorite">&#x2661;</button>
          </div>
        </a>

        <!-- SQLite -->
        <a href="<?= site_url('modul/belajar/sqlite') ?>" class="mod-card" data-lang="sql" data-category="database" data-difficulty="beginner" data-name="SQLite">
          <div class="mod-card-icon" style="background:transparent;">SQ</div>
          <div class="mod-card-type">Database</div>
          <div class="mod-card-name">SQLite Database</div>
          <div class="mod-card-progress-label" data-progress-label></div>
          <div class="mod-card-progress-track" data-progress-track><div class="mod-card-progress-fill" style="width:0%;"></div></div>
          <div class="mod-card-footer">
            <span class="mod-card-badge beginner">Beginner</span>
            <button class="mod-card-fav" data-fav="sql" title="Favorite">&#x2661;</button>
          </div>
        </a>

        <!-- Empty state -->
        <div class="empty-state" id="emptyState">
          <div class="empty-state-icon">&#x1F50D;</div>
          <div class="empty-state-text">Tidak ada modul yang cocok dengan filter ini.</div>
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
    // ===== Sidebar toggle (mobile) =====
    const sidebar = document.getElementById('sidebar');
    const toggle = document.getElementById('sidebarToggle');
    const backdrop = document.getElementById('sidebarBackdrop');

    function closeSidebar() {
      sidebar.classList.remove('show');
      backdrop.classList.remove('show');
    }

    toggle.addEventListener('click', () => {
      sidebar.classList.toggle('show');
      backdrop.classList.toggle('show');
    });

    backdrop.addEventListener('click', closeSidebar);

    (function() {
      // ===== Profile Dropdown Toggle =====
      const avatarChip = document.getElementById('profileAvatarChip');
      const dropdown = document.getElementById('profileDropdown');

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

      // ===== Sub-navigation Tabs =====
      const subnavTabs = document.querySelectorAll('.subnav-tab');
      let activeTab = 'all';
      let favorites = new Set(
        JSON.parse(localStorage.getItem('learnbase_favorites') || '[]')
      );

      // Sync favorite buttons UI
      function syncFavUI() {
        document.querySelectorAll('.mod-card-fav').forEach(btn => {
          const key = btn.dataset.fav;
          btn.classList.toggle('favorited', favorites.has(key));
          btn.innerHTML = favorites.has(key) ? '&#x2665;' : '&#x2661;';
        });
      }

      // Filter + tab logic
      function filterModules() {
        const category = document.getElementById('filterCategory').value;
        const difficulty = document.getElementById('filterDifficulty').value;
        const search = document.getElementById('searchInput').value.toLowerCase().trim();

        const cards = document.querySelectorAll('.mod-card');
        let visibleCount = 0;

        cards.forEach(card => {
          if (activeTab === 'favorites' && !favorites.has(card.dataset.lang)) {
            card.style.display = 'none';
            return;
          }

          const matchCategory = category === 'all' || card.dataset.category === category;
          const matchDifficulty = difficulty === 'all' || card.dataset.difficulty === difficulty;
          const matchSearch = !search || card.dataset.name.toLowerCase().includes(search);

          const visible = matchCategory && matchDifficulty && matchSearch;
          card.style.display = visible ? '' : 'none';
          if (visible) visibleCount++;
        });

        document.getElementById('emptyState').classList.toggle('visible', visibleCount === 0);
      }

      subnavTabs.forEach(tab => {
        tab.addEventListener('click', function() {
          subnavTabs.forEach(t => t.classList.remove('active'));
          this.classList.add('active');
          activeTab = this.dataset.tab;
          filterModules();
        });
      });

      // ===== Filters =====
      document.getElementById('filterCategory').addEventListener('change', filterModules);
      document.getElementById('filterDifficulty').addEventListener('change', filterModules);
      document.getElementById('searchInput').addEventListener('input', filterModules);

      document.getElementById('filterReset').addEventListener('click', function() {
        document.getElementById('filterCategory').value = 'all';
        document.getElementById('filterDifficulty').value = 'all';
        document.getElementById('searchInput').value = '';
        filterModules();
      });

      // ===== Favorite Toggle =====
      document.querySelectorAll('.mod-card-fav').forEach(btn => {
        btn.addEventListener('click', function(e) {
          e.preventDefault();
          e.stopPropagation();
          const key = this.dataset.fav;
          if (favorites.has(key)) {
            favorites.delete(key);
          } else {
            favorites.add(key);
          }
          localStorage.setItem('learnbase_favorites', JSON.stringify([...favorites]));
          syncFavUI();
          filterModules(); // re-apply in case we're on favorites tab
        });
      });

      // ===== Search shortcut: Ctrl+K / Cmd+K =====
      document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
          e.preventDefault();
          document.getElementById('searchInput').focus();
        }
      });

      // Initial state
      syncFavUI();
      filterModules();

      // ===== Isi progres real per modul dari backend =====
      (async function loadLibraryProgress() {
        try {
          const res = await fetch('get_progress.php');
          if (!res.ok) return; // belum login / gagal -> biarkan tanpa progress
          const data = await res.json();
          const languages = data.languages || {};

          document.querySelectorAll('.mod-card').forEach(card => {
            const lang = card.dataset.lang;
            const info = languages[lang];
            if (!info || info.done === 0) return;

            const labelEl = card.querySelector('[data-progress-label]');
            const trackEl = card.querySelector('[data-progress-track]');
            const fillEl = trackEl.querySelector('.mod-card-progress-fill');

            fillEl.style.width = info.percent + '%';
            trackEl.classList.add('visible');
            labelEl.classList.add('visible');

            if (info.done >= info.total) {
              labelEl.textContent = '✓ Selesai';
              labelEl.classList.add('done');
            } else {
              labelEl.textContent = `${info.percent}% selesai (${info.done}/${info.total})`;
            }
          });
        } catch (err) {
          console.error('Gagal memuat progres library:', err);
        }
      })();
    })();
  </script>

</body>
</html>