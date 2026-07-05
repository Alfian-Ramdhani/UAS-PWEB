<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Java — LearnBase</title>
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
        <div class="brand-sub">Java</div>
      </div>
    </div>
  </div>

  <div class="sidebar-body">
  <nav class="lang-nav" id="langNav">
    <div class="lang-tab active" data-lang="java">
      <span class="lang-dot" style="background:#6B4FD8"></span>
      <span class="lang-tab-text">
        <div class="lang-tab-name">Java</div>
        <div class="lang-tab-meta">12 topik</div>
      </span>
      <span class="lang-tab-pct" data-pct="java">0%</span>
    </div>
    <div class="topic-list" data-list="java">
      <div class="topic-item active" data-topic="java-1"><span class="topic-check"></span>Apa itu Java?</div>
      <div class="topic-item" data-topic="java-2"><span class="topic-check"></span>Variabel & Tipe Data</div>
      <div class="topic-item" data-topic="java-3"><span class="topic-check"></span>Kondisi & Perulangan</div>
      <div class="topic-item" data-topic="java-4"><span class="topic-check"></span>Method & Class</div>
      <div class="topic-item" data-topic="java-5"><span class="topic-check"></span>Constructor & Object</div>
      <div class="topic-item" data-topic="java-6"><span class="topic-check"></span>Array & ArrayList</div>
      <div class="topic-item" data-topic="java-7"><span class="topic-check"></span>Inheritance</div>
      <div class="topic-item" data-topic="java-8"><span class="topic-check"></span>Exception Handling</div>
      <div class="topic-item" data-topic="java-9"><span class="topic-check"></span>Package & Import</div>
      <div class="topic-item" data-topic="java-10"><span class="topic-check"></span>Polymorphism</div>
      <div class="topic-item" data-topic="java-11"><span class="topic-check"></span>Abstract & Interface</div>
      <div class="topic-item" data-topic="java-12"><span class="topic-check"></span>File I/O</div>
    </div>
  </div>

  <div class="sidebar-foot">
    <div class="sidebar-footer-label">Progres modul kamu</div>
    <div class="progress-track"><div class="progress-fill" id="progressFill" style="width:0%"></div></div>
    <div class="sidebar-footer-num" id="progressNum">0 / 12 topik selesai</div>
  </div>
</aside>

<main class="main">

  <!-- ================= JAVA ================= -->
  <section class="content-panel active" data-lang="java">
    <div class="lang-header">
      <div>
        <div class="lang-eyebrow">MODUL 04 · BAHASA OBJEK & ENTERPRISE</div>
        <h1 class="lang-title">Java</h1>
        <p class="lang-desc">Bahasa berorientasi objek yang tangguh dan portable — kodenya bisa jalan di mana saja berkat JVM. Banyak dipakai untuk aplikasi Android, backend enterprise, dan sistem seperti perbankan.</p>
      </div>
      <div class="lang-badge">JV</div>
    </div>

    <article class="topic-section active" data-topic="java-1">
      <div class="topic-eyebrow">TOPIK 1 / 12</div>
      <h2 class="topic-title">Apa itu Java?</h2>
      <div class="topic-body">
        <p>Pernah pakai aplikasi <strong>Mobile Banking</strong> atau <strong>Tokopedia</strong>? Di belakang layar, Java lah yang menggerakkan logika transaksi, keamanan data, dan jutaan request tiap detik. Java adalah bahasa <strong>berorientasi objek</strong> yang kode-nya dikompilasi jadi <em>bytecode</em> — cukup tulis sekali, jalankan di mana pun lewat JVM.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Halo.java</div>
          <button class="run-btn" data-run="java1">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5</div>
          <div class="code-content"><span class="tok-kw">public class</span> <span class="tok-var">Halo</span> {
    <span class="tok-kw">public static void</span> <span class="tok-fn">main</span>(<span class="tok-var">String[]</span> <span class="tok-var">args</span>) {
        <span class="tok-var">String</span> <span class="tok-var">nama</span> = <span class="tok-str">"LearnBase"</span>;
        <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"Halo, "</span> + <span class="tok-var">nama</span>);
    }
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-java1"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> Nama file harus sama persis dengan nama class utama — <code>Halo</code> harus di <code>Halo.java</code>.</div>
      <div class="topic-nav">
        <button class="nav-btn" disabled>← Sebelumnya</button>
        <button class="nav-btn primary" data-next="java-2">Lanjut: Variabel & Tipe Data →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="java-2">
      <div class="topic-eyebrow">TOPIK 2 / 12</div>
      <h2 class="topic-title">Variabel & Tipe Data</h2>
      <div class="topic-body">
        <p>Java itu <strong>statically typed</strong> — setiap variabel harus dideklarasikan dengan tipe. Tipe primitif: <code>int</code>, <code>double</code>, <code>boolean</code>, <code>char</code>, plus tipe objek <code>String</code>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Variabel.java</div>
          <button class="run-btn" data-run="java2">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-kw">int</span> <span class="tok-var">skor</span> = <span class="tok-num">87</span>;
<span class="tok-var">String</span> <span class="tok-var">namaModul</span> = <span class="tok-str">"Java Dasar"</span>;
<span class="tok-kw">boolean</span> <span class="tok-var">lulus</span> = <span class="tok-var">skor</span> >= <span class="tok-num">70</span>;
<span class="tok-kw">double</span> <span class="tok-var">rata</span> = <span class="tok-num">85.5</span>;
<span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-var">namaModul</span> + <span class="tok-str">" - "</span> + <span class="tok-var">lulus</span>);
<span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"Rata: "</span> + <span class="tok-var">rata</span>);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-java2"></div>
        </div>
      </div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz singkat: Siapa yang menjalankan bytecode Java?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">Browser</button>
          <button class="quiz-opt" data-correct="true">JVM (Java Virtual Machine)</button>
          <button class="quiz-opt" data-correct="false">Operating System</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="java-1">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="java-3">Lanjut: Kondisi & Perulangan →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="java-3">
      <div class="topic-eyebrow">TOPIK 3 / 12</div>
      <h2 class="topic-title">Kondisi & Perulangan</h2>
      <div class="topic-body">
        <p>Java punya <code>if/else</code>, <code>switch</code>, <code>for</code>, <code>while</code> — sintaksnya mirip JavaScript karena JS memang terinspirasi dari Java.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Kondisi.java</div>
          <button class="run-btn" data-run="java3">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</div>
          <div class="code-content"><span class="tok-kw">int</span> <span class="tok-var">nilai</span> = <span class="tok-num">85</span>;
<span class="tok-kw">if</span> (<span class="tok-var">nilai</span> >= <span class="tok-num">90</span>) { <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"A"</span>); }
<span class="tok-kw">else if</span> (<span class="tok-var">nilai</span> >= <span class="tok-num">80</span>) { <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"B"</span>); }
<span class="tok-kw">else</span> { <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"C"</span>); }
<span class="tok-kw">for</span> (<span class="tok-kw">int</span> <span class="tok-var">i</span> = <span class="tok-num">1</span>; <span class="tok-var">i</span> <= <span class="tok-num">3</span>; <span class="tok-var">i</span>++) {
    <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"Modul ke-"</span> + <span class="tok-var">i</span>);
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-java3"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Kurung <code>()</code> di <code>if</code> wajib di Java. Kurung kurawal <code>{}</code> bisa dihilangkan untuk satu baris.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="java-2">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="java-4">Lanjut: Method & Class →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="java-4">
      <div class="topic-eyebrow">TOPIK 4 / 12</div>
      <h2 class="topic-title">Method & Class</h2>
      <div class="topic-body">
        <p><strong>Class</strong> adalah cetak biru untuk objek. <strong>Method</strong> adalah fungsi dalam class. Method <code>main()</code> adalah titik masuk program Java.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Method.java</div>
          <button class="run-btn" data-run="java4">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</div>
          <div class="code-content"><span class="tok-kw">public class</span> <span class="tok-var">Method</span> {
    <span class="tok-kw">static void</span> <span class="tok-fn">sapa</span>(<span class="tok-var">String</span> <span class="tok-var">nama</span>) {
        <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"Halo "</span> + <span class="tok-var">nama</span>);
    }
    <span class="tok-kw">public static void</span> <span class="tok-fn">main</span>(<span class="tok-var">String[]</span> <span class="tok-var">args</span>) {
        <span class="tok-fn">sapa</span>(<span class="tok-str">"LearnBase"</span>);
    }
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-java4"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> <code>static</code> berarti method bisa dipanggil tanpa membuat objek. <code>void</code> berarti tidak mengembalikan nilai.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="java-3">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="java-5">Lanjut: Constructor & Object →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="java-5">
      <div class="topic-eyebrow">TOPIK 5 / 12</div>
      <h2 class="topic-title">Constructor & Object</h2>
      <div class="topic-body">
        <p><strong>Constructor</strong> dipanggil saat <code>new</code> membuat objek. Namanya sama dengan class, tanpa tipe kembalian.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Mahasiswa.java</div>
          <button class="run-btn" data-run="java5">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13</div>
          <div class="code-content"><span class="tok-kw">public class</span> <span class="tok-var">Mahasiswa</span> {
    <span class="tok-var">String</span> <span class="tok-var">nama</span>; <span class="tok-kw">int</span> <span class="tok-var">skor</span>;
    <span class="tok-fn">Mahasiswa</span>(<span class="tok-var">String</span> <span class="tok-var">nama</span>, <span class="tok-kw">int</span> <span class="tok-var">skor</span>) {
        <span class="tok-kw">this</span>.<span class="tok-var">nama</span> = <span class="tok-var">nama</span>; <span class="tok-kw">this</span>.<span class="tok-var">skor</span> = <span class="tok-var">skor</span>;
    }
    <span class="tok-kw">public static void</span> <span class="tok-fn">main</span>(<span class="tok-var">String[]</span> <span class="tok-var">args</span>) {
        <span class="tok-var">Mahasiswa</span> <span class="tok-var">m</span> = <span class="tok-kw">new</span> <span class="tok-fn">Mahasiswa</span>(<span class="tok-str">"Budi"</span>, <span class="tok-num">87</span>);
        <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-var">m</span>.<span class="tok-var">nama</span> + <span class="tok-str">": "</span> + <span class="tok-var">m</span>.<span class="tok-var">skor</span>);
    }
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-java5"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>this</code> merujuk ke objek saat ini, membedakan field dengan parameter yang namanya sama.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="java-4">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="java-6">Lanjut: Array & ArrayList →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="java-6">
      <div class="topic-eyebrow">TOPIK 6 / 12</div>
      <h2 class="topic-title">Array & ArrayList</h2>
      <div class="topic-body">
        <p>Array di Java ukurannya tetap. <strong>ArrayList</strong> dari <code>java.util</code> bisa berubah ukuran — pakai <code>add()</code>, <code>get()</code>, <code>size()</code>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>ArrayList.java</div>
          <button class="run-btn" data-run="java6">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10</div>
          <div class="code-content"><span class="tok-kw">import</span> <span class="tok-var">java.util.ArrayList</span>;
<span class="tok-kw">public class</span> <span class="tok-var">ArrayList</span> {
    <span class="tok-kw">public static void</span> <span class="tok-fn">main</span>(<span class="tok-var">String[]</span> <span class="tok-var">args</span>) {
        <span class="tok-var">ArrayList</span>&lt;<span class="tok-var">String</span>&gt; <span class="tok-var">modul</span> = <span class="tok-kw">new</span> <span class="tok-var">ArrayList</span>&lt;&gt;();
        <span class="tok-var">modul</span>.<span class="tok-fn">add</span>(<span class="tok-str">"Java Dasar"</span>);
        <span class="tok-var">modul</span>.<span class="tok-fn">add</span>(<span class="tok-str">"OOP"</span>);
        <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-var">modul</span>.<span class="tok-fn">size</span>() + <span class="tok-str">" modul"</span>);
    }
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-java6"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> <code>ArrayList&lt;String&gt;</code> pakai <em>generic</em> — menentukan tipe data yang bisa disimpan, memberikan keamanan tipe.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="java-5">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="java-7">Lanjut: Inheritance →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="java-7">
      <div class="topic-eyebrow">TOPIK 7 / 12</div>
      <h2 class="topic-title">Inheritance</h2>
      <div class="topic-body">
        <p><strong>Inheritance</strong> mewarisi field dan method dari class lain. Keyword <code>extends</code> untuk menunjukkan class induk — pilar utama OOP.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Turunan.java</div>
          <button class="run-btn" data-run="java7">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12</div>
          <div class="code-content"><span class="tok-kw">class</span> <span class="tok-var">Pengguna</span> {
    <span class="tok-var">String</span> <span class="tok-var">email</span>;
    <span class="tok-kw">void</span> <span class="tok-fn">login</span>() { <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"Login: "</span> + <span class="tok-var">email</span>); }
}
<span class="tok-kw">class</span> <span class="tok-var">Siswa</span> <span class="tok-kw">extends</span> <span class="tok-var">Pengguna</span> {
    <span class="tok-kw">int</span> <span class="tok-var">skor</span>;
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-java7"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Pakai <code>@Override</code> di atas method yang ditimpa — membantu kompiler memeriksa apakah method induk benar-benar ada.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="java-6">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="java-8">Lanjut: Exception Handling →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="java-8">
      <div class="topic-eyebrow">TOPIK 8 / 12</div>
      <h2 class="topic-title">Exception Handling</h2>
      <div class="topic-body">
        <p><strong>Exception</strong> adalah error saat program berjalan. Java mewajibkan penanganan exception dengan <code>try/catch</code> untuk mencegah crash.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Exception.java</div>
          <button class="run-btn" data-run="java8">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</div>
          <div class="code-content"><span class="tok-kw">public class</span> <span class="tok-var">Exception</span> {
    <span class="tok-kw">public static void</span> <span class="tok-fn">main</span>(<span class="tok-var">String[]</span> <span class="tok-var">args</span>) {
        <span class="tok-kw">try</span> {
            <span class="tok-kw">int</span> <span class="tok-var">hasil</span> = <span class="tok-num">10</span> / <span class="tok-num">0</span>;
        } <span class="tok-kw">catch</span> (<span class="tok-var">ArithmeticException</span> <span class="tok-var">e</span>) {
            <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"Error: "</span> + <span class="tok-var">e</span>.<span class="tok-fn">getMessage</span>());
        }
    }
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-java8"></div>
        </div>
      </div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz: Keyword apa untuk mewarisi class di Java?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">implements</button>
          <button class="quiz-opt" data-correct="true">extends</button>
          <button class="quiz-opt" data-correct="false">inherit</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="java-7">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="java-9">Lanjut: Package & Import →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="java-9">
      <div class="topic-eyebrow">TOPIK 9 / 12</div>
      <h2 class="topic-title">Package & Import</h2>
      <div class="topic-body">
        <p><strong>Package</strong> adalah folder logis untuk mengelompokkan class Java. <strong>Import</strong> digunakan untuk memanggil class dari package lain tanpa menulis nama lengkapnya. Deklarasi <code>package</code> harus berada di baris pertama file, sedangkan <code>import</code> ditulis setelahnya.</p>
        <p>Penulisan package menggunakan notasi <strong>hierarki titik</strong> — misalnya <code>com.learnbase.model</code>. Package membantu menghindari konflik nama dan memudahkan organisasi kode pada proyek besar.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Paket.java</div>
          <button class="run-btn" data-run="java9">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12</div>
          <div class="code-content"><span class="tok-kw">package</span> <span class="tok-var">belajar</span>;

<span class="tok-kw">import</span> <span class="tok-var">java.util.Scanner</span>;

<span class="tok-kw">public class</span> <span class="tok-var">Paket</span> {
    <span class="tok-kw">public static void</span> <span class="tok-fn">main</span>(<span class="tok-var">String[]</span> <span class="tok-var">args</span>) {
        <span class="tok-var">Scanner</span> <span class="tok-var">sc</span> = <span class="tok-kw">new</span> <span class="tok-fn">Scanner</span>(<span class="tok-str">"LearnBase"</span>);
        <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"Package: belajar"</span>);
        <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"Data: "</span> + <span class="tok-var">sc</span>.<span class="tok-fn">next</span>());
        <span class="tok-var">sc</span>.<span class="tok-fn">close</span>();
    }
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-java9"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> <code>package</code> adalah baris <em>pertama</em> yang wajib ditulis jika menggunakan package. <code>import</code> ditulis setelah <code>package</code>. Gunakan wildcard <code>import java.util.*;</code> untuk mengimpor semua class dalam satu package, tapi sebaiknya hindari di kode produksi agar lebih eksplisit.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="java-8">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="java-10">Lanjut: Polymorphism →</button>
      </div>
    </article>

    <!-- Java Topic 10 -->
    <article class="topic-section" data-topic="java-10">
      <div class="topic-eyebrow">TOPIK 10 / 12</div>
      <h2 class="topic-title">Polymorphism</h2>
      <div class="topic-body">
        <p><strong>Polymorphism</strong> berarti "banyak bentuk" — satu method bisa memiliki perilaku berbeda tergantung objek yang memanggilnya. Di Java, ini diwujudkan melalui <em>method overloading</em> (compile-time) dan <em>method overriding</em> (runtime).</p>
        <p><em>Overloading</em>: beberapa method dengan nama sama tapi parameter berbeda dalam satu class. <em>Overriding</em>: subclass menulis ulang method dari superclass. Polymorphism memungkinkan kode lebih fleksibel dan mudah diperluas.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Polymorphism.java</div>
          <button class="run-btn" data-run="java10">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15<br>16<br>17</div>
          <div class="code-content"><span class="tok-kw">class</span> <span class="tok-var">Hewan</span> {
    <span class="tok-kw">void</span> <span class="tok-fn">suara</span>() { <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"..."</span>); }
}
<span class="tok-kw">class</span> <span class="tok-var">Kucing</span> <span class="tok-kw">extends</span> <span class="tok-var">Hewan</span> {
    <span class="tok-kw">void</span> <span class="tok-fn">suara</span>() { <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"Meow!"</span>); }
}
<span class="tok-kw">class</span> <span class="tok-var">Anjing</span> <span class="tok-kw">extends</span> <span class="tok-var">Hewan</span> {
    <span class="tok-kw">void</span> <span class="tok-fn">suara</span>() { <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"Guk!"</span>); }
}

<span class="tok-kw">public class</span> <span class="tok-var">Polymorphism</span> {
    <span class="tok-kw">public static void</span> <span class="tok-fn">main</span>(<span class="tok-var">String[]</span> <span class="tok-var">args</span>) {
        <span class="tok-var">Hewan</span> <span class="tok-var">h</span> = <span class="tok-kw">new</span> <span class="tok-fn">Kucing</span>();
        <span class="tok-var">h</span>.<span class="tok-fn">suara</span>(); <span class="tok-cm">// Meow!</span>
        <span class="tok-var">h</span> = <span class="tok-kw">new</span> <span class="tok-fn">Anjing</span>();
        <span class="tok-var">h</span>.<span class="tok-fn">suara</span>(); <span class="tok-cm">// Guk!</span>
    }
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-java10"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Polimorfisme runtime terjadi karena method dipanggil berdasarkan tipe objek asli (<em>runtime type</em>), bukan tipe referensi (<em>compile-time type</em>). Inilah inti dari dynamic binding.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="java-9">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="java-11">Lanjut: Abstract & Interface →</button>
      </div>
    </article>

    <!-- Java Topic 11 (Abstract & Interface) -->
    <article class="topic-section" data-topic="java-11">
      <div class="topic-eyebrow">TOPIK 11 / 12</div>
      <h2 class="topic-title">Abstract & Interface</h2>
      <div class="topic-body">
        <p><strong>Abstract class</strong> adalah class yang tidak bisa diinstansiasi langsung — fungsinya sebagai kerangka dasar (blueprint) untuk subclass. Method abstract hanya deklarasi tanpa implementasi; subclass <em>wajib</em> meng-override method tersebut.</p>
        <p><strong>Interface</strong> adalah kontrak penuh — semua method di interface otomatis <code>public abstract</code> (sebelum Java 8). Sebuah class bisa <code>implements</code> lebih dari satu interface, berbeda dengan <code>extends</code> yang hanya satu. Interface di Java 8+ juga bisa memiliki <code>default method</code> dengan implementasi bawaan.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>AbstractInterface.java</div>
          <button class="run-btn" data-run="java11">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15<br>16<br>17<br>18<br>19<br>20<br>21</div>
          <div class="code-content"><span class="tok-cm">// Abstract class sebagai kerangka</span>
<span class="tok-kw">abstract class</span> <span class="tok-var">Kendaraan</span> {
    <span class="tok-var">String</span> <span class="tok-var">warna</span>;
    <span class="tok-fn">Kendaraan</span>(<span class="tok-var">String</span> <span class="tok-var">warna</span>) { <span class="tok-kw">this</span>.<span class="tok-var">warna</span> = <span class="tok-var">warna</span>; }
    <span class="tok-kw">abstract void</span> <span class="tok-fn">bergerak</span>();
}
<span class="tok-cm">// Interface sebagai kontrak</span>
<span class="tok-kw">interface</span> <span class="tok-var">Mesin</span> {
    <span class="tok-kw">void</span> <span class="tok-fn">hidupkan</span>();
}
<span class="tok-kw">interface</span> <span class="tok-var">GPS</span> {
    <span class="tok-kw">void</span> <span class="tok-fn">arahkan</span>(<span class="tok-var">String</span> <span class="tok-var">tujuan</span>);
}
<span class="tok-cm">// extends 1 abstract + implements banyak interface</span>
<span class="tok-kw">class</span> <span class="tok-var">Mobil</span> <span class="tok-kw">extends</span> <span class="tok-var">Kendaraan</span> <span class="tok-kw">implements</span> <span class="tok-var">Mesin</span>, <span class="tok-var">GPS</span> {
    <span class="tok-fn">Mobil</span>(<span class="tok-var">String</span> <span class="tok-var">w</span>) { <span class="tok-kw">super</span>(<span class="tok-var">w</span>); }
    <span class="tok-kw">void</span> <span class="tok-fn">bergerak</span>() { <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"Mobil "</span> + <span class="tok-var">warna</span> + <span class="tok-str">" bergerak"</span>); }
    <span class="tok-kw">public void</span> <span class="tok-fn">hidupkan</span>() { <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"Mesin hidup"</span>); }
    <span class="tok-kw">public void</span> <span class="tok-fn">arahkan</span>(<span class="tok-var">String</span> <span class="tok-var">t</span>) { <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"Arah: "</span> + <span class="tok-var">t</span>); }
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-java11"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> Abstract class vs Interface — pakai abstract class jika ada kesamaan <em>state</em> (field/constructor). Pakai interface untuk kontrak perilaku yang bisa diterapkan ke class manapun tanpa peduli hierarki.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="java-10">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="java-12">Lanjut: File I/O →</button>
      </div>
    </article>

    <!-- Java Topic 12: File I/O -->
    <article class="topic-section" data-topic="java-12">
      <div class="topic-eyebrow">TOPIK 12 / 12</div>
      <h2 class="topic-title">File I/O</h2>
      <div class="topic-body">
        <p><strong>File I/O</strong> di Java menggunakan class dari package <code>java.io</code> dan <code>java.nio.file</code>. <code>FileReader</code>/<code>FileWriter</code> untuk teks, <code>BufferedReader</code>/<code>BufferedWriter</code> untuk efisiensi, dan <code>Files</code> (NIO) untuk kemudahan modern. Java 8+ juga punya <strong>Stream API</strong> (<code>Files.lines()</code>) untuk membaca file secara <em>lazy</em>.</p>
        <p>File I/O penting untuk menyimpan progres belajar, membaca konfigurasi, atau menulis log. Di LearnBase, data peserta disimpan ke file CSV agar bisa diolah nanti.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>FileIO.java</div>
          <button class="run-btn" data-run="java12">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15</div>
          <div class="code-content"><span class="tok-kw">import</span> <span class="tok-var">java.nio.file.*</span>;
<span class="tok-kw">import</span> <span class="tok-var">java.util.List</span>;

<span class="tok-kw">public class</span> <span class="tok-var">FileIO</span> {
    <span class="tok-kw">public static void</span> <span class="tok-fn">main</span>(<span class="tok-var">String[]</span> <span class="tok-var">args</span>) <span class="tok-kw">throws</span> <span class="tok-var">Exception</span> {
        <span class="tok-var">Path</span> <span class="tok-var">file</span> = <span class="tok-var">Files</span>.<span class="tok-fn">writeString</span>(
            <span class="tok-var">Paths</span>.<span class="tok-fn">get</span>(<span class="tok-str">"data.txt"</span>),
            <span class="tok-str">"LearnBase: modul Java\n"</span>
        );
        <span class="tok-var">List</span>&lt;<span class="tok-var">String</span>&gt; <span class="tok-var">baris</span> = <span class="tok-var">Files</span>.<span class="tok-fn">readAllLines</span>(<span class="tok-var">file</span>);
        <span class="tok-var">System</span>.<span class="tok-var">out</span>.<span class="tok-fn">println</span>(<span class="tok-str">"Isi file: "</span> + <span class="tok-var">baris</span>.<span class="tok-fn">get</span>(<span class="tok-num">0</span>));
    }
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-java12"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> <code>Files.writeString()</code> dan <code>Files.readAllLines()</code> dari NIO adalah cara paling simpel untuk File I/O di Java modern. Untuk file besar, gunakan <code>Files.lines()</code> yang membaca <em>lazy stream</em> — tidak semua isi dimuat ke memori sekaligus.</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz: Class dari NIO mana yang digunakan untuk membaca semua baris file sekaligus?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">FileReader</button>
          <button class="quiz-opt" data-correct="true">Files</button>
          <button class="quiz-opt" data-correct="false">BufferedReader</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="java-11">← Sebelumnya</button>
        <button class="nav-btn primary" type="button" id="finishBtn">Selesai — Kembali ke Library </button>
      </div>
    </article>
  </section>

</main>

<script>
(function() {
  const totalTopics = 12;
  const LANGUAGE = 'java'; // harus sama dengan key di $languages pada get_progress.php
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
  loadProgress().then(() => markDone('java-1'));

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