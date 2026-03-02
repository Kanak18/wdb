@extends('frontend.layouts.app')

@section('title')
    {{ $page && $page->meta_title ? $page->meta_title : 'WDB Entrepreneur Fund - Funding Small Businesses in South Africa' }}
@endsection

@section('content')
<section class="hero-section banner-section" id="home">
    <div class="container">
        <div class="hero-content hero-left-shape">
            <h1>
                Funding Small Businesses <br />
                in South Africa
            </h1>
            <ul class="hero-features">
                <li>Equity funding for growth-ready businesses</li>
                <li>Focused on women and youth-led businesses</li>
                <li>Hands-on support</li>
                <li>Driving job creation and community impact</li>
            </ul>
            <a href="#contact" class="contact-btn animate fade-in-up delay-6">
                Apply for Funding
            </a>
        </div>
    </div>
</section>

@if($page && $page->is_active)
    {!! $page->content !!}
@else
<section class="section-bbee" id="about">
    <div class="container">
        <h2 class="pagetitle animate-on-scroll">
            Transforming B-BBEE Compliance into <br />
            Economic Transformation
        </h2>
        <div class="divider"></div>
        <div class="section-info">
            <p class="section-text animate-on-scroll">
                Many organisations are under increasing pressure to meet their
                B-BBEE targets, yet struggle to find credible investment-ready
                businesses that can absorb capital and deliver measurable,
                reportable impact. Traditional Enterprise Development initiatives
                are often fragmented, difficult to administer, and fail to create
                long-term economic value.
            </p>

            <p class="section-text animate-on-scroll">
                Corporate South Africa subscribes for equity shares in the WDB
                Entrepreneur Fund and these funds are treated as measurable B-BBEE
                points on their B-BBEE scorecards. The WDB Entrepreneur Fund deploys
                these funds into emerging black-owned SMEs by providing them with
                development funding, growth capital, mentorship and post-investment
                management.
            </p>

            <p class="section-text animate-on-scroll">
                The WDB Entrepreneur Fund offers a structured, professionally
                managed solution that allows corporates to deploy Enterprise
                Development capital efficiently and with confidence. Through the
                Fund, capital is pooled and strategically invested into
                high-potential, black-owned small and medium enterprises across key
                sectors of the economy.
            </p>
        </div>
    </div>
</section>
@endif

<section class="section-difference">
    <div class="container">
        <h2 class="pageTitle animate-left">The WDB difference</h2>

        <div class="difference-content animate-right">
            <div class="difference-columns">
                <div class="difference-column">
                    <h3>For Investors</h3>
                    <ul class="difference-list">
                        <li>Deploy your ED capital efficiently</li>
                        <li>Maximise your points on your B-BBEE scorecard</li>
                        <li>Earn competitive financial returns on your investment</li>
                        <li>Achieve genuine transformational credentials</li>
                    </ul>
                </div>

                <div class="difference-column">
                    <h3>For Entrepreneurs</h3>
                    <ul class="difference-list">
                        <li>Access patient growth capital</li>
                        <li>Receive strategic operational support</li>
                        <li>Build sustainable, independent businesses</li>
                        <li>Join a proven development ecosystem</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-metrics">
    <div class="container">
        <h2 class="pageTitle animate-left visible">Key Metrics</h2>
        <div class="divider"></div>
        <div class="metrics-grid animate-scale">
            <div class="metric-item">
                <span>Total Capital Raised</span>
                <h3>R45.9m</h3>
            </div>
            <div class="metric-item">
                <span>Small Businesses Funded</span>
                <h3>19</h3>
            </div>
            <div class="metric-item">
                <span>Capital Deployed</span>
                <h3>100%</h3>
            </div>
            <div class="metric-item">
                <span>NAV Growth (year on year)</span>
                <h3>10.6%</h3>
            </div>
            <div class="metric-item">
                <span>Fund NAV (Audited 2025)</span>
                <h3>R68.7m</h3>
            </div>
            <div class="metric-item">
                <span>Exits</span>
                <h3>12</h3>
            </div>
        </div>

        <div class="metrics-subtext animate-on-scroll">
            <p>
                Since inception R45.9 million raised and 100% was invested into 19
                small business. To date, the fund has executed exit of 12 businesses
                and have achieved a 10.6% NAV year on year.
            </p>
        </div>
    </div>
</section>

<div class="info-section">
    <div class="container">
        <p class="section-text animate-on-scroll visible">
            The WDB Entrepreneur Fund is an impact-focused investment fund
            committed to supporting high-potential small and medium enterprises
            across South Africa. Our focus is on woman and youth-led businesses
            with the ability to grow sustainably, create jobs, and contribute
            meaningfully to the broader economy particularly in sectors where
            access to capital can unlock significant opportunity.
        </p>
        <p class="section-text animate-on-scroll visible">
            Our core mission is to expand access to funding for businesses,
            especially those led by women and youth operating in underserved or
            under-resourced communities. Many of these entrepreneurs face
            structural barriers to finance despite having viable, growth-oriented
            businesses. By providing targeted funding and strategic support, the
            Fund enables these enterprises to scale, strengthen their operations,
            and build long-term resilience.
        </p>
    </div>
</div>

<section class="section-approach">
    <div class="container">
        <h2 class="pagetitle animate-on-scroll">Our investment approach</h2>
        <div class="approach-subheader animate-on-scroll">
            <h3 class="small_heading">Beyond Capital: Hands-On Support</h3>
            <p>
                We invest with purpose, combining disciplined financial
                decision-making with a clear focus on measurable social and economic
                outcomes. Our approach extends beyond capital, offering:
            </p>
        </div>

        <div class="approach-grid">
            <div class="approach-card animate-on-scroll">
                <div class="approach-icon"><img src="{{ asset('frontend/images/strategic_ic.svg') }}" alt="Strategic guidance"></div>
                <div class="approach-content">
                    <h3>Strategic guidance</h3>
                    <p>Helping entrepreneurs navigate growth challenges</p>
                </div>
            </div>

            <div class="approach-card animate-on-scroll">
                <div class="approach-icon"><img src="{{ asset('frontend/images/mentorship_ic.svg') }}" alt="Mentorship"></div>
                <div class="approach-content">
                    <h3>Mentorship</h3>
                    <p>Connecting business leaders with experienced advisors</p>
                </div>
            </div>

            <div class="approach-card animate-on-scroll">
                <div class="approach-icon"><img src="{{ asset('frontend/images/access_ic.svg') }}" alt="Market access"></div>
                <div class="approach-content">
                    <h3>Market access</h3>
                    <p>Opening doors to networks and supply chains</p>
                </div>
            </div>

            <div class="approach-card animate-on-scroll">
                <div class="approach-icon"><img src="{{ asset('frontend/images/support_ic.svg') }}" alt="Governance support"></div>
                <div class="approach-content">
                    <h3>Governance support</h3>
                    <p>Strengthening business foundations for long-term success</p>
                </div>
            </div>
        </div>

        <p class="approach-footer animate-on-scroll">
            This holistic model helps entrepreneurs improve governance, enhance
            financial management, and position their businesses for sustainable
            growth.
        </p>
    </div>
</section>
@endsection
