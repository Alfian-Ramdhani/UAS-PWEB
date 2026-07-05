<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TypeScript — LearnBase</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url("assets/css/style-modul.css") ?>">
  <style>
    .content-panel .lang-eyebrow {
      color: #6B4FD8;
    }

    .content-panel .lang-badge {
      background: #6B4FD8;
      color: #fff;
    }

    .content-panel .file-dot {
      background: #6B4FD8;
    }

    .content-panel .nav-btn.primary {
      background: #6B4FD8;
      border-color: #6B4FD8;
      color: #fff;
    }

    .progress-fill {
      background: linear-gradient(90deg, #6B4FD8, #8868E0, #A98CF0);
    }

    .lang-tab .lang-dot {
      background: #6B4FD8;
      box-shadow: 0 0 8px 2px #6B4FD8;
    }

    .nav-btn,
    .nav-btn:hover,
    .nav-btn:visited,
    .nav-btn:active,
    .nav-btn:focus {
      text-decoration: none;
    }

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

    .library-back-btn:hover {
      background: rgba(255, 255, 255, 0.1);
    }

    .completion-overlay {
      position: fixed;
      inset: 0;
      z-index: 500;
      background: rgba(10, 10, 10, 0.72);
      display: flex;
      align-items: center;
      justify-content: center;
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

    .completion-emoji {
      font-size: 44px;
      line-height: 1;
      margin-bottom: 10px;
    }

    .completion-modal h2 {
      margin: 0 0 8px;
      font-family: 'Space Grotesk', sans-serif;
      font-size: 22px;
    }

    .completion-modal p {
      margin: 0 0 22px;
      color: var(--text-dim);
      font-size: 14px;
      line-height: 1.5;
    }

    .completion-actions {
      display: flex;
      gap: 10px;
      justify-content: center;
      flex-wrap: wrap;
    }

    @keyframes completionFadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }
  </style>
</head>

<body>
  <script>if (localStorage.getItem("learnbase_dark_mode") === "true") document.body.classList.add("dark-mode");</script>

  <button class="sidebar-toggle" id="sidebarToggle" title="Toggle sidebar">☰</button>
  <a class="library-back-btn" href="<?= site_url('library') ?>" title="Kembali ke halaman Library">← Library</a>
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-head">
      <div class="brand">
        <div class="brand-mark">LB</div>
        <div>
          <div class="brand-name">LearnBase</div>
          <div class="brand-sub">TypeScript</div>
        </div>
      </div>
    </div>

    <div class="sidebar-body">
      <nav class="lang-nav" id="langNav">
        <div class="lang-tab active" data-lang="ts">
          <span class="lang-dot" style="background:#6B4FD8"></span>
          <span class="lang-tab-text">
            <div class="lang-tab-name">TypeScript</div>
            <div class="lang-tab-meta">12 topik</div>
          </span>
          <span class="lang-tab-pct" data-pct="ts">0%</span>
        </div>
        <div class="topic-list" data-list="ts">
          <div class="topic-item active" data-topic="ts-1"><span class="topic-check"></span>Apa itu TypeScript?</div>
          <div class="topic-item" data-topic="ts-2"><span class="topic-check"></span>Tipe Dasar</div>
          <div class="topic-item" data-topic="ts-3"><span class="topic-check"></span>Interface &amp; Type</div>
          <div class="topic-item" data-topic="ts-4"><span class="topic-check"></span>Class &amp; Access Modifier</div>
          <div class="topic-item" data-topic="ts-5"><span class="topic-check"></span>Array &amp; Tuple</div>
          <div class="topic-item" data-topic="ts-6"><span class="topic-check"></span>Generic</div>
          <div class="topic-item" data-topic="ts-7"><span class="topic-check"></span>Enum &amp; Union</div>
          <div class="topic-item" data-topic="ts-8"><span class="topic-check"></span>Module &amp; Import</div>
          <div class="topic-item" data-topic="ts-9"><span class="topic-check"></span>Utility Types</div>
          <div class="topic-item" data-topic="ts-10"><span class="topic-check"></span>Type Guard</div>
          <div class="topic-item" data-topic="ts-11"><span class="topic-check"></span>Decorator</div>
          <div class="topic-item" data-topic="ts-12"><span class="topic-check"></span>Declaration File</div>
        </div>
    </div>

    <div class="sidebar-foot">
      <div class="sidebar-footer-label">Progres modul kamu</div>
      <div class="progress-track">
        <div class="progress-fill" id="progressFill" style="width:0%"></div>
      </div>
      <div class="sidebar-footer-num" id="progressNum">0 / 12 topik selesai</div>
    </div>
  </aside>

  <main class="main">

    <!-- ================= TypeScript ================= -->
    <section class="content-panel active" data-lang="ts">
      <div class="lang-header">
        <div>
          <div class="lang-eyebrow">MODUL 11 · BAHASA SUPER DARI JAVASCRIPT</div>
          <h1 class="lang-title">TypeScript</h1>
          <p class="lang-desc">JavaScript dengan tambahan <strong>tipe statis</strong>. Dibuat Microsoft untuk membantu
            menulis kode JS skala besar dengan lebih aman dan terstruktur. Semua kode TypeScript dikompilasi ke
            JavaScript.</p>
        </div>
        <div class="lang-badge">TS</div>
      </div>

      <article class="topic-section active" data-topic="ts-1">
        <div class="topic-eyebrow">TOPIK 1 / 12</div>
        <h2 class="topic-title">Apa itu TypeScript?</h2>
        <div class="topic-body">
          <p>Bayangkan JavaScript tanpa TypeScript seperti menulis tanpa <em>spell-check</em> — kamu baru sadar ada
            kesalahan setelah kode jalan. TypeScript menangkap bug saat kamu mengetik, bikin kode lebih rapi, dan
            dipakai tim di balik <strong>VS Code, Figma, dan Notion</strong> untuk membangun aplikasi level
            industri dengan percaya diri.</p>
        </div>
        <div class="code-card">
          <div class="code-tab-bar">
            <div class="code-filename"><span class="file-dot"></span>halo.ts</div>
            <button class="run-btn" data-run="ts1">▶ Jalankan</button>
          </div>
          <div class="code-body">
            <div class="code-lines">1<br>2<br>3<br>4</div>
            <div class="code-content"><span class="tok-kw">const</span> <span class="tok-var">nama</span>: <span
                class="tok-var">string</span> = <span class="tok-str">"LearnBase"</span>;
              <span class="tok-kw">function</span> <span class="tok-fn">sapa</span>(<span class="tok-var">n</span>:
              <span class="tok-var">string</span>): <span class="tok-var">string</span> {
              <span class="tok-kw">return</span> <span class="tok-str">`Halo, <span class="tok-fn">${n}</span>!`</span>;
              }
              <span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-fn">sapa</span>(<span
                class="tok-var">nama</span>));
            </div>
          </div>
          <div class="output-bar">
            <div class="output-label">OUTPUT (console)</div>
            <div class="output-content" id="out-ts1"></div>
          </div>
        </div>
        <div class="callout tip"><strong>Tips:</strong> <code>: string</code> setelah parameter adalah <em>type
            annotation</em>. TypeScript akan memeriksa tipe saat kompilasi — mencegah banyak bug sebelum runtime.</div>
        <div class="topic-nav">
          <button class="nav-btn" disabled>← Sebelumnya</button>
          <button class="nav-btn primary" data-next="ts-2">Lanjut: Tipe Dasar →</button>
        </div>
      </article>

      <article class="topic-section" data-topic="ts-2">
        <div class="topic-eyebrow">TOPIK 2 / 12</div>
        <h2 class="topic-title">Tipe Dasar</h2>
        <div class="topic-body">
          <p>TypeScript menambahkan tipe pada JavaScript: <code>string</code>, <code>number</code>,
            <code>boolean</code>, <code>array</code>, <code>any</code> (opsional), <code>void</code>, <code>null</code>,
            <code>undefined</code>. <code>any</code> membuat TS berperilaku seperti JS biasa — hindari sebisa mungkin.
          </p>
        </div>
        <div class="code-card">
          <div class="code-tab-bar">
            <div class="code-filename"><span class="file-dot"></span>tipe.ts</div>
            <button class="run-btn" data-run="ts2">▶ Jalankan</button>
          </div>
          <div class="code-body">
            <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
            <div class="code-content"><span class="tok-kw">let</span> <span class="tok-var">skor</span>: <span
                class="tok-var">number</span> = <span class="tok-num">87</span>;
              <span class="tok-kw">const</span> <span class="tok-var">namaModul</span>: <span
                class="tok-var">string</span> = <span class="tok-str">"TS Dasar"</span>;
              <span class="tok-kw">const</span> <span class="tok-var">lulus</span>: <span class="tok-var">boolean</span>
              = <span class="tok-var">skor</span> >= <span class="tok-num">70</span>;
              <span class="tok-kw">const</span> <span class="tok-var">topik</span>: <span
                class="tok-var">string[]</span> = [<span class="tok-str">"tipe"</span>, <span
                class="tok-str">"interface"</span>, <span class="tok-str">"generic"</span>];
              <span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span
                class="tok-var">namaModul</span>, <span class="tok-var">lulus</span>, <span
                class="tok-var">topik</span>.<span class="tok-var">length</span>);
            </div>
          </div>
          <div class="output-bar">
            <div class="output-label">OUTPUT (console)</div>
            <div class="output-content" id="out-ts2"></div>
          </div>
        </div>
        <div class="callout note"><strong>Catatan:</strong> <code>string[]</code> = array berisi string. Alternatif:
          <code>Array&lt;string&gt;</code>. Keduanya sama.</div>
        <div class="topic-nav">
          <button class="nav-btn" data-prev="ts-1">← Sebelumnya</button>
          <button class="nav-btn primary" data-next="ts-3">Lanjut: Interface &amp; Type →</button>
        </div>
      </article>

      <article class="topic-section" data-topic="ts-3">
        <div class="topic-eyebrow">TOPIK 3 / 12</div>
        <h2 class="topic-title">Interface &amp; Type</h2>
        <div class="topic-body">
          <p><strong>Interface</strong> mendefinisikan struktur objek. <strong>Type alias</strong> bisa dipakai untuk
            tipe union, intersection, atau tipe primitif. Interface bisa di-<em>extend</em>, type alias bisa untuk
            union.</p>
        </div>
        <div class="code-card">
          <div class="code-tab-bar">
            <div class="code-filename"><span class="file-dot"></span>interface.ts</div>
            <button class="run-btn" data-run="ts3">▶ Jalankan</button>
          </div>
          <div class="code-body">
            <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</div>
            <div class="code-content"><span class="tok-kw">interface</span> <span class="tok-var">Pengguna</span> {
              <span class="tok-var">nama</span>: <span class="tok-var">string</span>;
              <span class="tok-var">skor</span>: <span class="tok-var">number</span>;
              }
              <span class="tok-kw">type</span> <span class="tok-var">Status</span> = <span
                class="tok-str">"aktif"</span> | <span class="tok-str">"nonaktif"</span>;

              <span class="tok-kw">const</span> <span class="tok-var">user</span>: <span class="tok-var">Pengguna</span>
              = { <span class="tok-var">nama</span>: <span class="tok-str">"Budi"</span>, <span
                class="tok-var">skor</span>: <span class="tok-num">87</span> };
              <span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span
                class="tok-var">user</span>.<span class="tok-var">nama</span>);
            </div>
          </div>
          <div class="output-bar">
            <div class="output-label">OUTPUT (console)</div>
            <div class="output-content" id="out-ts3"></div>
          </div>
        </div>
        <div class="callout tip"><strong>Tips:</strong> Pilih <code>interface</code> untuk objek/class,
          <code>type</code> untuk union/intersection. Interface bisa <code>extends</code>, type bisa <code>&amp;</code>.
        </div>
        <div class="topic-nav">
          <button class="nav-btn" data-prev="ts-2">← Sebelumnya</button>
          <button class="nav-btn primary" data-next="ts-4">Lanjut: Class &amp; Access Modifier →</button>
        </div>
      </article>

      <article class="topic-section" data-topic="ts-4">
        <div class="topic-eyebrow">TOPIK 4 / 12</div>
        <h2 class="topic-title">Class &amp; Access Modifier</h2>
        <div class="topic-body">
          <p>TypeScript menambahkan <strong>access modifier</strong> ke class JavaScript: <code>public</code>,
            <code>private</code>, <code>protected</code>. Juga fitur <code>readonly</code> untuk properti yang tidak
            bisa diubah setelah inisialisasi.</p>
        </div>
        <div class="code-card">
          <div class="code-tab-bar">
            <div class="code-filename"><span class="file-dot"></span>class.ts</div>
            <button class="run-btn" data-run="ts4">▶ Jalankan</button>
          </div>
          <div class="code-body">
            <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9</div>
            <div class="code-content"><span class="tok-kw">class</span> <span class="tok-var">Siswa</span> {
              <span class="tok-kw">constructor</span>(
              <span class="tok-kw">public</span> <span class="tok-var">nama</span>: <span class="tok-var">string</span>,
              <span class="tok-kw">private</span> <span class="tok-var">skor</span>: <span class="tok-var">number</span>
              ) {}
              <span class="tok-fn">cetak</span>() {
              <span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-str">`<span
                  class="tok-fn">${this.nama}</span>: <span class="tok-fn">${this.skor}</span>`</span>);
              }
              }
              <span class="tok-kw">const</span> <span class="tok-var">s</span> = <span class="tok-kw">new</span> <span
                class="tok-var">Siswa</span>(<span class="tok-str">"Budi"</span>, <span class="tok-num">87</span>);
              <span class="tok-var">s</span>.<span class="tok-fn">cetak</span>();
            </div>
          </div>
          <div class="output-bar">
            <div class="output-label">OUTPUT (console)</div>
            <div class="output-content" id="out-ts4"></div>
          </div>
        </div>
        <div class="callout note"><strong>Catatan:</strong> Constructor TS bisa langsung mendeklarasikan properti dengan
          access modifier — ini praktik modern yang menggantikan deklarasi properti di atas constructor.</div>
        <div class="topic-nav">
          <button class="nav-btn" data-prev="ts-3">← Sebelumnya</button>
          <button class="nav-btn primary" data-next="ts-5">Lanjut: Array &amp; Tuple →</button>
        </div>
      </article>

      <article class="topic-section" data-topic="ts-5">
        <div class="topic-eyebrow">TOPIK 5 / 12</div>
        <h2 class="topic-title">Array &amp; Tuple</h2>
        <div class="topic-body">
          <p><strong>Array</strong> di TS: <code>number[]</code> atau <code>Array&lt;number&gt;</code>.
            <strong>Tuple</strong> adalah array dengan jumlah dan tipe elemen yang tetap — fitur yang tidak dimiliki
            JavaScript biasa.</p>
        </div>
        <div class="code-card">
          <div class="code-tab-bar">
            <div class="code-filename"><span class="file-dot"></span>tuple.ts</div>
            <button class="run-btn" data-run="ts5">▶ Jalankan</button>
          </div>
          <div class="code-body">
            <div class="code-lines">1<br>2<br>3<br>4<br>5</div>
            <div class="code-content"><span class="tok-kw">const</span> <span class="tok-var">angka</span>: <span
                class="tok-var">number[]</span> = [<span class="tok-num">1</span>, <span class="tok-num">2</span>, <span
                class="tok-num">3</span>];
              <span class="tok-kw">const</span> <span class="tok-var">pengguna</span>: [<span
                class="tok-var">string</span>, <span class="tok-var">number</span>] = [<span
                class="tok-str">"Budi"</span>, <span class="tok-num">87</span>];
              <span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span
                class="tok-var">pengguna</span>[<span class="tok-num">0</span>], <span
                class="tok-var">pengguna</span>[<span class="tok-num">1</span>]);
              <span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span
                class="tok-var">angka</span>.<span class="tok-fn">map</span>(<span class="tok-var">n</span> => <span
                class="tok-var">n</span> * <span class="tok-var">n</span>));
            </div>
          </div>
          <div class="output-bar">
            <div class="output-label">OUTPUT (console)</div>
            <div class="output-content" id="out-ts5"></div>
          </div>
        </div>
        <div class="callout tip"><strong>Tips:</strong> Tuple berguna untuk fungsi yang mengembalikan banyak nilai —
          seperti <code>[error, data]</code>.</div>
        <div class="topic-nav">
          <button class="nav-btn" data-prev="ts-4">← Sebelumnya</button>
          <button class="nav-btn primary" data-next="ts-6">Lanjut: Generic →</button>
        </div>
      </article>

      <article class="topic-section" data-topic="ts-6">
        <div class="topic-eyebrow">TOPIK 6 / 12</div>
        <h2 class="topic-title">Generic</h2>
        <div class="topic-body">
          <p><strong>Generic</strong> memungkinkan fungsi, class, atau interface bekerja dengan berbagai tipe. TS akan
            menentukan tipe spesifik saat dipakai — memberikan fleksibilitas tanpa kehilangan keamanan tipe.</p>
        </div>
        <div class="code-card">
          <div class="code-tab-bar">
            <div class="code-filename"><span class="file-dot"></span>generic.ts</div>
            <button class="run-btn" data-run="ts6">▶ Jalankan</button>
          </div>
          <div class="code-body">
            <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
            <div class="code-content"><span class="tok-kw">function</span> <span
                class="tok-var">ambilPertama</span>&lt;<span class="tok-var">T</span>&gt;(<span
                class="tok-var">arr</span>: <span class="tok-var">T</span>[]): <span class="tok-var">T</span> {
              <span class="tok-kw">return</span> <span class="tok-var">arr</span>[<span class="tok-num">0</span>];
              }
              <span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span
                class="tok-fn">ambilPertama</span>([<span class="tok-num">1</span>, <span class="tok-num">2</span>,
              <span class="tok-num">3</span>]));
              <span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span
                class="tok-fn">ambilPertama</span>([<span class="tok-str">"a"</span>, <span
                class="tok-str">"b"</span>]));
            </div>
          </div>
          <div class="output-bar">
            <div class="output-label">OUTPUT (console)</div>
            <div class="output-content" id="out-ts6"></div>
          </div>
        </div>
        <div class="callout note"><strong>Catatan:</strong> <code>&lt;T&gt;</code> adalah <em>type parameter</em> — bisa
          diganti huruf lain. Convention: <code>T</code> (Type), <code>K</code> (Key), <code>V</code> (Value).</div>
        <div class="topic-nav">
          <button class="nav-btn" data-prev="ts-5">← Sebelumnya</button>
          <button class="nav-btn primary" data-next="ts-7">Lanjut: Enum &amp; Union →</button>
        </div>
      </article>

      <article class="topic-section" data-topic="ts-7">
        <div class="topic-eyebrow">TOPIK 7 / 12</div>
        <h2 class="topic-title">Enum &amp; Union</h2>
        <div class="topic-body">
          <p><strong>Enum</strong> mendefinisikan kumpulan nilai yang sudah ditentukan. <strong>Union type</strong>
            (<code>|</code>) memungkinkan variabel memiliki lebih dari satu tipe. Keduanya membuat kode lebih ekspresif
            dan aman.</p>
        </div>
        <div class="code-card">
          <div class="code-tab-bar">
            <div class="code-filename"><span class="file-dot"></span>enum.ts</div>
            <button class="run-btn" data-run="ts7">▶ Jalankan</button>
          </div>
          <div class="code-body">
            <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6</div>
            <div class="code-content"><span class="tok-kw">enum</span> <span class="tok-var">Level</span> { <span
                class="tok-var">Pemula</span>, <span class="tok-var">Menengah</span>, <span class="tok-var">Mahir</span>
              }
              <span class="tok-kw">type</span> <span class="tok-var">Id</span> = <span class="tok-var">number</span> |
              <span class="tok-var">string</span>;

              <span class="tok-kw">const</span> <span class="tok-var">levelUser</span>: <span
                class="tok-var">Level</span> = <span class="tok-var">Level</span>.<span class="tok-var">Menengah</span>;
              <span class="tok-kw">const</span> <span class="tok-var">userId</span>: <span class="tok-var">Id</span> =
              <span class="tok-str">"usr_001"</span>;
              <span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span
                class="tok-var">levelUser</span>, <span class="tok-var">userId</span>);
            </div>
          </div>
          <div class="output-bar">
            <div class="output-label">OUTPUT (console)</div>
            <div class="output-content" id="out-ts7"></div>
          </div>
        </div>
        <div class="callout tip"><strong>Tips:</strong> Enum numeric default mulai dari 0. Bisa diubah:
          <code>enum Level { Pemula = 1, Menengah, Mahir }</code>.</div>
        <div class="topic-nav">
          <button class="nav-btn" data-prev="ts-6">← Sebelumnya</button>
          <button class="nav-btn primary" data-next="ts-8">Lanjut: Module &amp; Import →</button>
        </div>
      </article>

      <article class="topic-section" data-topic="ts-8">
        <div class="topic-eyebrow">TOPIK 8 / 12</div>
        <h2 class="topic-title">Module &amp; Import</h2>
        <div class="topic-body">
          <p>TypeScript mendukung <strong>ES Module</strong> — <code>export</code> dan <code>import</code>. File TS bisa
            <code>export</code> fungsi/class/type dan <code>import</code> di file lain. TypeScript juga punya
            <em>declaration files</em> (<code>.d.ts</code>) untuk tipe library JS yang sudah ada.</p>
        </div>
        <div class="code-card">
          <div class="code-tab-bar">
            <div class="code-filename"><span class="file-dot"></span>math.ts</div>
            <button class="run-btn" data-run="ts8">▶ Jalankan</button>
          </div>
          <div class="code-body">
            <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7</div>
            <div class="code-content"><span class="tok-cm">// math.ts</span>
              <span class="tok-kw">export</span> <span class="tok-kw">function</span> <span
                class="tok-fn">kuadrat</span>(<span class="tok-var">x</span>: <span class="tok-var">number</span>):
              <span class="tok-var">number</span> {
              <span class="tok-kw">return</span> <span class="tok-var">x</span> * <span class="tok-var">x</span>;
              }
              <span class="tok-kw">export</span> <span class="tok-kw">const</span> <span class="tok-var">PI</span> =
              <span class="tok-num">3.14</span>;

              <span class="tok-cm">// main.ts</span>
              <span class="tok-kw">import</span> { <span class="tok-var">kuadrat</span>, <span class="tok-var">PI</span>
              } <span class="tok-kw">from</span> <span class="tok-str">"./math"</span>;
              <span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span
                class="tok-fn">kuadrat</span>(<span class="tok-num">5</span>), <span class="tok-var">PI</span>);
            </div>
          </div>
          <div class="output-bar">
            <div class="output-label">OUTPUT (console)</div>
            <div class="output-content" id="out-ts8"></div>
          </div>
        </div>
        <div class="quiz-box">
          <div class="quiz-q">Quiz: TypeScript adalah superset dari bahasa apa?</div>
          <div class="quiz-opts">
            <button class="quiz-opt" data-correct="false">Java</button>
            <button class="quiz-opt" data-correct="true">JavaScript</button>
            <button class="quiz-opt" data-correct="false">Python</button>
          </div>
          <div class="quiz-feedback"></div>
        </div>
        <div class="topic-nav">
          <button class="nav-btn" data-prev="ts-7">← Sebelumnya</button>
          <button class="nav-btn primary" data-next="ts-9">Lanjut: Utility Types →</button>
        </div>
      </article>

      <!-- TS Topic 9 -->
      <article class="topic-section" data-topic="ts-9">
        <div class="topic-eyebrow">TOPIK 9 / 12</div>
        <h2 class="topic-title">Utility Types</h2>
        <div class="topic-body">
          <p>TypeScript menyediakan <strong>utility types</strong> bawaan — tipe bawaan yang memanipulasi tipe lain.
            Utility types seperti fungsi untuk tipe: menerima satu tipe dan menghasilkan tipe baru. Ini mengurangi
            boilerplate dan menjaga kode tetap <em>DRY</em>.</p>
          <p>Utility types yang paling sering dipakai: <code>Partial&lt;T&gt;</code> (semua properti jadi opsional),
            <code>Required&lt;T&gt;</code> (semua properti jadi wajib), <code>Pick&lt;T, K&gt;</code> (ambil properti
            tertentu), <code>Omit&lt;T, K&gt;</code> (hapus properti tertentu), <code>Readonly&lt;T&gt;</code> (semua
            properti readonly), dan <code>Record&lt;K, V&gt;</code> (tipe object dengan key/value tertentu).</p>
        </div>
        <div class="code-card">
          <div class="code-tab-bar">
            <div class="code-filename"><span class="file-dot"></span>utility.ts</div>
            <button class="run-btn" data-run="ts9">▶ Jalankan</button>
          </div>
          <div class="code-body">
            <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15<br>16
            </div>
            <div class="code-content"><span class="tok-kw">interface</span> <span class="tok-var">User</span> {
              <span class="tok-var">nama</span>: <span class="tok-var">string</span>;
              <span class="tok-var">email</span>: <span class="tok-var">string</span>;
              <span class="tok-var">usia</span>: <span class="tok-var">number</span>;
              }

              <span class="tok-cm">// Partial — semua opsional</span>
              <span class="tok-kw">const</span> <span class="tok-var">update</span>: <span
                class="tok-var">Partial</span>&lt;<span class="tok-var">User</span>&gt; = { <span
                class="tok-var">email</span>: <span class="tok-str">"baru@mail.com"</span> };

              <span class="tok-cm">// Pick & Omit</span>
              <span class="tok-kw">type</span> <span class="tok-var">NamaSaja</span> = <span
                class="tok-var">Pick</span>&lt;<span class="tok-var">User</span>, <span
                class="tok-str">"nama"</span>&gt;;
              <span class="tok-kw">type</span> <span class="tok-var">TanpaUsia</span> = <span
                class="tok-var">Omit</span>&lt;<span class="tok-var">User</span>, <span
                class="tok-str">"usia"</span>&gt;;

              <span class="tok-cm">// Record — object dengan key string, value number</span>
              <span class="tok-kw">const</span> <span class="tok-var">nilai</span>: <span
                class="tok-var">Record</span>&lt;<span class="tok-var">string</span>, <span
                class="tok-var">number</span>&gt; = {
              <span class="tok-var">Budi</span>: <span class="tok-num">87</span>,
              <span class="tok-var">Sari</span>: <span class="tok-num">92</span>,
              };

              <span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-var">update</span>,
              <span class="tok-var">nilai</span>);
            </div>
          </div>
          <div class="output-bar">
            <div class="output-label">OUTPUT (console)</div>
            <div class="output-content" id="out-ts9"></div>
          </div>
        </div>
        <div class="callout tip"><strong>Tips:</strong> Utility types bekerja pada <em>structural type system</em> —
          selama bentuk objek cocok, tipe dianggap kompatibel. <code>Pick</code> dan <code>Omit</code> paling sering
          dipakai untuk membuat varian tipe tanpa mengubah interface asli.</div>
        <div class="topic-nav">
          <button class="nav-btn" data-prev="ts-8">← Sebelumnya</button>
          <button class="nav-btn primary" data-next="ts-10">Lanjut: Type Guard →</button>
        </div>
      </article>

      <!-- TS Topic 10 -->
      <article class="topic-section" data-topic="ts-10">
        <div class="topic-eyebrow">TOPIK 10 / 12</div>
        <h2 class="topic-title">Type Guard</h2>
        <div class="topic-body">
          <p><strong>Type guard</strong> adalah mekanisme TypeScript untuk mempersempit (<em>narrowing</em>) tipe union
            di dalam blok kode tertentu. Dengan type guard, kamu bisa memberi tahu TypeScript bahwa di suatu cabang,
            variabel bertipe lebih spesifik. Ini membuat kode lebih aman tanpa <code>as</code> (type assertion) yang
            berbahaya.</p>
          <p>Teknik type guard: <code>typeof</code> untuk tipe primitif, <code>instanceof</code> untuk class,
            <code>in</code> untuk properti objek, dan <strong>custom type guard</strong> dengan
            <code>parameter is Type</code>. Custom type guard adalah fungsi yang mengembalikan <code>boolean</code>
            dengan tipe return <code>value is TipeTertentu</code>.</p>
        </div>
        <div class="code-card">
          <div class="code-tab-bar">
            <div class="code-filename"><span class="file-dot"></span>guard.ts</div>
            <button class="run-btn" data-run="ts10">▶ Jalankan</button>
          </div>
          <div class="code-body">
            <div class="code-lines">
              1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15<br>16<br>17<br>18</div>
            <div class="code-content"><span class="tok-kw">function</span> <span
                class="tok-fn">cetakPanjang</span>(<span class="tok-var">input</span>: <span
                class="tok-var">string</span> | <span class="tok-var">number</span>[]) {
              <span class="tok-cm">// typeof guard</span>
              <span class="tok-kw">if</span> (<span class="tok-kw">typeof</span> <span class="tok-var">input</span> ===
              <span class="tok-str">"string"</span>) {
              <span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-str">"Panjang
                string:"</span>, <span class="tok-var">input</span>.<span class="tok-var">length</span>);
              }
              <span class="tok-kw">if</span> (<span class="tok-var">input</span> <span class="tok-kw">instanceof</span>
              <span class="tok-var">Array</span>) {
              <span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-str">"Panjang
                array:"</span>, <span class="tok-var">input</span>.<span class="tok-var">length</span>);
              }
              }

              <span class="tok-kw">interface</span> <span class="tok-var">Kucing</span> { <span
                class="tok-var">suara</span>: <span class="tok-var">string</span>; <span class="tok-fn">meong</span>():
              <span class="tok-var">void</span>; }
              <span class="tok-kw">interface</span> <span class="tok-var">Anjing</span> { <span
                class="tok-var">suara</span>: <span class="tok-var">string</span>; <span class="tok-fn">gukguk</span>():
              <span class="tok-var">void</span>; }

              <span class="tok-cm">// Custom type guard</span>
              <span class="tok-kw">function</span> <span class="tok-fn">isKucing</span>(<span
                class="tok-var">hew</span>: <span class="tok-var">Kucing</span> | <span class="tok-var">Anjing</span>):
              <span class="tok-var">hew</span> <span class="tok-kw">is</span> <span class="tok-var">Kucing</span> {
              <span class="tok-kw">return</span> (<span class="tok-var">hew</span> <span class="tok-kw">as</span> <span
                class="tok-var">Kucing</span>).<span class="tok-var">meong</span> !== <span
                class="tok-kw">undefined</span>;
              }

              <span class="tok-kw">const</span> <span class="tok-var">hewan</span>: <span class="tok-var">Kucing</span>
              | <span class="tok-var">Anjing</span> = { <span class="tok-var">suara</span>: <span
                class="tok-str">"miaw"</span>, <span class="tok-fn">meong</span>() { <span
                class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-str">"Meong!"</span>); }
              };
              <span class="tok-kw">if</span> (<span class="tok-fn">isKucing</span>(<span class="tok-var">hewan</span>))
              {
              <span class="tok-var">hewan</span>.<span class="tok-fn">meong</span>();
              }
              <span class="tok-fn">cetakPanjang</span>(<span class="tok-str">"LearnBase"</span>);
              <span class="tok-fn">cetakPanjang</span>([<span class="tok-num">1</span>, <span class="tok-num">2</span>,
              <span class="tok-num">3</span>, <span class="tok-num">4</span>]);
            </div>
          </div>
          <div class="output-bar">
            <div class="output-label">OUTPUT (console)</div>
            <div class="output-content" id="out-ts10"></div>
          </div>
        </div>
        <div class="callout tip"><strong>Tips:</strong> Custom type guard dengan <code>value is Type</code> sangat
          berguna saat bekerja dengan <strong>discriminated union</strong> — union yang punya properti literal pembeda.
          TypeScript akan otomatis mempersempit tipe setelah guard dipanggil.</div>
        <div class="topic-nav">
          <button class="nav-btn" data-prev="ts-9">← Sebelumnya</button>
          <button class="nav-btn primary" data-next="ts-11">Lanjut: Decorator →</button>
        </div>
      </article>

      <!-- TS Topic 11 -->
      <article class="topic-section" data-topic="ts-11">
        <div class="topic-eyebrow">TOPIK 11 / 12</div>
        <h2 class="topic-title">Decorator</h2>
        <div class="topic-body">
          <p><strong>Decorator</strong> adalah fungsi khusus yang memodifikasi class, method, property, atau parameter
            saat runtime. Ditandai dengan <code>@decorator</code> dan diaktifkan lewat
            <code>experimentalDecorators</code> di tsconfig. Decorator dipakai luas di framework seperti Angular dan
            NestJS.</p>
        </div>
        <div class="code-card">
          <div class="code-tab-bar">
            <div class="code-filename"><span class="file-dot"></span>decorator.ts</div>
            <button class="run-btn" data-run="ts11">▶ Jalankan</button>
          </div>
          <div class="code-body">
            <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10</div>
            <div class="code-content"><span class="tok-kw">function</span> <span class="tok-fn">log</span>(<span
                class="tok-var">target</span>: <span class="tok-var">any</span>, <span class="tok-var">key</span>: <span
                class="tok-var">string</span>) {
              <span class="tok-fn">console</span>.<span class="tok-fn">log</span>(<span class="tok-str">`Method <span
                  class="tok-fn">${key}</span> dipanggil`</span>);
              }
              <span class="tok-kw">class</span> <span class="tok-var">Belajar</span> {
              @<span class="tok-fn">log</span>
              <span class="tok-fn">mulai</span>() { <span class="tok-fn">console</span>.<span
                class="tok-fn">log</span>(<span class="tok-str">"Belajar dimulai"</span>); }
              }
              <span class="tok-kw">new</span> <span class="tok-var">Belajar</span>().<span
                class="tok-fn">mulai</span>();
            </div>
          </div>
          <div class="output-bar">
            <div class="output-label">OUTPUT (console)</div>
            <div class="output-content" id="out-ts11"></div>
          </div>
        </div>
        <div class="callout note"><strong>Catatan:</strong> Decorator masih dalam status <em>experimental</em> di
          TypeScript. Aktifkan dengan <code>"experimentalDecorators": true</code> di <code>tsconfig.json</code>. Ada 4
          jenis: class, method, accessor, property, parameter.</div>
        <div class="topic-nav">
          <button class="nav-btn" data-prev="ts-10">← Sebelumnya</button>
          <button class="nav-btn primary" data-next="ts-12">Lanjut: Declaration File →</button>
        </div>
      </article>

      <!-- TS Topic 12 -->
      <article class="topic-section" data-topic="ts-12">
        <div class="topic-eyebrow">TOPIK 12 / 12</div>
        <h2 class="topic-title">Declaration File</h2>
        <div class="topic-body">
          <p><strong>Declaration file</strong> (<code>.d.ts</code>) berisi definisi tipe untuk kode JavaScript yang
            sudah ada. Memungkinkan TypeScript memahami tipe library JS tanpa menulis ulang kodenya. File
            <code>.d.ts</code> hanya berisi deklarasi — tanpa implementasi. Banyak library populer sudah punya
            <code>@types/nama-package</code> di npm.</p>
        </div>
        <div class="code-card">
          <div class="code-tab-bar">
            <div class="code-filename"><span class="file-dot"></span>halo.d.ts</div>
            <button class="run-btn" data-run="ts12">▶ Jalankan</button>
          </div>
          <div class="code-body">
            <div class="code-lines">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8</div>
            <div class="code-content"><span class="tok-cm">// halo.d.ts — deklarasi tipe untuk library JS</span>
              <span class="tok-kw">export interface</span> <span class="tok-var">Pengguna</span> {
              <span class="tok-var">nama</span>: <span class="tok-var">string</span>;
              <span class="tok-var">skor</span>: <span class="tok-var">number</span>;
              }
              <span class="tok-kw">export function</span> <span class="tok-fn">cetakSkor</span>(<span
                class="tok-var">u</span>: <span class="tok-var">Pengguna</span>): <span class="tok-kw">void</span>;
            </div>
          </div>
          <div class="output-bar">
            <div class="output-label">OUTPUT (console)</div>
            <div class="output-content" id="out-ts12"></div>
          </div>
        </div>
        <div class="callout tip"><strong>Tips:</strong> Install <code>@types/package</code> lewat npm untuk library yang
          belum punya deklarasi built-in. Contoh: <code>npm install --save-dev @types/lodash</code>. Buat sendiri dengan
          <code>declare module 'nama-modul'</code>.</div>
        <div class="quiz-box">
          <div class="quiz-q">Quiz: Ekstensi file untuk deklarasi tipe TypeScript?</div>
          <div class="quiz-opts">
            <button class="quiz-opt" data-correct="false">.ts</button>
            <button class="quiz-opt" data-correct="true">.d.ts</button>
            <button class="quiz-opt" data-correct="false">.type.ts</button>
          </div>
          <div class="quiz-feedback"></div>
        </div>
        <div class="topic-nav">
          <button class="nav-btn" data-prev="ts-11">← Sebelumnya</button>
          <button class="nav-btn primary" type="button" id="finishBtn">Selesai — Kembali ke Library </button>
        </div>
      </article>
    </section>

  </main>

  <script>
    (function () {
      const totalTopics = 12;
      const LANGUAGE = 'ts'; // harus sama dengan key di $languages pada get_progress.php
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
      loadProgress().then(() => markDone('ts-1'));

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