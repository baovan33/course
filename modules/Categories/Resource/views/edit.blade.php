@extends('layouts.backend')
@section('content')

    <div class="border">
        <h2 class="text-center pt-3 font-weight-bold pb-2 border-bottom">CATEGORY USER! </h2>
        <form class="shadow-sm p-3 bg-light rounded" method="post" action="{{route('admin.categories.update', $category)}}">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Name</label>
                    <input type="name" class="form-control {{$errors->has('name')? ' is-invalid':false}}" name="name" id="inputEmail4" placeholder="igexixon" value="{{old('name') ?? $category->name}} ">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror

                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Slug</label>
                    <input type="text" class="form-control {{$errors->has('slug')? ' is-invalid':false}}" name="slug" id="inputPassword4" placeholder="slug" value="{{old('slug') ?? $category->slug}}">
                    @error('slug')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-12">
                    <label for="inputState">Parent</label>
                    <select id="inputState" class="form-control {{$errors->has('parent_id')? ' is-invalid':false}}" name="parent_id" value="{{old('parent_id')}}">
                        <option value="0" selected>No Parent</option>
                        {{getCategories($categories, old('parent_id') ?? $category->parent_id)}}

                    </select>
                    @error('parent_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" style="width: 10%;">Save</button>
                    <a href="{{route('admin.categories.index')}}" class="btn btn-danger" style="width: 10%;">Cancel</a>
                </div>

            </div>
        </form>
    </div>

@endsection
