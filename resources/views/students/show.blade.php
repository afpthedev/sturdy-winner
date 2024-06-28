@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Student Details</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <td>{{ $student->id }}</td>
                            </tr>
                            <tr>
                                <th>First Name</th>
                                <td>{{ $student->first_name }}</td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td>{{ $student->last_name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $student->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $student->phone_number }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $student->address }}</td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td>{{ $student->date_of_birth }}</td>
                            </tr>
                            <tr>
                                <th>Enrollment Date</th>
                                <td>{{ $student->enrollment_date }}</td>
                            </tr>
                            <tr>
                                <th>School</th>
                                <td>{{ $student->school->name }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
