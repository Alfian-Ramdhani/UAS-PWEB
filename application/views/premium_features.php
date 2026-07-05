<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Premium floating action button & panel
 * Displays Chatbot + Live Mentor options for premium members.
 * Include this on any member page: $this->load->view('premium_features');
 */
$is_premium = ($this->session->userdata('membership') === 'premium');
if (!$is_premium) return;
?>
<!-- ===== FLOATING ACTION BUTTON - PREMIUM ===== -->
<style>
  .premium-fab-wrap {
    position: fixed;
    bottom: 24px;
    right: 24px;
    z-index: 9999;
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 12px;
  }

  .premium-fab-btn {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--orange), var(--deep-green) 60%, var(--deep-green));
    color: #fff;
    border: none;
    box-shadow: 0 8px 24px rgba(14,104,83,0.35);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    position: relative;
    z-index: 10000;
  }
  .premium-fab-btn:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 12px 32px rgba(14,104,83,0.45);
  }

  .premium-panel {
    position: fixed;
    bottom: 96px;
    right: 24px;
    z-index: 9998;
    background: #fff;
    border: 1px solid var(--line);
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    padding: 1.5rem;
    width: 340px;
    max-width: calc(100vw - 48px);
    display: none;
    animation: panelUp 0.25s ease;
  }
  .premium-panel.open { display: block; }

  @keyframes panelUp {
    from { opacity: 0; transform: translateY(12px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .premium-panel-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 1rem;
    color: var(--charcoal);
    margin-bottom: 0.25rem;
  }
  .premium-panel-sub {
    font-size: 0.82rem;
    color: var(--gray-soft);
    margin-bottom: 1.25rem;
  }

  .premium-option {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    border-radius: 14px;
    border: 1px solid var(--line);
    margin-bottom: 0.75rem;
    cursor: pointer;
    transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.15s ease;
    background: var(--bg);
  }
  .premium-option:hover {
    border-color: var(--deep-green);
    box-shadow: 0 4px 16px rgba(14,104,83,0.1);
    transform: translateX(3px);
  }
  .premium-option-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    flex-shrink: 0;
  }
  .premium-option-icon.green { background: var(--deep-green-light); }
  .premium-option-icon.orange { background: var(--orange-light); }
  .premium-option-text { flex: 1; }
  .premium-option-title { font-weight: 600; font-size: 0.9rem; color: var(--charcoal); }
  .premium-option-desc { font-size: 0.78rem; color: var(--gray-soft); margin-top: 2px; }
  .premium-option-arrow { color: var(--gray-soft); font-size: 1.1rem; }

  /* Chatbot panel overlay */
  .premium-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.4);
    z-index: 9997;
    display: none;
    animation: fadeIn 0.2s ease;
  }
  .premium-overlay.open { display: block; }
  @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

  /* Chatbot / Live chat modals */
  .premium-modal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 10001;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.2);
    padding: 1.5rem;
    width: 420px;
    max-width: calc(100vw - 32px);
    max-height: 80vh;
    display: none;
    animation: panelUp 0.25s ease;
    overflow-y: auto;
  }
  .premium-modal.open { display: block; }
  .premium-modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid var(--line);
  }
  .premium-modal-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 1.05rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }
  .premium-modal-close {
    width: 32px; height: 32px;
    border-radius: 50%;
    border: none;
    background: var(--bg);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 1rem;
    color: var(--gray);
    transition: background 0.15s;
  }
  .premium-modal-close:hover { background: var(--orange-light); color: var(--orange); }

  /* Chat messages */
  .chat-msg {
    display: flex;
    gap: 0.6rem;
    margin-bottom: 1rem;
  }
  .chat-msg.bot { align-items: flex-start; }
  .chat-msg.user { flex-direction: row-reverse; }
  .chat-bubble {
    max-width: 80%;
    padding: 0.65rem 0.9rem;
    border-radius: 14px;
    font-size: 0.85rem;
    line-height: 1.5;
  }
  .chat-msg.bot .chat-bubble {
    background: var(--bg);
    color: var(--charcoal);
    border-bottom-left-radius: 4px;
  }
  .chat-msg.user .chat-bubble {
    background: var(--deep-green);
    color: #fff;
    border-bottom-right-radius: 4px;
  }
  .chat-input-area {
    display: flex;
    gap: 0.5rem;
    margin-top: 1rem;
    padding-top: 0.75rem;
    border-top: 1px solid var(--line);
  }
  .chat-input {
    flex: 1;
    border: 2px solid var(--line);
    border-radius: 12px;
    padding: 0.6rem 0.8rem;
    font-family: 'Inter', sans-serif;
    font-size: 0.85rem;
    outline: none;
    transition: border-color 0.2s;
  }
  .chat-input:focus { border-color: var(--deep-green); }
  .chat-send {
    width: 40px; height: 40px;
    border-radius: 50%;
    border: none;
    background: var(--deep-green);
    color: #fff;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.15s, transform 0.15s;
  }
  .chat-send:hover { background: var(--deep-green-dark); transform: scale(1.05); }

  .premium-badge-premium {
    display: inline-block;
    background: linear-gradient(135deg, var(--orange), #FF8A5C);
    color: #fff;
    font-size: 0.65rem;
    font-weight: 700;
    padding: 0.2rem 0.6rem;
    border-radius: 50px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-left: 0.4rem;
  }

  @media (max-width: 575.98px) {
    .premium-panel { right: 12px; bottom: 84px; width: calc(100vw - 24px); }
    .premium-fab-wrap { right: 12px; bottom: 16px; }
    .premium-modal { width: calc(100vw - 24px); }
  }
</style>

<div class="premium-fab-wrap" id="premiumFabWrap">
  <div class="premium-panel" id="premiumPanel">
    <div class="premium-panel-title"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;margin-right:6px;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg> Fitur Premium</div>
    <div class="premium-panel-sub">Nikmati fitur eksklusif untuk member Pro.</div>

    <div class="premium-option" id="openChatbot">
      <div class="premium-option-icon green"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></div>
      <div class="premium-option-text">
        <div class="premium-option-title">Chatbot AI</div>
        <div class="premium-option-desc">Tanya jawab coding dengan AI asisten</div>
      </div>
      <span class="premium-option-arrow">→</span>
    </div>

  </div>

  <button class="premium-fab-btn" id="premiumFabBtn" title="Fitur Premium"><svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></button>
</div>

<div class="premium-overlay" id="premiumOverlay"></div>

<!-- CHATBOT MODAL -->
<div class="premium-modal" id="chatbotModal">
  <div class="premium-modal-header">
    <div class="premium-modal-title"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;margin-right:6px;"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> Chatbot AI</div>
    <button class="premium-modal-close modal-close-btn">&times;</button>
  </div>
  <div id="chatbotMessages" style="max-height:320px;overflow-y:auto;margin-bottom:0.5rem;">
    <div class="chat-msg bot">
      <div class="chat-bubble">Halo! Aku asisten AI Learnbase. Tanya apa pun tentang coding, konsep pemrograman, atau bantuan teknis lainnya!</div>
    </div>
  </div>
  <div class="chat-input-area">
    <input class="chat-input" id="chatbotInput" placeholder="Ketik pesan..." autocomplete="off">
    <button class="chat-send" id="chatbotSend">➤</button>
  </div>
</div>

<script>
(function() {
  const fabWrap = document.getElementById('premiumFabWrap');
  if (!fabWrap) return;

  const fabBtn = document.getElementById('premiumFabBtn');
  const panel = document.getElementById('premiumPanel');
  const overlay = document.getElementById('premiumOverlay');
  const chatbotModal = document.getElementById('chatbotModal');
  const chatbotInput = document.getElementById('chatbotInput');
  const chatbotSend = document.getElementById('chatbotSend');
  const chatbotMessages = document.getElementById('chatbotMessages');

  // Toggle panel
  fabBtn.addEventListener('click', function(e) {
    e.stopPropagation();
    const isOpen = panel.classList.toggle('open');
    overlay.classList.toggle('open', isOpen);
    fabBtn.innerHTML = isOpen ? '✕' : '<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>';
  });

  overlay.addEventListener('click', function() {
    panel.classList.remove('open');
    overlay.classList.remove('open');
    chatbotModal.classList.remove('open');
    fabBtn.innerHTML = '<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>';
  });

  // Open chatbot
  document.getElementById('openChatbot').addEventListener('click', function() {
    panel.classList.remove('open');
    chatbotModal.classList.add('open');
    overlay.classList.add('open');
    chatbotInput.focus();
  });

  // Close modals
  document.querySelectorAll('.modal-close-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      chatbotModal.classList.remove('open');
      overlay.classList.remove('open');
      fabBtn.innerHTML = '<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>';
    });
  });

  // === Chatbot AI dengan Grok (primary) + Gemini (backup) ===
  function addBotMessage(text) {
    const div = document.createElement('div');
    div.className = 'chat-msg bot';
    div.innerHTML = '<div class="chat-bubble">' + text.replace(/\n/g, '<br>') + '</div>';
    chatbotMessages.appendChild(div);
    chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
  }

  function addUserMessage(text) {
    const div = document.createElement('div');
    div.className = 'chat-msg user';
    div.innerHTML = '<div class="chat-bubble">' + text + '</div>';
    chatbotMessages.appendChild(div);
    chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
  }

  function addTypingIndicator() {
    const div = document.createElement('div');
    div.className = 'chat-msg bot';
    div.id = 'typingIndicator';
    div.innerHTML = '<div class="chat-bubble"><span style="opacity:0.6;">Mengetik...</span></div>';
    chatbotMessages.appendChild(div);
    chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
  }

  function removeTypingIndicator() {
    const el = document.getElementById('typingIndicator');
    if (el) el.remove();
  }

  function handleChat() {
    const msg = chatbotInput.value.trim();
    if (!msg) return;
    addUserMessage(msg);
    chatbotInput.value = '';
    chatbotInput.disabled = true;
    chatbotSend.disabled = true;
    addTypingIndicator();

    fetch('<?= site_url('chatbot/ask') ?>', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ message: msg })
    })
    .then(function(r) { return r.json(); })
    .then(function(data) {
      removeTypingIndicator();
      if (data.reply) {
        addBotMessage(data.reply);
      } else if (data.error) {
        addBotMessage('Terjadi kesalahan: ' + data.error);
      }
    })
    .catch(function(err) {
      removeTypingIndicator();
      addBotMessage('Maaf, terjadi gangguan jaringan. Silakan coba lagi.');
    })
    .finally(function() {
      chatbotInput.disabled = false;
      chatbotSend.disabled = false;
      chatbotInput.focus();
    });
  }

  if (chatbotSend) {
    chatbotSend.addEventListener('click', handleChat);
  }
  if (chatbotInput) {
    chatbotInput.addEventListener('keydown', function(e) {
      if (e.key === 'Enter') handleChat();
    });
  }
})();
</script>
