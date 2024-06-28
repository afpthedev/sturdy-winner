@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-4">Schools</h1>
                <a href="{{ route('schools.create') }}" class="btn btn-primary mb-3">Add New School</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($schools as $school)
                        <tr>
                            <td>{{ $school->id }}</td>
                            <td>{{ $school->name }}</td>
                            <td>{{ $school->address }}</td>
                            <td>
                                <a href="{{ route('schools.show', $school->id) }}" class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('schools.edit', $school->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('schools.destroy', $school->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No schools found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
