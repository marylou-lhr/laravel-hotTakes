@extends('layouts.app')

@section('content')
<div class="container">
    <p class="text-center">THE SAUCES</p>
    <div class="row mt-5">
        @foreach($sauces as $sauce)
            <div class="col-md-3">
                <div class="text-align-center">
                    <a href="{{ route('sauces.show', $sauce->id) }}" class="stretched-link text-decoration-none d-flex flex-column" style="height: 100%;">
                        <div class="card-body d-flex flex-column text-align-center align-items-center justify-content-between  flex-grow-1">
                            <img src="{{ asset($sauce->imageUrl) }}" class="card-img-top">
                            <div class="d-flex flex-column text-align-center align-items-center justify-content-between text-dark">
                                <h6 class="text-center text-uppercase fw-bold">{{ $sauce->name }}</h6>
                                <small>Heat : {{ $sauce->heat }}/10</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection