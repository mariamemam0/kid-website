@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h2 class="text-center mb-3 fw-bold">🌈 Our Courses</h2>
    <p class="text-center text-muted mb-5">
        Fun & educational programs designed especially for kids
    </p>

    <div class="row g-4">
        @foreach ($courses as $course)
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm course-card">

                    <!-- Card Header -->
                    <div class="card-header bg-primary text-white text-center fw-semibold">
                        {{ $course->name }}
                    </div>

                    <!-- Card Body -->
                    <div class="card-body text-center">

                        <p class="text-muted small mb-3">
                            {{ $course->description ?? 'A fun and engaging learning experience for kids.' }}
                        </p>

                        <div class="mb-2">
                            <span class="badge bg-info">
                                🎂 Age {{ $course->age_from }} - {{ $course->age_to }}
                            </span>
                        </div>

                        <div class="mb-2">
                            <span class="badge bg-success">
                                ⏰ {{ $course->start_time }} - {{ $course->end_time }}
                            </span>
                        </div>

                        <div class="mb-3">
                            <span class="badge bg-warning text-dark">
                                👧 Capacity: {{ $course->capacity }}
                            </span>
                        </div>

                        <h5 class="fw-bold text-primary">
                            💰 {{ $course->price }} EGP
                        </h5>
                    </div>

                    <!-- Card Footer -->
                    <div class="card-footer bg-white border-0 text-center">
                        <a href="#" class="btn btn-outline-primary btn-sm">
                            View Details
                        </a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- Small hover effect --}}
<style>
    .course-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
</style>
@endsection
