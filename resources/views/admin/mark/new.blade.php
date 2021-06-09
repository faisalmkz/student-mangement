@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Marks') }}
                </div>

                <div class="card-body">

                    <form  method="POST" action="{{ route('student-mark.store') }}">
                        {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Student Name </label>
                                <select class="form-control" id="exampleFormControlSelect1" name="student_id">
                                    <option value="">Select Student</option>
                                    @foreach ($students as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->name}}</option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                <p class="text text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Term </label>
                                <select class="form-control" id="exampleFormControlSelect1" name="term_id">
                                    <option value="">Select Term</option>
                                    @foreach ($terms as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->title}}</option>
                                    @endforeach
                                </select>
                                @error('term_id')
                                <p class="text text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Maths</label>
                                <input type="number" name="maths" class="form-control" id="exampleInputEmail1">
                                @error('maths')
                                <p class="text text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Science</label>
                                <input type="number" name="science" class="form-control" id="exampleInputEmail1">
                                @error('science')
                                <p class="text text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">History</label>
                                <input type="number" name="history" class="form-control" id="exampleInputEmail1">
                                @error('history')
                                <p class="text text-danger">
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

