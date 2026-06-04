@extends('layout')

@section('title', 'Login')

@section('content')
<div class="card" style="max-width:450px; margin:0 auto;">
    <h2 style="margin-bottom:24px; color:#1a1a2e;">Welcome Back</h2>

    @if ($errors->any())
        <div class="alert-error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if (session('status'))
        <div class="alert-success">{{ session('status') }}</div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email"
                   value="{{ old('email') }}" placeholder="john@example.com" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password"
                   placeholder="Your password" required>
        </div>

        <div style="margin-bottom:18px;">
            <label style="font-weight:normal; cursor:pointer;">
                <input type="checkbox" name="remember"> Remember me
            </label>
        </div>

        <button type="submit" class="btn btn-primary" style="width:100%">Login</button>

        <p style="margin-top:16px; text-align:center; color:#555;">
            No account yet? <a href="{{ route('register') }}" style="color:#e94560">Register</a>
        </p>
    </form>
</div>
@endsection
