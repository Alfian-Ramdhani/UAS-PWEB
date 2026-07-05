<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title ?> — LEARNBASE.</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
:root {
  --deep-green: #0E6853; --deep-green-dark: #0a4f3f; --deep-green-light: #E7F2EF;
  --orange: #FF5B35; --orange-light: #FFEFEA; --charcoal: #1A1A1A;
  --gray: #666; --gray-soft: #8A8A8A; --bg: #F7F9F8; --line: #EAEDEC;
  --sidebar-w: 250px; --card-bg: #fff;
}
body.dark-mode {
  --deep-green: #1ABC9C; --deep-green-dark: #16A085; --deep-green-light: #1A3E3A;
  --orange: #FF7F50; --orange-light: #3E2A20; --charcoal: #E8E8E8;
  --gray: #B0B0B0; --gray-soft: #888; --bg: #0F171E; --line: #1F2A33;
  --card-bg: #1A2530;
}
body.dark-mode .sidebar, body.dark-mode .topbar, body.dark-mode .page-card, body.dark-mode .table-wrap, body.dark-mode .card-stat { background: var(--card-bg); }
body.dark-mode .sidebar, body.dark-mode .topbar, body.dark-mode .page-card, body.dark-mode .table-wrap, body.dark-mode .card-stat { border-color: var(--line); }
body.dark-mode td { border-bottom-color: var(--line); }
body.dark-mode table thead th { background: var(--bg); }

* { box-sizing: border-box; }
body {
  font-family: 'Inter', sans-serif; background: var(--bg); color: var(--charcoal);
  margin: 0; padding: 0; display: flex; min-height: 100vh;
}
h1,h2,h3,h4,h5,h6 { font-family: 'Poppins', sans-serif; }
a { text-decoration: none; }

.sidebar {
  width: var(--sidebar-w); background: var(--card-bg); border-right: 1px solid var(--line);
  padding: 1.75rem 1rem; display: flex; flex-direction: column;
  position: fixed; top: 0; left: 0; bottom: 0; z-index: 100;
}
.sidebar .brand { font-weight: 800; font-size: 1.3rem; color: var(--charcoal); padding: 0 0.5rem; margin-bottom: 2rem; display: block; }
.sidebar .brand span { color: var(--orange); }
.sidebar .brand small { font-size: 0.65rem; font-weight: 500; color: var(--gray-soft); }
.side-nav { list-style: none; padding: 0; margin: 0; flex: 1; }
.side-nav .nav-label { font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--gray-soft); padding: 0 0.75rem; margin: 0.5rem 0 0.75rem; }
.side-nav li { margin-bottom: 0.25rem; }
.side-link { display: flex; align-items: center; gap: 0.7rem; padding: 0.65rem 0.85rem; border-radius: 12px; color: var(--gray); font-weight: 500; font-size: 0.9rem; transition: background .15s, color .15s; }
.side-link:hover { background: var(--deep-green-light); color: var(--deep-green-dark); }
.side-link.active { background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green)); color: #fff; box-shadow: 0 8px 18px rgba(14,104,83,0.2); }

.main-area { margin-left: var(--sidebar-w); flex: 1; }
.topbar {
  background: var(--card-bg); border-bottom: 1px solid var(--line);
  padding: 0.9rem 2rem; display: flex; align-items: center; justify-content: space-between;
}
.topbar-title { font-weight: 700; font-size: 1.15rem; color: var(--charcoal); }
.topbar-right { display: flex; align-items: center; gap: 0.75rem; }
.admin-avatar { width: 36px; height: 36px; border-radius: 50%; background: linear-gradient(135deg, var(--orange), var(--deep-green)); display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 0.85rem; }

.wrap { padding: 1.75rem 2rem; }

/* Profile header */
.profile-header {
  display: flex; align-items: center; gap: 1.5rem;
  background: var(--card-bg); border: 1px solid var(--line); border-radius: 18px;
  padding: 1.75rem 2rem; margin-bottom: 1.5rem;
}
.profile-avatar-lg {
  width: 64px; height: 64px; border-radius: 50%;
  background: linear-gradient(135deg, var(--orange), var(--deep-green));
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-weight: 700; font-size: 1.5rem; flex-shrink: 0;
}
.profile-info h2 { font-weight: 700; font-size: 1.3rem; margin: 0 0 0.25rem; }
.profile-info .email { color: var(--gray-soft); font-size: 0.9rem; margin-bottom: 0.3rem; }
.profile-info .meta { font-size: 0.82rem; color: var(--gray-soft); display: flex; gap: 0.75rem; flex-wrap: wrap; }

/* Stat mini cards */
.stats-mini { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 0.75rem; margin-bottom: 1.5rem; }
.card-stat {
  background: var(--card-bg); border: 1px solid var(--line); border-radius: 14px;
  padding: 1rem 1.25rem; text-align: center;
}
.card-stat .num { font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 1.5rem; color: var(--deep-green); }
.card-stat .lbl { font-size: 0.78rem; color: var(--gray-soft); margin-top: 0.15rem; }

/* Progress table */
.progress-module {
  display: flex; align-items: center; gap: 1rem;
  padding: 0.85rem 1rem; border-radius: 12px;
  background: var(--bg); border: 1px solid var(--line); margin-bottom: 0.5rem;
}
.progress-module:last-child { margin-bottom: 0; }
.progress-module .name { flex: 1; font-weight: 600; font-size: 0.88rem; }
.progress-track-mini { width: 120px; height: 6px; background: var(--line); border-radius: 50px; overflow: hidden; }
.progress-fill-mini { height: 100%; background: linear-gradient(90deg, var(--orange), var(--deep-green)); border-radius: 50px; transition: width .3s; }
.progress-module .pct { font-size: 0.82rem; font-weight: 600; color: var(--deep-green-dark); min-width: 48px; text-align: right; }
.progress-module .status-badge { font-size: 0.7rem; font-weight: 600; padding: 0.2rem 0.6rem; border-radius: 50px; }
.status-badge.completed { background: var(--deep-green-light); color: var(--deep-green); }
.status-badge.in-progress { background: var(--orange-light); color: var(--orange); }
.status-badge.not-started { background: var(--bg); color: var(--gray-soft); }

.page-card {
  background: var(--card-bg); border: 1px solid var(--line); border-radius: 16px; padding: 1.5rem;
  margin-bottom: 1.25rem;
}
.page-card h3 { font-weight: 700; font-size: 1rem; margin: 0 0 0.75rem; }

.badge { display: inline-block; font-size: 0.7rem; font-weight: 600; padding: 0.2rem 0.65rem; border-radius: 50px; }
.badge.premium { background: #FFF3D6; color: #B8862A; }
.badge.free { background: var(--bg); color: var(--gray-soft); }
.badge.user { background: var(--deep-green-light); color: var(--deep-green); }

.btn-sm { display: inline-flex; align-items: center; gap: 0.3rem; padding: 0.35rem 0.85rem; border-radius: 8px; font-size: 0.78rem; font-weight: 600; border: none; cursor: pointer; transition: background .15s; text-decoration: none; }
.btn-sm.outline { background: transparent; border: 1px solid var(--line); color: var(--gray); }
.btn-sm.outline:hover { border-color: var(--deep-green); color: var(--deep-green); }

@media (max-width: 768px) {
  .sidebar { width: 100%; position: relative; }
  .main-area { margin-left: 0; }
  .wrap { padding: 1.25rem; }
}
</style>
</head>
<body>
<script>if(localStorage.getItem("learnbase_dark_mode")==="true")document.body.classList.add("dark-mode");</script>

<aside class="sidebar">
  <a href="<?= site_url('admin/dashboard') ?>" class="brand">LEARNBASE<span>.</span> <small>Admin</small></a>
  <ul class="side-nav">
    <li class="nav-label">Menu</li>
    <li><a href="<?= site_url('admin/dashboard') ?>" class="side-link"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9"></rect><rect x="14" y="3" width="7" height="5"></rect><rect x="14" y="12" width="7" height="9"></rect><rect x="3" y="16" width="7" height="5"></rect></svg> Dashboard</a></li>
    <li><a href="<?= site_url('admin/mentors') ?>" class="side-link"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> Kelola Mentor</a></li>
    <li><a href="<?= site_url('admin/members') ?>" class="side-link active"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg> Data Member</a></li>
    <li><a href="<?= site_url('admin/transactions') ?>" class="side-link"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg> Transaksi</a></li>
  </ul>
</aside>

<div class="main-area">
  <header class="topbar">
    <div class="topbar-title">Detail Member</div>
    <div class="topbar-right">
      <div class="admin-avatar"><?= strtoupper(substr($nama, 0, 1)) ?></div>
      <span class="admin-name"><?= $nama ?></span>
    </div>
  </header>

  <div class="wrap">
    <a href="<?= site_url('admin/members') ?>" class="btn-sm outline" style="margin-bottom:1rem;">← Kembali ke Member</a>

    <!-- PROFILE -->
    <div class="profile-header">
      <div class="profile-avatar-lg"><?= strtoupper(substr($user['nama'], 0, 1)) ?></div>
      <div class="profile-info">
        <h2><?= $user['nama'] ?></h2>
        <div class="email"><?= $user['email'] ?></div>
        <div class="meta">
          <span>Role: <span class="badge user">User</span></span>
          <span>Membership: <span class="badge <?= $user['membership'] ?>"><?= ucfirst($user['membership']) ?></span></span>
          <span>Bergabung: <?= date('d M Y', strtotime($user['created_at'])) ?></span>
        </div>
      </div>
    </div>

    <!-- STATS -->
    <div class="stats-mini">
      <div class="card-stat"><div class="num"><?= $completed_count ?></div><div class="lbl">Courses Completed</div></div>
      <div class="card-stat"><div class="num"><?= $in_progress_count ?></div><div class="lbl">In Progress</div></div>
      <div class="card-stat"><div class="num"><?= $cert_count ?></div><div class="lbl">Sertifikat</div></div>
      <div class="card-stat"><div class="num"><?= $learning_hours ?></div><div class="lbl">Learning Hours</div></div>
    </div>

    <!-- COURSE PROGRESS -->
    <div class="page-card">
      <h3> Progress Belajar</h3>
      <?php
      $has_progress = false;
      foreach ($course_progress as $c) { if ($c['done'] > 0) { $has_progress = true; break; } }
      if (!$has_progress): ?>
      <p style="color:var(--gray-soft);font-size:0.9rem;">Member ini belum memulai modul apapun.</p>
      <?php else: ?>
      <?php foreach ($course_progress as $cp):
        if ($cp['done'] == 0) continue;
      ?>
      <div class="progress-module">
        <div class="name"><?= $cp['module']['name'] ?></div>
        <div class="progress-track-mini"><div class="progress-fill-mini" style="width:<?= $cp['pct'] ?>%;"></div></div>
        <span class="pct"><?= $cp['pct'] ?>%</span>
        <span class="status-badge <?= $cp['status'] ?>"><?= $cp['status'] === 'completed' ? 'Selesai' : 'Progres' ?></span>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>

    <!-- ALL MODULES -->
    <div class="page-card">
      <h3> Semua Modul</h3>
      <?php foreach ($course_progress as $cp): ?>
      <div class="progress-module">
        <div class="name"><?= $cp['module']['name'] ?></div>
        <div class="progress-track-mini"><div class="progress-fill-mini" style="width:<?= $cp['pct'] ?>%;"></div></div>
        <span class="pct"><?= $cp['pct'] ?>% (<?= $cp['done'] ?>/<?= $cp['total'] ?>)</span>
        <span class="status-badge <?= $cp['status'] ?>"><?= str_replace('-', ' ', ucfirst($cp['status'])) ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
</body>
</html>
