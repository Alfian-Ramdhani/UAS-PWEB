<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LEARNBASE. — Powerful Course for Businesses Worldwide</title>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap"
    rel="stylesheet">

  <style>
    :root {
      --deep-green: #0E6853;
      --deep-green-dark: #0a4f3f;
      --orange: #FF5B35;
      --charcoal: #1A1A1A;
      --gray: #666666;
    }

    body {
      font-family: 'Inter', sans-serif;
      color: #1A1A1A;
      background-color: #FFFFFF;
      overflow-x: hidden;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .brand-logo,
    .nav-cta {
      font-family: 'Poppins', sans-serif;
    }

    /* ===== Navbar ===== */
    .navbar#mainNavbar {
      padding-top: 1.5rem;
      padding-bottom: 1.5rem;
      position: sticky;
      top: 0;
      z-index: 1000;
      background-color: #FFFFFF;
      transition: box-shadow 0.2s ease;
      width: 100%;
      left: 0;
    }

    .navbar.scrolled {
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
      border-color: transparent;
    }

    .brand-logo {
      font-weight: 800;
      font-size: 1.5rem;
      color: #1A1A1A;
      letter-spacing: -0.5px;
    }

    .brand-logo span {
      color: var(--orange);
    }

    .nav-link-custom {
      font-weight: 500;
      color: #1A1A1A;
      margin: 0 0.9rem;
      font-size: 0.95rem;
      transition: color 0.2s ease;
      border-radius: 50px;
      padding: 0.5rem 1.2rem !important;
    }

    .nav-link-custom:hover {
      color: var(--deep-green);
    }

    .nav-link-custom.active {
      background-color: var(--deep-green);
      color: #fff !important;
      border-radius: 50px;
    }

    .btn-join {
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 50%, var(--deep-green));
      color: #fff;
      font-weight: 600;
      font-size: 0.95rem;
      padding: 0.65rem 1.6rem;
      border-radius: 50px;
      border: none;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      text-decoration: none;
      display: inline-block;
    }

    .btn-join:hover {
      transform: translateY(-2px);
      color: #fff;
    }

    /* ===== Hero Section ===== */
    .hero-section {
      padding-top: 3rem;
      padding-bottom: 4rem;
      position: relative;
    }

    .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      font-weight: 600;
      font-size: 0.9rem;
      color: var(--orange);
      margin-bottom: 1.5rem;
    }

    .eyebrow .dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background-color: var(--orange);
      display: inline-block;
    }

    .hero-headline {
      font-weight: 800;
      font-size: 3.2rem;
      line-height: 1.15;
      color: #1A1A1A;
      margin-bottom: 1.5rem;
    }

    .hero-headline .highlight {
      color: var(--orange);
    }

    .hero-paragraph {
      color: #1A1A1A;
      font-size: 1.05rem;
      line-height: 1.7;
      max-width: 480px;
      margin-bottom: 2.2rem;
    }

    .btn-primary-cta {
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 50%, var(--deep-green));
      color: #fff;
      font-weight: 600;
      padding: 0.9rem 1.8rem;
      border-radius: 50px;
      border: none;
      display: inline-flex;
      align-items: center;
      gap: 0.6rem;
      font-size: 1rem;
      transition: background-color 0.2s ease, transform 0.2s ease;
      text-decoration: none;
    }

    .btn-primary-cta:hover {
      color: #fff;
      transform: translateY(-2px);
    }

    .btn-primary-cta svg {
      transition: transform 0.2s ease;
    }

    .btn-primary-cta:hover svg {
      transform: translateX(3px);
    }

    .btn-play-group {
      display: flex;
      align-items: center;
      gap: 0.8rem;
      text-decoration: none;
    }

    .btn-play-circle {
      width: 50px;
      height: 50px;
      min-width: 50px;
      border-radius: 50%;
      background-color: var(--orange);
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 8px 20px rgba(232, 179, 57, 0.3);
      transition: transform 0.2s ease;
    }

    .btn-play-group:hover .btn-play-circle {
      transform: scale(1.08);
    }

    .btn-play-text {
      font-weight: 600;
      color: #1A1A1A;
      font-size: 1rem;
    }

    /* ===== Hero Right / Image Section ===== */
    .hero-image-wrap {
      position: relative;
      width: 100%;
      height: 540px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .shape-green {
      position: absolute;
      width: 320px;
      height: 380px;
      background: linear-gradient(135deg, var(--deep-green), var(--deep-green));
      border-radius: 30px;
      transform: rotate(-12deg);
      top: 35px;
      right: 60px;
      z-index: 1;
      opacity: 0.25;
    }

    .shape-orange {
      position: absolute;
      width: 230px;
      height: 230px;
      background: var(--orange);
      border-radius: 30px;
      transform: rotate(20deg);
      bottom: 10px;
      left: 30px;
      z-index: 1;
      opacity: 0.95;
    }

    .hero-main-image {
      position: relative;
      z-index: 3;
      width: 320px;
      height: 460px;
      border-radius: 24px;
      background: linear-gradient(160deg, #e9eef0 0%, #d7e2e0 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
      overflow: hidden;
    }

    .hero-main-image .placeholder-icon {
      color: #9fb3ae;
    }

    .float-google {
      position: absolute;
      top: 25px;
      left: 10px;
      width: 56px;
      height: 56px;
      background: #fff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      z-index: 4;
      animation: float1 4s ease-in-out infinite;
    }

    .float-check {
      position: absolute;
      top: 60px;
      right: 20px;
      width: 50px;
      height: 50px;
      background: #E8B339;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 10px 25px rgba(255, 201, 60, 0.4);
      z-index: 4;
      animation: float2 5s ease-in-out infinite;
    }

    @keyframes float1 {

      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-12px);
      }
    }

    @keyframes float2 {

      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(10px);
      }
    }

    .float-testimonial {
      position: absolute;
      bottom: -10px;
      left: -10px;
      background: #fff;
      border-radius: 16px;
      padding: 0.9rem 1.2rem;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
      display: flex;
      align-items: center;
      gap: 0.8rem;
      z-index: 5;
      min-width: 230px;
    }

    .float-testimonial .avatar {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--deep-green), #1aa183);
      flex-shrink: 0;
    }

    .float-testimonial .name {
      font-weight: 700;
      font-size: 0.9rem;
      color: #1A1A1A;
      margin: 0;
      line-height: 1.2;
    }

    .float-testimonial .role {
      font-size: 0.78rem;
      color: #1A1A1A;
      margin: 0 0 0.25rem 0;
    }

    .stars {
      color: var(--orange);
      font-size: 0.8rem;
      letter-spacing: 1px;
    }

    /* ===== Core Features Section ===== */
    .features-section {
      padding-top: 5rem;
      padding-bottom: 5rem;
    }

    .features-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      font-weight: 600;
      font-size: 0.9rem;
      color: var(--deep-green);
      margin-bottom: 1rem;
    }

    .features-eyebrow .dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 50%, var(--deep-green));
      display: inline-block;
    }

    .features-title {
      font-weight: 800;
      font-size: 2.2rem;
      line-height: 1.25;
      color: #1A1A1A;
      margin-bottom: 1rem;
    }

    .features-title .highlight {
      color: var(--orange);
    }

    .feature-card {
      background: #fff;
      border-radius: 18px;
      padding: 2rem 1.5rem;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      text-align: center;
      height: 100%;
    }

    .feature-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 16px 32px rgba(0, 0, 0, 0.3);
    }

    .feature-icon {
      width: 60px;
      height: 60px;
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.2rem auto;
      font-size: 1.6rem;
    }

    .feature-card h4 {
      font-weight: 700;
      font-size: 1.15rem;
      color: #1A1A1A;
      margin-bottom: 0.6rem;
    }

    .feature-card p {
      font-size: 0.9rem;
      color: #1A1A1A;
      line-height: 1.6;
      margin: 0;
    }

    /* ===== Testimony Section ===== */
    .testimony-section {
      padding-top: 5rem;
      padding-bottom: 5rem;
      background-color: #f7faf9;
      border-radius: 30px;
    }
    #contact.testimony-section {
      background-color: transparent;
      border-radius: 0;
    }
    #contact .testimony-card {
      background: #fff;
      border-radius: 18px;
      padding: 2rem 1.5rem;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
      border: none;
    }
    .site-footer .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1rem;
    }

    .testimony-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      font-weight: 600;
      font-size: 0.9rem;
      color: var(--orange);
      margin-bottom: 1rem;
    }

    .testimony-eyebrow .dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background-color: var(--orange);
      display: inline-block;
    }

    .testimony-title {
      font-weight: 800;
      font-size: 2.2rem;
      line-height: 1.25;
      color: #1A1A1A;
      margin-bottom: 1rem;
    }

    .testimony-title .highlight {
      color: var(--deep-green);
    }

    .testimony-card {
      background: #fff;
      border-radius: 18px;
      padding: 2rem 1.5rem;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
      transition: transform 0.2s ease;
      height: 100%;
    }

    .testimony-card:hover {
      transform: translateY(-4px);
    }

    .testimony-stars {
      color: var(--orange);
      font-size: 0.95rem;
      letter-spacing: 2px;
      margin-bottom: 1rem;
    }

    .testimony-text {
      font-size: 0.95rem;
      line-height: 1.7;
      color: #1A1A1A;
      margin-bottom: 1.5rem;
      font-style: italic;
    }

    .testimony-author {
      display: flex;
      align-items: center;
      gap: 0.8rem;
    }

    .testimony-avatar {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--deep-green), #1aa183);
      flex-shrink: 0;
    }

    .testimony-name {
      font-weight: 700;
      font-size: 0.9rem;
      color: #1A1A1A;
      margin: 0;
      line-height: 1.2;
    }

    .testimony-role {
      font-size: 0.78rem;
      color: #1A1A1A;
      margin: 0;
    }

    /* ===== Pricing Section ===== */
    .pricing-section {
      padding-top: 5rem;
      padding-bottom: 5rem;
    }

    .pricing-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      font-weight: 600;
      font-size: 0.9rem;
      color: var(--orange);
      margin-bottom: 1rem;
    }

    .pricing-eyebrow .dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background-color: var(--orange);
      display: inline-block;
    }

    .pricing-title {
      font-weight: 800;
      font-size: 2.2rem;
      line-height: 1.25;
      color: #1A1A1A;
      margin-bottom: 1rem;
    }

    .pricing-title .highlight {
      color: var(--deep-green);
    }

    .pricing-card {
      background: #fff;
      border-radius: 18px;
      padding: 2.5rem 1.8rem;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
      text-align: center;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      position: relative;
      border: 2px solid transparent;
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .pricing-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 16px 32px rgba(0, 0, 0, 0.3);
    }

    .pricing-card.featured {
      border-color: var(--deep-green);
      box-shadow: 0 8px 32px rgba(14, 104, 83, 0.12);
    }

    .pricing-card.featured:hover {
      transform: translateY(-6px);
      box-shadow: 0 16px 40px rgba(14, 104, 83, 0.18);
    }

    .pricing-card .pricing-features {
      flex: 1;
    }

    .pricing-card .btn-pricing {
      margin-top: auto;
    }

    .pricing-badge {
      position: absolute;
      top: -12px;
      left: 50%;
      transform: translateX(-50%);
      background: var(--deep-green);
      color: #fff;
      font-size: 0.75rem;
      font-weight: 700;
      padding: 0.3rem 1.2rem;
      border-radius: 50px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .pricing-plan {
      font-weight: 700;
      font-size: 1.3rem;
      color: #1A1A1A;
      margin-bottom: 0.5rem;
    }

    .pricing-price {
      font-weight: 800;
      font-size: 2.8rem;
      color: var(--deep-green);
      margin-bottom: 0.3rem;
    }

    .pricing-price span {
      font-size: 1rem;
      font-weight: 500;
      color: #1A1A1A;
    }

    .pricing-desc {
      font-size: 0.85rem;
      color: #1A1A1A;
      margin-bottom: 1.5rem;
    }

    .pricing-features {
      list-style: none;
      padding: 0;
      margin: 0 0 1.8rem 0;
      text-align: left;
    }

    .pricing-features li {
      padding: 0.5rem 0;
      font-size: 0.9rem;
      color: #1A1A1A;
      display: flex;
      align-items: center;
      gap: 0.6rem;
      border-bottom: 1px solid #f0f0f0;
    }

    .pricing-features li:last-child {
      border-bottom: none;
    }

    .pricing-features li svg {
      flex-shrink: 0;
      color: var(--deep-green);
    }

    .btn-pricing {
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 50%, var(--deep-green));
      color: #fff;
      font-weight: 600;
      padding: 0.75rem 2rem;
      border-radius: 50px;
      border: none;
      display: inline-block;
      text-decoration: none;
      transition: background-color 0.2s ease, transform 0.2s ease;
    }

    .btn-pricing:hover {
      color: #fff;
      transform: translateY(-2px);
    }

    .btn-pricing-outline {
      background: transparent;
      color: var(--deep-green);
      border: 2px solid var(--deep-green);
    }

    .btn-pricing-outline:hover {
      background: var(--deep-green);
      color: #fff;
    }

    /* ===== About Us Section ===== */
    .about-section {
      padding-top: 5rem;
      padding-bottom: 5rem;
      border-top: 1px solid rgba(0, 0, 0, 0.08);
    }

    .about-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      font-weight: 600;
      font-size: 0.9rem;
      color: var(--deep-green);
      margin-bottom: 1.2rem;
    }

    .about-eyebrow .dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--orange), var(--deep-green) 50%, var(--deep-green));
      display: inline-block;
    }

    .about-title {
      font-weight: 800;
      font-size: 2.4rem;
      line-height: 1.2;
      color: #1A1A1A;
      margin-bottom: 1.2rem;
    }

    .about-title .highlight {
      color: var(--orange);
    }

    .about-paragraph {
      color: #1A1A1A;
      font-size: 1.02rem;
      line-height: 1.75;
      margin-bottom: 1.8rem;
      max-width: 520px;
    }

    .about-stats {
      display: flex;
      gap: 2.5rem;
      flex-wrap: wrap;
    }

    .about-stat-number {
      font-weight: 800;
      font-size: 1.9rem;
      color: var(--deep-green);
      margin-bottom: 0.2rem;
    }

    .about-stat-label {
      font-size: 0.88rem;
      color: #1A1A1A;
      font-weight: 500;
    }

    .about-image-wrap {
      position: relative;
      width: 100%;
      height: 460px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .about-shape-bg {
      position: absolute;
      width: 85%;
      height: 90%;
      background-color: #f7faf9;
      border-radius: 30px;
      z-index: 1;
    }

    .about-main-image {
      position: relative;
      z-index: 2;
      width: 78%;
      height: 80%;
      border-radius: 24px;
      background: linear-gradient(160deg, #e9eef0 0%, #d7e2e0 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.12);
    }

    .about-main-image .placeholder-icon {
      color: #9fb3ae;
    }

    .about-badge {
      position: absolute;
      bottom: 25px;
      right: 5px;
      background: var(--orange);
      color: #fff;
      border-radius: 16px;
      padding: 1rem 1.3rem;
      box-shadow: 0 15px 35px rgba(232, 179, 57, 0.25);
      z-index: 3;
      text-align: center;
    }

    .about-badge .badge-number {
      font-weight: 800;
      font-size: 1.5rem;
      line-height: 1;
    }

    .about-badge .badge-label {
      font-size: 0.78rem;
      font-weight: 500;
    }

    /* ===== Programming Languages Section ===== */
    .languages-section {
      padding-top: 5rem;
      padding-bottom: 5rem;
      background-color: #f7faf9;
      border-radius: 30px;
    }

    .languages-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      font-weight: 600;
      font-size: 0.9rem;
      color: var(--orange);
      margin-bottom: 1rem;
    }

    .languages-eyebrow .dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background-color: var(--orange);
      display: inline-block;
    }

    .languages-title {
      font-weight: 800;
      font-size: 2.2rem;
      line-height: 1.25;
      color: #1A1A1A;
      margin-bottom: 1rem;
    }

    .languages-title .highlight {
      color: var(--deep-green);
    }

    .languages-paragraph {
      color: #1A1A1A;
      font-size: 1rem;
      line-height: 1.7;
    }

    .lang-card {
      background: #fff;
      border-radius: 18px;
      padding: 1.8rem 1rem 1.4rem;
      text-align: center;
      height: 100%;
      min-height: 150px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .lang-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 16px 32px rgba(0, 0, 0, 0.12);
    }

    .lang-card i[class*="devicon"] {
      display: block;
      margin: 0 auto 0.5rem auto;
      font-size: 44px;
      line-height: 1;
      transition: transform 0.35s ease;
    }

    .lang-card:hover i[class*="devicon"] {
      transform: translateY(-10px);
    }

    .lang-card i.devicon-rust-plain {
      color: #CE422B;
    }

    .lang-name {
      font-weight: 600;
      font-size: 0.95rem;
      color: #1A1A1A;
      margin-bottom: 0;
      margin-top: 0.25rem;
      transition: transform 0.35s ease;
    }

    .lang-card:hover .lang-name {
      transform: translateY(-6px);
    }

    /* ===== Hover Bottom Band ===== */
    .lang-band {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 0 0 18px 18px;
      transition: height 0.35s ease;
      overflow: hidden;
      background: transparent !important;
    }

    .lang-card:hover .lang-band {
      height: 36%;
    }

    .lang-band-text {
      font-weight: 700;
      font-size: 0.75rem;
      white-space: nowrap;
      opacity: 0;
      transition: opacity 0.25s ease;
      letter-spacing: 0.3px;
      text-shadow: 0 0 6px rgba(255,255,255,0.5);
    }

    .lang-card:hover .lang-band-text {
      opacity: 1;
      transition-delay: 0.1s;
    }

    .lang-card:hover .lang-hover-info {
      opacity: 1;
      transform: translateY(0);
    }

    .lang-hover-info .hover-label {
      font-weight: 700;
      font-size: 0.72rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: var(--orange);
      margin-bottom: 0.4rem;
    }

    .lang-hover-info .hover-text {
      font-size: 0.82rem;
      line-height: 1.45;
      color: #1A1A1A;
      margin: 0;
    }

    .lang-hover-info .hover-icon {
      font-size: 26px;
      margin-bottom: 0.4rem;
      line-height: 1;
    }

    /* ===== Infinite Scroll ===== */
    .scroll-container {
      overflow: hidden;
      width: 100%;
      padding: 0.5rem 0;
      mask-image: linear-gradient(to right, transparent 0%, black 5%, black 95%, transparent 100%);
      -webkit-mask-image: linear-gradient(to right, transparent 0%, black 5%, black 95%, transparent 100%);
    }

    .scroll-track {
      display: flex;
      gap: 1.5rem;
      width: max-content;
      animation: scrollLoop 40s linear infinite;
    }

    .scroll-track:hover {
      animation-play-state: paused;
    }

    .scroll-item {
      flex: 0 0 auto;
      width: 150px;
    }

    @keyframes scrollLoop {
      0% {
        transform: translateX(-50%);
      }

      100% {
        transform: translateX(0);
      }
    }

    /* ===== Footer ===== */
    .site-footer {
      background-color: #e2e8e7;
      color: #1A1A1A;
      padding-top: 4rem;
      padding-bottom: 0;
      margin-top: 2rem;
      border-top: none;
      position: relative;
      left: 50%;
      right: 50%;
      margin-left: -50vw;
      margin-right: -50vw;
      width: 100vw;
      max-width: 100vw;
    }
    .site-footer > .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1rem;
    }
    .footer-bottom-bar {
      background-color: #e2e8e7;
      padding: 1.5rem 0;
      margin-top: 3rem;
      position: relative;
      left: 50%;
      right: 50%;
      margin-left: -50vw;
      margin-right: -50vw;
      width: 100vw;
      max-width: 100vw;
    }

    .footer-brand {
      font-family: 'Poppins', sans-serif;
      font-weight: 700;
      font-size: 1.5rem;
      color: #1A1A1A;
      margin-bottom: 1rem;
      display: inline-block;
      text-decoration: none;
    }

    .footer-brand span {
      color: var(--orange);
    }

    .footer-about {
      color: #1A1A1A;
      font-size: 0.92rem;
      line-height: 1.7;
      max-width: 320px;
      margin-bottom: 1.5rem;
    }

    .footer-social {
      display: flex;
      gap: 0.7rem;
    }

    .footer-social a {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      background-color: rgba(0, 0, 0, 0.04);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #1A1A1A;
      transition: background-color 0.2s ease, color 0.2s;
    }

    .footer-social a:hover {
      background-color: var(--orange);
      color: #fff;
    }

    .footer-heading {
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      font-size: 1.05rem;
      color: #1A1A1A;
      margin-bottom: 1.4rem;
    }

    .footer-links {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .footer-links li {
      margin-bottom: 0.8rem;
    }

    .footer-links a {
      color: #1A1A1A;
      text-decoration: none;
      font-size: 0.92rem;
      transition: color 0.2s ease;
    }

    .footer-contact-item {
      display: flex;
      align-items: flex-start;
      gap: 0.8rem;
      margin-bottom: 1.1rem;
    }

    .footer-contact-item svg {
      color: var(--orange);
      flex-shrink: 0;
      margin-top: 2px;
    }

    .footer-contact-item span {
      color: #1A1A1A;
      font-size: 0.92rem;
      line-height: 1.5;
    }

    /* ===== Custom Media Query Adjustments (Hanya yang tidak di-cover Bootstrap) ===== */
    @media (max-width: 991.98px) {
      .hero-headline {
        font-size: 2.4rem;
      }

      .nav-link-custom {
        margin: 0 0.5rem;
      }

      .about-title {
        font-size: 2rem;
      }

      .about-image-wrap {
        height: 380px;
        margin-top: 2.5rem;
      }
    }

    @media (max-width: 767.98px) {
      .hero-headline {
        font-size: 2rem;
      }

      .hero-paragraph {
        max-width: 100%;
      }

      .hero-image-wrap {
        height: 460px;
        margin-top: 2.5rem;
      }

      .shape-green {
        width: 260px;
        height: 320px;
        right: 30px;
      }

      .shape-orange {
        width: 190px;
        height: 190px;
        left: 10px;
      }

      .hero-main-image {
        width: 260px;
        height: 380px;
      }
    }

    @media (max-width: 575.98px) {
      .hero-headline {
        font-size: 1.7rem;
      }

      .float-testimonial {
        min-width: 200px;
        padding: 0.7rem 0.9rem;
      }

      .features-title,
      .testimony-title,
      .pricing-title,
      .languages-title {
        font-size: 1.7rem;
      }

      .scroll-item {
        width: 120px;
      }

      .lang-card {
        padding: 1.5rem 0.8rem 1.2rem;
      }

      .lang-card i[class*="devicon"] {
        font-size: 38px;
      }

      .scroll-track {
        gap: 1rem;
        animation-duration: 30s;
      }

      .languages-section {
        padding-top: 3.5rem;
        padding-bottom: 3.5rem;
      }
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light" id="mainNavbar">
    <div class="container">
      <a class="navbar-brand brand-logo" href="#">LEARNBASE<span>.</span></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
        aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navMenu">
        <ul class="navbar-nav me-lg-3 text-center text-lg-start py-3 py-lg-0">
          <li class="nav-item"><a class="nav-link nav-link-custom py-2 py-lg-0" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link nav-link-custom py-2 py-lg-0" href="#about">About Us</a></li>
          <li class="nav-item"><a class="nav-link nav-link-custom py-2 py-lg-0" href="#contact">Contact</a></li>
        </ul>
        <div class="text-center text-lg-start">
          <a href="<?= site_url('auth/login') ?>" class="btn-join">Login</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <section class="hero-section" id="home">
      <div class="row align-items-center g-4 g-lg-5">

        <div class="col-lg-6 col-12">
          <span class="eyebrow"><span class="dot"></span>E-Learning Platform</span>

          <h1 class="hero-headline">
            Powerful Course 10,000 <span class="highlight">Businesses</span> Worldwide
          </h1>

          <p class="hero-paragraph">
            Learn in-demand skills with expert-led courses designed to help you grow,
            upskill, and stay ahead in today's competitive digital world.
          </p>

          <div class="d-flex align-items-center flex-wrap gap-3 gap-md-4">
            <a href="<?= site_url('auth/login') ?>" class="btn-primary-cta">
              Start Free Trial
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
              </svg>
            </a>

            <a href="#" class="btn-play-group">
              <span class="btn-play-circle">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="white">
                  <polygon points="6,4 20,12 6,20"></polygon>
                </svg>
              </span>
              <span class="btn-play-text">How it Work</span>
            </a>
          </div>
        </div>

        <div class="col-lg-6 col-12">
          <div class="hero-image-wrap">

            <div class="shape-green"></div>
            <div class="shape-orange"></div>

            <div class="hero-main-image p-3">
              <img src="https://img.freepik.com/free-vector/programming-concept-illustration_114360-1351.jpg?w=600" alt="Programming Illustration" class="img-fluid"
                style="width:100%;height:100%;object-fit:cover;border-radius:20px;">
            </div>

            <div class="float-google" title="Google">
              <svg width="26" height="26" viewBox="0 0 48 48">
                <path fill="#FFC107"
                  d="M43.6 20.5h-1.9V20.4H24v7.2h11.3c-1.6 4.6-6 7.9-11.3 7.9-6.6 0-12-5.4-12-12s5.4-12 12-12c3.1 0 5.9 1.2 8 3.1l5.1-5.1C33.6 6.1 29 4.4 24 4.4 13.2 4.4 4.4 13.2 4.4 24S13.2 43.6 24 43.6 43.6 34.8 43.6 24c0-1.2-.1-2.4-.4-3.5z" />
                <path fill="#FF3D00"
                  d="M6.3 14.7l5.9 4.3C13.7 15.6 18.5 12.4 24 12.4c3.1 0 5.9 1.2 8 3.1l5.1-5.1C33.6 6.1 29 4.4 24 4.4c-7.7 0-14.3 4.4-17.7 10.3z" />
                <path fill="#4CAF50"
                  d="M24 43.6c5 0 9.5-1.9 12.9-5l-6-5c-2 1.4-4.5 2.2-6.9 2.2-5.3 0-9.7-3.3-11.3-7.9l-5.9 4.6c3.3 6.6 10 11.1 17.2 11.1z" />
                <path fill="#1976D2"
                  d="M43.6 20.5h-1.9V20.4H24v7.2h11.3c-.8 2.2-2.2 4.1-4.1 5.4l6 5c-.4.4 6.4-4.6 6.4-13.6 0-1.2-.1-2.4-.4-3.5z" />
              </svg>
            </div>

            <div class="float-check" title="Verified">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--charcoal)" stroke-width="3"
                stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
              </svg>
            </div>


          </div>
        </div>

      </div>
    </section>

    <section class="features-section">
      <div class="text-center mx-auto mb-5" style="max-width: 620px;">
        <span class="features-eyebrow"><span class="dot"></span>Core Features</span>
        <h2 class="features-title">Keunggulan <span class="highlight">Learnbase</span></h2>
        <p class="languages-paragraph">
          Platform belajar pemrograman yang dirancang untuk membantumu menguasai
          keterampilan digital dengan cepat dan efektif.
        </p>
      </div>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="3000" class="col">
          <div class="feature-card">
            <div class="feature-icon" style="background:#e8f5f0;color:var(--deep-green);"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div>
            <h4>Kurikulum Terstruktur</h4>
            <p>Materi disusun secara sistematis dari dasar hingga mahir, cocok untuk pemula maupun profesional.</p>
          </div>
        </div>
        <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="3000" class="col">
          <div class="feature-card">
            <div class="feature-icon" style="background:#fef3e9;color:var(--orange);"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
            <h4>Mentor Berpengalaman</h4>
            <p>Belajar langsung dari praktisi industri yang telah berpengalaman bertahun-tahun di bidangnya.</p>
          </div>
        </div>
        <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="3000" class="col">
          <div class="feature-card">
            <div class="feature-icon" style="background:#e8f5f0;color:var(--deep-green);"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
            <h4>Project-Based Learning</h4>
            <p>Terapkan ilmu melalui proyek nyata yang bisa ditambahkan ke portofolio kamu.</p>
          </div>
        </div>
        <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="3000" class="col">
          <div class="feature-card">
            <div class="feature-icon" style="background:#fef3e9;color:var(--orange);"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5C7 4 9 6 9 9v1a4 4 0 0 0 4 4h1"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5C17 4 15 6 15 9v1a4 4 0 0 1-4 4h-1"/><path d="M5 18h14"/><path d="M10 14v4"/><path d="M14 14v4"/></svg></div>
            <h4>Sertifikat Resmi</h4>
            <p>Dapatkan sertifikat penyelesaian yang diakui industri setelah menyelesaikan kursus.</p>
          </div>
        </div>
        <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="3000" class="col">
          <div class="feature-card">
            <div class="feature-icon" style="background:#e8f5f0;color:var(--deep-green);"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
            <h4>Akses Seumur Hidup</h4>
            <p>Akses materi kapan saja, di mana saja, tanpa batas waktu. Belajar sesuai ritme kamu.</p>
          </div>
        </div>
        <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="3000" class="col">
          <div class="feature-card">
            <div class="feature-icon" style="background:#fef3e9;color:var(--orange);"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
            <h4>Chatbot AI Interaktif</h4>
            <p>Tanya jawab langsung dengan asisten AI kapan saja. Dapatkan bantuan instan untuk bug, algoritma, atau
              konsep coding yang sulit.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="languages-section" id="languages">
      <div class="text-center mx-auto mb-5" style="max-width: 620px;">
        <span class="languages-eyebrow"><span class="dot"></span>What You'll Learn</span>
        <h2 class="languages-title">
          Kuasai <span class="highlight">12 Bahasa Pemrograman</span> Populer
        </h2>
        <p class="languages-paragraph">
          Learnbase menghadirkan kursus untuk 12 bahasa pemrograman yang paling banyak
          digunakan di industri saat ini, mulai dari pengembangan web, mobile, data, hingga
          sistem — cocok untuk pemula maupun yang ingin naik level.
        </p>
      </div>

      <div class="scroll-container">
        <div class="scroll-track" id="scrollTrack">
          <!-- Set 1 -->
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-python-plain colored"></i>
              <div class="lang-name">Python</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#306998;">Data & Backend</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-javascript-plain colored"></i>
              <div class="lang-name">JavaScript</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#d4b618;">Web Development</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-php-plain colored"></i>
              <div class="lang-name">PHP</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#777bb4;">Server-side Web</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-java-plain colored"></i>
              <div class="lang-name">Java</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#ed8b00;">Enterprise Apps</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-c-plain colored"></i>
              <div class="lang-name">C</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#00599c;">System Program.</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-cplusplus-plain colored"></i>
              <div class="lang-name">C++</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#00599c;">System Program.</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-csharp-plain colored"></i>
              <div class="lang-name">C#</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#3daa6e;">Game & Software</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-go-plain colored"></i>
              <div class="lang-name">Go</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#00aed8;">Backend & Cloud</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-ruby-plain colored"></i>
              <div class="lang-name">Ruby</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#cc342d;">Web Development</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-rust-plain"></i>
              <div class="lang-name">Rust</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#ce422b;">Perf. & Safety</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-typescript-plain colored"></i>
              <div class="lang-name">TypeScript</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#3178c6;">Scalable Apps</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-sqlite-plain colored"></i>
              <div class="lang-name">SQL lite</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#003b57;">Database</span>
              </div>
            </div>
          </div>
          <!-- Duplicate set for seamless infinite scroll -->
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-python-plain colored"></i>
              <div class="lang-name">Python</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#306998;">Data & Backend</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-javascript-plain colored"></i>
              <div class="lang-name">JavaScript</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#d4b618;">Web Development</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-php-plain colored"></i>
              <div class="lang-name">PHP</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#777bb4;">Server-side Web</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-java-plain colored"></i>
              <div class="lang-name">Java</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#ed8b00;">Enterprise Apps</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-c-plain colored"></i>
              <div class="lang-name">C</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#00599c;">System Program.</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-cplusplus-plain colored"></i>
              <div class="lang-name">C++</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#00599c;">System Program.</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-csharp-plain colored"></i>
              <div class="lang-name">C#</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#3daa6e;">Game & Software</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-go-plain colored"></i>
              <div class="lang-name">Go</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#00aed8;">Backend & Cloud</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-ruby-plain colored"></i>
              <div class="lang-name">Ruby</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#cc342d;">Web Development</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-rust-plain"></i>
              <div class="lang-name">Rust</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#ce422b;">Perf. & Safety</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-typescript-plain colored"></i>
              <div class="lang-name">TypeScript</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#3178c6;">Scalable Apps</span>
              </div>
            </div>
          </div>
          <div class="scroll-item">
            <div class="lang-card">
              <i class="devicon-sqlite-plain colored"></i>
              <div class="lang-name">SQL lite</div>
              <div class="lang-band">
                <span class="lang-band-text" style="color:#003b57;">Database</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <section class="about-section" id="about">
    <div class="container">
      <div class="row align-items-center g-4 g-lg-5">

        <div class="col-lg-6 col-12 order-lg-1 order-2">
          <div class="about-image-wrap">
            <div class="about-shape-bg"></div>
            <div class="about-main-image" style="display:flex;align-items:center;justify-content:center;">
              <div style="font-family:'Poppins',sans-serif;font-size:3.5rem;font-weight:800;color:#1A1A1A;text-align:center;line-height:1.1;">LEARNBASE<span style="color:var(--orange);">.</span></div>
            </div>
            <div class="about-badge">
              <div class="badge-number">5+</div>
              <div class="badge-label">Years<br>Experience</div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-12 order-lg-2 order-1 mb-4 mb-lg-0">
          <span class="about-eyebrow"><span class="dot"></span>About Us</span>

          <h2 class="about-title">
            Mengenal Lebih Dekat <span class="highlight">Learnbase</span>
          </h2>

          <p class="about-paragraph">
            Learnbase adalah platform e-learning yang didirikan dengan satu misi sederhana:
            membuat pembelajaran pemrograman dapat diakses oleh siapa saja, di mana saja.
            Sejak awal berdiri, kami berkomitmen menghadirkan kurikulum yang relevan dengan
            kebutuhan industri, dibimbing langsung oleh mentor-mentor berpengalaman di
            bidangnya.
          </p>

          <p class="about-paragraph">
            Kami percaya bahwa belajar coding bukan hanya soal menghafal sintaks, melainkan
            membangun cara berpikir logis dan kreatif dalam memecahkan masalah. Karena itu,
            Learnbase terus berinovasi menghadirkan materi yang praktis, project-based, dan
            selalu mengikuti perkembangan teknologi terbaru.
          </p>

          <div class="about-stats">
            <div>
              <div class="about-stat-number">10K+</div>
              <div class="about-stat-label">Businesses Trained</div>
            </div>
            <div>
              <div class="about-stat-number">200+</div>
              <div class="about-stat-label">Expert Mentors</div>
            </div>
            <div>
              <div class="about-stat-number">98%</div>
              <div class="about-stat-label">Satisfaction Rate</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="testimony-section">
    <div class="container">
      <div class="text-center mx-auto mb-5" style="max-width: 620px;">
        <span class="testimony-eyebrow"><span class="dot"></span>Testimonials</span>
        <h2 class="testimony-title">Apa Kata <span class="highlight">Mereka?</span></h2>
        <p class="languages-paragraph">
          Ribuan siswa telah merasakan manfaat belajar di Learnbase. Ini cerita mereka.
        </p>
      </div>

      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="testimony-card">
            <div class="testimony-stars">★★★★★</div>
            <p class="testimony-text">
              "Belajar di Learnbase benar-benar mengubah karir saya. Materinya lengkap, mentornya sabar,
              dan komunitasnya sangat suportif. Recommended banget!"
            </p>
            <div class="testimony-author">
              <div class="testimony-avatar"></div>
              <div>
                <p class="testimony-name">Ahmad Fauzi</p>
                <p class="testimony-role">Full-Stack Developer</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="testimony-card">
            <div class="testimony-stars">★★★★★</div>
            <p class="testimony-text">
              "Sebagai pemula, saya awalnya ragu bisa belajar coding. Tapi Learnbase membuat semuanya
              terasa mudah dengan pendekatan step-by-step yang jelas."
            </p>
            <div class="testimony-author">
              <div class="testimony-avatar" style="background:linear-gradient(135deg,var(--orange),#ff8a66);"></div>
              <div>
                <p class="testimony-name">Siti Nurhaliza</p>
                <p class="testimony-role">UI/UX Designer</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="testimony-card">
            <div class="testimony-stars">★★★★★</div>
            <p class="testimony-text">
              "Sertifikat dari Learnbase membantu saya mendapatkan pekerjaan impian di perusahaan teknologi.
              Materi yang diajarkan relevan dengan kebutuhan industri."
            </p>
            <div class="testimony-author">
              <div class="testimony-avatar" style="background:linear-gradient(135deg,#264DE4,#5a7de0);"></div>
              <div>
                <p class="testimony-name">Budi Santoso</p>
                <p class="testimony-role">Software Engineer</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="pricing-section">
    <div class="container">
      <div class="text-center mx-auto mb-5" style="max-width: 620px;">
        <span class="pricing-eyebrow"><span class="dot"></span>Pricing Plan</span>
        <h2 class="pricing-title">Pilih Paket <span class="highlight">Belajarmu</span></h2>
        <p class="languages-paragraph">
          Mulai perjalanan belajarmu dengan paket yang sesuai kebutuhan.
        </p>
      </div>

      <div class="row justify-content-center g-4">
        <div class="col-md-5 col-lg-4">
          <div class="pricing-card">
            <div class="pricing-plan">Pemula</div>
            <div class="pricing-price">Gratis <span></span></div>
            <p class="pricing-desc">Coba belajar tanpa biaya</p>
            <ul class="pricing-features">
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                  stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg> Akses 3 kursus dasar</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                  stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg> Video tutorial terbatas</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                  stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg> Komunitas diskusi</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                  stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg> Sertifikat dasar</li>
            </ul>
            <a href="#" class="btn-pricing btn-pricing-outline">Mulai Gratis</a>
          </div>
        </div>

        <div class="col-md-5 col-lg-4">
          <div class="pricing-card featured">
            <div class="pricing-badge">Paling Populer</div>
            <div class="pricing-plan">Pro</div>
            <div class="pricing-price">Rp149K <span>/bulan</span></div>
            <p class="pricing-desc">Akses penuh semua fitur</p>
            <ul class="pricing-features">
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                  stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg> Semua kursus (100+)</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                  stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg> Mentor langsung</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                  stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg> Proyek portofolio</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                  stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg> Sertifikat premium</li>
              <li><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                  stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg> Akses offline</li>
            </ul>
            <a href="<?= site_url('auth/login') ?>" class="btn-pricing">Mulai Sekarang</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== Contact Section ===== -->
  <section class="testimony-section" id="contact">
    <div class="container">
      <div class="text-center mx-auto mb-5" style="max-width: 620px;">
        <span class="testimony-eyebrow"><span class="dot"></span>Get In Touch</span>
        <h2 class="testimony-title">
          Hubungi <span class="highlight">Kami</span>
        </h2>
        <p class="languages-paragraph">
          Punya pertanyaan atau ingin tahu lebih lanjut? Tim kami siap membantu.
        </p>
      </div>
      <div class="row g-4 justify-content-center">
        <div class="col-lg-4 col-md-6">
          <div class="testimony-card text-center h-100 p-4">
            <div class="mb-3"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color:var(--orange);"><path d="M21 10c0 7-9 12-9 12s-9-5-9-12a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
            <h5 style="font-weight:700;font-size:1rem;">Alamat</h5>
            <p style="font-size:0.9rem;color:#666;margin:0;">Jl. Pejanggik No. 12, Mataram, NTB, Indonesia</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="testimony-card text-center h-100 p-4">
            <div class="mb-3"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color:var(--orange);"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.1-8.7A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .3 2 .6 2.9a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6 6l1.2-1.2a2 2 0 0 1 2.1-.5c.9.3 1.9.5 2.9.6a2 2 0 0 1 1.8 2.1z"/></svg></div>
            <h5 style="font-weight:700;font-size:1rem;">Telepon</h5>
            <p style="font-size:0.9rem;color:#666;margin:0;">+62 812-3456-7890</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="testimony-card text-center h-100 p-4">
            <div class="mb-3" style="font-size: 2rem;"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color:var(--orange);"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
            <h5 style="font-weight:700;font-size:1rem;">Email</h5>
            <p style="font-size:0.9rem;color:#666;margin:0;">hello@devskill.com</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="site-footer">
    <div class="container">
      <div class="row g-4 justify-content-between">

        <div class="col-lg-4 col-md-6 col-12">
          <a href="#" class="footer-brand">LEARNBASE<span>.</span></a>
          <p class="footer-about">
            LEARNBASE helps individuals and businesses master in-demand digital skills
            through expert-led courses and hands-on learning experiences.
          </p>
          <div class="footer-social">
            <a href="#" title="Facebook">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                <path
                  d="M22 12a10 10 0 1 0-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.4v7A10 10 0 0 0 22 12z" />
              </svg>
            </a>
            <a href="#" title="Twitter">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                <path
                  d="M22 5.9c-.7.3-1.5.6-2.4.7.8-.5 1.5-1.3 1.8-2.3-.8.5-1.7.8-2.6 1a4.1 4.1 0 0 0-7 3.7A11.6 11.6 0 0 1 3.4 4.6a4.1 4.1 0 0 0 1.3 5.5c-.7 0-1.3-.2-1.9-.5v.1c0 2 1.4 3.6 3.3 4a4.1 4.1 0 0 1-1.9.1 4.1 4.1 0 0 0 3.8 2.9A8.2 8.2 0 0 1 2 18.4a11.6 11.6 0 0 0 6.3 1.9c7.5 0 11.7-6.3 11.7-11.7v-.5c.8-.6 1.5-1.3 2-2.2z" />
              </svg>
            </a>
            <a href="#" title="Instagram">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                <path
                  d="M12 2c2.7 0 3 0 4.1.1 1.1 0 1.8.2 2.2.4.6.2 1 .5 1.4.9.4.4.7.8.9 1.4.2.4.3 1.1.4 2.2.1 1.1.1 1.4.1 4.1s0 3-.1 4.1c0 1.1-.2 1.8-.4 2.2-.2.6-.5 1-.9 1.4-.4.4-.8.7-1.4.9-.4.2-1.1.3-2.2.4-1.1.1-1.4.1-4.1.1s-3 0-4.1-.1c-1.1 0-1.8-.2-2.2-.4-.6-.2-1-.5-1.4-.9-.4-.4-.7-.8-.9-1.4-.2-.4-.3-1.1-.4-2.2C2 15 2 14.7 2 12s0-3 .1-4.1c0-1.1.2-1.8.4-2.2.2-.6.5-1 .9-1.4.4-.4.8-.7 1.4-.9.4-.2 1.1-.3 2.2-.4C8 2 8.3 2 11 2h1zm0 1.8c-2.7 0-3 0-4 .1-.9 0-1.4.2-1.7.3-.4.2-.7.3-1 .6-.3.3-.5.6-.6 1-.1.3-.3.8-.3 1.7-.1 1-.1 1.3-.1 4s0 3 .1 4c0 .9.2 1.4.3 1.7.2.4.3.7.6 1 .3.3.6.5 1 .6.3.1.8.3 1.7.3 1 .1 1.3.1 4 .1s3 0 4-.1c.9 0 1.4-.2 1.7-.3.4-.2.7-.3 1-.6.3-.3.5-.6.6-1 .1-.3.3-.8.3-1.7.1-1 .1-1.3.1-4s0-3-.1-4c0-.9-.2-1.4-.3-1.7-.2-.4-.3-.7-.6-1-.3-.3-.6-.5-1-.6-.3-.1-.8-.3-1.7-.3-1-.1-1.3-.1-4-.1zm0 3.5a4.7 4.7 0 1 1 0 9.4 4.7 4.7 0 0 1 0-9.4zm0 1.8a2.9 2.9 0 1 0 0 5.8 2.9 2.9 0 0 0 0-5.8zm5-2a1.1 1.1 0 1 1-2.2 0 1.1 1.1 0 0 1 2.2 0z" />
              </svg>
            </a>
            <a href="#" title="LinkedIn">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                <path
                  d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM3 9h4v12H3zM9 9h3.8v1.7h.1c.5-1 1.8-2 3.7-2 4 0 4.7 2.6 4.7 6V21h-4v-5.8c0-1.4 0-3.2-2-3.2s-2.3 1.5-2.3 3.1V21H9z" />
              </svg>
            </a>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 col-6">
          <h6 class="footer-heading">Quick Links</h6>
          <ul class="footer-links">
            <li><a href="#">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#">Our Course</a></li>
            <li><a href="#">Mentors</a></li>
            <li><a href="#">Blog</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-6 col-6">
          <h6 class="footer-heading">Company</h6>
          <ul class="footer-links">
            <li><a href="#">Careers</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 col-12">
          <h6 class="footer-heading">Contact Us</h6>

          <div class="footer-contact-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 10c0 7-9 12-9 12s-9-5-9-12a9 9 0 0 1 18 0z"></path>
              <circle cx="12" cy="10" r="3"></circle>
            </svg>
            <span>Jl. Pejanggik No. 12, Mataram, NTB, Indonesia</span>
          </div>

          <div class="footer-contact-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path
                d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.1-8.7A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .3 2 .6 2.9a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6 6l1.2-1.2a2 2 0 0 1 2.1-.5c.9.3 1.9.5 2.9.6a2 2 0 0 1 1.8 2.1z">
              </path>
            </svg>
            <span>+62 812-3456-7890</span>
          </div>

          <div class="footer-contact-item">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <span>hello@devskill.com</span>
          </div>
        </div>

      </div>

    </div>
    <div class="footer-bottom-bar">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 small text-muted">
          <span>&copy; 2026 LEARNBASE. All rights reserved.</span>
          <span>Designed with care for learners worldwide.</span>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>

  <script>
    window.addEventListener('scroll', function () {
      const nav = document.querySelector('#mainNavbar');
      if (window.scrollY > 10) {
        nav.classList.add('scrolled');
      } else {
        nav.classList.remove('scrolled');
      }

      // Scroll spy — active nav link
      const sections = document.querySelectorAll('section[id]');
      const navLinks = document.querySelectorAll('.nav-link-custom');
      let current = '';
      sections.forEach(section => {
        const top = section.offsetTop - 120;
        if (window.scrollY >= top) {
          current = section.getAttribute('id');
        }
      });
      navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === '#' + current) {
          link.classList.add('active');
        }
      });
    });
  </script>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>

</html>