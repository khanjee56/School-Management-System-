@extends('layouts.admin')

@section('page-title', 'Teachers')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>🧑‍🏫 Teachers</h4>
    <a href="/admin/teachers/create" class="btn btn-dark">+ Add Subjects</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Employee Code</th>
                    <th>Phone Number</th>
                    <th>Adress</th>
                    <th>Date of Joining</th>
                  
                   
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teacher as $teachers)
                    <tr>
                        <td>{{ $teachers->id }}</td>
                          <td><span class="badge bg-primary">{{ $teachers->user->name }}</span></td>
                        <td><strong>{{ $teachers->employee_code }}</strong></td>  
                        <td><strong>{{ $teachers->phone_number }}</strong></td>  
                       
                        <td><strong>{{ $teachers->adress }}</strong></td>  
                        <td><strong>{{ $teachers->joining_date }}</strong></td>  
                        
                       <td>
                            <a href="/admin/teachers/{{ $teachers->id }}/edit"
                               class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="/admin/teachers/{{ $teachers->id }}/delete"
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