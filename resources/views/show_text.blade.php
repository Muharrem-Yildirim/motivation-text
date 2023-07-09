@extends('components.layout')
<a href="{{ route('category.index') }}" class="btn btn-secondary btn-sm back-button">
    < Back </a>
        @section('content')
            <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
                <h1 style="margin-bottom: 15px">
                    {{ $selectedCategory }}
                </h1>
                <h2 style="margin-bottom: 15px">
                    {{ $text }}
                </h2>
            </div>
        @endsection
