<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>JavaScript — LearnBase</title>
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
        <div class="brand-sub">JavaScript</div>
      </div>
    </div>
  </div>

  <div class="sidebar-body">
  <nav class="lang-nav" id="langNav">
    <div class="lang-tab active" data-lang="js">
      <span class="lang-dot" style="background:#6B4FD8"></span>
      <span class="lang-tab-text">
        <div class="lang-tab-name">JavaScript</div>
        <div class="lang-tab-meta">12 topik</div>
      </span>
      <span class="lang-tab-pct" data-pct="js">0%</span>
    </div>
    <div class="topic-list" data-list="js">
      <div class="topic-item active" data-topic="js-1"><span class="topic-check"></span>Apa itu JavaScript?</div>
      <div class="topic-item" data-topic="js-2"><span class="topic-check"></span>Variabel & Tipe Data</div>
      <div class="topic-item" data-topic="js-3"><span class="topic-check"></span>Fungsi & Kondisi</div>
      <div class="topic-item" data-topic="js-4"><span class="topic-check"></span>DOM: Mengubah Halaman</div>
      <div class="topic-item" data-topic="js-5"><span class="topic-check"></span>Array & Method</div>
      <div class="topic-item" data-topic="js-6"><span class="topic-check"></span>Object & JSON</div>
      <div class="topic-item" data-topic="js-7"><span class="topic-check"></span>Event & Interaksi</div>
      <div class="topic-item" data-topic="js-8"><span class="topic-check"></span>Async & Fetch</div>
      <div class="topic-item" data-topic="js-9"><span class="topic-check"></span>Module & Import</div>
      <div class="topic-item" data-topic="js-10"><span class="topic-check"></span>Array Destructure & Spread</div>
      <div class="topic-item" data-topic="js-11"><span class="topic-check"></span>Class & Prototype</div>
      <div class="topic-item" data-topic="js-12"><span class="topic-check"></span>Modern ES6+ Recap</div>
    </div>
  </div>

  <div class="sidebar-foot">
    <div class="sidebar-footer-label">Progres modul kamu</div>
    <div class="progress-track"><div class="progress-fill" id="progressFill" style="width:0%"></div></div>
    <div class="sidebar-footer-num" id="progressNum">0 / 12 topik selesai</div>
  </div>
</aside>

<main class="main">

  <!-- ================= JAVASCRIPT ================= -->
  <section class="content-panel active" data-lang="js">
    <div class="lang-header">
      <div>
        <div class="lang-eyebrow">MODUL 01 · BAHASA SISI KLIEN</div>
        <h1 class="lang-title">JavaScript</h1>
        <p class="lang-desc">Bahasa yang membuat halaman web bisa bergerak, merespons klik, dan berubah tanpa harus reload. Ini bahasa yang sama yang menjalankan tombol "play" di kartu kode pada modul ini.</p>
      </div>
      <div class="lang-badge">JS</div>
    </div>

    <!-- JS Topic 1 -->
    <article class="topic-section active" data-topic="js-1">
      <div class="topic-eyebrow">TOPIK 1 / 12</div>
      <h2 class="topic-title">Apa itu JavaScript?</h2>
      <div class="topic-body">
        <p>Kamu tahu tiap kali scroll Instagram dan muncul animasi hati saat <em>like</em>, atau feed Twitter/X yang muat sendiri tanpa reload halaman? Itulah JavaScript — bahasa yang membuat website jadi <strong>hidup dan interaktif</strong>.</p>
        <p>Dengan JavaScript, kamu bisa bikin tombol interaktif, kalkulator, game sederhana, sampai aplikasi chat <em>real-time</em> — semua langsung di browser, tanpa install software tambahan.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>halo.js</div>
          <button class="run-btn" data-run="js1">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3</div>
          <div class="code-content"><span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-str">"Halo, LearnBase!"</span>);
<span class="tok-kw">const</span> <span class="tok-var">nama</span> = <span class="tok-str">"Calon Developer"</span>;
<span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-str">`Selamat belajar, </span><span class="tok-fn">${nama}</span><span class="tok-str">!`</span>);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (console)</div>
          <div class="output-content" id="out-js1"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Coba klik "Jalankan" di setiap kartu kode pada modul ini untuk melihat simulasi hasilnya — ini membantu kamu membaca alur program sebelum mencobanya di editor sungguhan.</div>

      <div class="topic-nav">
        <button class="nav-btn" disabled>← Sebelumnya</button>
        <button class="nav-btn primary" data-next="js-2">Lanjut: Variabel & Tipe Data →</button>
      </div>
    </article>

    <!-- JS Topic 2 -->
    <article class="topic-section" data-topic="js-2">
      <div class="topic-eyebrow">TOPIK 2 / 12</div>
      <h2 class="topic-title">Variabel & Tipe Data</h2>
      <div class="topic-body">
        <p>Variabel adalah tempat menyimpan nilai. JavaScript punya tiga cara mendeklarasikan variabel:</p>
        <ul>
          <li><code>let</code> — nilainya boleh diubah lagi nanti</li>
          <li><code>const</code> — nilainya tetap, tidak boleh diubah</li>
          <li><code>var</code> — versi lama, jarang dipakai di kode modern</li>
        </ul>
        <p>Tipe data dasarnya ada <strong>string</strong> (teks), <strong>number</strong> (angka), <strong>boolean</strong> (benar/salah), dan <strong>array</strong> (daftar nilai).</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>variabel.js</div>
          <button class="run-btn" data-run="js2">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5</div>
          <div class="code-content"><span class="tok-kw">let</span> <span class="tok-var">skor</span> = <span class="tok-num">87</span>;
<span class="tok-kw">const</span> <span class="tok-var">namaModul</span> = <span class="tok-str">"JavaScript Dasar"</span>;
<span class="tok-kw">const</span> <span class="tok-var">lulus</span> = <span class="tok-var">skor</span> >= <span class="tok-num">70</span>;
<span class="tok-kw">const</span> <span class="tok-var">topik</span> = [<span class="tok-str">"variabel"</span>, <span class="tok-str">"fungsi"</span>, <span class="tok-str">"DOM"</span>];
<span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-var">namaModul</span>, <span class="tok-var">lulus</span>, <span class="tok-var">topik</span>.<span class="tok-var">length</span>);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (console)</div>
          <div class="output-content" id="out-js2"></div>
        </div>
      </div>

      <div class="callout note"><strong>Catatan:</strong> Pakai <code>const</code> sebagai default. Ganti ke <code>let</code> hanya kalau nilainya memang akan berubah — ini kebiasaan yang dipakai di kode JavaScript modern.</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz singkat: Manakah deklarasi yang TIDAK BISA diubah nilainya setelah dibuat?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">let skor = 10;</button>
          <button class="quiz-opt" data-correct="true">const skor = 10;</button>
          <button class="quiz-opt" data-correct="false">var skor = 10;</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="js-1">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="js-3">Lanjut: Fungsi & Kondisi →</button>
      </div>
    </article>

    <!-- JS Topic 3 -->
    <article class="topic-section" data-topic="js-3">
      <div class="topic-eyebrow">TOPIK 3 / 12</div>
      <h2 class="topic-title">Fungsi & Kondisi</h2>
      <div class="topic-body">
        <p><strong>Fungsi</strong> adalah blok kode yang bisa dipanggil berulang kali. <strong>Kondisi</strong> (<code>if/else</code>) dipakai untuk membuat program mengambil keputusan berdasarkan suatu nilai.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>fungsi.js</div>
          <button class="run-btn" data-run="js3">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-kw">function</span> <span class="tok-fn">cekProgres</span>(<span class="tok-var">persen</span>) {
  <span class="tok-kw">if</span> (<span class="tok-var">persen</span> === <span class="tok-num">100</span>) {
    <span class="tok-kw">return</span> <span class="tok-str">"Modul selesai! "</span>;
  } <span class="tok-kw">else</span> <span class="tok-kw">if</span> (<span class="tok-var">persen</span> >= <span class="tok-num">50</span>) {
    <span class="tok-kw">return</span> <span class="tok-str">"Sudah lewat separuh jalan"</span>;
  }
  <span class="tok-kw">return</span> <span class="tok-str">"Baru mulai, terus lanjut!"</span>;
}
<span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-fn">cekProgres</span>(<span class="tok-num">75</span>));</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (console)</div>
          <div class="output-content" id="out-js3"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Pola seperti <code>cekProgres()</code> di atas cocok dipakai untuk menampilkan pesan motivasi otomatis di halaman dashboard LearnBase berdasarkan progres belajar pengguna.</div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="js-2">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="js-4">Lanjut: DOM →</button>
      </div>
    </article>

    <!-- JS Topic 4 -->
    <article class="topic-section" data-topic="js-4">
      <div class="topic-eyebrow">TOPIK 4 / 12</div>
      <h2 class="topic-title">DOM: Mengubah Halaman</h2>
      <div class="topic-body">
        <p><strong>DOM</strong> (Document Object Model) adalah representasi halaman HTML yang bisa diakses dan diubah lewat JavaScript. Dengan DOM, kita bisa mengganti teks, menambah elemen, atau merespons klik tombol — inilah dasar dari semua interaktivitas di LearnBase, termasuk tombol "Jalankan" yang kamu klik di modul ini.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>dom.js</div>
          <button class="run-btn" data-run="js4">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4</div>
          <div class="code-content"><span class="tok-kw">const</span> <span class="tok-var">tombol</span> = <span class="tok-fn">document</span>.<span class="tok-fn">querySelector</span>(<span class="tok-str">"#mulaiBelajar"</span>);
<span class="tok-var">tombol</span>.<span class="tok-fn">addEventListener</span>(<span class="tok-str">"click"</span>, () => {
  <span class="tok-fn">document</span>.<span class="tok-fn">querySelector</span>(<span class="tok-str">"#status"</span>).<span class="tok-var">textContent</span> = <span class="tok-str">"Modul dimulai!"</span>;
});</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (simulasi setelah tombol diklik)</div>
          <div class="output-content" id="out-js4"></div>
        </div>
      </div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz singkat: Method apa yang dipakai untuk mendengarkan event klik pada elemen?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">querySelector()</button>
          <button class="quiz-opt" data-correct="true">addEventListener()</button>
          <button class="quiz-opt" data-correct="false">getElementById()</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="js-3">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="js-5">Lanjut: Array & Method →</button>
      </div>
    </article>

    <!-- JS Topic 5 -->
    <article class="topic-section" data-topic="js-5">
      <div class="topic-eyebrow">TOPIK 5 / 12</div>
      <h2 class="topic-title">Array & Method</h2>
      <div class="topic-body">
        <p><strong>Array</strong> adalah struktur data untuk menyimpan banyak nilai dalam satu variabel. JavaScript punya banyak method bawaan untuk memanipulasi array — seperti <code>push()</code>, <code>map()</code>, <code>filter()</code>, dan <code>reduce()</code>. Method ini membuat kode lebih ringkas dan mudah dibaca.</p>
        <p>Method seperti <code>map()</code> dan <code>filter()</code> termasuk dalam kategori <em>higher-order functions</em> — fungsi yang menerima fungsi lain sebagai argumen. Pola ini sangat umum di kode JS modern.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>array.js</div>
          <button class="run-btn" data-run="js5">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8</div>
          <div class="code-content"><span class="tok-kw">const</span> <span class="tok-var">angka</span> = [<span class="tok-num">4</span>, <span class="tok-num">9</span>, <span class="tok-num">16</span>, <span class="tok-num">25</span>];
<span class="tok-kw">const</span> <span class="tok-var">akar</span> = <span class="tok-var">angka</span>.<span class="tok-fn">map</span>(<span class="tok-var">n</span> => <span class="tok-fn">Math</span>.<span class="tok-fn">sqrt</span>(<span class="tok-var">n</span>));
<span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-str">"Akar:"</span>, <span class="tok-var">akar</span>);

<span class="tok-kw">const</span> <span class="tok-var">genap</span> = <span class="tok-var">angka</span>.<span class="tok-fn">filter</span>(<span class="tok-var">n</span> => <span class="tok-var">n</span> % <span class="tok-num">2</span> === <span class="tok-num">0</span>);
<span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-str">"Genap:"</span>, <span class="tok-var">genap</span>);

<span class="tok-kw">const</span> <span class="tok-var">total</span> = <span class="tok-var">angka</span>.<span class="tok-fn">reduce</span>((<span class="tok-var">a</span>, <span class="tok-var">b</span>) => <span class="tok-var">a</span> + <span class="tok-var">b</span>, <span class="tok-num">0</span>);
<span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-str">"Total:"</span>, <span class="tok-var">total</span>);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (console)</div>
          <div class="output-content" id="out-js5"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Method <code>map()</code>, <code>filter()</code>, dan <code>reduce()</code> adalah tiga serangkai method array yang paling sering dipakai di JavaScript modern. Kuasai ketiganya dan kamu sudah menguasai 70% operasi data di JS!</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz singkat: Method array mana yang dipakai untuk membuat array baru dari hasil transformasi setiap elemen?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">filter()</button>
          <button class="quiz-opt" data-correct="true">map()</button>
          <button class="quiz-opt" data-correct="false">reduce()</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="js-4">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="js-6">Lanjut: Object & JSON →</button>
      </div>
    </article>

    <!-- JS Topic 6 -->
    <article class="topic-section" data-topic="js-6">
      <div class="topic-eyebrow">TOPIK 6 / 12</div>
      <h2 class="topic-title">Object & JSON</h2>
      <div class="topic-body">
        <p><strong>Object</strong> di JavaScript menyimpan data dalam pasangan <em>key-value</em>. Ini mirip dengan kamus — setiap nilai punya label unik. Object sangat berguna untuk merepresentasikan entitas nyata seperti pengguna, produk, atau modul pembelajaran.</p>
        <p><strong>JSON</strong> (JavaScript Object Notation) adalah format data yang diturunkan dari object JavaScript, tapi berupa teks. JSON dipakai untuk mengirim data antara server dan browser — misalnya data profil pengguna atau daftar modul di LearnBase.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>object.js</div>
          <button class="run-btn" data-run="js6">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-kw">const</span> <span class="tok-var">pengguna</span> = {
  <span class="tok-var">nama</span>: <span class="tok-str">"Budi"</span>,
  <span class="tok-var">usia</span>: <span class="tok-num">21</span>,
  <span class="tok-var">modulSelesai</span>: [<span class="tok-str">"HTML"</span>, <span class="tok-str">"CSS"</span>]
};
<span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-var">pengguna</span>.<span class="tok-var">nama</span>, <span class="tok-str">"-"</span>, <span class="tok-var">pengguna</span>.<span class="tok-var">modulSelesai</span>.<span class="tok-var">length</span> + <span class="tok-str">" modul"</span>);

<span class="tok-kw">const</span> <span class="tok-var">json</span> = <span class="tok-fn">JSON</span>.<span class="tok-fn">stringify</span>(<span class="tok-var">pengguna</span>);
<span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-str">"JSON:"</span>, <span class="tok-var">json</span>);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (console)</div>
          <div class="output-content" id="out-js6"></div>
        </div>
      </div>

      <div class="callout note"><strong>Catatan:</strong> JSON adalah format universal — hampir semua bahasa pemrograman punya cara membaca (<em>parse</em>) dan menulis (<em>stringify</em>) JSON. Di JavaScript caranya pakai <code>JSON.parse()</code> dan <code>JSON.stringify()</code>.</div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="js-5">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="js-7">Lanjut: Event & Interaksi →</button>
      </div>
    </article>

    <!-- JS Topic 7 -->
    <article class="topic-section" data-topic="js-7">
      <div class="topic-eyebrow">TOPIK 7 / 12</div>
      <h2 class="topic-title">Event & Interaksi</h2>
      <div class="topic-body">
        <p><strong>Event</strong> adalah aksi yang terjadi di halaman web — klik tombol, gerakan mouse, penekanan keyboard, atau pengisian form. JavaScript bisa <em>mendengarkan</em> event-event ini dan menjalankan kode sebagai respons. Inilah inti dari interaktivitas web.</p>
        <p>Dengan <code>addEventListener()</code>, kita bisa memasang banyak pendengar event pada satu elemen, atau menghapusnya saat tidak diperlukan lagi.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>event.js</div>
          <button class="run-btn" data-run="js7">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-kw">const</span> <span class="tok-var">form</span> = <span class="tok-fn">document</span>.<span class="tok-fn">querySelector</span>(<span class="tok-str">"#formLogin"</span>);
<span class="tok-var">form</span>.<span class="tok-fn">addEventListener</span>(<span class="tok-str">"submit"</span>, (<span class="tok-var">e</span>) => {
  <span class="tok-var">e</span>.<span class="tok-fn">preventDefault</span>();
  <span class="tok-kw">const</span> <span class="tok-var">email</span> = <span class="tok-fn">document</span>.<span class="tok-fn">getElementById</span>(<span class="tok-str">"email"</span>).<span class="tok-var">value</span>;
  <span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-str">"Login dengan:"</span>, <span class="tok-var">email</span>);
});

<span class="tok-cm">// event mouse</span>
<span class="tok-fn">document</span>.<span class="tok-fn">querySelector</span>(<span class="tok-str">"#tombol"</span>)
  .<span class="tok-fn">addEventListener</span>(<span class="tok-str">"click"</span>, () => {
  <span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-str">"Tombol diklik!"</span>);
});</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (simulasi setelah event terjadi)</div>
          <div class="output-content" id="out-js7"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> <code>e.preventDefault()</code> menghentikan perilaku bawaan browser — sangat berguna saat menangani form agar halaman tidak reload saat data dikirim.</div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="js-6">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="js-8">Lanjut: Async & Fetch →</button>
      </div>
    </article>

    <!-- JS Topic 8 -->
    <article class="topic-section" data-topic="js-8">
      <div class="topic-eyebrow">TOPIK 8 / 12</div>
      <h2 class="topic-title">Async & Fetch</h2>
      <div class="topic-body">
        <p>JavaScript bersifat <strong>single-threaded</strong>, tapi bisa menangani operasi yang memakan waktu (seperti mengambil data dari server) tanpa membuat halaman <em>freeze</em>. Ini dilakukan dengan kode <strong>asinkron</strong> menggunakan <code>async/await</code> atau <code>Promise</code>.</p>
        <p><code>fetch()</code> adalah method bawaan untuk meminta data dari server. Hasilnya berupa Promise yang bisa ditunggu dengan <code>await</code>. Di LearnBase, ini dipakai untuk memuat daftar modul atau data progres belajar dari server.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>async.js</div>
          <button class="run-btn" data-run="js8">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8</div>
          <div class="code-content"><span class="tok-kw">async</span> <span class="tok-kw">function</span> <span class="tok-fn">ambilModul</span>() {
  <span class="tok-kw">try</span> {
    <span class="tok-kw">const</span> <span class="tok-var">res</span> = <span class="tok-kw">await</span> <span class="tok-fn">fetch</span>(<span class="tok-str">"/api/modul"</span>);
    <span class="tok-kw">const</span> <span class="tok-var">data</span> = <span class="tok-kw">await</span> <span class="tok-var">res</span>.<span class="tok-fn">json</span>();
    <span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-str">"Modul tersedia:"</span>, <span class="tok-var">data</span>.<span class="tok-var">length</span>);
  } <span class="tok-kw">catch</span> (<span class="tok-var">err</span>) {
    <span class="tok-fn">console</span>.<span class="tok-fn">error</span>(<span class="tok-str">"Gagal memuat:"</span>, <span class="tok-var">err</span>);
  }
}
<span class="tok-fn">ambilModul</span>();</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (console)</div>
          <div class="output-content" id="out-js8"></div>
        </div>
      </div>

      <div class="callout note"><strong>Catatan:</strong> Selalu bungkus kode <code>await fetch()</code> dalam <code>try/catch</code>. Koneksi internet bisa terputus kapan saja — <em>error handling</em> yang baik membuat aplikasi tidak tiba-tiba crash.</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz singkat: Kata kunci apa yang dipakai untuk menunggu hasil Promise di JavaScript modern?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">wait()</button>
          <button class="quiz-opt" data-correct="true">await</button>
          <button class="quiz-opt" data-correct="false">then()</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="js-7">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="js-9">Lanjut: Module & Import →</button>
      </div>
    </article>

    <!-- JS Topic 9 -->
    <article class="topic-section" data-topic="js-9">
      <div class="topic-eyebrow">TOPIK 9 / 12</div>
      <h2 class="topic-title">Module & Import</h2>
      <div class="topic-body">
        <p>Modul adalah cara JavaScript modern membagi kode ke dalam file-file terpisah. Dengan <strong>ES Module</strong> (ESM), kamu bisa <code>export</code> fungsi atau variabel dari satu file, lalu <code>import</code> di file lain. Hasilnya kode lebih rapi, mudah diuji, dan bisa dipakai ulang.</p>
        <p>Di LearnBase, tiap fitur besar (daftar modul, progres belajar, login) bisa ditulis di file masing-masing lalu digabung dengan <code>import</code>. Browser modern mendukung ESM lewat atribut <code>type="module"</code> di tag <code>&lt;script&gt;</code>.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>modul.js</div>
          <button class="run-btn" data-run="js9">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</div>
          <div class="code-content"><span class="tok-cm">// math.js — export fungsi</span>
<span class="tok-kw">export</span> <span class="tok-kw">function</span> <span class="tok-fn">kali</span>(<span class="tok-var">a</span>, <span class="tok-var">b</span>) {
  <span class="tok-kw">return</span> <span class="tok-var">a</span> * <span class="tok-var">b</span>;
}

<span class="tok-cm">// main.js — import & gunakan</span>
<span class="tok-kw">import</span> { <span class="tok-var">kali</span> } <span class="tok-kw">from</span> <span class="tok-str">"./math.js"</span>;
<span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-str">"5 x 7 ="</span>, <span class="tok-fn">kali</span>(<span class="tok-num">5</span>, <span class="tok-num">7</span>));</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (console)</div>
          <div class="output-content" id="out-js9"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> ES Module berbeda dengan CommonJS (require/module.exports) yang dipakai di Node.js. Di browser, <code>&lt;script type="module"&gt;</code> diperlukan agar <code>import</code>/<code>export</code> berfungsi.</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz singkat: Kata kunci apa yang dipakai untuk mengambil fungsi dari modul lain?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">require</button>
          <button class="quiz-opt" data-correct="true">import</button>
          <button class="quiz-opt" data-correct="false">include</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="js-8">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="js-10">Lanjut: Array Destructure & Spread →</button>
      </div>
    </article>

    <!-- JS Topic 10 -->
    <article class="topic-section" data-topic="js-10">
      <div class="topic-eyebrow">TOPIK 10 / 12</div>
      <h2 class="topic-title">Array Destructure & Spread</h2>
      <div class="topic-body">
        <p><strong>Destructuring</strong> adalah sintaks ES6 untuk membongkar nilai dari array atau object ke variabel terpisah. Alih-alih menulis <code>arr[0]</code>, <code>arr[1]</code> satu per satu, kamu bisa tulis <code>const [a, b] = arr</code> — lebih cepat dan ekspresif.</p>
        <p><strong>Spread operator</strong> (<code>...</code>) menyebarkan (<em>spread</em>) elemen array atau properti object. Spread berguna untuk menggabungkan array, menyalin object, atau mengirim argumen ke fungsi tanpa menulis satu per satu.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>spread.js</div>
          <button class="run-btn" data-run="js10">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11</div>
          <div class="code-content"><span class="tok-cm">// Destructuring array</span>
<span class="tok-kw">const</span> <span class="tok-var">warna</span> = [<span class="tok-str">"merah"</span>, <span class="tok-str">"hijau"</span>, <span class="tok-str">"biru"</span>];
<span class="tok-kw">const</span> [<span class="tok-var">a</span>, <span class="tok-var">b</span>, <span class="tok-var">c</span>] = <span class="tok-var">warna</span>;
<span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-var">a</span>, <span class="tok-var">b</span>, <span class="tok-var">c</span>);

<span class="tok-cm">// Spread array</span>
<span class="tok-kw">const</span> <span class="tok-var">angka1</span> = [<span class="tok-num">1</span>, <span class="tok-num">2</span>, <span class="tok-num">3</span>];
<span class="tok-kw">const</span> <span class="tok-var">angka2</span> = [<span class="tok-num">4</span>, <span class="tok-num">5</span>];
<span class="tok-kw">const</span> <span class="tok-var">gabung</span> = [...<span class="tok-var">angka1</span>, ...<span class="tok-var">angka2</span>];
<span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-str">"Gabung:"</span>, <span class="tok-var">gabung</span>);

<span class="tok-cm">// Spread object</span>
<span class="tok-kw">const</span> <span class="tok-var">dasar</span> = { <span class="tok-var">nama</span>: <span class="tok-str">"Budi"</span> };
<span class="tok-kw">const</span> <span class="tok-var">lengkap</span> = { ...<span class="tok-var">dasar</span>, <span class="tok-var">skor</span>: <span class="tok-num">88</span> };
<span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-var">lengkap</span>);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (console)</div>
          <div class="output-content" id="out-js10"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Spread operator membuat <em>shallow copy</em> — untuk array/object bertingkat, salinan masih merujuk ke referensi yang sama. Gunakan structuredClone() untuk <em>deep copy</em>.</div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="js-9">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="js-11">Lanjut: Class & Prototype →</button>
      </div>
    </article>

    <!-- JS Topic 11 -->
    <article class="topic-section" data-topic="js-11">
      <div class="topic-eyebrow">TOPIK 11 / 12</div>
      <h2 class="topic-title">Class & Prototype</h2>
      <div class="topic-body">
        <p>JavaScript menggunakan <strong>prototype-based inheritance</strong>, bukan <em>class-based</em> seperti Java atau C++. Setiap objek memiliki properti internal <code>[[Prototype]]</code> yang bisa merujuk ke objek lain — jika sebuah properti tidak ditemukan di objek itu sendiri, JavaScript akan mencarinya ke <em>prototype chain</em>.</p>
        <p>Di ES6, JavaScript memperkenalkan sintaks <code>class</code> yang membuat pola pewarisan ini lebih mirip dengan bahasa OOP tradisional. Namun di balik layar, <code>class</code> tetaplah prototype — sintaksnya saja yang lebih rapi dan mudah dipahami.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>class.js</div>
          <button class="run-btn" data-run="js11">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15</div>
          <div class="code-content"><span class="tok-cm">// Definisi class (ES6)</span>
<span class="tok-kw">class</span> <span class="tok-fn">Modul</span> {
  <span class="tok-fn">constructor</span>(<span class="tok-var">judul</span>, <span class="tok-var">durasi</span>) {
    <span class="tok-kw">this</span>.<span class="tok-var">judul</span> = <span class="tok-var">judul</span>;
    <span class="tok-kw">this</span>.<span class="tok-var">durasi</span> = <span class="tok-var">durasi</span>;
  }
  <span class="tok-fn">ringkasan</span>() {
    <span class="tok-kw">return</span> <span class="tok-str">`</span><span class="tok-fn">${this.judul}</span><span class="tok-str"> — </span><span class="tok-fn">${this.durasi}</span><span class="tok-str"> menit`</span>;
  }
}

<span class="tok-cm">// Pewarisan via extends</span>
<span class="tok-kw">class</span> <span class="tok-fn">ModulVideo</span> <span class="tok-kw">extends</span> <span class="tok-fn">Modul</span> {
  <span class="tok-fn">ringkasan</span>() {
    <span class="tok-kw">return</span> <span class="tok-str">"[Video] "</span> + <span class="tok-kw">super</span>.<span class="tok-fn">ringkasan</span>();
  }
}

<span class="tok-kw">const</span> <span class="tok-var">m</span> = <span class="tok-kw">new</span> <span class="tok-fn">ModulVideo</span>(<span class="tok-str">"Class & Prototype"</span>, <span class="tok-num">30</span>);
<span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-var">m</span>.<span class="tok-fn">ringkasan</span>());
<span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-var">m</span> <span class="tok-kw">instanceof</span> <span class="tok-fn">Modul</span>);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (console)</div>
          <div class="output-content" id="out-js11"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Keyword <code>class</code> di ES6 adalah <em>syntactic sugar</em> di atas prototype. Buktinya: <code>typeof Modul</code> tetap menghasilkan <code>"function"</code>, bukan <code>"class"</code> — karena class di JavaScript sebenarnya adalah function constructor dengan prototype.</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz: Kata kunci apa yang digunakan untuk mewarisi class di JavaScript?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">inherit</button>
          <button class="quiz-opt" data-correct="true">extends</button>
          <button class="quiz-opt" data-correct="false">implements</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="js-10">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="js-12">Lanjut: Modern ES6+ Recap →</button>
      </div>
    </article>

    <!-- JS Topic 12 (Final) -->
    <article class="topic-section" data-topic="js-12">
      <div class="topic-eyebrow">TOPIK 12 / 12</div>
      <h2 class="topic-title">Modern ES6+ Recap</h2>
      <div class="topic-body">
        <p>Selamat! Kamu telah menyelesaikan 11 topik JavaScript. Di sesi akhir ini, kita rekap fitur-fitur <strong>ES6+</strong> yang paling sering dipakai di dunia kerja: <code>let/const</code>, arrow function, destructuring, spread/rest, template literal, class, module, Promise, dan async/await.</p>
        <p>Fitur-fitur ini bukan sekadar sintaks baru — mereka mengubah cara kita berpikir tentang kode. <code>const</code> dan <code>let</code> menggantikan <code>var</code> sepenuhnya. Arrow function membuat callback lebih pendek. Template literal membuat penggabungan string tidak lagi merepotkan.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>es6-recap.js</div>
          <button class="run-btn" data-run="js12">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15<br>16<br>17</div>
          <div class="code-content"><span class="tok-cm">// Recap: fitur ES6+ dalam satu fungsi</span>
<span class="tok-kw">const</span> <span class="tok-var">buatKartu</span> = (<span class="tok-var">nama</span>, <span class="tok-var">nilai</span>, ...<span class="tok-var">modul</span>) => {
  <span class="tok-kw">return</span> <span class="tok-str">`<strong>${nama}</strong> — ${nilai} poin
  <span class="tok-kw">Modul</span>: ${modul.<span class="tok-fn">join</span>(<span class="tok-str">", "</span>)}`</span>;
};

<span class="tok-kw">const</span> <span class="tok-var">output</span> = <span class="tok-fn">buatKartu</span>(<span class="tok-str">"Budi"</span>, <span class="tok-num">92</span>,
  <span class="tok-str">"JS"</span>, <span class="tok-str">"PHP"</span>, <span class="tok-str">"Python"</span>);
<span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-var">output</span>);

<span class="tok-cm">// Destructuring & default parameter</span>
<span class="tok-kw">const</span> { <span class="tok-var">nama</span>, <span class="tok-var">skor</span> = <span class="tok-num">0</span> } = { <span class="tok-var">nama</span>: <span class="tok-str">"Siti"</span> };
<span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-str">`</span><span class="tok-fn">${nama}</span><span class="tok-str">: </span><span class="tok-fn">${skor}</span><span class="tok-str">`</span>);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (console)</div>
          <div class="output-content" id="out-js12"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> ES6+ bukan sekadar fitur baru — ini adalah <em>best practice</em> modern. Jika kamu melihat kode JavaScript di GitHub atau di kerja, 90% sudah menggunakan sintaks ES6+. Biasakan menulis <code>const</code>/<code>let</code> dan arrow function sejak sekarang.</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz: Keyword mana yang digunakan untuk mendeklarasikan konstanta di ES6?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">var</button>
          <button class="quiz-opt" data-correct="true">const</button>
          <button class="quiz-opt" data-correct="false">let</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="js-11">← Sebelumnya</button>
        <button class="nav-btn primary" type="button" id="finishBtn">Selesai — Kembali ke Library </button>
      </div>
    </article>
  </section>

</main>

<script>
(function() {
  const totalTopics = 12;
  const LANGUAGE = 'js'; // harus sama dengan key di $languages pada get_progress.php
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

  // persist: true -> juga kirim ke server (dipakai saat user benar-benar menyelesaikan topik)
  // persist: false -> cuma update UI (dipakai saat memuat progres lama dari server)
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
        <h2 style="margin-top:0;">Selamat!</h2>
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
  loadProgress().then(() => markDone('js-1'));

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