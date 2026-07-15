@extends('layouts.admin')

@section('page-title', 'Add Class')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">➕ Add Class</h5>
            </div>
            <div class="card-body">
                <form action="/admin/classes/store" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Class Name</label>
                        <input type="text" name="name" class="form-control"
                               placeholder="e.g. Class 1" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Section</label>
                        <input type="text" name="section" class="form-control"
                               placeholder="e.g. A" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Capacity</label>
                        <input type="number" name="capacity" class="form-control"
                               placeholder="e.g. 30 " required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                   
                    <div class="d-flex justify-content-between">
                        <a href="/admin/classes" class="btn btn-outline-dark">← Back</a>
                        <button type="submit" class="btn btn-dark">Add Class</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection