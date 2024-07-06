@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Student Details</div>

                    <div class="card-body">
                        @if ($student->profile_photo)
                            <div class="text-center mb-3">
                                <img src="{{ asset('images/' . $student->profile_photo) }}" alt="Profile Photo" class="rounded-circle" style="width: 150px; height: 150px;">
                            </div>
                        @else
                            <div class="text-center mb-3">
                                <p>No profile photo available.</p>
                            </div>
                        @endif
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
