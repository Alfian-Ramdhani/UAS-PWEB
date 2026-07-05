<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>C — LearnBase</title>
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
        <div class="brand-sub">C</div>
      </div>
    </div>
  </div>

  <div class="sidebar-body">
  <nav class="lang-nav" id="langNav">
    <div class="lang-tab active" data-lang="c">
      <span class="lang-dot" style="background:#6B4FD8"></span>
      <span class="lang-tab-text">
        <div class="lang-tab-name">C</div>
        <div class="lang-tab-meta">12 topik</div>
      </span>
      <span class="lang-tab-pct" data-pct="c">0%</span>
    </div>
    <div class="topic-list" data-list="c">
      <div class="topic-item active" data-topic="c-1"><span class="topic-check"></span>Apa itu C?</div>
      <div class="topic-item" data-topic="c-2"><span class="topic-check"></span>Variabel & Tipe</div>
      <div class="topic-item" data-topic="c-3"><span class="topic-check"></span>Input & Output</div>
      <div class="topic-item" data-topic="c-4"><span class="topic-check"></span>Kondisi & Perulangan</div>
      <div class="topic-item" data-topic="c-5"><span class="topic-check"></span>Array & String</div>
      <div class="topic-item" data-topic="c-6"><span class="topic-check"></span>Fungsi & Header</div>
      <div class="topic-item" data-topic="c-7"><span class="topic-check"></span>Pointer</div>
      <div class="topic-item" data-topic="c-8"><span class="topic-check"></span>Struct & File</div>
      <div class="topic-item" data-topic="c-9"><span class="topic-check"></span>Memory Allocation</div>
      <div class="topic-item" data-topic="c-10"><span class="topic-check"></span>Multi-file Project</div>
      <div class="topic-item" data-topic="c-11"><span class="topic-check"></span>Preprocessor</div>
      <div class="topic-item" data-topic="c-12"><span class="topic-check"></span>Makefile & Build</div>
    </div>
  </div>

  <div class="sidebar-foot">
    <div class="sidebar-footer-label">Progres modul kamu</div>
    <div class="progress-track"><div class="progress-fill" id="progressFill" style="width:0%"></div></div>
    <div class="sidebar-footer-num" id="progressNum">0 / 12 topik selesai</div>
  </div>
</aside>

<main class="main">

  <!-- ================= C ================= -->
  <section class="content-panel active" data-lang="c">
    <div class="lang-header">
      <div>
        <div class="lang-eyebrow">MODUL 06 · BAHASA SISTEM KLASIK</div>
        <h1 class="lang-title">C</h1>
        <p class="lang-desc">Fondasi dari banyak bahasa modern. C memberi kendali penuh atas memori dan hardware — dipakai untuk kernel Linux, sistem embedded, dan firmware.</p>
      </div>
      <div class="lang-badge">C</div>
    </div>

    <article class="topic-section active" data-topic="c-1">
      <div class="topic-eyebrow">TOPIK 1 / 12</div>
      <h2 class="topic-title">Apa itu C?</h2>
      <div class="topic-body">
        <p>Pernah penasaran bagaimana OS komputer, game engine, atau firmware Arduino bekerja? Jawabannya: C. Bahasa ini adalah fondasi di balik Linux, Python, dan hampir semua software sistem — dengan C, kamu bisa membangun <strong>program yang super cepat dan berinteraksi langsung dengan hardware</strong>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>halo.c</div>
          <button class="run-btn" data-run="c1">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-kw">#include</span> <span class="tok-str">&lt;stdio.h&gt;</span>
<span class="tok-kw">int</span> <span class="tok-fn">main</span>() {
    <span class="tok-fn">printf</span>(<span class="tok-str">"Halo, LearnBase!\\n"</span>);
    <span class="tok-kw">return</span> <span class="tok-num">0</span>;
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-c1"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> <code>#include &lt;stdio.h&gt;</code> untuk input-output standar. <code>printf()</code> mencetak teks — <code>\\n</code> baris baru.</div>
      <div class="topic-nav">
        <button class="nav-btn" disabled>← Sebelumnya</button>
        <button class="nav-btn primary" data-next="c-2">Lanjut: Variabel & Tipe →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="c-2">
      <div class="topic-eyebrow">TOPIK 2 / 12</div>
      <h2 class="topic-title">Variabel & Tipe</h2>
      <div class="topic-body">
        <p>Tipe dasar: <code>int</code>, <code>float</code>/<code>double</code>, <code>char</code>, <code>void</code>. Semua harus dideklarasikan dengan tipe sebelum dipakai.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>variabel.c</div>
          <button class="run-btn" data-run="c2">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-kw">int</span> <span class="tok-var">skor</span> = <span class="tok-num">87</span>;
<span class="tok-kw">float</span> <span class="tok-var">rata</span> = <span class="tok-num">85.5</span>;
<span class="tok-kw">char</span> <span class="tok-var">grade</span> = <span class="tok-str">'B'</span>;
<span class="tok-fn">printf</span>(<span class="tok-str">"Skor: %d\\n"</span>, <span class="tok-var">skor</span>);
<span class="tok-fn">printf</span>(<span class="tok-str">"Grade: %c, Rata: %.1f"</span>, <span class="tok-var">grade</span>, <span class="tok-var">rata</span>);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-c2"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>%d</code>, <code>%c</code>, <code>%f</code> adalah <em>format specifier</em> — diganti nilai variabel setelah string.</div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz: Fungsi output di C?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">console.log()</button>
          <button class="quiz-opt" data-correct="true">printf()</button>
          <button class="quiz-opt" data-correct="false">print()</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="c-1">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="c-3">Lanjut: Input & Output →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="c-3">
      <div class="topic-eyebrow">TOPIK 3 / 12</div>
      <h2 class="topic-title">Input & Output</h2>
      <div class="topic-body">
        <p><code>scanf()</code> membaca input dari pengguna. Format specifier sama dengan <code>printf()</code> — jangan lupa <code>&amp;</code>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>input.c</div>
          <button class="run-btn" data-run="c3">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-kw">int</span> <span class="tok-var">usia</span>;
<span class="tok-fn">printf</span>(<span class="tok-str">"Masukkan usia: "</span>);
<span class="tok-fn">scanf</span>(<span class="tok-str">"%d"</span>, &amp;<span class="tok-var">usia</span>);
<span class="tok-kw">if</span> (<span class="tok-var">usia</span> >= <span class="tok-num">17</span>) {
    <span class="tok-fn">printf</span>(<span class="tok-str">"Boleh daftar\\n"</span>);
} <span class="tok-kw">else</span> { <span class="tok-fn">printf</span>(<span class="tok-str">"Belum cukup"</span>); }</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal - input: 20)</div>
          <div class="output-content" id="out-c3"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>&amp;usia</code> = alamat memori variabel, supaya <code>scanf()</code> bisa mengisi nilainya.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="c-2">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="c-4">Lanjut: Kondisi & Perulangan →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="c-4">
      <div class="topic-eyebrow">TOPIK 4 / 12</div>
      <h2 class="topic-title">Kondisi & Perulangan</h2>
      <div class="topic-body">
        <p>C punya <code>if/else</code>, <code>switch</code>, <code>for</code>, <code>while</code>, <code>do-while</code> — sintaks yang diadopsi C++, Java, JavaScript.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>loop.c</div>
          <button class="run-btn" data-run="c4">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-kw">for</span> (<span class="tok-kw">int</span> <span class="tok-var">i</span> = <span class="tok-num">1</span>; <span class="tok-var">i</span> <= <span class="tok-num">3</span>; <span class="tok-var">i</span>++) {
    <span class="tok-fn">printf</span>(<span class="tok-str">"Modul %d\\n"</span>, <span class="tok-var">i</span>);
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-c4"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> Di C99, variabel loop bisa dideklarasikan di dalam <code>for</code>. Sebelumnya harus di luar.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="c-3">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="c-5">Lanjut: Array & String →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="c-5">
      <div class="topic-eyebrow">TOPIK 5 / 12</div>
      <h2 class="topic-title">Array & String</h2>
      <div class="topic-body">
        <p>Array menyimpan nilai sejenis berurutan. String = array <code>char</code> diakhiri <code>\\0</code>. Fungsi di <code>&lt;string.h&gt;</code>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>string.c</div>
          <button class="run-btn" data-run="c5">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5</div>
          <div class="code-content"><span class="tok-kw">char</span> <span class="tok-var">nama</span>[] = <span class="tok-str">"LearnBase"</span>;
<span class="tok-kw">int</span> <span class="tok-var">arr</span>[] = {<span class="tok-num">10</span>, <span class="tok-num">20</span>, <span class="tok-num">30</span>};
<span class="tok-fn">printf</span>(<span class="tok-str">"Nama: %s\\n"</span>, <span class="tok-var">nama</span>);
<span class="tok-fn">printf</span>(<span class="tok-str">"Total: %d"</span>, <span class="tok-var">arr</span>[<span class="tok-num">0</span>] + <span class="tok-var">arr</span>[<span class="tok-num">2</span>]);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-c5"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>strlen()</code>, <code>strcpy()</code>, <code>strcmp()</code> — ada di <code>&lt;string.h&gt;</code>.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="c-4">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="c-6">Lanjut: Fungsi & Header →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="c-6">
      <div class="topic-eyebrow">TOPIK 6 / 12</div>
      <h2 class="topic-title">Fungsi & Header</h2>
      <div class="topic-body">
        <p>Fungsi punya tipe kembalian, nama, parameter. File header (<code>.h</code>) berisi deklarasi untuk modularitas.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>fungsi.c</div>
          <button class="run-btn" data-run="c6">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8</div>
          <div class="code-content"><span class="tok-kw">int</span> <span class="tok-fn">kuadrat</span>(<span class="tok-kw">int</span> <span class="tok-var">x</span>) { <span class="tok-kw">return</span> <span class="tok-var">x</span> * <span class="tok-var">x</span>; }
<span class="tok-kw">int</span> <span class="tok-fn">main</span>() {
    <span class="tok-fn">printf</span>(<span class="tok-str">"Kuadrat: %d\\n"</span>, <span class="tok-fn">kuadrat</span>(<span class="tok-num">5</span>));
    <span class="tok-kw">return</span> <span class="tok-num">0</span>;
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-c6"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> <em>Function prototype</em> diperlukan jika fungsi dipanggil sebelum didefinisikan — biasanya di file header.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="c-5">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="c-7">Lanjut: Pointer →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="c-7">
      <div class="topic-eyebrow">TOPIK 7 / 12</div>
      <h2 class="topic-title">Pointer</h2>
      <div class="topic-body">
        <p><strong>Pointer</strong> menyimpan alamat memori. <code>*</code> untuk deklarasi, <code>&amp;</code> untuk ambil alamat. Memungkinkan pass-by-reference dan alokasi dinamis.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>pointer.c</div>
          <button class="run-btn" data-run="c7">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8</div>
          <div class="code-content"><span class="tok-kw">void</span> <span class="tok-fn">ubahNilai</span>(<span class="tok-kw">int</span>* <span class="tok-var">p</span>) { *<span class="tok-var">p</span> = <span class="tok-num">100</span>; }
<span class="tok-kw">int</span> <span class="tok-fn">main</span>() {
    <span class="tok-kw">int</span> <span class="tok-var">x</span> = <span class="tok-num">10</span>;
    <span class="tok-fn">ubahNilai</span>(&amp;<span class="tok-var">x</span>);
    <span class="tok-fn">printf</span>(<span class="tok-str">"x = %d\\n"</span>, <span class="tok-var">x</span>);
    <span class="tok-kw">return</span> <span class="tok-num">0</span>;
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-c7"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Pointer = "alamat rumah", <code>&amp;x</code> = cari alamat x, <code>*ptr</code> = kunjungi rumah itu.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="c-6">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="c-8">Lanjut: Struct & File →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="c-8">
      <div class="topic-eyebrow">TOPIK 8 / 12</div>
      <h2 class="topic-title">Struct & File</h2>
      <div class="topic-body">
        <p><strong>Struct</strong> mengelompokkan variabel dengan tipe berbeda. File I/O: <code>fopen()</code>, <code>fprintf()</code>, <code>fclose()</code>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>struct.c</div>
          <button class="run-btn" data-run="c8">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-kw">struct</span> <span class="tok-var">Siswa</span> {
    <span class="tok-kw">char</span> <span class="tok-var">nama</span>[<span class="tok-num">50</span>]; <span class="tok-kw">int</span> <span class="tok-var">skor</span>;
};
<span class="tok-kw">struct</span> <span class="tok-var">Siswa</span> <span class="tok-var">s</span> = {<span class="tok-str">"Budi"</span>, <span class="tok-num">87</span>};
<span class="tok-fn">printf</span>(<span class="tok-str">"%s: %d"</span>, <span class="tok-var">s</span>.<span class="tok-var">nama</span>, <span class="tok-var">s</span>.<span class="tok-var">skor</span>);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-c8"></div>
        </div>
      </div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz: Tipe data string di C?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">string</button>
          <button class="quiz-opt" data-correct="true">char[] (array of char)</button>
          <button class="quiz-opt" data-correct="false">str</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="c-7">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="c-9">Lanjut: Memory Allocation →</button>
      </div>
    </article>

    <!-- C Topic 9 -->
    <article class="topic-section" data-topic="c-9">
      <div class="topic-eyebrow">TOPIK 9 / 12</div>
      <h2 class="topic-title">Memory Allocation</h2>
      <div class="topic-body">
        <p><strong>Alokasi memori dinamis</strong> di C menggunakan fungsi <code>malloc()</code>, <code>calloc()</code>, <code>realloc()</code>, dan <code>free()</code> dari <code>&lt;stdlib.h&gt;</code>. Memori dialokasikan di <em>heap</em> saat program berjalan — berbeda dengan array biasa yang ukurannya tetap. Setiap <code>malloc()</code> harus diimbangi <code>free()</code> untuk mencegah <em>memory leak</em>.</p>
        <p>Alokasi dinamis berguna ketika ukuran data tidak diketahui saat program ditulis — misalnya membaca daftar pengguna dari file, atau membuat struktur data seperti linked list. Pointer yang dikembalikan <code>malloc()</code> bisa diperlakukan seperti array biasa dengan indeks <code>[ ]</code>.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>malloc.c</div>
          <button class="run-btn" data-run="c9">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14</div>
          <div class="code-content"><span class="tok-kw">#include</span> <span class="tok-str">&lt;stdio.h&gt;</span>
  <span class="tok-kw">#include</span> <span class="tok-str">&lt;stdlib.h&gt;</span>

  <span class="tok-kw">int</span> <span class="tok-fn">main</span>() {
      <span class="tok-kw">int</span> *<span class="tok-var">arr</span>;
      <span class="tok-var">arr</span> = (<span class="tok-kw">int</span>*)<span class="tok-fn">malloc</span>(<span class="tok-num">5</span> * <span class="tok-kw">sizeof</span>(<span class="tok-kw">int</span>));
      <span class="tok-var">arr</span>[<span class="tok-num">0</span>] = <span class="tok-num">10</span>; <span class="tok-var">arr</span>[<span class="tok-num">1</span>] = <span class="tok-num">20</span>;
      <span class="tok-var">arr</span>[<span class="tok-num">2</span>] = <span class="tok-num">30</span>; <span class="tok-var">arr</span>[<span class="tok-num">3</span>] = <span class="tok-num">40</span>;
      <span class="tok-var">arr</span>[<span class="tok-num">4</span>] = <span class="tok-num">50</span>;
      <span class="tok-kw">for</span> (<span class="tok-kw">int</span> <span class="tok-var">i</span> = <span class="tok-num">0</span>; <span class="tok-var">i</span> &lt; <span class="tok-num">5</span>; <span class="tok-var">i</span>++)
          <span class="tok-fn">printf</span>(<span class="tok-str">"%d "</span>, <span class="tok-var">arr</span>[<span class="tok-var">i</span>]);
      <span class="tok-fn">free</span>(<span class="tok-var">arr</span>);
      <span class="tok-kw">return</span> <span class="tok-num">0</span>;
  }</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-c9"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Setiap <code>malloc()</code> harus dipasangkan dengan <code>free()</code> — jika tidak, memori akan bocor (<em>memory leak</em>). Gunakan tools seperti Valgrind untuk mendeteksi kebocoran memori. Untuk array nol, <code>calloc()</code> otomatis menginisialisasi semua elemen ke 0.</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz: Fungsi apa yang dipakai untuk membebaskan memori dinamis di C?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="true">free()</button>
          <button class="quiz-opt" data-correct="false">delete()</button>
          <button class="quiz-opt" data-correct="false">release()</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="c-8">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="c-10">Lanjut: Multi-file Project →</button>
      </div>
    </article>

    <!-- C Topic 10 -->
    <article class="topic-section" data-topic="c-10">
      <div class="topic-eyebrow">TOPIK 10 / 12</div>
      <h2 class="topic-title">Multi-file Project</h2>
      <div class="topic-body">
        <p>Proyek C yang sesungguhnya terdiri dari banyak file: file <strong>header</strong> (<code>.h</code>) berisi deklarasi fungsi, tipe, dan konstanta; file <strong>sumber</strong> (<code>.c</code>) berisi implementasi. Ini disebut <em>modular programming</em> — setiap file punya tanggung jawab yang jelas.</p>
        <p>Direktori proyek tipikal: <code>src/</code> untuk <code>.c</code>, <code>include/</code> untuk <code>.h</code>. Gunakan <em>include guard</em> (<code>#ifndef</code>) di header agar tidak di-<code>#include</code> dua kali. Kompilasi semua <code>.c</code> bersama: <code>gcc main.c math.c -o program</code>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>math.h</div>
          <button class="run-btn" data-run="c10">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15<br>16<br>17<br>18</div>
          <div class="code-content"><span class="tok-cm">// math.h — header file</span>
<span class="tok-kw">#ifndef</span> <span class="tok-var">MATH_H</span>
<span class="tok-kw">#define</span> <span class="tok-var">MATH_H</span>
<span class="tok-kw">int</span> <span class="tok-fn">tambah</span>(<span class="tok-kw">int</span> <span class="tok-var">a</span>, <span class="tok-kw">int</span> <span class="tok-var">b</span>);
<span class="tok-kw">int</span> <span class="tok-fn">kali</span>(<span class="tok-kw">int</span> <span class="tok-var">a</span>, <span class="tok-kw">int</span> <span class="tok-var">b</span>);
<span class="tok-kw">double</span> <span class="tok-fn">rata</span>(<span class="tok-kw">int</span> <span class="tok-var">arr</span>[], <span class="tok-kw">int</span> <span class="tok-var">n</span>);
<span class="tok-kw">#endif</span>
<span class="tok-cm">// math.c — implementation</span>
<span class="tok-kw">int</span> <span class="tok-fn">tambah</span>(<span class="tok-kw">int</span> <span class="tok-var">a</span>, <span class="tok-kw">int</span> <span class="tok-var">b</span>) { <span class="tok-kw">return</span> <span class="tok-var">a</span> + <span class="tok-var">b</span>; }
<span class="tok-kw">int</span> <span class="tok-fn">kali</span>(<span class="tok-kw">int</span> <span class="tok-var">a</span>, <span class="tok-kw">int</span> <span class="tok-var">b</span>) { <span class="tok-kw">return</span> <span class="tok-var">a</span> * <span class="tok-var">b</span>; }
<span class="tok-kw">double</span> <span class="tok-fn">rata</span>(<span class="tok-kw">int</span> <span class="tok-var">arr</span>[], <span class="tok-kw">int</span> <span class="tok-var">n</span>) {
    <span class="tok-kw">int</span> <span class="tok-var">sum</span> = <span class="tok-num">0</span>;
    <span class="tok-kw">for</span> (<span class="tok-kw">int</span> <span class="tok-var">i</span> = <span class="tok-num">0</span>; <span class="tok-var">i</span> &lt; <span class="tok-var">n</span>; <span class="tok-var">i</span>++) { <span class="tok-var">sum</span> += <span class="tok-var">arr</span>[<span class="tok-var">i</span>]; }
    <span class="tok-kw">return</span> (<span class="tok-kw">double</span>)<span class="tok-var">sum</span> / <span class="tok-var">n</span>;
}
<span class="tok-cm">// main.c — program utama</span>
<span class="tok-kw">#include</span> <span class="tok-str">"math.h"</span>
<span class="tok-kw">int</span> <span class="tok-fn">main</span>() {
    <span class="tok-kw">int</span> <span class="tok-var">data</span>[] = {<span class="tok-num">80</span>, <span class="tok-num">90</span>, <span class="tok-num">100</span>};
    <span class="tok-fn">printf</span>(<span class="tok-str">"3+4=%d\\n"</span>, <span class="tok-fn">tambah</span>(<span class="tok-num">3</span>, <span class="tok-num">4</span>));
    <span class="tok-fn">printf</span>(<span class="tok-str">"Rata: %.1f\\n"</span>, <span class="tok-fn">rata</span>(<span class="tok-var">data</span>, <span class="tok-num">3</span>));
    <span class="tok-kw">return</span> <span class="tok-num">0</span>;
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-c10"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> <em>Include guard</em> <code>#ifndef</code>/<code>#define</code>/<code>#endif</code> mencegah file header di-<code>#include</code> berulang. File header kustom pakai tanda kutip <code>#include "math.h"</code>, bukan <code>&lt;&gt;</code>.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="c-9">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="c-11">Lanjut: Preprocessor →</button>
      </div>
    </article>

    <!-- C Topic 11 -->
    <article class="topic-section" data-topic="c-11">
      <div class="topic-eyebrow">TOPIK 11 / 12</div>
      <h2 class="topic-title">Preprocessor</h2>
      <div class="topic-body">
        <p><strong>Preprocessor</strong> dijalankan sebelum kompilasi — semua yang diawali <code>#</code> diproses lebih dulu. <code>#define</code> untuk konstanta dan makro, <code>#include</code> untuk menyisipkan file, <code>#if</code>/<code>#ifdef</code> untuk kompilasi bersyarat.</p>
        <p>Preprocessor bisa membuat kode lebih fleksibel: <code>#ifdef DEBUG</code> menyalakan log hanya di mode debugging, <code>#define</code> makro seperti fungsi tanpa overhead panggilan fungsi.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>preproc.c</div>
          <button class="run-btn" data-run="c11">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15</div>
          <div class="code-content"><span class="tok-kw">#include</span> <span class="tok-str">&lt;stdio.h&gt;</span>
<span class="tok-kw">#define</span> <span class="tok-var">PI</span> <span class="tok-num">3.14159</span>
<span class="tok-kw">#define</span> <span class="tok-var">LUAS_LINGKARAN</span>(<span class="tok-var">r</span>) (PI * (<span class="tok-var">r</span>) * (<span class="tok-var">r</span>))
<span class="tok-kw">#define</span> <span class="tok-var">DEBUG</span>
<span class="tok-kw">int</span> <span class="tok-fn">main</span>() {
    <span class="tok-kw">float</span> <span class="tok-var">r</span> = <span class="tok-num">7</span>;
    <span class="tok-kw">float</span> <span class="tok-var">luas</span> = <span class="tok-fn">LUAS_LINGKARAN</span>(<span class="tok-var">r</span>);
    <span class="tok-kw">#ifdef</span> <span class="tok-var">DEBUG</span>
    <span class="tok-fn">printf</span>(<span class="tok-str">"r=%.2f\\n"</span>, <span class="tok-var">r</span>);
    <span class="tok-kw">#endif</span>
    <span class="tok-fn">printf</span>(<span class="tok-str">"Luas: %.4f\\n"</span>, <span class="tok-var">luas</span>);
    <span class="tok-kw">#if</span> <span class="tok-fn">LUAS_LINGKARAN</span>(<span class="tok-num">7</span>) > <span class="tok-num">150</span>
    <span class="tok-fn">printf</span>(<span class="tok-str">"Lingkaran besar!\\n"</span>);
    <span class="tok-kw">#endif</span>
    <span class="tok-kw">return</span> <span class="tok-num">0</span>;
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-c11"></div>
        </div>
      </div>
      <div class="callout warning"><strong>Peringatan:</strong> Makro preprocessor bukan fungsi — <code>#define KALI(a,b) a*b</code> akan gagal untuk <code>KALI(1+2, 3+4)</code>. Selalu bungkus parameter makro dalam tanda kurung: <code>#define KALI(a,b) ((a)*(b))</code>.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="c-10">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="c-12">Lanjut: Makefile & Build →</button>
      </div>
    </article>

    <!-- C Topic 12 -->
    <article class="topic-section" data-topic="c-12">
      <div class="topic-eyebrow">TOPIK 12 / 12</div>
      <h2 class="topic-title">Makefile & Build</h2>
      <div class="topic-body">
        <p><strong>Make</strong> adalah <em>build automation tool</em> yang menjalankan perintah kompilasi secara otomatis berdasarkan file <strong>Makefile</strong>. Makefile berisi <em>target</em>, <em>dependency</em>, dan <em>recipe</em> — cukup ketik <code>make</code> dan seluruh proyek dikompilasi.</p>
        <p>Dengan Make, kamu tidak perlu mengetik ulang perintah <code>gcc</code> panjang. Cukup sekali tulis aturan di Makefile, lalu <code>make</code> mengerjakan sisanya — hanya file yang berubah yang dikompilasi ulang (<em>incremental build</em>).</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Makefile</div>
          <button class="run-btn" data-run="c12">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13</div>
          <div class="code-content"><span class="tok-cm"># Makefile — build otomatis</span>
<span class="tok-var">CC</span> = gcc
<span class="tok-var">CFLAGS</span> = -Wall -Wextra
<span class="tok-var">TARGET</span> = program
<span class="tok-var">OBJS</span> = main.o math.o utils.o
<span class="tok-var">$(TARGET)</span>: <span class="tok-var">$(OBJS)</span>
    $(CC) $(CFLAGS) -o $@ $^
%.o: %.c
    $(CC) $(CFLAGS) -c $&lt;
.PHONY: clean
clean:
    rm -f $(OBJS) $(TARGET)</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-c12"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Variable <code>$@</code> = nama target, <code>$^</code> = semua dependency, <code>$&lt;</code> = dependency pertama. <code>.PHONY</code> memberitahu Make bahwa target bukan file sungguhan. Jalankan <code>make clean</code> untuk hapus file objek.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="c-11">← Sebelumnya</button>
        <button class="nav-btn primary" type="button" id="finishBtn">Selesai — Kembali ke Library </button>
      </div>
    </article>
  </section>

</main>

<script>
(function() {
  const totalTopics = 12;
  const LANGUAGE = 'c'; // harus sama dengan key di $languages pada get_progress.php
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
  loadProgress().then(() => markDone('c-1'));

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