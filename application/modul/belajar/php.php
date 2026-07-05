<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PHP — LearnBase</title>
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
        <div class="brand-sub">PHP</div>
      </div>
    </div>
  </div>

  <div class="sidebar-body">
  <nav class="lang-nav" id="langNav">
    <div class="lang-tab active" data-lang="php">
      <span class="lang-dot" style="background:#6B4FD8"></span>
      <span class="lang-tab-text">
        <div class="lang-tab-name">PHP</div>
        <div class="lang-tab-meta">12 topik</div>
      </span>
      <span class="lang-tab-pct" data-pct="php">0%</span>
    </div>
    <div class="topic-list" data-list="php">
      <div class="topic-item active" data-topic="php-1"><span class="topic-check"></span>Apa itu PHP?</div>
      <div class="topic-item" data-topic="php-2"><span class="topic-check"></span>Variabel & Echo</div>
      <div class="topic-item" data-topic="php-3"><span class="topic-check"></span>Kondisi & Perulangan</div>
      <div class="topic-item" data-topic="php-4"><span class="topic-check"></span>Form & Superglobal</div>
      <div class="topic-item" data-topic="php-5"><span class="topic-check"></span>Fungsi & Array</div>
      <div class="topic-item" data-topic="php-6"><span class="topic-check"></span>Session & Cookie</div>
      <div class="topic-item" data-topic="php-7"><span class="topic-check"></span>Database MySQL</div>
      <div class="topic-item" data-topic="php-8"><span class="topic-check"></span>File & Upload</div>
      <div class="topic-item" data-topic="php-9"><span class="topic-check"></span>Namespace & Autoload</div>
      <div class="topic-item" data-topic="php-10"><span class="topic-check"></span>Error & Exception</div>
      <div class="topic-item" data-topic="php-11"><span class="topic-check"></span>OOP di PHP</div>
      <div class="topic-item" data-topic="php-12"><span class="topic-check"></span>Keamanan Web</div>
    </div>
  </div>

  <div class="sidebar-foot">
    <div class="sidebar-footer-label">Progres modul kamu</div>
    <div class="progress-track"><div class="progress-fill" id="progressFill" style="width:0%"></div></div>
    <div class="sidebar-footer-num" id="progressNum">0 / 12 topik selesai</div>
  </div>
</aside>

<main class="main">

  <!-- ================= PHP ================= -->
  <section class="content-panel active" data-lang="php">
    <div class="lang-header">
      <div>
        <div class="lang-eyebrow">MODUL 02 · BAHASA SISI SERVER</div>
        <h1 class="lang-title">PHP</h1>
        <p class="lang-desc">Bahasa yang berjalan di server, dipakai untuk mengolah data sebelum dikirim ke browser — cocok untuk fitur login, transaksi modul, dan koneksi ke database di LearnBase.</p>
      </div>
      <div class="lang-badge">PHP</div>
    </div>

    <!-- PHP Topic 1 -->
    <article class="topic-section active" data-topic="php-1">
      <div class="topic-eyebrow">TOPIK 1 / 12</div>
      <h2 class="topic-title">Apa itu PHP?</h2>
      <div class="topic-body">
        <p>Setiap kali kamu login ke Instagram, checkout di e-commerce, atau membaca artikel di WordPress — di balik layar ada PHP yang memproses semuanya. PHP adalah bahasa server yang mengatur data pengguna, mengambil informasi dari database, dan menyusun halaman yang kamu lihat. Dengan PHP, kamu bisa membangun sistem login, dashboard admin, atau bahkan aplikasi belajar seperti LearnBase ini sendiri.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>halo.php</div>
          <button class="run-btn" data-run="php1">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4</div>
          <div class="code-content"><span class="tok-php">&lt;?php</span>
  <span class="tok-fn">echo</span> <span class="tok-str">"Halo dari server LearnBase!"</span>;
  <span class="tok-fn">echo</span> <span class="tok-str">"&lt;br&gt;Halaman ini dirender oleh PHP."</span>;
<span class="tok-php">?&gt;</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (hasil render ke browser)</div>
          <div class="output-content" id="out-php1"></div>
        </div>
      </div>

      <div class="callout note"><strong>Catatan:</strong> Karena PHP berjalan di server, kode PHP tidak akan pernah terlihat oleh pengguna lewat "Inspect Element" — yang mereka lihat hanya HTML hasil akhirnya.</div>

      <div class="topic-nav">
        <button class="nav-btn" disabled>← Sebelumnya</button>
        <button class="nav-btn primary" data-next="php-2">Lanjut: Variabel & Echo →</button>
      </div>
    </article>

    <!-- PHP Topic 2 -->
    <article class="topic-section" data-topic="php-2">
      <div class="topic-eyebrow">TOPIK 2 / 12</div>
      <h2 class="topic-title">Variabel & Echo</h2>
      <div class="topic-body">
        <p>Di PHP, semua nama variabel diawali tanda <code>$</code>. Tidak perlu menulis tipe data — PHP akan menebaknya otomatis. Perintah <code>echo</code> dipakai untuk menampilkan teks ke halaman.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>variabel.php</div>
          <button class="run-btn" data-run="php2">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5</div>
          <div class="code-content"><span class="tok-php">&lt;?php</span>
  <span class="tok-var">$namaModul</span> = <span class="tok-str">"PHP Dasar"</span>;
  <span class="tok-var">$jumlahPeserta</span> = <span class="tok-num">128</span>;
  <span class="tok-fn">echo</span> <span class="tok-str">"Modul: $namaModul, Peserta: $jumlahPeserta"</span>;
<span class="tok-php">?&gt;</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (hasil render ke browser)</div>
          <div class="output-content" id="out-php2"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Saat nama variabel ditulis langsung di dalam tanda kutip dua (<code>"..."</code>), PHP otomatis menggantinya dengan nilainya. Ini disebut <em>string interpolation</em>.</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz singkat: Bagaimana cara menulis nama variabel yang benar di PHP?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">var skor = 10;</button>
          <button class="quiz-opt" data-correct="true">$skor = 10;</button>
          <button class="quiz-opt" data-correct="false">skor := 10;</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="php-1">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="php-3">Lanjut: Kondisi & Perulangan →</button>
      </div>
    </article>

    <!-- PHP Topic 3 -->
    <article class="topic-section" data-topic="php-3">
      <div class="topic-eyebrow">TOPIK 3 / 12</div>
      <h2 class="topic-title">Kondisi & Perulangan</h2>
      <div class="topic-body">
        <p>PHP mendukung <code>if/else</code> seperti bahasa lain, dan perulangan dengan <code>for</code> atau <code>foreach</code> — sangat umum dipakai untuk menampilkan daftar data dari database, misalnya daftar modul yang dimiliki pengguna.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>perulangan.php</div>
          <button class="run-btn" data-run="php3">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-php">&lt;?php</span>
  <span class="tok-var">$modul</span> = [<span class="tok-str">"HTML Dasar"</span>, <span class="tok-str">"CSS Dasar"</span>, <span class="tok-str">"JS Dasar"</span>];
  <span class="tok-kw">foreach</span> (<span class="tok-var">$modul</span> <span class="tok-kw">as</span> <span class="tok-var">$judul</span>) {
    <span class="tok-fn">echo</span> <span class="tok-str">"- $judul&lt;br&gt;"</span>;
  }
<span class="tok-php">?&gt;</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (hasil render ke browser)</div>
          <div class="output-content" id="out-php3"></div>
        </div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="php-2">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="php-4">Lanjut: Form & Superglobal →</button>
      </div>
    </article>

    <!-- PHP Topic 4 -->
    <article class="topic-section" data-topic="php-4">
      <div class="topic-eyebrow">TOPIK 4 / 12</div>
      <h2 class="topic-title">Form & Superglobal</h2>
      <div class="topic-body">
        <p>PHP punya variabel khusus yang disebut <strong>superglobal</strong>, seperti <code>$_POST</code> dan <code>$_GET</code>, untuk menangkap data yang dikirim dari form HTML. Ini dasar dari fitur login/sign up di LearnBase: form di frontend mengirim data, lalu PHP di server menerima dan memprosesnya.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>login.php</div>
          <button class="run-btn" data-run="php4">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-php">&lt;?php</span>
  <span class="tok-kw">if</span> (<span class="tok-var">$_SERVER</span>[<span class="tok-str">'REQUEST_METHOD'</span>] === <span class="tok-str">'POST'</span>) {
    <span class="tok-var">$email</span> = <span class="tok-var">$_POST</span>[<span class="tok-str">'email'</span>];
    <span class="tok-fn">echo</span> <span class="tok-str">"Mencoba login dengan: $email"</span>;
  }
<span class="tok-php">?&gt;</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (simulasi setelah form dikirim)</div>
          <div class="output-content" id="out-php4"></div>
        </div>
      </div>

      <div class="callout note"><strong>Catatan keamanan:</strong> Pada implementasi nyata di LearnBase, data dari <code>$_POST</code> harus selalu divalidasi dan password harus di-hash (misalnya dengan <code>password_hash()</code>) sebelum disimpan — jangan pernah simpan password apa adanya.</div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="php-3">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="php-5">Lanjut: Fungsi & Array →</button>
      </div>
    </article>

    <!-- PHP Topic 5 -->
    <article class="topic-section" data-topic="php-5">
      <div class="topic-eyebrow">TOPIK 5 / 12</div>
      <h2 class="topic-title">Fungsi & Array</h2>
      <div class="topic-body">
        <p><strong>Fungsi</strong> di PHP bisa didefinisikan dengan kata kunci <code>function</code>. Fungsi membantu kamu menulis kode yang bisa dipakai ulang — misalnya untuk memvalidasi input form atau menghitung skor rata-rata pengguna.</p>
        <p><strong>Array</strong> di PHP bisa berupa array numerik (indeks angka) atau array asosiatif (indeks string). <code>foreach</code> adalah cara paling umum untuk menelusuri array — seperti menampilkan daftar modul dari database.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>fungsi_array.php</div>
          <button class="run-btn" data-run="php5">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8</div>
          <div class="code-content"><span class="tok-php">&lt;?php</span>
<span class="tok-kw">function</span> <span class="tok-fn">rataNilai</span>(<span class="tok-var">$nilai</span>) {
    <span class="tok-kw">return</span> <span class="tok-fn">array_sum</span>(<span class="tok-var">$nilai</span>) / <span class="tok-fn">count</span>(<span class="tok-var">$nilai</span>);
}

<span class="tok-var">$skor</span> = [<span class="tok-num">85</span>, <span class="tok-num">92</span>, <span class="tok-num">78</span>];
<span class="tok-fn">echo</span> <span class="tok-str">"Rata-rata: "</span> . <span class="tok-fn">rataNilai</span>(<span class="tok-var">$skor</span>);

<span class="tok-var">$profil</span> = [<span class="tok-str">"nama"</span> => <span class="tok-str">"Ani"</span>, <span class="tok-str">"skor"</span> => <span class="tok-num">92</span>];
<span class="tok-fn">echo</span> <span class="tok-str">"&lt;br&gt;{$profil['nama']}: {$profil['skor']}"</span>;
<span class="tok-php">?&gt;</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (hasil render ke browser)</div>
          <div class="output-content" id="out-php5"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Di PHP, titik (<code>.</code>) dipakai untuk menggabungkan string — berbeda dengan JavaScript yang pakai <code>+</code>. Ini sering disebut <em>string concatenation</em>.</div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="php-4">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="php-6">Lanjut: Session & Cookie →</button>
      </div>
    </article>

    <!-- PHP Topic 6 -->
    <article class="topic-section" data-topic="php-6">
      <div class="topic-eyebrow">TOPIK 6 / 12</div>
      <h2 class="topic-title">Session & Cookie</h2>
      <div class="topic-body">
        <p><strong>Session</strong> dan <strong>Cookie</strong> adalah cara PHP mengingat data antar halaman — misalnya status login pengguna. Cookie disimpan di browser pengguna, sedangkan session disimpan di server dan hanya ID-nya yang dikirim ke browser.</p>
        <p>Session sangat penting untuk fitur login di LearnBase: setelah pengguna berhasil login, data sesi menyimpan informasi pengguna selama mereka menjelajah halaman.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>session.php</div>
          <button class="run-btn" data-run="php6">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8</div>
          <div class="code-content"><span class="tok-php">&lt;?php</span>
<span class="tok-fn">session_start</span>();

<span class="tok-cm">// menyimpan data login ke session</span>
<span class="tok-var">$_SESSION</span>[<span class="tok-str">'user_id'</span>] = <span class="tok-num">42</span>;
<span class="tok-var">$_SESSION</span>[<span class="tok-str">'role'</span>] = <span class="tok-str">'siswa'</span>;

<span class="tok-fn">echo</span> <span class="tok-str">"User ID: "</span> . <span class="tok-var">$_SESSION</span>[<span class="tok-str">'user_id'</span>];

<span class="tok-cm">// menyimpan cookie yang berlaku 7 hari</span>
<span class="tok-fn">setcookie</span>(<span class="tok-str">"preferensi_tema"</span>, <span class="tok-str">"gelap"</span>, <span class="tok-fn">time</span>() + <span class="tok-num">604800</span>);
<span class="tok-php">?&gt;</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (hasil render ke browser)</div>
          <div class="output-content" id="out-php6"></div>
        </div>
      </div>

      <div class="callout note"><strong>Catatan keamanan:</strong> Jangan pernah menyimpan password di session atau cookie. Simpan hanya ID pengguna, dan gunakan <code>session_regenerate_id()</code> setelah login untuk mencegah <em>session fixation</em>.</div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="php-5">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="php-7">Lanjut: Database MySQL →</button>
      </div>
    </article>

    <!-- PHP Topic 7 -->
    <article class="topic-section" data-topic="php-7">
      <div class="topic-eyebrow">TOPIK 7 / 12</div>
      <h2 class="topic-title">Database MySQL</h2>
      <div class="topic-body">
        <p>PHP bisa terhubung ke database <strong>MySQL</strong> menggunakan <strong>PDO</strong> (PHP Data Objects) — sebuah antarmuka yang aman dan konsisten untuk berbagai jenis database. PDO mendukung <em>prepared statements</em> yang melindungi dari serangan SQL Injection.</p>
        <p>Koneksi database adalah inti dari fitur penyimpanan data di LearnBase — menyimpan akun pengguna, progres modul, dan nilai kuis.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>database.php</div>
          <button class="run-btn" data-run="php7">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10</div>
          <div class="code-content"><span class="tok-php">&lt;?php</span>
<span class="tok-var">$dsn</span> = <span class="tok-str">"mysql:host=localhost;dbname=learnbase"</span>;
<span class="tok-var">$db</span> = <span class="tok-kw">new</span> <span class="tok-fn">PDO</span>(<span class="tok-var">$dsn</span>, <span class="tok-str">"root"</span>, <span class="tok-str">""</span>);

<span class="tok-var">$stmt</span> = <span class="tok-var">$db</span>-><span class="tok-fn">prepare</span>(
  <span class="tok-str">"SELECT * FROM modul WHERE tingkat = ?"</span>
);
<span class="tok-var">$stmt</span>-><span class="tok-fn">execute</span>([<span class="tok-str">"pemula"</span>]);
<span class="tok-var">$modul</span> = <span class="tok-var">$stmt</span>-><span class="tok-fn">fetchAll</span>();

<span class="tok-kw">foreach</span> (<span class="tok-var">$modul</span> <span class="tok-kw">as</span> <span class="tok-var">$m</span>) {
    <span class="tok-fn">echo</span> <span class="tok-var">$m</span>[<span class="tok-str">'judul'</span>] . <span class="tok-str">"&lt;br&gt;"</span>;
}
<span class="tok-php">?&gt;</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (hasil render ke browser)</div>
          <div class="output-content" id="out-php7"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Selalu gunakan <em>prepared statements</em> (seperti contoh di atas) saat mengirim data dari pengguna ke database. Ini adalah pertahanan terbaik terhadap SQL Injection.</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz singkat: Ekstensi PHP mana yang paling aman untuk koneksi database?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">mysql_connect()</button>
          <button class="quiz-opt" data-correct="true">PDO</button>
          <button class="quiz-opt" data-correct="false">mysqli</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="php-6">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="php-8">Lanjut: File & Upload →</button>
      </div>
    </article>

    <!-- PHP Topic 8 -->
    <article class="topic-section" data-topic="php-8">
      <div class="topic-eyebrow">TOPIK 8 / 12</div>
      <h2 class="topic-title">File & Upload</h2>
      <div class="topic-body">
        <p>PHP punya fungsi bawaan untuk menangani <strong>unggah file</strong> lewat form HTML. File yang dikirim bisa berupa gambar, dokumen, atau PDF — misalnya foto profil atau tugas siswa. File tersebut akan disimpan di direktori di server.</p>
        <p>Fungsi <code>move_uploaded_file()</code> memindahkan file dari folder sementara ke lokasi permanen. Pastikan untuk selalu memvalidasi tipe dan ukuran file sebelum menyimpannya.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>upload.php</div>
          <button class="run-btn" data-run="php8">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</div>
          <div class="code-content"><span class="tok-php">&lt;?php</span>
<span class="tok-kw">if</span> (<span class="tok-var">$_SERVER</span>[<span class="tok-str">'REQUEST_METHOD'</span>] === <span class="tok-str">'POST'</span>) {
    <span class="tok-var">$targetDir</span> = <span class="tok-str">"uploads/"</span>;
    <span class="tok-var">$file</span> = <span class="tok-var">$_FILES</span>[<span class="tok-str">'tugas'</span>];

    <span class="tok-kw">if</span> (<span class="tok-var">$file</span>[<span class="tok-str">'size'</span>] &lt; <span class="tok-num">2000000</span>) {
        <span class="tok-fn">move_uploaded_file</span>(
            <span class="tok-var">$file</span>[<span class="tok-str">'tmp_name'</span>],
            <span class="tok-var">$targetDir</span> . <span class="tok-fn">basename</span>(<span class="tok-var">$file</span>[<span class="tok-str">'name'</span>])
        );
        <span class="tok-fn">echo</span> <span class="tok-str">"File berhasil diunggah!"</span>;
    }
}
<span class="tok-php">?&gt;</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (simulasi setelah upload)</div>
          <div class="output-content" id="out-php8"></div>
        </div>
      </div>

      <div class="callout note"><strong>Catatan keamanan:</strong> Batasi tipe file yang bisa diunggah (misalnya hanya <code>.jpg</code>, <code>.png</code>, <code>.pdf</code>) dan jangan percaya ekstensi file dari nama asli — periksa juga <code>mime_content_type()</code> untuk memastikan.</div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="php-7">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="php-9">Lanjut: Namespace & Autoload →</button>
      </div>
    </article>

    <!-- PHP Topic 9 -->
    <article class="topic-section" data-topic="php-9">
      <div class="topic-eyebrow">TOPIK 9 / 12</div>
      <h2 class="topic-title">Namespace & Autoload</h2>
      <div class="topic-body">
        <p><strong>Namespace</strong> adalah cara PHP mengelompokkan kode agar tidak terjadi benturan nama antar class atau fungsi — mirip seperti folder di sistem operasi. Dengan namespace, kamu bisa punya dua class <code>User</code> dari bagian aplikasi berbeda tanpa konflik.</p>
        <p><strong>Autoload</strong> (dengan <code>spl_autoload_register()</code>) memuat file class secara otomatis saat class pertama kali dipanggil — tidak perlu menulis <code>require_once</code> satu per satu. Ini adalah fondasi dari framework modern seperti Laravel.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>namespace.php</div>
          <button class="run-btn" data-run="php9">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12</div>
          <div class="code-content"><span class="tok-php">&lt;?php</span>
<span class="tok-cm">// Models/User.php</span>
<span class="tok-kw">namespace</span> <span class="tok-var">Models</span>;

<span class="tok-kw">class</span> <span class="tok-var">User</span> {
    <span class="tok-kw">public function</span> <span class="tok-fn">getNama</span>() {
        <span class="tok-kw">return</span> <span class="tok-str">"Budi dari Models"</span>;
    }
}

<span class="tok-cm">// index.php - autoload & panggil</span>
<span class="tok-fn">spl_autoload_register</span>(<span class="tok-kw">function</span>(<span class="tok-var">$class</span>) {
    <span class="tok-kw">require_once</span> <span class="tok-str">__DIR__</span> . <span class="tok-str">"/"</span> . <span class="tok-fn">str_replace</span>(<span class="tok-str">"\\"</span>, <span class="tok-str">"/"</span>, <span class="tok-var">$class</span>) . <span class="tok-str">".php"</span>;
});

<span class="tok-kw">use</span> <span class="tok-var">Models</span>\<span class="tok-var">User</span>;
<span class="tok-var">$user</span> = <span class="tok-kw">new</span> <span class="tok-var">User</span>();
<span class="tok-fn">echo</span> <span class="tok-var">$user</span>-><span class="tok-fn">getNama</span>();</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (hasil render ke browser)</div>
          <div class="output-content" id="out-php9"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> <code>__DIR__</code> adalah konstanta ajaib PHP yang berisi path direktori file saat ini — sangat berguna untuk menentukan lokasi file yang akan di-load.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="php-8">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="php-10">Lanjut: Error & Exception →</button>
      </div>
    </article>

    <!-- PHP Topic 10 -->
    <article class="topic-section" data-topic="php-10">
      <div class="topic-eyebrow">TOPIK 10 / 12</div>
      <h2 class="topic-title">Error & Exception</h2>
      <div class="topic-body">
        <p>PHP punya dua mekanisme penanganan masalah: <strong>error</strong> (kesalahan bawaan PHP, seperti file tidak ditemukan) dan <strong>exception</strong> (kesalahan yang sengaja dilempar kode dengan <code>throw</code>). Dalam PHP modern, error pun bisa ditangani dengan <code>try/catch</code> berkat <em>Error class</em> yang dijadikan <em>Throwable</em>.</p>
        <p>Blok <code>try/catch/finally</code> memungkinkan kamu menangkap kesalahan, menanganinya dengan anggun, dan tetap menjalankan kode pembersihan (di <code>finally</code>) — penting untuk aplikasi seperti LearnBase agar tidak tiba-tiba menampilkan layar putih ke pengguna.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>exception.php</div>
          <button class="run-btn" data-run="php10">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13</div>
          <div class="code-content"><span class="tok-php">&lt;?php</span>
<span class="tok-kw">function</span> <span class="tok-fn">bagi</span>(<span class="tok-var">$a</span>, <span class="tok-var">$b</span>) {
    <span class="tok-kw">if</span> (<span class="tok-var">$b</span> == <span class="tok-num">0</span>) {
        <span class="tok-kw">throw new</span> <span class="tok-fn">InvalidArgumentException</span>(<span class="tok-str">"Pembagi tidak boleh 0!"</span>);
    }
    <span class="tok-kw">return</span> <span class="tok-var">$a</span> / <span class="tok-var">$b</span>;
}

<span class="tok-kw">try</span> {
    <span class="tok-fn">echo</span> <span class="tok-fn">bagi</span>(<span class="tok-num">10</span>, <span class="tok-num">0</span>);
} <span class="tok-kw">catch</span> (<span class="tok-var">InvalidArgumentException</span> <span class="tok-var">$e</span>) {
    <span class="tok-fn">echo</span> <span class="tok-str">"Terjadi error: "</span> . <span class="tok-var">$e</span>-><span class="tok-fn">getMessage</span>();
} <span class="tok-kw">finally</span> {
    <span class="tok-fn">echo</span> <span class="tok-str">"&lt;br&gt;Blok finally selalu dijalankan."</span>;
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (hasil render ke browser)</div>
          <div class="output-content" id="out-php10"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Tangkap exception dari yang paling spesifik ke paling umum. <code>InvalidArgumentException</code> ditangkap dulu sebelum <code>Exception</code> — ini memastikan pesan error yang ditampilkan lebih relevan.</div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz singkat: Blok mana yang tetap dijalankan meskipun terjadi exception?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="true">finally</button>
          <button class="quiz-opt" data-correct="false">catch</button>
          <button class="quiz-opt" data-correct="false">throw</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="php-9">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="php-11">Lanjut: OOP di PHP →</button>
      </div>
    </article>

    <!-- PHP Topic 11 -->
    <article class="topic-section" data-topic="php-11">
      <div class="topic-eyebrow">TOPIK 11 / 12</div>
      <h2 class="topic-title">OOP di PHP</h2>
      <div class="topic-body">
        <p>PHP mendukung <strong>OOP (Object-Oriented Programming)</strong> secara penuh — kamu bisa mendefinisikan <strong>class</strong>, membuat <strong>object</strong>, dan menggunakan pilar-pilar OOP seperti <strong>inheritance</strong> (pewarisan), <strong>encapsulation</strong> (pembungkusan data), dan <strong>polymorphism</strong> (banyak bentuk). Class di PHP didefinisikan dengan kata kunci <code>class</code>.</p>
        <p><strong>Constructor</strong> (<code>__construct()</code>) adalah method khusus yang otomatis dipanggil saat object dibuat. <strong>Access modifier</strong> (<code>public</code>, <code>protected</code>, <code>private</code>) mengontrol siapa yang bisa mengakses properti atau method dari luar class.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>oop.php</div>
          <button class="run-btn" data-run="php11">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15<br>16<br>17<br>18<br>19<br>20<br>21</div>
          <div class="code-content"><span class="tok-php">&lt;?php</span>
<span class="tok-kw">class</span> <span class="tok-var">Modul</span> {
    <span class="tok-kw">public</span> <span class="tok-var">$judul</span>;
    <span class="tok-kw">private</span> <span class="tok-var">$nilai</span>;

    <span class="tok-kw">public function</span> <span class="tok-fn">__construct</span>(<span class="tok-var">$judul</span>, <span class="tok-var">$nilai</span>) {
        <span class="tok-var">$this</span>-><span class="tok-var">judul</span> = <span class="tok-var">$judul</span>;
        <span class="tok-var">$this</span>-><span class="tok-var">nilai</span> = <span class="tok-var">$nilai</span>;
    }

    <span class="tok-kw">public function</span> <span class="tok-fn">getNilai</span>() {
        <span class="tok-kw">return</span> <span class="tok-var">$this</span>-><span class="tok-var">nilai</span>;
    }
}

<span class="tok-kw">class</span> <span class="tok-var">ModulPremium</span> <span class="tok-kw">extends</span> <span class="tok-var">Modul</span> {
    <span class="tok-kw">public function</span> <span class="tok-fn">getNilai</span>() {
        <span class="tok-kw">return</span> <span class="tok-str">"[PREMIUM] "</span> . <span class="tok-kw">parent</span>::<span class="tok-fn">getNilai</span>();
    }
}

<span class="tok-var">$m</span> = <span class="tok-kw">new</span> <span class="tok-fn">ModulPremium</span>(<span class="tok-str">"OOP PHP"</span>, <span class="tok-num">95</span>);
<span class="tok-fn">echo</span> <span class="tok-var">$m</span>-><span class="tok-var">judul</span> . <span class="tok-str">" - "</span> . <span class="tok-var">$m</span>-><span class="tok-fn">getNilai</span>();</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (hasil render ke browser)</div>
          <div class="output-content" id="out-php11"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Gunakan <code>parent::</code> untuk memanggil method milik class induk dari dalam class anak. Ini sering dipakai saat metode anak ingin menambahkan perilaku baru tanpa mengulang seluruh logika induk.</div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz singkat: Kata kunci apa yang digunakan untuk mewarisi class?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">implements</button>
          <button class="quiz-opt" data-correct="true">extends</button>
          <button class="quiz-opt" data-correct="false">inherit</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="php-10">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="php-12">Lanjut: Keamanan Web →</button>
      </div>
    </article>

    <!-- PHP Topic 12 -->
    <article class="topic-section" data-topic="php-12">
      <div class="topic-eyebrow">TOPIK 12 / 12</div>
      <h2 class="topic-title">Keamanan Web</h2>
      <div class="topic-body">
        <p>Keamanan adalah aspek krusial dalam pengembangan web. PHP memiliki banyak fitur bawaan untuk melindungi aplikasi dari serangan umum seperti <strong>SQL Injection</strong>, <strong>XSS (Cross-Site Scripting)</strong>, dan <strong>CSRF (Cross-Site Request Forgery)</strong>. Memahami dasar-dasar ini penting sebelum meluncurkan aplikasi seperti LearnBase ke publik.</p>
        <p>Prinsip utamanya: jangan pernah percaya input dari pengguna. Selalu validasi, sanitasi, dan gunakan fungsi keamanan bawaan PHP.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>keamanan.php</div>
          <button class="run-btn" data-run="php12">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15<br>16<br>17<br>18<br>19</div>
          <div class="code-content"><span class="tok-php">&lt;?php</span>
<span class="tok-cm">// 1. Cegah SQL Injection — pakai prepared statement</span>
<span class="tok-var">$stmt</span> = <span class="tok-var">$db</span>-><span class="tok-fn">prepare</span>(<span class="tok-str">"SELECT * FROM users WHERE email = ?"</span>);
<span class="tok-var">$stmt</span>-><span class="tok-fn">execute</span>([<span class="tok-var">$_POST</span>[<span class="tok-str">'email'</span>]]);

<span class="tok-cm">// 2. Cegah XSS — escape output ke HTML</span>
<span class="tok-fn">echo</span> <span class="tok-fn">htmlspecialchars</span>(<span class="tok-var">$nama</span>, <span class="tok-no">ENT_QUOTES</span>, <span class="tok-str">'UTF-8'</span>);

<span class="tok-cm">// 3. Hash password — jangan simpan plain text!</span>
<span class="tok-var">$hash</span> = <span class="tok-fn">password_hash</span>(<span class="tok-var">$_POST</span>[<span class="tok-str">'password'</span>], <span class="tok-no">PASSWORD_BCRYPT</span>);

<span class="tok-cm">// 4. Token CSRF untuk form</span>
<span class="tok-var">$_SESSION</span>[<span class="tok-str">'csrf_token'</span>] = <span class="tok-fn">bin2hex</span>(<span class="tok-fn">random_bytes</span>(<span class="tok-num">32</span>));
<span class="tok-fn">echo</span> <span class="tok-str">"&lt;input type='hidden' name='csrf' value='{$_SESSION['csrf_token']}'&gt;"</span>;
<span class="tok-php">?&gt;</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (tidak ada output — kode pertahanan)</div>
          <div class="output-content" id="out-php12"></div>
        </div>
      </div>

      <div class="callout note"><strong>Catatan penting:</strong> Untuk aplikasi nyata di LearnBase, selalu aktifkan HTTPS, atur <code>secure</code> dan <code>httponly</code> pada cookie, serta gunakan Content Security Policy (CSP) di header HTTP. Keamanan adalah proses berkelanjutan, bukan fitur satu kali.</div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="php-11">← Sebelumnya</button>
        <button class="nav-btn primary" type="button" id="finishBtn">Selesai — Kembali ke Library </button>
      </div>
    </article>
  </section>

</main>

<script>
(function() {
  const totalTopics = 12;
  const LANGUAGE = 'php'; // harus sama dengan key di $languages pada get_progress.php
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
  loadProgress().then(() => markDone('php-1'));

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