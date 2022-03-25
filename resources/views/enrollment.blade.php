@extends('layouts.applicant')

@section('contents')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">DATA SUBMISSION
            </h1>
            <a class="badge bg-dark text-white ms-2" href="#">
                FORM
            </a>
        </div>


        @if ($errors->any())
            <div class="alert alert-danger bg-danger py-4 px-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success bg-success py-4 px-4">
                {!! session('success') !!}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger bg-danger py-4 px-4">
                {{ session('error') }}
            </div>
        @endif

        <form class="{{route('enrollment')}}" method="POST">
            @csrf
            <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Personal Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address:</label>
                            <textarea class="form-control" name="address" rows="2" placeholder="Enter Address" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tel:</label>
                            <input type="tel" name="tel" class="form-control" placeholder="+234 7000" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" placeholder="someone@gmail.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Highest Education Level:</label>
                            <input type="text" name="highest_education_level" class="form-control" placeholder="e.g High School" required>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Residence</h5>
                    </div>
                    <div class="card-body">
                        <select name="country" class="form-select mb-3" required>
                            <option selected>Select Country</option>
                            @foreach($countries as $country)
                                <option>{{$country}}</option>
                            @endforeach
                        </select>

                        <select name="state" class="form-select mb-3" required>
                            <option selected>Select State</option>
                            <option>California</option>
                        </select>

                        <select name="county" class="form-select mb-3" required>
                            <option selected>Select County</option>
                            <option>Bush</option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Agent Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Agent:</label>
                            <input type="text" name="agent" class="form-control" placeholder="Enter Agent">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Agent Reps Name:</label>
                            <input type="text" name="agent_resp_name" class="form-control" placeholder="Enter Reps Name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Agent Reps Email:</label>
                            <input type="email" name="agent_resp_email" class="form-control" placeholder="agent@mail.com">
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Course</h5>
                    </div>
                    <div class="card-body">
                        <select name="course_id" class="form-select mb-3" required>
                            <option selected>Select Course</option>
                            @foreach($courses as $course)
                                <option>{{$course->title}}</option>
                            @endforeach
                        </select>

                        <div class="mb-3">
                            <label class="form-label">Suggested Start Date:</label>
                            <input type="date" name="suggested_start_date" class="form-control" required>
                        </div>
                    </div>

                </div>

                <div class="text-center">
                    <button type="reset" class="btn btn-danger btn-lg">Reset Form</button>
                    <button type="submit" class="btn btn-success btn-lg">SUBMIT FORM</button>
                </div>


            </div>
        </div>
        </form>

    </div>
@endsection
