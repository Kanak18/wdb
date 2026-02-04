@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-primary p-3 me-3">
                        <i class="fas fa-users text-white fs-4"></i>
                    </div>
                    <div>
                        <p class="text-muted mb-1">Team Members</p>
                        <h3 class="mb-0">{{ \App\Models\Team::count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-success p-3 me-3">
                        <i class="fas fa-file-alt text-white fs-4"></i>
                    </div>
                    <div>
                        <p class="text-muted mb-1">CMS Pages</p>
                        <h3 class="mb-0">{{ \App\Models\CMSPage::count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle bg-warning p-3 me-3">
                        <i class="fas fa-envelope text-white fs-4"></i>
                    </div>
                    <div>
                        <p class="text-muted mb-1">Unread Messages</p>
                        <h3 class="mb-0">{{ \App\Models\ContactInquiry::where('is_read', false)->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Recent Team Members</span>
                <a href="{{ route('admin.team.index') }}" class="btn btn-sm btn-primary">View All</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(\App\Models\Team::latest()->take(5)->get() as $member)
                            <tr>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->role }}</td>
                                <td>
                                    @if($member->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No team members found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Recent Contact Inquiries</span>
                <a href="{{ route('admin.contact.index') }}" class="btn btn-sm btn-primary">View All</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(\App\Models\ContactInquiry::latest()->take(5)->get() as $inquiry)
                            <tr>
                                <td>{{ $inquiry->name }}</td>
                                <td>{{ $inquiry->subject ?: 'No Subject' }}</td>
                                <td>
                                    @if($inquiry->is_read)
                                        <span class="badge bg-success">Read</span>
                                    @else
                                        <span class="badge bg-warning">Unread</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No inquiries found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
