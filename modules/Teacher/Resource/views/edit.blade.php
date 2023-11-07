@extends('layouts.backend')
@section('content')

    <div class="border">
        <h2 class="text-center pt-3 font-weight-bold pb-2 border-bottom">CREATE NEW TEACHER! </h2>
        <form class="shadow-sm p-3 bg-light rounded" method="post" action="{{route('admin.teacher.edit', $teacher)}}">
            @csrf
            @method('PUT')
            <div class="form-row">
                {{-- NAME--}}
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="font-weight-bold">Name</label>
                    <input type="" class="form-control title  {{$errors->has('name')? ' is-invalid':false }}" name="name" id="inputEmail4" placeholder="igexixon" value="{{old('name') ?? $teacher->name}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror


                </div>
                {{-- SLUG --}}
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="font-weight-bold" >Slug</label>
                    <input type="" class="form-control slug  {{$errors->has('slug')? ' is-invalid':false }}" name="slug" id="inputEmail4" placeholder="igexixo_ffd" value="{{old('slug') ?? $teacher->slug}}">
                    @error('slug')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            {{-- EXP --}}
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4" class="font-weight-bold" >Experience</label>
                    <input type="number" min="0" class="form-control   {{$errors->has('exp')? ' is-invalid':false }}" name="exp" id="inputEmail4" placeholder="2 years" value="{{old('exp') ?? $teacher->exp}}">
                    @error('exp')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                {{-- Detail--}}
                <div class="form-group col-md-12">
                    <label for="inputPassword4" class="font-weight-bold">Description</label>
                    <textarea class="form-control ckeditor  {{$errors->has('description')? ' is-invalid':false}}" name="description" id="detail" style="min-height: 500px;" placeholder="" >{{old('description') ?? $teacher->description}}</textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            {{-- Image--}}
            <div class="form-row {{ $errors->has('image') ? 'align-items-center' : 'align-items-end' }}">
                <div class="col-md-6 mb-2">
                    <label for="inputPassword4" class="font-weight-bold">Image</label>
                    <input type="text" class="form-control {{$errors->has('image') ? ' is-invalid':false}}" name="image" id="image" placeholder="" value="{{old('image') ?? $teacher->image}}">
                    @error('image')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-md-1 ml-2 mb-2" >
                    <a id="lfm" data-input="image" data-preview="holder" class="btn btn-success">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </div>
                <div class="col-md-4" id="holder">
                    @if ( old('image') ||  $teacher->image )
                        <img src="{{old('image') ??  $teacher->image}}" style="width: 80px; height: 80px;" alt="">
                    @endif
                </div>

            </div>

            <div class="form-row mt-2">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" style="width: 10%;">Save</button>
                    <a href="{{route('admin.courses.index')}}" class="btn btn-danger" style="width: 10%;">Cancel</a>
                </div>

            </div>
        </form>
    </div>


@endsection
@section('scripts')
    <script src="{{asset('backend/js/script.js')}}"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{asset('backend/js/ckeditor_script.js')}}"></script>

@endsection
