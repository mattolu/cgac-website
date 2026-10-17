* {
  box-sizing: border-box;
}

:root {
  --cgac-blue: #0a2d8f;
  --cgac-blue-deep: #061d5d;
  --cgac-gold: #d4a84d;
  --cgac-ivory: #f5f1e8;
  --cgac-white: #ffffff;
  --cgac-text: #111827;
  --cgac-muted: #52607a;
  --cgac-border: rgba(17, 24, 39, 0.08);
  --cgac-card: #ffffff;
  --cgac-alt: #eef3fa;
  --shadow: 0 10px 28px rgba(10, 45, 143, 0.08);
}

html { scroll-behavior: smooth; }
body {
  margin: 0;
  font-family: 'Inter', sans-serif;
  background: #f6f5f2;
  color: var(--cgac-text);
  line-height: 1.6;
}

a {
  color: var(--cgac-blue);
  text-decoration: none;
}

img { max-width: 100%; display: block; }

.container {
  width: min(1200px, calc(100% - 2rem));
  margin: 0 auto;
}

.eyebrow {
  margin: 0 0 0.75rem;
  text-transform: uppercase;
  letter-spacing: 0.12em;
  font-size: 0.76rem;
  font-weight: 700;
  color: var(--cgac-gold);
}

h1, h2, h3, h4 {
  margin-top: 0;
  line-height: 1.15;
  color: var(--cgac-blue-deep);
  font-family: 'Libre Baskerville', serif;
}

h1 { font-size: clamp(2.5rem, 5vw, 5rem); }
h2 { font-size: clamp(1.9rem, 3vw, 3rem); }
h3 { font-size: 1.3rem; }

.topbar {
  background: var(--cgac-blue-deep);
  color: var(--cgac-white);
  font-size: 0.84rem;
}

.topbar-inner {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 1rem;
  min-height: 42px;
}

.topbar a {
  color: #fff;
  font-weight: 600;
}

.site-header {
  background: rgba(255,255,255,0.9);
  border-bottom: 1px solid var(--cgac-border);
  position: sticky;
  top: 0;
  z-index: 20;
  backdrop-filter: blur(10px);
}

.nav-wrap {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  min-height: 88px;
}

.brand {
  display: inline-flex;
  align-items: center;
  gap: 0.9rem;
}

.brand-mark {
  width: 58px;
  height: 58px;
  border-radius: 50%;
  box-shadow: 0 3px 8px rgba(0,0,0,0.08);
}

.brand-text {
  display: flex;
  flex-direction: column;
  gap: 0.08rem;
}

.brand-text strong {
  font-size: 1.2rem;
  color: var(--cgac-blue);
  letter-spacing: 0.08em;
}

.brand-text span {
  font-size: 0.7rem;
  color: var(--cgac-muted);
  text-transform: uppercase;
  letter-spacing: 0.08em;
}

.main-nav {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 1.1rem;
  flex-wrap: wrap;
}

.main-nav a {
  color: var(--cgac-text);
  font-size: 0.92rem;
  font-weight: 600;
}

.nav-actions {
  display: flex;
  align-items: center;
  gap: 0.8rem;
}

.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  border-radius: 999px;
  padding: 0.82rem 1.4rem;
  border: 1px solid transparent;
  font-weight: 700;
  transition: 0.2s ease;
}

.btn:hover {
  transform: translateY(-1px);
}

.btn-primary {
  background: linear-gradient(135deg, var(--cgac-blue), var(--cgac-blue-deep));
  color: #fff;
  box-shadow: 0 10px 20px rgba(10, 45, 143, 0.15);
}

.btn-secondary {
  background: #fff;
  color: var(--cgac-blue);
  border-color: rgba(10, 45, 143, 0.2);
}

.btn-ghost {
  background: rgba(10, 45, 143, 0.04);
  color: var(--cgac-blue);
  border-color: rgba(10, 45, 143, 0.1);
}

.hero {
  background: linear-gradient(180deg, #f9f8f5 0%, #f0f4fb 100%);
  padding: 4.5rem 0 3rem;
}

.hero-grid {
  display: grid;
  grid-template-columns: 1.15fr 0.85fr;
  align-items: center;
  gap: 2rem;
}

.hero-copy {
  max-width: 660px;
}

.lead {
  font-size: 1.12rem;
  color: var(--cgac-muted);
  margin-bottom: 1.8rem;
}

.hero-actions {
  display: flex;
  align-items: center;
  gap: 1rem;
  flex-wrap: wrap;
  margin-bottom: 2rem;
}

.hero-meta {
  display: flex;
  align-items: center;
  gap: 2rem;
  flex-wrap: wrap;
  padding-top: 1rem;
}

.meta-label {
  display: block;
  font-size: 0.72rem;
  color: var(--cgac-muted);
  text-transform: uppercase;
  letter-spacing: 0.12em;
  margin-bottom: 0.3rem;
}

.hero-visual {
  display: flex;
  justify-content: center;
}

.logo-panel {
  display: grid;
  place-items: center;
  width: min(100%, 600px);
  min-height: 510px;
  background: radial-gradient(circle at center, rgba(10,45,143,0.08), rgba(10,45,143,0));
  border-radius: 32px;
}

.hero-logo {
  max-width: 480px;
  width: 100%;
  filter: drop-shadow(0 22px 25px rgba(14, 32, 99, 0.2));
}

.section-space {
  padding: 5.5rem 0;
}

.alt-bg {
  background: var(--cgac-alt);
}

.section-heading {
  margin-bottom: 2rem;
}

.row-between {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  gap: 1rem;
}

.feature-grid,
.programme-grid,
.sermon-grid,
.quote-grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 1.5rem;
}

.card {
  background: var(--cgac-card);
  border: 1px solid var(--cgac-border);
  border-radius: 22px;
  overflow: hidden;
  box-shadow: var(--shadow);
}

.feature-card {
  padding: 2rem 1.5rem;
}

.icon-box {
  width: 58px;
  height: 58px;
  border-radius: 16px;
  display: grid;
  place-items: center;
  background: rgba(10,45,143,0.08);
  color: var(--cgac-blue);
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 1rem;
}

.split-layout {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 2rem;
  align-items: center;
}

.copy-block {
  max-width: 560px;
}

.watchword-ref {
  font-size: 0.95rem;
  color: var(--cgac-blue);
  font-weight: 600;
}

.text-link {
  display: inline-block;
  margin-top: 0.75rem;
  font-weight: 700;
}

.poster-card {
  padding: 1rem;
}

.poster-placeholder {
  display: grid;
  place-items: center;
  min-height: 360px;
  border-radius: 18px;
  background: linear-gradient(135deg, rgba(10,45,143,0.08), rgba(212,168,77,0.15));
  text-align: center;
  color: var(--cgac-blue-deep);
  border: 1px dashed rgba(10,45,143,0.2);
}

.poster-placeholder span {
  display: block;
  font-size: 0.8rem;
  text-transform: uppercase;
  letter-spacing: 0.14em;
  color: var(--cgac-gold);
  margin-bottom: 0.7rem;
}

.poster-placeholder strong {
  font-size: clamp(1.4rem, 3vw, 2.4rem);
}

.programme-thumb,
.sermon-thumb {
  min-height: 210px;
  display: flex;
  align-items: end;
  padding: 1rem;
  color: #fff;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
}

.thumb-one { background: linear-gradient(135deg, #0b1d52, #4a7bbd); }
.thumb-two { background: linear-gradient(135deg, #0f3d94, #1d8cc7); }
.thumb-three { background: linear-gradient(135deg, #1f4f6b, #5e9ad4); }
.thumb-a { background: linear-gradient(135deg, #2d3f91, #d4a84d); }
.thumb-b { background: linear-gradient(135deg, #0a2d8f, #7a88d9); }
.thumb-c { background: linear-gradient(135deg, #133f67, #84a8d8); }

.programme-body,
.sermon-body {
  padding: 1.3rem 1.25rem 1.5rem;
}

.meta {
  margin: 0 0 0.7rem;
  text-transform: uppercase;
  letter-spacing: 0.12em;
  font-size: 0.7rem;
  color: var(--cgac-gold);
  font-weight: 800;
}

.programme-body ul,
.live-copy ul,
.content-block ul,
.give-grid ul {
  margin: 1rem 0 0;
  padding-left: 1.1rem;
  color: var(--cgac-muted);
}

.live-grid,
.give-grid {
  display: grid;
  grid-template-columns: 1.2fr 0.8fr;
  gap: 2rem;
  align-items: center;
}

.live-player {
  min-height: 420px;
  background: linear-gradient(135deg, rgba(10,45,143,0.7), rgba(10,45,143,0.95)), url('https://images.unsplash.com/photo-1516280440614-37939bbacd81?auto=format&fit=crop&w=1200&q=80') center/cover no-repeat;
  position: relative;
  border-radius: 28px;
  overflow: hidden;
}

.player-overlay {
  position: absolute;
  inset: 0;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding: 2rem;
  color: #fff;
  background: linear-gradient(180deg, rgba(0,0,0,0.04), rgba(0,0,0,0.45));
}

.live-pill {
  align-self: flex-start;
  background: #d73838;
  color: #fff;
  border-radius: 999px;
  padding: 0.4rem 0.75rem;
  font-size: 0.74rem;
  font-weight: 800;
  letter-spacing: 0.12em;
  text-transform: uppercase;
}

.player-overlay strong {
  font-size: clamp(2rem, 4vw, 3.2rem);
  margin-top: 0.8rem;
  font-family: 'Libre Baskerville', serif;
}

.quote-grid {
  grid-template-columns: repeat(3, minmax(0, 1fr));
}

.quote-card {
  padding: 1.5rem;
  color: var(--cgac-muted);
  font-size: 1.04rem;
  font-style: italic;
}

.giving-card {
  padding: 2rem;
}

.giving-list {
  display: flex;
  flex-wrap: wrap;
  gap: 0.7rem;
  margin: 1.25rem 0 1.5rem;
}

.giving-list span {
  background: rgba(10,45,143,0.06);
  color: var(--cgac-blue);
  border: 1px solid rgba(10,45,143,0.12);
  padding: 0.5rem 0.9rem;
  border-radius: 999px;
  font-weight: 700;
  font-size: 0.88rem;
}

.site-footer {
  background: #0b1230;
  color: rgba(255,255,255,0.8);
  padding-top: 3rem;
}

.footer-grid {
  display: grid;
  grid-template-columns: 1.4fr 1fr 1fr 1fr;
  gap: 2rem;
  padding-bottom: 2rem;
}

.footer-logo {
  width: 72px;
  height: 72px;
  border-radius: 50%;
  margin-bottom: 1rem;
}

.site-footer h3,
.site-footer h4 {
  color: #fff;
}

.site-footer ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.site-footer li {
  margin-bottom: 0.6rem;
}

.site-footer a {
  color: rgba(255,255,255,0.8);
}

.footer-bottom {
  border-top: 1px solid rgba(255,255,255,0.08);
  padding: 1rem 0 1.5rem;
  font-size: 0.9rem;
}

.inner-page {
  padding-bottom: 2rem;
}

.page-hero {
  background: linear-gradient(180deg, #f6f1e9 0%, #eef4fa 100%);
  padding: 4rem 0 2.5rem;
}

.narrow {
  max-width: 760px;
}

.content-block {
  background: #fff;
  border: 1px solid var(--cgac-border);
  border-radius: 22px;
  padding: 2rem;
  box-shadow: var(--shadow);
}

@media (max-width: 980px) {
  .nav-wrap,
  .main-nav,
  .nav-actions,
  .feature-grid,
  .programme-grid,
  .sermon-grid,
  .quote-grid,
  .split-layout,
  .hero-grid,
  .live-grid,
  .give-grid,
  .footer-grid {
    grid-template-columns: 1fr;
    display: grid;
  }

  .nav-wrap {
    padding: 1rem 0;
  }

  .main-nav,
  .nav-actions {
    justify-content: flex-start;
  }

  .topbar-inner {
    justify-content: center;
    text-align: center;
    padding: 0.4rem 0;
  }
}

@media (max-width: 640px) {
  .hero {
    padding-top: 3rem;
  }

  .hero-meta,
  .hero-actions {
    flex-direction: column;
    align-items: flex-start;
  }

  .section-space {
    padding: 4rem 0;
  }

  .btn {
    width: 100%;
  }
}
