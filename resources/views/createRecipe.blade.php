@extends('layouts.front')

@section('content')


    
    <div class="form-container">


        <form id="recipe-form" method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
            @csrf 
            <input type="text" name="user" placeholder="Ismingiz" required>
            <input type="text" name="name" placeholder="Retsept nomi" required>
            <textarea name="ingredients" placeholder="Masalliqlar" required></textarea>
            <textarea name="instructions" placeholder="Tayyorlanish yo'riqnomasi" required></textarea>
            <input type="file" name="image" accept="image/*">
            <button type="submit">Qo'shish</button>
        </form>

        <div id="success-message" style="display: none;">Retsept muvaffaqiyatli qo'shildi!</div>
    </div>



    @endsection
