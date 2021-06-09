@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Student') }}
                </div>

                
                <div class="card-body">

                    <form  method="POST" action="{{ route('student.store') }}">
                        {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                                @error('name')
                                <p class="alert alert-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="number" name="age" class="form-control" id="age" placeholder="Age">
                                @error('age')
                                <p class="alert alert-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                                @error('gender')
                                <p class="alert alert-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
        
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Standard </label>
                                <select class="form-control" id="exampleFormControlSelect2" name="standard_id">
                                <option value="">Select Standard</option>
                                                    @foreach ($standards as $key => $value)
                                                    <option value="{{ $value->id }}">{{ $value->title}}</option>
                                                    @endforeach
                                </select>
                                @error('standard_id')
                                <p class="alert alert-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Reporting Teacher </label>
                                <select class="form-control" id="exampleFormControlSelect1" name="reporting_to">
                                <option value="">Select Teacher</option>
                                                    @foreach ($teachers as $key => $value)
                                                    <option value="{{ $value->id }}">{{ $value->name}}</option>
                                                    @endforeach
                                </select>
                                @error('reporting_to')
                                <p class="alert alert-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
        
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

