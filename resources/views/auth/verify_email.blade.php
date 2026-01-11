@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Verify Your Email</h2>
    <p class="mb-4">
        Thanks for signing up! Please check your email for a verification link.
    </p>

    @if (session('resent'))
        <div class="text-green-600 mb-4">
            A fresh verification link has been sent to your email address.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="text-blue-500 hover:underline">
            Click here to request another verification email
        </button>
    </form>
</div>
@endsection