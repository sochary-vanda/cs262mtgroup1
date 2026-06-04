<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>STEM Hub — @yield('title', 'Learn. Explore. Discover.')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --void: #020408;
            --deep: #060d1a;
            --surface: #0b1628;
            --glass: rgba(255,255,255,0.04);
            --glass-border: rgba(255,255,255,0.09);
            --glass-hover: rgba(255,255,255,0.08);
            --accent: #4fd9c8;
            --accent2: #7b6ef6;
            --accent3: #f06292;
            --text: #e8edf7;
            --muted: rgba(232,237,247,0.45);
            --danger: #ff6b7a;
            --success: #4fd9a0;
            --r: 12px;
            --r-lg: 20px;
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--void);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Ambient background */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 20% 10%, rgba(79,217,200,0.07) 0%, transparent 60%),
                radial-gradient(ellipse 60% 50% at 80% 80%, rgba(123,110,246,0.08) 0%, transparent 60%),
                radial-gradient(ellipse 40% 40% at 60% 30%, rgba(240,98,146,0.04) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }

        /* NAVBAR */
        nav {
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(24px) saturate(180%);
            -webkit-backdrop-filter: blur(24px) saturate(180%);
            background: rgba(6,13,26,0.75);
            border-bottom: 1px solid var(--glass-border);
            padding: 0 2.5rem;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-brand {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 1.4rem;
            color: var(--text);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            letter-spacing: -0.02em;
        }

        .nav-brand-dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 12px var(--accent);
            animation: pulse 2.5s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(0.85); }
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link {
            font-family: 'DM Sans', sans-serif;
            font-weight: 400;
            font-size: 0.875rem;
            color: var(--muted);
            text-decoration: none;
            padding: 0.45rem 0.9rem;
            border-radius: 8px;
            transition: color 0.2s, background 0.2s;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--text);
            background: var(--glass);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.2rem;
            border-radius: 9px;
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            font-size: 0.875rem;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
            letter-spacing: 0.01em;
        }

        .btn-ghost {
            background: transparent;
            color: var(--muted);
            border: 1px solid var(--glass-border);
        }
        .btn-ghost:hover { background: var(--glass); color: var(--text); border-color: rgba(255,255,255,0.15); }

        .btn-primary {
            background: var(--accent);
            color: #020408;
            font-weight: 600;
        }
        .btn-primary:hover { background: #6de8d8; box-shadow: 0 0 20px rgba(79,217,200,0.35); }

        .btn-danger {
            background: rgba(255,107,122,0.15);
            color: var(--danger);
            border: 1px solid rgba(255,107,122,0.25);
        }
        .btn-danger:hover { background: rgba(255,107,122,0.25); }

        .btn-secondary {
            background: var(--glass);
            color: var(--text);
            border: 1px solid var(--glass-border);
        }
        .btn-secondary:hover { background: var(--glass-hover); }

        .btn-accent2 {
            background: var(--accent2);
            color: #fff;
            font-weight: 600;
        }
        .btn-accent2:hover { background: #9485f8; box-shadow: 0 0 20px rgba(123,110,246,0.35); }

        /* MAIN WRAPPER */
        .main-wrap {
            position: relative;
            z-index: 1;
        }

        /* GLASS CARD */
        .glass-card {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: var(--r-lg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        /* ALERTS */
        .alert {
            padding: 0.85rem 1.2rem;
            border-radius: var(--r);
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
        }
        .alert-success { background: rgba(79,217,160,0.12); border: 1px solid rgba(79,217,160,0.25); color: var(--success); }
        .alert-error { background: rgba(255,107,122,0.12); border: 1px solid rgba(255,107,122,0.25); color: var(--danger); }

        /* FORM ELEMENTS */
        .form-group { margin-bottom: 1.25rem; }
        .form-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--muted);
            margin-bottom: 0.5rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }
        .form-input, .form-select, .form-textarea {
            width: 100%;
            background: rgba(255,255,255,0.04);
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            padding: 0.7rem 1rem;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            outline: none;
            transition: border-color 0.2s, background 0.2s;
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color: var(--accent);
            background: rgba(79,217,200,0.05);
        }
        .form-select option { background: var(--surface); }
        .form-textarea { resize: vertical; min-height: 90px; }
        .form-error { color: var(--danger); font-size: 0.78rem; margin-top: 0.35rem; }

        /* FOOTER */
        footer {
            border-top: 1px solid var(--glass-border);
            padding: 2rem 2.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--muted);
            font-size: 0.8rem;
            margin-top: 6rem;
        }

        @media (max-width: 768px) {
            nav { padding: 0 1rem; }
            footer { flex-direction: column; gap: 0.5rem; text-align: center; }
        }
    </style>
    @yield('styles')
</head>
<body>

<nav>
    <a href="{{ url('/') }}" class="nav-brand">
        <div class="nav-brand-dot"></div>
        STEM<span style="color:var(--accent)">Hub</span>
    </a>

    <div class="nav-links">
        <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Courses</a>

        @auth
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-ghost">Sign Out</button>
            </form>
            <span style="color:var(--muted);font-size:0.8rem;padding:0 0.5rem;">{{ auth()->user()->name }}</span>
        @else
            <a href="{{ route('login') }}" class="btn btn-ghost">Log In</a>
            <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
        @endauth
    </div>
</nav>

<div class="main-wrap">
    @if(session('success'))
        <div style="padding: 1rem 2.5rem 0;">
            <div class="alert alert-success">{{ session('success') }}</div>
        </div>
    @endif
    @if(session('error'))
        <div style="padding: 1rem 2.5rem 0;">
            <div class="alert alert-error">{{ session('error') }}</div>
        </div>
    @endif

    @yield('content')
</div>

<footer>
    <span>© {{ date('Y') }} STEMHub — Knowledge without limits.</span>
    <span style="color:var(--accent);font-family:'Syne',sans-serif;font-weight:600;">S · T · E · M</span>
</footer>

@yield('scripts')
</body>
</html>
