<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SQLite — LearnBase</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url("assets/css/style-modul.css") ?>">
<style>
  .content-panel .lang-eyebrow { color: #6B4FD8; }
  .content-panel .lang-badge { background: #6B4FD8; color: #fff; }
  .content-panel .file-dot { background: #6B4FD8; }
  .content-panel .nav-btn.primary { background: #6B4FD8; border-color: #6B4FD8; color: #fff; }
  .progress-fill { background: linear-gradient(90deg, #6B4FD8, #8868E0, #A98CF0); }
  .lang-tab .lang-dot { background: #6B4FD8; box-shadow: 0 0 8px 2px #6B4FD8; }
  .nav-btn, .nav-btn:hover, .nav-btn:visited, .nav-btn:active, .nav-btn:focus { text-decoration: none; }

  .library-back-btn {
    position: fixed;
    top: 12px;
    right: 16px;
    z-index: 200;
    display: inline-flex;
    align-items: center;
    height: 36px;
    padding: 0 14px;
    border-radius: 8px;
    background: var(--bg-editor-soft);
    border: 1px solid var(--line);
    color: var(--text-bright);
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    transition: background .15s;
  }
  .library-back-btn:hover { background: rgba(255,255,255,0.1); }
  .completion-overlay {
    position: fixed; inset: 0; z-index: 500;
    background: rgba(10,10,10,0.72);
    display: flex; align-items: center; justify-content: center;
    padding: 20px;
    animation: completionFadeIn .18s ease;
  }
  .completion-modal {
    background: var(--bg-editor-soft);
    border: 1px solid var(--line);
    border-radius: 14px;
    padding: 34px 30px;
    max-width: 380px;
    width: 100%;
    text-align: center;
    color: var(--text-bright);
  }
  .completion-emoji { font-size: 44px; line-height: 1; margin-bottom: 10px; }
  .completion-modal h2 { margin: 0 0 8px; font-family: 'Space Grotesk', sans-serif; font-size: 22px; }
  .completion-modal p { margin: 0 0 22px; color: var(--text-dim); font-size: 14px; line-height: 1.5; }
  .completion-actions { display: flex; gap: 10px; justify-content: center; flex-wrap: wrap; }
  @keyframes completionFadeIn { from { opacity: 0; } to { opacity: 1; } }
</style>
</head>
<body>
<script>if(localStorage.getItem("learnbase_dark_mode")==="true")document.body.classList.add("dark-mode");</script>

<button class="sidebar-toggle" id="sidebarToggle" title="Toggle sidebar">☰</button>
<a class="library-back-btn" href="<?= site_url('library') ?>" title="Kembali ke halaman Library">← Library</a>
<aside class="sidebar" id="sidebar">
  <div class="sidebar-head">
    <div class="brand">
      <div class="brand-mark">LB</div>
      <div>
        <div class="brand-name">LearnBase</div>
        <div class="brand-sub">SQLite3</div>
      </div>
    </div>
  </div>

  <div class="sidebar-body">
  <nav class="lang-nav" id="langNav">
    <div class="lang-tab active" data-lang="sql">
      <span class="lang-dot" style="background:#6B4FD8"></span>
      <span class="lang-tab-text">
        <div class="lang-tab-name">SQLite3</div>
        <div class="lang-tab-meta">12 topik</div>
      </span>
      <span class="lang-tab-pct" data-pct="sql">0%</span>
    </div>
    <div class="topic-list" data-list="sql">
      <div class="topic-item active" data-topic="sql-1"><span class="topic-check"></span>Apa itu SQLite?</div>
      <div class="topic-item" data-topic="sql-2"><span class="topic-check"></span>CREATE TABLE</div>
      <div class="topic-item" data-topic="sql-3"><span class="topic-check"></span>INSERT &amp; SELECT</div>
      <div class="topic-item" data-topic="sql-4"><span class="topic-check"></span>WHERE &amp; Filter</div>
      <div class="topic-item" data-topic="sql-5"><span class="topic-check"></span>UPDATE &amp; DELETE</div>
      <div class="topic-item" data-topic="sql-6"><span class="topic-check"></span>ORDER &amp; LIMIT</div>
      <div class="topic-item" data-topic="sql-7"><span class="topic-check"></span>JOIN</div>
      <div class="topic-item" data-topic="sql-8"><span class="topic-check"></span>GROUP &amp; Aggregat</div>
      <div class="topic-item" data-topic="sql-9"><span class="topic-check"></span>Subquery</div>
      <div class="topic-item" data-topic="sql-10"><span class="topic-check"></span>Index</div>
      <div class="topic-item" data-topic="sql-11"><span class="topic-check"></span>View</div>
      <div class="topic-item" data-topic="sql-12"><span class="topic-check"></span>Transaction</div>
    </div>
  </div>

  <div class="sidebar-foot">
    <div class="sidebar-footer-label">Progres modul kamu</div>
    <div class="progress-track"><div class="progress-fill" id="progressFill" style="width:0%"></div></div>
    <div class="sidebar-footer-num" id="progressNum">0 / 12 topik selesai</div>
  </div>
</aside>

<main class="main">

  <!-- ================= SQLite3 ================= -->
  <section class="content-panel active" data-lang="sql">
    <div class="lang-header">
      <div>
        <div class="lang-eyebrow">MODUL 12 · BAHASA DATABASE RELASIONAL</div>
        <h1 class="lang-title">SQLite3</h1>
        <p class="lang-desc">SQLite adalah <strong>database relasional</strong> yang ringan dan self-contained — tidak perlu server terpisah. Menyimpan seluruh database dalam satu file. Cocok untuk aplikasi desktop, mobile, dan prototyping.</p>
      </div>
      <div class="lang-badge">SQL</div>
    </div>

    <article class="topic-section active" data-topic="sql-1">
      <div class="topic-eyebrow">TOPIK 1 / 12</div>
      <h2 class="topic-title">Apa itu SQLite?</h2>
      <div class="topic-body">
        <p>Setiap hari kamu pakai SQLite tanpa sadar — Chrome, WhatsApp, dan Telegram nyimpen data lokal pake database ini. Gak perlu server kayak MySQL, satu file <code>.db</code> aja cukup. Dengan SQLite kamu bisa bikin aplikasi todolist offline, catatan pribadi, atau aplikasi Android dalam hitungan menit, tanpa ribet setup database server.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>belajar.sql</div>
          <button class="run-btn" data-run="sql1">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3</div>
          <div class="code-content"><span class="tok-cm">-- Membuka database</span>
<span class="tok-var">.open</span> <span class="tok-var">learnbase.db</span>

<span class="tok-fn">SELECT</span> <span class="tok-str">'Halo, SQLite3!'</span> <span class="tok-kw">AS</span> <span class="tok-var">pesan</span>;</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-sql1"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> SQLite adalah database <em>serverless</em> — file <code>.db</code> berisi seluruh data, tabel, indeks, dan skema. Tinggal copy file untuk backup!</div>
      <div class="topic-nav">
        <button class="nav-btn" disabled>← Sebelumnya</button>
        <button class="nav-btn primary" data-next="sql-2">Lanjut: CREATE TABLE →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="sql-2">
      <div class="topic-eyebrow">TOPIK 2 / 12</div>
      <h2 class="topic-title">CREATE TABLE</h2>
      <div class="topic-body">
        <p><strong>CREATE TABLE</strong> membuat tabel baru. Setiap kolom punya nama dan tipe data. SQLite tipenya fleksibel — <code>INTEGER</code>, <code>TEXT</code>, <code>REAL</code>, <code>BLOB</code>. Bisa menambahkan <strong>constraint</strong>: <code>PRIMARY KEY</code>, <code>NOT NULL</code>, <code>UNIQUE</code>, <code>DEFAULT</code>.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>create.sql</div>
          <button class="run-btn" data-run="sql2">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-fn">CREATE TABLE</span> <span class="tok-var">siswa</span> (
    <span class="tok-var">id</span> <span class="tok-var">INTEGER</span> <span class="tok-kw">PRIMARY KEY AUTOINCREMENT</span>,
    <span class="tok-var">nama</span> <span class="tok-var">TEXT</span> <span class="tok-kw">NOT NULL</span>,
    <span class="tok-var">email</span> <span class="tok-var">TEXT</span> <span class="tok-kw">UNIQUE</span>,
    <span class="tok-var">skor</span> <span class="tok-var">INTEGER</span> <span class="tok-kw">DEFAULT</span> <span class="tok-num">0</span>
);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-sql2"></div>
        </div>
      </div>

      <div class="callout note"><strong>Catatan:</strong> <code>AUTOINCREMENT</code> membuat nilai id otomatis bertambah. <code>PRIMARY KEY</code> memastikan setiap baris punya id unik.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="sql-1">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="sql-3">Lanjut: INSERT &amp; SELECT →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="sql-3">
      <div class="topic-eyebrow">TOPIK 3 / 12</div>
      <h2 class="topic-title">INSERT &amp; SELECT</h2>
      <div class="topic-body">
        <p><strong>INSERT</strong> menambah baris baru ke tabel. <strong>SELECT</strong> mengambil data dari tabel — bisa semua kolom (<code>*</code>) atau kolom tertentu. Ini adalah dua operasi paling dasar dalam SQL.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>insert.sql</div>
          <button class="run-btn" data-run="sql3">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-fn">INSERT INTO</span> <span class="tok-var">siswa</span> (<span class="tok-var">nama</span>, <span class="tok-var">email</span>, <span class="tok-var">skor</span>)
<span class="tok-kw">VALUES</span> (<span class="tok-str">'Budi'</span>, <span class="tok-str">'budi@email.com'</span>, <span class="tok-num">87</span>);

<span class="tok-fn">SELECT</span> <span class="tok-var">nama</span>, <span class="tok-var">skor</span> <span class="tok-kw">FROM</span> <span class="tok-var">siswa</span>;
<span class="tok-fn">SELECT</span> * <span class="tok-kw">FROM</span> <span class="tok-var">siswa</span>;</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-sql3"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> <code>SELECT *</code> praktis untuk eksplorasi, tapi di kode produksi sebaiknya sebut kolom spesifik — lebih jelas dan efisien.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="sql-2">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="sql-4">Lanjut: WHERE &amp; Filter →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="sql-4">
      <div class="topic-eyebrow">TOPIK 4 / 12</div>
      <h2 class="topic-title">WHERE &amp; Filter</h2>
      <div class="topic-body">
        <p><strong>WHERE</strong> memfilter baris berdasarkan kondisi. Bisa dikombinasikan dengan <code>AND</code>, <code>OR</code>, <code>IN</code>, <code>LIKE</code>, <code>BETWEEN</code>. Filter adalah inti dari query SQL untuk mengambil data yang spesifik.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>filter.sql</div>
          <button class="run-btn" data-run="sql4">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5</div>
          <div class="code-content"><span class="tok-fn">SELECT</span> <span class="tok-var">nama</span>, <span class="tok-var">skor</span> <span class="tok-kw">FROM</span> <span class="tok-var">siswa</span>
<span class="tok-kw">WHERE</span> <span class="tok-var">skor</span> >= <span class="tok-num">80</span>
<span class="tok-kw">AND</span> <span class="tok-var">email</span> <span class="tok-kw">LIKE</span> <span class="tok-str">'%@email.com'</span>;

<span class="tok-fn">SELECT</span> * <span class="tok-kw">FROM</span> <span class="tok-var">siswa</span>
<span class="tok-kw">WHERE</span> <span class="tok-var">skor</span> <span class="tok-kw">BETWEEN</span> <span class="tok-num">70</span> <span class="tok-kw">AND</span> <span class="tok-num">90</span>;</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-sql4"></div>
        </div>
      </div>

      <div class="callout note"><strong>Catatan:</strong> <code>LIKE</code> untuk pencocokan pola. <code>%</code> = karakter apapun (0 atau lebih). <code>_</code> = satu karakter.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="sql-3">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="sql-5">Lanjut: UPDATE &amp; DELETE →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="sql-5">
      <div class="topic-eyebrow">TOPIK 5 / 12</div>
      <h2 class="topic-title">UPDATE &amp; DELETE</h2>
      <div class="topic-body">
        <p><strong>UPDATE</strong> mengubah data yang sudah ada. <strong>DELETE</strong> menghapus baris. <strong>Peringatan penting:</strong> jangan lupa <code>WHERE</code> — tanpa WHERE, semua baris akan ter-update atau terhapus!</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>update.sql</div>
          <button class="run-btn" data-run="sql5">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-cm">-- Update data</span>
<span class="tok-fn">UPDATE</span> <span class="tok-var">siswa</span>
<span class="tok-kw">SET</span> <span class="tok-var">skor</span> = <span class="tok-num">95</span>
<span class="tok-kw">WHERE</span> <span class="tok-var">id</span> = <span class="tok-num">1</span>;

<span class="tok-cm">-- Hapus data</span>
<span class="tok-fn">DELETE FROM</span> <span class="tok-var">siswa</span>
<span class="tok-kw">WHERE</span> <span class="tok-var">id</span> = <span class="tok-num">2</span>;</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-sql5"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Biasakan <strong>SELECT dulu, baru UPDATE/DELETE</strong>. Cek dengan SELECT WHERE untuk memastikan baris yang tepat sebelum mengubah atau menghapus.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="sql-4">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="sql-6">Lanjut: ORDER &amp; LIMIT →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="sql-6">
      <div class="topic-eyebrow">TOPIK 6 / 12</div>
      <h2 class="topic-title">ORDER &amp; LIMIT</h2>
      <div class="topic-body">
        <p><strong>ORDER BY</strong> mengurutkan hasil — <code>ASC</code> (naik) atau <code>DESC</code> (turun). <strong>LIMIT</strong> membatasi jumlah baris yang dikembalikan. <code>OFFSET</code> untuk melompati baris — berguna untuk paginasi.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>order.sql</div>
          <button class="run-btn" data-run="sql6">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4</div>
          <div class="code-content"><span class="tok-fn">SELECT</span> <span class="tok-var">nama</span>, <span class="tok-var">skor</span> <span class="tok-kw">FROM</span> <span class="tok-var">siswa</span>
<span class="tok-kw">ORDER BY</span> <span class="tok-var">skor</span> <span class="tok-kw">DESC</span>
<span class="tok-kw">LIMIT</span> <span class="tok-num">3</span> <span class="tok-kw">OFFSET</span> <span class="tok-num">0</span>;</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-sql6"></div>
        </div>
      </div>

      <div class="callout note"><strong>Catatan:</strong> <code>LIMIT 10 OFFSET 20</code> = ambil 10 baris, lewati 20 baris pertama. Pola ini standar untuk <em>pagination</em>: halaman 3 dengan 10 item/halaman.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="sql-5">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="sql-7">Lanjut: JOIN →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="sql-7">
      <div class="topic-eyebrow">TOPIK 7 / 12</div>
      <h2 class="topic-title">JOIN</h2>
      <div class="topic-body">
        <p><strong>JOIN</strong> menggabungkan data dari dua tabel berdasarkan kolom yang berhubungan. <code>INNER JOIN</code> hanya mengambil data yang cocok di kedua tabel. <code>LEFT JOIN</code> mengambil semua data dari tabel kiri, meskipun tidak ada pasangan di tabel kanan.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>join.sql</div>
          <button class="run-btn" data-run="sql7">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-fn">SELECT</span> <span class="tok-var">s</span>.<span class="tok-var">nama</span>, <span class="tok-var">m</span>.<span class="tok-var">judul</span>, <span class="tok-var">m</span>.<span class="tok-var">nilai</span>
<span class="tok-kw">FROM</span> <span class="tok-var">siswa</span> <span class="tok-var">s</span>
<span class="tok-kw">INNER JOIN</span> <span class="tok-var">nilai_modul</span> <span class="tok-var">m</span>
<span class="tok-kw">ON</span> <span class="tok-var">s</span>.<span class="tok-var">id</span> = <span class="tok-var">m</span>.<span class="tok-var">siswa_id</span>;</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-sql7"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Beri <em>alias</em> tabel (<code>siswa s</code>) untuk query yang lebih pendek dan mudah dibaca — terutama saat JOIN banyak tabel.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="sql-6">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="sql-8">Lanjut: GROUP &amp; Aggregat →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="sql-8">
      <div class="topic-eyebrow">TOPIK 8 / 12</div>
      <h2 class="topic-title">GROUP &amp; Aggregat</h2>
      <div class="topic-body">
        <p><strong>Aggregate functions</strong>: <code>COUNT()</code>, <code>SUM()</code>, <code>AVG()</code>, <code>MIN()</code>, <code>MAX()</code>. <strong>GROUP BY</strong> mengelompokkan baris untuk perhitungan agregat. <strong>HAVING</strong> memfilter hasil agregat (mirip WHERE untuk GROUP BY).</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>group.sql</div>
          <button class="run-btn" data-run="sql8">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-fn">SELECT</span> <span class="tok-var">m</span>.<span class="tok-var">judul</span>,
    <span class="tok-fn">COUNT</span>(*) <span class="tok-kw">AS</span> <span class="tok-var">peserta</span>,
    <span class="tok-fn">AVG</span>(<span class="tok-var">m</span>.<span class="tok-var">nilai</span>) <span class="tok-kw">AS</span> <span class="tok-var">rata2</span>
<span class="tok-kw">FROM</span> <span class="tok-var">nilai_modul</span> <span class="tok-var">m</span>
<span class="tok-kw">GROUP BY</span> <span class="tok-var">m</span>.<span class="tok-var">judul</span>
<span class="tok-kw">HAVING</span> <span class="tok-fn">COUNT</span>(*) > <span class="tok-num">1</span>;</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-sql8"></div>
        </div>
      </div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz: Fungsi agregat untuk menghitung rata-rata?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">SUM()</button>
          <button class="quiz-opt" data-correct="true">AVG()</button>
          <button class="quiz-opt" data-correct="false">COUNT()</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="sql-7">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="sql-9">Lanjut: Subquery →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="sql-9">
      <div class="topic-eyebrow">TOPIK 9 / 12</div>
      <h2 class="topic-title">Subquery</h2>
      <div class="topic-body">
        <p><strong>Subquery</strong> (atau inner query / nested query) adalah query SELECT di dalam query lain. Subquery bisa ditempatkan di dalam <code>WHERE</code>, <code>FROM</code>, atau <code>SELECT</code>. Hasil dari subquery dipakai oleh query utama (outer query).</p>
        <p>Subquery di <code>WHERE</code> paling umum: cocok untuk filtering berdasarkan hasil agregat atau data dari tabel lain tanpa JOIN. Subquery harus ditulis di dalam tanda kurung <code>()</code> dan biasanya berjalan lebih dulu sebelum outer query dieksekusi.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>subquery.sql</div>
          <button class="run-btn" data-run="sql9">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-fn">SELECT</span> <span class="tok-var">nama</span>, <span class="tok-var">nilai</span>
<span class="tok-kw">FROM</span> <span class="tok-var">nilai_modul</span>
<span class="tok-kw">WHERE</span> <span class="tok-var">nilai</span> > (
  <span class="tok-fn">SELECT</span> <span class="tok-fn">AVG</span>(<span class="tok-var">nilai</span>)
  <span class="tok-kw">FROM</span> <span class="tok-var">nilai_modul</span>
);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-sql9"></div>
        </div>
      </div>

      <div class="callout note"><strong>Catatan:</strong> Subquery juga bisa digunakan dengan operator <code>IN</code>, <code>NOT IN</code>, <code>EXISTS</code>, dan <code>NOT EXISTS</code>. Contoh: <code>WHERE id IN (SELECT siswa_id FROM nilai_modul WHERE nilai > 90)</code>. Hati-hati dengan performa — subquery yang tidak perlu bisa diperbaiki dengan JOIN atau CTE.</div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz: Keyword apa yang bisa dipasangkan dengan subquery untuk mengecek keberadaan baris?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">IN</button>
          <button class="quiz-opt" data-correct="false">ANY</button>
          <button class="quiz-opt" data-correct="true">EXISTS</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="sql-8">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="sql-10">Lanjut: Index →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="sql-10">
      <div class="topic-eyebrow">TOPIK 10 / 12</div>
      <h2 class="topic-title">Index</h2>
      <div class="topic-body">
        <p><strong>Index</strong> adalah struktur data khusus yang mempercepat pencarian data di tabel tanpa harus memindai seluruh baris (full table scan). Tanpa index, SQLite akan membaca setiap baris satu per satu — lambat untuk tabel besar. Dengan index di kolom yang sering di-<code>WHERE</code>, pencarian bisa berkali-kali lebih cepat.</p>
        <p>Index bekerja seperti indeks buku: langsung menuju halaman yang dicari tanpa membaca seluruh buku. Trade-off: index mempercepat SELECT tetapi sedikit memperlambat INSERT/UPDATE/DELETE karena indeks harus ikut diperbarui.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>index.sql</div>
          <button class="run-btn" data-run="sql10">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</div>
          <div class="code-content"><span class="tok-cm">-- Buat index pada kolom email</span>
<span class="tok-fn">CREATE INDEX</span> <span class="tok-var">idx_email</span>
<span class="tok-kw">ON</span> <span class="tok-var">siswa</span>(<span class="tok-var">email</span>);

<span class="tok-cm">-- Index gabungan (composite) untuk query lebih spesifik</span>
<span class="tok-fn">CREATE INDEX</span> <span class="tok-var">idx_nama_skor</span>
<span class="tok-kw">ON</span> <span class="tok-var">siswa</span>(<span class="tok-var">nama</span>, <span class="tok-var">skor</span>);

<span class="tok-cm">-- Cek semua index di database</span>
<span class="tok-fn">SELECT</span> * <span class="tok-kw">FROM</span> <span class="tok-var">sqlite_master</span> <span class="tok-kw">WHERE</span> <span class="tok-var">type</span> = <span class="tok-str">'index'</span>;</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-sql10"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Buat index pada kolom yang sering dipakai di <code>WHERE</code>, <code>JOIN</code>, atau <code>ORDER BY</code>. Jangan buat index berlebihan — setiap index menambah waktu pada operasi tulis. Gunakan <code>EXPLAIN QUERY PLAN</code> untuk melihat apakah SQLite sudah memakai index.</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz: Kapan index paling berguna?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">Saat INSERT data</button>
          <button class="quiz-opt" data-correct="true">Saat SELECT dengan WHERE</button>
          <button class="quiz-opt" data-correct="false">Saat CREATE TABLE</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="sql-9">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="sql-11">Lanjut: View →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="sql-11">
      <div class="topic-eyebrow">TOPIK 11 / 12</div>
      <h2 class="topic-title">View</h2>
      <div class="topic-body">
        <p><strong>View</strong> adalah <em>virtual table</em> — query SELECT yang disimpan dengan nama. View tidak menyimpan data secara fisik, melainkan menyimpan definisi query. Setiap kali view dipanggil, SQLite menjalankan query tersebut dan mengembalikan hasilnya seolah-olah itu tabel biasa.</p>
        <p>Kegunaan View: menyederhanakan query kompleks, menyembunyikan kolom sensitif, dan memberikan abstraksi di atas skema tabel. View dibuat dengan <code>CREATE VIEW nama_view AS SELECT ...</code>. Di SQLite, view bersifat <strong>read-only</strong> secara default — insert/update/delete hanya bisa dilakukan melalui <code>INSTEAD OF</code> trigger pada view.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>view.sql</div>
          <button class="run-btn" data-run="sql11">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10</div>
          <div class="code-content"><span class="tok-cm">-- Membuat view untuk daftar nilai siswa</span>
<span class="tok-fn">CREATE VIEW</span> <span class="tok-var">daftar_nilai</span> <span class="tok-kw">AS</span>
<span class="tok-fn">SELECT</span> <span class="tok-var">s</span>.<span class="tok-var">nama</span>, <span class="tok-var">m</span>.<span class="tok-var">judul</span>, <span class="tok-var">m</span>.<span class="tok-var">nilai</span>
<span class="tok-kw">FROM</span> <span class="tok-var">siswa</span> <span class="tok-var">s</span>
<span class="tok-kw">JOIN</span> <span class="tok-var">nilai_modul</span> <span class="tok-var">m</span> <span class="tok-kw">ON</span> <span class="tok-var">s</span>.<span class="tok-var">id</span> = <span class="tok-var">m</span>.<span class="tok-var">siswa_id</span>;

<span class="tok-cm">-- Pakai view seperti tabel biasa</span>
<span class="tok-fn">SELECT</span> * <span class="tok-kw">FROM</span> <span class="tok-var">daftar_nilai</span>
<span class="tok-kw">WHERE</span> <span class="tok-var">nilai</span> >= <span class="tok-num">85</span>;</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-sql11"></div>
        </div>
      </div>

      <div class="callout note"><strong>Catatan:</strong> View memudahkan <strong>reusability</strong> — tulis query kompleks sekali, pakai berkali-kali. Gunakan <code>DROP VIEW nama_view</code> untuk menghapus view. Beberapa database mendukung <em>materialized view</em> yang menyimpan hasil secara fisik, tapi SQLite tidak — view di SQLite selalu virtual.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="sql-10">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="sql-12">Lanjut: Transaction →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="sql-12">
      <div class="topic-eyebrow">TOPIK 12 / 12</div>
      <h2 class="topic-title">Transaction</h2>
      <div class="topic-body">
        <p><strong>Transaction</strong> adalah kumpulan satu atau lebih operasi SQL yang dieksekusi sebagai satu unit kerja atomic — <em>semua berhasil atau semua batal</em>. Ini adalah fondasi integritas data dalam database relasional. SQLite mendukung transaksi dengan prinsip <strong>ACID</strong>: <strong>A</strong>tomicity (semua atau tidak sama sekali), <strong>C</strong>onsistency (data tetap valid setelah transaksi), <strong>I</strong>solation (transaksi tidak saling mengganggu), dan <strong>D</strong>urability (perubahan tersimpan permanen setelah <code>COMMIT</code>).</p>
        <p>Transaksi dimulai dengan <code>BEGIN TRANSACTION</code> (atau <code>BEGIN</code> saja). Semua perubahan setelahnya hanya terlihat oleh sesi ini sampai <code>COMMIT</code> dijalankan. Jika terjadi kesalahan, <code>ROLLBACK</code> mengembalikan data ke keadaan sebelum transaksi dimulai. SQLite juga mendukung <strong>SAVEPOINT</strong> untuk titik simpan parsial — kamu bisa rollback sebagian transaksi tanpa membatalkan semuanya.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>transaction.sql</div>
          <button class="run-btn" data-run="sql12">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15<br>16<br>17</div>
          <div class="code-content"><span class="tok-cm">-- Transaksi 1: COMMIT berhasil</span>
<span class="tok-fn">BEGIN</span> <span class="tok-kw">TRANSACTION</span>;
<span class="tok-fn">INSERT INTO</span> <span class="tok-var">siswa</span>(<span class="tok-var">nama</span>, <span class="tok-var">skor</span>)
<span class="tok-kw">VALUES</span>(<span class="tok-str">'Dewi'</span>, <span class="tok-num">85</span>);
<span class="tok-fn">UPDATE</span> <span class="tok-var">siswa</span> <span class="tok-kw">SET</span> <span class="tok-var">skor</span> = <span class="tok-num">90</span>
<span class="tok-kw">WHERE</span> <span class="tok-var">nama</span> = <span class="tok-str">'Dewi'</span>;
<span class="tok-fn">COMMIT</span>;

<span class="tok-cm">-- Transaksi 2: ROLLBACK batal</span>
<span class="tok-fn">BEGIN</span>;
<span class="tok-fn">DELETE FROM</span> <span class="tok-var">siswa</span> <span class="tok-kw">WHERE</span> <span class="tok-var">skor</span> < <span class="tok-num">50</span>;
<span class="tok-fn">ROLLBACK</span>;

<span class="tok-cm">-- SAVEPOINT: rollback parsial</span>
<span class="tok-fn">SAVEPOINT</span> <span class="tok-var">sp1</span>;
<span class="tok-fn">UPDATE</span> <span class="tok-var">siswa</span> <span class="tok-kw">SET</span> <span class="tok-var">skor</span> = <span class="tok-num">100</span>;
<span class="tok-fn">ROLLBACK TO</span> <span class="tok-var">sp1</span>;</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-sql12"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> SQLite menjalankan setiap perintah dalam mode auto-commit secara default. Untuk mengelompokkan beberapa perintah, gunakan <code>BEGIN</code> eksplisit. <code>SAVEPOINT</code> memungkinkan rollback sebagian — panggil <code>RELEASE SAVEPOINT nama</code> untuk mengonfirmasi atau <code>ROLLBACK TO SAVEPOINT nama</code> untuk membatalkan perubahan setelah titik tertentu.</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz: Perintah untuk membatalkan semua perubahan dalam transaksi?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">COMMIT</button>
          <button class="quiz-opt" data-correct="false">UNDO</button>
          <button class="quiz-opt" data-correct="true">ROLLBACK</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="sql-11">← Sebelumnya</button>
        <button class="nav-btn primary" type="button" id="finishBtn">Semua modul selesai — Kembali ke Library </button>
      </div>
    </article>
  </section>

</main>

<script>
(function() {
  const totalTopics = 12;
  const LANGUAGE = 'sql'; // harus sama dengan key di $languages pada get_progress.php
  const completed = new Set();
  let celebrated = false;

  const langTabs = document.querySelectorAll('.lang-tab');
  const contentPanels = document.querySelectorAll('.content-panel');

  function setActiveTopic(topicId) {
    const lang = topicId.split('-')[0];

    langTabs.forEach(t => t.classList.toggle('active', t.dataset.lang === lang));
    contentPanels.forEach(p => p.classList.toggle('active', p.dataset.lang === lang));

    document.querySelectorAll('.topic-section').forEach(s => {
      s.classList.toggle('active', s.dataset.topic === topicId);
    });
    document.querySelectorAll('.topic-item').forEach(t => {
      t.classList.toggle('active', t.dataset.topic === topicId);
    });

    markDone(topicId);
  }

  function markDone(topicId, persist = true) {
    if (completed.has(topicId)) return;
    completed.add(topicId);
    const item = document.querySelector(`.topic-item[data-topic="${topicId}"]`);
    if (item) item.classList.add('done');
    updateProgress();
    if (persist) saveProgress(topicId);
  }

  async function saveProgress(topicId) {
    try {
      const res = await fetch('../save_progress.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ language: LANGUAGE, topic_id: topicId })
      });
      if (res.status === 401) {
        window.location.href = '../auth.html';
        return;
      }
      if (!res.ok) {
        console.error('save_progress.php gagal, status:', res.status);
      }
    } catch (err) {
      console.error('Gagal menyimpan progres ke server:', err);
    }
  }

  async function loadProgress() {
    try {
      const res = await fetch(`../get_progress.php?language=${LANGUAGE}`);
      if (res.status === 401) {
        window.location.href = '../auth.html';
        return;
      }
      if (!res.ok) {
        console.error('get_progress.php gagal, status:', res.status);
        return;
      }
      const data = await res.json();
      (data.completed_topics || []).forEach(topicId => markDone(topicId, false));
    } catch (err) {
      console.error('Gagal memuat progres dari server:', err);
    }
  }

  function updateProgress() {
    const pct = Math.round((completed.size / totalTopics) * 100);
    document.getElementById('progressFill').style.width = pct + '%';
    document.getElementById('progressNum').textContent = `${completed.size} / ${totalTopics} topik selesai`;

    const items = document.querySelectorAll('.topic-item');
    const done = [...items].filter(i => i.classList.contains('done')).length;
    const langPct = Math.round((done / items.length) * 100);
    const pctEl = document.querySelector('.lang-tab-pct');
    if (pctEl) pctEl.textContent = langPct + '%';

    if (!celebrated && completed.size >= totalTopics) {
      celebrated = true;
      showCompletionAlert();
    }
  }

  function showCompletionAlert() {
    const overlay = document.createElement('div');
    overlay.className = 'completion-overlay';
    overlay.innerHTML = `
      <div class="completion-modal">
        <div class="completion-emoji"><svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color:var(--deep-green);"><circle cx="12" cy="12" r="9"/><polyline points="8 12 10 14 16 8"/></svg></div>
        <h2>Selamat!</h2>
        <p>Kamu sudah menyelesaikan semua topik di modul ini. Progres kamu sudah tersimpan.</p>
        <div class="completion-actions">
          <button class="nav-btn" id="completionStayBtn" type="button">Tinjau lagi materinya</button>
          <button class="nav-btn primary" id="completionLibraryBtn" type="button">Kembali ke Library</button>
        </div>
      </div>`;
    document.body.appendChild(overlay);
    document.getElementById('completionStayBtn').addEventListener('click', () => overlay.remove());
    document.getElementById('completionLibraryBtn').addEventListener('click', () => {
      window.location.href = '../library.html';
    });
    overlay.addEventListener('click', (e) => {
      if (e.target === overlay) overlay.remove();
    });
  }

  document.querySelectorAll('.topic-item').forEach(item => {
    item.addEventListener('click', () => setActiveTopic(item.dataset.topic));
  });

  document.querySelectorAll('[data-next]').forEach(btn => {
    btn.addEventListener('click', () => setActiveTopic(btn.dataset.next));
  });
  document.querySelectorAll('[data-prev]').forEach(btn => {
    btn.addEventListener('click', () => setActiveTopic(btn.dataset.prev));
  });

  const finishBtn = document.getElementById('finishBtn');
  if (finishBtn) {
    finishBtn.addEventListener('click', () => {
      showCompletionAlert();
    });
  }


  // ===== Quiz interactivity =====
  document.querySelectorAll('.quiz-box').forEach(box => {
    const opts = box.querySelectorAll('.quiz-opt');
    const feedback = box.querySelector('.quiz-feedback');
    opts.forEach(opt => {
      opt.addEventListener('click', () => {
        opts.forEach(o => o.disabled = true);
        const correct = opt.dataset.correct === 'true';
        opt.classList.add(correct ? 'correct' : 'wrong');
        if (!correct) {
          const correctOpt = [...opts].find(o => o.dataset.correct === 'true');
          if (correctOpt) correctOpt.classList.add('correct');
          feedback.textContent = 'Belum tepat — jawaban yang benar sudah ditandai hijau di atas.';
          feedback.className = 'quiz-feedback wrong-text';
        } else {
          feedback.textContent = 'Tepat sekali! ';
          feedback.className = 'quiz-feedback correct-text';
        }
      });
    });
  });

  // Muat progres yang sudah tersimpan di server, baru tandai topik pertama sebagai "dikunjungi"
  loadProgress().then(() => markDone('sql-1'));

  // ===== Sidebar toggle =====
  const sidebar = document.getElementById('sidebar');
  const toggleBtn = document.getElementById('sidebarToggle');
  const mainEl = document.querySelector('.main');

  // Sinkronkan ikon/posisi tombol dengan kondisi sidebar saat halaman dimuat
  toggleBtn.classList.toggle('pushed', !sidebar.classList.contains('hidden'));
  toggleBtn.textContent = sidebar.classList.contains('hidden') ? '☰' : '✕';

  toggleBtn.addEventListener('click', () => {
    const hidden = sidebar.classList.toggle('hidden');
    mainEl.classList.toggle('expanded', hidden);
    toggleBtn.classList.toggle('pushed', !hidden);
    toggleBtn.textContent = hidden ? '☰' : '✕';
  });
})();
</script>

</body>
</html>