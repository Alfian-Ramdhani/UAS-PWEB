<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Go — LearnBase</title>
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
        <div class="brand-sub">Go</div>
      </div>
    </div>
  </div>

  <div class="sidebar-body">
  <nav class="lang-nav" id="langNav">
    <div class="lang-tab active" data-lang="go">
      <span class="lang-dot" style="background:#6B4FD8"></span>
      <span class="lang-tab-text">
        <div class="lang-tab-name">Go</div>
        <div class="lang-tab-meta">12 topik</div>
      </span>
      <span class="lang-tab-pct" data-pct="go">0%</span>
    </div>
    <div class="topic-list" data-list="go">
      <div class="topic-item active" data-topic="go-1"><span class="topic-check"></span>Apa itu Go?</div>
      <div class="topic-item" data-topic="go-2"><span class="topic-check"></span>Variabel & Tipe</div>
      <div class="topic-item" data-topic="go-3"><span class="topic-check"></span>Kondisi & Switch</div>
      <div class="topic-item" data-topic="go-4"><span class="topic-check"></span>Perulangan & Range</div>
      <div class="topic-item" data-topic="go-5"><span class="topic-check"></span>Array & Slice</div>
      <div class="topic-item" data-topic="go-6"><span class="topic-check"></span>Fungsi & Multiple Return</div>
      <div class="topic-item" data-topic="go-7"><span class="topic-check"></span>Struct & Method</div>
      <div class="topic-item" data-topic="go-8"><span class="topic-check"></span>Pointer & Interface</div>
      <div class="topic-item" data-topic="go-9"><span class="topic-check"></span>Goroutine</div>
      <div class="topic-item" data-topic="go-10"><span class="topic-check"></span>Channel & Select</div>
      <div class="topic-item" data-topic="go-11"><span class="topic-check"></span>WaitGroup & Mutual Exclusion</div>
      <div class="topic-item" data-topic="go-12"><span class="topic-check"></span>Package & Module</div>
    </div>
  </div>

  <div class="sidebar-foot">
    <div class="sidebar-footer-label">Progres modul kamu</div>
    <div class="progress-track"><div class="progress-fill" id="progressFill" style="width:0%"></div></div>
    <div class="sidebar-footer-num" id="progressNum">0 / 12 topik selesai</div>
  </div>
</aside>

<main class="main">

  <!-- ================= GO ================= -->
  <section class="content-panel active" data-lang="go">
    <div class="lang-header">
      <div>
        <div class="lang-eyebrow">MODUL 08 · BAHASA CLOUD & KONKURENSI</div>
        <h1 class="lang-title">Go</h1>
        <p class="lang-desc">Bahasa modern dari Google yang menggabungkan sintaks sederhana dengan performa tinggi dan <em>built-in concurrency</em> — populer untuk backend, cloud, dan microservices.</p>
      </div>
      <div class="lang-badge">GO</div>
    </div>

    <article class="topic-section active" data-topic="go-1">
      <div class="topic-eyebrow">TOPIK 1 / 12</div>
      <h2 class="topic-title">Apa itu Go?</h2>
      <div class="topic-body">
        <p>Bayangkan bisa bikin aplikasi sekelas Docker hanya dengan kode yang sesederhana Python — itulah Go. Bahasa ciptaan Google ini dipakai oleh Netflix, Twitch, dan Dropbox untuk backend dan layanan cloud mereka karena performanya tinggi dan punya kemampuan menjalankan banyak tugas bersamaan dengan mudah.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>main.go</div>
          <button class="run-btn" data-run="go1">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-kw">package</span> <span class="tok-var">main</span>
<span class="tok-kw">import</span> <span class="tok-str">"fmt"</span>
<span class="tok-kw">func</span> <span class="tok-fn">main</span>() {
    <span class="tok-var">nama</span> := <span class="tok-str">"LearnBase"</span>
    <span class="tok-var">fmt</span>.<span class="tok-fn">Println</span>(<span class="tok-str">"Halo, "</span> + <span class="tok-var">nama</span>)
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-go1"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Operator <code>:=</code> untuk deklarasi + inisialisasi singkat — tipe dideteksi otomatis. Ini fitur khas Go.</div>
      <div class="topic-nav">
        <button class="nav-btn" disabled>← Sebelumnya</button>
        <button class="nav-btn primary" data-next="go-2">Lanjut: Variabel & Tipe →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="go-2">
      <div class="topic-eyebrow">TOPIK 2 / 12</div>
      <h2 class="topic-title">Variabel & Tipe</h2>
      <div class="topic-body">
        <p>Go punya tipe <code>int</code>, <code>float64</code>, <code>string</code>, <code>bool</code>. Semua variabel yang dideklarasikan <strong>wajib dipakai</strong> — jika tidak, kode tidak akan kompilasi. Ini desain Go untuk mencegah kode kotor.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>var.go</div>
          <button class="run-btn" data-run="go2">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-kw">var</span> <span class="tok-var">skor</span> <span class="tok-kw">int</span> = <span class="tok-num">87</span>
<span class="tok-var">nama</span> := <span class="tok-str">"Go Dasar"</span>
<span class="tok-var">lulus</span> := <span class="tok-var">skor</span> >= <span class="tok-num">70</span>
<span class="tok-var">fmt</span>.<span class="tok-fn">Printf</span>(<span class="tok-str">"%s: %t\\n"</span>, <span class="tok-var">nama</span>, <span class="tok-var">lulus</span>)
<span class="tok-var">fmt</span>.<span class="tok-fn">Println</span>(<span class="tok-str">"Skor:"</span>, <span class="tok-var">skor</span>)</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-go2"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> Go <code>Printf</code> pakai format specifier: <code>%s</code> string, <code>%d</code> int, <code>%t</code> bool, <code>%f</code> float — mirip C.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="go-1">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="go-3">Lanjut: Kondisi & Switch →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="go-3">
      <div class="topic-eyebrow">TOPIK 3 / 12</div>
      <h2 class="topic-title">Kondisi & Switch</h2>
      <div class="topic-body">
        <p><code>if</code> di Go tanpa kurung <code>()</code> di sekitar kondisi — tidak seperti C/Java. <code>switch</code> tidak perlu <code>break</code> — setiap case berhenti otomatis.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>kondisi.go</div>
          <button class="run-btn" data-run="go3">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8</div>
          <div class="code-content"><span class="tok-kw">if</span> <span class="tok-var">nilai</span> >= <span class="tok-num">80</span> {
    <span class="tok-var">fmt</span>.<span class="tok-fn">Println</span>(<span class="tok-str">"Baik"</span>)
} <span class="tok-kw">else</span> {
    <span class="tok-var">fmt</span>.<span class="tok-fn">Println</span>(<span class="tok-str">"Cukup"</span>)
}
<span class="tok-kw">switch</span> <span class="tok-var">nilai</span> / <span class="tok-num">10</span> {
    <span class="tok-kw">case</span> <span class="tok-num">8</span>: <span class="tok-var">fmt</span>.<span class="tok-fn">Print</span>(<span class="tok-str">"A"</span>)
    <span class="tok-kw">default</span>: <span class="tok-var">fmt</span>.<span class="tok-fn">Print</span>(<span class="tok-str">"B"</span>)
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-go3"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>switch</code> di Go bisa digunakan untuk <em>if-else chain</em> dengan menulis <code>switch {}</code> tanpa expression — sangat fleksibel!</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="go-2">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="go-4">Lanjut: Perulangan & Range →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="go-4">
      <div class="topic-eyebrow">TOPIK 4 / 12</div>
      <h2 class="topic-title">Perulangan & Range</h2>
      <div class="topic-body">
        <p>Go hanya punya <code>for</code> — tidak ada <code>while</code> atau <code>do-while</code>. Tapi <code>for</code> bisa dipakai untuk semua pola perulangan. Keyword <code>range</code> untuk iterasi array, slice, map, atau string.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>loop.go</div>
          <button class="run-btn" data-run="go4">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
          <div class="code-content"><span class="tok-var">modul</span> := []<span class="tok-var">string</span>{<span class="tok-str">"HTML"</span>, <span class="tok-str">"CSS"</span>, <span class="tok-str">"JS"</span>}
<span class="tok-kw">for</span> <span class="tok-var">i</span>, <span class="tok-var">m</span> := <span class="tok-kw">range</span> <span class="tok-var">modul</span> {
    <span class="tok-var">fmt</span>.<span class="tok-fn">Printf</span>(<span class="tok-str">"%d. %s\\n"</span>, <span class="tok-var">i</span>+<span class="tok-num">1</span>, <span class="tok-var">m</span>)
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-go4"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> <code>range</code> mengembalikan dua nilai: indeks dan elemen. Jika hanya ingin elemen, pakai <code>_, m := range</code> (underscore untuk membuang nilai).</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="go-3">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="go-5">Lanjut: Array & Slice →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="go-5">
      <div class="topic-eyebrow">TOPIK 5 / 12</div>
      <h2 class="topic-title">Array & Slice</h2>
      <div class="topic-body">
        <p><strong>Array</strong> di Go ukuran tetap. <strong>Slice</strong> lebih fleksibel — ukuran bisa berubah. Slice adalah tipe data yang paling umum untuk koleksi di Go.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>slice.go</div>
          <button class="run-btn" data-run="go5">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5</div>
          <div class="code-content"><span class="tok-var">angka</span> := []<span class="tok-kw">int</span>{<span class="tok-num">10</span>, <span class="tok-num">20</span>, <span class="tok-num">30</span>}
<span class="tok-var">angka</span> = <span class="tok-fn">append</span>(<span class="tok-var">angka</span>, <span class="tok-num">40</span>)
<span class="tok-var">fmt</span>.<span class="tok-fn">Println</span>(<span class="tok-str">"Panjang:"</span>, <span class="tok-fn">len</span>(<span class="tok-var">angka</span>))
<span class="tok-var">fmt</span>.<span class="tok-fn">Println</span>(<span class="tok-str">"Jumlah:"</span>, <span class="tok-var">angka</span>[<span class="tok-num">0</span>]+<span class="tok-var">angka</span>[<span class="tok-num">2</span>])</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-go5"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Fungsi <code>append()</code> bisa nambah elemen ke slice. Jika kapasitas penuh, Go otomatis mengalokasikan array baru yang lebih besar.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="go-4">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="go-6">Lanjut: Fungsi & Multiple Return →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="go-6">
      <div class="topic-eyebrow">TOPIK 6 / 12</div>
      <h2 class="topic-title">Fungsi & Multiple Return</h2>
      <div class="topic-body">
        <p>Fungsi di Go bisa mengembalikan <strong>banyak nilai</strong> — fitur yang jarang dimiliki bahasa lain. Ini sangat berguna untuk mengembalikan hasil + error sekaligus, sesuai idiom Go.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>fungsi.go</div>
          <button class="run-btn" data-run="go6">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8</div>
          <div class="code-content"><span class="tok-kw">func</span> <span class="tok-fn">bagi</span>(<span class="tok-var">a</span>, <span class="tok-var">b</span> <span class="tok-kw">int</span>) (<span class="tok-kw">int</span>, <span class="tok-var">error</span>) {
    <span class="tok-kw">if</span> <span class="tok-var">b</span> == <span class="tok-num">0</span> {
        <span class="tok-kw">return</span> <span class="tok-num">0</span>, <span class="tok-var">fmt</span>.<span class="tok-fn">Errorf</span>(<span class="tok-str">"tidak bisa bagi nol"</span>)
    }
    <span class="tok-kw">return</span> <span class="tok-var">a</span> / <span class="tok-var">b</span>, <span class="tok-kw">nil</span>
}
<span class="tok-var">hasil</span>, <span class="tok-var">err</span> := <span class="tok-fn">bagi</span>(<span class="tok-num">10</span>, <span class="tok-num">2</span>)
<span class="tok-var">fmt</span>.<span class="tok-fn">Println</span>(<span class="tok-str">"Hasil:"</span>, <span class="tok-var">hasil</span>)</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-go6"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> Idiom Go: fungsi yang bisa gagal selalu mengembalikan nilai + <code>error</code>. Panggil fungsi, cek error dulu, baru pakai hasilnya.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="go-5">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="go-7">Lanjut: Struct & Method →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="go-7">
      <div class="topic-eyebrow">TOPIK 7 / 12</div>
      <h2 class="topic-title">Struct & Method</h2>
      <div class="topic-body">
        <p><strong>Struct</strong> mengelompokkan data. <strong>Method</strong> di Go didefinisikan di luar struct dengan <em>receiver</em> — parameter khusus yang menghubungkan fungsi ke struct.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>struct.go</div>
          <button class="run-btn" data-run="go7">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11</div>
          <div class="code-content"><span class="tok-kw">type</span> <span class="tok-var">Siswa</span> <span class="tok-kw">struct</span> {
    <span class="tok-var">Nama</span> <span class="tok-var">string</span>
    <span class="tok-var">Skor</span> <span class="tok-kw">int</span>
}
<span class="tok-kw">func</span> (<span class="tok-var">s</span> <span class="tok-var">Siswa</span>) <span class="tok-fn">cetak</span>() {
    <span class="tok-var">fmt</span>.<span class="tok-fn">Printf</span>(<span class="tok-str">"%s: %d\\n"</span>, <span class="tok-var">s</span>.<span class="tok-var">Nama</span>, <span class="tok-var">s</span>.<span class="tok-var">Skor</span>)
}
<span class="tok-var">s</span> := <span class="tok-var">Siswa</span>{<span class="tok-str">"Budi"</span>, <span class="tok-num">87</span>}
<span class="tok-var">s</span>.<span class="tok-fn">cetak</span>()</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-go7"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Go tidak punya class — struct + method adalah cara Go untuk OOP. Ini desain yang lebih sederhana tanpa inheritance kompleks.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="go-6">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="go-8">Lanjut: Pointer & Interface →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="go-8">
      <div class="topic-eyebrow">TOPIK 8 / 12</div>
      <h2 class="topic-title">Pointer & Interface</h2>
      <div class="topic-body">
        <p><strong>Pointer</strong> di Go (<code>*</code>) seperti C, tanpa aritmetika pointer. <strong>Interface</strong> adalah kumpulan method — tipe yang mengimplementasikan semua method itu otomatis memenuhi interface. Ini dasar dari polimorfisme Go.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>iface.go</div>
          <button class="run-btn" data-run="go8">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10</div>
          <div class="code-content"><span class="tok-kw">type</span> <span class="tok-var">Pengguna</span> <span class="tok-kw">interface</span> {
    <span class="tok-fn">Login</span>() <span class="tok-var">string</span>
}
<span class="tok-kw">type</span> <span class="tok-var">Siswa</span> <span class="tok-kw">struct</span>{ <span class="tok-var">Email</span> <span class="tok-var">string</span> }
<span class="tok-kw">func</span> (<span class="tok-var">s</span> <span class="tok-var">Siswa</span>) <span class="tok-fn">Login</span>() <span class="tok-var">string</span> {
    <span class="tok-kw">return</span> <span class="tok-str">"Login: "</span> + <span class="tok-var">s</span>.<span class="tok-var">Email</span>
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-go8"></div>
        </div>
      </div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz: Fitur utama Go untuk konkurensi?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">Thread</button>
          <button class="quiz-opt" data-correct="true">Goroutine</button>
          <button class="quiz-opt" data-correct="false">Async/Await</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="go-7">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="go-9">Lanjut: Goroutine →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="go-9">
      <div class="topic-eyebrow">TOPIK 9 / 12</div>
      <h2 class="topic-title">Goroutine</h2>
      <div class="topic-body">
        <p><strong>Goroutine</strong> adalah thread ringan bawaan Go untuk konkurensi. Cukup tambahkan <code>go</code> sebelum pemanggilan fungsi, dan fungsi itu berjalan secara <em>concurrent</em>. Goroutine sangat murah — ribuan goroutine bisa berjalan dalam satu program tanpa masalah.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>goroutine.go</div>
          <button class="run-btn" data-run="go9">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13</div>
          <div class="code-content"><span class="tok-kw">package</span> <span class="tok-var">main</span>
<span class="tok-kw">import</span> <span class="tok-str">"fmt"</span>
<span class="tok-kw">func</span> <span class="tok-fn">tampil</span>(<span class="tok-var">msg</span> <span class="tok-var">string</span>) {
    <span class="tok-kw">for</span> <span class="tok-var">i</span> := <span class="tok-num">1</span>; <span class="tok-var">i</span> <= <span class="tok-num">3</span>; <span class="tok-var">i</span>++ {
        <span class="tok-var">fmt</span>.<span class="tok-fn">Println</span>(<span class="tok-var">msg</span>, <span class="tok-var">i</span>)
    }
}
<span class="tok-kw">func</span> <span class="tok-fn">main</span>() {
    <span class="tok-kw">go</span> <span class="tok-fn">tampil</span>(<span class="tok-str">"Halo dari goroutine"</span>)
    <span class="tok-fn">tampil</span>(<span class="tok-str">"Langsung dari main"</span>)
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-go9"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Program di atas mungkin hanya menampilkan output dari <code>main</code> saja karena <code>main</code> selesai sebelum goroutine sempat jalan. Gunakan <code>time.Sleep</code> atau <strong>WaitGroup</strong> untuk menunggu goroutine selesai.</div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz: Kata kunci apa untuk menjalankan goroutine?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="true">go</button>
          <button class="quiz-opt" data-correct="false">async</button>
          <button class="quiz-opt" data-correct="false">spawn</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="go-8">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="go-10">Lanjut: Channel & Select →</button>
      </div>
    </article>

    <!-- Go Topic 10 -->
    <article class="topic-section" data-topic="go-10">
      <div class="topic-eyebrow">TOPIK 10 / 12</div>
      <h2 class="topic-title">Channel & Select</h2>
      <div class="topic-body">
        <p><strong>Channel</strong> adalah jalur komunikasi antar goroutine — mengirim dan menerima data dengan operator <code>&lt;-</code>. <strong>Select</strong> memungkinkan goroutine menunggu beberapa channel sekaligus — merespon channel yang pertama selesai. Ini adalah inti dari <em>CSP (Communicating Sequential Processes)</em> di Go.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>channel.go</div>
          <button class="run-btn" data-run="go10">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13</div>
          <div class="code-content"><span class="tok-var">ch</span> := <span class="tok-fn">make</span>(<span class="tok-kw">chan</span> <span class="tok-var">string</span>)
<span class="tok-kw">go</span> <span class="tok-kw">func</span>() {
    <span class="tok-var">ch</span> &lt;- <span class="tok-str">"Halo dari goroutine"</span>
}()
<span class="tok-kw">select</span> {
    <span class="tok-kw">case</span> <span class="tok-var">msg</span> := &lt;-<span class="tok-var">ch</span>:
        <span class="tok-var">fmt</span>.<span class="tok-fn">Println</span>(<span class="tok-var">msg</span>)
    <span class="tok-kw">case</span> &lt;-<span class="tok-var">time</span>.<span class="tok-fn">After</span>(<span class="tok-num">1</span> * <span class="tok-var">time</span>.<span class="tok-var">Second</span>):
        <span class="tok-var">fmt</span>.<span class="tok-fn">Println</span>(<span class="tok-str">"Timeout"</span>)
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-go10"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Channel unbuffered (tanpa kapasitas) bersifat <em>blocking</em> — pengirim menunggu sampai penerima siap. Gunakan <code>make(chan T, N)</code> untuk buffered channel.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="go-9">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="go-11">Lanjut: WaitGroup & Mutual Exclusion →</button>
      </div>
    </article>

    <!-- Go Topic 11 -->
    <article class="topic-section" data-topic="go-11">
      <div class="topic-eyebrow">TOPIK 11 / 12</div>
      <h2 class="topic-title">Error Handling</h2>
      <div class="topic-body">
        <p>Go tidak punya exception — error adalah <strong>nilai biasa</strong> yang dikembalikan dari fungsi. Tipe <code>error</code> adalah interface bawaan. Idiom Go: panggil fungsi, cek <code>if err != nil</code>, baru gunakan hasilnya. Pola ini menghasilkan kode eksplisit tanpa kejutan.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>error.go</div>
          <button class="run-btn" data-run="go11">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11</div>
          <div class="code-content"><span class="tok-kw">func</span> <span class="tok-fn">bagi</span>(<span class="tok-var">a</span>, <span class="tok-var">b</span> <span class="tok-kw">int</span>) (<span class="tok-kw">int</span>, <span class="tok-var">error</span>) {
    <span class="tok-kw">if</span> <span class="tok-var">b</span> == <span class="tok-num">0</span> {
        <span class="tok-kw">return</span> <span class="tok-num">0</span>, <span class="tok-var">fmt</span>.<span class="tok-fn">Errorf</span>(<span class="tok-str">"tidak bisa bagi nol"</span>)
    }
    <span class="tok-kw">return</span> <span class="tok-var">a</span> / <span class="tok-var">b</span>, <span class="tok-kw">nil</span>
}
<span class="tok-var">hasil</span>, <span class="tok-var">err</span> := <span class="tok-fn">bagi</span>(<span class="tok-num">10</span>, <span class="tok-num">0</span>)
<span class="tok-kw">if</span> <span class="tok-var">err</span> != <span class="tok-kw">nil</span> {
    <span class="tok-var">fmt</span>.<span class="tok-fn">Println</span>(<span class="tok-str">"Error:"</span>, <span class="tok-var">err</span>)
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-go11"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> <code>fmt.Errorf()</code> membuat error dengan format dinamis. Jangan gunakan <code>_</code> untuk mengabaikan error — selalu cek dengan <code>if err != nil</code>.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="go-10">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="go-12">Lanjut: Package & Module →</button>
      </div>
    </article>

    <!-- Go Topic 12 -->
    <article class="topic-section" data-topic="go-12">
      <div class="topic-eyebrow">TOPIK 12 / 12</div>
      <h2 class="topic-title">Package & Module</h2>
      <div class="topic-body">
        <p>Setiap file Go adalah bagian dari sebuah <strong>package</strong>. <code>go mod init</code> memulai module baru. Fungsi yang diawali huruf besar bersifat <strong>exported</strong> (public), huruf kecil bersifat <strong>unexported</strong> (private).</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>package.go</div>
          <button class="run-btn" data-run="go12">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-kw">package</span> <span class="tok-var">main</span>
<span class="tok-kw">import</span> (
    <span class="tok-str">"fmt"</span>
    <span class="tok-str">"math"</span>
)
<span class="tok-kw">func</span> <span class="tok-fn">main</span>() {
    <span class="tok-var">fmt</span>.<span class="tok-fn">Println</span>(<span class="tok-var">math</span>.<span class="tok-fn">Sqrt</span>(<span class="tok-num">144</span>))
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-go12"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Nama package biasanya sama dengan nama direktori. <code>go mod init nama-modul</code> untuk memulai module, lalu <code>go build</code> untuk kompilasi.</div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz: Fungsi Go yang diawali huruf kapital bersifat?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="true">Exported (public)</button>
          <button class="quiz-opt" data-correct="false">Unexported (private)</button>
          <button class="quiz-opt" data-correct="false">Hanya bisa dipakai di file yang sama</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="go-11">← Sebelumnya</button>
        <button class="nav-btn primary" type="button" id="finishBtn">Selesai — Kembali ke Library </button>
      </div>
    </article>
  </section>

</main>

<script>
(function() {
  const totalTopics = 12;
  const LANGUAGE = 'go'; // harus sama dengan key di $languages pada get_progress.php
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
  loadProgress().then(() => markDone('go-1'));

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