@extends('layouts.layout')

@section('contents')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Modify template
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
                <div class="col-12 col-lg-12">
                    <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Modify Template</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Sender:</label>
                            <input type="text" name="sender" class="form-control" placeholder="Enter Sender" value="{{$data->sender}}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Subject:</label>
                            <input type="tel" name="subject" class="form-control" placeholder="Enter Duration" value="{{$data->subject}}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Body:</label>
                            <textarea class="form-control" name="body" rows="5" required>{{$data->body}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">CSS:</label>
                            <textarea class="form-control" name="css" rows="5" required>{{$data->css}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status:</label>

                            <select name="status" class="form-select mb-3" required>
                                <option value="1" @if($data->status ==1) selected @endif>Active</option>
                                <option value="0" @if($data->status ==0) selected @endif>Inactive</option>
                            </select>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        </form>

    </div>
@endsection
