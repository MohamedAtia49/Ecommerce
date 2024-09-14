@extends('frontend.layout')
@section('title', 'Sign In')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center"><h2>Login</h2></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('frontend.login') }}">
                        @csrf
                        @if (session('error'))
                            <div class="alert alert-danger text-center">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger text-center text-lightblue">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li><h4>{{ $error }}</h4></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group mt-2">
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="الايميل">
                        </div>
                        <div class="form-group mt-2">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور">
                        </div>
                        <div class="row buttons mt-2">
                            <div class="col-md-2 right">
                                <button type="submit" class="btn btn-success btn-lg mb-3">دخول</button>
                            </div>
                            <div class="col-md-6 left">
                                <a href="{{ route('frontend.sign-up') }}" class="btn btn-secondary btn-lg mb-3">انشاء حساب جديد</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
