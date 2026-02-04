<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\CMSPage;
use App\Models\ContactInquiry;
use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        // Create default admin user
        $adminExists = Admin::where('email', 'admin@example.com')->exists();
        if (!$adminExists) {
            Admin::create([
                'name' => 'Super Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'),
            ]);
        }

        // Create sample team members
        $teamMembers = [
            [
                'name' => 'John Smith',
                'role' => 'CEO & Founder',
                'key' => 'john-smith',
                'bio' => 'John is the visionary leader behind our company with over 20 years of experience in the industry.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Sarah Johnson',
                'role' => 'Chief Operating Officer',
                'key' => 'sarah-johnson',
                'bio' => 'Sarah oversees daily operations and ensures everything runs smoothly.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Michael Chen',
                'role' => 'CTO',
                'key' => 'michael-chen',
                'bio' => 'Michael leads our technology team and drives innovation.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Emily Davis',
                'role' => 'Marketing Director',
                'key' => 'emily-davis',
                'bio' => 'Emily creates and executes marketing strategies that grow our brand.',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($teamMembers as $member) {
            $exists = Team::where('key', $member['key'])->exists();
            if (!$exists) {
                Team::create($member);
            }
        }

        // Create CMS pages
        $cmsPages = [
            [
                'key' => 'homepage',
                'title' => 'Welcome to Our Company',
                'content' => '
                    <section class="py-5">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="mb-4">About Our Company</h2>
                                    <p class="lead">We are a dynamic organization dedicated to delivering exceptional solutions.</p>
                                    <p>Founded with a vision to transform industries through innovation, we have grown to become a trusted partner for businesses worldwide.</p>
                                    <p>Our team of experts combines deep industry knowledge with cutting-edge technology to deliver results that matter.</p>
                                </div>
                                <div class="col-md-6">
                                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600" 
                                         alt="About Us" class="img-fluid rounded shadow">
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    <section class="py-5 bg-light">
                        <div class="container">
                            <h2 class="text-center mb-5">Our Values</h2>
                            <div class="row">
                                <div class="col-md-4 text-center mb-4">
                                    <i class="fas fa-lightbulb fa-3x text-primary mb-3"></i>
                                    <h4>Innovation</h4>
                                    <p>We constantly push boundaries to find better solutions.</p>
                                </div>
                                <div class="col-md-4 text-center mb-4">
                                    <i class="fas fa-handshake fa-3x text-primary mb-3"></i>
                                    <h4>Integrity</h4>
                                    <p>We conduct business with honesty and transparency.</p>
                                </div>
                                <div class="col-md-4 text-center mb-4">
                                    <i class="fas fa-users fa-3x text-primary mb-3"></i>
                                    <h4>Collaboration</h4>
                                    <p>We work together to achieve shared goals.</p>
                                </div>
                            </div>
                        </div>
                    </section>
                ',
                'meta_title' => 'Welcome to Our Company',
                'meta_description' => 'Learn about our company and our commitment to delivering exceptional solutions.',
                'is_active' => true,
            ],
            [
                'key' => 'contact',
                'title' => 'Contact Us',
                'content' => '
                    <section class="py-5">
                        <div class="container">
                            <div class="text-center mb-5">
                                <h2>Get in Touch</h2>
                                <p class="text-muted">We would love to hear from you. Reach out to us for any inquiries.</p>
                            </div>
                        </div>
                    </section>
                ',
                'meta_title' => 'Contact Us',
                'meta_description' => 'Get in touch with our team for any questions or inquiries.',
                'is_active' => true,
            ],
        ];

        foreach ($cmsPages as $page) {
            $exists = CMSPage::where('key', $page['key'])->exists();
            if (!$exists) {
                CMSPage::create($page);
            }
        }
    }
}
