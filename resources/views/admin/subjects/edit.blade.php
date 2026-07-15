@extends('layouts.admin')

@section('page-title', 'Edit Subject')

@section('content')

<div class="card">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">✏️ Edit Subject — {{ $subject->name }}</h5>
    </div>
    <div class="card-body">
        <form action="/admin/subjects/{{ $subject->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">subject Name</label>
                    <input type="text" name="name" class="form-control"
                          required>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Code</label>
                    <input type="text" name="code" class="form-control"
                          required>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Class_id</label>
                    <input type="number" name="class_id" class="form-control"
                          required>
                </div>
                
            </div>

           
            <div class="d-flex justify-content-between">
                <a href="/admin/subjects" class="btn btn-outline-dark">← Back</a>
                <button type="submit" class="btn btn-dark">Update Employee</button>
            </div>

        </form>
    </div>
</div>

@endsection