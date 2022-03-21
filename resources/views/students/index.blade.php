@extends('layouts.student_layout')

@section('css')

<style>
    td{white-space:nowrap;}
</style>

@endsection

@section('content')
<div class="container-fluid">
    <div class="ro">
        <div class="">
        @if ($message = session('success'))
	        <div class="alert alert-success alert-dismissible fade show" role="alert">
	        <div class="text-center h3" ><strong>Success!</strong></div>
	            {{ $message }}
	            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	        </div>
        @endif
        
            <div class="card">

                <div class="card-header">
                    <div class="d-flex justify-content-between">
                    <a href="{{ route('student.create') }}" class=" btn btn-primary">Add Student</a>
                    <a href="{{ route('student.admit_cards') }}" class=" btn btn-primary">All Admit Cards</a>
                    </div>
                </div>

                <div class="card-body  overflow-auto" style="max-height:70vh">
                    <div class="table-responsive">
                        <table class="table">

                            <thead>
                                <tr>
                                    <th class="text-nowrap" scope="col">#</th>
                                    <th class="text-nowrap" scope="col">Id</th>
                                    <th class="text-nowrap" scope="col">Name</th>
                                    <th class="text-nowrap" scope="col">Father's Name</th>
                                    <th class="text-nowrap" scope="col">Class</th>
                                    <th class="text-nowrap" scope="col">Roll No.</th>
                                    <th class="text-nowrap" scope="col">Images</th>
                                    <th class="text-nowrap text-center" scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($students as $student)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->father}}</td>
                                    <td>{{$student->class}}</td>
                                    <td>{{$student->roll}}</td>
                                    <td>
		                                @if($student->image==null)
			                                <a href="{{route('student.upload_image',$student->id)}}" type="button"
			                                class="btn btn-outline-primary">Upload</a>
		                                @else
		                                    <a href="{{route('student.upload_image',$student->id)}}" type="button"
		                                    class="link">
			                                    <img height="50" src="{{asset('upload/images/students/'.$student->image)}}"
			                                    alt="{{$student->image}}">
		                                    </a>
		                                    
		                                    
		                                @endif
                                    </td>
                                    <td>
	                                    <form action="{{ route('student.delete',$student->id) }}" method="POST">
		                                    <div class="btn-group" role="group" aria-label="Basic example">
		                                    
			                                    <a href="{{route('student.view',$student->id)}}" type="button"
			                                    class="btn btn-outline-primary">View</a>
			                                    <a href="{{route('student.edit',$student->id)}}" type="button"
			                                    class="btn btn-outline-warning">Edit</a>
			                                    @csrf
			                                    @method('DELETE')
			                                    <button type="submit" onclick="return confirm('Are you sure to delete this item?')" class="btn btn-outline-danger">Delete</button>
		                                    </div>
	                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection