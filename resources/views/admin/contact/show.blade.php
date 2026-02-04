@extends('admin.layouts.app')

@section('title', 'Contact Inquiry Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Contact Inquiry Details</h4>
    <div>
        @if(!$inquiry->is_read)
            <form action="{{ route('admin.contact.toggleRead', $inquiry->id) }}" method="POST" class="d-inline me-2">
                @csrf
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-check me-1"></i> Mark as Read
                </button>
            </form>
        @endif
        <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to List
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <strong>Name:</strong> {{ $inquiry->name }}
            </div>
            <div class="col-md-6">
                <strong>Email:</strong> <a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <strong>Phone:</strong> {{ $inquiry->phone ?: 'Not provided' }}
            </div>
            <div class="col-md-6">
                <strong>Status:</strong>
                @if($inquiry->is_read)
                    <span class="badge bg-success">Read</span>
                @else
                    <span class="badge bg-warning">Unread</span>
                @endif
            </div>
        </div>

        <div class="mb-4">
            <strong>Subject:</strong> {{ $inquiry->subject ?: 'No Subject' }}
        </div>

        <div class="mb-4">
            <strong>Message:</strong>
            <div class="border p-3 rounded mt-2 bg-light">
                {!! nl2br(e($inquiry->message)) !!}
            </div>
        </div>

        <div class="text-muted">
            <small>Received: {{ $inquiry->created_at->format('M d, Y H:i:s') }}</small><br>
            <small>Last Updated: {{ $inquiry->updated_at->format('M d, Y H:i:s') }}</small>
        </div>

        <div class="mt-4 d-flex gap-2">
            <a href="mailto:{{ $inquiry->email }}" class="btn btn-primary">
                <i class="fas fa-reply me-1"></i> Reply via Email
            </a>
            <form action="{{ route('admin.contact.destroy', $inquiry->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this inquiry?')">
                    <i class="fas fa-trash me-1"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
