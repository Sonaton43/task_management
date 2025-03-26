@extends('layouts.welcome')
@section('section')

  <div class="pagetitle">
    <h1>Teammates</h1>
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
                <form class="row g-3 my-2" action="{{Route('user.update')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$item->id}}" name="token">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Teammate Name<span class=" text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{$item->name}}" name="name" id="name">
                        <div class="text-danger">{{$errors->first('name')}}</div>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email<span class=" text-danger">*</span></label>
                        <input type="email" class="form-control" value="{{$item->email}}" name="email" id="email">
                        <div class="text-danger">{{$errors->first('email')}}</div>
                    </div>

                    <div class="col-md-4">
                        <label for="phone" class="form-label">Phone<span class=" text-danger">*</span></label>
                        <input type="number" class="form-control" value="{{$item->phone}}" name="phone" id="phone">
                        <div class="text-danger">{{$errors->first('phone')}}</div>
                    </div>

                    <div class="col-md-4">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" class="form-control" value="{{$item->designation}}" name="designation" id="designation">
                        <div class="text-danger">{{$errors->first('designation')}}</div>
                    </div>

                    <div class="col-md-4">
                        <label for="role" class="form-label">Role<span class=" text-danger">*</span></label>
                        <select class="form-select"  name="role" id="role" required>
                            <option disabled selected>Choose...</option>
                            <option value="manager" @if($item->role == "manager") selected @endif>Manager</option>
                            <option value="teammate" @if($item->role == "teammate") selected @endif>Teammate</option>
                        </select>
                        <div class="text-danger">{{$errors->first('role')}}</div>
                    </div>

                    <div class="col-12">
                        <label>
                            <input type="checkbox" id="change-password-checkbox"> Change Password?
                        </label>
                    </div>
                    
                    <div class="col-12" id="password-fields" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="password" class="form-label">New Password<span class=" text-danger">*</span></label>
                                <input type="password" class="form-control" value="{{ old('password') }}" name="password" id="password">
                                <div class="text-danger">{{ $errors->first('password') }}</div>
                            </div>
                        
                            <div class="col-md-6">
                                <label for="cpassword" class="form-label">Confirm Password<span class=" text-danger">*</span></label>
                                <input type="password" class="form-control" value="{{ old('cpassword') }}" name="cpassword" id="cpassword">
                                <div class="text-danger">{{ $errors->first('cpassword') }}</div>
                            </div>
                        </div>
                    </div>


                    <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
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