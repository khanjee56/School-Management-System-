@extends('layouts.admin')

@section('page-title', 'Students')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>🧑‍🏫 Students</h4>
    <a href="/admin/students/create" class="btn btn-dark">+ Add Students</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Roll Number</th>
                    <th>Phone</th>
                    <th>Adress</th>
                    <th>Parent Phone</th>
                    <th>Parent Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td><strong>{{ $student->user->name }}</strong></td>
                        <td><strong>{{ $student->schoolclass->name }}</strong></td>
                        <td><strong>{{ $student->roll_number }}</strong></td>   
                        <td><strong>{{ $student->phone }}</strong></td>   
                        <td><strong>{{ $student->address }}</strong></td>   
                        <td><strong>{{ $student->parent_phone }}</strong></td>   
                        <td><strong>{{ $student->parent_name }}</strong></td>   
                  <td>
                            <a href="/admin/students/{{ $student->id }}/edit"
                               class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="/admin/students/{{ $student->id }}/delete"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                          
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No Classes Found!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection