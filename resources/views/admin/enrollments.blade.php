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
                            <th>Telephone</th>
                            <th>Course</th>
                            <th>Agent</th>
                            <th>Country</th>
                            <th>Status</th>
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
                                <td class="d-none d-xl-table-cell">{{$data->tel}}</td>
                                <td class="d-none d-xl-table-cell">{{$data->course_id}}</td>
                                <td><span class="badge bg-success">{{$data->agent}}</span></td>
                                <td class="d-none d-md-table-cell">{{$data->country}}</td>
                                <td class="d-none d-md-table-cell">
                                    @if($data->status==1)
                                        <span class="badge bg-success">Success</span>
                                    @elseif($data->status==0)
                                        <span class="badge bg-warning">Pending</span>
                                    @else
                                        <span class="badge bg-warning">oK</span>
                                    @endif

                                </td>
                                <td class="d-none d-md-table-cell">{{$data->created_at}}</td>
                                <td class="d-none d-md-table-cell"><a class="btn btn-primary">View</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
