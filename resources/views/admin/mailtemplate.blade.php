@extends('layouts.layout')

@section('contents')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Email</strong> Template</h1>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Templates</h5>
                    </div>
                    <table class="table table-hover my-0">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Sender</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Date Modified</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->sender}}</td>
                                <td>{{$data->subject}}</td>
                                <td class="d-none d-md-table-cell">
                                    @if($data->status==1)
                                        <span class="badge bg-success">Active</span>
                                    @elseif($data->status==0)
                                        <span class="badge bg-warning">Inactive</span>
                                    @else
                                        <span class="badge bg-warning">oK</span>
                                    @endif

                                </td>
                                <td class="d-none d-md-table-cell">{{$data->updated_at}}</td>
                                <td class="d-none d-md-table-cell"><a href="{{route('admin.mailtemplate.show', $data->id)}}" class="btn btn-primary">View</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
