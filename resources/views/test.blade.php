@extends('layouts.backend')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>

        </tr>
        </thead>
        <tbody>
        @php $i = 0; @endphp
        @foreach($tree as $data)
        <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{str_repeat('|---', $data['level']).$data['name']}}</td>

        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
