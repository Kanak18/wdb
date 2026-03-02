@extends('frontend.layouts.app')

@section('title', 'Management Team - WDB Entrepreneur Fund')

@section('content')
<section class="team-hero banner-section" id="team">
    <div class="container">
        <div class="team-hero-content hero-left-shape">
            <h1>Management team</h1>
            <p>
                Dedicated investment specialists supporting the growth of
                entrepreneurs and businesses in underserved communities.
            </p>
            <a href="#contact" class="contact-btn animate fade-in-up delay-6">
                Apply for Funding
            </a>
        </div>
    </div>
</section>

<!-- Intro Section -->
<section class="section-intro">
    <div class="container">
        <p class="section-text animate-on-scroll">
            An experienced, all-female investment team dedicated to supporting the
            growth of women-led and impact-driven businesses across South Africa.
        </p>
        <p class="section-text animate-on-scroll">
            Combining strong financial expertise with a deep understanding of the
            real challenges entrepreneurs face, the team works closely with
            portfolio companies to unlock opportunities, strengthen operations,
            and build resilient, scalable enterprises. Their hands-on approach
            goes beyond funding, providing strategic guidance, access to networks,
            and practical support at every stage of the growth journey. By pairing
            capital with insight and mentorship, the team helps businesses not
            only secure financing, but grow with confidence, create jobs, and
            deliver lasting impact in their communities.
        </p>
    </div>
</section>

<!-- Team Section -->
<section class="section-team">
    <div class="container">
        @if($teams->count() > 0)
            <div class="team-grid">
                @foreach($teams as $member)
                    <div class="team-card animate-on-scroll">
                        <div class="team-image-wrapper">
                            @if($member->photo)
                                <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}" class="team-image" />
                            @else
                                <div class="team-image" style="background: #e0f0e0; display: flex; align-items: center; justify-content: center;">
                                    <span style="font-size: 14px; color: #147146;">No Photo</span>
                                </div>
                            @endif
                        </div>
                        <div class="team-content">
                            <h2 class="team-name">{{ $member->name }}</h2>
                            <p class="team-role">{{ $member->role }}</p>
                            @if($member->bio)
                                <p class="team-bio">{{ $member->bio }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Static team members from design -->
            <div class="team-grid">
                <div class="team-card animate-on-scroll">
                    <div class="team-image-wrapper">
                        <img src="{{ asset('frontend/images/welleminah_img.png') }}" alt="Welleminah Mdinisa" class="team-image" />
                    </div>
                    <div class="team-content">
                        <h2 class="team-name">Welleminah Mdinisa</h2>
                        <p class="team-role">Fund Manager</p>
                        <p class="team-bio">
                            An experienced investment professional with 10 years of
                            experience in research, financial modelling, deal sourcing, and
                            post-investment support. As the Fund Manager, she plays the
                            pivotal role in overseeing investment decisions, portfolio
                            strategy, and execution. She is a registered Business
                            Practitioner and a member of the Institute of Business Advisors
                            South Africa (IBASA) and South Africa, specializing in business
                            analysis and guiding portfolio companies.
                        </p>
                    </div>
                </div>
                <div class="team-card animate-on-scroll">
                    <div class="team-image-wrapper">
                        <img src="{{ asset('frontend/images/lerato_img.png') }}" alt="Lerato Maswanganyi" class="team-image" />
                    </div>
                    <div class="team-content">
                        <h2 class="team-name">Lerato Maswanganyi</h2>
                        <p class="team-role">Senior Investment Analyst</p>
                        <p class="team-bio">
                            A seasoned professional with 14 years in the financial services
                            industry. She possesses extensive expertise in financial
                            modelling, private equity valuations, portfolio analysis, and
                            investment management. She supports the Fund Manager in
                            investment evaluation, due diligence, and portfolio monitoring.
                            She is also a licensed Business Rescue Practitioner, bringing
                            valuable expertise in financial restructuring and turnaround
                            situations.
                        </p>
                    </div>
                </div>
                <div class="team-card animate-on-scroll">
                    <div class="team-image-wrapper">
                        <img src="{{ asset('frontend/images/nomathemba_img.png') }}" alt="Nomathemba Nhlapo" class="team-image" />
                    </div>
                    <div class="team-content">
                        <h2 class="team-name">Nomathemba Nhlapo</h2>
                        <p class="team-role">Investment Analyst</p>
                        <p class="team-bio">
                            A results-oriented financial accounting professional with a BCom
                            Hons in Financial Accounting and four years of practical
                            experience as a Junior Accountant. Ms. Nhlapo supports the team
                            with detailed financial statement analysis, due diligence
                            preparation, audit support, and the maintenance of precise
                            financial records. Her proficiency with industry-standard tools
                            and commitment to accuracy contribute to the robust financial
                            oversight of the Fund's operations and portfolio.
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
