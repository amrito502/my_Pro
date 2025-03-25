@extends('admin.master')

@section('admin')
    <div class="containe my-4">
       

     <div class="card p-4">
        <div class="card-header">
            <h1>Blogs</h1>
            <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create New Blog</a>
        </div>
        <div class="card-body">
            <table class="table mt-3 table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Published_at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $key=>$blog)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                <img src="{{ 'uploads/blog/'.$blog->image }}" alt="img" style="width:100px;height:100px">
                            </td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->blogcategory->name ?? 'N/A' }}</td>
                            <td>{{ $blog->status }}</td>
                            <td>{{ $blog->created_at }}</td>
                            <td>
                                <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-info btn-sm">show</a>
                                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
     </div>
    </div>
@endsection
