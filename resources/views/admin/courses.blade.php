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
                        <tr>
                            <td>1</td>
                            <td>Project Apollo</td>
                            <td>hhfhf</td>
                            <td class="d-none d-xl-table-cell">01/01/2021</td>
                            <td class="d-none d-xl-table-cell">31/06/2021</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                            <td class="d-none d-md-table-cell"><button class="btn btn-primary">View</button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
