@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Student</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                            </div>

                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="enrollment_date">Enrollment Date</label>
                                <input type="date" class="form-control" id="enrollment_date" name="enrollment_date" value="{{ old('enrollment_date') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="school_id">School</label>
                                <select class="form-control" id="school_id" name="school_id">
                                    @foreach($schools as $school)
                                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="profile_photo">Profile Photo</label>
                                <input type="file" name="profile_photo" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
