<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inkwell — A Blog for Curious Minds</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --ink: #1a1410;
    --ink-soft: #4a4035;
    --ink-muted: #8a7e72;
    --cream: #faf8f4;
    --cream-dark: #f0ece4;
    --paper: #ffffff;
    --accent: #c0392b;
    --accent-soft: #e8d5d2;
    --gold: #b5860d;
    --gold-soft: #f5eddc;
    --teal: #1a6b5e;
    --teal-soft: #d4ede9;
    --border: rgba(26,20,16,0.12);
    --border-soft: rgba(26,20,16,0.06);
    --radius: 4px;
    --radius-lg: 8px;
    --shadow-sm: 0 1px 3px rgba(26,20,16,0.08);
    --shadow: 0 4px 16px rgba(26,20,16,0.10);
    --shadow-lg: 0 12px 40px rgba(26,20,16,0.14);
    --font-display: 'Playfair Display', Georgia, serif;
    --font-body: 'DM Sans', system-ui, sans-serif;
    --nav-h: 64px;
  }

  html { scroll-behavior: smooth; }
  body { font-family: var(--font-body); background: var(--cream); color: var(--ink); line-height: 1.6; }

  /* ── OVERLAY ── */
  #overlay { position: fixed; inset: 0; background: rgba(26,20,16,0.55); z-index: 200; opacity: 0; pointer-events: none; transition: opacity .25s; }
  #overlay.show { opacity: 1; pointer-events: auto; }

  /* ── MODAL ── */
  .modal { position: fixed; top: 50%; left: 50%; transform: translate(-50%,-44%) scale(.96); z-index: 300; background: var(--paper); border-radius: 12px; padding: 2.5rem; width: min(480px, 94vw); box-shadow: var(--shadow-lg); opacity: 0; pointer-events: none; transition: all .28s cubic-bezier(.22,.68,0,1.2); }
  .modal.show { opacity: 1; pointer-events: auto; transform: translate(-50%,-50%) scale(1); }
  .modal h2 { font-family: var(--font-display); font-size: 1.6rem; margin-bottom: .25rem; }
  .modal p.sub { color: var(--ink-muted); font-size: .875rem; margin-bottom: 1.5rem; }
  .modal label { display: block; font-size: .8rem; font-weight: 500; color: var(--ink-soft); margin-bottom: .35rem; margin-top: 1rem; letter-spacing: .04em; text-transform: uppercase; }
  .modal input { width: 100%; padding: .65rem .9rem; border: 1.5px solid var(--border); border-radius: var(--radius); font-family: var(--font-body); font-size: .95rem; background: var(--cream); color: var(--ink); transition: border-color .2s; outline: none; }
  .modal input:focus { border-color: var(--accent); background: var(--paper); }
  .modal .btn-primary { display: block; width: 100%; margin-top: 1.5rem; padding: .75rem; background: var(--ink); color: #fff; font-family: var(--font-body); font-size: .95rem; font-weight: 500; border: none; border-radius: var(--radius); cursor: pointer; letter-spacing: .02em; transition: background .2s; }
  .modal .btn-primary:hover { background: var(--accent); }
  .modal .switch-link { text-align: center; margin-top: 1rem; font-size: .85rem; color: var(--ink-muted); }
  .modal .switch-link a { color: var(--accent); text-decoration: none; font-weight: 500; cursor: pointer; }
  .modal .divider { display: flex; align-items: center; gap: .75rem; margin: 1.25rem 0; color: var(--ink-muted); font-size: .8rem; }
  .modal .divider::before, .modal .divider::after { content: ''; flex: 1; height: 1px; background: var(--border); }
  .modal .btn-social { width: 100%; padding: .65rem; border: 1.5px solid var(--border); border-radius: var(--radius); background: var(--paper); font-family: var(--font-body); font-size: .9rem; cursor: pointer; transition: background .2s, border-color .2s; display: flex; align-items: center; justify-content: center; gap: .6rem; }
  .modal .btn-social:hover { background: var(--cream); border-color: var(--ink-soft); }
  .modal-close { position: absolute; top: 1rem; right: 1rem; background: none; border: none; cursor: pointer; font-size: 1.4rem; color: var(--ink-muted); line-height: 1; padding: .25rem; }
  .modal-close:hover { color: var(--ink); }

  /* ── NAV ── */
  nav { position: sticky; top: 0; z-index: 100; height: var(--nav-h); background: rgba(250,248,244,.92); backdrop-filter: blur(10px); border-bottom: 1px solid var(--border); display: flex; align-items: center; }
  .nav-inner { max-width: 1200px; margin: 0 auto; padding: 0 2rem; width: 100%; display: flex; align-items: center; justify-content: space-between; }
  .logo { font-family: var(--font-display); font-size: 1.5rem; font-weight: 700; color: var(--ink); text-decoration: none; letter-spacing: -.02em; }
  .logo span { color: var(--accent); }
  .nav-links { display: flex; align-items: center; gap: 2rem; list-style: none; }
  .nav-links a { text-decoration: none; color: var(--ink-soft); font-size: .9rem; font-weight: 400; letter-spacing: .01em; transition: color .2s; }
  .nav-links a:hover { color: var(--ink); }
  .nav-actions { display: flex; align-items: center; gap: .75rem; }
  .btn-ghost { padding: .45rem .9rem; border: 1.5px solid var(--border); border-radius: var(--radius); background: none; font-family: var(--font-body); font-size: .875rem; font-weight: 500; cursor: pointer; color: var(--ink-soft); transition: all .2s; }
  .btn-ghost:hover { border-color: var(--ink); color: var(--ink); }
  .btn-solid { padding: .45rem 1rem; border-radius: var(--radius); background: var(--ink); color: #fff; font-family: var(--font-body); font-size: .875rem; font-weight: 500; border: none; cursor: pointer; transition: background .2s; }
  .btn-solid:hover { background: var(--accent); }
  .hamburger { display: none; flex-direction: column; gap: 5px; background: none; border: none; cursor: pointer; padding: .5rem; }
  .hamburger span { display: block; width: 22px; height: 2px; background: var(--ink); border-radius: 2px; transition: all .25s; }

  /* ── HERO ── */
  .hero { max-width: 1200px; margin: 0 auto; padding: 5rem 2rem 3rem; display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; }
  .hero-eyebrow { font-size: .75rem; font-weight: 600; letter-spacing: .12em; text-transform: uppercase; color: var(--accent); margin-bottom: .75rem; }
  .hero h1 { font-family: var(--font-display); font-size: clamp(2.4rem, 5vw, 3.8rem); line-height: 1.12; color: var(--ink); margin-bottom: 1.25rem; }
  .hero h1 em { font-style: italic; color: var(--accent); }
  .hero p { font-size: 1.05rem; color: var(--ink-muted); line-height: 1.75; margin-bottom: 2rem; max-width: 440px; }
  .hero-cta { display: flex; gap: .75rem; flex-wrap: wrap; }
  .btn-accent { padding: .7rem 1.4rem; background: var(--accent); color: #fff; border: none; border-radius: var(--radius); font-family: var(--font-body); font-size: .95rem; font-weight: 500; cursor: pointer; transition: background .2s, transform .15s; }
  .btn-accent:hover { background: #a93226; transform: translateY(-1px); }
  .btn-outline { padding: .7rem 1.4rem; border: 1.5px solid var(--border); background: none; border-radius: var(--radius); font-family: var(--font-body); font-size: .95rem; font-weight: 500; color: var(--ink-soft); cursor: pointer; transition: all .2s; }
  .btn-outline:hover { border-color: var(--ink); color: var(--ink); }
  .hero-visual { position: relative; }
  .hero-card { background: var(--paper); border-radius: 12px; padding: 2rem; box-shadow: var(--shadow-lg); border: 1px solid var(--border-soft); }
  .hero-tag { display: inline-block; background: var(--accent-soft); color: var(--accent); font-size: .72rem; font-weight: 600; letter-spacing: .08em; text-transform: uppercase; padding: .3rem .65rem; border-radius: 20px; margin-bottom: .75rem; }
  .hero-card h3 { font-family: var(--font-display); font-size: 1.25rem; line-height: 1.3; margin-bottom: .75rem; }
  .hero-card p { font-size: .875rem; color: var(--ink-muted); margin-bottom: 1rem; }
  .hero-meta { display: flex; align-items: center; gap: .75rem; }
  .avatar { width: 32px; height: 32px; border-radius: 50%; background: var(--ink); display: flex; align-items: center; justify-content: center; font-size: .7rem; font-weight: 600; color: #fff; }
  .hero-meta span { font-size: .8rem; color: var(--ink-muted); }
  .hero-meta strong { color: var(--ink-soft); font-weight: 500; }
  .hero-float { position: absolute; top: -1rem; right: -1.5rem; background: var(--paper); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: .75rem 1rem; box-shadow: var(--shadow); font-size: .8rem; font-weight: 500; color: var(--ink); display: flex; align-items: center; gap: .5rem; }
  .hero-float2 { position: absolute; bottom: -1rem; left: -1.5rem; background: var(--gold-soft); border: 1px solid rgba(181,134,13,.2); border-radius: var(--radius-lg); padding: .65rem 1rem; font-size: .78rem; font-weight: 500; color: var(--gold); display: flex; align-items: center; gap: .4rem; }

  /* ── TICKER ── */
  .ticker { background: var(--ink); color: #fff; padding: .6rem 0; overflow: hidden; white-space: nowrap; }
  .ticker-inner { display: inline-flex; gap: 3rem; animation: ticker 30s linear infinite; }
  .ticker-inner span { font-size: .78rem; letter-spacing: .05em; text-transform: uppercase; opacity: .7; }
  .ticker-inner span.dot { color: var(--accent); font-size: 1rem; opacity: 1; }
  @keyframes ticker { from { transform: translateX(0); } to { transform: translateX(-50%); } }

  /* ── SECTION ── */
  section { max-width: 1200px; margin: 0 auto; padding: 4rem 2rem; }
  .section-header { text-align: center; margin-bottom: 3rem; }
  .section-tag { font-size: .72rem; font-weight: 600; letter-spacing: .12em; text-transform: uppercase; color: var(--accent); margin-bottom: .5rem; }
  .section-header h2 { font-family: var(--font-display); font-size: clamp(1.8rem, 3vw, 2.4rem); color: var(--ink); margin-bottom: .75rem; }
  .section-header p { color: var(--ink-muted); max-width: 520px; margin: 0 auto; }

  /* ── CATEGORIES ── */
  .categories { display: flex; flex-wrap: wrap; justify-content: center; gap: .6rem; margin-bottom: 3rem; }
  .cat-pill { padding: .45rem 1rem; border: 1.5px solid var(--border); border-radius: 20px; font-size: .85rem; font-weight: 500; cursor: pointer; color: var(--ink-soft); background: none; font-family: var(--font-body); transition: all .2s; }
  .cat-pill:hover, .cat-pill.active { background: var(--ink); color: #fff; border-color: var(--ink); }

  /* ── POSTS GRID ── */
  .posts-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; }
  .post-card { background: var(--paper); border-radius: var(--radius-lg); border: 1px solid var(--border); overflow: hidden; transition: box-shadow .25s, transform .25s; cursor: pointer; }
  .post-card:hover { box-shadow: var(--shadow-lg); transform: translateY(-3px); }
  .post-thumb { height: 180px; background: var(--cream-dark); display: flex; align-items: center; justify-content: center; font-size: 3rem; position: relative; overflow: hidden; }
  .post-thumb .thumb-bg { position: absolute; inset: 0; opacity: .06; font-size: 8rem; display: flex; align-items: center; justify-content: center; }
  .post-body { padding: 1.25rem; }
  .post-tag { display: inline-block; font-size: .7rem; font-weight: 600; letter-spacing: .08em; text-transform: uppercase; padding: .25rem .6rem; border-radius: 20px; margin-bottom: .6rem; }
  .post-tag.design { background: var(--teal-soft); color: var(--teal); }
  .post-tag.tech { background: var(--accent-soft); color: var(--accent); }
  .post-tag.culture { background: var(--gold-soft); color: var(--gold); }
  .post-tag.science { background: #e8eef8; color: #1a4480; }
  .post-tag.lifestyle { background: #f0e8f5; color: #7b2d8b; }
  .post-card h3 { font-family: var(--font-display); font-size: 1.05rem; line-height: 1.35; color: var(--ink); margin-bottom: .5rem; }
  .post-card p { font-size: .85rem; color: var(--ink-muted); line-height: 1.6; margin-bottom: 1rem; }
  .post-footer { display: flex; align-items: center; justify-content: space-between; }
  .post-author { display: flex; align-items: center; gap: .5rem; }
  .post-author .av { width: 26px; height: 26px; border-radius: 50%; font-size: .65rem; display: flex; align-items: center; justify-content: center; font-weight: 600; color: #fff; }
  .av-1 { background: #c0392b; } .av-2 { background: #1a6b5e; } .av-3 { background: #b5860d; }
  .av-4 { background: #1a4480; } .av-5 { background: #7b2d8b; } .av-6 { background: #2d6b1a; }
  .post-author span { font-size: .78rem; color: var(--ink-muted); }
  .post-date { font-size: .75rem; color: var(--ink-muted); }
  .read-time { font-size: .72rem; color: var(--ink-muted); background: var(--cream-dark); padding: .2rem .5rem; border-radius: 20px; }

  /* ── FEATURED ── */
  .featured { background: var(--paper); border-radius: 12px; border: 1px solid var(--border); overflow: hidden; display: grid; grid-template-columns: 1fr 1fr; box-shadow: var(--shadow); }
  .featured-img { background: linear-gradient(135deg, #1a1410 0%, #3a2a1a 100%); min-height: 320px; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; }
  .featured-img-text { font-family: var(--font-display); font-size: 5rem; color: rgba(255,255,255,.08); user-select: none; }
  .featured-badge { position: absolute; top: 1.5rem; left: 1.5rem; background: var(--accent); color: #fff; font-size: .7rem; font-weight: 600; letter-spacing: .1em; text-transform: uppercase; padding: .3rem .7rem; border-radius: 20px; }
  .featured-content { padding: 2.5rem; display: flex; flex-direction: column; justify-content: center; }
  .featured-content .post-tag { margin-bottom: .75rem; }
  .featured-content h2 { font-family: var(--font-display); font-size: 1.6rem; line-height: 1.25; color: var(--ink); margin-bottom: .75rem; }
  .featured-content p { font-size: .925rem; color: var(--ink-muted); line-height: 1.7; margin-bottom: 1.5rem; }
  .featured-footer { display: flex; align-items: center; justify-content: space-between; }
  .featured-author { display: flex; align-items: center; gap: .6rem; }
  .featured-author .av { width: 36px; height: 36px; border-radius: 50%; font-size: .8rem; display: flex; align-items: center; justify-content: center; font-weight: 600; color: #fff; background: var(--accent); }
  .featured-author strong { font-size: .9rem; color: var(--ink); font-weight: 500; display: block; }
  .featured-author span { font-size: .78rem; color: var(--ink-muted); }
  .read-btn { display: inline-flex; align-items: center; gap: .4rem; padding: .55rem 1rem; background: var(--ink); color: #fff; border: none; border-radius: var(--radius); font-family: var(--font-body); font-size: .85rem; font-weight: 500; cursor: pointer; transition: background .2s; }
  .read-btn:hover { background: var(--accent); }

  /* ── NEWSLETTER ── */
  .newsletter-section { background: var(--ink); border-radius: 12px; padding: 3.5rem; text-align: center; color: #fff; margin: 0 2rem; }
  .newsletter-section h2 { font-family: var(--font-display); font-size: 2rem; margin-bottom: .5rem; }
  .newsletter-section p { color: rgba(255,255,255,.6); margin-bottom: 2rem; }
  .newsletter-form { display: flex; gap: .75rem; max-width: 460px; margin: 0 auto; }
  .newsletter-form input { flex: 1; padding: .7rem 1rem; border: 1.5px solid rgba(255,255,255,.15); border-radius: var(--radius); background: rgba(255,255,255,.08); color: #fff; font-family: var(--font-body); font-size: .95rem; outline: none; }
  .newsletter-form input::placeholder { color: rgba(255,255,255,.35); }
  .newsletter-form input:focus { border-color: var(--accent); }
  .newsletter-form button { padding: .7rem 1.4rem; background: var(--accent); color: #fff; border: none; border-radius: var(--radius); font-family: var(--font-body); font-size: .9rem; font-weight: 500; cursor: pointer; white-space: nowrap; transition: background .2s; }
  .newsletter-form button:hover { background: #e74c3c; }
  .newsletter-note { font-size: .75rem; color: rgba(255,255,255,.35); margin-top: 1rem; }

  /* ── WRITERS ── */
  .writers-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; }
  .writer-card { text-align: center; padding: 1.5rem 1rem; background: var(--paper); border: 1px solid var(--border); border-radius: var(--radius-lg); transition: box-shadow .25s; }
  .writer-card:hover { box-shadow: var(--shadow); }
  .writer-av { width: 60px; height: 60px; border-radius: 50%; margin: 0 auto .75rem; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; font-weight: 700; color: #fff; }
  .writer-card h4 { font-size: .95rem; font-weight: 500; color: var(--ink); margin-bottom: .2rem; }
  .writer-card .role { font-size: .78rem; color: var(--ink-muted); margin-bottom: .75rem; }
  .writer-card .posts-count { font-size: .72rem; font-weight: 600; letter-spacing: .04em; color: var(--ink-muted); }
  .follow-btn { display: inline-block; margin-top: .6rem; padding: .3rem .8rem; border: 1.5px solid var(--border); border-radius: 20px; font-size: .75rem; font-weight: 500; color: var(--ink-soft); background: none; cursor: pointer; font-family: var(--font-body); transition: all .2s; }
  .follow-btn:hover { background: var(--ink); color: #fff; border-color: var(--ink); }

  /* ── TRENDING ── */
  .trending-list { display: flex; flex-direction: column; gap: 1rem; }
  .trending-item { display: flex; gap: 1.25rem; align-items: flex-start; padding: 1rem; background: var(--paper); border: 1px solid var(--border); border-radius: var(--radius-lg); transition: box-shadow .2s; }
  .trending-item:hover { box-shadow: var(--shadow-sm); }
  .trending-num { font-family: var(--font-display); font-size: 2rem; color: var(--cream-dark); font-weight: 700; min-width: 2rem; line-height: 1; }
  .trending-body h4 { font-size: .95rem; font-weight: 500; color: var(--ink); margin-bottom: .2rem; line-height: 1.35; }
  .trending-body span { font-size: .78rem; color: var(--ink-muted); }
  .trending-tag { margin-left: .5rem; }

  /* ── SIDEBAR ── */
  .content-grid { display: grid; grid-template-columns: 1fr 320px; gap: 3rem; }
  .sidebar { }
  .sidebar-widget { background: var(--paper); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 1.5rem; margin-bottom: 1.5rem; }
  .sidebar-widget h4 { font-size: .72rem; font-weight: 600; letter-spacing: .1em; text-transform: uppercase; color: var(--ink-muted); margin-bottom: 1rem; padding-bottom: .5rem; border-bottom: 1px solid var(--border); }
  .tag-cloud { display: flex; flex-wrap: wrap; gap: .5rem; }
  .tag { padding: .3rem .7rem; border: 1px solid var(--border); border-radius: 20px; font-size: .78rem; color: var(--ink-soft); cursor: pointer; transition: all .2s; }
  .tag:hover { background: var(--ink); color: #fff; border-color: var(--ink); }
  .search-box { display: flex; border: 1.5px solid var(--border); border-radius: var(--radius); overflow: hidden; }
  .search-box input { flex: 1; padding: .6rem .9rem; border: none; font-family: var(--font-body); font-size: .9rem; background: none; color: var(--ink); outline: none; }
  .search-box button { padding: .6rem .9rem; background: var(--ink); color: #fff; border: none; cursor: pointer; font-size: .85rem; transition: background .2s; }
  .search-box button:hover { background: var(--accent); }

  /* ── STATS ── */
  .stats-bar { background: var(--cream-dark); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); padding: 2.5rem 2rem; }
  .stats-inner { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(4,1fr); gap: 2rem; text-align: center; }
  .stat h3 { font-family: var(--font-display); font-size: 2.2rem; color: var(--ink); margin-bottom: .2rem; }
  .stat p { font-size: .83rem; color: var(--ink-muted); font-weight: 400; }

  /* ── FOOTER ── */
  footer { background: var(--ink); color: rgba(255,255,255,.6); padding: 4rem 2rem 2rem; margin-top: 4rem; }
  .footer-inner { max-width: 1200px; margin: 0 auto; }
  .footer-top { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 3rem; margin-bottom: 3rem; }
  .footer-brand .logo { color: #fff; display: block; margin-bottom: .75rem; }
  .footer-brand p { font-size: .875rem; line-height: 1.7; max-width: 260px; }
  .footer-col h5 { font-size: .72rem; font-weight: 600; letter-spacing: .1em; text-transform: uppercase; color: rgba(255,255,255,.4); margin-bottom: .75rem; }
  .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: .5rem; }
  .footer-col a { text-decoration: none; color: rgba(255,255,255,.5); font-size: .875rem; transition: color .2s; }
  .footer-col a:hover { color: #fff; }
  .footer-bottom { border-top: 1px solid rgba(255,255,255,.08); padding-top: 1.5rem; display: flex; justify-content: space-between; align-items: center; }
  .footer-bottom p { font-size: .8rem; }
  .social-links { display: flex; gap: .75rem; }
  .social-links a { width: 32px; height: 32px; border-radius: 50%; border: 1px solid rgba(255,255,255,.15); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,.5); text-decoration: none; font-size: .78rem; font-weight: 600; transition: all .2s; }
  .social-links a:hover { border-color: var(--accent); color: var(--accent); }

  /* ── TOAST ── */
  #toast { position: fixed; bottom: 2rem; right: 2rem; background: var(--ink); color: #fff; padding: .75rem 1.25rem; border-radius: var(--radius-lg); font-size: .875rem; z-index: 500; transform: translateY(100px); opacity: 0; transition: all .3s; box-shadow: var(--shadow-lg); display: flex; align-items: center; gap: .5rem; }
  #toast.show { transform: translateY(0); opacity: 1; }
  #toast .t-icon { background: #2ecc71; width: 18px; height: 18px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: .65rem; }

  /* ── RESPONSIVE ── */
  @media (max-width: 900px) {
    .hero { grid-template-columns: 1fr; gap: 2rem; }
    .hero-float, .hero-float2 { display: none; }
    .posts-grid { grid-template-columns: 1fr 1fr; }
    .featured { grid-template-columns: 1fr; }
    .featured-img { min-height: 200px; }
    .writers-grid { grid-template-columns: 1fr 1fr; }
    .content-grid { grid-template-columns: 1fr; }
    .stats-inner { grid-template-columns: 1fr 1fr; }
    .footer-top { grid-template-columns: 1fr 1fr; }
    .nav-links { display: none; }
    .hamburger { display: flex; }
  }
  @media (max-width: 600px) {
    .posts-grid { grid-template-columns: 1fr; }
    .writers-grid { grid-template-columns: 1fr 1fr; }
    .newsletter-form { flex-direction: column; }
    .stats-inner { grid-template-columns: 1fr 1fr; }
    .footer-top { grid-template-columns: 1fr; }
    .footer-bottom { flex-direction: column; gap: 1rem; }
  }
</style>
</head>
<body>

<!-- Overlay -->
<div id="overlay" onclick="closeModals()"></div>

<!-- Login Modal -->
<div class="modal" id="loginModal">
  <button class="modal-close" onclick="closeModals()">×</button>
  <h2>Welcome back</h2>
  <p class="sub">Sign in to continue reading and writing.</p>
  <button class="btn-social" onclick="showToast('Google sign-in coming soon!')">
    <svg width="16" height="16" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
    Continue with Google
  </button>
  <div class="divider">or sign in with email</div>
  <label>Email address</label>
  <input type="email" placeholder="you@example.com">
  <label>Password</label>
  <input type="password" placeholder="••••••••">
  <button class="btn-primary" onclick="handleLogin()">Sign in</button>
  <p class="switch-link">No account? <a onclick="switchModal('signupModal')">Create one free →</a></p>
</div>

<!-- Signup Modal -->
<div class="modal" id="signupModal">
  <button class="modal-close" onclick="closeModals()">×</button>
  <h2>Join Inkwell</h2>
  <p class="sub">Read, write, and connect with curious minds.</p>
  <button class="btn-social" onclick="showToast('Google sign-up coming soon!')">
    <svg width="16" height="16" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
    Sign up with Google
  </button>
  <div class="divider">or use email</div>
  <label>Full name</label>
  <input type="text" placeholder="Ada Lovelace">
  <label>Email address</label>
  <input type="email" placeholder="you@example.com">
  <label>Password</label>
  <input type="password" placeholder="8+ characters">
  <button class="btn-primary" onclick="handleSignup()">Create free account</button>
  <p class="switch-link">Already a member? <a onclick="switchModal('loginModal')">Sign in</a></p>
</div>

<!-- Toast -->
<div id="toast"><span class="t-icon">✓</span><span id="toast-msg">Done!</span></div>

<!-- Navigation -->
<nav>
  <div class="nav-inner">
    <a href="#" class="logo">Ink<span>well</span></a>
    <ul class="nav-links">
      <li><a href="#articles">Articles</a></li>
      <li><a href="#writers">Writers</a></li>
      <li><a href="#trending">Trending</a></li>
      <li><a href="#newsletter">Newsletter</a></li>
      <li><a href="#">About</a></li>
    </ul>
    <div class="nav-actions">
      <a class="btn-ghost" href="{{url('register')}}">Sign in</a>
      <button class="btn-solid" onclick="openModal('signupModal')">Get started</button>
    </div>
    <button class="hamburger" onclick="toggleMenu()" id="hamburger">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- Ticker -->
<div class="ticker">
  <div class="ticker-inner" id="ticker-track">
    <span>Design</span><span class="dot">✦</span><span>Technology</span><span class="dot">✦</span><span>Science</span><span class="dot">✦</span><span>Culture</span><span class="dot">✦</span><span>Lifestyle</span><span class="dot">✦</span><span>Philosophy</span><span class="dot">✦</span><span>Innovation</span><span class="dot">✦</span><span>History</span><span class="dot">✦</span><span>Art</span><span class="dot">✦</span><span>Writing</span><span class="dot">✦</span>
    <span>Design</span><span class="dot">✦</span><span>Technology</span><span class="dot">✦</span><span>Science</span><span class="dot">✦</span><span>Culture</span><span class="dot">✦</span><span>Lifestyle</span><span class="dot">✦</span><span>Philosophy</span><span class="dot">✦</span><span>Innovation</span><span class="dot">✦</span><span>History</span><span class="dot">✦</span><span>Art</span><span class="dot">✦</span><span>Writing</span><span class="dot">✦</span>
  </div>
</div>

<!-- Hero -->
<div class="hero">
  <div class="hero-text">
    <p class="hero-eyebrow">✦ Est. 2024 — Independent Publishing</p>
    <h1>Words that make you <em>think</em> twice</h1>
    <p>Inkwell is a home for thoughtful writing on design, technology, culture, and everything in between. No noise — just stories worth your time.</p>
    <div class="hero-cta">
      <button class="btn-accent" onclick="openModal('signupModal')">Start reading free</button>
      <button class="btn-outline" onclick="document.querySelector('#articles').scrollIntoView({behavior:'smooth'})">Explore articles ↓</button>
    </div>
  </div>
  <div class="hero-visual">
    <div class="hero-float">📖 &nbsp;42 articles this month</div>
    <div class="hero-card">
      <span class="hero-tag">Editor's Pick</span>
      <h3>The quiet revolution of slow media in a distracted world</h3>
      <p>How a generation raised on feeds is finding meaning in long-form writing again.</p>
      <div class="hero-meta">
        <div class="avatar">SR</div>
        <div><strong>Sofia Ramirez</strong> <span>· 8 min read</span></div>
      </div>
    </div>
    <div class="hero-float2">⭐ &nbsp;Top pick this week</div>
  </div>
</div>

<!-- Stats Bar -->
<div class="stats-bar">
  <div class="stats-inner">
    <div class="stat"><h3>48K+</h3><p>Monthly readers</p></div>
    <div class="stat"><h3>320</h3><p>Published articles</p></div>
    <div class="stat"><h3>86</h3><p>Contributing writers</p></div>
    <div class="stat"><h3>12K+</h3><p>Newsletter subscribers</p></div>
  </div>
</div>

<!-- Featured Article -->
<section>
  <div class="section-header">
    <p class="section-tag">✦ Featured this week</p>
    <h2>The story worth reading</h2>
  </div>
  <div class="featured">
    <div class="featured-img">
      <div class="featured-img-text">✍</div>
      <span class="featured-badge">🔥 Trending</span>
    </div>
    <div class="featured-content">
      <span class="post-tag design">Design</span>
      <h2>Why the best interfaces are the ones you never notice</h2>
      <p>Great design disappears. It asks nothing of you and gives you everything. This is the story of invisible design — and why the most powerful tools feel effortless.</p>
      <div class="featured-footer">
        <div class="featured-author">
          <div class="av">JK</div>
          <div>
            <strong>James Kato</strong>
            <span>Apr 28 · 12 min read</span>
          </div>
        </div>
        <button class="read-btn" onclick="showToast('Opening article...')">Read now →</button>
      </div>
    </div>
  </div>
</section>

<!-- Articles + Sidebar -->
<section id="articles">
  <div class="content-grid">
    <div>
      <div class="section-header" style="text-align:left; margin-bottom:1.5rem;">
        <p class="section-tag">✦ Latest articles</p>
        <h2>Fresh from the press</h2>
      </div>
      <div class="categories" style="justify-content:flex-start;">
        <button class="cat-pill active" onclick="filterCat(this,'all')">All</button>
        <button class="cat-pill" onclick="filterCat(this,'design')">Design</button>
        <button class="cat-pill" onclick="filterCat(this,'tech')">Technology</button>
        <button class="cat-pill" onclick="filterCat(this,'culture')">Culture</button>
        <button class="cat-pill" onclick="filterCat(this,'science')">Science</button>
        <button class="cat-pill" onclick="filterCat(this,'lifestyle')">Lifestyle</button>
      </div>
      <div class="posts-grid" id="postsGrid">
        <!-- JS renders posts -->
      </div>
    </div>
    <aside class="sidebar" id="trending">
      <div class="sidebar-widget">
        <h4>Search</h4>
        <div class="search-box">
          <input type="text" placeholder="Search articles...">
          <button onclick="showToast('Searching...')">🔍</button>
        </div>
      </div>
      <div class="sidebar-widget">
        <h4>Trending this week</h4>
        <div class="trending-list">
          <div class="trending-item">
            <span class="trending-num">01</span>
            <div class="trending-body">
              <h4>The case for doing less</h4>
              <span>Culture</span> <span class="trending-tag">· 5 min read</span>
            </div>
          </div>
          <div class="trending-item">
            <span class="trending-num">02</span>
            <div class="trending-body">
              <h4>AI and the end of boredom</h4>
              <span>Technology</span> <span class="trending-tag">· 9 min read</span>
            </div>
          </div>
          <div class="trending-item">
            <span class="trending-num">03</span>
            <div class="trending-body">
              <h4>Color theory for non-designers</h4>
              <span>Design</span> <span class="trending-tag">· 7 min read</span>
            </div>
          </div>
          <div class="trending-item">
            <span class="trending-num">04</span>
            <div class="trending-body">
              <h4>The longevity science nobody talks about</h4>
              <span>Science</span> <span class="trending-tag">· 11 min read</span>
            </div>
          </div>
        </div>
      </div>
      <div class="sidebar-widget">
        <h4>Popular tags</h4>
        <div class="tag-cloud">
          <span class="tag">Design</span><span class="tag">AI</span><span class="tag">Writing</span>
          <span class="tag">Productivity</span><span class="tag">Mental health</span><span class="tag">Future</span>
          <span class="tag">Books</span><span class="tag">Science</span><span class="tag">Culture</span>
          <span class="tag">Philosophy</span><span class="tag">Minimalism</span>
        </div>
      </div>
      <div class="sidebar-widget" style="background: var(--ink); color: #fff; border-color: transparent;">
        <h4 style="color:rgba(255,255,255,.4);">Newsletter</h4>
        <p style="font-size:.875rem; color:rgba(255,255,255,.65); margin-bottom:1rem; line-height:1.6;">Get the best stories every Sunday morning.</p>
        <input type="email" placeholder="your@email.com" style="width:100%; padding:.6rem .9rem; border:1.5px solid rgba(255,255,255,.2); border-radius:4px; background:rgba(255,255,255,.08); color:#fff; font-family:var(--font-body); font-size:.875rem; outline:none; margin-bottom:.5rem;">
        <button onclick="showToast('Subscribed! Welcome to Inkwell 🎉')" style="width:100%; padding:.6rem; background:var(--accent); color:#fff; border:none; border-radius:4px; font-family:var(--font-body); font-size:.875rem; font-weight:500; cursor:pointer;">Subscribe free</button>
      </div>
    </aside>
  </div>
</section>

<!-- Writers -->
<section id="writers">
  <div class="section-header">
    <p class="section-tag">✦ Our writers</p>
    <h2>Voices you'll want to follow</h2>
    <p>Thinkers, makers, and storytellers sharing what they know.</p>
  </div>
  <div class="writers-grid">
    <div class="writer-card">
      <div class="writer-av" style="background:#c0392b;">SR</div>
      <h4>Sofia Ramirez</h4>
      <p class="role">Tech & Culture</p>
      <p class="posts-count">24 articles published</p>
      <button class="follow-btn" onclick="showToast('Following Sofia Ramirez!')">+ Follow</button>
    </div>
    <div class="writer-card">
      <div class="writer-av" style="background:#1a6b5e;">JK</div>
      <h4>James Kato</h4>
      <p class="role">Design & UX</p>
      <p class="posts-count">18 articles published</p>
      <button class="follow-btn" onclick="showToast('Following James Kato!')">+ Follow</button>
    </div>
    <div class="writer-card">
      <div class="writer-av" style="background:#b5860d;">MP</div>
      <h4>Maya Patel</h4>
      <p class="role">Science & Health</p>
      <p class="posts-count">31 articles published</p>
      <button class="follow-btn" onclick="showToast('Following Maya Patel!')">+ Follow</button>
    </div>
    <div class="writer-card">
      <div class="writer-av" style="background:#1a4480;">AO</div>
      <h4>Ade Okonkwo</h4>
      <p class="role">Philosophy & Ideas</p>
      <p class="posts-count">15 articles published</p>
      <button class="follow-btn" onclick="showToast('Following Ade Okonkwo!')">+ Follow</button>
    </div>
  </div>
</section>

<!-- Newsletter -->
<div style="max-width:1200px; margin:0 auto; padding: 0 2rem;">
  <div class="newsletter-section" id="newsletter">
    <p class="section-tag" style="color:rgba(255,255,255,.5); margin-bottom:.5rem;">✦ Stay in the loop</p>
    <h2>Stories for curious minds</h2>
    <p>Join 12,000+ readers who get the best of Inkwell every week.</p>
    <div class="newsletter-form">
      <input type="email" placeholder="Enter your email address">
      <button onclick="showToast('Subscribed! Welcome to Inkwell 🎉')">Subscribe free →</button>
    </div>
    <p class="newsletter-note">No spam. Unsubscribe anytime. We respect your inbox.</p>
  </div>
</div>

<!-- Write for Us -->
<section style="text-align:center; padding:4rem 2rem;">
  <p class="section-tag">✦ Contribute</p>
  <h2 style="font-family:var(--font-display); font-size:2rem; margin-bottom:.75rem;">Have a story to tell?</h2>
  <p style="color:var(--ink-muted); margin-bottom:2rem; max-width:440px; margin-left:auto; margin-right:auto;">We welcome writers of all backgrounds. If you've got a perspective worth sharing, we'd love to hear from you.</p>
  <button class="btn-accent" onclick="openModal('signupModal')">Apply to write for us →</button>
</section>

<!-- Footer -->
<footer>
  <div class="footer-inner">
    <div class="footer-top">
      <div class="footer-brand">
        <a href="#" class="logo">Ink<span style="color:var(--accent)">well</span></a>
        <p>Independent publishing for curious minds. We believe great writing changes how you see the world.</p>
      </div>
      <div class="footer-col">
        <h5>Explore</h5>
        <ul>
          <li><a href="#">Latest articles</a></li>
          <li><a href="#">Featured stories</a></li>
          <li><a href="#">Trending</a></li>
          <li><a href="#">Collections</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h5>Company</h5>
        <ul>
          <li><a href="#">About Inkwell</a></li>
          <li><a href="#">Write for us</a></li>
          <li><a href="#">Advertise</a></li>
          <li><a href="#">Careers</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h5>Legal</h5>
        <ul>
          <li><a href="#">Privacy policy</a></li>
          <li><a href="#">Terms of service</a></li>
          <li><a href="#">Cookie policy</a></li>
          <li><a href="#">Contact us</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2024 Inkwell. All rights reserved.</p>
      <div class="social-links">
        <a href="#" title="Twitter">𝕏</a>
        <a href="#" title="LinkedIn">in</a>
        <a href="#" title="Instagram">ig</a>
        <a href="#" title="RSS">⌂</a>
      </div>
    </div>
  </div>
</footer>

<script>
const posts = [
  { cat:'design', tag:'Design', tagClass:'design', emoji:'✏️', title:'The invisible grid: how layout shapes meaning', excerpt:'Every great design rests on a structure you never see. We trace the hidden geometry behind iconic pages.', author:'JK', avClass:'av-2', name:'James Kato', date:'May 3', mins:7 },
  { cat:'tech', tag:'Technology', tagClass:'tech', emoji:'⚡', title:'The terminal isn't dead: why developers love the command line', excerpt:'In a world of GUIs, the humble command line endures — and thrives. Here's why it refuses to go away.', author:'SR', avClass:'av-1', name:'Sofia Ramirez', date:'May 1', mins:9 },
  { cat:'culture', tag:'Culture', tagClass:'culture', emoji:'🎭', title:'Reading in public: a small act of quiet rebellion', excerpt:'To read a physical book in the age of screens is to make a statement — even if you never meant to.', author:'AO', avClass:'av-4', name:'Ade Okonkwo', date:'Apr 30', mins:5 },
  { cat:'science', tag:'Science', tagClass:'science', emoji:'🔬', title:'The gut-brain axis: your second mind explained', excerpt:'Scientists are discovering that your digestive system communicates with your brain in surprising ways.', author:'MP', avClass:'av-3', name:'Maya Patel', date:'Apr 28', mins:11 },
  { cat:'lifestyle', tag:'Lifestyle', tagClass:'lifestyle', emoji:'🌿', title:'Digital minimalism: what I learned from 30 days offline', excerpt:'I deleted every app and disconnected for a month. What came back wasn't the same person who left.', author:'SR', avClass:'av-1', name:'Sofia Ramirez', date:'Apr 25', mins:8 },
  { cat:'design', tag:'Design', tagClass:'design', emoji:'🎨', title:'Typography rules that even non-designers should know', excerpt:'A few fundamental principles that will change how you read — and how you present — everything.', author:'JK', avClass:'av-2', name:'James Kato', date:'Apr 23', mins:6 },
];

function renderPosts(filter='all') {
  const grid = document.getElementById('postsGrid');
  const filtered = filter==='all' ? posts : posts.filter(p=>p.cat===filter);
  grid.innerHTML = filtered.map(p=>`
    <div class="post-card" onclick="showToast('Opening: ${p.title.substring(0,30)}...')">
      <div class="post-thumb">
        <div class="thumb-bg">${p.emoji}</div>
        <span style="font-size:2.5rem;position:relative;z-index:1">${p.emoji}</span>
      </div>
      <div class="post-body">
        <span class="post-tag ${p.tagClass}">${p.tag}</span>
        <h3>${p.title}</h3>
        <p>${p.excerpt}</p>
        <div class="post-footer">
          <div class="post-author">
            <div class="av ${p.avClass}">${p.author}</div>
            <span>${p.name}</span>
          </div>
          <div style="display:flex;flex-direction:column;align-items:flex-end;gap:.2rem">
            <span class="post-date">${p.date}</span>
            <span class="read-time">${p.mins} min</span>
          </div>
        </div>
      </div>
    </div>
  `).join('');
}
renderPosts();

function filterCat(btn, cat) {
  document.querySelectorAll('.cat-pill').forEach(b=>b.classList.remove('active'));
  btn.classList.add('active');
  renderPosts(cat);
}

function openModal(id) {
  document.getElementById('overlay').classList.add('show');
  document.getElementById(id).classList.add('show');
}
function closeModals() {
  document.getElementById('overlay').classList.remove('show');
  document.querySelectorAll('.modal').forEach(m=>m.classList.remove('show'));
}
function switchModal(id) {
  document.querySelectorAll('.modal').forEach(m=>m.classList.remove('show'));
  document.getElementById(id).classList.add('show');
}

function handleLogin() { closeModals(); showToast('Signed in successfully! Welcome back 👋'); }
function handleSignup() { closeModals(); showToast('Account created! Welcome to Inkwell 🎉'); }

let toastTimer;
function showToast(msg) {
  const t = document.getElementById('toast');
  document.getElementById('toast-msg').textContent = msg;
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(()=>t.classList.remove('show'), 3000);
}

function toggleMenu() {
  const links = document.querySelector('.nav-links');
  links.style.display = links.style.display === 'flex' ? 'none' : 'flex';
  links.style.flexDirection = 'column';
  links.style.position = 'absolute';
  links.style.top = '64px';
  links.style.left = '0';
  links.style.right = '0';
  links.style.background = 'var(--cream)';
  links.style.padding = '1.5rem 2rem';
  links.style.borderBottom = '1px solid var(--border)';
  links.style.zIndex = '99';
}
</script>
</body>
</html>