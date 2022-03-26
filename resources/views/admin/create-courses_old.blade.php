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

        <form class="{{route('admin.courses_create')}}" method="POST">
            @csrf
            <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Title:</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Duration:</label>
                            <input type="tel" name="duration" class="form-control" placeholder="Enter Duration" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Requirement:</label>
                            <textarea class="form-control" name="requirement" rows="5" placeholder="Enter Requirements" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Books:</label>
                            <textarea class="form-control" name="books" rows="5" placeholder="Enter Books" required></textarea>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Other Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Other Requirement:</label>
                            <textarea class="form-control" name="other_requirement" rows="3" placeholder="Enter Requirement" required></textarea>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Others:</label>
                            <textarea class="form-control" name="other" rows="3" placeholder="" required></textarea>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-12 col-lg-6">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Fee</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Total Program Cost:</label>
                            <input type="text" name="cost" class="form-control" placeholder="Enter Program cost" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tuition Fee:</label>
                            <input type="text" name="tution_fee" class="form-control" placeholder="Enter Tuition Fee" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Admission Fee:</label>
                            <input type="text" name="admission_fee" class="form-control" placeholder="Enter Admission Fee" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Graduation Fee:</label>
                            <input type="text" name="graduation_fee" class="form-control" placeholder="Enter Graduation Fee" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Other Fee:</label>
                            <input type="text" name="other_fee" class="form-control" placeholder="0.00" required>
                        </div>
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
