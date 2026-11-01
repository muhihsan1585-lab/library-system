@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="login-container">
    <h2>Login Library System</h2>

    @if (session('success'))
    <p style="color: green">
        {{ session('success') }}
    </p>
    @endif

    @if ($errors->any())
    <div style="color: red; margin-bottom: 15px;">
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif

    <form action="{{ route('login.process') }}" method="POST">
        @csrf

        <div>
            <label>Email</label>
            <input type="email" name="email"
                value="{{ old('email') }}"
                placeholder="Masukkan email"
                required>
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password"
                placeholder="Masukkan password"
                required>
        </div>

        <button type="submit">Login</button>
    </form>
</div>
@endsection