@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card stat-card" style="background: linear-gradient(135deg, #0f3460, #16213e);">
            <div class="card-body text-center">
                <h2>{{ $totalstudents }}</h2>
                <p class="mb-0">Total Student</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card stat-card" style="background: linear-gradient(135deg, #28a745, #20c997);">
            <div class="card-body text-center">
                <h2>{{ $totalclasses }}</h2>
                <p class="mb-0">Total Classes</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card stat-card" style="background: linear-gradient(135deg, #fd7e14, #ffc107);">
            <div class="card-body text-center">
                <h2>{{ $totalteachers }}</h2>
                <p class="mb-0">Total Teachers</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card stat-card" style="background: linear-gradient(135deg, #6f42c1, #e83e8c);">
            <div class="card-body text-center">
                <h2>{{ $totalsubjects }}</h2>
                <p class="mb-0">Total Subject</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card stat-card" style="background: linear-gradient(135deg, #6f42c1, #e83e8c);">
            <div class="card-body text-center">
                <h2>{{ $recentfivenotices }}</h2>
                <p class="mb-0">Total Notices</p>
            </div>
        </div>
    </div>
</div>

<!-- Quick Links -->


@endsection