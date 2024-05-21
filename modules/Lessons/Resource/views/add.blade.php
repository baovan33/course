@extends('layouts.backend')
@section('content')

    <div class="border">
        <h2 class="text-center pt-3 font-weight-bold pb-2 border-bottom">CREATE NEW LESSON! </h2>
        <form class="shadow-sm p-3 bg-light rounded" method="post" action="{{route('admin.lessons.store')}}">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="font-weight-bold">Name</label>
                    <input type="" class="form-control title  {{$errors->has('name')? ' is-invalid':false }}" name="name" id="inputEmail4" placeholder="igexixon" value="{{old('name')}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror

                </div>
                {{-- SLUG --}}
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="font-weight-bold" >Slug</label>
                    <input type="" class="form-control slug  {{$errors->has('slug')? ' is-invalid':false }}" name="slug" id="inputEmail4" placeholder="igexixo_ffd" value="{{old('slug')}}">
                    @error('slug')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                {{-- Video --}}
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="font-weight-bold">Video</label>
                    <div class="input-group">
                        <input type="" name="video_id" id="video-url" class="form-control" placeholder="Video" >
                        <button type="button" id="lfm-video" data-input="video-url" class="btn btn-success">select</button>
                    </div>
                    @error('video_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror

                </div>
                {{-- Document --}}
                <div class="form-group col-md-6">
                    <label for="inputEmail4" class="font-weight-bold">Document</label>
                    <div class="input-group">
                        <input type="" name="document" id="document-url" class="form-control" placeholder="Document" >
                        <button type="button" id="lfm-document" data-input="document-url" class="btn btn-success">select</button>

                    </div>
                    @error('document_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                {{--PARENT ID--}}
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="" class="font-weight-bold">Group Lessons</label>
                        <select name="parent_id" id="" class="form-control">
                            <option value="0">None</option>

                        </select>
                        @error('parent_id')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                {{--is_trial--}}
                <div class="form-group col-md-4">
                    <label for="" class="font-weight-bold">Try Learning</label>
                    <select id="inputState" class="form-control " name="is_trial">
                        <option value="0" >No</option>
                        <option value="1" > Yes </option>
                    </select>
                    @error('is_trial')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                {{--Position--}}
                <div class="col-md-4 form-group">
                    <label for="" class="font-weight-bold">Positon</label>
                    <input type="number" class="form-control" name="position" placeholder="Sort order...">
                    @error('position')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 form-group">
                    <label for="" class="font-weight-bold">Description</label>
                    <textarea class="form-control ckeditor" name="description" id="description" style="min-height: 500px;" placeholder="" ></textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

            </div>

            <div class="form-row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" style="width:15%;">Add Lesson</button>
                    <a href="{{route('admin.lessons.index', $courseId)}}" class="btn btn-danger" style="width: 10%;">Cancel</a>
                </div>

            </div>
        </form>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('backend/js/script.js')}}"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{asset('backend/js/ckeditor_script.js')}}"></script>
    <script>

    </script>
@endsection
