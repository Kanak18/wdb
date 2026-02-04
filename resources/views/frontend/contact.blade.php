@extends('frontend.layouts.app')

@section('title', $page->title ?? 'Contact Us')

@section('content')
<!-- Page Header -->
<section class="hero-section py-5">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">{{ $page->title ?? 'Contact Us' }}</h1>
        <p class="lead">We'd love to hear from you</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Contact Info -->
            <div class="col-md-5 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h4 class="mb-4">Get in Touch</h4>
                        
                        <div class="d-flex align-items-start mb-4">
                            <div class="bg-primary rounded p-2 me-3">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Address</h6>
                                <p class="text-muted mb-0">123 Business Street<br>New York, NY 10001</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-4">
                            <div class="bg-primary rounded p-2 me-3">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Email</h6>
                                <p class="text-muted mb-0">info@example.com</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-4">
                            <div class="bg-primary rounded p-2 me-3">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Phone</h6>
                                <p class="text-muted mb-0">+1 (555) 123-4567</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start">
                            <div class="bg-primary rounded p-2 me-3">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Business Hours</h6>
                                <p class="text-muted mb-0">Mon - Fri: 9:00 AM - 6:00 PM<br>Sat - Sun: Closed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-7 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h4 class="mb-4">Send us a Message</h4>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Your Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                           id="subject" name="subject" value="{{ old('subject') }}">
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" 
                                          id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h2>Find Us</h2>
        </div>
        <div class="ratio ratio-21x9">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968459391!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes%20Square!5e0!3m2!1sen!2sus!4v1569922325624!5m2!1sen!2sus" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>
@endsection
