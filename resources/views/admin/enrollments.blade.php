@extends('layouts.layout')

@section('contents')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>All</strong> Enrollment</h1>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Enrollments</h5>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Agent</th>
                            <th>Country</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td class="d-none d-xl-table-cell">{{$data->course->title}}</td>
                                <td><span class="badge bg-success">{{$data->agent}}</span></td>
                                <td class="d-none d-md-table-cell">{{$data->country}}</td>
                                <td class="d-none d-md-table-cell">{{$data->created_at}}</td>
                                <td class="d-none d-md-table-cell"><a href="{{route('admin.enrollment.show', $data->id)}}" class="btn btn-primary">View</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
