@extends('layouts.app')

@section('content')

@php


@endphp
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-middle">
                  <h5>Add Student Mark</h5>
                </div>

                <div class="card-body">
                    <form action="{{route('add.mark')}}" method="post">
                      @csrf
                      <div class="row">

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Student</label>
                            <select class="form-control" id="" name="student">

                              @foreach($students as $student)

                                  <option value="{{$student->id}}"
                                      @if(old('student') == $student->id) selected @endif
                                  >{{$student->name}}</option>
                              
                              @endforeach

                            </select>
                            @error('student')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Term</label>
                            <select class="form-control" id="" name="term">
                              
                                <option value="One" @if(old('term') == 'One') selected @endif>One</option>
                                <option value="Two" @if(old('term') == 'Two') selected @endif>Two</option>
                                <option value="Three" @if(old('term') == 'Three') selected @endif>Three</option>
                                <option value="Four" @if(old('term') == 'Four') selected @endif>Four</option>
                                <option value="Five" @if(old('term') == 'Five') selected @endif>Five</option>

                            </select>
                            @error('term')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-12">
                          <label>Subject Marks</label>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="number" class="form-control @error('maths') is-invalid @enderror" placeholder="Enter Maths Mark" name="maths" value="{{old('maths')}}">
                            @error('maths')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="number" class="form-control  @error('science') is-invalid @enderror" placeholder="Enter Science Mark" name="science" value="{{old('science')}}">
                            @error('science')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="number" class="form-control @error('history') is-invalid @enderror" placeholder="Enter History Mark" name="history" value="{{old('history')}}">
                            @error('history')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>

                       

                        <div class="col-md-12 text-right mt-4">

                          <a href="{{route('mark')}}" class="btn btn-success">Cancel</a>
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
