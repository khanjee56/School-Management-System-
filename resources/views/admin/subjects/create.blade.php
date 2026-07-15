@extends('layouts.admin')

@section('page-title', 'Add Subject')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">➕ Add Subject</h5>
            </div>
            <div class="card-body">
                <form action="/admin/subjects/store" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Subject Name</label>
                        <input type="text" name="name" class="form-control"
                               placeholder="e.g. English" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Code</label>
                        <input type="text" name="code" class="form-control"
                               placeholder="e.g. 101" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                 <div class="col-md-3 mb-3">
                    <label class="form-label">Class Subject</label>
                    <select name="class_id" class="form-control">
    @foreach($classes as $class)
        <option value="{{ $class->id }}">
            {{ $class->name }} - {{ $class->section }}
        </option>
    @endforeach
</select>
                </div>
                    
                   
                    <div class="d-flex justify-content-between">
                        <a href="/admin/classes" class="btn btn-outline-dark">← Back</a>
                        <button type="submit" class="btn btn-dark">Add Subject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection