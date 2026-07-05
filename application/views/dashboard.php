<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard — LEARNBASE.</title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">

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
      --text-primary: #E8E8E8;
      --text-secondary: #999;
    }
    body.dark-mode .sidebar,
    body.dark-mode .top-header,
    body.dark-mode .profile-dropdown,
    body.dark-mode .stat-card,
    body.dark-mode .continue-card,
    body.dark-mode .course-card,
    body.dark-mode .site-footer,
    body.dark-mode .welcome-banner { background: var(--card-bg); }
    body.dark-mode .stat-card,
    body.dark-mode .continue-card,
    body.dark-mode .course-card,
    body.dark-mode .top-header,
    body.dark-mode .sidebar,
    body.dark-mode .site-footer { border-color: var(--line); }
    body.dark-mode .search-box input { background: #0F171E; border-color: var(--line); color: var(--text-primary); }
    body.dark-mode .icon-btn { background: var(--card-bg); border-color: var(--line); }
    body.dark-mode .dash-bg-shapes .bg-circle.c1 { background: radial-gradient(circle, rgba(26,188,156,0.08) 0%, transparent 70%); }
    body.dark-mode .btn-banner-cta { background: var(--deep-green); color: #fff; }
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

    * { box-sizing: border-box; }

    html { overflow-x: clip; }
    body {
      font-family: 'Inter', sans-serif;
      color: var(--charcoal);
      background-color: var(--bg);
      overflow-x: clip;
      position: relative;
    }

    /* ===== DECORATIVE BACKGROUND (matching auth.html) ===== */
    .dash-bg-shapes {
      position: fixed;
      inset: 0;
      z-index: 0;
      pointer-events: none;
      overflow: hidden;
    }

    .dash-bg-shapes .bg-circle {
      position: absolute;
      border-radius: 50%;
    }
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

    h1, h2, h3, h4, h5, h6, .brand-logo {
      font-family: 'Poppins', sans-serif;
    }

    a { text-decoration: none; }

    /* ===================== SIDEBAR ===================== */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      width: var(--sidebar-w);
      background: #FFFFFF;
      border-right: 1px solid var(--line);
      padding: 1.75rem 1.25rem;
      display: flex;
      flex-direction: column;
      transition: transform 0.25s ease;
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

    .side-link:hover {
      background-color: var(--deep-green-light);
      color: var(--deep-green-dark);
    }

    .side-link.active {
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green));
      color: #fff;
      box-shadow: 0 10px 22px rgba(14,104,83,0.25);
    }

    .side-link.active svg { opacity: 1; }

    .sidebar-footer {
      border-top: 1px solid var(--line);
      padding-top: 1rem;
      margin-top: 1rem;
    }

    .upgrade-card {
      background: var(--deep-green-light);
      border-radius: 16px;
      padding: 1rem;
      text-align: center;
    }

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
    .main-area {
      margin-left: var(--sidebar-w);
      min-height: 100vh;
      position: relative;
      z-index: 1;
      background: transparent;
    }

    .sidebar { z-index: 1050; position: fixed; }
    .sidebar-backdrop { z-index: 1040; position: fixed; }

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

    .sidebar-toggle {
      display: none;
      background: none;
      border: none;
      padding: 0.4rem;
      color: var(--charcoal);
    }

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

    .search-box {
      position: relative;
      flex: 1;
      max-width: 420px;
    }

    .search-box svg {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--gray-soft);
    }

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

    .header-right {
      margin-left: auto;
      display: flex;
      align-items: center;
      gap: 1.1rem;
    }

    .icon-btn {
      position: relative;
      width: 42px;
      height: 42px;
      border-radius: 50%;
      background: var(--bg);
      border: 1px solid var(--line);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--charcoal);
      transition: background-color 0.15s ease;
    }

    .icon-btn:hover { background: var(--deep-green-light); }

    .icon-btn .dot-badge {
      position: absolute;
      top: 9px;
      right: 10px;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--orange);
      border: 2px solid #fff;
    }

    .profile-chip {
      display: flex;
      align-items: center;
      gap: 0.65rem;
      padding-left: 1rem;
      border-left: 1px solid var(--line);
    }

    .profile-avatar {
      width: 42px;
      height: 42px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green));
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-weight: 700;
      font-family: 'Poppins', sans-serif;
      font-size: 0.95rem;
    }

    .profile-chip .name { font-weight: 600; font-size: 0.88rem; color: var(--charcoal); line-height: 1.2; }
    .profile-chip .role { font-size: 0.75rem; color: var(--gray-soft); }

    .profile-wrap { position: relative; }

    .profile-chip { cursor: pointer; user-select: none; }

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

    /* Welcome banner */
    .welcome-banner {
      background: linear-gradient(120deg, var(--deep-green-dark), var(--deep-green) 55%, #12806A);
      border-radius: 24px;
      padding: 2.25rem 2.5rem;
      color: #fff;
      position: relative;
      overflow: hidden;
      margin-bottom: 1.75rem;
    }

    .welcome-banner::after {
      content: "";
      position: absolute;
      right: -60px;
      top: -60px;
      width: 260px;
      height: 260px;
      background: radial-gradient(circle, rgba(255,91,53,0.35), transparent 70%);
      border-radius: 50%;
    }

    .welcome-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      font-weight: 600;
      font-size: 0.85rem;
      color: #FFD9CC;
      margin-bottom: 0.6rem;
    }

    .welcome-eyebrow .dot {
      width: 7px; height: 7px; border-radius: 50%; background: var(--orange);
    }

    .welcome-banner h1 {
      font-weight: 700;
      font-size: 1.85rem;
      margin-bottom: 0.5rem;
      position: relative;
      z-index: 1;
    }

    .welcome-banner p {
      font-size: 0.95rem;
      color: rgba(255,255,255,0.85);
      max-width: 480px;
      margin-bottom: 1.4rem;
      position: relative;
      z-index: 1;
    }

    .btn-banner-cta {
      background: #fff;
      color: var(--deep-green-dark);
      font-weight: 600;
      padding: 0.7rem 1.5rem;
      border-radius: 50px;
      font-size: 0.9rem;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      position: relative;
      z-index: 1;
      transition: transform 0.2s ease;
    }

    .btn-banner-cta:hover { transform: translateY(-2px); color: var(--deep-green-dark); }

    /* Stat cards */
    .stat-card {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 18px;
      padding: 1.4rem 1.5rem;
      display: flex;
      align-items: center;
      gap: 1rem;
      height: 100%;
      transition: box-shadow 0.2s ease, transform 0.2s ease;
    }

    .stat-card:hover {
      box-shadow: 0 16px 32px rgba(0,0,0,0.06);
      transform: translateY(-2px);
    }

    .stat-icon {
      width: 52px;
      height: 52px;
      min-width: 52px;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .stat-icon.green { background: var(--deep-green-light); color: var(--deep-green); }
    .stat-icon.orange { background: var(--orange-light); color: var(--orange); }
    .stat-icon.charcoal { background: #F0EFED; color: var(--charcoal); }

    .stat-value {
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 1.5rem;
      line-height: 1.2;
      color: var(--charcoal);
    }

    .stat-label { font-size: 0.82rem; color: var(--gray-soft); font-weight: 500; }

    /* Section headers */
    .section-title {
      font-weight: 700;
      font-size: 1.2rem;
      color: var(--charcoal);
      margin-bottom: 0.15rem;
    }

    .section-sub { font-size: 0.85rem; color: var(--gray-soft); }

    .section-head-row {
      display: flex;
      align-items: flex-end;
      justify-content: space-between;
      margin-bottom: 1.1rem;
    }

    .link-viewall {
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--deep-green);
    }

    /* Continue learning card */
    .continue-card {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 20px;
      padding: 1.6rem;
      display: flex;
      gap: 1.6rem;
      align-items: center;
    }

    .continue-thumb {
      width: 150px;
      height: 110px;
      min-width: 150px;
      border-radius: 14px;
      background: linear-gradient(135deg, #264DE4, #5a7de0);
      position: relative;
      overflow: hidden;
    }

    .continue-thumb .play-badge {
      position: absolute;
      inset: 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .play-circle-sm {
      width: 40px; height: 40px;
      border-radius: 50%;
      background: rgba(255,255,255,0.9);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--deep-green);
    }

    .continue-body { flex: 1; min-width: 0; }

    .continue-tag {
      display: inline-block;
      background: var(--orange-light);
      color: var(--orange);
      font-size: 0.72rem;
      font-weight: 600;
      padding: 0.25rem 0.65rem;
      border-radius: 50px;
      margin-bottom: 0.5rem;
    }

    .continue-body h3 {
      font-weight: 700;
      font-size: 1.05rem;
      margin-bottom: 0.25rem;
      color: var(--charcoal);
    }

    .continue-body .instructor {
      font-size: 0.82rem;
      color: var(--gray-soft);
      margin-bottom: 0.9rem;
    }

    .progress-track {
      height: 8px;
      background: var(--bg);
      border-radius: 50px;
      overflow: hidden;
      margin-bottom: 0.4rem;
    }

    .progress-fill {
      height: 100%;
      border-radius: 50px;
      background: linear-gradient(90deg, var(--orange), var(--deep-green));
    }

    .progress-meta {
      display: flex;
      justify-content: space-between;
      font-size: 0.78rem;
      color: var(--gray-soft);
    }

    .btn-resume {
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 60%, var(--deep-green));
      color: #fff;
      font-weight: 600;
      font-size: 0.9rem;
      padding: 0.75rem 1.6rem;
      border-radius: 50px;
      border: none;
      white-space: nowrap;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      transition: transform 0.2s ease;
    }

    .btn-resume:hover { transform: translateY(-2px); color: #fff; }

    /* Course discovery cards */
    .course-card {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 18px;
      overflow: hidden;
      height: 100%;
      transition: box-shadow 0.2s ease, transform 0.2s ease;
    }

    .course-card:hover {
      box-shadow: 0 16px 32px rgba(0,0,0,0.07);
      transform: translateY(-3px);
    }

    .course-thumb {
      height: 140px;
      position: relative;
    }

    .bookmark-btn {
      position: absolute;
      top: 12px;
      right: 12px;
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: rgba(255,255,255,0.92);
      border: none;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--charcoal);
      transition: color 0.15s ease;
    }

    .bookmark-btn:hover { color: var(--orange); }
    .bookmark-btn.active { color: var(--orange); }
    .bookmark-btn.active svg { fill: var(--orange); }

    .course-card-body { padding: 1.15rem 1.25rem 1.35rem; }

    .course-category {
      font-size: 0.72rem;
      font-weight: 600;
      color: var(--deep-green);
      text-transform: uppercase;
      letter-spacing: 0.04em;
      margin-bottom: 0.4rem;
    }

    .course-card-body h4 {
      font-weight: 700;
      font-size: 0.98rem;
      margin-bottom: 0.55rem;
      color: var(--charcoal);
      line-height: 1.35;
    }

    .course-instructor {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin-bottom: 0.75rem;
    }

    .instructor-avatar {
      width: 26px; height: 26px;
      border-radius: 50%;
    }

    .course-instructor span { font-size: 0.8rem; color: var(--gray); font-weight: 500; }

    .course-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-top: 1px solid var(--line);
      padding-top: 0.75rem;
    }

    .course-rating {
      display: flex;
      align-items: center;
      gap: 0.3rem;
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--charcoal);
    }

    .course-rating svg { color: #FFB020; }

    .course-price { font-weight: 700; font-size: 0.9rem; color: var(--deep-green-dark); }

    /* ===================== RESPONSIVE ===================== */
    @media (max-width: 991.98px) {
      .sidebar { transform: translateX(-100%); box-shadow: 0 0 40px rgba(0,0,0,0.15); }
      .sidebar.show { transform: translateX(0); }
      .main-area { margin-left: 0; }
      .sidebar-toggle { display: inline-flex; align-items: center; }
      .continue-card { flex-wrap: wrap; }
      .continue-thumb { width: 100%; height: 160px; }
      .btn-resume { width: 100%; justify-content: center; }
    }

    @media (max-width: 575.98px) {
      .content-wrap { padding: 1.25rem; }
      .top-header { padding: 0.85rem 1.25rem; }
      .profile-chip .name, .profile-chip .role { display: none; }
      .welcome-banner { padding: 1.75rem 1.5rem; }
      .search-box { max-width: none; }
    }

    .sidebar-backdrop {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.35);
      z-index: 1040;
    }
    .sidebar-backdrop.show { display: block; }
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

  <!-- ===================== SIDEBAR ===================== -->
  <aside class="sidebar" id="sidebar">
    <a href="#" class="brand-logo">LEARNBASE<span>.</span></a>

    <ul class="side-nav">
      <li class="nav-label">Menu</li>
      <li>
        <a href="#" class="side-link active">
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
      <?php if ($membership === 'premium'): ?>
      <li>
        <a href="<?= site_url('chat') ?>" class="side-link">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
          Live Chat Mentor
        </a>
      </li>
      <?php endif; ?>
    </ul>

    <div class="sidebar-footer">
      <?php if ($membership !== 'premium'): ?>
      <div class="upgrade-card">
        <p>Unlock all 100+ courses with Learnbase Pro.</p>
        <a href="<?= site_url('pricing') ?>" class="btn-upgrade">Upgrade to Pro</a>
      </div>
      <?php else: ?>
      <div class="upgrade-card" style="background:linear-gradient(135deg,var(--deep-green),#12806A);color:#fff;">
        <p style="color:rgba(255,255,255,.9);"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" style="vertical-align:middle;margin-right:4px;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg> Kamu sudah member Premium!</p>
      </div>
      <?php endif; ?>
      <a href="<?= site_url('auth/logout') ?>" id="logoutBtn" class="side-link" style="margin-top:0.6rem;color:var(--charcoal);">
        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
        Keluar
      </a>
    </div>
  </aside>


  <div class="main-area">

    <!-- TOP HEADER -->
    <header class="top-header">
      <button class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle menu">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
      </button>
      <button class="sidebar-toggle-collapse" id="sidebarCollapse" aria-label="Toggle sidebar">
        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>
      </button>

      <div class="search-box">
        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        <input type="text" placeholder="Search courses, mentors, topics...">
      </div>

      <div class="header-right">
        <button class="icon-btn" aria-label="Notifications">
          <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
          <span class="dot-badge"></span>
        </button>

        <div class="profile-wrap">
          <div class="profile-chip" id="profileAvatarChip">
            <div class="profile-avatar" id="profileAvatar"><?= strtoupper(substr($nama, 0, 1)) ?></div>
            <div>
              <div class="name" id="profileName"><?= $nama ?></div>
              <div class="role"><?= $membership === 'premium' ? 'Premium' : 'Free' ?></div>
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

      <!-- PAYMENT FLASH MESSAGES -->
      <?php if ($this->session->flashdata('pay_success')): ?>
      <div style="background:var(--deep-green-light);border:1px solid var(--deep-green);color:var(--deep-green);padding:1rem 1.25rem;border-radius:14px;margin-bottom:1.25rem;font-size:.9rem;font-weight:500;display:flex;align-items:center;gap:.6rem;">
        <span style="font-size:1.3rem;">✅</span> <?= $this->session->flashdata('pay_success') ?>
      </div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('pay_error')): ?>
      <div style="background:var(--orange-light);border:1px solid var(--orange);color:var(--orange);padding:1rem 1.25rem;border-radius:14px;margin-bottom:1.25rem;font-size:.9rem;font-weight:500;display:flex;align-items:center;gap:.6rem;">
        <span style="font-size:1.3rem;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></span> <?= $this->session->flashdata('pay_error') ?>
      </div>
      <?php endif; ?>

      <!-- WELCOME BANNER -->
      <section class="welcome-banner">
        <span class="welcome-eyebrow"><span class="dot"></span>Selamat datang kembali</span>
        <h1 id="welcomeName">Halo, <?= $nama ?>! Waktunya lanjut belajar. </h1>
        <p id="welcomeSubtitle"><?= $in_progress_module ? 'Lanjutkan modul yang sedang kamu pelajari.' : 'Yuk mulai perjalanan belajarmu — pilih modul pertama dari Library.' ?></p>
        <a href="#continue" class="btn-banner-cta">
          Lanjutkan Belajar
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
      </section>

      <!-- QUICK STATS -->
      <div class="row g-3 mb-4">
        <div class="col-md-4 col-12">
          <div class="stat-card">
            <div class="stat-icon green">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            </div>
            <div>
              <div class="stat-value" id="statCourses"><?= $completed_modules ?></div>
              <div class="stat-label">Total Courses Completed</div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-12">
          <div class="stat-card">
            <div class="stat-icon orange">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
            </div>
            <div>
              <div class="stat-value"><span id="statHours"><?= $learning_hours ?></span> <span style="font-size:0.9rem;font-weight:500;color:var(--gray-soft);">jam</span></div>
              <div class="stat-label">Learning Hours</div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-12">
          <div class="stat-card">
            <div class="stat-icon charcoal">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"></path></svg>
            </div>
            <div>
              <div class="stat-value"><span id="statStreak"><?= $streak ?></span> <span style="font-size:0.9rem;font-weight:500;color:var(--gray-soft);">hari</span></div>
              <div class="stat-label">Day Streak</div>
            </div>
          </div>
        </div>
      </div>

      <!-- CONTINUE LEARNING -->
      <section id="continue" class="mb-4">
        <div class="section-head-row">
          <div>
            <div class="section-title">Lanjutkan Belajar</div>
            <div class="section-sub">Kursus yang sedang kamu ikuti</div>
          </div>
        </div>

        <?php if ($in_progress_module):
          $pct = round(($in_progress_done / $in_progress_total) * 100); ?>
        <div class="continue-card" id="continueCard">
          <div class="continue-thumb">
            <div class="play-badge"><div class="play-circle-sm">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="6 3 20 12 6 21 6 3"></polygon></svg>
            </div></div>
          </div>
          <div class="continue-body">
            <span class="continue-tag" id="continueTag"><?= $in_progress_module['category'] ?></span>
            <h3 id="continueTitle"><?= $in_progress_module['name'] ?></h3>
            <p class="instructor" id="continueInstructor"><?= $in_progress_done ?> dari <?= $in_progress_total ?> topik</p>
            <div class="progress-track">
              <div class="progress-fill" id="continueProgressFill" style="width: <?= $pct ?>%;"></div>
            </div>
            <div class="progress-meta">
              <span id="continuePercentText"><?= $pct ?>% selesai</span>
              <span id="continueRemainingText"><?= $in_progress_total - $in_progress_done ?> topik tersisa</span>
            </div>
          </div>
          <a href="<?= site_url('modul/belajar/' . $in_progress_module['slug']) ?>" class="btn-resume" id="continueResumeLink">
            Resume
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
          </a>
        </div>
        <?php else: ?>
        <div class="continue-card" id="continueEmptyState" style="display:flex; align-items:center; justify-content:space-between;">
          <div class="continue-body">
            <span class="continue-tag">Mulai Belajar</span>
            <h3>Kamu belum punya kursus yang sedang berjalan</h3>
            <p class="instructor">Pilih modul bahasa pemrograman pertamamu dari Library dan progresmu akan otomatis tersimpan di sini.</p>
          </div>
          <a href="<?= site_url('library') ?>" class="btn-resume">
            Jelajahi Library
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
          </a>
        </div>
        <?php endif; ?>
      </section>

      <!-- COURSE DISCOVERY -->
      <section>
        <div class="section-head-row">
          <div>
            <div class="section-title">Rekomendasi Untukmu</div>
            <div class="section-sub">Berdasarkan minat dan aktivitas belajarmu</div>
          </div>
          <a href="#" class="link-viewall">Lihat Semua</a>
        </div>

        <div class="row g-3">
          <?php
          $devicons = [
            'javascript' => '<i class="devicon-javascript-plain colored" style="font-size:28px;"></i>',
            'php'        => '<i class="devicon-php-plain colored" style="font-size:28px;"></i>',
            'python'     => '<i class="devicon-python-plain colored" style="font-size:28px;"></i>',
            'java'       => '<i class="devicon-java-plain colored" style="font-size:28px;"></i>',
            'cpp'        => '<i class="devicon-cplusplus-plain colored" style="font-size:28px;"></i>',
            'c'          => '<i class="devicon-c-plain colored" style="font-size:28px;"></i>',
            'csharp'     => '<i class="devicon-csharp-plain colored" style="font-size:28px;"></i>',
            'go'         => '<i class="devicon-go-plain colored" style="font-size:28px;"></i>',
            'ruby'       => '<i class="devicon-ruby-plain colored" style="font-size:28px;"></i>',
            'rust'       => '<i class="devicon-rust-plain" style="font-size:28px;color:#CE422B;"></i>',
            'typescript' => '<i class="devicon-typescript-plain colored" style="font-size:28px;"></i>',
            'sqlite'     => '<i class="devicon-sqlite-plain colored" style="font-size:28px;"></i>'
          ];
          // Warna background sesuai brand bahasa pemrograman (versi soft/pucat agar logo terlihat)
          $lang_colors = [
            'javascript' => '#FEF3D9', 'php' => '#EBE8F9', 'python' => '#DCEBF6',
            'java' => '#FDEAD9', 'cpp' => '#D6E6F5', 'c' => '#E6EAEE',
            'csharp' => '#DAF0DA', 'go' => '#D9F4FC', 'ruby' => '#FADADA',
            'rust' => '#F5E0DA', 'typescript' => '#DCE8F8', 'sqlite' => '#D6E3E8'
          ];
          $difficulty_colors = [
            'beginner' => '#0E6853', 'intermediate' => '#FF5B35', 'advanced' => '#264DE4'
          ];
          if (!empty($recommended)):
            foreach ($recommended as $r):
              $slug = $r['slug'];
              $icon_html = $devicons[$slug] ?? '<i class="devicon-devicon-plain" style="font-size:28px;"></i>';
              $bg_color = $lang_colors[$slug] ?? '#0E6853';
              $dc = $difficulty_colors[$r['difficulty']] ?? '#0E6853';
          ?>
          <div class="col-lg-4 col-md-6 col-12">
            <a href="<?= site_url('modul/detail/' . $slug) ?>" class="course-card" style="display:block;text-decoration:none;">
              <div class="course-thumb" style="background: <?= $bg_color ?>;display:flex;align-items:center;justify-content:center;padding:24px 0;">
                <?= str_replace('style="font-size:28px;"', 'style="font-size:52px;"', $icon_html) ?>
              </div>
              <div class="course-card-body">
                <div class="course-category"><?= $r['category'] ?></div>
                <h4><?= $r['name'] ?></h4>
                <div class="course-instructor">
                  <div class="instructor-avatar" style="background:<?= $dc ?>;">
                </div>
                  <span><?= ucfirst($r['difficulty']) ?></span>
                </div>
                <div class="course-footer">
                  <span class="course-rating">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15 9 22 9.5 17 14.5 18.5 22 12 18 5.5 22 7 14.5 2 9.5 9 9"></polygon></svg>
                    4.8
                  </span>
                  <span class="course-price">Mulai Belajar →</span>
                </div>
              </div>
            </a>
          </div>
          <?php endforeach;
          else: ?>
          <div class="col-12">
            <div style="background:var(--bg-editor-soft);border:1px dashed var(--line);border-radius:18px;padding:2.5rem;text-align:center;color:var(--gray-soft);">
              <p style="font-size:0.95rem;margin:0;">Semua modul beginner sudah kamu mulai atau selesaikan. </p>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </section>

    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
  <?php if ($membership === 'premium') $this->load->view('premium_features'); ?>
  <script>

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

    // ===== Profile Dropdown Toggle =====
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

    document.querySelectorAll('.bookmark-btn').forEach(btn => {
      btn.addEventListener('click', () => btn.classList.toggle('active'));
    });
  </script>

</body>
</html>