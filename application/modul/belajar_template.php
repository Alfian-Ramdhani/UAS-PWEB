<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $modul['name'] ?> — LearnBase</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/style-modul.css') ?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.45.0/min/vs/loader.min.js"></script>
<style>
  .library-back-btn { position:fixed; top:12px; right:16px; z-index:200; display:inline-flex; align-items:center; height:36px; padding:0 14px; border-radius:8px; background:var(--bg-editor-soft); border:1px solid var(--line); color:var(--text-bright); font-family:'Inter',sans-serif; font-size:13px; font-weight:600; text-decoration:none; transition:background .15s; }
  .library-back-btn:hover { background:rgba(255,255,255,0.1); }
  .completion-overlay { position:fixed; inset:0; z-index:500; background:rgba(10,10,10,0.72); display:flex; align-items:center; justify-content:center; padding:20px; animation:completionFadeIn .18s ease; }
  .completion-modal { background:var(--bg-editor-soft); border:1px solid var(--line); border-radius:14px; padding:34px 30px; max-width:380px; width:100%; text-align:center; color:var(--text-bright); display:flex; flex-direction:column; align-items:center; }
	  .completion-modal h2, .completion-modal p { text-align:center !important; width:100% !important; margin-left:auto !important; margin-right:auto !important; }
	  .completion-modal .completion-actions { justify-content:center !important; }
  @keyframes completionFadeIn { from{opacity:0} to{opacity:1} }
  .video-section { margin-top:28px; margin-bottom:36px; padding-bottom:24px; border-bottom:1px solid var(--line); }
  .video-grid { display:flex; flex-direction:column; gap:16px; }
  .video-card { width:100%; max-width:100%; background:var(--bg-editor); border:1px solid var(--line); border-radius:14px; overflow:hidden; }
  .video-thumb { position:relative; padding-top:56.25%; background:#000; cursor:pointer; }
  .video-thumb img { position:absolute; top:0; left:0; width:100%; height:100%; object-fit:cover; }
  .video-thumb .play-overlay { position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:60px; height:60px; border-radius:50%; background:rgba(0,0,0,0.7); display:flex; align-items:center; justify-content:center; }
  .video-info { padding:12px 14px; }
  .video-info .video-title-text { font-weight:600; font-size:14px; color:var(--charcoal); }
  .video-info .video-duration { font-size:12px; color:var(--gray-soft); margin-top:3px; }
  @media (max-width:768px) { .video-grid { flex-direction:row !important; flex-wrap:wrap !important; } .video-card { flex:1 1 calc(50% - 8px); min-width:160px; } }
  @media (max-width:480px) { .video-card { flex:1 1 100%; } }
  .code-card .code-body { display:block !important; width:100% !important; }
  .monaco-editor-shell { width:100%; min-height:140px; }
</style>
</head>
<body>
<script>if(localStorage.getItem("learnbase_dark_mode")==="true")document.body.classList.add("dark-mode");</script>

<?php
$membership = $membership ?? 'free';
$content = $modul['content'];

$content = str_replace("window.location.href = '../library.html'", "window.location.href = '" . site_url('library') . "'", $content);
$content = str_replace("<?= site_url('library') ?>", site_url('library'), $content);
$content = str_replace('<?= site_url(\'library\') ?>', site_url('library'), $content);
$content = str_replace("window.location.href = '../auth.html'", "window.location.href = '" . site_url('auth/login') . "'", $content);

// Perbaiki struktur HTML sidebar: tutup <nav> jika belum ditutup
$content = preg_replace('/<\/div>\s*\n\s*<div class="sidebar-foot">/', '</nav></div><div class="sidebar-foot">', $content);

$content = preg_replace('/<div class="completion-emoji">.*?<\/div>/s', '', $content);

$save_url = site_url('save_progress.php');
$get_url = site_url('get_progress.php');
$content = str_replace("fetch('../save_progress.php'", "fetch('" . $save_url . "'", $content);
$content = str_replace('fetch(`../get_progress.php?language=', 'fetch(`' . $get_url . '?language=', $content);

if ($membership === 'premium') {
    $video = '<div class="video-section" id="videoPembelajaran"><h2 style="font-family:Space Grotesk,sans-serif;font-weight:700;font-size:22px;margin-bottom:16px;color:var(--charcoal);">Pembelajaran</h2><div class="video-grid"><div class="video-card"><div class="video-thumb" onclick="this.innerHTML=\'<iframe style=position:absolute;top:0;left:0;width:100%;height:100%; src=https://www.youtube.com/embed/dQw4w9WgXcQ frameborder=0 allowfullscreen></iframe>\'"><img src="https://img.youtube.com/vi/dQw4w9WgXcQ/hqdefault.jpg" alt="Video"><div class="play-overlay"><svg width="24" height="24" viewBox="0 0 24 24" fill="white"><polygon points="6,4 20,12 6,20"></polygon></svg></div></div><div class="video-info"><div class="video-title-text">Pendahuluan</div><div class="video-duration">12 menit</div></div></div></div></div>';
    $content = preg_replace('/(<div class="topic-body">.*?<\/div>\s*)/s', '$1' . $video, $content, 1);
}

$cert_button = '<button class="nav-btn" id="completionCertBtn" type="button" style="background:linear-gradient(135deg,#FFD700,#FFA500);border-color:#FFD700;color:#1a1a1a;font-weight:700;">Sertifikat</button>';
$content = str_replace('<button class="nav-btn primary" id="completionLibraryBtn"', $cert_button . "\n          " . '<button class="nav-btn primary" id="completionLibraryBtn"', $content);

$listener_js = 'document.getElementById("completionCertBtn").addEventListener("click", function() { window.open("' . site_url('certificate/download/' . $modul['slug']) . '", "_blank"); });';
$content = str_replace("document.getElementById('completionLibraryBtn').addEventListener('click',", $listener_js . "\n    document.getElementById('completionLibraryBtn').addEventListener('click',", $content);

echo $content;
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php if ($membership === 'premium') $this->load->view('premium_features'); ?>

<script>
// Map ekstensi file ke bahasa Monaco
var EXT_TO_MONACO = { js:'javascript', ts:'typescript', py:'python', php:'php', java:'java', cpp:'cpp', c:'c', cs:'csharp', go:'go', rb:'ruby', rs:'rust', sql:'sql' };

function getFileExt(card) {
  var fn = card.querySelector('.code-filename');
  if (!fn) return 'js';
  var parts = fn.textContent.trim().split('.');
  return parts.length > 1 ? parts[parts.length - 1] : 'js';
}

// ---- MONACO EDITOR (hanya untuk tampilan + editing) ----
require.config({ paths: { vs: 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.45.0/min/vs' } });

require(['vs/editor/editor.main'], function() {
  document.querySelectorAll('.code-card').forEach(function(card) {
    var codeBody = card.querySelector('.code-body');
    var codeContent = card.querySelector('.code-content');
    if (!codeContent || codeBody.hasAttribute('data-mc')) return;
    codeBody.setAttribute('data-mc', '1');

    var clone = codeContent.cloneNode(true);
    var ln = clone.querySelector('.code-lines');
    if (ln) ln.remove();
    var txt = clone.textContent.trim();
    var ext = getFileExt(card);
    var lang = EXT_TO_MONACO[ext] || 'javascript';

    var shell = document.createElement('div');
    shell.className = 'monaco-editor-shell';
    codeBody.innerHTML = '';
    codeBody.appendChild(shell);

    var editor = monaco.editor.create(shell, {
      value: txt,
      language: lang,
      theme: 'vs-dark',
      fontSize: 13,
      minimap: { enabled: false },
      scrollBeyondLastLine: false,
      automaticLayout: true,
      lineNumbers: 'on',
      renderLineHighlight: 'none',
      padding: { top: 12, bottom: 12 },
    });

    // Simpan referensi editor di elemen card
    card._editor = editor;

    // Auto-height
    editor.onDidChangeModelContent(function() {
      var lines = editor.getModel().getLineCount();
      var h = Math.max(140, Math.min(lines * 20, 450));
      shell.style.height = h + 'px';
      editor.layout();
    });
  });
});

// ---- EXECUTOR (berdiri sendiri, tidak tergantung Monaco) ----
function getCode(card) {
  if (card._editor) return card._editor.getValue();
  var ta = card.querySelector('.code-body textarea');
  if (ta) return ta.value.trim();
  var cc = card.querySelector('.code-content');
  if (!cc) return '';
  var c = cc.cloneNode(true);
  var l = c.querySelector('.code-lines');
  if (l) l.remove();
  return c.textContent.trim();
}

// JS di browser
function runJS(code, out) {
  var lines = [];
  var c = {
    log: function() { var a = Array.prototype.slice.call(arguments); lines.push(a.map(function(x) { return typeof x === 'object' ? JSON.stringify(x, null, 2) : String(x); }).join(' ')); },
    error: function() { var a = Array.prototype.slice.call(arguments); lines.push('[ERROR] ' + a.join(' ')); },
    warn: function() { var a = Array.prototype.slice.call(arguments); lines.push('[WARN] ' + a.join(' ')); },
  };
  try {
    (new Function('console', code))(c);
    out.textContent = lines.join('\n') || 'selesai (tidak ada output)';
    out.style.color = '#6FD98B';
  } catch (e) {
    out.textContent = e.toString();
    out.style.color = '#f48771';
  }
}

// Bahasa lain via backend
function runRemote(code, lang, out) {
  fetch('<?= site_url('codeeditor/run') ?>', {
    method: 'POST',
    headers: {'Content-Type':'application/json'},
    body: JSON.stringify({code:code, language:lang})
  })
  .then(function(r){ return r.json(); })
  .then(function(d) {
    var s = '';
    if (d.output) s += d.output;
    if (d.error) s += (s ? '\n' : '') + d.error;
    out.textContent = s || '(tidak ada output)';
    out.style.color = (d.error && !d.output) ? '#f48771' : '#6FD98B';
  })
  .catch(function(e) {
    out.textContent = 'Gagal: ' + e.message;
    out.style.color = '#f48771';
  });
}

// Click handler untuk tombol Jalankan — pakai event delegation
document.addEventListener('click', function(e) {
  var btn = e.target.closest('.run-btn');
  if (!btn) return;
  e.preventDefault();

  var card = btn.closest('.code-card');
  if (!card) return;
  var out = card.querySelector('.output-content');
  if (!out) return;
  var code = getCode(card);
  if (!code) { out.textContent = '(kode kosong)'; out.style.color = '#f48771'; return; }

  btn.disabled = true;
  btn.textContent = 'Menjalankan...';
  out.textContent = 'Menjalankan...';
  out.style.color = '#8B96A5';

  setTimeout(function() {
    var ext = getFileExt(card);
    if (ext === 'js') runJS(code, out);
    else runRemote(code, ext, out);
    btn.disabled = false;
    btn.textContent = 'Jalankan';
  }, 150);
});
</script>
</body>
</html>
