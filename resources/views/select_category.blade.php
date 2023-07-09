@extends('components.layout')

@section('content')
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
        <h1>Select Category</h1>
        <form action="{{ route('category.update') }}" method="POST">
            @csrf
            <h2 style="margin-bottom: 15px">
                <select class="form-select" name="category">
                    <option selected>Please select one</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </h2>
            <button type="submit" class="btn-get-started text-black">GO</button>
        </form>
    </div>
@endsection
