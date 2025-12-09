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
                            JD
                        </div>
                        <button class="edit-avatar-btn" title="Change profile picture">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </div>
                    
                    <h3 class="profile-name">
                        {{-- {{ Auth::user()->name }} --}}
                        John Doe
                    </h3>
                    <p class="profile-status">
                        Student at Bina Nusantara University
                    </p>
                    
                    <div class="profile-info-item">
                        <div class="profile-info-label">Email</div>
                        <div class="profile-info-value">
                            {{-- {{ Auth::user()->email }} --}}
                            john.doe@binus.ac.id
                        </div>
                    </div>
                    
                    <div class="profile-info-item">
                        <div class="profile-info-label">University</div>
                        <div class="profile-info-value">Bina Nusantara University</div>
                    </div>
                    
                    <div class="profile-info-item">
                        <div class="profile-info-label">Location</div>
                        <div class="profile-info-value">Jakarta, Indonesia</div>
                    </div>
                    
                    
                    <button class="btn-logout" onclick="confirmLogout()">
                        <i class="bi bi-box-arrow-right"></i> Sign out
                    </button>
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
                        
                        <form action="#" method="POST">
                            {{-- action="{{ route('profile.update') }}" --}}
                            @csrf
                            @method('PUT')
                            
                            <div class="row">

                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">
                                            Full Name <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="name" value="John Doe" required>
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
                                        <input type="email" class="form-control" value="john.doe@binus.ac.id" disabled>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">
                                            University or College <span class="required">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="university" value="Bina Nusantara University" required>
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

