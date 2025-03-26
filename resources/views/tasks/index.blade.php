@extends('layouts.welcome')
@section('section')

  <div class="pagetitle">
    <h1>Tasks</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Tasks</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

    <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body" style="overflow-x: scroll;white-space: nowrap">
                    <h5 class="card-title">
                        @include('auth.layouts.message')
                        @if (Auth::user()->role == "manager")
                          <div class="d-flex justify-content-between">
                            <a href="{{Route('tasks.create')}}" class="btn btn-primary">Add-New Task +</a>
                          </div>
                        @endif
                    </h5>
        
        
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                      <thead>
                        <tr>
                          <th>Sl.</th>
                          <th>
                            <b>T</b>ask title
                          </th>
                          <th>Project Name</th>
                          <th>Manager Name</th>
                          <th>Assigned To</th>
                          <th>Status</th>
                          @if (Auth::user()->role == "manager")
                          <th>Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
        
                        @foreach ($items as $item)
                          @if (Auth::user()->role == "manager" || Auth::user()->id == $item->assigned_to)
                              <tr>
                                  <td>{{ $loop->index + 1 }}</td>
                                  <td>{{ $item->title }}</td>
                                  <td>{{ $item->project->project_name }}</td>
                                  <td>{{ $item->manager->name }}</td>
                                  <td>{{ $item->assignee->name }}</td>
                                  <td>
                                      <form action="{{ Route('tasks.status') }}" method="GET">
                                          <input type="hidden" value="{{ $item->id }}" name="token">
                                          <select name="status" class="form-select" onchange="this.form.submit()">
                                              <option value="Pending" @if($item->status == "Pending") selected @endif>Pending</option>
                                              <option value="Working" @if($item->status == "Working") selected @endif>Working</option>
                                              <option value="Done" @if($item->status == "Done") selected @endif>Done</option>
                                          </select>
                                      </form>
                                  </td>
                      
                                  @if (Auth::user()->role == "manager")
                                      <td style="min-width: 90px">
                                          <a href="{{ Route('tasks.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a> 
                                          <a href="{{ Route('tasks.delete', $item->id) }}" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                      </td>
                                  @endif
                              </tr>
                          @endif
                        @endforeach
                     
        
                      </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>

    </div>
    </section>
  
@endsection