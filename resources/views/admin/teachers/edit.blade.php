@extends('layouts.admin')

@section('page-title', 'Edit Teacher')

@section('content')

<div class="card">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">✏️ Edit teacher — {{ $teacher->id }}</h5>
    </div>
    <div class="card-body">
        <form action="/admin/teachers/{{ $teacher->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Teacher Name</label>
                    <input type="text" name="name" class="form-control"
                          required>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Employee_code</label>
                    <input type="text" name="code" class="form-control"
                          required>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">phone_number</label>
                    <input type="number" name="phone" class="form-control"
                          required>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Adress</label>
                    <input type="text" name="adress" class="form-control"
                          required>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                          required>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" name="password" class="form-control"
                          required>
                </div>
                
            </div>
                          <div class="mb-3 form-group">
                              <input type="date" id="date_of_joining" name="date_of_joining" required>
                              <label for="date_of_joining">Date of Joining:</label>
                       @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

           
            <div class="d-flex justify-content-between">
                <a href="/admin/teachers" class="btn btn-outline-dark">← Back</a>
                <button type="submit" class="btn btn-dark">Update Employee</button>
            </div>

        </form>
    </div>
</div>

@endsection