<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WDB Entrepreneur Fund')</title>
    @if(isset($page) && $page)
        <meta name="title" content="{{ $page->meta_title ?: $page->title }}">
        <meta name="description" content="{{ $page->meta_description ?: '' }}">
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/images/favicon-16x16.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <style>        
    </style>
</head>
<body>
    <header id="header">
        <div class="container">
            <div class="header-about">
                <div class="logo">
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ asset('frontend/images/logo.svg') }}" alt="WDB Entrepreneur Fund">
                    </a>
                </div>
                <div class="navigation-bar">
                    <ul class="nav-links" id="navLinks">
                        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                        <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Us</a></li>
                        <li><a href="{{ route('team') }}" class="{{ request()->routeIs('team') ? 'active' : '' }}">Management Team</a></li>
                    </ul>
                    
                    <div class="hamburger" id="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <section class="footer-section" id="contact">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info animate-left">
                    <div class="team-details">
                        <h4 class="footer_title">Welleminah Mdinisa</h4>
                        <p class="role">Fund Manager</p>
                        <img src="{{ asset('frontend/images/footer_img.png') }}" alt="Welleminah Mdinisa" class="team-photo" />
                        <ul class="contact-links">
                            <li>
                                <a class="mail" href="mailto:welleminah@wdbentrepreneurfund.co.za">welleminah@wdbentrepreneurfund.co.za</a>
                            </li>
                            <li><a href="tel:+27828023533">+27 82 802 3533</a></li>
                            <li>Building 2, Pinmill Office Park</li>
                            <li>164 Katherine Street, Sandton, 2196</li>
                        </ul>
                    </div>
                </div>

                <div class="contact-form">
                    <h3 class="footer_title">Contact us</h3>
                    
                    <div class="alert alert-success contact-alert-message" style="background: #ecf7ed; color: #fff; padding: 10px 15px; border-radius: 5px; margin-bottom: 15px; display: none;"></div>
                    
                    <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="first_name" placeholder="First name" required />
                        </div>
                        <div class="form-group">
                            <input type="text" name="last_name" placeholder="Last name" required />
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email address" required />
                        </div>
                        <div class="form-group">
                            <input type="text" name="city" placeholder="City" />
                        </div>
                        <div class="form-group">
                            <textarea name="message" placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit" class="btn-submit">Submit</button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="logo">
                    <img src="{{ asset('frontend/images/logo.svg') }}" alt="">
                </div>
                <p>
                    WDB Entrepreneur Fund (Pty) Ltd (Registration No. 2024/418860/07) is an authorised Financial Services Provider (FSP No. 55325), licensed under the Financial Advisory and Intermediary Services Act 37 of 2002.
                </p>
                <p>
                    <a href="{{ route('download.disclaimer') }}">Disclaimer</a> | 
                    <a href="{{ route('download.popi') }}">Protection of Personal Information Policy (POPI)</a> | 
                    <a href="{{ route('download.paia') }}">PAIA Manual</a> | 
                    <a href="{{ route('download.complaints') }}">Complaints management procedure</a> | 
                    <a href="{{ route('download.privacy') }}">Privacy Notice</a>
                </p>                
            </div>
        </div>
    </section>

    <script src="{{ asset('frontend/main.js') }}"></script>
    @yield('scripts')
</body>
</html>
