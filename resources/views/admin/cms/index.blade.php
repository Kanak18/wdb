@extends('admin.layouts.app')

@section('title', 'CMS Pages')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>CMS Pages</h4>
    <a href="{{ route('admin.cms.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Add New Page
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Key</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pages as $page)
                    <tr>
                        <td><code>{{ $page->key }}</code></td>
                        <td>{{ $page->title }}</td>
                        <td>
                            @if($page->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $page->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.cms.show', $page->id) }}" class="btn btn-sm btn-info" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.cms.edit', $page->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.cms.destroy', $page->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                        onclick="return confirm('Are you sure you want to delete this page?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No CMS pages found. Add your first page!</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        {{ $pages->links() }}
    </div>
</div>
@endsection
