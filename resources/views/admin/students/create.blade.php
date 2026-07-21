@extends('layouts.admin')

@section('page-title', 'Add Student')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">➕ Add Student</h5>
            </div>
            <div class="card-body">
                <form action="/admin/students/store" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label"> Name</label>
                        <input type="text" name="name" class="form-control"
                               placeholder="e.g. Class 1" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Email</label>
                        <input type="email" name="email" class="form-control"
                               placeholder="e.g. Class 1" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> password</label>
                        <input type="text" name="password" class="form-control"
                               placeholder="e.g. Class 1" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Parent Name</label>
                        <input type="text" name="parentname" class="form-control"
                               placeholder="e.g. ALI" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Parent Email</label>
                        <input type="email" name="parentemail" class="form-control"
                               placeholder="e.g. email" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                  <div class="mb-3">
    <label for="class_id" class="form-label">Class</label>

    <select name="class_id" id="class_id" class="form-control" required>
        <option value="">-- Select Class --</option>

        @foreach ($class as $classes)
            <option value="{{ $classes->id }}">
                {{ $classes->name }}
            </option>
        @endforeach
    </select>

    @error('class_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
                    <div class="mb-3">
                        <label class="form-label">Roll number</label>
                        <input type="text" name="rollnumber" class="form-control"
                               placeholder="ST004" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender </label>
                        <input type="text" name="gender" class="form-control"
                               placeholder="Male" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address </label>
                        <input type="text" name="address" class="form-control"
                               placeholder="Karachi" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                        <div class="mb-3 form-group">
                              <input type="date" id="date_of_birth" name="date_of_birth" required>
                              <label for="date_of_birth">Date of birth:</label>
                       @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label class="form-label"> Parent Phone</label>
                        <input type="number" name="parentphone" class="form-control"
                               placeholder="e.g. 30 " required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">  Phone</label>
                        <input type="number" name="phone" class="form-control"
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