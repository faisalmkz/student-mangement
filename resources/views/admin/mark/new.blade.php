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
                                    <option value="{{ $value->id }}" {{old('student_id') == $value->id ? 'selected' : ''}}>{{ $value->name}}</option>
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
                                    <option value="{{ $value->id }}" {{old('term_id') == $value->id ? 'selected' : ''}}>{{ $value->title}}</option>
                                    @endforeach
                                </select>
                                @error('term_id')
                                <p class="text text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmailmat">Maths</label>
                                <input type="number" name="maths" class="form-control" id="exampleInputEmailmat"  value="{{ old('maths') }}">
                                @error('maths')
                                <p class="text text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmailScie">Science</label>
                                <input type="number" name="science" class="form-control" id="exampleInputEmailScie"  value="{{ old('science') }}">
                                @error('science')
                                <p class="text text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputHis">History</label>
                                <input type="number" name="history" class="form-control" id="exampleInputHis"  value="{{ old('history') }}">
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

