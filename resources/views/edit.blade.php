@extends('layouts.app')

@section('content')

@php


@endphp
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-middle">
                  <h5>Update Student</h5>
                </div>

                <div class="card-body">
                    <form action="{{route('update.student')}}" method="post">
                      @csrf
                      <div class="row">

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" name="name" value="{{$student->name}}">
                            @error('name')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" placeholder="Enter Age" name="age" value="{{$student->age}}">
                            @error('age')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                               <label>Gender</label>
                            <!-- Default radio -->
                                <div class="form-check">
                                  <input
                                    class="form-check-input"
                                    type="radio"
                                    name="gender"
                                    value="male"

                                    @if($student->gender == 'male')
                                      checked
                                    @endif
                                  />
                                  <label class="form-check-label"> Male </label>
                                </div>

                                <!-- Default checked radio -->
                                <div class="form-check">
                                  <input
                                    class="form-check-input"
                                    type="radio"
                                    name="gender"
                                    value="female"
                                    @if($student->gender == 'female')
                                      checked
                                    @endif
                                  />
                                  <label class="form-check-label"> Female </label>
                                </div>

                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Reporting Teacher</label>
                            <select class="form-control" id="" name="teacher">
                              
                              <option value="Teacher1" @if($student->report_teacher == 'Teacher1') selected @endif>Teacher1</option>
                              <option value="Teacher2" @if($student->report_teacher == 'Teacher2') selected @endif>Teacher2</option>
                              <option value="Teacher3" @if($student->report_teacher == 'Teacher3') selected @endif>Teacher3</option>
                              <option value="Teacher4" @if($student->report_teacher == 'Teacher4') selected @endif>Teacher4</option>
                              <option value="Teacher5" @if($student->report_teacher == 'Teacher5') selected @endif>Teacher5</option>
                            </select>
                            @error('teacher')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>

                        <input type="hidden" name="student_id" value="{{$student->id}}">
                        <div class="col-md-12 text-right mt-4">

                          <a href="{{route('home')}}" class="btn btn-success">Cancel</a>
                          <button class="btn btn-primary" type="submit">Update</button>

                        </div>


                      </div>


                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
