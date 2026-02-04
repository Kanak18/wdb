@extends('frontend.layouts.app')

@section('title', $page->title ?? 'Welcome')

@section('content')
@if(!$page || !$page->is_active)
    <!-- Hero Section (Default) -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Welcome to {{ config('app.name') }}</h1>
            <p class="lead mb-4">Building innovative solutions for a better tomorrow</p>
            <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                <i class="fas fa-envelope me-2"></i>Get in Touch
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="text-center">
                        <i class="fas fa-rocket fa-3x text-primary mb-3"></i>
                        <h4>Fast & Efficient</h4>
                        <p class="text-muted">We deliver solutions quickly without compromising quality.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="text-center">
                        <i class="fas fa-shield-alt fa-3x text-primary mb-3"></i>
                        <h4>Secure & Reliable</h4>
                        <p class="text-muted">Our solutions are built with security and reliability in mind.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="text-center">
                        <i class="fas fa-users fa-3x text-primary mb-3"></i>
                        <h4>Expert Team</h4>
                        <p class="text-muted">Work with industry professionals who care about your success.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@else
    <!-- CMS-driven content -->
    {!! $page->content !!}
@endif

<!-- CTA Section -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-4">Ready to work together?</h2>
        <p class="text-muted mb-4">Get in touch with us to discuss your project</p>
        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">
            <i class="fas fa-envelope me-2"></i>Contact Us
        </a>
    </div>
</section>
@endsection
