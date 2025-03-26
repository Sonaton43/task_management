@extends('layouts.welcome')
@section('section')

  <div class="pagetitle">
    <h1>Tasks</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Add-New Task</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

    <!-- Left side columns -->
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            

                <form class="row g-3 my-2" action="{{Route('tasks.store')}}" method="POST">
                    @csrf

                    <input type="hidden" name="manager_id" value="{{Auth::user()->id}}">
                    <div class="col-md-12">
                        <label for="title" class="form-label">Task Title<span class=" text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{old('title')}}" name="title" id="title">
                        <div class="text-danger">{{$errors->first('title')}}</div>
                    </div>

                    <div class="col-md-12">
                        <label for="description" class="form-label">Task Description</label>
                        <textarea class="form-control" id="description" name="description" cols="30" rows="7"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="project_id " class="form-label">Projects<span class=" text-danger">*</span></label>
                        <select class="form-select"  name="project_id" id="project_id" required>
                            <option disabled selected>Choose...</option>
                            @foreach ($projects as $item)
                                <option value="{{$item->id}}">{{$item->project_name}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">{{$errors->first('project_id')}}</div>
                    </div>

                    <div class="col-md-6">
                        <label for="assigned_to " class="form-label">Assigned To<span class=" text-danger">*</span></label>
                        <select class="form-select"  name="assigned_to" id="assigned_to" required>
                            <option disabled selected>Choose...</option>
                            @foreach ($users as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <div class="text-danger">{{$errors->first('assigned_to')}}</div>
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