@extends('layouts.admin')

@section('page-title', 'Classes')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>🧑‍🏫 Classes</h4>
    <a href="/admin/classes/create" class="btn btn-dark">+ Add Classes</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Section</th>
                    <th>Capacity</th>
                    <th>Students</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($classes as $class)
                    <tr>
                        <td>{{ $class->id }}</td>
                        <td><strong>{{ $class->name }}</strong></td>
                        <td><strong>{{ $class->section }}</strong></td>
                        <td><strong>{{ $class->capacity }}</strong></td>   
                        <td><span class="badge bg-primary">{{ $class->student_count }}</span></td>
                        <td>
                            <a href="/admin/classes/{{ $class->id }}/edit"
                               class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="/admin/classes/{{ $class->id }}/delete"
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