@extends('layouts.welcome')
@section('section')

  <div class="pagetitle">
    <h1>Projects</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

    <!-- Left side columns -->
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                @include('auth.layouts.message')
                <form class="row g-3 my-2" action="{{Route('project.update')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$item->id}}" name="token">

                    <div class="col-md-12">
                        <label for="project_name" class="form-label">Project Name<span class=" text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{$item->project_name}}" name="project_name" id="project_name">
                        <div class="text-danger">{{$errors->first('project_name')}}</div>
                    </div>

                    <div class="col-md-12">
                        <label for="project_dsc" class="form-label">Project Description</label>
                        <textarea class="form-control" id="project_dsc" name="project_dsc" cols="30" rows="7">{{$item->project_dsc}}</textarea>
                    </div>


                    <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                <!-- End Table with stripped rows -->
            </div>
        </div>
        </div>

    </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#change-password-checkbox').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#password-fields').show();
                } else {
                    $('#password-fields').hide();
                }
            });
        });
    </script>
  
@endsection