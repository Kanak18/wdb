@extends('admin.layouts.app')

@section('title', 'CMS Page Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>CMS Page Details</h4>
    <div>
        <a href="{{ route('admin.cms.edit', $page->id) }}" class="btn btn-warning me-2">
            <i class="fas fa-edit me-1"></i> Edit
        </a>
        <a href="{{ route('admin.cms.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to List
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <strong>Page Key:</strong> <code>{{ $page->key }}</code>
            </div>
            <div class="col-md-6">
                <strong>Status:</strong>
                @if($page->is_active)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-secondary">Inactive</span>
                @endif
            </div>
        </div>

        <div class="mb-4">
            <strong>Title:</strong>
            <h3>{{ $page->title }}</h3>
        </div>

        @if($page->content)
            <div class="mb-4">
                <strong>Content:</strong>
                <div class="border p-3 rounded mt-2 bg-light">
                    {!! $page->content !!}
                </div>
            </div>
        @endif

        <div class="row">
            @if($page->meta_title)
                <div class="col-md-6 mb-3">
                    <strong>Meta Title:</strong> {{ $page->meta_title }}
                </div>
            @endif
            @if($page->meta_description)
                <div class="col-md-6 mb-3">
                    <strong>Meta Description:</strong> {{ $page->meta_description }}
                </div>
            @endif
        </div>

        <div class="text-muted mt-4">
            <small>Created: {{ $page->created_at->format('M d, Y H:i') }}</small><br>
            <small>Updated: {{ $page->updated_at->format('M d, Y H:i') }}</small>
        </div>
    </div>
</div>
@endsection
