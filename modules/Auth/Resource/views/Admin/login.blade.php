@extends('layouts.auth')

@section('content')
    <div class="p-4">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">{{$pageTitle}} </h1>
        </div>
        <form class="user" method="post" action="{{route('login')}}">
            @csrf
            <div class="form-group">
                <input type="email" class="form-control form-control-user"
                       id="exampleInputEmail" aria-describedby="emailHelp" name="email" value="{{old('email')}}"
                       placeholder="Email">
                @error('email')
                    <span class="text-danger" style="margin-left: 8px;font-size: 0.8rem;">
                        {{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-user" name="password"
                       id="exampleInputPassword" placeholder="Password">
                @error('password')
                <span class="text-danger" style="margin-left: 8px;font-size: 0.8rem;">
                    {{$message}}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-user btn-block">
                Login
            </button>
            <hr>

        </form>
        <hr>
        <div class="text-center">
            <a class="small" href="forgot-password.html">Forgot Password?</a>
        </div>

    </div>
@endsection
