@extends('layouts.backend')
@section('content')

    <div class="border">
        <h2 class="text-center pt-3 font-weight-bold pb-2 border-bottom">CREATE NEW USER! </h2>
        <form class="shadow-sm p-3 bg-light rounded" method="post" action="{{route('admin.users.store')}}">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control {{$errors->has('email')? ' is-invalid':false}}" name="email" id="inputEmail4" placeholder="igexixon@gmail.com" value="{{old('email')}}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror

                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control {{$errors->has('password')? ' is-invalid':false}}" name="password" id="inputPassword4" placeholder="Password" value="{{old('password')}}">
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Name</label>
                    <input type="text" class="form-control {{$errors->has('name')? ' is-invalid':false}}" name="name" id="inputAddress" placeholder="Tiger Nixon" value="{{old('name')}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">Group</label>
                    <select id="inputState" class="form-control {{$errors->has('group_id')? ' is-invalid':false}}" name="group_id" value="{{old('group_id')}}">
                        <option value="0" selected>Choose...</option>
                        <option value="1"> Admin </option>
                    </select>
                    @error('group_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" style="width: 10%;">Register</button>
                    <a href="{{route('admin.users.index')}}" class="btn btn-danger" style="width: 10%;">Cancel</a>
                </div>



            </div>
        </form>
    </div>

@endsection
