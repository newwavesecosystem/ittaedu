@extends('layouts.layout')

@section('contents')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Create Course
            </h1>
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

        <form class="{{route('admin.courses_create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Course Name: <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Course Name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Course Code: <span class="text-danger">*</span></label>
                            <input type="tel" name="coursecode" class="form-control" placeholder="Enter Course Code" required>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-12 col-lg-6">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Upload template</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">File:<span class="text-danger">* doc or docx only</span></label>
                            <input type="file" name="template" class="form-control" placeholder="Upload File" required>
                        </div>

                        <span class="text-success">The system automatically replace the keywords with applicant information in your template: ${name} ${todaysdate} ${lastname} ${email} ${coursename} ${tel} ${4weeksdate} </span>
                    </div>
                </div>


                <div class="text-center">
                    <button type="reset" class="btn btn-danger btn-lg">Reset Form</button>
                    <button type="submit" class="btn btn-success btn-lg">Create Course</button>
                </div>


            </div>
        </div>
        </form>

    </div>
@endsection
