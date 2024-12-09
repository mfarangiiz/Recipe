<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pazanda</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>


@if(session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <strong>Success!</strong> {{ session('success') }}
    </div>
@elseif(session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong></strong> {{ session('error') }}
    </div>
@endif



@error('name')
<div class="alert alert-danger" role="alert">Taom nomi to'ldirilishi kerak</div>
@enderror
@error('ingredients')
<div class="alert alert-danger" role="alert">Masalliqlar kiritilishi kerak</div>
@enderror
@error('instructions')
<div class="alert alert-danger" role="alert">Tayyorlanish yoriqnomasi </div>
@enderror
<nav class="navbar">
    <div class="logo">
        <a href="#">Pazanda</a>
    </div>
    <ul class="nav-links">
        <li><a href="{{route('index')}}">Bosh sahifa</a></li>
        <li><a href="{{route('about')}}">Biz haqimizda</a></li>
        <li><a href="{{route('recipes.index')}}">Retseptlar</a></li>
        <li><a href="{{route('createRecipe')}}">Retsept qo'shish</a></li>
        <!-- <li><a href="{{route('register')}}">Ro'yhatdan o'tish</a></li> -->
        <li><a href="{{route('login')}}">Kirish</a></li>

    </ul>
</nav>


@yield('content')


<script src="js/scripts.js"></script>
</body>
</html>
