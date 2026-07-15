@extends('layouts.admin')

@section('page-title', 'Subjects')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>🧑‍🏫 Subjects</h4>
    <a href="/admin/subjects/create" class="btn btn-dark">+ Add Subjects</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Class_id</th>
                   
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subject as $subjects)
                    <tr>
                        <td>{{ $subjects->id }}</td>
                        <td><strong>{{ $subjects->name }}</strong></td>
                        <td><strong>{{ $subjects->code }}</strong></td>  
                        <td><span class="badge bg-primary">{{ $subjects->schoolclass->name }}</span></td>
                       <td>
                            <a href="/admin/subjects/{{ $subjects->id }}/edit"
                               class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="/admin/subjects/{{ $subjects->id }}"
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