@extends('master')

@section('title', 'My Profile')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="profile-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="profile-card">
                    <div class="profile-avatar-wrapper">
                        <div class="profile-avatar">
                            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 2)) }}
                        </div>
                        <button class="edit-avatar-btn" title="Change profile picture">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </div>

                    <h3 class="profile-name">
                        {{ Auth::user()->name }}
                    </h3>
                    <p class="profile-status">
                        Student at {{ Auth::user()->university ?? '-' }}
                    </p>

                    <div class="profile-info-item">
                        <div class="profile-info-label">Email</div>
                        <div class="profile-info-value">
                            {{ Auth::user()->email }}
                        </div>
                    </div>

                    <div class="profile-info-item">
                        <div class="profile-info-label">University</div>
                        <div class="profile-info-value">
                            {{ Auth::user()->university ?? '-' }}
                        </div>
                    </div>

                    <div class="profile-info-item">
                        <div class="profile-info-label">Location</div>
                        <div class="profile-info-value">Jakarta, Indonesia</div>
                    </div>

                    {{-- LOGOUT --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn-logout">
                            <i class="bi bi-box-arrow-right"></i> Sign out
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="detail-card">
                    <div class="detail-card-title">
                        Profile
                    </div>

                    <div class="detail-section">
                        <h4 class="section-title">
                            My Information
                        </h4>
                        <p class="section-description">
                            Get the best job matches and a more relevant community experience.
                        </p>

                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">
                                            Full Name <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="name"
                                           value="{{ old('name', Auth::user()->name) }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">
                                            Location <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="location" value="Jakarta, Indonesia" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control"
                                           value="{{ Auth::user()->email }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">
                                            University or College <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="university"
                                           value="{{ old('university', Auth::user()->university) }}" required>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="form-label">Major</label>
                                <input type="text" class="form-control" name="major" placeholder="e.g. Computer Science">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Bio</label>
                                <textarea class="form-control" name="bio" rows="4" placeholder="Tell us about yourself..."></textarea>
                            </div>

                            <button type="submit" class="btn-save">
                                <i class="bi bi-check-lg"></i> Save Changes
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
