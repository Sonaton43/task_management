@extends('layouts.welcome')
@section('section')

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="card-body">
                <h5 class="card-title">All Tasks <span>| </span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">#Project code</th>
                      <th scope="col">Project Name</th>
                      <th scope="col">Task Name</th>
                      <th scope="col">Manager Name</th>
                      <th scope="col">Assigned</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($tasks as $item)
                      <tr>
                        <th scope="row"><a href="#">{{$item->project->project_code}}</a></th>
                        <td>{{$item->project->project_name}}</td>
                        <td><a href="#" class="text-primary">{{$item->title}}</a></td>
                        <td>{{$item->manager->name}}</td>
                        <td>{{$item->assignee->name}}</td>
                        <td><span class="badge @if($item->status == "Pending") bg-danger @elseif($item->status == "Working") bg-warning @else bg-success @endif ">{{$item->status}}</span></td>
                      </tr> 
                    @endforeach
                    

                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Recent Sales -->

        </div>
    </div><!-- End Left side columns -->
  </div>
</section>
  
@endsection