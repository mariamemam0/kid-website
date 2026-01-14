@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5">🌈 Our Lovely Kids</h2>

    <div class="row">
        @foreach ($kids as $kid)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card border-0 shadow text-center h-100">


                    <div class="card-body">
                        <h5 class="card-title">{{ $kid->name }}</h5>
                        <p class="mb-1">🎂 Age: {{ $kid->age }} years</p>
                        

                        <div class="d-flex justify-content-center gap-2">
                            <a href="" class="btn btn-sm btn-warning">✏️</a>

                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">🗑</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection