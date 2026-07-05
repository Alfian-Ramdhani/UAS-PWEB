<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Mentor — LEARNBASE.</title>
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
body.dark-mode .sidebar, body.dark-mode .topbar, body.dark-mode .page-card { background: var(--card-bg); }
body.dark-mode .sidebar, body.dark-mode .topbar, body.dark-mode .page-card { border-color: var(--line); }
* { box-sizing: border-box; }
body {
  font-family: 'Inter', sans-serif; background: var(--bg); color: var(--charcoal);
  margin: 0; padding: 0; display: flex; min-height: 100vh;
}
h1,h2,h3,h4,h5,h6 { font-family: 'Poppins', sans-serif; }
a { text-decoration: none; }

/* SIDEBAR */
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
.side-link svg { flex-shrink: 0; opacity: 0.8; }

.main-area { margin-left: var(--sidebar-w); flex: 1; }
.topbar {
  background: var(--card-bg); border-bottom: 1px solid var(--line);
  padding: 0.9rem 2rem; display: flex; align-items: center; justify-content: space-between;
}
.topbar-title { font-weight: 700; font-size: 1.15rem; color: var(--charcoal); }
.topbar-right { display: flex; align-items: center; gap: 0.75rem; }
.admin-avatar { width: 36px; height: 36px; border-radius: 50%; background: linear-gradient(135deg, var(--orange), var(--deep-green)); display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 0.85rem; }

.wrap { padding: 1.75rem 2rem; max-width: 700px; }

.page-card {
  background: var(--card-bg); border: 1px solid var(--line); border-radius: 18px; padding: 2rem;
}
.page-card h3 { font-weight: 700; font-size: 1.1rem; margin: 0 0 1.25rem; }

.form-group { margin-bottom: 1rem; }
.form-group label { display: block; font-weight: 600; font-size: 0.85rem; margin-bottom: 0.35rem; color: var(--charcoal); }
.form-group input, .form-group select {
  width: 100%; padding: 0.65rem 1rem; border: 2px solid var(--line); border-radius: 12px;
  font-size: 0.88rem; font-family: 'Inter', sans-serif; color: var(--charcoal);
  transition: border-color .2s, box-shadow .2s; background: var(--bg);
}
.form-group input:focus, .form-group select:focus { border-color: var(--deep-green); outline: none; box-shadow: 0 0 0 4px rgba(14,104,83,0.1); }
.form-help { font-size: 0.78rem; color: var(--gray-soft); margin-top: 0.25rem; }

.btn-row { display: flex; gap: 0.75rem; margin-top: 1.5rem; }
.btn-submit {
  background: linear-gradient(135deg, var(--orange), var(--deep-green) 60%, var(--deep-green));
  color: #fff; font-weight: 600; font-size: 0.9rem; padding: 0.65rem 1.75rem;
  border-radius: 50px; border: none; cursor: pointer; transition: transform .2s;
}
.btn-submit:hover { transform: translateY(-2px); }
.btn-cancel {
  background: transparent; border: 1px solid var(--line); color: var(--gray);
  font-weight: 600; font-size: 0.9rem; padding: 0.65rem 1.75rem;
  border-radius: 50px; cursor: pointer; text-decoration: none;
}

.alert { padding: 0.75rem 1rem; border-radius: 12px; font-size: 0.85rem; font-weight: 500; margin-bottom: 1rem; }
.alert.success { background: var(--deep-green-light); color: var(--deep-green); }
.alert.error { background: var(--orange-light); color: var(--orange); }

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
    <li><a href="<?= site_url('admin/mentors') ?>" class="side-link active"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> Kelola Mentor</a></li>
    <li><a href="<?= site_url('admin/members') ?>" class="side-link"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg> Data Member</a></li>
    <li><a href="<?= site_url('admin/transactions') ?>" class="side-link"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg> Transaksi</a></li>
  </ul>
</aside>

<div class="main-area">
  <header class="topbar">
    <div class="topbar-title"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;margin-right:6px;"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg> Edit Mentor</div>
    <div class="topbar-right">
      <div class="admin-avatar"><?= strtoupper(substr($nama, 0, 1)) ?></div>
      <span class="admin-name"><?= $nama ?></span>
    </div>
  </header>

  <div class="wrap">
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert success">✅ <?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
    <div class="alert error"> <?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <div class="page-card">
      <h3>��‍🏫 Edit Mentor: <?= $mentor['nama'] ?></h3>
      <form method="post" action="<?= site_url('admin/update_mentor/' . $mentor['id']) ?>">
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" name="nama" value="<?= $mentor['nama'] ?>" required>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" value="<?= $mentor['email'] ?>" required>
        </div>
        <div class="form-group">
          <label>Password Baru <span style="font-weight:400;color:var(--gray-soft);">(kosongkan jika tidak diubah)</span></label>
          <input type="password" name="password" placeholder="Minimal 8 karakter" minlength="8">
          <div class="form-help">Kosongkan jika tidak ingin mengubah password.</div>
        </div>
        <div class="btn-row">
          <button type="submit" class="btn-submit">Simpan Perubahan</button>
          <a href="<?= site_url('admin/mentors') ?>" class="btn-cancel">Batal</a>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
