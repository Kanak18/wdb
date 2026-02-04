@extends('admin.layouts.app')

@section('title', 'Team Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Team Members</h4>
    <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Add New Member
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Key</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teams as $member)
                    <tr>
                        <td>
                            @if($member->photo)
                                <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}" 
                                     class="rounded" width="50" height="50" style="object-fit: cover;">
                            @else
                                <div class="bg-secondary rounded d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px;">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->role }}</td>
                        <td><code>{{ $member->key }}</code></td>
                        <td>
                            @if($member->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.team.show', $member->id) }}" class="btn btn-sm btn-info" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.team.edit', $member->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                        onclick="return confirm('Are you sure you want to delete this team member?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <i class="fas fa-users fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No team members found. Add your first team member!</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        {{ $teams->links() }}
    </div>
</div>
@endsection
