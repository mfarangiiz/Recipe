

@extends('layouts.front')

@section('content')

    <!-- Card -->
    <div class="cards-container" id="foods-recipes">
        @foreach ($recipes as $recipe)
            <div class="card">
                
                <img src="{{ asset('storage/' . $recipe->image) }}" alt="Card Image"> 
                <h4>{{ $recipe->name }}</h4>
                <p>Masalliqlar: {{ $recipe->ingredients }}</p>
                <button class="open-modal" data-target="modal{{ $recipe->id }}">Tayyorlanishi</button>
            </div>

            
            <div class="modal" id="modal{{ $recipe->id }}">
                <div class="modal-overlay">
                    <div class="modal-content">
                        <h3>{{ $recipe->name }} Tayyorlanishi</h3>
                        <p>{{ $recipe->instructions }}</p> 
                        <div class="share-modal">
                            
                            <a href="https://t.me/share/url?url=http://yourrecipe.com/{{$recipe->id}}" target="_blank">Telegram</a>
                            <a href="sms:12345?body=Check%20out%20this%20recipe%20http://yourrecipe.com/{{$recipe->id}}" target="_blank">SMS</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection


