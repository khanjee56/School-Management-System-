@extends('layouts.admin')

@section('page-title', 'Edit Class')

@section('content')

<div class="card">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">✏️ Edit Class — {{ $class->name }}</h5>
    </div>
    <div class="card-body">
        <form action="/admin/classes/{{ $class->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Class Name</label>
                    <input type="text" name="name" class="form-control"
                          required>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Section</label>
                    <input type="text" name="section" class="form-control"
                          required>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Capacity</label>
                    <input type="number" name="capacity" class="form-control"
                          required>
                </div>
                
            </div>

           
            <div class="d-flex justify-content-between">
                <a href="/admin/classes" class="btn btn-outline-dark">← Back</a>
                <button type="submit" class="btn btn-dark">Update Employee</button>
            </div>

        </form>
    </div>
</div>

@endsection