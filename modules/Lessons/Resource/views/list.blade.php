@extends('layouts.backend')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <div class="border">
        <h2 class="text-center pt-3 font-weight-bold pb-2 border-bottom">{{$courseName}} </h2>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <p class="text-right" style="margin-top: 4px;">
                    <a href="{{route('admin.lessons.create', $course)}}" class="btn btn-primary mr-3">Add New Lession</a>
                    <a href="{{route('admin.courses.index')}}" class="btn btn-secondary mr-3">Back Course</a>

                </p>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive" style=" overflow: visible;">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="">Name</th>
                            <th class="">Trial</th>
                            <th class="">Views</th>
                            <th class="">Position</th>
                            <th class="">Create at</th>
                            <th class="text-center" style="width: 5%;">Edit</th>
                            <th class="text-center" style="width: 5%;">Delete</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th class="">Name</th>
                            <th class="">Trial</th>
                            <th class="">Views</th>
                            <th class="">Position</th>
                            <th class="">Create at</th>
                            <th class="text-center" style="width: 5%;">Edit</th>
                            <th class="text-center" style="width: 5%;">Delete</th>
                        </tr>
                        </tfoot>

                    </table>
                </div>

            </div>
        </div>
    </div>




@endsection
