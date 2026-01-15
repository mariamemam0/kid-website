@extends('layouts.app')

@section('content')

<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="mb-4">🌈 Our Lovely Kids</h1>
        </div>

        <div class="card shadow-sm p-4">
            <h4>{{ $kid->name }}</h4>
            <p><strong>Age:</strong> {{ $kid->date_of_birth }}</p>
            <p><strong>Parent Phone:</strong> {{ $kid->parent_phone }}</p>
        </div>
    </div>
</div>

@endsection
