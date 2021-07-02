@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        

        <div class="col-md-12">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-middle">
                <div class="align-middle"><h5 >Students</h5></div>

                <a href="{{route('student.show.create')}}" class="btn btn-success">ADD STUDENT</a>
                </div>

                <div class="card-body">
                  @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert">
                      <strong>{{session()->get('message')}}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endif
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Age</th>
                          <th scope="col">Gender</th>
                          <th scope="col">Reporting Teacher</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @forelse($students as $index => $student)
                          <tr>
                            <th scope="row">{{$index + 1}}</th>
                            <td>{{$student->name}}</td>
                            <td>{{$student->age}}</td>
                            <td>{{$student->gender}}</td>
                            <td>{{$student->report_teacher }}</td>
                            <td>
                                <a href="{{route('student.show.edit',$student->id)}}" class="btn btn-primary active">Edit</a>
                                <a href="{{route('delete.student',$student->id)}}" class="btn btn-danger active">Delete</a>

                            </td>
                          </tr>

                        @empty
                            <tr>
                              

                              <td colspan="9" class="text-center">No Student found!</td>

                            </tr>
                        @endforelse
                        
                      </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
