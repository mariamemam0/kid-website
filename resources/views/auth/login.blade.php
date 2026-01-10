@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-4 mt-10 p-6 bg-white rounded shadow mx-4">
        <h2 class="text-2xl font-bold mb-6">Login</h2>

        @if ($errors->any())
    <div class="mb-4">
        <ul class="text-red-500 text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
          
            <div>
                <input type="email" name="email" placeholder="Email" class="w-full p-2 border rounded"
                    value="{{ old('email') }}">
            </div>
            <div>
                <input type="password" name="password" placeholder="Password" class="w-full p-2 border rounded">
            </div>
         
            <div>
                <button type="submit" class="w-full bg-blue-500 text-blue p-2 rounded">
                    Login
                </button>
            </div>
            </form>
    </div>
@endsection