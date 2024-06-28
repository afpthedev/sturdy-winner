@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">School Details</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <td>{{ $school->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $school->name }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $school->address }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('schools.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
