@extends('admin.layouts.app')

@section('title', 'Contact Inquiries')

@section('content')
<h4 class="mb-4">Contact Inquiries</h4>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inquiries as $inquiry)
                    <tr class="{{ !$inquiry->is_read ? 'table-warning' : '' }}">
                        <td>{{ $inquiry->name }}</td>
                        <td>{{ $inquiry->email }}</td>
                        <td>{{ $inquiry->subject ?: 'No Subject' }}</td>
                        <td>
                            @if($inquiry->is_read)
                                <span class="badge bg-success">Read</span>
                            @else
                                <span class="badge bg-warning">Unread</span>
                            @endif
                        </td>
                        <td>{{ $inquiry->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.contact.show', $inquiry->id) }}" class="btn btn-sm btn-info" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.contact.destroy', $inquiry->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                        onclick="return confirm('Are you sure you want to delete this inquiry?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-envelope fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No contact inquiries found.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        {{ $inquiries->links() }}
    </div>
</div>
@endsection
