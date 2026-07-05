<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Python — LearnBase</title>
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
        <div class="brand-sub">Python</div>
      </div>
    </div>
  </div>

  <div class="sidebar-body">
  <nav class="lang-nav" id="langNav">
    <div class="lang-tab active" data-lang="py">
      <span class="lang-dot" style="background:#6B4FD8"></span>
      <span class="lang-tab-text">
        <div class="lang-tab-name">Python</div>
        <div class="lang-tab-meta">12 topik</div>
      </span>
      <span class="lang-tab-pct" data-pct="py">0%</span>
    </div>
    <div class="topic-list" data-list="py">
      <div class="topic-item active" data-topic="py-1"><span class="topic-check"></span>Apa itu Python?</div>
      <div class="topic-item" data-topic="py-2"><span class="topic-check"></span>Variabel & Tipe Data</div>
      <div class="topic-item" data-topic="py-3"><span class="topic-check"></span>Kondisi & Perulangan</div>
      <div class="topic-item" data-topic="py-4"><span class="topic-check"></span>Fungsi & List</div>
      <div class="topic-item" data-topic="py-5"><span class="topic-check"></span>Dictionary & Tuple</div>
      <div class="topic-item" data-topic="py-6"><span class="topic-check"></span>String & Formatting</div>
      <div class="topic-item" data-topic="py-7"><span class="topic-check"></span>File I/O</div>
      <div class="topic-item" data-topic="py-8"><span class="topic-check"></span>Module & Library</div>
      <div class="topic-item" data-topic="py-9"><span class="topic-check"></span>Exception Handling</div>
      <div class="topic-item" data-topic="py-10"><span class="topic-check"></span>List Comprehension</div>
      <div class="topic-item" data-topic="py-11"><span class="topic-check"></span>pip & Virtual Env</div>
      <div class="topic-item" data-topic="py-12"><span class="topic-check"></span>Pengenalan OOP</div>
    </div>
  </div>

  <div class="sidebar-foot">
    <div class="sidebar-footer-label">Progres modul kamu</div>
    <div class="progress-track"><div class="progress-fill" id="progressFill" style="width:0%"></div></div>
    <div class="sidebar-footer-num" id="progressNum">0 / 12 topik selesai</div>
  </div>
</aside>

<main class="main">

  <!-- ================= PYTHON ================= -->
  <section class="content-panel active" data-lang="py">
    <div class="lang-header">
      <div>
        <div class="lang-eyebrow">MODUL 03 · BAHASA UMUM & DATA</div>
        <h1 class="lang-title">Python</h1>
        <p class="lang-desc">Bahasa yang mudah dibaca, sering dipakai untuk mengolah data, membuat skrip otomatisasi, atau membangun API backend untuk platform seperti LearnBase.</p>
      </div>
      <div class="lang-badge">PY</div>
    </div>

    <!-- PY Topic 1 -->
    <article class="topic-section active" data-topic="py-1">
      <div class="topic-eyebrow">TOPIK 1 / 12</div>
      <h2 class="topic-title">Apa itu Python?</h2>
      <div class="topic-body">
        <p>Pernah penasaran bagaimana YouTube merekomendasikan video atau Instagram memfilter spam? Banyak yang dibangun dengan Python. Dengan sintaks yang rapi seperti bahasa Inggris biasa, kamu bisa membuat chatbot, scraper data, atau API backend — langsung praktis, bukan cuma teori.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>halo.py</div>
          <button class="run-btn" data-run="py1">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2</div>
          <div class="code-content"><span class="tok-fn">print</span>(<span class="tok-str">"Halo, LearnBase!"</span>)
<span class="tok-fn">print</span>(<span class="tok-str">"Python siap mengolah data pembelajaranmu."</span>)</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-py1"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Tidak ada titik koma di akhir baris Python — barisnya berakhir begitu saja di akhir baris, bukan dengan tanda baca seperti JavaScript atau PHP.</div>

      <div class="topic-nav">
        <button class="nav-btn" disabled>← Sebelumnya</button>
        <button class="nav-btn primary" data-next="py-2">Lanjut: Variabel & Tipe Data →</button>
      </div>
    </article>

    <!-- PY Topic 2 -->
    <article class="topic-section" data-topic="py-2">
      <div class="topic-eyebrow">TOPIK 2 / 12</div>
      <h2 class="topic-title">Variabel & Tipe Data</h2>
      <div class="topic-body">
        <p>Variabel di Python dibuat langsung tanpa kata kunci khusus — cukup tulis nama dan nilainya. Tipe data dasarnya: <strong>str</strong> (teks), <strong>int</strong>/<strong>float</strong> (angka), <strong>bool</strong> (benar/salah), dan <strong>list</strong> (daftar nilai, ditulis dengan <code>[]</code>).</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>variabel.py</div>
          <button class="run-btn" data-run="py2">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4</div>
          <div class="code-content"><span class="tok-var">nama_modul</span> = <span class="tok-str">"Python Dasar"</span>
<span class="tok-var">skor</span> = <span class="tok-num">92</span>
<span class="tok-var">lulus</span> = <span class="tok-var">skor</span> >= <span class="tok-num">70</span>
<span class="tok-fn">print</span>(<span class="tok-var">nama_modul</span>, <span class="tok-str">"-"</span>, <span class="tok-var">lulus</span>)</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-py2"></div>
        </div>
      </div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz singkat: Apa yang menandai sebuah blok kode di Python (pengganti kurung kurawal)?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">Titik koma ;</button>
          <button class="quiz-opt" data-correct="true">Indentasi (spasi di awal baris)</button>
          <button class="quiz-opt" data-correct="false">Tanda kurung ()</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="py-1">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="py-3">Lanjut: Kondisi & Perulangan →</button>
      </div>
    </article>

    <!-- PY Topic 3 -->
    <article class="topic-section" data-topic="py-3">
      <div class="topic-eyebrow">TOPIK 3 / 12</div>
      <h2 class="topic-title">Kondisi & Perulangan</h2>
      <div class="topic-body">
        <p>Sama seperti bahasa lain, Python punya <code>if/elif/else</code> untuk kondisi, dan <code>for</code> untuk perulangan — biasanya dipakai untuk menelusuri list, misalnya daftar nilai siswa di LearnBase.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>perulangan.py</div>
          <button class="run-btn" data-run="py3">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5</div>
          <div class="code-content"><span class="tok-var">nilai_siswa</span> = [<span class="tok-num">88</span>, <span class="tok-num">72</span>, <span class="tok-num">95</span>]
<span class="tok-kw">for</span> <span class="tok-var">nilai</span> <span class="tok-kw">in</span> <span class="tok-var">nilai_siswa</span>:
    <span class="tok-kw">if</span> <span class="tok-var">nilai</span> >= <span class="tok-num">80</span>:
        <span class="tok-fn">print</span>(<span class="tok-var">nilai</span>, <span class="tok-str">"- Sangat Baik"</span>)
    <span class="tok-kw">else</span>: <span class="tok-fn">print</span>(<span class="tok-var">nilai</span>, <span class="tok-str">"- Cukup"</span>)</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-py3"></div>
        </div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="py-2">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="py-4">Lanjut: Fungsi & List →</button>
      </div>
    </article>

    <!-- PY Topic 4 -->
    <article class="topic-section" data-topic="py-4">
      <div class="topic-eyebrow">TOPIK 4 / 12</div>
      <h2 class="topic-title">Fungsi & List</h2>
      <div class="topic-body">
        <p>Fungsi di Python dibuat dengan kata kunci <code>def</code>. Fungsi memudahkan kita menulis ulang logika yang sama — misalnya menghitung rata-rata nilai modul yang sudah diselesaikan pengguna.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>fungsi.py</div>
          <button class="run-btn" data-run="py4">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4</div>
          <div class="code-content"><span class="tok-kw">def</span> <span class="tok-fn">rata_rata</span>(<span class="tok-var">nilai</span>):
    <span class="tok-kw">return</span> <span class="tok-fn">sum</span>(<span class="tok-var">nilai</span>) / <span class="tok-fn">len</span>(<span class="tok-var">nilai</span>)

<span class="tok-fn">print</span>(<span class="tok-fn">rata_rata</span>([<span class="tok-num">88</span>, <span class="tok-num">72</span>, <span class="tok-num">95</span>]))</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-py4"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Selamat, kamu sudah menyelesaikan dasar Python! Langkah berikutnya: coba gabungkan Python di backend untuk fitur nyata di LearnBase seperti sistem login atau pelacak progres modul.</div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="py-3">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="py-5">Lanjut: Dictionary & Tuple →</button>
      </div>
    </article>

    <!-- PY Topic 5 -->
    <article class="topic-section" data-topic="py-5">
      <div class="topic-eyebrow">TOPIK 5 / 12</div>
      <h2 class="topic-title">Dictionary & Tuple</h2>
      <div class="topic-body">
        <p><strong>Dictionary</strong> (<code>dict</code>) menyimpan data dalam pasangan <em>key-value</em>, mirip object di JavaScript. Sangat berguna untuk data terstruktur seperti profil pengguna. <strong>Tuple</strong> (<code>tuple</code>) mirip list tapi tidak bisa diubah (<em>immutable</em>) — cocok untuk data yang nilainya tetap.</p>
        <p>Dictionary dan tuple sering dipakai bersama: tuple sebagai kunci dictionary, atau dictionary yang berisi tuple sebagai nilai.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>dict.py</div>
          <button class="run-btn" data-run="py5">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-var">pengguna</span> = {
    <span class="tok-str">"nama"</span>: <span class="tok-str">"Citra"</span>,
    <span class="tok-str">"modul"</span>: [<span class="tok-str">"HTML"</span>, <span class="tok-str">"CSS"</span>, <span class="tok-str">"JS"</span>]
}
<span class="tok-fn">print</span>(<span class="tok-str">f"Nama: {pengguna['nama']}"</span>)
<span class="tok-fn">print</span>(<span class="tok-str">f"Modul: {len(pengguna['modul'])} buah"</span>)

<span class="tok-var">koordinat</span> = (<span class="tok-num">10</span>, <span class="tok-num">20</span>)
<span class="tok-var">x</span>, <span class="tok-var">y</span> = <span class="tok-var">koordinat</span>
<span class="tok-fn">print</span>(<span class="tok-str">f"x={x}, y={y}"</span>)</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-py5"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> <em>Tuple unpacking</em> seperti <code>x, y = koordinat</code> adalah fitur keren Python yang membuat kode lebih ringkas. Bisa dipakai juga untuk menukar dua nilai: <code>a, b = b, a</code>!</div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="py-4">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="py-6">Lanjut: String & Formatting →</button>
      </div>
    </article>

    <!-- PY Topic 6 -->
    <article class="topic-section" data-topic="py-6">
      <div class="topic-eyebrow">TOPIK 6 / 12</div>
      <h2 class="topic-title">String & Formatting</h2>
      <div class="topic-body">
        <p>Python punya banyak method bawaan untuk memanipulasi <strong>string</strong> — seperti <code>.upper()</code>, <code>.split()</code>, <code>.strip()</code>, dan <code>.replace()</code>. <strong>Formatting</strong> string bisa dilakukan dengan <em>f-strings</em> (ditandai huruf <code>f</code> sebelum kutip) — cara modern dan paling disarankan sejak Python 3.6.</p>
        <p>Pemrosesan string sangat penting dalam automasi — membaca data dari file teks, memformat output, atau membersihkan input pengguna.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>string.py</div>
          <button class="run-btn" data-run="py6">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-var">teks</span> = <span class="tok-str">"  halo, LearnBase!  "</span>
<span class="tok-fn">print</span>(<span class="tok-var">teks</span>.<span class="tok-fn">strip</span>().<span class="tok-fn">upper</span>())

<span class="tok-var">nama</span> = <span class="tok-str">"Budi"</span>
<span class="tok-var">skor</span> = <span class="tok-num">87</span>
<span class="tok-fn">print</span>(<span class="tok-str">f"</span><span class="tok-var">{nama}</span><span class="tok-str"> mendapat skor </span><span class="tok-var">{skor}</span><span class="tok-str">"</span>)

<span class="tok-var">kata</span> = <span class="tok-str">"python,js,php"</span>
<span class="tok-fn">print</span>(<span class="tok-var">kata</span>.<span class="tok-fn">split</span>(<span class="tok-str">","</span>))</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-py6"></div>
        </div>
      </div>

      <div class="callout note"><strong>Catatan:</strong> String di Python bersifat <em>immutable</em> — method seperti <code>.upper()</code> atau <code>.strip()</code> tidak mengubah string asli, tapi mengembalikan string baru. Ini penting untuk diingat supaya tidak bingung saat hasilnya tidak seperti yang diharapkan.</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz singkat: Cara Python modern untuk memformat string adalah...</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">%s % nama</button>
          <button class="quiz-opt" data-correct="false">nama.format()</button>
          <button class="quiz-opt" data-correct="true">f-string</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="py-5">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="py-7">Lanjut: File I/O →</button>
      </div>
    </article>

    <!-- PY Topic 7 -->
    <article class="topic-section" data-topic="py-7">
      <div class="topic-eyebrow">TOPIK 7 / 12</div>
      <h2 class="topic-title">File I/O</h2>
      <div class="topic-body">
        <p>Python bisa membaca dan menulis file dengan fungsi <code>open()</code>. Gunakan <em>context manager</em> (<code>with</code>) untuk memastikan file tertutup otomatis setelah selesai — ini praktik terbaik yang mencegah kebocoran memori.</p>
        <p>File bisa dibaca sebagai teks atau biner, baris per baris, atau langsung seluruhnya. Mode yang umum: <code>"r"</code> (baca), <code>"w"</code> (tulis), <code>"a"</code> (tambah), dan <code>"rb"/"wb"</code> (biner).</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>file.py</div>
          <button class="run-btn" data-run="py7">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-cm"># Menulis file</span>
<span class="tok-kw">with</span> <span class="tok-fn">open</span>(<span class="tok-str">"progres.txt"</span>, <span class="tok-str">"w"</span>) <span class="tok-kw">as</span> <span class="tok-var">f</span>:
    <span class="tok-var">f</span>.<span class="tok-fn">write</span>(<span class="tok-str">"Modul JS: 75%\n"</span>)
    <span class="tok-var">f</span>.<span class="tok-fn">write</span>(<span class="tok-str">"Modul PHP: 50%"</span>)

<span class="tok-cm"># Membaca file</span>
<span class="tok-kw">with</span> <span class="tok-fn">open</span>(<span class="tok-str">"progres.txt"</span>, <span class="tok-str">"r"</span>) <span class="tok-kw">as</span> <span class="tok-var">f</span>:
    <span class="tok-kw">for</span> <span class="tok-var">baris</span> <span class="tok-kw">in</span> <span class="tok-var">f</span>:
        <span class="tok-fn">print</span>(<span class="tok-var">baris</span>.<span class="tok-fn">strip</span>())</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-py7"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Keyword <code>with</code> otomatis memanggil <code>f.close()</code> saat blok selesai — bahkan jika terjadi error. Ini adalah <em>context manager</em>, salah satu fitur Python yang paling sering dipakai dan paling elegan.</div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="py-6">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="py-8">Lanjut: Module & Library →</button>
      </div>
    </article>

    <!-- PY Topic 8 -->
    <article class="topic-section" data-topic="py-8">
      <div class="topic-eyebrow">TOPIK 8 / 12</div>
      <h2 class="topic-title">Module & Library</h2>
      <div class="topic-body">
        <p>Salah satu kekuatan Python adalah ekosistem <strong>module</strong> dan <strong>library</strong>-nya. Module adalah file <code>.py</code> yang berisi fungsi siap pakai. Library adalah kumpulan module. Python punya <em>standard library</em> yang sangat kaya — cukup pakai <code>import</code> untuk menggunakannya.</p>
        <p>Untuk library eksternal (seperti <code>requests</code> untuk HTTP atau <code>flask</code> untuk web), gunakan <code>pip install nama_library</code>. Di LearnBase, library seperti Flask bisa dipakai untuk membangun API backend.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>module.py</div>
          <button class="run-btn" data-run="py8">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-cm"># Module bawaan Python</span>
<span class="tok-kw">import</span> <span class="tok-var">math</span>
<span class="tok-fn">print</span>(<span class="tok-str">f"π = {math.pi:.2f}"</span>)
<span class="tok-fn">print</span>(<span class="tok-str">f"Akar 144 = {math.sqrt(144)}"</span>)

<span class="tok-cm"># Module tanggal dan waktu</span>
<span class="tok-kw">import</span> <span class="tok-var">datetime</span>
<span class="tok-var">hariIni</span> = <span class="tok-var">datetime</span>.<span class="tok-var">datetime</span>.<span class="tok-fn">now</span>()
<span class="tok-fn">print</span>(<span class="tok-str">f"Hari ini: {hariIni:%d-%m-%Y}"</span>)</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-py8"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Gunakan <code>pip list</code> untuk melihat library yang terinstall, dan <code>pip freeze > requirements.txt</code> untuk menyimpan daftar dependensi proyek — praktik standar di semua proyek Python profesional.</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz singkat: Perintah apa untuk menginstall library eksternal di Python?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">python install</button>
          <button class="quiz-opt" data-correct="true">pip install</button>
          <button class="quiz-opt" data-correct="false">npm install</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="py-7">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="py-9">Lanjut: Exception Handling →</button>
      </div>
    </article>

    <!-- PY Topic 9 -->
    <article class="topic-section" data-topic="py-9">
      <div class="topic-eyebrow">TOPIK 9 / 12</div>
      <h2 class="topic-title">Exception Handling</h2>
      <div class="topic-body">
        <p>Error atau <strong>exception</strong> di Python ditangani dengan blok <code>try</code> / <code>except</code>. Ketika kode di dalam <code>try</code> mengalami error, eksekusi langsung loncat ke blok <code>except</code> — program tidak berhenti mendadak, dan kamu bisa memberi pesan yang informatif ke pengguna.</p>
        <p>Python juga punya blok <code>else</code> (dijalankan kalau tidak ada error) dan <code>finally</code> (selalu dijalankan, cocok untuk pembersihan seperti menutup file).</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>exception.py</div>
          <button class="run-btn" data-run="py9">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10</div>
          <div class="code-content"><span class="tok-kw">try</span>:
    <span class="tok-var">skor</span> = <span class="tok-fn">int</span>(<span class="tok-fn">input</span>(<span class="tok-str">"Masukkan skor: "</span>))
    <span class="tok-kw">if</span> <span class="tok-var">skor</span> &lt; <span class="tok-num">0</span>:
        <span class="tok-kw">raise</span> <span class="tok-fn">ValueError</span>(<span class="tok-str">"Skor tidak boleh negatif"</span>)
    <span class="tok-fn">print</span>(<span class="tok-str">f"Skor valid: {skor}"</span>)
<span class="tok-kw">except</span> <span class="tok-var">ValueError</span> <span class="tok-kw">as</span> <span class="tok-var">e</span>:
    <span class="tok-fn">print</span>(<span class="tok-str">f"Error: {e}"</span>)
<span class="tok-kw">except</span> <span class="tok-var">Exception</span> <span class="tok-kw">as</span> <span class="tok-var">e</span>:
    <span class="tok-fn">print</span>(<span class="tok-str">"Terjadi error tak terduga:"</span>, <span class="tok-var">e</span>)
<span class="tok-kw">finally</span>:
    <span class="tok-fn">print</span>(<span class="tok-str">"Pemeriksaan skor selesai."</span>)</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-py9"></div>
        </div>
      </div>

      <div class="callout note"><strong>Catatan:</strong> Jangan menangkap semua exception dengan <code>except:</code> tanpa menyebut tipe errornya. Selalu tangkap exception spesifik (<code>ValueError</code>, <code>FileNotFoundError</code>, dll) agar bug tersembunyi tidak luput.</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz singkat: Blok mana di Python yang <em>selalu</em> dijalankan baik ada error maupun tidak?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">except</button>
          <button class="quiz-opt" data-correct="false">else</button>
          <button class="quiz-opt" data-correct="true">finally</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="py-8">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="py-10">Lanjut: List Comprehension →</button>
      </div>
    </article>

    <!-- PY Topic 10 -->
    <article class="topic-section" data-topic="py-10">
      <div class="topic-eyebrow">TOPIK 10 / 12</div>
      <h2 class="topic-title">List Comprehension</h2>
      <div class="topic-body">
        <p><strong>List comprehension</strong> adalah cara ringkas untuk membuat list baru dari iterable yang sudah ada — dalam satu baris kode. Ini adalah fitur Python yang sangat populer karena membuat kode lebih bersih tanpa <code>for</code> panjang.</p>
        <p>Pola dasarnya: <code>[ekspresi for item in iterable if kondisi]</code>. Kamu bisa menyaring, memetakan, dan bahkan membuat nested comprehension.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>comprehension.py</div>
          <button class="run-btn" data-run="py10">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8</div>
          <div class="code-content"><span class="tok-var">angka</span> = [<span class="tok-num">1</span>, <span class="tok-num">2</span>, <span class="tok-num">3</span>, <span class="tok-num">4</span>, <span class="tok-num">5</span>, <span class="tok-num">6</span>]

<span class="tok-cm"># Kuadrat setiap bilangan genap</span>
<span class="tok-var">genap_kuadrat</span> = [<span class="tok-var">n</span>**<span class="tok-num">2</span> <span class="tok-kw">for</span> <span class="tok-var">n</span> <span class="tok-kw">in</span> <span class="tok-var">angka</span> <span class="tok-kw">if</span> <span class="tok-var">n</span> % <span class="tok-num">2</span> == <span class="tok-num">0</span>]
<span class="tok-fn">print</span>(<span class="tok-str">"Genap kuadrat:"</span>, <span class="tok-var">genap_kuadrat</span>)

<span class="tok-cm"># Dictionary comprehension</span>
<span class="tok-var">kuadrat_dict</span> = {<span class="tok-var">n</span>: <span class="tok-var">n</span>**<span class="tok-num">2</span> <span class="tok-kw">for</span> <span class="tok-var">n</span> <span class="tok-kw">in</span> <span class="tok-var">angka</span>}
<span class="tok-fn">print</span>(<span class="tok-str">"Kuadrat dict:"</span>, <span class="tok-var">kuadrat_dict</span>)</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-py10"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> List comprehension bisa dibaca seperti kalimat Inggris: <code>[n**2 for n in angka if n % 2 == 0]</code> artinya "beri saya n kuadrat untuk setiap n di angka, jika n genap". Komprehensi bersarang (<em>nested comprehension</em>) juga dimungkinkan, tapi jangan sampai barisnya terlalu panjang!</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz singkat: Apa output dari <code>[x*2 for x in range(3)]</code>?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">[0, 1, 2]</button>
          <button class="quiz-opt" data-correct="true">[0, 2, 4]</button>
          <button class="quiz-opt" data-correct="false">[2, 4, 6]</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="py-9">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="py-11">Lanjut: pip & Virtual Env →</button>
      </div>
    </article>

    <!-- PY Topic 11 -->
    <article class="topic-section" data-topic="py-11">
      <div class="topic-eyebrow">TOPIK 11 / 12</div>
      <h2 class="topic-title">pip & Virtual Env</h2>
      <div class="topic-body">
        <p><strong>pip</strong> adalah package manager bawaan Python untuk menginstall library eksternal dari Python Package Index (PyPI). <strong>Virtual environment</strong> (venv) adalah lingkungan Python terisolasi per proyek — mencegah konflik versi library antar proyek. Keduanya adalah alat wajib dalam pengembangan Python profesional.</p>
        <p>Virtual env dibuat dengan <code>python -m venv nama_env</code>, lalu diaktifkan. Semua <code>pip install</code> yang dijalankan setelahnya hanya berdampak di lingkungan tersebut — tidak mengganggu proyek lain.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>pip_venv.sh</div>
          <button class="run-btn" data-run="py11">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</div>
          <div class="code-content"><span class="tok-cm"># Buat virtual environment</span>
$ <span class="tok-var">python -m venv belajar_env</span>

<span class="tok-cm"># Aktifkan (Linux/macOS)</span>
$ <span class="tok-var">source belajar_env/bin/activate</span>

<span class="tok-cm"># Aktifkan (Windows)</span>
$ <span class="tok-var">belajar_env\Scripts\activate</span>

<span class="tok-cm"># Install library di dalam venv</span>
$ <span class="tok-var">pip install requests flask pandas</span>

<span class="tok-cm"># Keluar dari venv</span>
$ <span class="tok-var">deactivate</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-py11"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Biasakan membuat <code>requirements.txt</code> di setiap proyek dengan menjalankan <code>pip freeze > requirements.txt</code>. File ini berisi daftar library dan versinya — siapa pun bisa mereproduksi environment dengan <code>pip install -r requirements.txt</code>.</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz singkat: Perintah apa untuk membuat virtual environment baru bernama <code>myenv</code>?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">pip create myenv</button>
          <button class="quiz-opt" data-correct="true">python -m venv myenv</button>
          <button class="quiz-opt" data-correct="false">virtual myenv</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="py-10">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="py-12">Lanjut: Pengenalan OOP →</button>
      </div>
    </article>

    <!-- PY Topic 12 -->
    <article class="topic-section" data-topic="py-12">
      <div class="topic-eyebrow">TOPIK 12 / 12</div>
      <h2 class="topic-title">Pengenalan OOP</h2>
      <div class="topic-body">
        <p><strong>OOP (Object-Oriented Programming)</strong> di Python menggunakan <code>class</code> untuk membuat cetak biru objek. Setiap class bisa punya <em>method</em> (fungsi di dalam class) dan <em>attribute</em> (data yang dimiliki objek). Constructor <code>__init__()</code> dijalankan saat objek dibuat.</p>
        <p>Python mendukung pilar OOP: <strong>encapsulation</strong> (pembungkusan data), <strong>inheritance</strong> (pewarisan), dan <strong>polymorphism</strong> (banyak bentuk) — semuanya dengan sintaks yang lebih ringan dari Java.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>oop.py</div>
          <button class="run-btn" data-run="py12">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14</div>
          <div class="code-content"><span class="tok-kw">class</span> <span class="tok-var">Siswa</span>:
    <span class="tok-kw">def</span> <span class="tok-fn">__init__</span>(<span class="tok-kw">self</span>, <span class="tok-var">nama</span>, <span class="tok-var">skor</span>):
        <span class="tok-kw">self</span>.<span class="tok-var">nama</span> = <span class="tok-var">nama</span>
        <span class="tok-kw">self</span>.<span class="tok-var">skor</span> = <span class="tok-var">skor</span>

    <span class="tok-kw">def</span> <span class="tok-fn">tampil</span>(<span class="tok-kw">self</span>):
        <span class="tok-kw">return</span> <span class="tok-str">f"</span><span class="tok-var">{self.nama}</span><span class="tok-str">: </span><span class="tok-var">{self.skor}</span><span class="tok-str">"</span>

<span class="tok-cm"># Inheritance</span>
<span class="tok-kw">class</span> <span class="tok-var">SiswaAktif</span>(<span class="tok-var">Siswa</span>):
    <span class="tok-kw">def</span> <span class="tok-fn">tampil</span>(<span class="tok-kw">self</span>):
        <span class="tok-kw">return</span> <span class="tok-str">f"⭐ {self.nama}: {self.skor}"</span>

<span class="tok-var">s1</span> = <span class="tok-fn">SiswaAktif</span>(<span class="tok-str">"Budi"</span>, <span class="tok-num">92</span>)
<span class="tok-fn">print</span>(<span class="tok-var">s1</span>.<span class="tok-fn">tampil</span>())</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-py12"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Method <code>__init__</code> adalah constructor Python — dijalankan otomatis saat objek dibuat. Parameter <code>self</code> merujuk pada objek itu sendiri, seperti <code>this</code> di Java/JS.</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz singkat: Kata kunci apa untuk membuat class di Python?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">struct</button>
          <button class="quiz-opt" data-correct="false">object</button>
          <button class="quiz-opt" data-correct="true">class</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="py-11">← Sebelumnya</button>
        <button class="nav-btn primary" type="button" id="finishBtn">Selesai — Kembali ke Library </button>
      </div>
    </article>
  </section>

</main>

<script>
(function() {
  const totalTopics = 12;
  const LANGUAGE = 'py'; // harus sama dengan key di $languages pada get_progress.php
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
  loadProgress().then(() => markDone('py-1'));

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