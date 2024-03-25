@extends('frontend.layout')
@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success text-center p-2">
                    <h1 class="text-success">{{ session('success') }}</h1>
                </div>
            @endif
            {{-- <h1>Home</h1> --}}
        </div>
    </div>
@endsection
