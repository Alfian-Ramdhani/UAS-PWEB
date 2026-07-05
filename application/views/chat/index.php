<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Live Chat Mentor — LEARNBASE.</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
:root { --deep-green: #0E6853; --deep-green-dark: #0a4f3f; --deep-green-light: #E7F2EF; --orange: #FF5B35; --orange-light: #FFEFEA; --charcoal: #1A1A1A; --gray: #666; --gray-soft: #8A8A8A; --bg: #F7F9F8; --line: #EAEDEC; --sidebar-w: 264px; --card-bg: #fff; --msg-sent: #E7F2EF; --msg-recv: #fff; }
body.dark-mode { --deep-green: #1ABC9C; --deep-green-dark: #16A085; --deep-green-light: #1A3E3A; --orange: #FF7F50; --orange-light: #3E2A20; --charcoal: #E8E8E8; --gray: #B0B0B0; --gray-soft: #888; --bg: #0F171E; --line: #1F2A33; --card-bg: #1A2530; --msg-sent: #1A3E3A; --msg-recv: #0F171E; }
body.dark-mode .sidebar, body.dark-mode .top-header, body.dark-mode .chat-layout { background: var(--card-bg); }
body.dark-mode .sidebar, body.dark-mode .top-header, body.dark-mode .chat-layout { border-color: var(--line); }
* { box-sizing: border-box; }
body { font-family: 'Inter', sans-serif; background: var(--bg); color: var(--charcoal); margin: 0; padding: 0; display: flex; height: 100vh; overflow: hidden; }
h1,h2,h3,h4,h5,h6,.brand-logo { font-family: 'Poppins', sans-serif; }
a { text-decoration: none; }

.sidebar { position: fixed; top: 0; left: 0; bottom: 0; width: var(--sidebar-w); background: var(--card-bg); border-right: 1px solid var(--line); padding: 1.75rem 1.25rem; display: flex; flex-direction: column; z-index: 1050; transition: transform .25s ease; }
.sidebar .brand-logo { font-weight: 800; font-size: 1.35rem; color: var(--charcoal); letter-spacing: -0.5px; padding: 0 0.5rem; margin-bottom: 2.25rem; display: inline-block; }
.sidebar .brand-logo span { color: var(--orange); }
.side-nav { list-style: none; padding: 0; margin: 0; flex: 1; }
.side-nav .nav-label { font-size: 0.72rem; font-weight: 600; letter-spacing: 0.08em; text-transform: uppercase; color: var(--gray-soft); padding: 0 0.75rem; margin: 0.25rem 0 0.75rem; }
.side-nav li { margin-bottom: 0.3rem; }
.side-link { display: flex; align-items: center; gap: 0.75rem; padding: 0.7rem 0.9rem; border-radius: 12px; color: var(--gray); font-weight: 500; font-size: 0.95rem; transition: background-color .15s, color .15s; }
.side-link:hover { background-color: var(--deep-green-light); color: var(--deep-green-dark); }
.side-link.active { background: linear-gradient(135deg, var(--orange), var(--deep-green) 65%, var(--deep-green)); color: #fff; box-shadow: 0 10px 22px rgba(14,104,83,0.25); }
.sidebar-footer { border-top: 1px solid var(--line); padding-top: 1rem; margin-top: 1rem; }
.sidebar-backdrop { z-index: 1040; position: fixed; display: none; inset: 0; background: rgba(0,0,0,0.35); }
.sidebar-backdrop.show { display: block; }

.main-area { margin-left: var(--sidebar-w); flex: 1; display: flex; flex-direction: column; min-width: 0; }

.top-header { background: var(--card-bg); border-bottom: 1px solid var(--line); padding: 1rem 2rem; display: flex; align-items: center; gap: 1.25rem; flex-shrink: 0; }
.sidebar-toggle { display: none; background: none; border: none; padding: .4rem; color: var(--charcoal); cursor: pointer; }
.header-right { margin-left: auto; display: flex; align-items: center; gap: 1rem; }
.profile-avatar { width: 42px; height: 42px; border-radius: 50%; background: linear-gradient(135deg, var(--orange), var(--deep-green)); display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: .95rem; }
@media (max-width: 991.98px) { .sidebar { transform: translateX(-100%); } .sidebar.show { transform: translateX(0); } .main-area { margin-left: 0; } .sidebar-toggle { display: inline-flex; align-items: center; } }

.chat-layout { display: flex; flex: 1; overflow: hidden; }
.mentor-list { width: 280px; border-right: 1px solid var(--line); background: var(--card-bg); display: flex; flex-direction: column; overflow-y: auto; flex-shrink: 0; }
.mentor-item { display: flex; align-items: center; gap: 0.7rem; padding: 0.9rem 1rem; border-bottom: 1px solid var(--bg); cursor: pointer; transition: background .1s; }
.mentor-item:hover { background: var(--deep-green-light); }
.mentor-item.active { background: var(--deep-green-light); border-left: 3px solid var(--deep-green); }
.mentor-avatar { width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, var(--orange), var(--deep-green)); display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: .85rem; flex-shrink: 0; }
.mentor-info { flex: 1; min-width: 0; }
.mentor-name { font-weight: 600; font-size: .85rem; }

.chat-area { flex: 1; display: flex; flex-direction: column; background: var(--bg); }
.chat-header { padding: .9rem 1.25rem; border-bottom: 1px solid var(--line); background: var(--card-bg); display: none; align-items: center; gap: .75rem; flex-shrink: 0; }
.chat-header .name { font-weight: 700; font-size: .95rem; }
.chat-messages { flex: 1; overflow-y: auto; padding: 1rem 1.25rem; display: none; flex-direction: column; gap: .5rem; }
.msg-row { display: flex; margin-bottom: .25rem; }
.msg-row.sent { justify-content: flex-end; }
.msg-row.received { justify-content: flex-start; }
.msg-bubble { max-width: 70%; padding: .6rem 1rem; border-radius: 16px; font-size: .88rem; line-height: 1.5; word-wrap: break-word; }
.msg-row.sent .msg-bubble { background: var(--msg-sent); border-bottom-right-radius: 4px; }
.msg-row.received .msg-bubble { background: var(--msg-recv); border: 1px solid var(--line); border-bottom-left-radius: 4px; }
.msg-time { font-size: .62rem; color: var(--gray-soft); margin-top: .2rem; }
.msg-time .msg-delete { color: #D9534F; margin-left: .5rem; cursor: pointer; opacity: 0; transition: opacity .15s; }
.msg-row:hover .msg-time .msg-delete { opacity: 1; }
.msg-role { font-size: .62rem; font-weight: 600; color: var(--deep-green); margin-bottom: .15rem; }
.chat-input-area { padding: .85rem 1.25rem; border-top: 1px solid var(--line); background: var(--card-bg); display: flex; gap: .5rem; flex-shrink: 0; }
.chat-input-area input { flex: 1; padding: .65rem 1rem; border: 2px solid var(--line); border-radius: 12px; font-size: .88rem; background: var(--bg); color: var(--charcoal); outline: none; }
.chat-input-area input:focus { border-color: var(--deep-green); }
.chat-input-area button { padding: .65rem 1.25rem; border-radius: 12px; border: none; background: linear-gradient(135deg, var(--orange), var(--deep-green)); color: #fff; font-weight: 600; font-size: .85rem; cursor: pointer; }
.empty-chat { flex: 1; display: flex; align-items: center; justify-content: center; color: var(--gray-soft); text-align: center; padding: 2rem; }
.empty-chat .big { font-size: 3rem; margin-bottom: .5rem; }
</style>
</head>
<body>
<script>if(localStorage.getItem("learnbase_dark_mode")==="true")document.body.classList.add("dark-mode");</script>

<div class="sidebar-backdrop" id="sidebarBackdrop"></div>

<aside class="sidebar" id="sidebar">
  <a href="#" class="brand-logo">LEARNBASE<span>.</span></a>
  <ul class="side-nav">
    <li class="nav-label">Menu</li>
    <li><a href="<?= site_url('dashboard') ?>" class="side-link"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9"></rect><rect x="14" y="3" width="7" height="5"></rect><rect x="14" y="12" width="7" height="9"></rect><rect x="3" y="16" width="7" height="5"></rect></svg> Dashboard</a></li>
    <li><a href="<?= site_url('library') ?>" class="side-link"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> Library</a></li>
    <li><a href="<?= site_url('courses/my_courses') ?>" class="side-link"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg> My Courses</a></li>
    <li><a href="<?= site_url('courses/completed') ?>" class="side-link"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l2.9 6.3 6.9.7-5.2 4.7 1.6 6.8L12 17l-6.2 3.5 1.6-6.8-5.2-4.7 6.9-.7z"></path></svg> Completed Courses</a></li>
    <li><a href="<?= site_url('chat') ?>" class="side-link active"><svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> Live Chat Mentor</a></li>
  </ul>
  <div class="sidebar-footer">
    <a href="<?= site_url('auth/logout') ?>" class="side-link" style="color:var(--charcoal);">
      <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
      Keluar
    </a>
  </div>
</aside>

<div class="main-area">
  <header class="top-header">
    <button class="sidebar-toggle" id="sidebarToggle"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></button>
    <div style="font-weight:700;font-size:1.1rem;">Live Chat Mentor</div>
    <div class="header-right"><div class="profile-avatar"><?= strtoupper(substr($nama, 0, 1)) ?></div></div>
  </header>

  <div class="chat-layout">
    <!-- LEFT: Mentor List (rendered by PHP, same reliable approach as mentor chat) -->
    <div class="mentor-list" id="mentorList">
      <div style="padding:.85rem 1rem;font-weight:600;font-size:.85rem;border-bottom:1px solid var(--line);">Mentor Tersedia</div>
      <?php
      // Get all mentors
      $mentors = $this->db->where('role', 'instructor')->get('auth')->result_array();
      $user_id = $this->session->userdata('user_id');
      ?>
      <?php foreach ($mentors as $mt): ?>
      <?php
        // Get last message & unread count
        $last_msg = $this->db->query("SELECT message, created_at FROM chat_messages WHERE (sender_id = $user_id AND receiver_id = $mt[id] AND deleted_by_sender = 0) OR (sender_id = $mt[id] AND receiver_id = $user_id AND deleted_by_receiver = 0) ORDER BY created_at DESC LIMIT 1")->row_array();
        $unread = $this->db->where('sender_id', $mt['id'])->where('receiver_id', $user_id)->where('is_read', 0)->count_all_results('chat_messages');
      ?>
      <div class="mentor-item" onclick="selectMentor(<?= $mt['id'] ?>)" data-id="<?= $mt['id'] ?>">
        <div class="mentor-avatar"><?= strtoupper(substr($mt['nama'], 0, 1)) ?></div>
        <div class="mentor-info">
          <div class="mentor-name"><?= $mt['nama'] ?></div>
          <div style="font-size:.75rem;color:var(--gray-soft);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?= $last_msg ? substr($last_msg['message'], 0, 35) . (strlen($last_msg['message']) > 35 ? '...' : '') : 'Klik untuk chat' ?></div>
        </div>
        <?php if ($unread > 0): ?>
        <div style="background:var(--orange);color:#fff;border-radius:50px;padding:.1rem .5rem;font-size:.65rem;font-weight:700;white-space:nowrap;"><?= $unread ?></div>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- RIGHT: Chat Area -->
    <div class="chat-area" id="chatArea">
      <div class="chat-header" id="chatHeader" style="display:none;">
        <div class="mentor-avatar" style="width:36px;height:36px;font-size:.8rem;" id="chatAvatar"></div>
        <div><div class="name" id="chatName"></div></div>
      </div>
      <div id="emptyChat" style="flex:1;display:flex;align-items:center;justify-content:center;color:var(--gray-soft);text-align:center;padding:2rem;">
        <div><svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color:var(--gray-soft);margin-bottom:.5rem;"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg><p>Pilih mentor untuk memulai chat</p></div>
      </div>
      <div class="chat-messages" id="chatMessages" style="display:none;"></div>
      <div class="chat-input-area">
        <input type="text" id="msgInput" placeholder="Pilih mentor dulu..." autocomplete="off">
        <button id="sendBtn">Kirim</button>
      </div>
    </div>
  </div>
</div>

<script>
let SELECTED_ID = null;
let pollTimer = null;

function selectMentor(id) {
  SELECTED_ID = id;
  document.getElementById('msgInput').placeholder = 'Ketik pesan...';
  document.getElementById('msgInput').disabled = false;
  document.getElementById('chatHeader').style.display = 'flex';
  document.getElementById('emptyChat').style.display = 'none';
  document.getElementById('chatMessages').style.display = 'flex';

  document.querySelectorAll('.mentor-item').forEach(el => el.classList.remove('active'));
  document.querySelector('.mentor-item[data-id="' + id + '"]')?.classList.add('active');

  loadMessages();
  if (pollTimer) clearInterval(pollTimer);
  pollTimer = setInterval(loadMessages, 3000);
}

function loadMessages() {
  if (!SELECTED_ID) return;
  fetch('<?= site_url('chat/api/messages/') ?>' + SELECTED_ID)
    .then(r => r.json())
    .then(data => {
      if (data.error) { console.error(data.error); return; }
      document.getElementById('chatAvatar').textContent = data.mentor.nama.charAt(0).toUpperCase();
      document.getElementById('chatName').textContent = data.mentor.nama;
      const container = document.getElementById('chatMessages');
      container.innerHTML = '';
      data.messages.forEach(msg => {
        const isUser = msg.sender_role === 'user';
        const row = document.createElement('div');
        row.className = 'msg-row ' + (isUser ? 'sent' : 'received');
        let deleteBtn = isUser ? '<span class="msg-delete" onclick="deleteMsg(' + msg.id + ')">✕</span>' : '';
        row.innerHTML = '<div class="msg-bubble">' + (isUser ? '' : '<div class="msg-role">' + data.mentor.nama + '</div>') + msg.message + '<div class="msg-time">' + new Date(msg.created_at).toLocaleTimeString('id-ID',{hour:'2-digit',minute:'2-digit'}) + deleteBtn + '</div></div>';
        container.appendChild(row);
      });
      container.scrollTop = container.scrollHeight;
    })
    .catch(e => console.error('Load error:', e));
}

function sendMessage() {
  if (!SELECTED_ID) { alert('Pilih mentor dulu!'); return; }
  const msg = document.getElementById('msgInput').value.trim();
  if (!msg) return;
  const formData = new FormData();
  formData.append('receiver_id', SELECTED_ID);
  formData.append('message', msg);
  fetch('<?= site_url('chat/api/send') ?>', { method: 'POST', body: formData })
    .then(r => r.json())
    .then(data => {
      if (data.success) {
        document.getElementById('msgInput').value = '';
        loadMessages();
      } else {
        alert('Gagal: ' + (data.error || 'unknown'));
      }
    })
    .catch(e => { console.error('Send error:', e); alert('Gagal kirim'); });
}

document.getElementById('sendBtn').addEventListener('click', sendMessage);
document.getElementById('msgInput').addEventListener('keydown', function(e) { if (e.key === 'Enter') sendMessage(); });

// Sidebar toggle
document.getElementById('sidebarToggle').addEventListener('click', function() {
  document.getElementById('sidebar').classList.toggle('show');
  document.getElementById('sidebarBackdrop').classList.toggle('show');
});
document.getElementById('sidebarBackdrop').addEventListener('click', function() {
  document.getElementById('sidebar').classList.remove('show');
  document.getElementById('sidebarBackdrop').classList.remove('show');
});
</script>
</body>
</html>
