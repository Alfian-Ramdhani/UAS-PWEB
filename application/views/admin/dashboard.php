<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin — LEARNBASE.</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
:root {
  --deep-green: #0E6853; --deep-green-dark: #0a4f3f; --deep-green-light: #E7F2EF;
  --orange: #FF5B35; --orange-light: #FFEFEA; --charcoal: #1A1A1A;
  --gray: #666; --gray-soft: #8A8A8A; --bg: #F7F9F8; --line: #EAEDEC; --border-light: #e8edec;
  --sidebar-w: 250px; --card-bg: #fff;
}
body.dark-mode {
  --deep-green: #1ABC9C; --deep-green-dark: #16A085; --deep-green-light: #1A3E3A;
  --orange: #FF7F50; --orange-light: #3E2A20; --charcoal: #E8E8E8;
  --gray: #B0B0B0; --gray-soft: #888; --bg: #0F171E; --line: #1F2A33;
  --border-light: #1F2A33; --card-bg: #1A2530;
}
body.dark-mode .sidebar,
body.dark-mode .topbar,
body.dark-mode .stat-card,
body.dark-mode .table-wrap,
body.dark-mode .page-card { background: var(--card-bg); }
body.dark-mode .stat-card,
body.dark-mode .topbar,
body.dark-mode .sidebar,
body.dark-mode .table-wrap,
body.dark-mode .page-card { border-color: var(--line); }
body.dark-mode td { border-bottom-color: var(--line); color: var(--charcoal); }
body.dark-mode table thead th { background: var(--bg); }

* { box-sizing: border-box; }
body {
  font-family: 'Inter', sans-serif; background: var(--bg); color: var(--charcoal);
  margin: 0; padding: 0; display: flex; min-height: 100vh; overflow-x: hidden;
}
h1,h2,h3,h4,h5,h6 { font-family: 'Poppins', sans-serif; }
a { text-decoration: none; }

/* SIDEBAR */
.sidebar {
  width: var(--sidebar-w); flex-shrink: 0;
  background: var(--card-bg); border-right: 1px solid var(--line);
  padding: 1.75rem 1rem; display: flex; flex-direction: column;
  position: fixed; top: 0; left: 0; bottom: 0; z-index: 100;
  transition: background .3s;
}
.sidebar .brand {
  font-weight: 800; font-size: 1.3rem; color: var(--charcoal);
  padding: 0 0.5rem; margin-bottom: 2rem; display: block;
}
.sidebar .brand span { color: var(--orange); }
.sidebar .brand small { font-size: 0.65rem; font-weight: 500; color: var(--gray-soft); }

.side-nav { list-style: none; padding: 0; margin: 0; flex: 1; }
.side-nav .nav-label {
  font-size: 0.7rem; font-weight: 600; text-transform: uppercase;
  letter-spacing: 0.08em; color: var(--gray-soft);
  padding: 0 0.75rem; margin: 0.5rem 0 0.75rem;
}
.side-nav li { margin-bottom: 0.25rem; }
.side-link {
  display: flex; align-items: center; gap: 0.7rem;
  padding: 0.65rem 0.85rem; border-radius: 12px;
  color: var(--gray); font-weight: 500; font-size: 0.9rem;
  transition: background .15s, color .15s;
}
.side-link:hover { background: var(--deep-green-light); color: var(--deep-green-dark); }
.side-link.active {
  background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green));
  color: #fff; box-shadow: 0 8px 18px rgba(14,104,83,0.2);
}
.side-link svg { flex-shrink: 0; opacity: 0.8; }
.side-link.active svg { opacity: 1; }

/* MAIN */
.main-area { margin-left: var(--sidebar-w); flex: 1; min-height: 100vh; }

.topbar {
  background: var(--card-bg); border-bottom: 1px solid var(--line);
  padding: 0.9rem 2rem; display: flex; align-items: center; justify-content: space-between;
  gap: 1rem; position: sticky; top: 0; z-index: 90;
}
.topbar-left { display: flex; align-items: center; gap: 1rem; }
.topbar-title { font-weight: 700; font-size: 1.15rem; color: var(--charcoal); }
.topbar-right { display: flex; align-items: center; gap: 0.75rem; }
.admin-avatar {
  width: 36px; height: 36px; border-radius: 50%;
  background: linear-gradient(135deg, var(--orange), var(--deep-green));
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-weight: 700; font-size: 0.85rem;
}
.admin-name { font-weight: 600; font-size: 0.85rem; color: var(--charcoal); }
.logout-btn {
  background: var(--orange); color: #fff; font-weight: 600; font-size: 0.8rem;
  padding: 0.45rem 1.1rem; border-radius: 50px; border: none; cursor: pointer;
  transition: transform .15s;
}
.logout-btn:hover { transform: translateY(-1px); }

.wrap { padding: 1.75rem 2rem; }

/* Stats */
.stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(170px,1fr)); gap: 1rem; margin-bottom: 2rem; }
.stat-card {
  background: var(--card-bg); border: 1px solid var(--line); border-radius: 16px;
  padding: 1.25rem 1.35rem; display: flex; align-items: center; gap: 0.9rem;
  transition: box-shadow .15s, transform .15s;
}
.stat-card:hover { box-shadow: 0 8px 16px rgba(0,0,0,0.05); transform: translateY(-2px); }
.stat-icon {
  width: 44px; height: 44px; border-radius: 12px;
  display: flex; align-items: center; justify-content: center; font-size: 1.2rem;
}
.stat-icon.green { background: var(--deep-green-light); }
.stat-icon.orange { background: var(--orange-light); }
.stat-value { font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 1.4rem; line-height: 1.2; }
.stat-label { font-size: 0.75rem; color: var(--gray-soft); font-weight: 500; }

/* Section */
.section-title { font-weight: 700; font-size: 1.05rem; margin-bottom: 0.15rem; }
.section-sub { font-size: 0.82rem; color: var(--gray-soft); margin-bottom: 1rem; }
.section-head {
  display: flex; align-items: center; justify-content: space-between;
  flex-wrap: wrap; gap: 0.5rem; margin-bottom: 0.75rem;
}

/* Table */
.table-wrap { background: var(--card-bg); border: 1px solid var(--line); border-radius: 16px; overflow: hidden; }
table { width: 100%; border-collapse: collapse; font-size: 0.88rem; }
th {
  text-align: left; padding: 0.7rem 1.1rem; background: var(--bg);
  color: var(--gray-soft); font-weight: 600; font-size: 0.75rem;
  text-transform: uppercase; letter-spacing: 0.04em;
  border-bottom: 1px solid var(--line);
}
td { padding: 0.7rem 1.1rem; border-bottom: 1px solid var(--bg); color: var(--charcoal); }
tr:last-child td { border-bottom: none; }

.badge {
  display: inline-block; font-size: 0.7rem; font-weight: 600;
  padding: 0.2rem 0.65rem; border-radius: 50px;
}
.badge.admin { background: var(--orange-light); color: var(--orange); }
.badge.user { background: var(--deep-green-light); color: var(--deep-green); }
.badge.instructor { background: #E8E0FF; color: #6B4FD8; }
.badge.premium { background: #FFF3D6; color: #B8862A; }
.badge.free { background: var(--bg); color: var(--gray-soft); }
.badge.pending { background: var(--orange-light); color: var(--orange); }
.badge.success { background: var(--deep-green-light); color: var(--deep-green); }
.badge.failed { background: #FFE8E8; color: #D9534F; }

.btn-sm {
  display: inline-flex; align-items: center; gap: 0.3rem;
  padding: 0.35rem 0.85rem; border-radius: 8px;
  font-size: 0.78rem; font-weight: 600; border: none; cursor: pointer;
  transition: background .15s, transform .15s;
}
.btn-sm:hover { transform: translateY(-1px); }
.btn-sm.primary { background: var(--deep-green); color: #fff; }
.btn-sm.primary:hover { background: var(--deep-green-dark); }
.btn-sm.danger { background: #FFE8E8; color: #D9534F; }
.btn-sm.danger:hover { background: #FFD5D5; }
.btn-sm.warning { background: var(--orange-light); color: var(--orange); }
.btn-sm.outline { background: transparent; border: 1px solid var(--line); color: var(--gray); }
.btn-sm.outline:hover { border-color: var(--deep-green); color: var(--deep-green); }

.alert {
  padding: 0.75rem 1rem; border-radius: 12px; font-size: 0.85rem; font-weight: 500; margin-bottom: 1rem;
}
.alert.success { background: var(--deep-green-light); color: var(--deep-green); }
.alert.error { background: var(--orange-light); color: var(--orange); }

@media (max-width: 768px) {
  .sidebar { width: 100%; position: relative; }
  .main-area { margin-left: 0; }
  .wrap { padding: 1.25rem; }
  .stats { grid-template-columns: repeat(2, 1fr); }
}
</style>
</head>
<body>
<script>if(localStorage.getItem("learnbase_dark_mode")==="true")document.body.classList.add("dark-mode");</script>

<!-- SIDEBAR -->
<aside class="sidebar">
  <a href="<?= site_url('admin/dashboard') ?>" class="brand">LEARNBASE<span>.</span> <small>Admin</small></a>
  <ul class="side-nav">
    <li class="nav-label">Menu</li>
    <li><a href="<?= site_url('admin/dashboard') ?>" class="side-link active">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9"></rect><rect x="14" y="3" width="7" height="5"></rect><rect x="14" y="12" width="7" height="9"></rect><rect x="3" y="16" width="7" height="5"></rect></svg>
      Dashboard
    </a></li>
    <li><a href="<?= site_url('admin/mentors') ?>" class="side-link">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
      Kelola Mentor
    </a></li>
    <li><a href="<?= site_url('admin/members') ?>" class="side-link">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
      Data Member
    </a></li>
    <li><a href="<?= site_url('admin/transactions') ?>" class="side-link">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
      Transaksi
    </a></li>
  </ul>
  <div style="border-top:1px solid var(--line);padding-top:0.75rem;">
    <a href="<?= site_url('auth/logout') ?>" class="side-link" style="color:var(--orange);">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
      Logout
    </a>
  </div>
</aside>

<div class="main-area">
  <header class="topbar">
    <div class="topbar-left">
      <div class="topbar-title">Dashboard</div>
    </div>
    <div class="topbar-right">
      <div class="admin-avatar"><?= strtoupper(substr($nama, 0, 1)) ?></div>
      <span class="admin-name"><?= $nama ?></span>
      <a href="<?= site_url('auth/logout') ?>" class="logout-btn">Logout</a>
    </div>
  </header>

  <div class="wrap">
    <div class="stats">
      <div class="stat-card">
        <div class="stat-icon green"></div>
        <div><div class="stat-value"><?= $total_users ?></div><div class="stat-label">Total Member</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon orange"></div>
        <div><div class="stat-value"><?= $total_mentors ?></div><div class="stat-label">Total Mentor</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon green"></div>
        <div><div class="stat-value"><?= $total_modules ?></div><div class="stat-label">Modul</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon orange"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
        <div><div class="stat-value"><?= $total_premium ?></div><div class="stat-label">Premium Member</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon green"></div>
        <div><div class="stat-value"><?= $total_progress ?></div><div class="stat-label">Progress Records</div></div>
      </div>
      <div class="stat-card">
        <div class="stat-icon orange"></div>
        <div><div class="stat-value"><?= $total_transactions ?></div><div class="stat-label">Transaksi</div></div>
      </div>
    </div>

    <div class="section-head">
      <div>
        <div class="section-title">Member Terbaru</div>
        <div class="section-sub">5 member terakhir yang bergabung</div>
      </div>
      <a href="<?= site_url('admin/members') ?>" class="btn-sm outline">Lihat Semua →</a>
    </div>

    <div class="table-wrap" style="margin-bottom:2rem;">
      <table>
        <thead><tr><th>Nama</th><th>Email</th><th>Membership</th><th>Bergabung</th></tr></thead>
        <tbody>
          <?php if (empty($recent_users)): ?>
          <tr><td colspan="4" style="text-align:center;color:var(--gray-soft);padding:1.5rem;">Belum ada member.</td></tr>
          <?php else: ?>
          <?php foreach ($recent_users as $u): ?>
          <tr>
            <td><strong><?= $u['nama'] ?></strong></td>
            <td><?= $u['email'] ?></td>
            <td><span class="badge <?= $u['membership'] ?>"><?= ucfirst($u['membership']) ?></span></td>
            <td><?= date('d M Y', strtotime($u['created_at'])) ?></td>
          </tr>
          <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div class="section-head">
      <div>
        <div class="section-title">Transaksi Terbaru</div>
        <div class="section-sub">5 transaksi terakhir</div>
      </div>
      <a href="<?= site_url('admin/transactions') ?>" class="btn-sm outline">Lihat Semua →</a>
    </div>

    <div class="table-wrap">
      <table>
        <thead><tr><th>Member</th><th>Jumlah</th><th>Metode</th><th>Status</th><th>Tanggal</th></tr></thead>
        <tbody>
          <?php if (empty($recent_transactions)): ?>
          <tr><td colspan="5" style="text-align:center;color:var(--gray-soft);padding:1.5rem;">Belum ada transaksi.</td></tr>
          <?php else: ?>
          <?php foreach ($recent_transactions as $tx): ?>
          <tr>
            <td><strong><?= $tx['nama'] ?? 'N/A' ?></strong> <span style="font-size:0.78rem;color:var(--gray-soft);"><?= $tx['email'] ?? 'N/A' ?></span></td>
            <td>Rp<?= number_format($tx['amount'], 0, ',', '.') ?></td>
            <td><?= $tx['payment_method'] ?></td>
            <td><span class="badge <?= $tx['status'] ?>"><?= ucfirst($tx['status']) ?></span></td>
            <td><?= date('d M Y', strtotime($tx['created_at'])) ?></td>
          </tr>
          <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>
