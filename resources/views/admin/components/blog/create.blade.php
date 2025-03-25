@extends('admin.master')

@section('admin')


   <!DOCTYPE html>
   <html lang="en">
   <head>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap (If required by Summernote) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    
    <!-- Summernote -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    
   </head>
   <body>
    <div class="container my-5">
       
        <div class="card p-4">
            <div class="card-header">
                <h1>Create New Blog</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('blogs.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
        
                    <div class="form-group mb-3">
                        <label for="short_desc">Short Description</label>
                        <textarea name="short_desc" class="form-control"></textarea>
                    </div>
        
                    <div class="form-group mb-3">
                        <label for="long_desc">Long Description</label>
                        <textarea name="long_desc" id="content" class="form-control "></textarea>
                    </div>
        
                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
        
                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
        
                    <div class="form-group mb-3">
                        <label for="blog_category_id">Blog Category</label>
                        <select name="blog_category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
        
                    <div class="mb-5">
                        <h2 class="mb-0 fs-exact-18">Search engine optimization</h2>
                    </div>
                    <div class="mb-4">
                        <label for="meta_title" class="form-label">Page title</label>
                        <input type="text" name="meta_title" class="form-control" id="meta_title" />
                    </div>
                    <div>
                        <label for="meta_description" class="form-label">Meta description</label>
                        <textarea id="meta_description" name="meta_description" class="form-control" rows="2"></textarea>
                    </div>
                    <div>
                        <label for="meta_keyword" class="form-label">Meta Keyword</label>
                        <textarea id="meta_keyword" name="meta_keyword" class="form-control" rows="2"></textarea>
                    </div>
        
                    <button type="submit" class="btn btn-primary mt-3">Save Blog</button>
                </form>
            </div>
        </div>
       
    </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                height: 300
            });
        });
    </script>
   </body>
   </html>
@endsection
