@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Marks') }}
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
                            <th>Maths</th>
                            <th>Science</th>
                            <th>History</th>
                            <th>Term</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($marks as $key=> $mark)
                        <tr>
                            <td>{{$key+1 }}</td>
                            <td>{{ $mark->student_name }}</td>
                            <td>{{ $mark->maths }}</td>
                            <td>{{ $mark->science }}</td>
                            <td>{{ $mark->history }}</td>
                            <td>{{ $mark->term }}</td>
                            <td>{{ $mark->total_mark }}</td>
                            <td>
    
                                <form action="{{ route('student-mark.destroy', $mark->id) }}" method="POST">
    
                                    <a href="{{ route('student-mark.edit', $mark->id) }}" class="btn btn-primary">
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
                    {!! $marks->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

