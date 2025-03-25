@extends('admin.master')

@section('admin')
    <div class="container">
        <div class="py-5">
            <div class="row g-4 align-items-center">
                <div class="col">
                    <h1 class="h3 m-0">Categories</h1>
                </div>
                <div class="col-auto d-flex"><a href="{{ route('blog_categories.create') }}" class="btn btn-primary">New
                        category</a></div>
            </div>
        </div>

        <div class="card">
            <div class="p-4">
                <input type="text" placeholder="Start typing to search for categories"
                    class="form-control form-control--search mx-auto" id="table-search" />
            </div>
            <div class="sa-divider"></div>
            <table class="sa-datatables-init table table-bordered p-4" data-order='[[ 1, "asc" ]]' data-sa-search-input="#table-search">
                <thead>
                    <tr>
                        <th>
                            SL.
                        </th>
                        <th>Name</th>
                        <th>Slug</th>
          
                        <th>Visibility</th>
                        <th>Published At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key=>$category)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td><a href="" class="text-reset">{{ $category->name }}</a></td>
                            <td><a href="" class="text-reset">{{ $category->slug }}</a></td>
                         
                            <td>
                                @if ($category->status === 'active')
                                    <div class="badge badge-sa-success">{{ $category->status }}</div>
                                @else
                                    <div class="badge badge-sa-danger">{{ $category->status }}</div>
                                @endif

                            </td>
                            <td><a href="" class="text-reset">{{ $category->created_at }}</a></td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ route('blog_categories.edit', $category->id) }}">Edit</a>
                                <form action="{{ route('blog_categories.destroy', $category->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
