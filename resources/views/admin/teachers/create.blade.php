@extends('layouts.admin')

@section('page-title', 'Add Teacher')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">➕ Add Teacher</h5>
            </div>
            <div class="card-body">
                <form action="/admin/teachers/store" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Teacher Name</label>
                        <input type="text" name="name" class="form-control"
                               placeholder="e.g. Teacher 1" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Employee_Code</label>
                        <input type="text" name="code" class="form-control"
                               placeholder="e.g. 001" required>
                        @error('code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                               placeholder="e.g. abc@gmail.com" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="text" name="password" class="form-control"
                               placeholder="e.g. 123456" required>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                 <div class=" mb-3">
                    <label class="form-label">Phone_number</label>
                    <input type="number" name="phone" class="form-control"
                         placeholder= "e.g. 03000000000" required>
                           @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
                 <div class=" mb-3">
                    <label class="form-label">Adress</label>
                    <input type="Text" name="adress" class="form-control"
                         placeholder= "e.g. Karachi" required>
                           @error('adress')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                </div>
                <div class="mb-3 form-group">
    <label for="date_of_joining">Date of Joining:</label>
    <input type="date" id="date_of_joining" name="date_of_joining" required>
                       @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
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