<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembayaran — LEARNBASE.</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --deep-green: #0E6853; --deep-green-dark: #0a4f3f; --deep-green-light: #E7F2EF;
      --orange: #FF5B35; --orange-light: #FFEFEA; --charcoal: #1A1A1A;
      --gray: #666; --gray-soft: #8A8A8A; --bg: #F7F9F8; --line: #EAEDEC;
    }
    body.dark-mode {
      --deep-green: #1ABC9C; --deep-green-dark: #16A085; --deep-green-light: #1A3E3A;
      --orange: #FF7F50; --orange-light: #3E2A20; --charcoal: #E8E8E8;
      --gray: #B0B0B0; --gray-soft: #888; --bg: #0F171E; --line: #1F2A33;
    }
    * { box-sizing: border-box; }
    body {
      font-family: 'Inter', sans-serif; color: var(--charcoal); background: var(--bg);
      min-height: 100vh; display: flex; flex-direction: column; align-items: center;
      justify-content: center; padding: 2rem 1rem;
    }
    h1,h2,h3,h4,h5,h6,.brand-logo { font-family: 'Poppins', sans-serif; }

    .pay-container { max-width: 520px; width: 100%; }

    .pay-header { text-align: center; margin-bottom: 2rem; }
    .pay-header .brand-logo { font-weight: 800; font-size: 1.4rem; color: var(--charcoal); }
    .pay-header .brand-logo span { color: var(--orange); }

    .pay-card {
      background: #fff; border: 1px solid var(--line); border-radius: 24px;
      padding: 2.5rem 2rem; box-shadow: 0 8px 32px rgba(0,0,0,.06);
    }

    .pay-plan-badge {
      display: inline-block; background: var(--deep-green); color: #fff;
      font-size: .75rem; font-weight: 700; padding: .3rem 1rem; border-radius: 50px;
      text-transform: uppercase; letter-spacing: .5px; margin-bottom: 1rem;
    }

    .pay-title { font-weight: 700; font-size: 1.3rem; color: var(--charcoal); margin-bottom: .25rem; }
    .pay-price { font-weight: 800; font-size: 2.2rem; color: var(--deep-green); margin-bottom: .25rem; }
    .pay-price span { font-size: .9rem; font-weight: 500; color: var(--gray); }
    .pay-desc { font-size: .85rem; color: var(--gray-soft); margin-bottom: 1.5rem; }

    .pay-features { list-style: none; padding: 0; margin: 0 0 1.8rem; }
    .pay-features li {
      padding: .5rem 0; font-size: .88rem; color: var(--charcoal);
      display: flex; align-items: center; gap: .6rem;
      border-bottom: 1px solid var(--bg);
    }
    .pay-features li:last-child { border-bottom: none; }
    .pay-features li .check { color: var(--deep-green); font-weight: 700; }

    .pay-divider { height: 1px; background: var(--line); margin: 1.5rem 0; }

    .pay-section-title {
      font-weight: 600; font-size: .9rem; color: var(--charcoal); margin-bottom: 1rem;
    }

    .payment-methods { display: flex; flex-direction: column; gap: .75rem; margin-bottom: 1.5rem; }

    .payment-method {
      display: flex; align-items: center; gap: .75rem;
      padding: .9rem 1rem; border: 2px solid var(--line); border-radius: 14px;
      cursor: pointer; transition: border-color .2s, background .2s;
      position: relative;
    }
    .payment-method:hover { border-color: var(--deep-green); background: var(--deep-green-light); }
    .payment-method input[type="radio"] { display: none; }
    .payment-method.selected { border-color: var(--deep-green); background: var(--deep-green-light); }
    .payment-method .radio-dot {
      width: 20px; height: 20px; min-width: 20px; border-radius: 50%;
      border: 2px solid var(--line); display: flex; align-items: center; justify-content: center;
      transition: border-color .2s;
    }
    .payment-method.selected .radio-dot { border-color: var(--deep-green); }
    .payment-method.selected .radio-dot::after {
      content: ''; width: 10px; height: 10px; border-radius: 50%; background: var(--deep-green);
    }
    .payment-method .pm-icon { font-size: 1.5rem; }
    .payment-method .pm-info { flex: 1; }
    .payment-method .pm-name { font-weight: 600; font-size: .88rem; color: var(--charcoal); }
    .payment-method .pm-desc { font-size: .75rem; color: var(--gray-soft); }

    .btn-pay {
      width: 100%; background: linear-gradient(135deg, var(--orange), var(--deep-green) 60%, var(--deep-green));
      color: #fff; font-weight: 600; font-size: 1rem;
      padding: .85rem 1.5rem; border-radius: 50px; border: none;
      display: flex; align-items: center; justify-content: center; gap: .5rem;
      transition: transform .2s; cursor: pointer;
    }
    .btn-pay:hover { transform: translateY(-2px); color: #fff; }

    .pay-back {
      display: block; text-align: center; margin-top: 1.2rem;
      font-size: .85rem; font-weight: 500; color: var(--gray-soft); text-decoration: none;
    }
    .pay-back:hover { color: var(--deep-green); }

    /* Success Modal */
    .pay-modal-overlay {
      position: fixed; inset: 0; z-index: 500; background: rgba(10,10,10,.72);
      display: none; align-items: center; justify-content: center; padding: 20px;
      animation: fadeIn .2s ease;
    }
    .pay-modal-overlay.show { display: flex; }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    .pay-modal {
      background: #fff; border-radius: 20px; padding: 2.5rem 2rem; max-width: 400px;
      width: 100%; text-align: center; box-shadow: 0 20px 60px rgba(0,0,0,.3);
      animation: slideUp .3s ease;
    }
    @keyframes slideUp { from { transform: translateY(30px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
    .pay-modal .modal-icon { font-size: 3rem; margin-bottom: 1rem; }
    .pay-modal h3 { font-weight: 700; font-size: 1.2rem; color: var(--charcoal); margin-bottom: .5rem; }
    .pay-modal p { font-size: .88rem; color: var(--gray); margin-bottom: 1.5rem; line-height: 1.6; }
    .pay-modal .btn-modal {
      display: inline-block; background: var(--deep-green); color: #fff;
      font-weight: 600; padding: .7rem 2rem; border-radius: 50px; border: none;
      text-decoration: none; transition: transform .2s;
    }
    .pay-modal .btn-modal:hover { transform: translateY(-2px); color: #fff; }
    .pay-modal .btn-modal.retry { background: var(--orange); }

    @media (max-width: 575.98px) {
      .pay-card { padding: 1.8rem 1.5rem; }
    }
  </style>
</head>
<body>
  <script>if(localStorage.getItem("learnbase_dark_mode")==="true")document.body.classList.add("dark-mode");</script>

  <div class="pay-container">
    <div class="pay-header">
      <a href="<?= site_url('dashboard') ?>" class="brand-logo">LEARNBASE<span>.</span></a>
    </div>

    <?php if ($this->session->flashdata('pay_error')): ?>
    <div style="background:var(--orange-light);color:var(--orange);padding:.8rem 1rem;border-radius:12px;margin-bottom:1rem;font-size:.88rem;font-weight:500;text-align:center;">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;margin-right:4px;"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg> <?= $this->session->flashdata('pay_error') ?>
    </div>
    <?php endif; ?>

    <div class="pay-card">
      <div class="pay-plan-badge"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" style="vertical-align:middle;margin-right:4px;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg> Premium</div>
      <div class="pay-title">Langganan Pro</div>
      <div class="pay-price">Rp149.000 <span>/bulan</span></div>
      <p class="pay-desc">Akses penuh ke semua fitur premium LearnBase.</p>

      <ul class="pay-features">
        <li><span class="check">✓</span> Semua fitur Free</li>
        <li><span class="check">✓</span> Live chat mentor</li>
        <li><span class="check">✓</span> Video pembelajaran terkait modul</li>
        <li><span class="check">✓</span> Chatbot / AI assistant</li>
        <li><span class="check">✓</span> Sertifikat premium</li>
      </ul>

      <div class="pay-divider"></div>

      <form id="payForm" method="post" action="<?= site_url('payment/process') ?>">
        <div class="pay-section-title">Pilih Metode Pembayaran</div>
        <div class="payment-methods">
          <label class="payment-method" onclick="selectMethod(this)">
            <input type="radio" name="payment_method" value="transfer_bank">
            <div class="radio-dot"></div>
            <div class="pm-icon"></div>
            <div class="pm-info">
              <div class="pm-name">Transfer Bank</div>
              <div class="pm-desc">BCA, Mandiri, BRI, BNI</div>
            </div>
          </label>
          <label class="payment-method" onclick="selectMethod(this)">
            <input type="radio" name="payment_method" value="ewallet">
            <div class="radio-dot"></div>
            <div class="pm-icon"></div>
            <div class="pm-info">
              <div class="pm-name">E-Wallet</div>
              <div class="pm-desc">GoPay, OVO, DANA, ShopeePay</div>
            </div>
          </label>
          <label class="payment-method" onclick="selectMethod(this)">
            <input type="radio" name="payment_method" value="credit_card">
            <div class="radio-dot"></div>
            <div class="pm-icon"></div>
            <div class="pm-info">
              <div class="pm-name">Kartu Kredit / Debit</div>
              <div class="pm-desc">Visa, Mastercard, JCB</div>
            </div>
          </label>
        </div>

        <button type="submit" class="btn-pay" id="btnPay">
          Bayar Sekarang — Rp149.000
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </button>
      </form>
    </div>

    <a href="<?= site_url('dashboard') ?>" class="pay-back">← Kembali ke Dashboard</a>
  </div>

  <script>
    function selectMethod(el) {
      document.querySelectorAll('.payment-method').forEach(m => m.classList.remove('selected'));
      el.classList.add('selected');
    }

    // Submit form via AJAX untuk popup
    document.getElementById('payForm').addEventListener('submit', function(e) {
      e.preventDefault();

      const method = document.querySelector('input[name="payment_method"]:checked');
      if (!method) {
        alert('Silakan pilih metode pembayaran terlebih dahulu.');
        return;
      }

      const btn = document.getElementById('btnPay');
      btn.textContent = 'Memproses...';
      btn.disabled = true;

      const formData = new FormData(this);

      fetch('<?= site_url('payment/process') ?>', {
        method: 'POST',
        body: formData,
        redirect: 'manual'
      }).then(response => {
        // Check redirect URL for success/error
        const url = response.url || '';
        // Fallback: submit form normally
        window.location.href = '<?= site_url('payment/process') ?>';
      }).catch(() => {
        window.location.href = '<?= site_url('payment/process') ?>';
      });
    });
  </script>

</body>
</html>
