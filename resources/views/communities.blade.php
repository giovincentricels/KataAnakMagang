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
                    
                    {{-- FOREACH DIMULAI DI SINI --}}
                    {{-- @foreach($posts as $post) --}}
                    <div class="post-card">
                        <div class="post-header">
                            <div class="post-avatar">
                                {{-- {{ strtoupper(substr($post->user->name, 0, 2)) }} --}}
                                JD
                            </div>
                            <div class="post-user-info flex-grow-1">
                                <h6>
                                    {{-- {{ $post->user->name }} --}}
                                    John Doe
                                </h6>
                                <span class="post-time">
                                    {{-- {{ $post->created_at->diffForHumans() }} --}}
                                    2 hours ago
                                </span>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-link text-muted" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            {{-- href="{{ route('communities.edit', $post->id) }}" --}}
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <button class="dropdown-item text-danger" onclick="confirmDelete()">
                                            {{-- onclick="confirmDelete({{ $post->id }})" --}}
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="post-content">
                            {{-- {{ $post->content }} --}}
                            I recently had a phone screening for a job. At the end of the screening, I was asked if I prayed. I asked why? The interviewer said it's a smaller company and the owners believe in prayer before company meetings...
                        </div>
                        

                    </div>
                    {{-- @endforeach --}}
                    {{-- FOREACH BERAKHIR DI SINI --}}
                    
                    <!-- Contoh Post 2 -->
                    <div class="post-card">
                        <div class="post-header">
                            <div class="post-avatar" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                                AS
                            </div>
                            <div class="post-user-info flex-grow-1">
                                <h6>Amanda Smith</h6>
                                <span class="post-time">1 day ago</span>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-link text-muted" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                                    <li><button class="dropdown-item text-danger"><i class="bi bi-trash"></i> Delete</button></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="post-content">
                            Just finished my 3-month internship at a tech startup. The experience was amazing! Great mentorship, real projects, and wonderful team culture. Highly recommend this company for aspiring developers!
                        </div>
                        

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
                <form action="#" method="POST">
                    {{-- action="{{ route('communities.store') }}" --}}
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">What's on your mind?</label>
                        <textarea class="form-control" name="content" rows="5" placeholder="Share your internship experience, tips, or questions..." required></textarea>
                    </div>
                    <div class="d-flex gap-2 justify-content-end">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
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

@section('scripts')
<script>
    function confirmDelete(postId) {
        if (confirm('Are you sure you want to delete this post?')) {
            // Form submit untuk delete
            // document.getElementById('delete-form-' + postId).submit();
            alert('Post deleted! (Implementasi backend needed)');
        }
    }
</script>
@endsection