<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>C# — LearnBase</title>
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
        <div class="brand-sub">C#</div>
      </div>
    </div>
  </div>

  <div class="sidebar-body">
  <nav class="lang-nav" id="langNav">
    <div class="lang-tab active" data-lang="cs">
      <span class="lang-dot" style="background:#6B4FD8"></span>
      <span class="lang-tab-text">
        <div class="lang-tab-name">C#</div>
        <div class="lang-tab-meta">12 topik</div>
      </span>
      <span class="lang-tab-pct" data-pct="cs">0%</span>
    </div>
    <div class="topic-list" data-list="cs">
      <div class="topic-item active" data-topic="cs-1"><span class="topic-check"></span>Apa itu C#?</div>
      <div class="topic-item" data-topic="cs-2"><span class="topic-check"></span>Variabel & Tipe</div>
      <div class="topic-item" data-topic="cs-3"><span class="topic-check"></span>Kondisi & Perulangan</div>
      <div class="topic-item" data-topic="cs-4"><span class="topic-check"></span>Method & Class</div>
      <div class="topic-item" data-topic="cs-5"><span class="topic-check"></span>Property & Constructor</div>
      <div class="topic-item" data-topic="cs-6"><span class="topic-check"></span>Array & List</div>
      <div class="topic-item" data-topic="cs-7"><span class="topic-check"></span>Inheritance</div>
      <div class="topic-item" data-topic="cs-8"><span class="topic-check"></span>LINQ & Lambda</div>
      <div class="topic-item" data-topic="cs-9"><span class="topic-check"></span>Namespace & Using</div>
      <div class="topic-item" data-topic="cs-10"><span class="topic-check"></span>Interface</div>
      <div class="topic-item" data-topic="cs-11"><span class="topic-check"></span>Delegates & Events</div>
      <div class="topic-item" data-topic="cs-12"><span class="topic-check"></span>Async &amp; Await</div>
    </div>
  </div>

  <div class="sidebar-foot">
    <div class="sidebar-footer-label">Progres modul kamu</div>
    <div class="progress-track"><div class="progress-fill" id="progressFill" style="width:0%"></div></div>
    <div class="sidebar-footer-num" id="progressNum">0 / 12 topik selesai</div>
  </div>
</aside>

<main class="main">

  <!-- ================= C# ================= -->
  <section class="content-panel active" data-lang="cs">
    <div class="lang-header">
      <div>
        <div class="lang-eyebrow">MODUL 07 · BAHASA .NET & MICROSOFT</div>
        <h1 class="lang-title">C#</h1>
        <p class="lang-desc">Bahasa modern dari Microsoft untuk ekosistem .NET — dipakai untuk aplikasi Windows, game Unity, backend web (ASP.NET), dan mobile (Xamarin).</p>
      </div>
      <div class="lang-badge">C#</div>
    </div>

    <article class="topic-section active" data-topic="cs-1">
      <div class="topic-eyebrow">TOPIK 1 / 12</div>
      <h2 class="topic-title">Apa itu C#?</h2>
      <div class="topic-body">
        <p>Pernah main <em>Among Us</em> atau <em>Hollow Knight</em>? Semua dibuat dengan C# di game engine Unity. C# adalah bahasa serbaguna dari Microsoft yang bisa kamu pakai untuk bikin game, aplikasi Windows, web backend (ASP.NET), sampai API — satu bahasa untuk bikin banyak hal nyata.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Program.cs</div>
          <button class="run-btn" data-run="cs1">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-kw">using</span> <span class="tok-var">System</span>;
<span class="tok-kw">class</span> <span class="tok-var">Program</span> {
    <span class="tok-kw">static void</span> <span class="tok-fn">Main</span>() {
        <span class="tok-var">string</span> <span class="tok-var">nama</span> = <span class="tok-str">"LearnBase"</span>;
        <span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>($<span class="tok-str">"Halo, {nama}"</span>);
    }
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cs1"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Method <code>Main()</code> (huruf besar) adalah titik masuk — berbeda dengan Java yang <code>main()</code> (huruf kecil).</div>
      <div class="topic-nav">
        <button class="nav-btn" disabled>← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cs-2">Lanjut: Variabel & Tipe →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="cs-2">
      <div class="topic-eyebrow">TOPIK 2 / 12</div>
      <h2 class="topic-title">Variabel & Tipe</h2>
      <div class="topic-body">
        <p>C# punya tipe <code>int</code>, <code>double</code>, <code>bool</code>, <code>char</code>, <code>string</code>, dan <code>var</code> (tipe otomatis). Mendukung <em>nullable types</em> dengan <code>?</code>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Var.cs</div>
          <button class="run-btn" data-run="cs2">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-kw">int</span> <span class="tok-var">skor</span> = <span class="tok-num">87</span>;
<span class="tok-var">string</span> <span class="tok-var">nama</span> = <span class="tok-str">"C# Dasar"</span>;
<span class="tok-kw">var</span> <span class="tok-var">lulus</span> = <span class="tok-var">skor</span> >= <span class="tok-num">70</span>;
<span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>($<span class="tok-str">"{nama}: {lulus}"</span>);
<span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>(<span class="tok-str">"Tipe: "</span> + <span class="tok-var">lulus</span>.<span class="tok-fn">GetType</span>());</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cs2"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> <code>var</code> di C# adalah <em>type inference</em> — kompiler menentukan tipe dari nilainya, bukan <em>dynamic typing</em> seperti JavaScript.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cs-1">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cs-3">Lanjut: Kondisi & Perulangan →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="cs-3">
      <div class="topic-eyebrow">TOPIK 3 / 12</div>
      <h2 class="topic-title">Kondisi & Perulangan</h2>
      <div class="topic-body">
        <p>C# punya <code>if</code>, <code>switch</code>, <code>for</code>, <code>foreach</code>, <code>while</code>. <code>foreach</code> sangat umum untuk array dan koleksi.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Loop.cs</div>
          <button class="run-btn" data-run="cs3">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
          <div class="code-content"><span class="tok-kw">int</span>[] <span class="tok-var">skor</span> = { <span class="tok-num">88</span>, <span class="tok-num">72</span>, <span class="tok-num">95</span> };
<span class="tok-kw">foreach</span> (<span class="tok-kw">var</span> <span class="tok-var">s</span> <span class="tok-kw">in</span> <span class="tok-var">skor</span>) {
    <span class="tok-kw">if</span> (<span class="tok-var">s</span> >= <span class="tok-num">80</span>) {
        <span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>($<span class="tok-str">"{s} - Baik"</span>);
    } <span class="tok-kw">else</span> {
        <span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>($<span class="tok-str">"{s} - Cukup"</span>);
    }
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cs3"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>switch</code> di C# punya pattern matching — bisa <code>case &gt;= 80:</code> tanpa fall-through default.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cs-2">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cs-4">Lanjut: Method & Class →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="cs-4">
      <div class="topic-eyebrow">TOPIK 4 / 12</div>
      <h2 class="topic-title">Method & Class</h2>
      <div class="topic-body">
        <p>C# mendukung OOP penuh. <strong>Method</strong> dalam class — <strong>access modifiers</strong>: <code>public</code>, <code>private</code>, <code>protected</code>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Method.cs</div>
          <button class="run-btn" data-run="cs4">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</div>
          <div class="code-content"><span class="tok-kw">class</span> <span class="tok-var">Helper</span> {
    <span class="tok-kw">public static</span> <span class="tok-kw">int</span> <span class="tok-fn">Kuadrat</span>(<span class="tok-kw">int</span> <span class="tok-var">x</span>) {
        <span class="tok-kw">return</span> <span class="tok-var">x</span> * <span class="tok-var">x</span>;
    }
}
<span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>(<span class="tok-var">Helper</span>.<span class="tok-fn">Kuadrat</span>(<span class="tok-num">5</span>));</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cs4"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> Method <code>Main</code> adalah <code>static</code> — milik class, bukan instance. Program bisa jalan tanpa membuat objek.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cs-3">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cs-5">Lanjut: Property & Constructor →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="cs-5">
      <div class="topic-eyebrow">TOPIK 5 / 12</div>
      <h2 class="topic-title">Property & Constructor</h2>
      <div class="topic-body">
        <p><strong>Property</strong> (<code>{ get; set; }</code>) adalah cara aman mengakses data class — alternatif getter/setter Java. <strong>Constructor</strong> sama seperti Java, dipanggil saat <code>new</code>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Properti.cs</div>
          <button class="run-btn" data-run="cs5">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11</div>
          <div class="code-content"><span class="tok-kw">class</span> <span class="tok-var">Siswa</span> {
    <span class="tok-kw">public</span> <span class="tok-var">string</span> <span class="tok-var">Nama</span> { <span class="tok-kw">get</span>; <span class="tok-kw">set</span>; }
    <span class="tok-kw">public</span> <span class="tok-kw">int</span> <span class="tok-var">Skor</span> { <span class="tok-kw">get</span>; <span class="tok-kw">set</span>; }
    <span class="tok-kw">public</span> <span class="tok-fn">Siswa</span>(<span class="tok-var">string</span> <span class="tok-var">n</span>, <span class="tok-kw">int</span> <span class="tok-var">s</span>) {
        <span class="tok-var">Nama</span> = <span class="tok-var">n</span>; <span class="tok-var">Skor</span> = <span class="tok-var">s</span>;
    }
}
<span class="tok-kw">var</span> <span class="tok-var">s</span> = <span class="tok-kw">new</span> <span class="tok-fn">Siswa</span>(<span class="tok-str">"Budi"</span>, <span class="tok-num">87</span>);
<span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>($<span class="tok-str">"{s.Nama}: {s.Skor}"</span>);</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cs5"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> C# bisa pakai <em>auto-property</em> (<code>{ get; set; }</code>) — compiler otomatis membuat field privat di belakangnya.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cs-4">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cs-6">Lanjut: Array & List →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="cs-6">
      <div class="topic-eyebrow">TOPIK 6 / 12</div>
      <h2 class="topic-title">Array & List</h2>
      <div class="topic-body">
        <p>Array C# mirip Java. <code>List&lt;T&gt;</code> dari <code>System.Collections.Generic</code> adalah versi dinamis — pakai <code>Add()</code>, <code>Remove()</code>, <code>Count</code>.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>List.cs</div>
          <button class="run-btn" data-run="cs6">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</div>
          <div class="code-content"><span class="tok-kw">using</span> <span class="tok-var">System.Collections.Generic</span>;
<span class="tok-kw">var</span> <span class="tok-var">modul</span> = <span class="tok-kw">new</span> <span class="tok-var">List</span>&lt;<span class="tok-var">string</span>&gt;() {
    <span class="tok-str">"C# Dasar"</span>, <span class="tok-str">"OOP"</span>, <span class="tok-str">"LINQ"</span>
};
<span class="tok-var">modul</span>.<span class="tok-fn">Add</span>(<span class="tok-str">"ASP.NET"</span>);
<span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>($<span class="tok-str">"{modul.Count} modul"</span>);
<span class="tok-kw">foreach</span> (<span class="tok-kw">var</span> <span class="tok-var">m</span> <span class="tok-kw">in</span> <span class="tok-var">modul</span>) {
    <span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>(<span class="tok-var">m</span>);
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cs6"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> Properti <code>Count</code> (bukan <code>length</code> atau <code>size()</code>) untuk jumlah elemen List.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cs-5">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cs-7">Lanjut: Inheritance →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="cs-7">
      <div class="topic-eyebrow">TOPIK 7 / 12</div>
      <h2 class="topic-title">Inheritance</h2>
      <div class="topic-body">
        <p>C# pakai <code>:</code> untuk inheritance (bukan <code>extends</code>). Keyword <code>virtual</code> dan <code>override</code> untuk method yang bisa ditimpa.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Turunan.cs</div>
          <button class="run-btn" data-run="cs7">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12</div>
          <div class="code-content"><span class="tok-kw">class</span> <span class="tok-var">Pengguna</span> {
    <span class="tok-kw">public</span> <span class="tok-var">string</span> <span class="tok-var">Email</span> { <span class="tok-kw">get</span>; <span class="tok-kw">set</span>; }
    <span class="tok-kw">public</span> <span class="tok-kw">virtual void</span> <span class="tok-fn">Login</span>() {
        <span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>($<span class="tok-str">"Login: {Email}"</span>);
    }
}
<span class="tok-kw">class</span> <span class="tok-var">Siswa</span> : <span class="tok-var">Pengguna</span> {
    <span class="tok-kw">public</span> <span class="tok-kw">int</span> <span class="tok-var">Skor</span> { <span class="tok-kw">get</span>; <span class="tok-kw">set</span>; }
    <span class="tok-kw">public override void</span> <span class="tok-fn">Login</span>() {
        <span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>($<span class="tok-str">"Siswa {Email} login"</span>);
    }
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cs7"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> <code>virtual</code> di class induk + <code>override</code> di class anak — wajib jika ingin menimpa method.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cs-6">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cs-8">Lanjut: LINQ & Lambda →</button>
      </div>
    </article>

    <article class="topic-section" data-topic="cs-8">
      <div class="topic-eyebrow">TOPIK 8 / 12</div>
      <h2 class="topic-title">LINQ & Lambda</h2>
      <div class="topic-body">
        <p><strong>LINQ</strong> (Language Integrated Query) memungkinkan query data dengan sintaks mirip SQL. <strong>Lambda</strong> (<code>=&gt;</code>) untuk fungsi anonim pendek — mirip arrow function JavaScript.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Linq.cs</div>
          <button class="run-btn" data-run="cs8">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10</div>
          <div class="code-content"><span class="tok-kw">using</span> <span class="tok-var">System.Linq</span>;
<span class="tok-kw">int</span>[] <span class="tok-var">angka</span> = { <span class="tok-num">4</span>, <span class="tok-num">9</span>, <span class="tok-num">16</span>, <span class="tok-num">25</span> };
<span class="tok-kw">var</span> <span class="tok-var">genap</span> = <span class="tok-var">angka</span>.<span class="tok-fn">Where</span>(<span class="tok-var">n</span> => <span class="tok-var">n</span> % <span class="tok-num">2</span> == <span class="tok-num">0</span>);
<span class="tok-kw">var</span> <span class="tok-var">kuadrat</span> = <span class="tok-var">angka</span>.<span class="tok-fn">Select</span>(<span class="tok-var">n</span> => <span class="tok-var">n</span> * <span class="tok-var">n</span>);
<span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>(<span class="tok-str">"Genap: "</span> + <span class="tok-var">string</span>.<span class="tok-fn">Join</span>(<span class="tok-str">", "</span>, <span class="tok-var">genap</span>));
<span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>(<span class="tok-str">"Kuadrat: "</span> + <span class="tok-var">string</span>.<span class="tok-fn">Join</span>(<span class="tok-str">", "</span>, <span class="tok-var">kuadrat</span>));</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cs8"></div>
        </div>
      </div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz: Keyword inheritance di C#?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">extends</button>
          <button class="quiz-opt" data-correct="true">: (titik dua)</button>
          <button class="quiz-opt" data-correct="false">inherits</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cs-7">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cs-9">Lanjut: Namespace & Using →</button>
      </div>
    </article>

    <!-- CS Topic 9 -->
    <article class="topic-section" data-topic="cs-9">
      <div class="topic-eyebrow">TOPIK 9 / 12</div>
      <h2 class="topic-title">Namespace & Using</h2>
      <div class="topic-body">
        <p><strong>Namespace</strong> adalah wadah logis untuk mengorganisir kode C# — mirip <em>package</em> di Java atau <em>module</em> di Python. Namespace mencegah konflik nama antar class dan membuat kode lebih terstruktur, terutama pada proyek besar.</p>
        <p>Keyword <code>using</code> digunakan untuk mengimpor namespace lain sehingga kamu bisa menggunakan class tanpa menulis nama namespace lengkapnya setiap saat. C# juga mendukung <strong>alias</strong> dengan <code>using Alias = Namespace.Class;</code> untuk menghindari ambiguitas.</p>
      </div>

      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Namespace.cs</div>
          <button class="run-btn" data-run="cs9">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12</div>
          <div class="code-content"><span class="tok-kw">using</span> <span class="tok-var">System</span>;
<span class="tok-kw">using</span> <span class="tok-var">Belajar</span> = <span class="tok-var">LearnBase.Modul</span>;

<span class="tok-kw">namespace</span> <span class="tok-var">LearnBase</span> {
    <span class="tok-kw">class</span> <span class="tok-var">Modul</span> {
        <span class="tok-kw">public static void</span> <span class="tok-fn">Tampil</span>() {
            <span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>(<span class="tok-str">"Modul: Namespace & Using"</span>);
        }
    }
}

<span class="tok-var">Belajar</span>.<span class="tok-fn">Tampil</span>();</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cs9"></div>
        </div>
      </div>

      <div class="callout tip"><strong>Tips:</strong> Gunakan <em>namespace-based naming</em> seperti <code>Perusahaan.Proyek.Modul</code> untuk proyek besar. C# 10 memperkenalkan <em>file-scoped namespace</em> dengan sintaks <code>namespace X.Y.Z;</code> (pakai titik koma, tanpa kurung kurawal) — lebih bersih untuk file yang hanya berisi satu namespace.</div>

      <div class="quiz-box">
        <div class="quiz-q">Quiz: Keyword apa untuk mengimpor namespace di C#?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="false">import</button>
          <button class="quiz-opt" data-correct="true">using</button>
          <button class="quiz-opt" data-correct="false">include</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>

      <div class="topic-nav">
        <button class="nav-btn" data-prev="cs-8">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cs-10">Lanjut: Interface →</button>
      </div>
    </article>

    <!-- C# Topic 10 -->
    <article class="topic-section" data-topic="cs-10">
      <div class="topic-eyebrow">TOPIK 10 / 12</div>
      <h2 class="topic-title">Interface</h2>
      <div class="topic-body">
        <p><strong>Interface</strong> di C# adalah kontrak yang berisi deklarasi method, property, atau event tanpa implementasi. Class yang mengimplementasi interface wajib menyediakan implementasi untuk semua anggotanya. C# menggunakan <code>:</code> untuk implementasi interface — sama seperti inheritance.</p>
        <p>Interface memungkinkan <strong>polymorphism</strong> dan <strong>loose coupling</strong>. Sebuah class bisa mengimplementasi banyak interface sekaligus. Mulai C# 8.0, interface bisa punya <em>default implementation</em> — method tidak wajib di-override.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Interface.cs</div>
          <button class="run-btn" data-run="cs10">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15<br>16<br>17<br>18</div>
          <div class="code-content"><span class="tok-kw">interface</span> <span class="tok-var">IKendaraan</span> {
    <span class="tok-kw">void</span> <span class="tok-fn">Bergerak</span>();
    <span class="tok-kw">int</span> <span class="tok-var">KecepatanMaks</span> { <span class="tok-kw">get</span>; }
}
<span class="tok-kw">class</span> <span class="tok-var">Mobil</span> : <span class="tok-var">IKendaraan</span> {
    <span class="tok-kw">public int</span> <span class="tok-var">KecepatanMaks</span> => <span class="tok-num">200</span>;
    <span class="tok-kw">public void</span> <span class="tok-fn">Bergerak</span>() {
        <span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>(<span class="tok-str">"Mobil melaju"</span>);
    }
}
<span class="tok-var">IKendaraan</span> <span class="tok-var">k</span> = <span class="tok-kw">new</span> <span class="tok-fn">Mobil</span>();
<span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>($<span class="tok-str">"Kecepatan: {k.KecepatanMaks}"</span>);
<span class="tok-var">k</span>.<span class="tok-fn">Bergerak</span>();</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cs10"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Konvensi penamaan interface di C# pakai awalan <code>I</code> (kapital) — seperti <code>IDisposable</code>, <code>IComparable</code>. Ini membantu membedakan interface dari class.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cs-9">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cs-11">Lanjut: Delegates & Events →</button>
      </div>
    </article>

    <!-- C# Topic 11 -->
    <article class="topic-section" data-topic="cs-11">
      <div class="topic-eyebrow">TOPIK 11 / 12</div>
      <h2 class="topic-title">Delegates & Events</h2>
      <div class="topic-body">
        <p><strong>Delegate</strong> adalah tipe yang mereferensikan method — mirip function pointer di C++ yang aman tipe. <strong>Event</strong> adalah delegate khusus yang dipakai untuk pola publisher-subscriber — elemen utama dalam pemrograman event-driven di C#.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Event.cs</div>
          <button class="run-btn" data-run="cs11">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15</div>
          <div class="code-content"><span class="tok-kw">public delegate void</span> <span class="tok-var">Handler</span>(<span class="tok-var">string</span> <span class="tok-var">msg</span>);
<span class="tok-kw">class</span> <span class="tok-var">Publisher</span> {
    <span class="tok-kw">public event</span> <span class="tok-var">Handler</span> <span class="tok-var">OnNotify</span>;
    <span class="tok-kw">public void</span> <span class="tok-fn">Kirim</span>() {
        <span class="tok-var">OnNotify</span>?.<span class="tok-fn">Invoke</span>(<span class="tok-str">"Event dipicu!"</span>);
    }
}
<span class="tok-kw">var</span> <span class="tok-var">p</span> = <span class="tok-kw">new</span> <span class="tok-fn">Publisher</span>();
<span class="tok-var">p</span>.<span class="tok-var">OnNotify</span> += <span class="tok-var">msg</span> => <span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>(<span class="tok-var">msg</span>);
<span class="tok-var">p</span>.<span class="tok-fn">Kirim</span>();</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cs11"></div>
        </div>
      </div>
      <div class="callout note"><strong>Catatan:</strong> Operator <code>?.</code> (null-conditional) sebelum <code>Invoke</code> aman jika tidak ada subscriber. <code>+=</code> untuk mendaftarkan method ke event, <code>-=</code> untuk menghapus.</div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cs-10">← Sebelumnya</button>
        <button class="nav-btn primary" data-next="cs-12">Lanjut: Async & Await →</button>
      </div>
    </article>

    <!-- C# Topic 12 -->
    <article class="topic-section" data-topic="cs-12">
      <div class="topic-eyebrow">TOPIK 12 / 12</div>
      <h2 class="topic-title">Async & Await</h2>
      <div class="topic-body">
        <p><strong>async/await</strong> di C# mempermudah penulisan kode asinkron — seperti operasi file, HTTP request, atau query database. Method <code>async</code> mengembalikan <code>Task</code> atau <code>Task&lt;T&gt;</code>. <code>await</code> menunggu hasil tanpa memblokir thread utama.</p>
      </div>
      <div class="code-card">
        <div class="code-tab-bar">
          <div class="code-filename"><span class="file-dot"></span>Async.cs</div>
          <button class="run-btn" data-run="cs12">▶ Jalankan</button>
        </div>
        <div class="code-body">
          <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11</div>
          <div class="code-content"><span class="tok-kw">using</span> <span class="tok-var">System.Net.Http</span>;
<span class="tok-kw">async</span> <span class="tok-var">Task</span> <span class="tok-fn">AmbilData</span>() {
    <span class="tok-kw">var</span> <span class="tok-var">client</span> = <span class="tok-kw">new</span> <span class="tok-fn">HttpClient</span>();
    <span class="tok-var">string</span> <span class="tok-var">hasil</span> = <span class="tok-kw">await</span> <span class="tok-var">client</span>.<span class="tok-fn">GetStringAsync</span>(<span class="tok-str">"https://api.learnbase.com"</span>);
    <span class="tok-var">Console</span>.<span class="tok-fn">WriteLine</span>(<span class="tok-var">hasil</span>);
}</div>
        </div>
        <div class="output-bar">
          <div class="output-label">OUTPUT (terminal)</div>
          <div class="output-content" id="out-cs12"></div>
        </div>
      </div>
      <div class="callout tip"><strong>Tips:</strong> Method async sebaiknya diakhiri akhiran <code>Async</code> (contoh: <code>GetDataAsync</code>) — ini konvensi standar .NET untuk membedakan method async dari synchronous.</div>
      <div class="quiz-box">
        <div class="quiz-q">Quiz: Kata kunci untuk method asinkron di C#?</div>
        <div class="quiz-opts">
          <button class="quiz-opt" data-correct="true">async</button>
          <button class="quiz-opt" data-correct="false">await</button>
          <button class="quiz-opt" data-correct="false">Task</button>
        </div>
        <div class="quiz-feedback"></div>
      </div>
      <div class="topic-nav">
        <button class="nav-btn" data-prev="cs-11">← Sebelumnya</button>
        <button class="nav-btn primary" type="button" id="finishBtn">Selesai — Kembali ke Library </button>
      </div>
    </article>
  </section>

</main>

<script>
(function() {
  const totalTopics = 12;
  const LANGUAGE = 'cs'; // harus sama dengan key di $languages pada get_progress.php
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
  loadProgress().then(() => markDone('cs-1'));

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