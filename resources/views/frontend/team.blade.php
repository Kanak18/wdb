@extends('frontend.layouts.app')

@section('title', 'Our Team')

@section('content')
<!-- Page Header -->
<section class="hero-section py-5">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Our Team</h1>
        <p class="lead">Meet the talented professionals behind our success</p>
    </div>
</section>

<!-- Team Section -->
<section class="py-5">
    <div class="container">
        @if($teams->count() > 0)
            <div class="row">
                @foreach($teams as $member)
                    <div class="col-md-4 mb-4">
                        <div class="card team-card h-100 border-0 shadow-sm">
                            @if($member->photo)
                                <img src="{{ Storage::url($member->photo) }}" class="card-img-top" 
                                     alt="{{ $member->name }}">
                            @else
                                <div class="bg-secondary d-flex align-items-center justify-content-center" 
                                     style="height: 200px;">
                                    <i class="fas fa-user text-white fa-4x"></i>
                                </div>
                            @endif
                            <div class="card-body text-center">
                                <h5 class="card-title mb-1">{{ $member->name }}</h5>
                                <p class="text-primary mb-3">{{ $member->role }}</p>
                                @if($member->bio)
                                    <p class="card-text text-muted small">{{ Str::limit($member->bio, 100) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-users fa-4x text-muted mb-4"></i>
                <h3>No Team Members Yet</h3>
                <p class="text-muted">Team members will be displayed here once added from the admin panel.</p>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-4">Want to join our team?</h2>
        <p class="text-muted mb-4">We're always looking for talented individuals</p>
        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
            <i class="fas fa-envelope me-2"></i>Get in Touch
        </a>
    </div>
</section>
@endsection
