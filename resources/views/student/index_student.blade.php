@extends('layouts.student_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    <div class="flex justify-content-around">
                        <a href="{{ route('student.create') }}" class=" btn btn-primary">Add Student</a>
                    </div>
                </div>

                <div class="card-body  overflow-auto" style="height:80vh">
                    <div class="table-responsive">
                        <table class="table">

                            <thead>
                                <tr>
                                    <th class="text-nowrap" scope="col">#</th>
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
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->father}}</td>
                                    <td>{{$student->class}}</td>
                                    <td>{{$student->roll}}</td>
                                    <td>
                                        <img height="50" src="/upload/images/students/{{$student->image}}"
                                            alt="{{$student->image}}">
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/student/view/{{$student->id}}" type="button"
                                                class="btn btn-outline-primary">View</a>
                                            <a href="/student/edit/{{$student->id}}" type="button"
                                                class="btn btn-outline-warning">Edit</a>
                                            <a href="/student/delete/{{$student->id}}" type="button"
                                                class="btn btn-outline-danger">Delete</a>
                                        </div>
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