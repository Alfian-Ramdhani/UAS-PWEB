<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rust — LearnBase</title>
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
        <div class="brand-sub">Rust</div>
      </div>
    </div>
  </div>

  <div class="sidebar-body">
  <nav class="lang-nav" id="langNav">
    <div class="lang-tab active" data-lang="rust">
      <span class="lang-dot" style="background:#6B4FD8"></span>
      <span class="lang-tab-text">
        <div class="lang-tab-name">Rust</div>
        <div class="lang-tab-meta">12 topik</div>
      </span>
      <span class="lang-tab-pct" data-pct="rust">0%</span>
    </div>
    <div class="topic-list" data-list="rust">
      <div class="topic-item active" data-topic="rust-1"><span class="topic-check"></span>Apa itu Rust?</div>
      <div class="topic-item" data-topic="rust-2"><span class="topic-check"></span>Variabel &amp; Mutability</div>
      <div class="topic-item" data-topic="rust-3"><span class="topic-check"></span>Tipe Data</div>
      <div class="topic-item" data-topic="rust-4"><span class="topic-check"></span>Kondisi &amp; Perulangan</div>
      <div class="topic-item" data-topic="rust-5"><span class="topic-check"></span>Fungsi &amp; Ownership</div>
      <div class="topic-item" data-topic="rust-6"><span class="topic-check"></span>Struct &amp; impl</div>
      <div class="topic-item" data-topic="rust-7"><span class="topic-check"></span>Enum &amp; Pattern</div>
      <div class="topic-item" data-topic="rust-8"><span class="topic-check"></span>Error Handling</div>
      <div class="topic-item" data-topic="rust-9"><span class="topic-check"></span>Collection &amp; Iterator</div>
      <div class="topic-item" data-topic="rust-10"><span class="topic-check"></span>String vs &amp;str</div>
      <div class="topic-item" data-topic="rust-11"><span class="topic-check"></span>Generic &amp; Trait</div>
      <div class="topic-item" data-topic="rust-12"><span class="topic-check"></span>Cargo &amp; Crates</div>
    </div>
  </div>

  <div class="sidebar-foot">
    <div class="sidebar-footer-label">Progres modul kamu</div>
    <div class="progress-track"><div class="progress-fill" id="progressFill" style="width:0%"></div></div>
    <div class="sidebar-footer-num" id="progressNum">0 / 12 topik selesai</div>
  </div>
</aside>

<main class="main">

  <!-- ================= Rust ================= -->
  <section class="content-panel active" data-lang="rust">
    <div class="lang-header">
      <div>
        <div class="lang-eyebrow">MODUL 10 · BAHASA SISTEM AMAN &AMP; CEPAT</div>
        <h1 class="lang-title">Rust</h1>
        <p class="lang-desc">Bahasa sistem yang menjamin <strong>memory safety tanpa garbage collector</strong>. Performa setara C++ dengan sistem ownership yang unik — dipakai di browser, CLI tools, dan sistem kritikal.</p>
      </div>
      <div class="lang-badge">RS</div>
    </div>

    <article class="topic-section active" data-topic="rust-1">
      <div class="topic-eyebrow">TOPIK 1 / 12</div>
      <h2 class="topic-title">Apa itu Rust?</h2>
      <div class="topic-body">
        <p>Bayangin kamu bisa nulis kode secepat C++ tapi tanpa khawatir crash karena null pointer atau memory leak — itulah Rust. Sistem <em>ownership</em>-nya mendeteksi error memori saat kompilasi, bukan pas aplikasi udah jalan. Makanya Rust dipakai di Firefox, Discord, dan berbagai CLI tools keren kayak <code>bat</code>, <code>ripgrep</code>, dan <code>starship</code> yang bisa kamu bikin sendiri juga.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>main.rs</div>
          <button class="run-btn" data-run="rust1">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5</div>
          <div class="code-content"><span class="tok-kw">fn</span> <span class="tok-fn">main</span>() {
    <span class="tok-kw">let</span> <span class="tok-var">nama</span> = <span class="tok-str">"LearnBase"</span>;
    <span class="tok-fn">println!</span>(<span class="tok-str">"Halo, {}!"</span>, <span class="tok-var">nama</span>);
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-rust1"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>println!</code> dengan tanda seru adalah <strong>macro</strong>, bukan fungsi. <code>{}</code> adalah placeholder yang diisi nilai setelah koma.</div>
      <div class="topic-nav">
        <button class="nav-btn" disabled>← Sebelumnya</button>
        <button class="nav-btn primary" data-next="rust-2">Lanjut: Variabel &amp; Mutability →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="rust-2">
      <div class="topic-eyebrow">TOPIK 2 / 12</div>
      <h2 class="topic-title">Variabel &amp; Mutability</h2>
      <div class="topic-body">
        <p>Di Rust, variabel <strong>immutable secara default</strong> — nilainya tidak bisa diubah setelah ditetapkan. Untuk mengubah, perlu keyword <code>mut</code>. Ini adalah fitur yang mendorong kode yang lebih aman.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>var.rs</div>
          <button class="run-btn" data-run="rust2">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-kw">let</span> <span class="tok-var">skor</span> = <span class="tok-num">87</span>;
<span class="tok-kw">let</span> <span class="tok-kw">mut</span> <span class="tok-var">nama</span> = <span class="tok-str">"Rust Dasar"</span>;
<span class="tok-kw">let</span> <span class="tok-var">lulus</span> = <span class="tok-var">skor</span> >= <span class="tok-num">70</span>;

<span class="tok-var">nama</span> = <span class="tok-str">"Rust Lanjutan"</span>;
<span class="tok-fn">println!</span>(<span class="tok-str">"{}: {} (skor {})"</span>, <span class="tok-var">nama</span>, <span class="tok-var">lulus</span>, <span class="tok-var">skor</span>);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-rust2"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> Jika kamu hapus <code>mut</code> dari kode di atas, Rust akan menolak kompilasi — "cannot assign to immutable variable". Ini fitur, bukan error!</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="rust-1">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="rust-3">Lanjut: Tipe Data →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="rust-3">
      <div class="topic-eyebrow">TOPIK 3 / 12</div>
      <h2 class="topic-title">Tipe Data</h2>
      <div class="topic-body">
        <p>Rust punya <code>i32</code>, <code>u32</code>, <code>f64</code>, <code>bool</code>, <code>char</code>, <code>String</code>, dan <code>&amp;str</code> (string slice). Tipe ditentukan dengan <code>:</code> setelah nama variabel, atau dibiarkan di-inference.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>tipe.rs</div>
          <button class="run-btn" data-run="rust3">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-kw">let</span> <span class="tok-var">x</span>: <span class="tok-kw">i32</span> = <span class="tok-num">42</span>;
<span class="tok-kw">let</span> <span class="tok-var">y</span> = <span class="tok-num">3.14</span>;
<span class="tok-kw">let</span> <span class="tok-var">teks</span> = <span class="tok-str">"Hello"</span>;
<span class="tok-kw">let</span> <span class="tok-var">s</span> = <span class="tok-var">String</span>::<span class="tok-fn">from</span>(<span class="tok-str">"LearnBase"</span>);
<span class="tok-fn">println!</span>(<span class="tok-str">"{} {} {} {}"</span>, <span class="tok-var">x</span>, <span class="tok-var">y</span>, <span class="tok-var">teks</span>, <span class="tok-var">s</span>);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-rust3"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>String</code> = string yang bisa diubah-ubah (heap). <code>&amp;str</code> = string literal / slice (immutable, biasanya di stack).</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="rust-2">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="rust-4">Lanjut: Kondisi &amp; Perulangan →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="rust-4">
      <div class="topic-eyebrow">TOPIK 4 / 12</div>
      <h2 class="topic-title">Kondisi &amp; Perulangan</h2>
      <div class="topic-body">
        <p>Rust pakai <code>if/else</code> tanpa kurung, dan <code>loop</code>, <code>while</code>, <code>for</code>. <code>for</code> dengan <code>in</code> untuk iterasi range atau koleksi. <code>match</code> adalah pattern matching super kuat — mirip switch on steroids.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>loop.rs</div>
          <button class="run-btn" data-run="rust4">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8</div>
          <div class="code-content"><span class="tok-kw">for</span> <span class="tok-var">i</span> <span class="tok-kw">in</span> <span class="tok-num">1</span>..=<span class="tok-num">3</span> {
    <span class="tok-fn">println!</span>(<span class="tok-str">"Modul {}"</span>, <span class="tok-var">i</span>);
}

<span class="tok-kw">let</span> <span class="tok-var">nilai</span> = <span class="tok-num">85</span>;
<span class="tok-kw">match</span> <span class="tok-var">nilai</span> {
    <span class="tok-num">90</span>..=<span class="tok-num">100</span> => <span class="tok-fn">println!</span>(<span class="tok-str">"A"</span>),
    <span class="tok-num">80</span>..=<span class="tok-num">89</span> => <span class="tok-fn">println!</span>(<span class="tok-str">"B"</span>),
    _ => <span class="tok-fn">println!</span>(<span class="tok-str">"C"</span>),
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-rust4"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> <code>1..=3</code> = range inklusif (1 sampai 3). <code>1..3</code> = eksklusif (1,2). <code>match</code> bersifat <em>exhaustive</em> — harus mencakup semua kemungkinan.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="rust-3">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="rust-5">Lanjut: Fungsi &amp; Ownership →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="rust-5">
      <div class="topic-eyebrow">TOPIK 5 / 12</div>
      <h2 class="topic-title">Fungsi &amp; Ownership</h2>
      <div class="topic-body">
        <p><strong>Ownership</strong> adalah konsep paling penting di Rust — setiap nilai punya satu <em>owner</em>. Saat owner keluar scope, nilai dihapus. Fungsi bisa meminjam (<code>&amp;</code>) atau mengambil alih kepemilikan.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>ownership.rs</div>
          <button class="run-btn" data-run="rust5">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8</div>
          <div class="code-content"><span class="tok-kw">fn</span> <span class="tok-fn">hitung_panjang</span>(<span class="tok-var">s</span>: &amp;<span class="tok-var">String</span>) -> <span class="tok-kw">usize</span> {
    <span class="tok-var">s</span>.<span class="tok-fn">len</span>()
}

<span class="tok-kw">let</span> <span class="tok-var">nama</span> = <span class="tok-var">String</span>::<span class="tok-fn">from</span>(<span class="tok-str">"LearnBase"</span>);
<span class="tok-kw">let</span> <span class="tok-var">panjang</span> = <span class="tok-fn">hitung_panjang</span>(&amp;<span class="tok-var">nama</span>);
<span class="tok-fn">println!</span>(<span class="tok-str">"'{}' panjang {}"</span>, <span class="tok-var">nama</span>, <span class="tok-var">panjang</span>);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-rust5"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>&amp;</code> = <em>borrow</em> (pinjam) — fungsi bisa membaca tanpa mengambil alih kepemilikan. <code>&amp;mut</code> = pinjam sambil boleh diubah.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="rust-4">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="rust-6">Lanjut: Struct &amp; impl →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="rust-6">
      <div class="topic-eyebrow">TOPIK 6 / 12</div>
      <h2 class="topic-title">Struct &amp; impl</h2>
      <div class="topic-body">
        <p><strong>Struct</strong> mengelompokkan data. Blok <strong>impl</strong> untuk mendefinisikan method pada struct — mirip class di bahasa lain, tapi tanpa inheritance.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>struct.rs</div>
          <button class="run-btn" data-run="rust6">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11</div>
          <div class="code-content"><span class="tok-kw">struct</span> <span class="tok-var">Siswa</span> {
    <span class="tok-var">nama</span>: <span class="tok-var">String</span>,
    <span class="tok-var">skor</span>: <span class="tok-kw">i32</span>,
}
<span class="tok-kw">impl</span> <span class="tok-var">Siswa</span> {
    <span class="tok-kw">fn</span> <span class="tok-fn">cetak</span>(&amp;<span class="tok-kw">self</span>) {
        <span class="tok-fn">println!</span>(<span class="tok-str">"{}: {}"</span>, <span class="tok-kw">self</span>.<span class="tok-var">nama</span>, <span class="tok-kw">self</span>.<span class="tok-var">skor</span>);
    }
}
<span class="tok-kw">let</span> <span class="tok-var">s</span> = <span class="tok-var">Siswa</span> { <span class="tok-var">nama</span>: <span class="tok-var">String</span>::<span class="tok-fn">from</span>(<span class="tok-str">"Budi"</span>), <span class="tok-var">skor</span>: <span class="tok-num">87</span> };
<span class="tok-var">s</span>.<span class="tok-fn">cetak</span>();</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-rust6"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> <code>&amp;self</code> = method yang meminjam struct (baca). <code>&amp;mut self</code> = bisa ubah struct. <code>self</code> = mengambil alih kepemilikan.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="rust-5">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="rust-7">Lanjut: Enum &amp; Pattern →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="rust-7">
      <div class="topic-eyebrow">TOPIK 7 / 12</div>
      <h2 class="topic-title">Enum &amp; Pattern</h2>
      <div class="topic-body">
        <p><strong>Enum</strong> di Rust sangat kuat — setiap varian bisa membawa data. <strong>Pattern matching</strong> dengan <code>match</code> digunakan untuk menangani enum. Ini lebih aman daripada null/exception karena semua kemungkinan harus ditangani.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>enum.rs</div>
          <button class="run-btn" data-run="rust7">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11</div>
          <div class="code-content"><span class="tok-kw">enum</span> <span class="tok-var">Nilai</span> {
    <span class="tok-var">Angka</span>(<span class="tok-kw">i32</span>),
    <span class="tok-var">Huruf</span>(<span class="tok-var">String</span>),
}
<span class="tok-kw">let</span> <span class="tok-var">x</span> = <span class="tok-var">Nilai</span>::<span class="tok-var">Angka</span>(<span class="tok-num">85</span>);
<span class="tok-kw">match</span> <span class="tok-var">x</span> {
    <span class="tok-var">Nilai</span>::<span class="tok-var">Angka</span>(<span class="tok-var">n</span>) => <span class="tok-fn">println!</span>(<span class="tok-str">"Angka: {}"</span>, <span class="tok-var">n</span>),
    <span class="tok-var">Nilai</span>::<span class="tok-var">Huruf</span>(<span class="tok-var">h</span>) => <span class="tok-fn">println!</span>(<span class="tok-str">"Huruf: {}"</span>, <span class="tok-var">h</span>),
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-rust7"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>Option&lt;T&gt;</code> dan <code>Result&lt;T, E&gt;</code> adalah enum paling sering dipakai — menggantikan null dan exception.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="rust-6">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="rust-8">Lanjut: Error Handling →</button>
      </div>
    </article>

    <!-- Rust Topic 8 -->
    <article class="topic-section" data-topic="rust-8">
      <div class="topic-eyebrow">TOPIK 8 / 12</div>
      <h2 class="topic-title">Error Handling</h2>
      <div class="topic-body">
        <p>Rust tidak punya exception. Error ditangani via <code>Result&lt;T, E&gt;</code> (ok/err) dan <code>Option&lt;T&gt;</code> (some/none). Operator <code>?</code> menyebarkan error ke pemanggil — membuat kode tetap bersih.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>error.rs</div>
          <button class="run-btn" data-run="rust8">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</div>
          <div class="code-content"><span class="tok-kw">fn</span> <span class="tok-fn">bagi</span>(<span class="tok-var">a</span>: <span class="tok-kw">i32</span>, <span class="tok-var">b</span>: <span class="tok-kw">i32</span>) -> <span class="tok-var">Result</span>&lt;<span class="tok-kw">i32</span>, <span class="tok-var">String</span>&gt; {
    <span class="tok-kw">if</span> <span class="tok-var">b</span> == <span class="tok-num">0</span> {
        <span class="tok-kw">return</span> <span class="tok-var">Err</span>(<span class="tok-str">"Tidak bisa bagi nol"</span>.<span class="tok-fn">to_string</span>());
    }
    <span class="tok-var">Ok</span>(<span class="tok-var">a</span> / <span class="tok-var">b</span>)
}
<span class="tok-fn">println!</span>(<span class="tok-str">"{:?}"</span>, <span class="tok-fn">bagi</span>(<span class="tok-num">10</span>, <span class="tok-num">2</span>));
<span class="tok-fn">println!</span>(<span class="tok-str">"{:?}"</span>, <span class="tok-fn">bagi</span>(<span class="tok-num">10</span>, <span class="tok-num">0</span>));</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-rust8"></div>
        </div>
      </div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz: Keyword di Rust untuk membuat variabel bisa diubah?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">var</button>
          <button class="quiz-opt" data-correct="true">mut</button>
          <button class="quiz-opt" data-correct="false">changeable</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="rust-7">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="rust-9">Lanjut: Collection &amp; Iterator →</button>
      </div>
    </article>

    <!-- Rust Topic 9 -->
    <article class="topic-section" data-topic="rust-9">
      <div class="topic-eyebrow">TOPIK 9 / 12</div>
      <h2 class="topic-title">Collection &amp; Iterator</h2>
      <div class="topic-body">
        <p>Rust menyediakan <strong>collection</strong> standar seperti <code>Vec&lt;T&gt;</code> (vector), <code>HashMap&lt;K, V&gt;</code>, dan <code>HashSet&lt;T&gt;</code>. Yang membedakan Rust adalah <strong>iterator adaptor</strong> — metode seperti <code>.iter()</code>, <code>.map()</code>, <code>.filter()</code>, <code>.collect()</code> yang membentuk pipeline tanpa alokasi perantara.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>collection.rs</div>
          <button class="run-btn" data-run="rust9">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12</div>
          <div class="code-content"><span class="tok-kw">use</span> <span class="tok-var">std</span>::<span class="tok-var">collections</span>::<span class="tok-var">HashMap</span>;

<span class="tok-kw">let</span> <span class="tok-kw">mut</span> <span class="tok-var">nilai</span> = <span class="tok-var">HashMap</span>::<span class="tok-fn">new</span>();
<span class="tok-var">nilai</span>.<span class="tok-fn">insert</span>(<span class="tok-str">"Budi"</span>, <span class="tok-num">87</span>);
<span class="tok-var">nilai</span>.<span class="tok-fn">insert</span>(<span class="tok-str">"Ani"</span>, <span class="tok-num">95</span>);

<span class="tok-kw">for</span> (<span class="tok-var">nama</span>, <span class="tok-var">skor</span>) <span class="tok-kw">in</span> <span class="tok-var">&amp;nilai</span> {
    <span class="tok-fn">println!</span>(<span class="tok-str">"{}: {}"</span>, <span class="tok-var">nama</span>, <span class="tok-var">skor</span>);
}

<span class="tok-cm">// Iterator pipeline</span>
<span class="tok-kw">let</span> <span class="tok-var">genap</span>: <span class="tok-var">Vec</span>&lt;<span class="tok-kw">i32</span>&gt; = (<span class="tok-num">1</span>..=<span class="tok-num">6</span>)
    .<span class="tok-fn">filter</span>(|<span class="tok-var">x</span>| <span class="tok-var">x</span> % <span class="tok-num">2</span> == <span class="tok-num">0</span>)
    .<span class="tok-fn">map</span>(|<span class="tok-var">x</span>| <span class="tok-var">x</span> * <span class="tok-var">x</span>)
    .<span class="tok-fn">collect</span>();
<span class="tok-fn">println!</span>(<span class="tok-str">"{:?}"</span>, <span class="tok-var">genap</span>);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-rust9"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Iterator di Rust <em>lazy</em> — tidak memproses apa pun sampai <code>.collect()</code> atau <code>.for_each()</code> dipanggil. Ini memungkinkan rantai operasi tanpa alokasi perantara yang boros.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="rust-8">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="rust-10">Lanjut: String vs &amp;str →</button>
      </div>
    </article>

    <!-- Rust Topic 10 -->
    <article class="topic-section" data-topic="rust-10">
      <div class="topic-eyebrow">TOPIK 10 / 12</div>
      <h2 class="topic-title">String vs &amp;str</h2>
      <div class="topic-body">
        <p>Rust punya dua tipe string: <code>String</code> (owned, heap-allocated, bisa diubah) dan <code>&amp;str</code> (string slice, read-only reference ke sebagian string). Konversi: <code>"teks".to_string()</code> atau <code>String::from("teks")</code>. <code>&amp;str</code> lebih ringan dan tidak punya alokasi — ideal sebagai parameter fungsi.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>string.rs</div>
          <button class="run-btn" data-run="rust10">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11</div>
          <div class="code-content"><span class="tok-kw">fn</span> <span class="tok-fn">sapa</span>(<span class="tok-var">nama</span>: &amp;<span class="tok-kw">str</span>) -> <span class="tok-var">String</span> {
    <span class="tok-kw">let</span> <span class="tok-kw">mut</span> <span class="tok-var">hasil</span> = <span class="tok-var">String</span>::<span class="tok-fn">from</span>(<span class="tok-str">"Halo, "</span>);
    <span class="tok-var">hasil</span>.<span class="tok-fn">push_str</span>(<span class="tok-var">nama</span>);
    <span class="tok-var">hasil</span>
}

<span class="tok-kw">let</span> <span class="tok-var">nama</span> = <span class="tok-str">"LearnBase"</span>;        <span class="tok-cm">// &amp;str</span>
<span class="tok-kw">let</span> <span class="tok-var">msg</span> = <span class="tok-fn">sapa</span>(<span class="tok-var">nama</span>);
<span class="tok-fn">println!</span>(<span class="tok-str">"{}"</span>, <span class="tok-var">msg</span>);

<span class="tok-cm">// slicing &amp;str</span>
<span class="tok-kw">let</span> <span class="tok-var">kalimat</span> = <span class="tok-str">"Selamat belajar Rust"</span>;
<span class="tok-fn">println!</span>(<span class="tok-str">"{}"</span>, &amp;<span class="tok-var">kalimat</span>[<span class="tok-num">0</span>..<span class="tok-num">7</span>]);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-rust10"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> Indexing string di Rust tidak bisa dengan <code>s[0]</code> seperti C — karena Rust menggunakan UTF-8, satu karakter bisa lebih dari 1 byte. Gunakan <code>.chars()</code> atau <code>.bytes()</code> untuk iterasi.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="rust-9">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="rust-11">Lanjut: Generic &amp; Trait →</button>
      </div>
    </article>

    <!-- Rust Topic 11 -->
    <article class="topic-section" data-topic="rust-11">
      <div class="topic-eyebrow">TOPIK 11 / 12</div>
      <h2 class="topic-title">Generic &amp; Trait</h2>
      <div class="topic-body">
        <p><strong>Generic</strong> memungkinkan fungsi/struct bekerja dengan banyak tipe — ditulis <code>&lt;T&gt;</code>. <strong>Trait</strong> mirip interface di bahasa lain: mendefinisikan perilaku bersama. Trait bisa memiliki implementasi default, dan tipe bisa mengimplementasikan banyak trait.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>trait.rs</div>
          <button class="run-btn" data-run="rust11">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15</div>
          <div class="code-content"><span class="tok-cm">// Definisikan trait</span>
<span class="tok-kw">trait</span> <span class="tok-var">Nilai</span> {
    <span class="tok-kw">fn</span> <span class="tok-fn">skor</span>(&amp;<span class="tok-kw">self</span>) -> <span class="tok-kw">u32</span>;
}

<span class="tok-cm">// Generic struct + trait bound</span>
<span class="tok-kw">struct</span> <span class="tok-var">Siswa</span>&lt;<span class="tok-var">T</span>: <span class="tok-var">Nilai</span>&gt; {
    <span class="tok-var">nama</span>: <span class="tok-var">String</span>,
    <span class="tok-var">nilai</span>: <span class="tok-var">T</span>,
}

<span class="tok-cm">// Implementasi trait untuk tipe berbeda</span>
<span class="tok-kw">impl</span> <span class="tok-var">Nilai</span> <span class="tok-kw">for</span> <span class="tok-kw">u32</span> {
    <span class="tok-kw">fn</span> <span class="tok-fn">skor</span>(&amp;<span class="tok-kw">self</span>) -> <span class="tok-kw">u32</span> { *<span class="tok-kw">self</span> }
}

<span class="tok-kw">fn</span> <span class="tok-fn">cetak_nilai</span>&lt;<span class="tok-var">T</span>: <span class="tok-var">Nilai</span>&gt;(<span class="tok-var">nama</span>: &amp;<span class="tok-kw">str</span>, <span class="tok-var">t</span>: <span class="tok-var">T</span>) {
    <span class="tok-fn">println!</span>(<span class="tok-str">"{}: {}"</span>, <span class="tok-var">nama</span>, <span class="tok-var">t</span>.<span class="tok-fn">skor</span>());
}

<span class="tok-fn">cetak_nilai</span>(<span class="tok-str">"Budi"</span>, <span class="tok-num">87u32</span>);
<span class="tok-fn">cetak_nilai</span>(<span class="tok-str">"Ani"</span>, <span class="tok-num">95u32</span>);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-rust11"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Gunakan <code>impl Trait</code> sebagai singkatan parameter — <code>fn foo(x: impl Display)</code> sama dengan <code>fn foo&lt;T: Display&gt;(x: T)</code> untuk satu parameter.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="rust-10">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="rust-12">Lanjut: Cargo &amp; Crates →</button>
      </div>
    </article>

    <!-- Rust Topic 12 (Final) -->
    <article class="topic-section" data-topic="rust-12">
      <div class="topic-eyebrow">TOPIK 12 / 12</div>
      <h2 class="topic-title">Cargo &amp; Crates</h2>
      <div class="topic-body">
        <p><strong>Cargo</strong> adalah package manager dan build system Rust — seperti npm untuk JS atau pip untuk Python. File <code>Cargo.toml</code> mendefinisikan metadata proyek dan <em>dependencies</em>. <strong>Crate</strong> adalah paket kode Rust (library atau binary) yang dihosting di <strong>crates.io</strong>. Cukup tambahkan nama crate di <code>Cargo.toml</code> lalu <code>cargo build</code> — semuanya otomatis diunduh dan dikompilasi.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Cargo.toml</div>
          <button class="run-btn" data-run="rust12">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15</div>
          <div class="code-content"><span class="tok-cm"># Cargo.toml — file konfigurasi proyek Rust</span>
[<span class="tok-var">package</span>]
<span class="tok-var">name</span> = <span class="tok-str">"belajar-rust"</span>
<span class="tok-var">version</span> = <span class="tok-str">"0.1.0"</span>
<span class="tok-var">edition</span> = <span class="tok-str">"2021"</span>

<span class="tok-cm"># Tambahkan dependencies dari crates.io</span>
[<span class="tok-var">dependencies</span>]
<span class="tok-var">serde</span> = { <span class="tok-var">version</span> = <span class="tok-str">"1"</span>, <span class="tok-var">features</span> = [<span class="tok-str">"derive"</span>] }
<span class="tok-var">reqwest</span> = { <span class="tok-var">version</span> = <span class="tok-str">"0.12"</span>, <span class="tok-var">features</span> = [<span class="tok-str">"json"</span>] }

<span class="tok-cm">// src/main.rs — kode utama</span>
<span class="tok-kw">use</span> <span class="tok-var">serde</span>::{<span class="tok-var">Serialize</span>, <span class="tok-var">Deserialize</span>};

#[<span class="tok-fn">derive</span>(<span class="tok-var">Serialize</span>, <span class="tok-var">Deserialize</span>)]
<span class="tok-kw">struct</span> <span class="tok-var">Modul</span> {
    <span class="tok-var">judul</span>: <span class="tok-var">String</span>,
    <span class="tok-var">skor</span>: <span class="tok-kw">u32</span>,
}

<span class="tok-kw">fn</span> <span class="tok-fn">main</span>() {
    <span class="tok-kw">let</span> <span class="tok-var">m</span> = <span class="tok-var">Modul</span> { <span class="tok-var">judul</span>: <span class="tok-str">"Rust"</span>.<span class="tok-fn">into</span>(), <span class="tok-var">skor</span>: <span class="tok-num">92</span> };
    <span class="tok-fn">println!</span>(<span class="tok-str">"JSON: {}"</span>, <span class="tok-var">serde_json</span>::<span class="tok-fn">to_string</span>(&amp;<span class="tok-var">m</span>).<span class="tok-fn">unwrap</span>());
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-rust12"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Perintah <code>cargo init</code> langsung membuat proyek baru. <code>cargo check</code> memvalidasi kode tanpa menghasilkan binary (jauh lebih cepat dari <code>cargo build</code>). Gunakan <code>cargo add serde</code> untuk menambahkan dependency dari terminal.</div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz: File apa yang berisi daftar dependencies di proyek Rust?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">package.json</button>
          <button class="quiz-opt" data-correct="true">Cargo.toml</button>
          <button class="quiz-opt" data-correct="false">Rust.toml</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="rust-11">← Sebelumnya</button>
        <button class="nav-btn primary" type="button" id="finishBtn">Selesai — Kembali ke Library </button>
      </div>
    </article>
  </section>

</main>

<script>
(function() {
  const totalTopics = 12;
  const LANGUAGE = 'rust'; // harus sama dengan key di $languages pada get_progress.php
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
  loadProgress().then(() => markDone('rust-1'));

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