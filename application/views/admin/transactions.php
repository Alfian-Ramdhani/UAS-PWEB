<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Transaksi — LEARNBASE.</title>
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
body.dark-mode .sidebar, body.dark-mode .topbar, body.dark-mode .table-wrap { background: var(--card-bg); }
body.dark-mode .sidebar, body.dark-mode .topbar, body.dark-mode .table-wrap { border-color: var(--line); }
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
.logout-btn { background: var(--orange); color: #fff; font-weight: 600; font-size: 0.8rem; padding: 0.45rem 1.1rem; border-radius: 50px; border: none; cursor: pointer; }

.wrap { padding: 1.75rem 2rem; }

.alert { padding: 0.75rem 1rem; border-radius: 12px; font-size: 0.85rem; font-weight: 500; margin-bottom: 1rem; }
.alert.success { background: var(--deep-green-light); color: var(--deep-green); }
.alert.error { background: var(--orange-light); color: var(--orange); }

.table-wrap { background: var(--card-bg); border: 1px solid var(--line); border-radius: 16px; overflow: hidden; }
table { width: 100%; border-collapse: collapse; font-size: 0.88rem; }
th { text-align: left; padding: 0.7rem 1.1rem; background: var(--bg); color: var(--gray-soft); font-weight: 600; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.04em; border-bottom: 1px solid var(--line); }
td { padding: 0.7rem 1.1rem; border-bottom: 1px solid var(--bg); color: var(--charcoal); }
tr:last-child td { border-bottom: none; }

.badge { display: inline-block; font-size: 0.7rem; font-weight: 600; padding: 0.2rem 0.65rem; border-radius: 50px; }
.badge.pending { background: var(--orange-light); color: var(--orange); }
.badge.success { background: var(--deep-green-light); color: var(--deep-green); }
.badge.failed { background: #FFE8E8; color: #D9534F; }

.btn-sm { display: inline-flex; align-items: center; gap: 0.3rem; padding: 0.35rem 0.85rem; border-radius: 8px; font-size: 0.78rem; font-weight: 600; border: none; cursor: pointer; transition: background .15s; text-decoration: none; }
.btn-sm:hover { transform: translateY(-1px); }
.btn-sm.success { background: var(--deep-green); color: #fff; }
.btn-sm.danger { background: #FFE8E8; color: #D9534F; }
.btn-sm.warning { background: var(--orange-light); color: var(--orange); }

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
    <li><a href="<?= site_url('admin/members') ?>" class="side-link"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg> Data Member</a></li>
    <li><a href="<?= site_url('admin/transactions') ?>" class="side-link active"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg> Transaksi</a></li>
  </ul>
  <div style="border-top:1px solid var(--line);padding-top:0.75rem;">
    <a href="<?= site_url('auth/logout') ?>" class="side-link" style="color:var(--orange);"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Logout</a>
  </div>
</aside>

<div class="main-area">
  <header class="topbar">
    <div class="topbar-title">Transaksi Pembayaran</div>
    <div class="topbar-right">
      <div class="admin-avatar"><?= strtoupper(substr($nama, 0, 1)) ?></div>
      <span class="admin-name"><?= $nama ?></span>
      <a href="<?= site_url('auth/logout') ?>" class="logout-btn">Logout</a>
    </div>
  </header>

  <div class="wrap">
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert success">✅ <?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>

    <!-- Search -->
    <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:0.5rem;margin-bottom:1rem;">
      <div class="section-title" style="font-size:1.05rem;font-weight:700;margin:0;">Riwayat Transaksi</div>
      <form method="get" action="<?= site_url('admin/search_transactions') ?>" style="display:flex;gap:0.4rem;">
        <input type="text" name="q" placeholder="Cari transaksi..." value="<?= $search_query ?? '' ?>" style="padding:0.45rem 0.85rem;border:2px solid var(--line);border-radius:10px;font-size:0.82rem;font-family:'Inter',sans-serif;background:var(--bg);color:var(--charcoal);width:220px;">
        <button type="submit" style="padding:0.45rem 0.9rem;border-radius:10px;border:none;background:var(--deep-green);color:#fff;font-weight:600;font-size:0.82rem;cursor:pointer;">Cari</button>
        <?php if (isset($search_query) && !empty($search_query)): ?>
        <a href="<?= site_url('admin/transactions') ?>" style="padding:0.45rem 0.9rem;border-radius:10px;border:1px solid var(--line);background:transparent;color:var(--gray);font-weight:500;font-size:0.82rem;text-decoration:none;display:inline-flex;align-items:center;">✕ Reset</a>
        <?php endif; ?>
      </form>
    </div>

    <div class="table-wrap">
      <table>
        <thead><tr><th>Member</th><th>Email</th><th>Jumlah</th><th>Metode</th><th>Status</th><th>Tanggal</th></tr></thead>
        <tbody>
          <?php if (empty($transactions)): ?>
          <tr><td colspan="6" style="text-align:center;color:var(--gray-soft);padding:2rem;">Belum ada transaksi.</td></tr>
          <?php else: ?>
          <?php foreach ($transactions as $tx): ?>
          <tr>
            <td><strong><?= $tx['nama'] ?></strong></td>
            <td><?= $tx['email'] ?></td>
            <td><strong>Rp<?= number_format($tx['amount'], 0, ',', '.') ?></strong></td>
            <td><?= $tx['payment_method'] ?></td>
            <td><span class="badge <?= $tx['status'] ?>"><?= ucfirst($tx['status']) ?></span></td>
            <td><?= date('d M Y H:i', strtotime($tx['created_at'])) ?></td>
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
