@extends('admin.layouts.app')

@section('title', 'Team Member Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Team Member Details</h4>
    <div>
        <a href="{{ route('admin.team.edit', $team->id) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit me-1"></i> Edit
        </a>
        <a href="{{ route('admin.team.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to List
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                @if($team->photo)
                    <img src="{{ Storage::url($team->photo) }}" alt="{{ $team->name }}" 
                         class="rounded mb-3" width="200" height="200" style="object-fit: cover;">
                @else
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-center mx-auto mb-3" 
                         style="width: 200px; height: 200px;">
                        <i class="fas fa-user text-white" style="font-size: 4rem;"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <h3>{{ $team->name }}</h3>
                <p class="text-muted">{{ $team->role }}</p>
                
                <div class="mb-3">
                    <strong>Status:</strong>
                    @if($team->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </div>

                <div class="mb-3">
                    <strong>Unique Key:</strong> <code>{{ $team->key }}</code>
                </div>

                <div class="mb-3">
                    <strong>Sort Order:</strong> {{ $team->sort_order }}
                </div>

                @if($team->bio)
                    <div class="mb-3">
                        <strong>Bio:</strong>
                        <p class="mt-2">{{ $team->bio }}</p>
                    </div>
                @endif

                <div class="text-muted">
                    <small>Created: {{ $team->created_at->format('M d, Y H:i') }}</small><br>
                    <small>Updated: {{ $team->updated_at->format('M d, Y H:i') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
