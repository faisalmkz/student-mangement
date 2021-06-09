@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Students') }}
                </div>
             
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <table class="table table-bordered table-responsive-lg">
                        <tr>
                            <th>Sl.No</th>
                            <th>Name</th>
                            <th>Standard</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Reporting Teacher</th>
    
                            <th>Action</th>
                        </tr>
                        @foreach ($students as $key=> $student)
                        @php $i = $students->perPage() * ($students->currentPage() - 1); @endphp
                        <tr>
                            <td>{{++$i }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->standard->title }}</td>
                            <td>{{ $student->age }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->reportingTo->name }}</td>
                            <td>
    
                                <form action="{{ route('student.destroy', $student->id) }}" method="POST">
    
                                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary">
                                        <i class="fas fa-edit  fa-lg"></i>Edit
    
                                    </a>
    
                                    @csrf
                                    @method('DELETE')
    
                                    <button type="submit" title="delete" class="btn btn-danger">
                                        <i class="fas fa-trash fa-lg text-danger"></i>
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                      
                        @endforeach
                    </table>
                    {!! $students->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

