@extends('layouts.welcome')
@section('section')

  <div class="pagetitle">
    <h1>Teammates</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Add-New Teammate</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

    <!-- Left side columns -->
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            

                <form class="row g-3 my-2" action="{{Route('user.store')}}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <label for="name" class="form-label">Teammate Name<span class=" text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{old('name')}}" name="name" id="name">
                        <div class="text-danger">{{$errors->first('name')}}</div>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email<span class=" text-danger">*</span></label>
                        <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email">
                        <div class="text-danger">{{$errors->first('email')}}</div>
                    </div>

                    <div class="col-md-4">
                        <label for="phone" class="form-label">Phone<span class=" text-danger">*</span></label>
                        <input type="number" class="form-control" value="{{old('phone')}}" name="phone" id="phone">
                        <div class="text-danger">{{$errors->first('phone')}}</div>
                    </div>

                    <div class="col-md-4">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" class="form-control" value="{{old('designation')}}" name="designation" id="designation">
                        <div class="text-danger">{{$errors->first('designation')}}</div>
                    </div>

                    <div class="col-md-4">
                        <label for="role" class="form-label">Role<span class=" text-danger">*</span></label>
                        <select class="form-select"  name="role" id="role" required>
                            <option disabled selected>Choose...</option>
                            <option value="manager">Manager</option>
                            <option value="teammate">Teammate</option>
                        </select>
                        <div class="text-danger">{{$errors->first('role')}}</div>
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label">Password<span class=" text-danger">*</span></label>
                        <input type="password" class="form-control" value="{{old('password')}}" name="password" id="password">
                        <div class="text-danger">{{$errors->first('password')}}</div>
                    </div>

                    <div class="col-md-6">
                        <label for="cpassword" class="form-label">Confirm Password<span class=" text-danger">*</span></label>
                        <input type="password" class="form-control" value="{{old('cpassword')}}" name="cpassword" id="cpassword">
                        <div class="text-danger">{{$errors->first('cpassword')}}</div>
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
  
@endsection