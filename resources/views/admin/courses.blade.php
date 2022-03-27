@extends('layouts.layout')

@section('contents')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>All</strong> Courses</h1>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Courses</h5>
                        <a href="{{route('admin.courses_create')}}" class="btn btn-primary">Create New Course</a>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Course</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->coursecode}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td><a href="{{route('admin.course', $data->id)}}" class="btn btn-success btn-lg">Modify</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
