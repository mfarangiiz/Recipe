@extends('layouts.front')

@section('content')

    <div class="register-container">
        <div class="register-title">
            <i class="fas fa-user-circle"></i>

        </div>
        <form method="POST" action="{{ route('frontRegister') }}" id="registerForm">
            @csrf 
            <input type="text" name="first_name" placeholder="Ismingizni kiriting" required>
            <input type="text" name="last_name" placeholder="Familiyangizni kiriting" required>
            <input type="email" name="email" placeholder="Email manzilingizni kiriting" required>
            <input type="password" name="password" placeholder="Parolingizni kiriting" required>
            <button type="submit" class="register-btn">Ro'yhatdan o'tish</button>
        </form>


        <p>Akkauntingiz bormi? <a href="{{route('frontLogin')}}">Kirish</a></p>
    </div>

@endsection
