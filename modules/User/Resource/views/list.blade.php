@extends('layouts.backend')
@section('content')
    @if (session('msg'))
        <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <div class="">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <p class="text-right" style="margin-top: 4px;">
                    <a href="{{route('admin.users.create')}}" class="btn btn-primary">Add New User</a>
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
                                <th class="">Email</th>
                                <th class="">Group</th>
                                <th class="">Start date</th>
                                <th class="" style="width: 5%;">Edit</th>
                                <th class="" style="width: 5%;">Delete</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th class="">Name</th>
                                <th class="">Email</th>
                                <th class="">Group</th>
                                <th class="">Start date</th>
                                <th class="" style="width: 5%;">Edit</th>
                                <th class="" style="width: 5%;">Delete</th>
                            </tr>
                            </tfoot>

                        </table>

                </div>

            </div>
        </div>
    </div>




@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                ajax      : '{{route('admin.users.data')}}',
                processing: true,
                serverSide: true,
                'columns'  : [
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "group_id" },
                    { "data": "created_at" },
                    { "data": "edit" },
                    { "data": "delete" },

                ]
            })
        });
    </script>
@endsection
