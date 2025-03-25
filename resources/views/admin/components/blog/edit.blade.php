@extends('admin.master')

@section('admin')
    <div class="container my-5">
        <div class="card p-4">
            <div class="card-header">
                <h3>Edit Blog</h3>
            </div>
            <div class="card-body">
                

                <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="short_desc">Short Description</label>
                        <textarea name="short_desc" class="form-control">{{ $blog->short_desc }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="long_desc">Long Description</label>
                        <textarea name="long_desc" class="form-control">{{ $blog->long_desc }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                        @if ($blog->image)
                            <img src="{{ asset('uploads/blog/' . $blog->image) }}" alt="img" style="width: 100px">
                        @else
                            <p>No image available</p>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="active" {{ $blog->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $blog->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="blog_category_id">Blog Category</label>
                        <select name="blog_category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $blog->blog_category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-5">
                        <h2 class="mb-0 fs-exact-18">Search engine optimization</h2>
                    </div>
                    <div class="mb-4">
                        <label for="meta_title" class="form-label">Page title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ $blog->meta_title }}"
                            id="meta_title" />
                    </div>
                    <div>
                        <label for="meta_description" class="form-label">Meta description</label>
                        <textarea id="meta_description" name="meta_description" class="form-control" rows="2">{{ $blog->meta_description }}</textarea>
                    </div>
                    <div>
                        <label for="meta_keyword" class="form-label">Meta Keyword</label>
                        <textarea id="meta_keyword" name="meta_keyword" class="form-control" rows="2">{{ $blog->meta_keyword }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update Blog</button>
                </form>
            </div>
        </div>
    </div>
@endsection
