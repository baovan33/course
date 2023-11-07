@extends('layouts.backend')
@section('content')

    <div class="border">
        <h2 class="text-center pt-3 font-weight-bold pb-2 border-bottom">CREATE NEW COURSE! </h2>
        <form class="shadow-sm p-3 bg-light rounded" method="post" action="{{route('admin.courses.store')}}">
            @csrf
            <div class="form-row">
            {{-- NAME--}}
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
            {{-- CODE--}}
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4" class="font-weight-bold">Code course</label>
                        <input type="text" class="form-control {{$errors->has('code')? ' is-invalid':false}}" name="code" id="inputPassword4" placeholder="22222" value="{{old('code')}}">
                        @error('code')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    {{-- TEACHER_ID --}}
                    <div class="form-group col-md-6" >
                        <label for="inputState" class="font-weight-bold">Teacher</label>
                        <select id="inputState" class="form-control {{$errors->has('teacher_id')? ' is-invalid':false}}" name="teacher_id" value="{{old('teacher_id')}}">
                            <option value="0" selected>Choose...</option>
                            @if ($teachers)
                                @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}" {{old('teacher_id') == $teacher->id ? 'selected' : false}} > {{$teacher->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('teacher_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
            <div class="form-row">
                {{-- PRCICE--}}
                <div class="form-group col-md-6">
                    <label for="inputAddress" class="font-weight-bold">Price</label>
                    <input type="number" min="0" class="form-control {{$errors->has('price')? ' is-invalid':false}}" name="price" id="inputAddress" placeholder="990.000" value="{{old('price')}}">
                    @error('price')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                {{-- SALE_PRICE--}}
                <div class="form-group col-md-6">
                    <label for="inputAddress" class="font-weight-bold">Sale Price</label>
                    <input type="number" min="0" class="form-control {{$errors->has('sale_price')? ' is-invalid':false}}" name="sale_price" id="inputAddress" placeholder="100.000" value="{{old('sale_price')}}">
                    @error('sale_price')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                {{-- Status --}}
                <div class="form-group col-md-6">
                    <label for="inputState" class="font-weight-bold">Status</label>
                    <select id="inputState" class="form-control {{$errors->has('status')? ' is-invalid':false}}" name="status" value="{{old('status')}}">
                        <option value="0" {{old('status') == 0 ? 'selected' : false}}>No Active</option>
                        <option value="1" {{old('status') == 1 ? 'selected' : false}} > Active </option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                {{-- IS_DOCUMENT --}}
                <div class="form-group col-md-6">
                    <label for="inputState" class="font-weight-bold">Documents</label>
                    <select id="inputState" class="form-control {{$errors->has('is_document')? ' is-invalid':false}}" name="is_document">
                        <option value="0" {{old('is_document') == 0 ? 'selected' : false }}>No</option>
                        <option value="1" {{old('is_document') == 1 ? 'selected' : false }}> Yes </option>
                    </select>
                    @error('is_document')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
            {{-- Support--}}
            <div class="form-group col-md-12">
                <label for="inputPassword4" class="font-weight-bold">Support</label>
                <textarea class="form-control {{$errors->has('supports')? ' is-invalid':false}}" name="supports" id="inputPassword4" placeholder="">{{old('supports')}}</textarea>
                @error('supports')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            </div>
          {{--  Category --}}
            <div class="form-row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="" class="font-weight-bold">Category</label>
                        <div class="list-categoies" style="max-height: 180px; overflow: auto;">
                            {{ getCategoriesCheckbox($categories, old('categories')) }}
                        </div>
                        @error('categories')
                        <div class="invalid-feedback d-block">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <hr>

            <div class="form-row">
                {{-- Detail--}}
                <div class="form-group col-md-12">
                    <label for="inputPassword4" class="font-weight-bold">Detail</label>
                    <textarea class="form-control ckeditor  {{$errors->has('detail')? ' is-invalid':false}}" name="detail" id="detail" style="min-height: 500px;" placeholder="" >{{old('detail')}}</textarea>
                    @error('detail')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            {{-- Thumbnail--}}
            <div class="form-row {{ $errors->has('thumbnail') ? 'align-items-center' : 'align-items-end' }}">
                <div class="col-md-6 mb-2">
                    <label for="inputPassword4" class="font-weight-bold">Thumbnail</label>
                    <input type="text" class="form-control {{$errors->has('thumbnail') ? ' is-invalid':false}}" name="thumbnail" id="thumbnail" placeholder="" value="{{old('thumbnail')}}">
                    @error('thumbnail')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-md-1 ml-2 mb-2" >
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-success">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </div>
                <div class="col-md-4" id="holder">
                    @if ( old('thumbnail') )
                        <img src="{{old('thumbnail')}}" style="width: 80px; height: 80px;" alt="">
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
