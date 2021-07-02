@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        

        <div class="col-md-12">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-middle">
                <div class="align-middle"><h5 >Student Marks</h5></div>

                <a href="{{route('mark.show.create')}}" class="btn btn-success">ADD MARK</a>
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
                          <th scope="col">Maths</th>
                          <th scope="col">Science</th>
                          <th scope="col">History</th>
                          <th scope="col">Term</th>
                          <th scope="col">Total Marks</th>
                          <th scope="col">Created On</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @forelse($marks as $index => $mark)
                          <tr>
                            <th scope="row">{{$index + 1}}</th>
                            <td>{{$mark->student->name}}</td>
                            <td>{{$mark->maths}}</td>
                            <td>{{$mark->science}}</td>
                            <td>{{$mark->history }}</td>
                            <td>{{$mark->term }}</td>
                            <td>{{$mark->total }}</td>
                            <td>{{Carbon\Carbon::parse($mark->created_at)->format('M d, Y h:i A')}}</td>
                            <td>
                                <a href="{{route('mark.show.edit',$mark->id)}}" class="btn btn-primary active">Edit</a>
                                <a href="{{route('delete.mark',$mark->id)}}" class="btn btn-danger active">Delete</a>

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
