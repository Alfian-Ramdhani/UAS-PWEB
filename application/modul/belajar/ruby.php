<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ruby — LearnBase</title>
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
        <div class="brand-sub">Ruby</div>
      </div>
    </div>
  </div>

  <div class="sidebar-body">
  <nav class="lang-nav" id="langNav">
    <div class="lang-tab active" data-lang="ruby">
      <span class="lang-dot" style="background:#6B4FD8"></span>
      <span class="lang-tab-text">
        <div class="lang-tab-name">Ruby</div>
        <div class="lang-tab-meta">12 topik</div>
      </span>
      <span class="lang-tab-pct" data-pct="ruby">0%</span>
    </div>
    <div class="topic-list" data-list="ruby">
      <div class="topic-item active" data-topic="ruby-1"><span class="topic-check"></span>Apa itu Ruby?</div>
      <div class="topic-item" data-topic="ruby-2"><span class="topic-check"></span>Variabel & Tipe</div>
      <div class="topic-item" data-topic="ruby-3"><span class="topic-check"></span>Kondisi & Unless</div>
      <div class="topic-item" data-topic="ruby-4"><span class="topic-check"></span>Perulangan & Each</div>
      <div class="topic-item" data-topic="ruby-5"><span class="topic-check"></span>Array & Hash</div>
      <div class="topic-item" data-topic="ruby-6"><span class="topic-check"></span>Method & Block</div>
      <div class="topic-item" data-topic="ruby-7"><span class="topic-check"></span>Class & Object</div>
      <div class="topic-item" data-topic="ruby-8"><span class="topic-check"></span>Symbol & Module</div>
      <div class="topic-item" data-topic="ruby-9"><span class="topic-check"></span>Enumerable</div>
      <div class="topic-item" data-topic="ruby-10"><span class="topic-check"></span>File I/O</div>
      <div class="topic-item" data-topic="ruby-11"><span class="topic-check"></span>Exception</div>
      <div class="topic-item" data-topic="ruby-12"><span class="topic-check"></span>Mixin & Inheritance</div>
    </div>
  </div>

  <div class="sidebar-foot">
    <div class="sidebar-footer-label">Progres modul kamu</div>
    <div class="progress-track"><div class="progress-fill" id="progressFill" style="width:0%"></div></div>
    <div class="sidebar-footer-num" id="progressNum">0 / 12 topik selesai</div>
  </div>
</aside>

<main class="main">

  <!-- ================= RUBY ================= -->
  <section class="content-panel active" data-lang="ruby">
    <div class="lang-header">
      <div>
        <div class="lang-eyebrow">MODUL 09 · BAHASA ELEGAN & PRODUKTIF</div>
        <h1 class="lang-title">Ruby</h1>
        <p class="lang-desc">Dirancang untuk produktivitas dan kebahagiaan developer. Sintaks Ruby sangat alami dan ekspresif — populer lewat framework web Ruby on Rails.</p>
      </div>
      <div class="lang-badge">RB</div>
    </div>

    <article class="topic-section active" data-topic="ruby-1">
      <div class="topic-eyebrow">TOPIK 1 / 12</div>
      <h2 class="topic-title">Apa itu Ruby?</h2>
      <div class="topic-body">
        <p>Ruby adalah bahasa yang ditulis senatural kalimat Inggris biasa — kamu bisa langsung membaca kodenya tanpa perlu "menerjemahkan" ke logika mesin. Dengan Ruby on Rails, kamu bisa membangun aplikasi web lengkap seperti yang dipakai Airbnb, GitHub, dan Twitter versi awal hanya dalam hitungan jam. Intinya: coding yang terasa seperti menulis, bukan memberatkan.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>halo.rb</div>
          <button class="run-btn" data-run="ruby1">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2</div>
          <div class="code-content"><span class="tok-var">nama</span> = <span class="tok-str">"LearnBase"</span>
<span class="tok-fn">puts</span> <span class="tok-str">"Halo, #{nama}"</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-ruby1"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>puts</code> = put string — mencetak teks diikuti baris baru. <code>print</code> tanpa baris baru, <code>p</code> untuk debugging.</div>
      <div class="topic-nav">
        <button class="nav-btn" disabled>← Sebelumnya</button>
        <button class="nav-btn primary" data-next="ruby-2">Lanjut: Variabel & Tipe →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="ruby-2">
      <div class="topic-eyebrow">TOPIK 2 / 12</div>
      <h2 class="topic-title">Variabel & Tipe</h2>
      <div class="topic-body">
        <p>Ruby adalah <strong>dynamically typed</strong>. Tipe dasar: <code>Integer</code>, <code>Float</code>, <code>String</code>, <code>Symbol</code>, <code>Array</code>, <code>Hash</code>. Semua di Ruby adalah objek — bahkan angka!</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>var.rb</div>
          <button class="run-btn" data-run="ruby2">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4</div>
          <div class="code-content"><span class="tok-var">skor</span> = <span class="tok-num">87</span>
<span class="tok-var">nama</span> = <span class="tok-str">"Ruby Dasar"</span>
<span class="tok-var">lulus</span> = <span class="tok-var">skor</span> >= <span class="tok-num">70</span>
<span class="tok-fn">puts</span> <span class="tok-str">"#{nama}: #{lulus}, tipe: #{lulus.class}"</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-ruby2"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> Di Ruby, <code>#{nama}</code> untuk interpolasi string (mirip f-string Python). Setiap variabel punya method <code>.class</code> untuk cek tipe.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="ruby-1">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="ruby-3">Lanjut: Kondisi & Unless →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="ruby-3">
      <div class="topic-eyebrow">TOPIK 3 / 12</div>
      <h2 class="topic-title">Kondisi & Unless</h2>
      <div class="topic-body">
        <p>Ruby punya <code>if</code> dan <code>unless</code> (kebalikan if). <code>unless</code> menjalankan kode jika kondisi <strong>false</strong>. Ini membuat kode lebih alami untuk kondisi negatif.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>kondisi.rb</div>
          <button class="run-btn" data-run="ruby3">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-var">nilai</span> = <span class="tok-num">85</span>
<span class="tok-kw">if</span> <span class="tok-var">nilai</span> >= <span class="tok-num">80</span>
    <span class="tok-fn">puts</span> <span class="tok-str">"Baik"</span>
<span class="tok-kw">end</span>
<span class="tok-kw">unless</span> <span class="tok-var">nilai</span> &lt; <span class="tok-num">60</span>
    <span class="tok-fn">puts</span> <span class="tok-str">"Tidak remedial"</span>
<span class="tok-kw">end</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-ruby3"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Ruby juga punya <em>modifier form</em>: <code>puts "Lulus" if skor >= 70</code> — kondisi ditulis di akhir baris.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="ruby-2">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="ruby-4">Lanjut: Perulangan & Each →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="ruby-4">
      <div class="topic-eyebrow">TOPIK 4 / 12</div>
      <h2 class="topic-title">Perulangan & Each</h2>
      <div class="topic-body">
        <p>Ruby lebih sering pakai <code>.each</code> daripada <code>for</code>. <code>each</code> adalah method yang menerima <em>block</em> — blok kode di antara <code>do...end</code> atau <code>{ }</code>. Ini adalah pola iterasi utama Ruby.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>each.rb</div>
          <button class="run-btn" data-run="ruby4">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5</div>
          <div class="code-content">[<span class="tok-str">"HTML"</span>, <span class="tok-str">"CSS"</span>, <span class="tok-str">"JS"</span>].<span class="tok-fn">each</span> <span class="tok-kw">do</span> |<span class="tok-var">m</span>|
    <span class="tok-fn">puts</span> <span class="tok-str">"Modul: #{m}"</span>
<span class="tok-kw">end</span>

(<span class="tok-num">1</span>..<span class="tok-num">3</span>).<span class="tok-fn">each</span> { |<span class="tok-var">i</span>| <span class="tok-fn">puts</span> <span class="tok-str">"#{i}. Belajar"</span> }</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-ruby4"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> <code>do |var| ... end</code> dan <code>{ |var| ... }</code> adalah <em>block</em> — fitur paling khas Ruby. <code>|var|</code> adalah parameter blok.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="ruby-3">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="ruby-5">Lanjut: Array & Hash →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="ruby-5">
      <div class="topic-eyebrow">TOPIK 5 / 12</div>
      <h2 class="topic-title">Array & Hash</h2>
      <div class="topic-body">
        <p><strong>Array</strong> indeks dimulai 0. <strong>Hash</strong> adalah dictionary/koleksi key-value — mirip Object JS atau dict Python. Ruby punya banyak method untuk transformasi array seperti <code>map</code>, <code>select</code>, <code>reduce</code>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>hash.rb</div>
          <button class="run-btn" data-run="ruby5">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5</div>
          <div class="code-content"><span class="tok-var">pengguna</span> = { <span class="tok-var">nama</span>: <span class="tok-str">"Citra"</span>, <span class="tok-var">skor</span>: <span class="tok-num">92</span> }
<span class="tok-fn">puts</span> <span class="tok-str">"#{pengguna[:nama]}: #{pengguna[:skor]}"</span>

<span class="tok-var">angka</span> = [<span class="tok-num">1</span>, <span class="tok-num">2</span>, <span class="tok-num">3</span>]
<span class="tok-fn">puts</span> <span class="tok-var">angka</span>.<span class="tok-fn">map</span> { |<span class="tok-var">n</span>| <span class="tok-var">n</span> * <span class="tok-var">n</span> }</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-ruby5"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>{ nama: "Citra" }</code> adalah sintaks Ruby modern untuk hash dengan key symbol. Setara dengan <code>{ :nama => "Citra" }</code>.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="ruby-4">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="ruby-6">Lanjut: Method & Block →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="ruby-6">
      <div class="topic-eyebrow">TOPIK 6 / 12</div>
      <h2 class="topic-title">Method & Block</h2>
      <div class="topic-body">
        <p><strong>Method</strong> didefinisikan dengan <code>def</code>. Ruby mengembalikan nilai terakhir yang dievaluasi — tidak perlu <code>return</code> eksplisit. <strong>Block</strong> bisa diterima method dengan <code>yield</code>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>method.rb</div>
          <button class="run-btn" data-run="ruby6">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-kw">def</span> <span class="tok-fn">sapa</span>(<span class="tok-var">nama</span>)
    <span class="tok-str">"Halo #{nama}"</span>
<span class="tok-kw">end</span>

<span class="tok-kw">def</span> <span class="tok-fn">ulang</span>(<span class="tok-var">kali</span>)
    <span class="tok-var">kali</span>.<span class="tok-fn">times</span> { <span class="tok-fn">yield</span> }
<span class="tok-kw">end</span>

<span class="tok-fn">puts</span> <span class="tok-fn">sapa</span>(<span class="tok-str">"Budi"</span>)</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-ruby6"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> Ruby tidak punya <code>return</code> eksplisit — nilai baris terakhir method otomatis dikembalikan. <code>yield</code> memanggil block yang diberikan.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="ruby-5">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="ruby-7">Lanjut: Class & Object →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="ruby-7">
      <div class="topic-eyebrow">TOPIK 7 / 12</div>
      <h2 class="topic-title">Class & Object</h2>
      <div class="topic-body">
        <p>Di Ruby, <strong>semuanya adalah objek</strong> — termasuk angka, string, bahkan <code>nil</code>. Class didefinisikan dengan <code>class</code>, dan <code>attr_accessor</code> untuk membuat getter/setter otomatis.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>class.rb</div>
          <button class="run-btn" data-run="ruby7">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</div>
          <div class="code-content"><span class="tok-kw">class</span> <span class="tok-var">Siswa</span>
    <span class="tok-kw">attr_accessor</span> :<span class="tok-var">nama</span>, :<span class="tok-var">skor</span>

    <span class="tok-kw">def</span> <span class="tok-fn">initialize</span>(<span class="tok-var">nama</span>, <span class="tok-var">skor</span>)
        @<span class="tok-var">nama</span> = <span class="tok-var">nama</span>
        @<span class="tok-var">skor</span> = <span class="tok-var">skor</span>
    <span class="tok-kw">end</span>
<span class="tok-kw">end</span>
<span class="tok-var">s</span> = <span class="tok-var">Siswa</span>.<span class="tok-fn">new</span>(<span class="tok-str">"Budi"</span>, <span class="tok-num">87</span>)
<span class="tok-fn">puts</span> <span class="tok-str">"#{s.nama}: #{s.skor}"</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-ruby7"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>@nama</code> = <em>instance variable</em>. <code>attr_accessor :nama</code> membuat method <code>nama</code> dan <code>nama=</code> secara otomatis.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="ruby-6">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="ruby-8">Lanjut: Symbol & Module →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="ruby-8">
      <div class="topic-eyebrow">TOPIK 8 / 12</div>
      <h2 class="topic-title">Symbol & Module</h2>
      <div class="topic-body">
        <p><strong>Symbol</strong> (<code>:nama</code>) adalah string khusus yang dioptimalkan untuk perbandingan — lebih cepat dari string biasa. <strong>Module</strong> adalah kumpulan method yang bisa dicampurkan (<em>mixin</em>) ke class dengan <code>include</code>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>module.rb</div>
          <button class="run-btn" data-run="ruby8">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10</div>
          <div class="code-content"><span class="tok-kw">module</span> <span class="tok-var">Export</span>
    <span class="tok-kw">def</span> <span class="tok-fn">ke_json</span>
        <span class="tok-str">"{nama: #{@nama}}"</span>
    <span class="tok-kw">end</span>
<span class="tok-kw">end</span>

<span class="tok-kw">class</span> <span class="tok-var">Siswa</span>
    <span class="tok-kw">include</span> <span class="tok-var">Export</span>
<span class="tok-kw">end</span>

<span class="tok-fn">puts</span> <span class="tok-var">Siswa</span>.<span class="tok-fn">new</span>.<span class="tok-fn">ke_json</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-ruby8"></div>
        </div>
      </div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz: Keyword output Ruby untuk cetak + baris baru?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">print</button>
          <button class="quiz-opt" data-correct="true">puts</button>
          <button class="quiz-opt" data-correct="false">echo</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="ruby-7">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="ruby-9">Lanjut: Enumerable →</button>
      </div>
    </article>

    <!-- Ruby Topic 9 -->
    <article class="topic-section" data-topic="ruby-9">
      <div class="topic-eyebrow">TOPIK 9 / 12</div>
      <h2 class="topic-title">Enumerable</h2>
      <div class="topic-body">
        <p><strong>Enumerable</strong> adalah modul inti Ruby dengan puluhan method untuk koleksi — <code>map</code>, <code>select</code>, <code>reduce</code>, <code>sort_by</code>, <code>each_with_index</code>. Cukup <code>include Enumerable</code> dan implementasi <code>each</code>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>enumerable.rb</div>
          <button class="run-btn" data-run="ruby9">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-var">angka</span> = [<span class="tok-num">1</span>, <span class="tok-num">2</span>, <span class="tok-num">3</span>, <span class="tok-num">4</span>, <span class="tok-num">5</span>]
<span class="tok-var">genap</span> = <span class="tok-var">angka</span>.<span class="tok-fn">select</span> { |<span class="tok-var">n</span>| <span class="tok-var">n</span>.<span class="tok-fn">even?</span> }
<span class="tok-var">kuadrat</span> = <span class="tok-var">genap</span>.<span class="tok-fn">map</span> { |<span class="tok-var">n</span>| <span class="tok-var">n</span> * <span class="tok-var">n</span> }
<span class="tok-fn">p</span> <span class="tok-var">genap</span>
<span class="tok-fn">p</span> <span class="tok-var">kuadrat</span>
<span class="tok-fn">p</span> <span class="tok-var">kuadrat</span>.<span class="tok-fn">reduce</span>(:<span class="tok-var">+</span>)</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-ruby9"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>p</code> mencetak representasi objek lebih detail daripada <code>puts</code> — berguna untuk debugging.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="ruby-8">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="ruby-10">Lanjut: File I/O →</button>
      </div>
    </article>

    <!-- Ruby Topic 10 -->
    <article class="topic-section" data-topic="ruby-10">
      <div class="topic-eyebrow">TOPIK 10 / 12</div>
      <h2 class="topic-title">File I/O</h2>
      <div class="topic-body">
        <p>API file Ruby elegan: <code>File.read</code>, <code>File.readlines</code>, <code>File.write</code>. <code>File.open</code> dengan block otomatis menutup file.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>file.rb</div>
          <button class="run-btn" data-run="ruby10">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-var">File</span>.<span class="tok-fn">write</span>(<span class="tok-str">"progres.txt"</span>, <span class="tok-str">"Modul Ruby: 100%"</span>)
<span class="tok-var">File</span>.<span class="tok-fn">open</span>(<span class="tok-str">"progres.txt"</span>, <span class="tok-str">"r"</span>) <span class="tok-kw">do</span> |<span class="tok-var">f</span>|
    <span class="tok-var">f</span>.<span class="tok-fn">each_line</span> { |<span class="tok-var">line</span>| <span class="tok-fn">puts</span> <span class="tok-var">line</span> }
<span class="tok-kw">end</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-ruby10"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> <code>File.open</code> dengan block otomatis close — mencegah kebocoran memori.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="ruby-9">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="ruby-11">Lanjut: Exception →</button>
      </div>
    </article>

    <!-- Ruby Topic 11 -->
    <article class="topic-section" data-topic="ruby-11">
      <div class="topic-eyebrow">TOPIK 11 / 12</div>
      <h2 class="topic-title">Exception</h2>
      <div class="topic-body">
        <p>Ruby pakai <code>begin/rescue/end</code>. <code>ensure</code> selalu jalan. <code>raise</code> untuk melempar exception.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>exception.rb</div>
          <button class="run-btn" data-run="ruby11">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-kw">begin</span>
    <span class="tok-var">hasil</span> = <span class="tok-num">10</span> / <span class="tok-num">0</span>
<span class="tok-kw">rescue</span> <span class="tok-var">ZeroDivisionError</span> => <span class="tok-var">e</span>
    <span class="tok-fn">puts</span> <span class="tok-str">"Error: #{e.message}"</span>
<span class="tok-kw">ensure</span>
    <span class="tok-fn">puts</span> <span class="tok-str">"Selesai"</span>
<span class="tok-kw">end</span></div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-ruby11"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>raise</code> melempar exception. <code>retry</code> di rescue untuk mencoba ulang.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="ruby-10">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="ruby-12">Lanjut: Mixin & Inheritance →</button>
      </div>
    </article>

    <!-- Ruby Topic 12 -->
    <article class="topic-section" data-topic="ruby-12">
      <div class="topic-eyebrow">TOPIK 12 / 12</div>
      <h2 class="topic-title">Mixin & Inheritance</h2>
      <div class="topic-body">
        <p>Ruby punya single inheritance + multiple mixin. <code>include</code> untuk instance method, <code>extend</code> untuk class method.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>mixin.rb</div>
          <button class="run-btn" data-run="ruby12">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10</div>
          <div class="code-content"><span class="tok-kw">module</span> <span class="tok-var">Loggable</span>
    <span class="tok-kw">def</span> <span class="tok-fn">log</span>(<span class="tok-var">msg</span>)
        <span class="tok-fn">puts</span> <span class="tok-str">"[LOG] #{msg}"</span>
    <span class="tok-kw">end</span>
<span class="tok-kw">end</span>
<span class="tok-kw">class</span> <span class="tok-var">Siswa</span>
    <span class="tok-kw">include</span> <span class="tok-var">Loggable</span>
<span class="tok-kw">end</span>
<span class="tok-var">Siswa</span>.<span class="tok-fn">new</span>.<span class="tok-fn">log</span>(<span class="tok-str">"Belajar Ruby mixin"</span>)</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-ruby12"></div>
        </div>
      </div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz: Keyword mixin untuk instance method?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="true">include</button>
          <button class="quiz-opt" data-correct="false">extend</button>
          <button class="quiz-opt" data-correct="false">prepend</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="ruby-11">← Sebelumnya</button>
        <button class="nav-btn primary" type="button" id="finishBtn">Selesai — Kembali ke Library </button>
      </div>
    </article>
  </section>

</main>

<script>
(function() {
  const totalTopics = 12;
  const LANGUAGE = 'ruby'; // harus sama dengan key di $languages pada get_progress.php
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
  loadProgress().then(() => markDone('ruby-1'));

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