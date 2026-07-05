<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>C++ — LearnBase</title>
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
        <div class="brand-sub">C++</div>
      </div>
    </div>
  </div>

  <div class="sidebar-body">
  <nav class="lang-nav" id="langNav">
    <div class="lang-tab active" data-lang="cpp">
      <span class="lang-dot" style="background:#6B4FD8"></span>
      <span class="lang-tab-text">
        <div class="lang-tab-name">C++</div>
        <div class="lang-tab-meta">12 topik</div>
      </span>
      <span class="lang-tab-pct" data-pct="cpp">0%</span>
    </div>
    <div class="topic-list" data-list="cpp">
      <div class="topic-item active" data-topic="cpp-1"><span class="topic-check"></span>Apa itu C++?</div>
      <div class="topic-item" data-topic="cpp-2"><span class="topic-check"></span>Variabel & Tipe</div>
      <div class="topic-item" data-topic="cpp-3"><span class="topic-check"></span>Kondisi & Switch</div>
      <div class="topic-item" data-topic="cpp-4"><span class="topic-check"></span>Perulangan</div>
      <div class="topic-item" data-topic="cpp-5"><span class="topic-check"></span>Array & String</div>
      <div class="topic-item" data-topic="cpp-6"><span class="topic-check"></span>Fungsi & Overloading</div>
      <div class="topic-item" data-topic="cpp-7"><span class="topic-check"></span>Pointer & Reference</div>
      <div class="topic-item" data-topic="cpp-8"><span class="topic-check"></span>Struct & Class</div>
      <div class="topic-item" data-topic="cpp-9"><span class="topic-check"></span>Inheritance</div>
      <div class="topic-item" data-topic="cpp-10"><span class="topic-check"></span>Templates</div>
      <div class="topic-item" data-topic="cpp-11"><span class="topic-check"></span>STL</div>
      <div class="topic-item" data-topic="cpp-12"><span class="topic-check"></span>File Stream</div>
    </div>
  </div>

  <div class="sidebar-foot">
    <div class="sidebar-footer-label">Progres modul kamu</div>
    <div class="progress-track"><div class="progress-fill" id="progressFill" style="width:0%"></div></div>
    <div class="sidebar-footer-num" id="progressNum">0 / 12 topik selesai</div>
  </div>
</aside>

<main class="main">

  <!-- ================= C++ ================= -->
  <section class="content-panel active" data-lang="cpp">
    <div class="lang-header">
      <div>
        <div class="lang-eyebrow">MODUL 05 · BAHASA SISTEM & PERFORMA</div>
        <h1 class="lang-title">C++</h1>
        <p class="lang-desc">Turunan dari C dengan OOP. C++ memberi kendali penuh atas memori — cocok untuk game, sistem operasi, dan aplikasi yang butuh kecepatan tinggi.</p>
      </div>
      <div class="lang-badge">C++</div>
    </div>

    <article class="topic-section active" data-topic="cpp-1">
      <div class="topic-eyebrow">TOPIK 1 / 12</div>
      <h2 class="topic-title">Apa itu C++?</h2>
      <div class="topic-body">
        <p>Kamu buka <strong>Chrome</strong> tiap hari, main <strong>Counter-Strike</strong>, atau pake <strong>Photoshop</strong>? Semuanya ditulis pakai C++! Dengan kecepatan gila dan kendali penuh atas hardware, kamu bisa bikin game kenceng, aplikasi desktop, atau program <strong>Arduino</strong>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>halo.cpp</div>
          <button class="run-btn" data-run="cpp1">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-kw">#include</span> <span class="tok-str">&lt;iostream&gt;</span>
<span class="tok-kw">using namespace</span> <span class="tok-var">std</span>;
<span class="tok-kw">int</span> <span class="tok-fn">main</span>() {
    <span class="tok-var">cout</span> &lt;&lt; <span class="tok-str">"Halo, LearnBase!"</span> &lt;&lt; <span class="tok-var">endl</span>;
    <span class="tok-kw">return</span> <span class="tok-num">0</span>;
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cpp1"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>#include &lt;iostream&gt;</code> untuk library input-output. <code>cout</code> untuk cetak, <code>endl</code> untuk baris baru.</div>
      <div class="topic-nav">
        <button class="nav-btn" disabled>← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cpp-2">Lanjut: Variabel & Tipe →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="cpp-2">
      <div class="topic-eyebrow">TOPIK 2 / 12</div>
      <h2 class="topic-title">Variabel & Tipe</h2>
      <div class="topic-body">
        <p>C++ punya tipe <code>int</code>, <code>float</code>, <code>double</code>, <code>char</code>, <code>bool</code>, dan <code>string</code> dari STL yang lebih mudah dipakai daripada array char di C.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>variabel.cpp</div>
          <button class="run-btn" data-run="cpp2">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-kw">#include</span> <span class="tok-str">&lt;iostream&gt;</span>
<span class="tok-kw">#include</span> <span class="tok-str">&lt;string&gt;</span>
<span class="tok-kw">using namespace</span> <span class="tok-var">std</span>;
<span class="tok-kw">int</span> <span class="tok-fn">main</span>() {
    <span class="tok-kw">int</span> <span class="tok-var">skor</span> = <span class="tok-num">87</span>;
    <span class="tok-var">string</span> <span class="tok-var">nama</span> = <span class="tok-str">"Java Dasar"</span>;
    <span class="tok-var">cout</span> &lt;&lt; <span class="tok-var">nama</span> &lt;&lt; <span class="tok-str">": "</span> &lt;&lt; <span class="tok-var">skor</span> &lt;&lt; <span class="tok-var">endl</span>;
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cpp2"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> <code>string</code> di C++ adalah objek — punya method seperti <code>.length()</code>.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cpp-1">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cpp-3">Lanjut: Kondisi & Switch →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="cpp-3">
      <div class="topic-eyebrow">TOPIK 3 / 12</div>
      <h2 class="topic-title">Kondisi & Switch</h2>
      <div class="topic-body">
        <p>C++ pakai <code>if/else</code> dan <code>switch</code>. <code>switch</code> efisien untuk banyak kondisi tetap.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>kondisi.cpp</div>
          <button class="run-btn" data-run="cpp3">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11</div>
          <div class="code-content"><span class="tok-kw">int</span> <span class="tok-var">nilai</span> = <span class="tok-num">85</span>;
<span class="tok-kw">if</span> (<span class="tok-var">nilai</span> >= <span class="tok-num">80</span>) { <span class="tok-var">cout</span> &lt;&lt; <span class="tok-str">"Baik"</span>; }
<span class="tok-kw">else</span> { <span class="tok-var">cout</span> &lt;&lt; <span class="tok-str">"Cukup"</span>; }
<span class="tok-kw">switch</span> (<span class="tok-var">nilai</span> / <span class="tok-num">10</span>) {
    <span class="tok-kw">case</span> <span class="tok-num">8</span>: <span class="tok-var">cout</span> &lt;&lt; <span class="tok-str">" (A)"</span>; <span class="tok-kw">break</span>;
    <span class="tok-kw">default</span>: <span class="tok-var">cout</span> &lt;&lt; <span class="tok-str">" (B)"</span>;
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cpp3"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Jangan lupa <code>break</code> di setiap <code>case</code> — tanpa itu eksekusi lanjut ke case berikutnya (<em>fall-through</em>).</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cpp-2">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cpp-4">Lanjut: Perulangan →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="cpp-4">
      <div class="topic-eyebrow">TOPIK 4 / 12</div>
      <h2 class="topic-title">Perulangan</h2>
      <div class="topic-body">
        <p>Tiga jenis perulangan: <code>for</code>, <code>while</code>, <code>do-while</code>. C++11 juga punya <em>range-based for</em>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>loop.cpp</div>
          <button class="run-btn" data-run="cpp4">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-kw">int</span> <span class="tok-var">arr</span>[] = {<span class="tok-num">1</span>, <span class="tok-num">2</span>, <span class="tok-num">3</span>};
<span class="tok-kw">for</span> (<span class="tok-kw">int</span> <span class="tok-var">i</span> = <span class="tok-num">0</span>; <span class="tok-var">i</span> &lt; <span class="tok-num">3</span>; <span class="tok-var">i</span>++) {
    <span class="tok-var">cout</span> &lt;&lt; <span class="tok-str">"Modul ke-"</span> &lt;&lt; <span class="tok-var">arr</span>[<span class="tok-var">i</span>] &lt;&lt; <span class="tok-var">endl</span>;
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cpp4"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> <em>Range-based for</em>: <code>for (int x : arr)</code> — mirip foreach di PHP.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cpp-3">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cpp-5">Lanjut: Array & String →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="cpp-5">
      <div class="topic-eyebrow">TOPIK 5 / 12</div>
      <h2 class="topic-title">Array & String</h2>
      <div class="topic-body">
        <p>Array bisa statis atau dinamis. Lebih baik pakai <code>std::string</code> daripada <code>char[]</code>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>array.cpp</div>
          <button class="run-btn" data-run="cpp5">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-kw">int</span> <span class="tok-var">angka</span>[] = {<span class="tok-num">10</span>, <span class="tok-num">20</span>, <span class="tok-num">30</span>};
<span class="tok-var">string</span> <span class="tok-var">teks</span> = <span class="tok-str">"LearnBase"</span>;
<span class="tok-var">cout</span> &lt;&lt; <span class="tok-str">"Panjang: "</span> &lt;&lt; <span class="tok-var">teks</span>.<span class="tok-fn">length</span>() &lt;&lt; <span class="tok-var">endl</span>;
<span class="tok-var">cout</span> &lt;&lt; <span class="tok-str">"Jumlah: "</span> &lt;&lt; <span class="tok-var">angka</span>[<span class="tok-num">0</span>] + <span class="tok-var">angka</span>[<span class="tok-num">2</span>];</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cpp5"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>std::vector</code> lebih fleksibel dari array biasa — ukurannya bisa berubah.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cpp-4">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cpp-6">Lanjut: Fungsi & Overloading →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="cpp-6">
      <div class="topic-eyebrow">TOPIK 6 / 12</div>
      <h2 class="topic-title">Fungsi & Overloading</h2>
      <div class="topic-body">
        <p><strong>Function overloading</strong> — membuat fungsi dengan nama sama tapi parameter berbeda. Kompiler memilih yang tepat.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>overload.cpp</div>
          <button class="run-btn" data-run="cpp6">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10</div>
          <div class="code-content"><span class="tok-kw">int</span> <span class="tok-fn">tambah</span>(<span class="tok-kw">int</span> <span class="tok-var">a</span>, <span class="tok-kw">int</span> <span class="tok-var">b</span>) { <span class="tok-kw">return</span> <span class="tok-var">a</span> + <span class="tok-var">b</span>; }
<span class="tok-kw">double</span> <span class="tok-fn">tambah</span>(<span class="tok-kw">double</span> <span class="tok-var">a</span>, <span class="tok-kw">double</span> <span class="tok-var">b</span>) { <span class="tok-kw">return</span> <span class="tok-var">a</span> + <span class="tok-var">b</span>; }
<span class="tok-var">cout</span> &lt;&lt; <span class="tok-fn">tambah</span>(<span class="tok-num">3</span>, <span class="tok-num">4</span>) &lt;&lt; <span class="tok-str">" "</span> &lt;&lt; <span class="tok-fn">tambah</span>(<span class="tok-num">2.5</span>, <span class="tok-num">3.1</span>);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cpp6"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> Overloading (parameter beda) berbeda dengan override (class induk-anak).</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cpp-5">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cpp-7">Lanjut: Pointer & Reference →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="cpp-7">
      <div class="topic-eyebrow">TOPIK 7 / 12</div>
      <h2 class="topic-title">Pointer & Reference</h2>
      <div class="topic-body">
        <p><strong>Pointer</strong> (<code>*</code>) menyimpan alamat memori. <strong>Reference</strong> (<code>&amp;</code>) adalah alias ke variabel. Pointer bisa diubah alamatnya, reference tidak.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>pointer.cpp</div>
          <button class="run-btn" data-run="cpp7">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-kw">int</span> <span class="tok-var">nilai</span> = <span class="tok-num">42</span>;
<span class="tok-kw">int</span>* <span class="tok-var">ptr</span> = &amp;<span class="tok-var">nilai</span>;
<span class="tok-kw">int</span>&amp; <span class="tok-var">ref</span> = <span class="tok-var">nilai</span>;
<span class="tok-var">cout</span> &lt;&lt; <span class="tok-str">"Pointer: "</span> &lt;&lt; *<span class="tok-var">ptr</span> &lt;&lt; <span class="tok-var">endl</span>;
<span class="tok-var">cout</span> &lt;&lt; <span class="tok-str">"Reference: "</span> &lt;&lt; <span class="tok-var">ref</span>;</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cpp7"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Di C++ modern, pakai <em>smart pointer</em> (<code>unique_ptr</code>, <code>shared_ptr</code>) — memori dibersihkan otomatis.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cpp-6">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cpp-8">Lanjut: Struct & Class →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="cpp-8">
      <div class="topic-eyebrow">TOPIK 8 / 12</div>
      <h2 class="topic-title">Struct & Class</h2>
      <div class="topic-body">
        <p><code>struct</code> dan <code>class</code> hampir sama — bedanya akses default: <code>struct</code> = <code>public</code>, <code>class</code> = <code>private</code>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>class.cpp</div>
          <button class="run-btn" data-run="cpp8">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11</div>
          <div class="code-content"><span class="tok-kw">class</span> <span class="tok-var">Siswa</span> {
    <span class="tok-kw">public</span>:
        <span class="tok-var">string</span> <span class="tok-var">nama</span>; <span class="tok-kw">int</span> <span class="tok-var">skor</span>;
        <span class="tok-fn">Siswa</span>(<span class="tok-var">string</span> <span class="tok-var">n</span>, <span class="tok-kw">int</span> <span class="tok-var">s</span>) { <span class="tok-var">nama</span> = <span class="tok-var">n</span>; <span class="tok-var">skor</span> = <span class="tok-var">s</span>; }
};
<span class="tok-var">Siswa</span> <span class="tok-var">s</span>(<span class="tok-str">"Budi"</span>, <span class="tok-num">87</span>);
<span class="tok-var">cout</span> &lt;&lt; <span class="tok-var">s</span>.<span class="tok-var">nama</span> &lt;&lt; <span class="tok-str">": "</span> &lt;&lt; <span class="tok-var">s</span>.<span class="tok-var">skor</span>;</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cpp8"></div>
        </div>
      </div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz: Perbedaan struct vs class di C++?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="true">Default akses: struct public, class private</button>
          <button class="quiz-opt" data-correct="false">struct tidak bisa punya method</button>
          <button class="quiz-opt" data-correct="false">class tidak punya data member</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cpp-7">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cpp-9">Lanjut: Inheritance →</button>
      </div>
    </article>

    <!-- C++ Topic 9 -->
    <article class="topic-section" data-topic="cpp-9">
      <div class="topic-eyebrow">TOPIK 9 / 12</div>
      <h2 class="topic-title">Inheritance</h2>
      <div class="topic-body">
        <p><strong>Inheritance</strong> memungkinkan sebuah class mewarisi properti dan method dari class lain. Class induk disebut <em>base class</em>, class turunan disebut <em>derived class</em>. C++ mendukung <strong>multiple inheritance</strong> — satu class bisa mewarisi lebih dari satu class induk.</p>
        <p>Gunakan notasi <code>class Turunan : akses Induk</code>. Akses <code>public</code> mempertahankan akses asli, <code>protected</code> menurunkan semua ke protected, <code>private</code> menyembunyikan semuanya. Virtual inheritance menyelesaikan masalah <em>diamond problem</em> pada multiple inheritance.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>inheritance.cpp</div>
          <button class="run-btn" data-run="cpp9">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15</div>
          <div class="code-content"><span class="tok-kw">#include</span> <span class="tok-str">&lt;iostream&gt;</span>
<span class="tok-kw">#include</span> <span class="tok-str">&lt;string&gt;</span>
<span class="tok-kw">using namespace</span> <span class="tok-var">std</span>;

<span class="tok-kw">class</span> <span class="tok-var">Materi</span> {
<span class="tok-kw">public</span>:
    <span class="tok-var">string</span> <span class="tok-var">judul</span>;
    <span class="tok-fn">Materi</span>(<span class="tok-var">string</span> <span class="tok-var">j</span>) { <span class="tok-var">judul</span> = <span class="tok-var">j</span>; }
    <span class="tok-kw">virtual void</span> <span class="tok-fn">cetak</span>() {
        <span class="tok-var">cout</span> &lt;&lt; <span class="tok-str">"Materi: "</span> &lt;&lt; <span class="tok-var">judul</span> &lt;&lt; <span class="tok-var">endl</span>;
    }
};

<span class="tok-kw">class</span> <span class="tok-var">Video</span> : <span class="tok-kw">public</span> <span class="tok-var">Materi</span> {
<span class="tok-kw">public</span>:
    <span class="tok-kw">int</span> <span class="tok-var">durasi</span>;
    <span class="tok-fn">Video</span>(<span class="tok-var">string</span> <span class="tok-var">j</span>, <span class="tok-kw">int</span> <span class="tok-var">d</span>) : <span class="tok-fn">Materi</span>(<span class="tok-var">j</span>) { <span class="tok-var">durasi</span> = <span class="tok-var">d</span>; }
    <span class="tok-kw">void</span> <span class="tok-fn">cetak</span>() <span class="tok-kw">override</span> {
        <span class="tok-var">cout</span> &lt;&lt; <span class="tok-str">"[Video] "</span> &lt;&lt; <span class="tok-var">judul</span> &lt;&lt; <span class="tok-str">" ("</span> &lt;&lt; <span class="tok-var">durasi</span> &lt;&lt; <span class="tok-str">" menit)"</span> &lt;&lt; <span class="tok-var">endl</span>;
    }
};

<span class="tok-var">Video</span> <span class="tok-var">v</span>(<span class="tok-str">"Templates C++"</span>, <span class="tok-num">15</span>);
<span class="tok-var">v</span>.<span class="tok-fn">cetak</span>();</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cpp9"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Gunakan <code>virtual</code> untuk method yang bisa di-<em>override</em>. Keyword <code>override</code> (C++11) membantu kompiler memeriksa apakah method benar-benar menimpa method induk.</div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz: Keyword untuk menandai method yang bisa di-override di class turunan?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="true"><code>virtual</code></button>
          <button class="quiz-opt" data-correct="false"><code>overridable</code></button>
          <button class="quiz-opt" data-correct="false"><code>inherit</code></button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cpp-8">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cpp-10">Lanjut: Templates →</button>
      </div>
    </article>

    <!-- C++ Topic 10 -->
    <article class="topic-section" data-topic="cpp-10">
      <div class="topic-eyebrow">TOPIK 10 / 12</div>
      <h2 class="topic-title">Templates</h2>
      <div class="topic-body">
        <p><strong>Templates</strong> adalah fitur yang memungkinkan kita menulis kode <em>generik</em> — satu fungsi atau class bisa bekerja dengan berbagai tipe data tanpa menulis ulang. C++ template adalah dasar dari <strong>generic programming</strong> dan digunakan luas di STL (Standard Template Library).</p>
        <p>Ada dua jenis template: <strong>function template</strong> untuk fungsi generik, dan <strong>class template</strong> untuk class generik. Template diproses saat kompilasi (<em>compile-time polymorphism</em>) — tidak ada overhead runtime. Kamu bisa juga menspesialisasikan template untuk tipe tertentu (<em>template specialization</em>).</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>template.cpp</div>
          <button class="run-btn" data-run="cpp10">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15<br>16<br>17<br>18</div>
          <div class="code-content"><span class="tok-kw">#include</span> <span class="tok-str">&lt;iostream&gt;</span>
<span class="tok-kw">#include</span> <span class="tok-str">&lt;string&gt;</span>
<span class="tok-kw">using namespace</span> <span class="tok-var">std</span>;

<span class="tok-cm">// Function template</span>
<span class="tok-kw">template</span> &lt;<span class="tok-kw">typename</span> <span class="tok-var">T</span>&gt;
<span class="tok-var">T</span> <span class="tok-fn">maks</span>(<span class="tok-var">T</span> <span class="tok-var">a</span>, <span class="tok-var">T</span> <span class="tok-var">b</span>) {
    <span class="tok-kw">return</span> (<span class="tok-var">a</span> &gt; <span class="tok-var">b</span>) ? <span class="tok-var">a</span> : <span class="tok-var">b</span>;
}

<span class="tok-cm">// Class template</span>
<span class="tok-kw">template</span> &lt;<span class="tok-kw">typename</span> <span class="tok-var">T</span>&gt;
<span class="tok-kw">class</span> <span class="tok-var">Kotak</span> {
<span class="tok-kw">public</span>:
    <span class="tok-var">T</span> <span class="tok-var">isi</span>;
    <span class="tok-fn">Kotak</span>(<span class="tok-var">T</span> <span class="tok-var">i</span>) { <span class="tok-var">isi</span> = <span class="tok-var">i</span>; }
    <span class="tok-kw">void</span> <span class="tok-fn">tampil</span>() {
        <span class="tok-var">cout</span> &lt;&lt; <span class="tok-str">"Isi: "</span> &lt;&lt; <span class="tok-var">isi</span> &lt;&lt; <span class="tok-var">endl</span>;
    }
};

<span class="tok-var">cout</span> &lt;&lt; <span class="tok-fn">maks</span>(<span class="tok-num">10</span>, <span class="tok-num">25</span>) &lt;&lt; <span class="tok-str">" "</span>;
<span class="tok-var">cout</span> &lt;&lt; <span class="tok-fn">maks</span>(<span class="tok-num">3.14</span>, <span class="tok-num">2.71</span>) &lt;&lt; <span class="tok-str">" "</span>;
<span class="tok-var">Kotak</span>&lt;<span class="tok-kw">int</span>&gt; <span class="tok-var">k1</span>(<span class="tok-num">42</span>);
<span class="tok-var">Kotak</span>&lt;<span class="tok-var">string</span>&gt; <span class="tok-var">k2</span>(<span class="tok-str">"Hello"</span>);
<span class="tok-var">k1</span>.<span class="tok-fn">tampil</span>(); <span class="tok-var">k2</span>.<span class="tok-fn">tampil</span>();</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cpp10"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> Template berbeda dengan <em>generics</em> di Java/C#. Di C++, template diinstansiasi saat kompilasi (bukan runtime), sehingga setiap tipe menghasilkan kode terpisah. Ini disebut <strong>zero-cost abstraction</strong> — tidak ada overhead abstraksi.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cpp-9">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cpp-11">Lanjut: STL →</button>
      </div>
    </article>

    <!-- C++ Topic 11 -->
    <article class="topic-section" data-topic="cpp-11">
      <div class="topic-eyebrow">TOPIK 11 / 12</div>
      <h2 class="topic-title">STL</h2>
      <div class="topic-body">
        <p><strong>STL (Standard Template Library)</strong> adalah kumpulan template class dan function siap pakai untuk C++. Komponen utamanya: <strong>Container</strong> (vector, map, set), <strong>Iterator</strong>, dan <strong>Algorithm</strong> (sort, find). STL menghemat waktu dan sudah teruji performanya.</p>
        <p>Container yang paling populer: <code>vector</code> (array dinamis), <code>map</code> (key-value), <code>set</code> (himpunan unik). Semua container bisa diakses dengan iterator — pointer generik yang menunjuk ke elemen container. Fungsi algoritma seperti <code>sort()</code> dan <code>find()</code> bekerja di container mana pun yang punya iterator.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>stl.cpp</div>
          <button class="run-btn" data-run="cpp11">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14</div>
          <div class="code-content"><span class="tok-kw">#include</span> <span class="tok-str">&lt;iostream&gt;</span>
<span class="tok-kw">#include</span> <span class="tok-str">&lt;vector&gt;</span>
<span class="tok-kw">#include</span> <span class="tok-str">&lt;algorithm&gt;</span>
<span class="tok-kw">using namespace</span> <span class="tok-var">std</span>;

<span class="tok-kw">int</span> <span class="tok-fn">main</span>() {
    <span class="tok-var">vector</span>&lt;<span class="tok-kw">int</span>&gt; <span class="tok-var">angka</span> = {<span class="tok-num">5</span>, <span class="tok-num">2</span>, <span class="tok-num">8</span>, <span class="tok-num">1</span>};
    <span class="tok-fn">sort</span>(<span class="tok-var">angka</span>.<span class="tok-fn">begin</span>(), <span class="tok-var">angka</span>.<span class="tok-fn">end</span>());

    <span class="tok-kw">for</span> (<span class="tok-kw">int</span> <span class="tok-var">x</span> : <span class="tok-var">angka</span>) {
        <span class="tok-var">cout</span> &lt;&lt; <span class="tok-var">x</span> &lt;&lt; <span class="tok-str">" "</span>;
    }
    <span class="tok-var">cout</span> &lt;&lt; <span class="tok-var">endl</span>;
    <span class="tok-kw">return</span> <span class="tok-num">0</span>;
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cpp11"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>vector</code> adalah container serbaguna — gunakan <code>push_back()</code> untuk menambah elemen, <code>size()</code> untuk ukuran, <code>sort()</code> dari <code>&lt;algorithm&gt;</code> untuk mengurutkan.</div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz: Header untuk vector di C++ STL?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="true"><code>#include &lt;vector&gt;</code></button>
          <button class="quiz-opt" data-correct="false"><code>#include &lt;list&gt;</code></button>
          <button class="quiz-opt" data-correct="false"><code>#include &lt;array&gt;</code></button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cpp-10">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cpp-12">Lanjut: File Stream →</button>
      </div>
    </article>

    <!-- C++ Topic 12 -->
    <article class="topic-section" data-topic="cpp-12">
      <div class="topic-eyebrow">TOPIK 12 / 12</div>
      <h2 class="topic-title">File Stream</h2>
      <div class="topic-body">
        <p><strong>File stream</strong> memungkinkan program C++ membaca dan menulis file eksternal. Tiga class utama: <code>ofstream</code> (output file), <code>ifstream</code> (input file), <code>fstream</code> (input/output). Semua ada di header <code>&lt;fstream&gt;</code>.</p>
        <p>Membuka file dengan <code>.open()</code> atau langsung di konstruktor. Menulis dengan operator <code>&lt;&lt;</code> seperti <code>cout</code>. Membaca dengan <code>&gt;&gt;</code> atau <code>getline()</code>. Selalu tutup file dengan <code>.close()</code> setelah selesai — menjamin data tersimpan dan sumber daya dilepaskan.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>filestream.cpp</div>
          <button class="run-btn" data-run="cpp12">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15<br>16<br>17<br>18<br>19</div>
          <div class="code-content"><span class="tok-kw">#include</span> <span class="tok-str">&lt;iostream&gt;</span>
<span class="tok-kw">#include</span> <span class="tok-str">&lt;fstream&gt;</span>
<span class="tok-kw">#include</span> <span class="tok-str">&lt;string&gt;</span>
<span class="tok-kw">using namespace</span> <span class="tok-var">std</span>;

<span class="tok-kw">int</span> <span class="tok-fn">main</span>() {
    <span class="tok-cm">// Menulis ke file</span>
    <span class="tok-var">ofstream</span> <span class="tok-var">out</span>(<span class="tok-str">"nilai.txt"</span>);
    <span class="tok-var">out</span> &lt;&lt; <span class="tok-str">"C++: 87"</span> &lt;&lt; <span class="tok-var">endl</span>;
    <span class="tok-var">out</span> &lt;&lt; <span class="tok-str">"Java: 92"</span> &lt;&lt; <span class="tok-var">endl</span>;
    <span class="tok-var">out</span>.<span class="tok-fn">close</span>();

    <span class="tok-cm">// Membaca dari file</span>
    <span class="tok-var">ifstream</span> <span class="tok-var">in</span>(<span class="tok-str">"nilai.txt"</span>);
    <span class="tok-var">string</span> <span class="tok-var">baris</span>;
    <span class="tok-kw">while</span> (<span class="tok-fn">getline</span>(<span class="tok-var">in</span>, <span class="tok-var">baris</span>)) {
        <span class="tok-var">cout</span> &lt;&lt; <span class="tok-var">baris</span> &lt;&lt; <span class="tok-var">endl</span>;
    }
    <span class="tok-var">in</span>.<span class="tok-fn">close</span>();

    <span class="tok-kw">return</span> <span class="tok-num">0</span>;
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cpp12"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> Selain <code>&lt;&lt;</code>/<code>&gt;&gt;</code>, kamu bisa baca file per baris dengan <code>getline(stream, variabel)</code>. Jangan lupa <code>.close()</code> — ini menjamin buffer ditulis ke disk.</div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz: Header apa untuk file stream di C++?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="true"><code>#include &lt;fstream&gt;</code></button>
          <button class="quiz-opt" data-correct="false"><code>#include &lt;file&gt;</code></button>
          <button class="quiz-opt" data-correct="false"><code>#include &lt;stream&gt;</code></button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cpp-11">← Sebelumnya</button>
        <button class="nav-btn primary" type="button" id="finishBtn">Selesai — Kembali ke Library </button>
      </div>
    </article>
  </section>

</main>

<script>
(function() {
  const totalTopics = 12;
  const LANGUAGE = 'cpp'; // harus sama dengan key di $languages pada get_progress.php
  const completed = new Set();
  let celebrated = false;

  function setActiveTopic(topicId) {
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
  loadProgress().then(() => markDone('cpp-1'));

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