@extends('master')

@section('title', $company->name)

@section('styles')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<div class="bg-light py-5 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="bg-light rounded p-2" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="img-fluid rounded">
                                </div>
                            </div>
                            <div class="col">
                                <h2 class="fw-bold mb-2">
                                    {{ $company->name }}
                                </h2>
                                <p class="text-muted mb-1">
                                    <i class="bi bi-briefcase me-2"></i>
                                    {{ $company->industry }}
                                </p>
                                <p class="text-muted mb-0">
                                    <i class="bi bi-geo-alt me-2"></i>
                                    {{ $company->location }}
                                </p>
                            </div>
                            <div class="col-auto text-end">
                                <div class="mb-2">
                                    <div class="text-warning mb-1">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <p class="text-muted mb-0 small">
                                        {{ $company->reviews_count }} reviews
                                    </p>
                                </div>
                                <button class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#addReviewModal">
                                    <i class="bi bi-plus-circle me-2"></i> Add Review
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <h4 class="fw-bold mb-3">About This Company</h4>
                        <p class="text-muted">
                            {{ $company->description }}
                        </p>

                        <div class="row mt-4">
                            <div class="col-md-6 mb-3">
                                <strong class="d-block text-dark mb-1">
                                    <i class="bi bi-people text-primary me-2"></i> Company Size
                                </strong>
                                <span class="text-muted">{{ $company->size }}</span>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong class="d-block text-dark mb-1">
                                    <i class="bi bi-globe text-primary me-2"></i> Website
                                </strong>
                                <a href="#" class="text-primary text-decoration-none">{{ $company->website }}</a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong class="d-block text-dark mb-1">
                                    <i class="bi bi-envelope text-primary me-2"></i> Email
                                </strong>
                                <span class="text-muted">{{$company->email}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="fw-bold mb-4">Internship Reviews</h4>

                        @forelse($company->reviews as $review)

                        <div class="border-bottom pb-4 mb-4">
                            <div class="d-flex align-items-start mb-3">
                                <div class="me-3">
                                    <div class="bg-primary rounded-circle text-white fw-bold" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                        {{ $review->is_anonymous ? 'AN' : strtoupper(substr($review->user->name,0,2)) }}
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-1">
                                        {{ $review->is_anonymous ? 'Anonymous' : $review->user->name }}
                                    </h6>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="text-warning me-2">
                                            @for($i=1;$i<=5;$i++)
                                                <i class="bi {{ $i <= $review->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                            @endfor
                                        </div>
                                        <small class="text-muted">
                                            {{ $review->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                    <div class="mb-2">
                                        <span class="badge bg-light text-dark me-2">{{ $review->position }}</span>
                                        <span class="badge bg-light text-dark">{{ $review->duration }}</span>
                                    </div>
                                    <p class="text-muted mb-0">
                                        {{ $review->content }}
                                    </p>
                                </div>
                                                            <div class="dropdown">
                                <button class="btn btn-link text-muted" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <button class="dropdown-item text-danger" onclick="confirmDelete()">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            </div>

                        </div>

                        @empty
                            <p class="text-muted">No reviews yet.</p>
                        @endforelse
                    </div>
                </div>

                <div class="text-end mt-4">
                    <a href="{{ url('/companies') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-2"></i> Back to Companies
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addReviewModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Add Your Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body px-4">
                <form method="POST" action="{{ route('reviews.store', $company) }}">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Overall Rating <span class="text-danger">*</span></label>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-outline-warning star-rating" data-rating="1">
                                <i class="bi bi-star"></i>
                            </button>
                            <button type="button" class="btn btn-outline-warning star-rating" data-rating="2">
                                <i class="bi bi-star"></i>
                            </button>
                            <button type="button" class="btn btn-outline-warning star-rating" data-rating="3">
                                <i class="bi bi-star"></i>
                            </button>
                            <button type="button" class="btn btn-outline-warning star-rating" data-rating="4">
                                <i class="bi bi-star"></i>
                            </button>
                            <button type="button" class="btn btn-outline-warning star-rating" data-rating="5">
                                <i class="bi bi-star"></i>
                            </button>
                        </div>
                        <input type="hidden" name="rating" id="ratingInput" required>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Position <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="position" placeholder="e.g. Software Engineer Intern" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Duration</label>
                            <input type="text" class="form-control" name="duration" placeholder="e.g. 3 months">
                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label fw-semibold">Your Review <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="content" rows="5" placeholder="Share your internship experience..." required></textarea>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="anonymous">
                        <label class="form-check-label" for="anonymous">
                            Post anonymously
                        </label>
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary px-4">
                            Submit Review
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    document.querySelectorAll('.star-rating').forEach(button => {
        button.addEventListener('click', function() {
            const rating = this.dataset.rating;
            document.getElementById('ratingInput').value = rating;

            document.querySelectorAll('.star-rating').forEach((btn, index) => {
                if (index < rating) {
                    btn.classList.remove('btn-outline-warning');
                    btn.classList.add('btn-warning');
                    btn.querySelector('i').classList.remove('bi-star');
                    btn.querySelector('i').classList.add('bi-star-fill');
                } else {
                    btn.classList.remove('btn-warning');
                    btn.classList.add('btn-outline-warning');
                    btn.querySelector('i').classList.remove('bi-star-fill');
                    btn.querySelector('i').classList.add('bi-star');
                }
            });
        });
    });
</script>
@endsection
