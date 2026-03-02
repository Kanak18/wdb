@extends('frontend.layouts.app')

@section('title', 'About Us - WDB Entrepreneur Fund')

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

@if($pageAboutWdbEntrepreneurFund && $pageAboutWdbEntrepreneurFund->is_active)
    {!! $pageAboutWdbEntrepreneurFund->content !!}
@else
<section class="section-fund">
    <div class="small_container">
        <div class="fund-card animate-on-scroll">
            <h2 class="pagetitle">About WDB Entrepreneur Fund</h2>
            <div class="divider"></div>
            <div class="section-info">
                <h3 class="small_heading animate-on-scroll">
                    Bridging Capital, Compliance, and Transformation
                </h3>
                <p class="section-text animate-on-scroll">
                    We are a dedicated Enterprise Development investment fund creating
                    sustainable value for corporate South Africa and black-owned
                    enterprises alike.
                </p>

                <h3 class="small_heading animate-on-scroll" style="margin-top: 32px">
                    Our Story
                </h3>
                <p class="section-text animate-on-scroll">
                    Founded from a clear recognition of the gap between corporate
                    B-BBEE compliance needs and the genuine capital requirements of
                    black-owned SMMEs, the WDB Entrepreneur Fund was established to
                    create a sustainable bridge between these two worlds.
                </p>
                <p class="section-text animate-on-scroll">
                    With an existing portfolio we have proven that Enterprise
                    Development can deliver both meaningful transformation and
                    competitive financial performance.
                </p>
            </div>
        </div>
    </div>
</section>
@endif

<section class="section-purpose">
    <div class="container">
        <div class="purpose-grid animate-on-scroll">
            <img src="{{ asset('frontend/images/purpose_img.png') }}" alt="Team collaboration" class="purpose-image animate-left" />
            <div class="purpose-content animate-right">
                <h2 class="small_heading">Our Purpose</h2>
                <p class="section-text">
                    We exist to transform regulatory requirements into genuine
                    economic empowerment.
                </p>
                <p class="section-text">
                    For corporate South Africa, we provide a seamless,
                    B-BBEE-compliant investment fund that maximizes enterprise
                    development scorecard points while deploying capital efficiently.
                </p>
                <p class="section-text">
                    For black-owned enterprises, we deliver patient capital, strategic
                    support, and operational expertise to build sustainable,
                    independent businesses.
                </p>
                <p class="section-text">
                    For the South African economy, we create jobs, foster
                    entrepreneurship, and advance genuine transformation.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-philosophy">
    <div class="small_container">
        <div class="philosophy-card animate-on-scroll">
            <h2 class="pagetitle">Our Investment Philosophy</h2>
            <div class="divider"></div>
            <div class="philosophy-diagram animate-scale">
                <img src="{{ asset('frontend/images/philosophy-diagram.svg') }}" alt="Investment Philosophy">
            </div>

            <div class="philosophy-footer animate-on-scroll">
                <h4 class="small_heading">Dual Mandate, Single Focus.</h4>
                <p class="section-text">
                    We believe that financial returns and social impact are not
                    mutually exclusive they are mutually reinforcing.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-enterprise">
    <div class="small_container">
        <h2 class="pagetitle">Understanding Enterprise Development</h2>
        <div class="divider"></div>
        <div class="enterprise-card animate-on-scroll">
            <h3 class="small_heading animate-on-scroll">
                What is Enterprise Development?
            </h3>
            <p class="section-text animate-on-scroll">
                Enterprise Development (ED) is a business-to-black business
                transaction with the objective of providing contributions to
                qualifying enterprises to assist them in their operational and
                financial development. The ultimate goal: creating sustainable,
                independent black-owned businesses that thrive beyond preferential
                procurement.
            </p>

            <h3 class="small_heading animate-on-scroll" style="margin-top: 40px">
                The B-BBEE Scorecard Impact
            </h3>

            <div class="table-container animate-on-scroll">
                <table class="enterprise-table">
                    <thead>
                        <tr>
                            <th>ED Threshold</th>
                            <th>Requirement</th>
                            <th>Points achieved</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Maximum points</td>
                            <td>1% of NPAT spent on ED</td>
                            <td>10 points</td>
                        </tr>
                        <tr>
                            <td>Subminimum requirements</td>
                            <td>0.4% of NPAT spent on ED</td>
                            <td>2 points</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="key-advantage animate-on-scroll">
                <p>
                    <strong>Key Advantage:</strong> ED initiatives can be structured
                    alongside Empowering Supplier status, creating compounding
                    benefits for your scorecard.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-regulatory">
    <div class="small_container">
        <div class="regulatory-card animate-on-scroll">
            <h3 class="small_heading">The Regulatory Context</h3>
            <p class="regulatory-text">
                There are no direct financial penalties for non-B-BBEE compliant
                businesses. However, the B-BBEE Scorecard system creates powerful
                market incentives:
            </p>
            <ul class="regulatory-list">
                <li>
                    Procurement managers enhance their own scorecards by favoring
                    compliant suppliers
                </li>
                <li>
                    Buyers earn preferential procurement points by choosing
                    ED-invested businesses
                </li>
                <li>
                    Non-compliant businesses face indirect exclusion from corporate
                    supply chains
                </li>
            </ul>
        </div>
    </div>
</section>
@endsection
