@extends('master')

@section('title', 'Communities Page')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/communities.css') }}">
@endsection

@section('content')
<div class="communities-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar">
                    <button class="btn-create-post" data-bs-toggle="modal" data-bs-target="#createPostModal">
                        <i class="bi bi-plus-lg"></i> Create post
                    </button>

                    <h5 class="sidebar-title">Your Career Network</h5>

                    <div class="text-center mt-4">
                        <a href="/companies" class="btn-explore">
                            <i class="bi bi-compass"></i> Explore Companies
                        </a>

                        <a href="/salaries" class="btn-explore">
                            <i class="bi bi-cash-stack"></i> Explore Salaries
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="main-content">
                    <input type="text" class="search-bar" placeholder="Search for conversations">

                    @forelse($posts as $post)
                        <div class="post-card">
                            <div class="post-header">
                                <div class="post-avatar">
                                    {{ strtoupper(substr($post->user->name, 0, 2)) }}
                                </div>

                                <div class="post-user-info flex-grow-1">
                                    <h6>{{ $post->user->name }}</h6>
                                    <span class="post-time">
                                        {{ $post->created_at->diffForHumans() }}
                                    </span>
                                </div>

                                @auth
                                    @if(auth()->id() === $post->user_id)
                                        <div class="dropdown">
                                            <button class="btn btn-link text-muted" data-bs-toggle="dropdown">
                                                <i class="bi bi-three-dots"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <form action="{{ route('communities.destroy', $post->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item text-danger"
                                                            onclick="return confirm('Delete this post?')">
                                                            <i class="bi bi-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                @endauth
                            </div>

                            <div class="post-content">
                                {{ $post->content }}
                            </div>
                        </div>
                    @empty
                        <p class="text-muted text-center mt-4">
                            No posts yet. Be the first to share!
                        </p>
                    @endforelse

                    <div class="mt-4">
                        {{ $posts->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createPostModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Create New Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('communities.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">What's on your mind?</label>
                        <textarea
                            class="form-control"
                            name="content"
                            rows="5"
                            placeholder="Share your internship experience, tips, or questions..."
                            required></textarea>
                    </div>

                    <div class="d-flex gap-2 justify-content-end">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-submit-post">
                            Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
