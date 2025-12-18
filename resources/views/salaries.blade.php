@extends('master')

@section('title', 'Salary Page')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/salaries.css') }}">
@endsection

@section('content')
<section class="salary-hero">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-5 fw-bold mb-3">Salary Insights</h1>

                <button class="btn btn-light btn-lg px-4 shadow" data-bs-toggle="modal" data-bs-target="#addSalaryModal">
                    <i class="bi bi-plus-circle me-2"></i> Add Your Salary
                </button>
            </div>
        </div>
    </div>
</section>

<div class="bg-light py-4 border-bottom">
    <div class="container">
        <form method="GET" action="{{ route('salaries.index') }}">
            <div class="row g-3">

                <div class="col-md-4">
                    <input type="text"
                           class="form-control"
                           name="keyword"
                           value="{{ request('keyword') }}"
                           placeholder="Search Internship...">
                </div>

                <div class="col-md-3">
                    <select class="form-select" name="category">
                        <option value="">All Categories</option>
                        @foreach([
                            'Software & IT',
                            'Marketing & Sales',
                            'Design & Creative',
                            'Business & Finance'
                        ] as $cat)
                            <option value="{{ $cat }}"
                                {{ request('category') == $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-funnel"></i> Filter
                    </button>
                </div>

                <div class="col-md-2">
                    <a href="{{ route('salaries.index') }}"
                       class="btn btn-outline-secondary w-100">
                        Reset
                    </a>
                </div>

            </div>
        </form>
    </div>
</div>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">

            @forelse($salaries as $salary)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-90 shadow-sm border-0 hover-card">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <small class="text-muted">
                                    <i class="bi bi-clock"></i>
                                    {{ $salary->created_at->diffForHumans() }}
                                </small>

                                {{-- @if($salary->is_anonymous)
                                    <span class="badge bg-secondary">Anonymous</span>
                                @endif --}}
                            </div>

                            <h5 class="card-title fw-bold mb-2">
                                {{ $salary->job_title }}
                            </h5>

                            <p class="text-muted mb-3">
                                {{ $salary->company_name }}
                            </p>

                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <span class="text-muted">{{ $salary->location }}</span>
                            </div>

                            <div class="text-center">
                                <div class="text-muted small mb-1">Average Salary</div>
                                <h3 class="text-primary fw-bold mb-0">
                                    Rp {{ number_format($salary->average_salary, 0, ',', '.') }}
                                </h3>
                                <small class="text-muted">per month</small>
                            </div>

                            <hr>

                            <div class="row text-center g-3">
                                <div class="col-6">
                                    <small class="text-muted d-block">Min Salary</small>
                                    <strong class="text-dark">
                                        Rp {{ number_format($salary->min_salary, 0, ',', '.') }}
                                    </strong>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block">Max Salary</small>
                                    <strong class="text-dark">
                                        Rp {{ number_format($salary->max_salary, 0, ',', '.') }}
                                    </strong>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">No salary data available yet.</p>
                </div>
            @endforelse

        </div>

        <nav class="mt-5">
            <ul class="pagination justify-content-center">
                {{ $salaries->links('pagination::bootstrap-5') }}
            </ul>
        </nav>
    </div>
</section>

<div class="modal fade" id="addSalaryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Add Salary Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body px-4">
                <form action="{{ route('salaries.store') }}" method="POST">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Internship Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="job_title" placeholder="e.g. Software Engineer Intern" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Company Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="company_name" placeholder="Company name" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Location <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="location" placeholder="e.g. Jakarta" required>
                        </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Internship Type</label>
                                <select class="form-select" name="type">
                                    <option value="">Select Type</option>
                                    <option>On-Site</option>
                                    <option>Hybrid</option>
                                    <option>Remote</option>
                                </select>
                            </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Salary (Rp) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="salary" placeholder="3500000" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary px-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const style = document.createElement('style');
    style.textContent = `
        .hover-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15) !important;
        }
    `;
    document.head.appendChild(style);
</script>
@endsection
