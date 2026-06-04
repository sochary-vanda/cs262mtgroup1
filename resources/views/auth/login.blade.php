@extends('layouts.app')
@section('title', 'Log In')

@section('styles')
<style>
    .auth-wrap {
        min-height: calc(100vh - 68px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem 1rem;
    }
    .auth-card {
        width: 100%;
        max-width: 440px;
        padding: 2.5rem;
    }
    .auth-header { margin-bottom: 2rem; }
    .auth-title {
        font-family: 'Syne', sans-serif;
        font-size: 2rem;
        font-weight: 800;
        letter-spacing: -0.03em;
        margin-bottom: 0.4rem;
    }
    .auth-sub { color: var(--muted); font-size: 0.9rem; }
    .auth-footer { text-align: center; margin-top: 1.5rem; color: var(--muted); font-size: 0.875rem; }
    .auth-footer a { color: var(--accent); text-decoration: none; }
    .auth-footer a:hover { text-decoration: underline; }
    .divider {
        display: flex; align-items: center; gap: 1rem;
        color: var(--muted); font-size: 0.8rem; margin: 1.5rem 0;
    }
    .divider::before, .divider::after {
        content: ''; flex: 1;
        border-top: 1px solid var(--glass-border);
    }
</style>
@endsection

@section('content')
<div class="auth-wrap">
    <div class="glass-card auth-card">
        <div class="auth-header">
            <div class="auth-title">Welcome back<span style="color:var(--accent)">.</span></div>
            <div class="auth-sub">Log in to access your STEM courses</div>
        </div>

        @if($errors->any())
            <div class="alert alert-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-input" value="{{ old('email') }}" placeholder="you@example.com" required autofocus>
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:0.75rem;">
                Log In
            </button>
        </form>

        <div class="auth-footer">
            Don't have an account? <a href="{{ route('register') }}">Sign up free</a>
        </div>
    </div>
</div>
@endsection
