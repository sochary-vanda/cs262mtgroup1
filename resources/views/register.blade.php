@extends('layout')

@section('title', 'Register')

@section('content')
<div class="card" style="max-width:450px; margin:0 auto;">
    <h2 style="margin-bottom:24px; color:#1a1a2e;">Create Account</h2>

    @if ($errors->any())
        <div class="alert-error">
            <ul style="list-style:none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name"
                   value="{{ old('name') }}" placeholder="John Doe" required>
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email"
                   value="{{ old('email') }}" placeholder="john@example.com" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password"
                   placeholder="Min 6 characters" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation"
                   name="password_confirmation" placeholder="Repeat password" required>
        </div>

        <button type="submit" class="btn btn-primary" style="width:100%">Register</button>

        <p style="margin-top:16px; text-align:center; color:#555;">
            Already have an account? <a href="{{ route('login') }}" style="color:#e94560">Login</a>
        </p>
    </form>
</div>
@endsection
