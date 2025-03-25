@extends('admin.master')

@section('admin')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <!-- Blog Details -->
            <div class="card">
                <div class="card-header">
                    <h2>{{ $blog->title }}</h2>
                </div>

                <div class="card-body">
                    <!-- Blog Image -->
                    @if($blog->image)
                        <img src="{{ asset('uploads/blog/' . $blog->image) }}" alt="Blog Image" class="img-fluid" style="max-width: 100%; height: auto;">
                    @else
                        <p>No image available for this blog post.</p>
                    @endif

                    <!-- Short Description -->
                    <h5 class="mt-4">Short Description</h5>
                    <p>{{ $blog->short_desc }}</p>

                    <!-- Long Description -->
                    <h5 class="mt-4">Long Description</h5>
                    <p>{{ $blog->long_desc }}</p>

                    <!-- Meta Info -->
                    <div class="mt-4">
                        <strong>Meta Title:</strong> {{ $blog->meta_title }}<br>
                        <strong>Meta Description:</strong> {{ $blog->meta_description }}<br>
                        <strong>Meta Keywords:</strong> {{ $blog->meta_keyword }}
                    </div>

                    <!-- Category and Status -->
                    <div class="mt-4">
                        <strong>Category:</strong> {{ $blog->category->name ?? 'N/A' }}<br>
                        <strong>Status:</strong> {{ ucfirst($blog->status) }}
                    </div>

                    <!-- Back to Blog List -->
                    <a href="{{ route('blogs.index') }}" class="btn btn-primary mt-4">Back to Blogs</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
