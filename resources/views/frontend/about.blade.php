@extends('frontend.layouts.app')

@section('title')
    {{ $page && $page->meta_title ? $page->meta_title : 'About Us - WDB Entrepreneur Fund' }}
@endsection

@section('content')
<section class="about-hero banner-section" id="about">
    <div class="container">
        <div class="about-hero-content hero-left-shape">
            <h1>About us</h1>
            <p>
                Empowering entrepreneurs with the funding and support needed to turn
                growth-stage ideas into thriving, growth-focused businesses.
            </p>
            <a href="#contact" class="contact-btn animate fade-in-up delay-6">
                Apply for Funding
            </a>
        </div>
    </div>
</section>

@if($page && $page->is_active)
    {!! $page->content !!}
@endif

@endsection
