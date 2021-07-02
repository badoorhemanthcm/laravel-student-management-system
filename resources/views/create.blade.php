@extends('layouts.app')

@section('content')

@php


@endphp
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-middle">
                  <h5>Add Student</h5>
                </div>

                <div class="card-body">
                    <form action="{{route('create.student')}}" method="post">
                      @csrf
                      <div class="row">

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" name="name" value="{{old('name')}}">
                            @error('name')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" placeholder="Enter Age" name="age" value="{{old('age')}}">
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
                                    checked
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
                                  />
                                  <label class="form-check-label"> Female </label>
                                </div>

                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Reporting Teacher</label>
                            <select class="form-control" id="" name="teacher">
                              
                              <option value="Teacher1" @if(old('teacher') == 'Teacher1') selected @endif>Teacher1</option>
                              <option value="Teacher2" @if(old('teacher') == 'Teacher2') selected @endif>Teacher2</option>
                              <option value="Teacher3" @if(old('teacher') == 'Teacher3') selected @endif>Teacher3</option>
                              <option value="Teacher4" @if(old('teacher') == 'Teacher4') selected @endif>Teacher4</option>
                              <option value="Teacher5" @if(old('teacher') == 'Teacher5') selected @endif>Teacher5</option>
                            </select>
                            @error('teacher')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>

                       

                        <div class="col-md-12 text-right mt-4">

                          <a href="{{route('home')}}" class="btn btn-success">Cancel</a>
                          <button class="btn btn-primary" type="submit">Submit</button>

                        </div>


                      </div>


                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
