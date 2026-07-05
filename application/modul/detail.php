<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Mapping data per-slug (short code, icon, rating, desc, summary, topics)
$module_meta = [
	'javascript' => [
		'code' => 'js', 'icon' => 'JS', 'rating' => 4.5,
		'desc' => 'JavaScript adalah bahasa pemrograman yang berjalan langsung di browser — inti dari interaktivitas web modern. Modul ini mencakup 12 topik mulai dari dasar variabel hingga konsep ES6+ modern, async/await, dan class. Setiap topik dilengkapi dengan kartu kode interaktif dan kuis untuk menguji pemahaman kamu.',
		'summary' => [
			'Memahami sintaks dasar dan konsep pemrograman JavaScript',
			'Menguasai DOM manipulation dan event handling',
			'Bekerja dengan array, object, dan JSON',
			'Menulis kode asinkron dengan async/await dan fetch API',
			'Memahami class, module, dan fitur ES6+ modern',
			'Siap melanjutkan ke framework seperti React atau Node.js'
		],
		'topics' => ['Apa itu JavaScript?','Variabel & Tipe Data','Fungsi & Kondisi','DOM: Mengubah Halaman','Array & Method','Object & JSON','Event & Interaksi','Async & Fetch','Module & Import','Array Destructure & Spread','Class & Prototype','Modern ES6+ Recap']
	],
	'php' => [
		'code' => 'php', 'icon' => 'PHP', 'rating' => 4.6,
		'desc' => 'PHP adalah bahasa yang berjalan di server untuk mengolah data sebelum dikirim ke browser. Modul ini membahas 12 topik dari dasar PHP hingga keamanan web, session, database MySQL, dan OOP.',
		'summary' => [
			'Memahami konsep server-side programming dengan PHP',
			'Menguasai variabel, kondisi, perulangan, dan array',
			'Bekerja dengan form, session, cookie, dan database MySQL',
			'Memahami namespace, autoload, dan error handling',
			'Menerapkan OOP dan praktik keamanan web',
			'Siap membuat aplikasi web dinamis dengan PHP'
		],
		'topics' => ['Apa itu PHP?','Variabel & Echo','Kondisi & Perulangan','Form & Superglobal','Fungsi & Array','Session & Cookie','Database MySQL','File & Upload','Namespace & Autoload','Error & Exception','OOP di PHP','Keamanan Web']
	],
	'python' => [
		'code' => 'py', 'icon' => 'PY', 'rating' => 4.8,
		'desc' => 'Python dikenal karena sintaksnya yang bersih dan mudah dibaca. Modul ini mencakup 12 topik dari dasar hingga OOP, cocok untuk data science, automasi, dan pengembangan backend.',
		'summary' => [
			'Menulis kode Python dengan sintaks yang bersih',
			'Menguasai tipe data, kondisi, perulangan, dan fungsi',
			'Bekerja dengan dictionary, tuple, string, dan file I/O',
			'Memahami module, library, dan exception handling',
			'Menguasai list comprehension dan virtual environment',
			'Siap untuk data science atau backend dengan Flask/Django'
		],
		'topics' => ['Apa itu Python?','Variabel & Tipe Data','Kondisi & Perulangan','Fungsi & List','Dictionary & Tuple','String & Formatting','File I/O','Module & Library','Exception Handling','List Comprehension','pip & Virtual Env','Pengenalan OOP']
	],
	'java' => [
		'code' => 'java', 'icon' => 'JV', 'rating' => 4.5,
		'desc' => 'Java adalah bahasa OOP tangguh yang berjalan di JVM. Modul ini mencakup 12 topik dari dasar hingga konsep lanjutan seperti polymorphism, abstract class, dan file I/O.',
		'summary' => [
			'Memahami dasar Java dan prinsip OOP',
			'Menguasai variabel, tipe data, kondisi, dan perulangan',
			'Bekerja dengan method, constructor, dan ArrayList',
			'Memahami inheritance, exception, dan package',
			'Menguasai polymorphism, abstract class, dan interface',
			'Siap untuk pengembangan Android atau backend enterprise'
		],
		'topics' => ['Apa itu Java?','Variabel & Tipe Data','Kondisi & Perulangan','Method & Class','Constructor & Object','Array & ArrayList','Inheritance','Exception Handling','Package & Import','Polymorphism','Abstract & Interface','File I/O']
	],
	'cpp' => [
		'code' => 'cpp', 'icon' => 'C++', 'rating' => 4.7,
		'desc' => 'C++ memberi kendali penuh atas memori dengan performa tinggi. Modul ini mencakup 12 topik dari dasar C++ hingga STL, templates, dan file stream.',
		'summary' => [
			'Memahami dasar C++ dan sintaksnya',
			'Menguasai variabel, kondisi, perulangan, dan array',
			'Bekerja dengan fungsi overloading, pointer, dan reference',
			'Memahami struct, class, dan inheritance',
			'Menguasai templates, STL, dan file stream',
			'Siap untuk game development, sistem, atau aplikasi performa tinggi'
		],
		'topics' => ['Apa itu C++?','Variabel & Tipe','Kondisi & Switch','Perulangan','Array & String','Fungsi & Overloading','Pointer & Reference','Struct & Class','Inheritance','Templates','STL','File Stream']
	],
	'c' => [
		'code' => 'c', 'icon' => 'C', 'rating' => 4.6,
		'desc' => 'C adalah fondasi dari banyak bahasa modern. Modul ini mencakup 12 topik dari dasar C hingga pointer, memory allocation, dan Makefile.',
		'summary' => [
			'Memahami dasar C dan sintaks prosedural',
			'Menguasai variabel, tipe data, input/output',
			'Bekerja dengan array, string, dan fungsi',
			'Memahami pointer, struct, dan memory allocation',
			'Menguasai multi-file project, preprocessor, dan Makefile',
			'Siap untuk sistem embedded, kernel, atau firmware'
		],
		'topics' => ['Apa itu C?','Variabel & Tipe','Input & Output','Kondisi & Perulangan','Array & String','Fungsi & Header','Pointer','Struct & File','Memory Allocation','Multi-file Project','Preprocessor','Makefile & Build']
	],
	'csharp' => [
		'code' => 'cs', 'icon' => 'C#', 'rating' => 4.5,
		'desc' => 'C# adalah bahasa modern dari Microsoft untuk ekosistem .NET. Modul ini mencakup 12 topik dari dasar hingga async/await, LINQ, dan delegates.',
		'summary' => [
			'Memahami dasar C# dan platform .NET',
			'Menguasai variabel, kondisi, dan perulangan',
			'Bekerja dengan method, class, property, dan List',
			'Memahami inheritance, LINQ, dan namespace',
			'Menguasai interface, delegates, events, dan async/await',
			'Siap untuk game Unity, ASP.NET, atau aplikasi Windows'
		],
		'topics' => ['Apa itu C#?','Variabel & Tipe','Kondisi & Perulangan','Method & Class','Property & Constructor','Array & List','Inheritance','LINQ & Lambda','Namespace & Using','Interface','Delegates & Events','Async & Await']
	],
	'go' => [
		'code' => 'go', 'icon' => 'GO', 'rating' => 4.6,
		'desc' => 'Go menggabungkan sintaks sederhana dengan performa tinggi dan concurrency built-in. Modul ini mencakup 12 topik dari dasar hingga goroutine, channel, dan package.',
		'summary' => [
			'Memahami dasar Go dan sintaks minimalis',
			'Menguasai variabel, tipe data, kondisi, dan perulangan',
			'Bekerja dengan array, slice, dan fungsi multiple return',
			'Memahami struct, method, pointer, dan interface',
			'Menguasai goroutine, channel, select, dan error handling',
			'Siap untuk microservices, API server, dan cloud-native apps'
		],
		'topics' => ['Apa itu Go?','Variabel & Tipe','Kondisi & Switch','Perulangan & Range','Array & Slice','Fungsi & Multiple Return','Struct & Method','Pointer & Interface','Goroutine','Channel & Select','Error Handling','Package & Module']
	],
	'ruby' => [
		'code' => 'ruby', 'icon' => 'RB', 'rating' => 4.4,
		'desc' => 'Ruby dirancang untuk produktivitas dan kebahagiaan developer. Modul ini mencakup 12 topik dari dasar Ruby hingga mixin, module, dan enumerable.',
		'summary' => [
			'Memahami filosofi dan sintaks natural Ruby',
			'Menguasai variabel, kondisi, unless, dan each',
			'Bekerja dengan array, hash, method, dan block',
			'Memahami class, object, symbol, dan module',
			'Menguasai Enumerable, file I/O, exception, dan mixin',
			'Siap untuk Ruby on Rails atau automasi scripting'
		],
		'topics' => ['Apa itu Ruby?','Variabel & Tipe','Kondisi & Unless','Perulangan & Each','Array & Hash','Method & Block','Class & Object','Symbol & Module','Enumerable','File I/O','Exception','Mixin & Inheritance']
	],
	'rust' => [
		'code' => 'rust', 'icon' => 'RS', 'rating' => 4.9,
		'desc' => 'Rust menjamin memory safety tanpa garbage collector. Modul ini mencakup 12 topik dari dasar Rust hingga ownership, trait, dan Cargo.',
		'summary' => [
			'Memahami ownership system dan memory safety Rust',
			'Menguasai variabel, mutability, dan tipe data',
			'Bekerja dengan kondisi, perulangan, dan pattern matching',
			'Memahami fungsi, ownership, struct, dan impl',
			'Menguasai enum, error handling, generic, dan trait',
			'Siap untuk CLI tools, WebAssembly, atau systems programming'
		],
		'topics' => ['Apa itu Rust?','Variabel & Mutability','Tipe Data','Kondisi & Perulangan','Fungsi & Ownership','Struct & impl','Enum & Pattern','Error Handling','Collection & Iterator','String vs &str','Generic & Trait','Cargo & Crates']
	],
	'typescript' => [
		'code' => 'ts', 'icon' => 'TS', 'rating' => 4.6,
		'desc' => 'TypeScript adalah JavaScript dengan tipe statis. Modul ini mencakup 12 topik dari dasar TypeScript hingga generic, decorator, dan declaration files.',
		'summary' => [
			'Memahami hubungan TypeScript dan JavaScript',
			'Menguasai tipe dasar, interface, dan type alias',
			'Bekerja dengan class, array, tuple, dan generic',
			'Memahami enum, union, module, dan utility types',
			'Menguasai type guard, decorator, dan declaration files',
			'Siap untuk pengembangan aplikasi skala besar dengan TS'
		],
		'topics' => ['Apa itu TypeScript?','Tipe Dasar','Interface & Type','Class & Access Modifier','Array & Tuple','Generic','Enum & Union','Module & Import','Utility Types','Type Guard','Decorator','Declaration File']
	],
	'sqlite' => [
		'code' => 'sql', 'icon' => 'SQ', 'rating' => 4.5,
		'desc' => 'SQLite adalah database engine ringan yang tertanam. Modul ini mencakup 12 topik dari dasar SQLite hingga JOIN, subquery, index, dan transaction.',
		'summary' => [
			'Memahami konsep database relasional dan SQLite',
			'Menguasai CREATE TABLE, INSERT, dan SELECT',
			'Bekerja dengan WHERE, filter, UPDATE, dan DELETE',
			'Memahami ORDER, LIMIT, JOIN, dan GROUP BY',
			'Menguasai subquery, index, view, dan transaction',
			'Siap untuk penyimpanan data di aplikasi mobile maupun desktop'
		],
		'topics' => ['Apa itu SQLite?','CREATE TABLE','INSERT & SELECT','WHERE & Filter','UPDATE & DELETE','ORDER & LIMIT','JOIN','GROUP & Aggregat','Subquery','Index','View','Transaction']
	]
];

$slug = $modul['slug'];
$meta = $module_meta[$slug] ?? $module_meta['javascript'];

// Icon colors per-language
$icon_colors = [
	'js' => '#E8B339', 'php' => '#8B6FE8', 'py' => '#3DAA6E',
	'java' => '#E76F00', 'cpp' => '#00599C', 'c' => '#A8B9CC',
	'cs' => '#239120', 'go' => '#00ADD8', 'ruby' => '#CC342D',
	'rust' => '#DEA584', 'ts' => '#3178C6', 'sql' => '#003B57'
];
$code = $meta['code'];
$icon_bg = $icon_colors[$code] ?? '#0E6853';
$icon_text = ($code === 'js' || $code === 'c' || $code === 'go' || $code === 'rust') ? '#1C1A14' : '#fff';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $modul['name'] ?> — LEARNBASE.</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
:root {
  --deep-green: #0E6853;
  --deep-green-dark: #0a4f3f;
  --deep-green-light: #E7F2EF;
  --orange: #FF5B35;
  --orange-light: #FFEFEA;
  --charcoal: #1A1A1A;
  --gray: #666666;
  --gray-soft: #8A8A8A;
  --bg: #F7F9F8;
  --line: #EAEDEC;
  --border-light: #e8edec;
  --sidebar-w: 264px;
  --card-bg: #fff;
}
body.dark-mode {
  --deep-green: #1ABC9C;
  --deep-green-dark: #16A085;
  --deep-green-light: #1A3E3A;
  --orange: #FF7F50;
  --orange-light: #3E2A20;
  --charcoal: #E8E8E8;
  --gray: #B0B0B0;
  --gray-soft: #888;
  --bg: #0F171E;
  --line: #1F2A33;
  --border-light: #1F2A33;
  --card-bg: #1A2530;
}
body.dark-mode .sidebar,
body.dark-mode .top-header,
body.dark-mode .profile-dropdown,
body.dark-mode .detail-hero,
body.dark-mode .detail-section,
body.dark-mode .site-footer { background: var(--card-bg); }
body.dark-mode .detail-hero,
body.dark-mode .detail-section,
body.dark-mode .top-header,
body.dark-mode .sidebar,
body.dark-mode .site-footer { border-color: var(--line); }
body.dark-mode .search-box input { background: #0F171E; border-color: var(--line); color: var(--text-primary); }
body.dark-mode .icon-btn { background: var(--card-bg); border-color: var(--line); }
body.dark-mode .dash-bg-shapes .bg-circle.c1 { background: radial-gradient(circle, rgba(26,188,156,0.08) 0%, transparent 70%); }
body.dark-mode .toc-list .toc-item { background: #0F171E; }
body.sidebar-collapsed .sidebar { transform: translateX(calc(var(--sidebar-w) * -1)); }
body.sidebar-collapsed .main-area { margin-left: 0; }
body.sidebar-collapsed .sidebar-toggle-collapse svg { transform: rotate(180deg); }
* { box-sizing: border-box; margin: 0; padding: 0; }
html { overflow-x: clip; }
body {
  font-family: 'Inter', sans-serif;
  color: var(--charcoal);
  background: var(--bg);
  overflow-x: clip;
  min-height: 100vh;
  position: relative;
}
h1, h2, h3, h4, h5, h6, .brand-logo { font-family: 'Poppins', sans-serif; }
a { text-decoration: none; color: inherit; }
.lib-bg-shapes { position: fixed; inset: 0; z-index: 0; pointer-events: none; overflow: hidden; }
.lib-bg-shapes .bg-circle { position: absolute; border-radius: 50%; }
.lib-bg-shapes .bg-circle.c1 {
  width: 520px; height: 520px;
  background: radial-gradient(circle, rgba(14,104,83,0.05) 0%, transparent 70%);
  top: -200px; right: -120px;
}
.lib-bg-shapes .bg-circle.c2 {
  width: 380px; height: 380px;
  background: radial-gradient(circle, rgba(255,91,53,0.04) 0%, transparent 70%);
  bottom: -150px; left: -100px;
}
.lib-bg-shapes .bg-dots {
  position: absolute; inset: 0; opacity: 0.25;
  background-image: radial-gradient(var(--border-light) 1px, transparent 1px);
  background-size: 32px 32px;
}
.sidebar {
  position: fixed; top: 0; left: 0; bottom: 0;
  width: var(--sidebar-w); background: #fff;
  border-right: 1px solid var(--line);
  padding: 1.75rem 1.25rem;
  display: flex; flex-direction: column;
  z-index: 1050; transition: transform 0.25s ease;
}
.sidebar .brand-logo {
  font-weight: 800; font-size: 1.35rem;
  color: var(--charcoal); letter-spacing: -0.5px;
  padding: 0 0.5rem; margin-bottom: 2.25rem; display: inline-block;
}
.sidebar .brand-logo span { color: var(--orange); }
.side-nav { list-style: none; padding: 0; margin: 0; flex: 1; }
.side-nav .nav-label {
  font-size: 0.72rem; font-weight: 600; letter-spacing: 0.08em;
  text-transform: uppercase; color: var(--gray-soft);
  padding: 0 0.75rem; margin: 0.25rem 0 0.75rem;
}
.side-nav li { margin-bottom: 0.3rem; }
.side-link {
  display: flex; align-items: center; gap: 0.75rem;
  padding: 0.7rem 0.9rem; border-radius: 12px;
  color: var(--gray); font-weight: 500; font-size: 0.95rem;
  transition: background-color 0.15s ease, color 0.15s ease;
}
.side-link svg { flex-shrink: 0; opacity: 0.85; }
.side-link:hover { background-color: var(--deep-green-light); color: var(--deep-green-dark); }
.side-link.active {
  background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green));
  color: #fff; box-shadow: 0 10px 22px rgba(14,104,83,0.25);
}
.side-link.active svg { opacity: 1; }
.sidebar-footer { border-top: 1px solid var(--line); padding-top: 1rem; margin-top: 1rem; }
.upgrade-card { background: var(--deep-green-light); border-radius: 16px; padding: 1rem; text-align: center; }
.upgrade-card p { font-size: 0.8rem; color: var(--deep-green-dark); margin-bottom: 0.7rem; font-weight: 500; line-height: 1.4; }
.btn-upgrade {
  background: linear-gradient(135deg, var(--orange), var(--deep-green) 60%, var(--deep-green));
  color: #fff; font-weight: 600; font-size: 0.82rem;
  padding: 0.5rem 1rem; border-radius: 50px; border: none; display: inline-block;
  transition: transform 0.15s ease;
}
.btn-upgrade:hover { transform: translateY(-1px); color: #fff; }
.main-area { margin-left: var(--sidebar-w); min-height: 100vh; position: relative; z-index: 1; background: transparent; }
.sidebar-backdrop { z-index: 1040; position: fixed; display: none; inset: 0; background: rgba(0,0,0,0.35); }
.sidebar-backdrop.show { display: block; }
.top-header {
  position: sticky; top: 0; z-index: 1030;
  background: #fff; border-bottom: 1px solid var(--line);
  padding: 1rem 2rem; display: flex; align-items: center; gap: 1.25rem;
}
.sidebar-toggle { display: none; background: none; border: none; padding: 0.4rem; color: var(--charcoal); cursor: pointer; }
.sidebar-toggle-collapse {
  background: none; border: none; padding: 0.4rem;
  color: var(--gray-soft); display: inline-flex; align-items: center;
  transition: color 0.15s ease; cursor: pointer;
}
.sidebar-toggle-collapse:hover { color: var(--deep-green); }
.sidebar-toggle-collapse svg { transition: transform 0.25s ease; }
.search-box { position: relative; flex: 1; max-width: 420px; }
.search-box svg { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--gray-soft); }
.search-box input {
  width: 100%; background: var(--bg); border: 2px solid var(--line);
  border-radius: 12px; padding: 0.55rem 1rem 0.55rem 2.6rem;
  font-size: 0.88rem; color: var(--charcoal); outline: none;
  font-family: 'Inter', sans-serif;
  transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
}
.search-box input::placeholder { color: var(--gray-soft); opacity: 0.6; }
.search-box input:focus { border-color: var(--deep-green); background: #fff; box-shadow: 0 0 0 4px rgba(14,104,83,0.1); }
.header-right { margin-left: auto; display: flex; align-items: center; gap: 1.1rem; }
.icon-btn {
  position: relative; width: 42px; height: 42px; border-radius: 50%;
  background: var(--bg); border: 1px solid var(--line);
  display: flex; align-items: center; justify-content: center;
  color: var(--charcoal); transition: background 0.15s ease; cursor: pointer;
}
.icon-btn:hover { background: var(--deep-green-light); }
.icon-btn .dot-badge { position: absolute; top: 9px; right: 10px; width: 8px; height: 8px; border-radius: 50%; background: var(--orange); border: 2px solid #fff; }
.profile-wrap { position: relative; display: flex; align-items: center; }
.profile-chip {
  display: flex; align-items: center; gap: 0.65rem;
  padding-left: 1rem; border-left: 1px solid var(--line); cursor: pointer;
}
.profile-avatar {
  width: 42px; height: 42px; border-radius: 50%;
  background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green));
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-weight: 700; font-family: 'Poppins', sans-serif; font-size: 0.95rem;
  flex-shrink: 0;
}
.profile-chip .name { font-weight: 600; font-size: 0.88rem; color: var(--charcoal); line-height: 1.2; }
.profile-chip .role { font-size: 0.75rem; color: var(--gray-soft); }
.profile-dropdown {
  position: absolute; top: calc(100% + 8px); right: 0;
  background: #fff; border: 1px solid var(--line); border-radius: 14px;
  box-shadow: 0 12px 32px rgba(0,0,0,0.1); min-width: 210px;
  padding: 0.5rem; display: none; z-index: 1060;
}
.profile-dropdown.open { display: block; }
.profile-dropdown-item {
  display: block; width: 100%; padding: 0.6rem 0.85rem;
  border: none; background: transparent; font-family: 'Inter', sans-serif;
  font-size: 0.85rem; color: var(--charcoal); border-radius: 10px;
  cursor: pointer; text-align: left; transition: background 0.12s ease;
}
.profile-dropdown-item:hover { background: var(--deep-green-light); }
.profile-dropdown-item.danger { color: #D9534F; }
.profile-dropdown-item.danger:hover { background: #FFF0F0; }
.profile-dropdown-divider { height: 1px; background: var(--line); margin: 0.3rem 0.5rem; }
.content-wrap { padding: 2rem; position: relative; z-index: 1; }
.detail-breadcrumb {
  display: flex; align-items: center; gap: 0.5rem;
  font-size: 0.85rem; color: var(--gray-soft); margin-bottom: 1.25rem;
}
.detail-breadcrumb a { color: var(--deep-green); font-weight: 500; transition: color 0.15s ease; }
.detail-breadcrumb a:hover { color: var(--deep-green-dark); }
.detail-breadcrumb .breadcrumb-sep { font-size: 1.1rem; color: var(--line); }
.detail-breadcrumb .current { color: var(--charcoal); font-weight: 600; }
.detail-hero {
  background: #fff; border: 1px solid var(--line); border-radius: 18px;
  padding: 2rem 2.25rem; margin-bottom: 1.5rem;
}
.detail-hero-inner { display: flex; align-items: center; justify-content: space-between; gap: 2rem; }
.detail-hero-text { flex: 1; }
.detail-eyebrow { font-size: 0.72rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: var(--gray-soft); margin-bottom: 0.4rem; }
.detail-title { font-weight: 700; font-size: 1.75rem; color: var(--charcoal); margin-bottom: 0.7rem; line-height: 1.25; }
.detail-meta { display: flex; flex-wrap: wrap; align-items: center; gap: 0.75rem; margin-bottom: 0.85rem; }
.detail-badge { font-size: 0.72rem; font-weight: 600; padding: 0.25rem 0.75rem; border-radius: 6px; display: inline-block; }
.detail-badge.beginner { background: rgba(61,170,110,0.12); color: #2D8A55; }
.detail-badge.intermediate { background: rgba(232,179,57,0.12); color: #B8862A; }
.detail-badge.advanced { background: rgba(217,83,79,0.12); color: #B53D3A; }
.detail-type-label { font-size: 0.82rem; color: var(--gray-soft); font-weight: 500; }
.detail-rating { display: flex; align-items: center; gap: 2px; margin-bottom: 1.25rem; }
.detail-rating .star { font-size: 1.15rem; color: #ddd; line-height: 1; }
.detail-rating .star.filled { color: #FFB800; }
.detail-rating .star.half { color: #FFB800; }
.detail-rating .rating-number { margin-left: 0.4rem; font-weight: 600; font-size: 0.9rem; color: var(--gray-soft); }
.btn-start {
  display: inline-flex; align-items: center; gap: 0.5rem;
  background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green));
  color: #fff; font-weight: 600; font-size: 0.9rem;
  padding: 0.65rem 1.5rem; border-radius: 50px; border: none;
  transition: transform 0.15s ease, box-shadow 0.15s ease; cursor: pointer;
}
.btn-start:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(14,104,83,0.25); color: #fff; }
.detail-hero-graphic { flex-shrink: 0; }
.detail-hero-right {
  width: 100px; height: 100px; border-radius: 20px;
  display: flex; align-items: center; justify-content: center;
  font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 1.8rem;
  background: <?= $icon_bg ?>; color: <?= $icon_text ?>;
}
.detail-section {
  background: #fff; border: 1px solid var(--line); border-radius: 18px;
  padding: 1.5rem 2rem; margin-bottom: 1.25rem;
}
.detail-section-title {
  font-weight: 700; font-size: 1.1rem; color: var(--charcoal);
  margin-bottom: 0.75rem; padding-bottom: 0.6rem; border-bottom: 1px solid var(--line);
}
.detail-section-text { font-size: 0.92rem; color: var(--gray); line-height: 1.7; }
.detail-summary-list { display: flex; flex-direction: column; gap: 0.45rem; }
.detail-summary-item { display: flex; align-items: flex-start; gap: 0.6rem; font-size: 0.9rem; color: var(--gray); line-height: 1.5; }
.detail-summary-item .check-icon { font-weight: 700; color: var(--deep-green); font-size: 0.95rem; flex-shrink: 0; margin-top: 0.1rem; }
.toc-wrap { padding: 0; }
.toc-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.4rem; }
.toc-list .toc-item {
  display: flex; align-items: center; gap: 0.85rem;
  padding: 0.75rem 1rem; border-radius: 12px;
  background: var(--bg); border: 1px solid var(--line);
  color: var(--charcoal); text-decoration: none;
  transition: border-color 0.15s ease, transform 0.15s ease, box-shadow 0.15s ease;
}
.toc-list .toc-item:hover { border-color: var(--deep-green); transform: translateX(3px); box-shadow: 0 2px 8px rgba(14,104,83,0.08); }
.toc-list .toc-num {
  width: 32px; height: 32px; border-radius: 8px;
  background: var(--deep-green-light); color: var(--deep-green-dark);
  font-weight: 600; font-size: 0.78rem;
  display: flex; align-items: center; justify-content: center; flex-shrink: 0;
}
.toc-list .toc-text { flex: 1; font-size: 0.88rem; font-weight: 500; }
.toc-list .toc-arrow { color: var(--gray-soft); font-size: 1rem; flex-shrink: 0; opacity: 0.5; transition: opacity 0.15s ease, transform 0.15s ease; }
.toc-list .toc-item:hover .toc-arrow { opacity: 1; transform: translateX(3px); color: var(--deep-green); }
.site-footer {
  border-top: 1px solid var(--line); background: #fff;
  padding: 2.5rem 2rem 1.5rem; margin-top: 2rem;
}
.footer-inner { max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: flex-start; gap: 2rem; }
.footer-brand { font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 1.1rem; color: var(--charcoal); display: flex; align-items: center; gap: 0.6rem; }
.footer-brand span { color: var(--orange); }
.footer-tagline { font-size: 0.82rem; color: var(--gray-soft); margin-top: 0.4rem; max-width: 240px; line-height: 1.5; }
.footer-links { display: flex; flex-wrap: wrap; gap: 0.4rem 1.25rem; }
.footer-links a { font-size: 0.85rem; color: var(--gray); transition: color 0.15s ease; }
.footer-links a:hover { color: var(--deep-green); }
.footer-social { display: flex; gap: 0.5rem; }
.footer-social a {
  width: 34px; height: 34px; border-radius: 50%;
  border: 1px solid var(--line); display: flex; align-items: center;
  justify-content: center; color: var(--gray-soft);
  transition: border-color 0.2s, color 0.2s, background 0.2s;
}
.footer-social a:hover { border-color: var(--deep-green); color: var(--deep-green); background: var(--deep-green-light); }
.footer-divider { max-width: 1200px; margin: 1.5rem auto 0; border: none; border-top: 1px solid var(--line); }
.footer-bottom { max-width: 1200px; margin: 0.75rem auto 0; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 0.5rem; font-size: 0.78rem; color: var(--gray-soft); }
.footer-bottom-links { display: flex; gap: 1rem; }
.footer-bottom-links a { color: var(--gray-soft); transition: color 0.15s ease; }
.footer-bottom-links a:hover { color: var(--deep-green); }
@media (max-width: 991.98px) {
  .sidebar { transform: translateX(-100%); box-shadow: 0 0 40px rgba(0,0,0,0.15); }
  .sidebar.show { transform: translateX(0); }
  .main-area { margin-left: 0; }
  .sidebar-toggle { display: inline-flex; align-items: center; }
  .content-wrap { padding: 1.25rem; }
  .top-header { padding: 0.85rem 1.25rem; }
  .profile-chip .name, .profile-chip .role { display: none; }
  .search-box { max-width: none; }
  .detail-hero { padding: 1.5rem; }
  .detail-title { font-size: 1.4rem; }
  .detail-hero-right { width: 70px; height: 70px; font-size: 1.3rem; }
  .detail-section { padding: 1.25rem; }
}
@media (max-width: 575.98px) {
  .detail-hero-inner { flex-direction: column; text-align: center; }
  .detail-meta { justify-content: center; }
  .detail-rating { justify-content: center; }
  .detail-hero-graphic { order: -1; }
  .detail-eyebrow { text-align: center; }
  .detail-title { text-align: center; }
}
</style>
</head>
<body>
<script>if(localStorage.getItem("learnbase_dark_mode")==="true")document.body.classList.add("dark-mode");</script>

<div class="lib-bg-shapes">
  <div class="bg-circle c1"></div>
  <div class="bg-circle c2"></div>
  <div class="bg-dots"></div>
</div>

<aside class="sidebar" id="sidebar">
  <a href="<?= site_url('dashboard') ?>" class="brand-logo">LEARNBASE<span>.</span></a>
  <ul class="side-nav">
    <li class="nav-label">Menu</li>
    <li><a href="<?= site_url('dashboard') ?>" class="side-link"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"></rect><rect x="14" y="3" width="7" height="5"></rect><rect x="14" y="12" width="7" height="9"></rect><rect x="3" y="16" width="7" height="5"></rect></svg>Dashboard</a></li>
    <li><a href="<?= site_url('library') ?>" class="side-link active"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>Library</a></li>
    <li><a href="<?= site_url('courses/my_courses') ?>" class="side-link"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>My Courses</a></li>
    <li><a href="<?= site_url('courses/completed') ?>" class="side-link"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l2.9 6.3 6.9.7-5.2 4.7 1.6 6.8L12 17l-6.2 3.5 1.6-6.8-5.2-4.7 6.9-.7z"></path></svg>Completed Courses</a></li>
  </ul>
  <div class="sidebar-footer">
    <?php if ($membership !== 'premium'): ?>
    <div class="upgrade-card">
      <p>Unlock all 100+ courses with Learnbase Pro.</p>
      <a href="<?= site_url('pricing') ?>" class="btn-upgrade">Upgrade to Pro</a>
    </div>
    <?php else: ?>
    <div class="upgrade-card" style="background:linear-gradient(135deg,var(--deep-green),#12806A);color:#fff;">
      <p style="color:rgba(255,255,255,.9);"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" style="vertical-align:middle;margin-right:4px;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg> Kamu sudah member Premium!</p>
    </div>
    <?php endif; ?>
  </div>
</aside>

<div class="sidebar-backdrop" id="sidebarBackdrop"></div>

<div class="main-area">
  <header class="top-header">
    <button class="sidebar-toggle" id="sidebarToggle" aria-label="Toggle menu">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
    </button>
    <button class="sidebar-toggle-collapse" id="sidebarCollapse" aria-label="Toggle sidebar">
      <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>
    </button>
    <div class="search-box">
      <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
      <input type="text" placeholder="Search courses, mentors, topics...">
    </div>
    <div class="header-right">
      <button class="icon-btn" aria-label="Notifications">
        <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
        <span class="dot-badge"></span>
      </button>
      <div class="profile-wrap">
        <div class="profile-chip" id="profileAvatar">
          <div class="profile-avatar" id="profileAvatarIcon"><?= strtoupper(substr($nama, 0, 1)) ?></div>
          <div>
            <div class="name" id="profileName"><?= $nama ?></div>
            <div class="role"><?= $membership === 'premium' ? 'Premium' : 'Free' ?></div>
          </div>
        </div>
        <div class="profile-dropdown" id="profileDropdown">
          <a href="<?= site_url('profile') ?>" class="profile-dropdown-item">My Profile</a>
          <a href="<?= site_url('settings') ?>" class="profile-dropdown-item">Account Settings</a>
          <div class="profile-dropdown-divider"></div>
          <a href="<?= site_url('library?tab=favorites') ?>" class="profile-dropdown-item">Favorite Modules</a>
          <div class="profile-dropdown-divider"></div>
          <a href="<?= site_url('auth/logout') ?>" class="profile-dropdown-item danger">Logout</a>
        </div>
      </div>
    </div>
  </header>

  <div class="content-wrap">
    <div class="detail-breadcrumb">
      <a href="<?= site_url('library') ?>">Library</a>
      <span class="breadcrumb-sep">›</span>
      <span class="current"><?= $modul['name'] ?></span>
    </div>

    <div class="detail-hero">
      <div class="detail-hero-inner">
        <div class="detail-hero-text">
          <div class="detail-eyebrow">MODUL · BAHASA PEMROGRAMAN</div>
          <h1 class="detail-title"><?= $modul['name'] ?></h1>
          <div class="detail-meta">
            <span class="detail-badge <?= $modul['difficulty'] ?>"><?= ucfirst($modul['difficulty']) ?></span>
            <span class="detail-type-label"><?= $modul['category'] ?></span>
          </div>
          <div class="detail-rating">
            <?php
            $r = $meta['rating'];
            for ($i = 1; $i <= 5; $i++):
              if ($i <= floor($r)): ?><span class="star filled">★</span>
              <?php elseif ($i - $r <= 0.5): ?><span class="star half">★</span>
              <?php else: ?><span class="star">★</span>
              <?php endif;
            endfor; ?>
            <span class="rating-number"><?= $r ?></span>
          </div>
          <a href="<?= site_url('modul/belajar/' . $slug) ?>" class="btn-start">▶ Start Learning</a>
        </div>
        <div class="detail-hero-graphic">
          <div class="detail-hero-right"><?= $meta['icon'] ?></div>
        </div>
      </div>
    </div>

    <div class="detail-body">
      <section class="detail-section">
        <h2 class="detail-section-title"> Description Module</h2>
        <p class="detail-section-text"><?= $meta['desc'] ?></p>
      </section>

      <section class="detail-section">
        <h2 class="detail-section-title"> Module Summary</h2>
        <div class="detail-summary-list">
          <?php foreach ($meta['summary'] as $s): ?>
            <div class="detail-summary-item"><span class="check-icon">✓</span> <?= $s ?></div>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="detail-section">
        <h2 class="detail-section-title"> Materi</h2>
        <div class="toc-wrap">
          <div class="toc-list">
            <?php foreach ($meta['topics'] as $i => $topic):
              $num = str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?>
              <a href="<?= site_url('modul/belajar/' . $slug) ?>" class="toc-item">
                <span class="toc-num"><?= $num ?></span>
                <span class="toc-text"><?= $topic ?></span>
                <span class="toc-arrow">→</span>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    </div>

    <footer class="site-footer">
      <div class="footer-inner">
        <div>
          <a href="#" class="footer-brand">LEARNBASE<span>.</span></a>
          <p class="footer-tagline">Platform belajar coding interaktif dengan 12 modul bahasa pemrograman.</p>
        </div>
        <div class="footer-links">
          <a href="#">About</a>
          <a href="#">Terms</a>
          <a href="#">Privacy</a>
          <a href="#">Contact</a>
          <a href="#">FAQ</a>
        </div>
        <div class="footer-social">
          <a href="#" title="GitHub"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.44 9.82 8.2 11.4.6.11.82-.26.82-.58v-2.17c-3.34.72-4.04-1.61-4.04-1.61-.55-1.39-1.34-1.76-1.34-1.76-1.09-.74.08-.73.08-.73 1.2.08 1.83 1.24 1.83 1.24 1.07 1.84 2.82 1.31 3.5 1 .11-.77.42-1.31.76-1.61-2.66-.3-5.46-1.33-5.46-5.93 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.12-3.17 0 0 1-.32 3.3 1.23.96-.27 1.98-.4 3-.4s2.04.13 3 .4c2.3-1.55 3.3-1.23 3.3-1.23.66 1.65.25 2.87.12 3.17.77.84 1.24 1.91 1.24 3.22 0 4.6-2.8 5.63-5.48 5.92.43.37.82 1.1.82 2.22v3.29c0 .32.22.7.83.58C20.57 21.82 24 17.31 24 12 24 5.37 18.63 0 12 0z"/></svg></a>
          <a href="#" title="Twitter"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M22 5.9c-.7.3-1.5.6-2.4.7.8-.5 1.5-1.3 1.8-2.3-.8.5-1.7.8-2.6 1a4.1 4.1 0 0 0-7 3.7A11.6 11.6 0 0 1 3.4 4.6a4.1 4.1 0 0 0 1.3 5.5c-.7 0-1.3-.2-1.9-.5v.1c0 2 1.4 3.6 3.3 4a4.1 4.1 0 0 1-1.9.1 4.1 4.1 0 0 0 3.8 2.9A8.2 8.2 0 0 1 2 18.4a11.6 11.6 0 0 0 6.3 1.9c7.5 0 11.7-6.3 11.7-11.7v-.5c.8-.6 1.5-1.3 2-2.2z"/></svg></a>
          <a href="#" title="YouTube"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.5 12 3.5 12 3.5s-7.5 0-9.4.6a3 3 0 0 0-2.1 2.1C0 8.1 0 12 0 12s0 3.9.5 5.8a3 3 0 0 0 2.1 2.1c1.9.6 9.4.6 9.4.6s7.5 0 9.4-.6a3 3 0 0 0 2.1-2.1C24 15.9 24 12 24 12s0-3.9-.5-5.8zM9.5 15.5V8.5l6.3 3.5-6.3 3.5z"/></svg></a>
          <a href="#" title="Discord"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M20.3 4.5A18 18 0 0 0 14.7 3c-.2.4-.5.9-.6 1.3a16.1 16.1 0 0 0-4.2 0A12 12 0 0 0 9.3 3a17.9 17.9 0 0 0-5.6 1.5C1.2 8.8.5 13 0 17.2a18.2 18.2 0 0 0 5.5 2.8c.4-.6.8-1.2 1.1-1.8a11.8 11.8 0 0 1-1.8-.8l.4-.3a13 13 0 0 0 10.8 0s.3.2.4.3c-.6.3-1.2.6-1.8.9.3.6.7 1.2 1.1 1.8a18 18 0 0 0 5.5-2.8c.6-4.4-1-8.6-4.2-12.7zM8.1 14.5c-1 0-1.8-1-1.8-2.1s.8-2.2 1.8-2.2 1.8 1 1.8 2.2-.8 2.1-1.8 2.1zm6.8 0c-1 0-1.8-1-1.8-2.1s.8-2.2 1.8-2.2 1.8 1 1.8 2.2-.8 2.1-1.8 2.1z"/></svg></a>
        </div>
      </div>
      <hr class="footer-divider">
      <div class="footer-bottom">
        <span>&copy; 2026 LEARNBASE. All rights reserved.</span>
        <div class="footer-bottom-links">
          <a href="#">Cookie Policy</a>
          <a href="#">Accessibility</a>
        </div>
      </div>
    </footer>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
<script>
(function() {
  const sidebar = document.getElementById('sidebar');
  const toggle = document.getElementById('sidebarToggle');
  const backdrop = document.getElementById('sidebarBackdrop');

  function closeSidebar() { sidebar.classList.remove('show'); backdrop.classList.remove('show'); }

  if (toggle) toggle.addEventListener('click', function() { sidebar.classList.toggle('show'); backdrop.classList.toggle('show'); });
  if (backdrop) backdrop.addEventListener('click', closeSidebar);

  const collapseBtn = document.getElementById('sidebarCollapse');
  const savedState = localStorage.getItem('learnbase_sidebar_collapsed');
  if (savedState === 'true') document.body.classList.add('sidebar-collapsed');
  if (collapseBtn) collapseBtn.addEventListener('click', function() {
    document.body.classList.toggle('sidebar-collapsed');
    localStorage.setItem('learnbase_sidebar_collapsed', document.body.classList.contains('sidebar-collapsed'));
  });

  const avatar = document.getElementById('profileAvatar');
  const dropdown = document.getElementById('profileDropdown');
  if (avatar) {
    avatar.addEventListener('click', function(e) { e.stopPropagation(); dropdown.classList.toggle('open'); });
    document.addEventListener('click', function() { dropdown.classList.remove('open'); });
    if (dropdown) dropdown.addEventListener('click', function(e) { e.stopPropagation(); });
  }
})();
</script>
</body>
</html>
