<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'STEM Hub')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Mono:wght@300;400;500&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg:        #F7F6F2;
            --surface:   #FFFFFF;
            --border:    #E2E0D8;
            --text:      #1A1A18;
            --muted:     #6B6B65;
            --accent:    #1A1A18;
            --tag-sci:   #D4ECD4;
            --tag-tech:  #D4E4F5;
            --tag-eng:   #F5E8D4;
            --tag-math:  #EDD4F5;
            --radius:    6px;
            --mono: 'DM Mono', monospace;
            --serif: 'DM Serif Display', serif;
            --sans: 'DM Sans', sans-serif;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { font-size: 16px; }
        body {
            font-family: var(--sans);
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            line-height: 1.7;
        }

        /* NAV */
        nav {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .nav-inner {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            height: 56px;
            gap: 0;
        }
        .nav-brand {
            font-family: var(--mono);
            font-weight: 500;
            font-size: 0.85rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            text-decoration: none;
            color: var(--text);
            margin-right: 2.5rem;
            flex-shrink: 0;
        }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 0;
            flex: 1;
        }
        .nav-links a {
            font-family: var(--mono);
            font-size: 0.78rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            text-decoration: none;
            color: var(--muted);
            padding: 0 1rem;
            height: 56px;
            display: flex;
            align-items: center;
            border-bottom: 2px solid transparent;
            transition: color 0.15s, border-color 0.15s;
        }
        .nav-links a:hover,
        .nav-links a.active { color: var(--text); border-bottom-color: var(--text); }
        .nav-tag {
            display: inline-block;
            font-family: var(--mono);
            font-size: 0.62rem;
            letter-spacing: 0.06em;
            padding: 2px 6px;
            border-radius: 3px;
            margin-left: 5px;
            vertical-align: middle;
        }
        .tag-s { background: var(--tag-sci); color: #2d6b2d; }
        .tag-t { background: var(--tag-tech); color: #1d4d7a; }
        .tag-e { background: var(--tag-eng); color: #7a4d1d; }
        .tag-m { background: var(--tag-math); color: #5b1d7a; }

        .nav-auth {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-left: auto;
        }
        .nav-auth a, .nav-auth button {
            font-family: var(--mono);
            font-size: 0.75rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            text-decoration: none;
            color: var(--muted);
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            transition: color 0.15s;
        }
        .nav-auth a:hover, .nav-auth button:hover { color: var(--text); }
        .btn-nav-primary {
            background: var(--text) !important;
            color: var(--bg) !important;
            padding: 6px 14px !important;
            border-radius: var(--radius) !important;
            border: none !important;
        }
        .nav-user {
            font-family: var(--mono);
            font-size: 0.72rem;
            color: var(--muted);
            letter-spacing: 0.04em;
        }

        /* MAIN */
        main { max-width: 1100px; margin: 0 auto; padding: 3rem 2rem 6rem; }

        /* HERO */
        .hero {
            padding: 5rem 0 4rem;
            border-bottom: 1px solid var(--border);
            margin-bottom: 4rem;
        }
        .hero-label {
            font-family: var(--mono);
            font-size: 0.72rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 1.25rem;
        }
        .hero h1 {
            font-family: var(--serif);
            font-size: clamp(2.8rem, 6vw, 5rem);
            font-weight: 400;
            line-height: 1.1;
            letter-spacing: -0.02em;
            margin-bottom: 1.5rem;
            max-width: 700px;
        }
        .hero h1 em { font-style: italic; }
        .hero-sub {
            font-size: 1rem;
            color: var(--muted);
            max-width: 480px;
            line-height: 1.7;
            margin-bottom: 2.5rem;
        }
        .hero-actions { display: flex; gap: 0.75rem; flex-wrap: wrap; }
        .btn {
            display: inline-block;
            font-family: var(--mono);
            font-size: 0.8rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            cursor: pointer;
            transition: all 0.15s;
            background: transparent;
            color: var(--text);
        }
        .btn:hover { background: var(--border); }
        .btn-dark {
            background: var(--text);
            color: var(--bg);
            border-color: var(--text);
        }
        .btn-dark:hover { background: #333; border-color: #333; }

        /* GRID CARDS */
        .section-label {
            font-family: var(--mono);
            font-size: 0.72rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid var(--border);
        }
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1px;
            background: var(--border);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            margin-bottom: 4rem;
        }
        .card {
            background: var(--surface);
            padding: 1.75rem;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            transition: background 0.15s;
            position: relative;
        }
        .card:hover { background: var(--bg); }
        .card-tag {
            font-family: var(--mono);
            font-size: 0.65rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 3px 8px;
            border-radius: 3px;
            align-self: flex-start;
        }
        .card h3 {
            font-family: var(--serif);
            font-size: 1.25rem;
            font-weight: 400;
            line-height: 1.3;
        }
        .card p { font-size: 0.9rem; color: var(--muted); line-height: 1.6; }
        .card-arrow {
            font-family: var(--mono);
            font-size: 0.8rem;
            color: var(--muted);
            margin-top: auto;
        }

        /* ARTICLE PAGE */
        .article-header {
            padding: 3rem 0 2.5rem;
            border-bottom: 1px solid var(--border);
            margin-bottom: 3rem;
        }
        .article-header .back {
            font-family: var(--mono);
            font-size: 0.75rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--muted);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            margin-bottom: 1.5rem;
            transition: color 0.15s;
        }
        .article-header .back:hover { color: var(--text); }
        .article-header h1 {
            font-family: var(--serif);
            font-size: clamp(2rem, 4vw, 3.2rem);
            font-weight: 400;
            line-height: 1.15;
            max-width: 700px;
            margin-bottom: 1rem;
        }
        .article-meta {
            font-family: var(--mono);
            font-size: 0.72rem;
            letter-spacing: 0.06em;
            color: var(--muted);
        }
        .article-body {
            max-width: 680px;
        }
        .article-body h2 {
            font-family: var(--serif);
            font-size: 1.6rem;
            font-weight: 400;
            margin: 2.5rem 0 0.75rem;
        }
        .article-body h3 {
            font-family: var(--sans);
            font-size: 1rem;
            font-weight: 500;
            margin: 2rem 0 0.5rem;
            letter-spacing: 0.01em;
        }
        .article-body p { margin-bottom: 1.2rem; font-size: 1rem; color: #2c2c28; line-height: 1.8; }
        .article-body ul, .article-body ol {
            margin: 0 0 1.2rem 1.4rem;
            font-size: 1rem;
            color: #2c2c28;
            line-height: 1.8;
        }
        .article-body li { margin-bottom: 0.3rem; }
        .highlight-box {
            border-left: 3px solid var(--text);
            padding: 1rem 1.25rem;
            margin: 2rem 0;
            background: var(--surface);
            border-radius: 0 var(--radius) var(--radius) 0;
        }
        .highlight-box p { margin: 0; font-style: italic; color: var(--muted); }
        .stat-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1px;
            background: var(--border);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            margin: 2rem 0;
        }
        .stat {
            background: var(--surface);
            padding: 1.25rem;
        }
        .stat-num {
            font-family: var(--serif);
            font-size: 2rem;
            line-height: 1;
            margin-bottom: 0.35rem;
        }
        .stat-desc {
            font-family: var(--mono);
            font-size: 0.7rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--muted);
        }

        /* AUTH PAGES */
        .auth-wrap {
            display: flex;
            min-height: calc(100vh - 56px);
            align-items: center;
            justify-content: center;
            padding: 3rem 1.5rem;
        }
        .auth-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
        }
        .auth-card .auth-label {
            font-family: var(--mono);
            font-size: 0.7rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 1rem;
        }
        .auth-card h2 {
            font-family: var(--serif);
            font-size: 1.9rem;
            font-weight: 400;
            margin-bottom: 1.75rem;
        }
        .form-field { margin-bottom: 1.1rem; }
        .form-field label {
            display: block;
            font-family: var(--mono);
            font-size: 0.7rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 0.4rem;
        }
        .form-field input {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            font-family: var(--sans);
            font-size: 0.95rem;
            color: var(--text);
            background: var(--bg);
            outline: none;
            transition: border-color 0.15s;
        }
        .form-field input:focus { border-color: var(--text); }
        .form-field input::placeholder { color: #bbb; }
        .btn-full { width: 100%; justify-content: center; text-align: center; margin-top: 0.5rem; }
        .auth-footer {
            margin-top: 1.25rem;
            font-size: 0.85rem;
            color: var(--muted);
            text-align: center;
        }
        .auth-footer a { color: var(--text); }
        .error-list {
            background: #FEF0F0;
            border: 1px solid #F5C1C1;
            border-radius: var(--radius);
            padding: 0.75rem 1rem;
            margin-bottom: 1.25rem;
            font-size: 0.85rem;
            color: #A32D2D;
        }
        .error-list ul { margin-left: 1rem; }
        .remember-row {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.1rem;
        }
        .remember-row label {
            font-family: var(--mono);
            font-size: 0.72rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--muted);
            cursor: pointer;
        }

        /* DASHBOARD */
        .dash-header {
            padding: 3rem 0 2rem;
            border-bottom: 1px solid var(--border);
            margin-bottom: 3rem;
        }
        .dash-header .welcome-label {
            font-family: var(--mono);
            font-size: 0.72rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 0.75rem;
        }
        .dash-header h1 {
            font-family: var(--serif);
            font-size: 2.5rem;
            font-weight: 400;
        }
        .dash-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1px;
            background: var(--border);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            margin-bottom: 3rem;
        }
        .dash-stat {
            background: var(--surface);
            padding: 1.5rem;
        }
        .dash-stat-label {
            font-family: var(--mono);
            font-size: 0.65rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 0.5rem;
        }
        .dash-stat-value {
            font-family: var(--serif);
            font-size: 2rem;
            font-weight: 400;
        }

        /* FOOTER */
        footer {
            border-top: 1px solid var(--border);
            padding: 2rem;
            text-align: center;
        }
        footer p {
            font-family: var(--mono);
            font-size: 0.7rem;
            letter-spacing: 0.06em;
            color: var(--muted);
            text-transform: uppercase;
        }

        @media (max-width: 700px) {
            .nav-links { display: none; }
            .dash-grid { grid-template-columns: repeat(2, 1fr); }
            .stat-row { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<nav>
    <div class="nav-inner">
        <a href="/" class="nav-brand">STEM&nbsp;Hub</a>
        <div class="nav-links">
            <a href="/science" class="{{ request()->is('science*') ? 'active' : '' }}">
                Science <span class="nav-tag tag-s">S</span>
            </a>
            <a href="/technology" class="{{ request()->is('technology*') ? 'active' : '' }}">
                Technology <span class="nav-tag tag-t">T</span>
            </a>
            <a href="/engineering" class="{{ request()->is('engineering*') ? 'active' : '' }}">
                Engineering <span class="nav-tag tag-e">E</span>
            </a>
            <a href="/mathematics" class="{{ request()->is('mathematics*') ? 'active' : '' }}">
                Mathematics <span class="nav-tag tag-m">M</span>
            </a>
        </div>
        <div class="nav-auth">
            @auth
                <span class="nav-user">{{ Auth::user()->name }}</span>
                <a href="/dashboard">Dashboard</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit">Log out</button>
                </form>
            @else
                <a href="{{ route('login') }}">Log in</a>
                <a href="{{ route('register') }}" class="btn-nav-primary">Sign up</a>
            @endauth
        </div>
    </div>
</nav>

@yield('content')

<footer>
    <p>© {{ date('Y') }} STEM Hub &mdash; CS262 Group 1</p>
</footer>

</body>
</html>
