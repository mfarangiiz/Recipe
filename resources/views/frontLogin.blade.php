@extends('layouts.front')

@section('content')

    <div class="login-container">
        <div class="login-title">
            <i class="fas fa-user-circle"></i> 
        
        </div>
        <form method="POST" action="{{ route('frontLogin') }}" id="loginForm">
    @csrf 
    
    <input type="email" name="email" id="email" placeholder="Emailingizni kiriting" required>

    <input type="password" name="password" id="password" placeholder="Parolingizni kiriting" required>

    <button type="submit" class="login-btn">Kirish</button>
    <a href="#">Akkauntdan chiqish</a>
</form>

    </div>
    

    @endsection