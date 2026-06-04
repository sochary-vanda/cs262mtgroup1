@extends('layout')

@section('title', 'Home')

@section('content')
<div class="card" style="text-align:center; padding:60px 30px;">
    <h1 style="color:#1a1a2e; margin-bottom:16px;">CS262 Group 1</h1>
    <p style="color:#555; margin-bottom:30px;">Welcome to our project application.</p>
    <a href="{{ route('register') }}" class="btn btn-primary" style="margin-right:10px">Get Started</a>
    <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
</div>
@endsection
