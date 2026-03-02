@extends('admin.layouts.app')

@section('title', 'Edit CMS Page')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Edit CMS Page</h4>
    <a href="{{ route('admin.cms.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i> Back to List
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.cms.update', $page->id) }}" method="POST" id="cmsForm">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="key" class="form-label">Page Key *</label>
                <input type="text" class="form-control @error('key') is-invalid @enderror" 
                       id="key" name="key" value="{{ old('key', $page->key) }}" required>
                <small class="text-muted">Unique identifier (e.g., homepage, contact-page)</small>
                @error('key')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Page Title *</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                       id="title" name="title" value="{{ old('title', $page->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="editor" class="form-label">Content</label>
                <textarea name="content" id="editor">{{ old('content', $page->content) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="meta_title" class="form-label">Meta Title</label>
                <input type="text" class="form-control @error('meta_title') is-invalid @enderror" 
                       id="meta_title" name="meta_title" value="{{ old('meta_title', $page->meta_title) }}">
                @error('meta_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="meta_description" class="form-label">Meta Description</label>
                <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                          id="meta_description" name="meta_description" rows="3">{{ old('meta_description', $page->meta_description) }}</textarea>
                @error('meta_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" 
                           value="1" {{ old('is_active', $page->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Update Page
                </button>
                <a href="{{ route('admin.cms.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-1"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
tinymce.init({
  selector: '#editor',
  height: 400,

  plugins: [
    'code',
    'link',
    'image',
    'lists',
    'table',
    'preview',
    'fullscreen',
    'searchreplace',
    'visualblocks',
    'wordcount'
  ],

  toolbar: `
    undo redo |
    bold italic underline |
    bullist numlist |
    alignleft aligncenter alignright |
    link image |
    code preview fullscreen
  `,

  menubar: false
});
</script>

@endsection