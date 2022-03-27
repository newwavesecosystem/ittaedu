@extends('layouts.layout')

@section('contents')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Modify Course
            </h1>
        </div>


        <form action="{{route('admin.courses_update')}}" method="POST" enctype="multipart/form-data">
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
                            <input type="hidden" name="id" class="form-control" value="{{$data->id}}" required>
                            <input type="text" name="title" class="form-control" placeholder="Enter Course Name" value="{{$data->title}}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Course Code: <span class="text-danger">*</span></label>
                            <input type="tel" name="coursecode" class="form-control" placeholder="Enter Course Code" value="{{$data->coursecode}}" required>
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
                            <input type="file" name="template" class="form-control" placeholder="Upload File">
                        </div>

                        <span class="text-success">The system automatically replace the keywords with applicant information in your template: ${name} ${todaysdate} ${lastname} ${email} ${coursename} ${tel} ${4weeksdate} </span>
                    </div>
                </div>


                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">Update Course</button>
                </div>


            </div>
        </div>
        </form>

    </div>
@endsection
