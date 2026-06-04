@extends('layouts.app')
@section('title', 'Sign Up')

@section('styles')
<style>
    .auth-wrap {
        min-height: calc(100vh - 68px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem 1rem;
    }
    .auth-card { width: 100%; max-width: 440px; padding: 2.5rem; }
    .auth-title {
        font-family: 'Syne', sans-serif;
        font-size: 2rem;
        font-weight: 800;
        letter-spacing: -0.03em;
        margin-bottom: 0.4rem;
    }
    .auth-sub { color: var(--muted); font-size: 0.9rem; margin-bottom: 2rem; }
    .auth-footer { text-align: center; margin-top: 1.5rem; color: var(--muted); font-size: 0.875rem; }
    .auth-footer a { color: var(--accent); text-decoration: none; }
    .auth-footer a:hover { text-decoration: underline; }
</style>
@endsection

@section('content')
<div class="auth-wrap">
    <div class="glass-card auth-card">
        <div class="auth-title">Create account<span style="color:var(--accent)">.</span></div>
        <div class="auth-sub">Start your STEM journey today</div>

        @if($errors->any())
            <div class="alert alert-error">
                @foreach($errors->all() as $e) {{ $e }}<br> @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-input" value="{{ old('name') }}" placeholder="Jane Smith" required autofocus>
            </div>
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-input" value="{{ old('email') }}" placeholder="you@example.com" required>
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" placeholder="Min. 8 characters" required>
            </div>
            <div class="form-group">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-input" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;padding:0.75rem;">
                Create Account
            </button>
        </form>

        <div class="auth-footer">
            Already have an account? <a href="{{ route('login') }}">Log in</a>
        </div>
    </div>
</div>
@endsection
