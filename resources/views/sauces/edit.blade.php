@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Add a new sauce</h1>
    <form action="{{ route('sauces.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $sauce->name }}" required>
            </div>
            <!-- Manufacturer -->
            <div class="mb-3">
                <label for="manufacturer" class="form-label">{{ __('Manufacturer') }}</label>
                <input type="text" name="manufacturer" id="manufacturer" class="form-control" value="{{ $sauce->manufacturer }}" required>
            </div>
            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">{{ __('Description') }}</label>
                <textarea name="description" id="description" class="form-control" value="{{ $sauce->description }}" required></textarea>
            </div>
            <!-- Main Pepper -->
            <div class="mb-3">
                <label for="mainPepper" class="form-label">{{ __('Main pepper') }}</label>
                <input type="text" name="mainPepper" id="mainPepper" class="form-control" value="{{ $sauce->mainPepper }}" required>
            </div>
            <!-- Image -->
            <div class="mb-3">
                <label for="imageUrl" class="form-label">{{ __('Image') }}</label>
                <input type="file" name="imageUrl" id="imageUrl" class="form-control" value="{{ $sauce->imageUrl }}" accept="image/*"/>
            <!-- Heat -->
            <div class="mt-3 mb-3">
                <label for="heat" class="form-label">{{ __('Heat') }}</label><br>
                <input type="range" name="heat" id="heat" min="1" max="10" value="{{ $sauce->heat }}" required>
            </div>

            <!-- Hidden attributes -->
            <input type="hidden" name="likes" value="0">
            <input type="hidden" name="dislikes" value="0">

            <!-- Submit -->
            <button type="submit" class="btn btn-secondary">SUBMIT</button>
    </form>
</div>
@endsection