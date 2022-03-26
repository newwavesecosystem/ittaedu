@extends('layouts.layout')

@section('contents')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Enrollment</h1>
            <a class="badge bg-dark text-white ms-2" href="#">
                Details
            </a>
        </div>
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile Details</h5>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title mb-0">{{$data->name}}</h5>
                        <div class="text-muted mb-2">{{$data->tel}}</div>
                        <div class="text-muted mb-2">{{$data->email}}</div>

                        <div>
                            <a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span> Mark Completed</a>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">About</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in <a href="#">{{$data->county}} {{$data->state}}, {{$data->country}}</a></li>

                            <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Course <a href="#">{{$data->course_id}}</a></li>
                            <li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> Highest Education Level <a href="#">{{$data->highest_education_level}}</a></li>
                            <li class="mb-1"><span data-feather="date" class="feather-sm me-1"></span> Suggested Start Date <a href="#">{{explode(" ",$data->suggested_start_date)[0]}}</a></li>
                        </ul>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">Agent</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">Agent <a href="#">{{$data->agent}}</a></li>
                            <li class="mb-1">Agent Name <a href="#">{{$data->agent_resp_name}}</a></li>
                            <li class="mb-1">Agent Email <a href="#">{{$data->agent_resp_email}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-xl-9">
                <div class="card">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Activities</h5>
                    </div>

                    <div class="card-body h-100">
                        @foreach($data->activity as $activity)
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <small class="float-end text-navy">5m ago</small>
                                    <strong>{{$activity->act_by}}</strong> {{$activity->type}} <strong>{{$data->name}}</strong><br />
                                    <small class="text-muted">{{\Carbon\Carbon::parse($activity->created_at)->format('Y-m-d')}}</small><br />

                                </div>
                            </div>
                        @endforeach
                        <hr />

{{--                        <div class="d-grid">--}}
{{--                            <a href="#" class="btn btn-primary">Load more</a>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
