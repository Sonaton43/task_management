@extends('layouts.welcome')
@section('section')

  <div class="pagetitle">
    <h1>Teammates</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Teammates</li>
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
                        <div class="d-flex justify-content-between">
                          <a href="{{Route('user.create')}}" class="btn btn-primary">Add New Teammate +</a>
                        </div>
                    </h5>
        
        
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                      <thead>
                        <tr>
                          <th>Sl.</th>
                          <th>
                            <b>N</b>ame
                          </th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Role</th>
                          <th>Designation</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
        
                        @foreach ($items as $item)
                        <tr>
                          <td>{{ $loop->index+1 }}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->email}}</td>
                          <td>0{{$item->phone}}</td>
                          <td>{{$item->role}}</td>
                          <td>{{$item->designation}}</td>
                          <td style="min-width: 90px">
                            <a href="{{Route('user.edit',$item->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a> 
                            <a href="{{Route('user.delete',$item->id)}}" onclick="return confirm('Are you sure you want delete record?');" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                          </td>
                        </tr>
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