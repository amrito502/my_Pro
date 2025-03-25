@extends('admin.master')

@section('admin')
    <div class="container">
        <div class="py-5">
            <div class="row g-4 align-items-center">
                <div class="col">
                    <h1 class="h3 m-0">Sub categories</h1>
                </div>
                <div class="col-auto d-flex"><a href="{{ route('subcategories.create') }}" class="btn btn-primary">New
                        Subcategory</a></div>
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
                        <th>SL.</th>
                        <th>Category Name</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>Visibility</th>
                        <th>Published At</th>
                       <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subCategories as $key=>$subCategory)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>{{ $subCategory->category ? $subCategory->category->name : 'N/A' }}</td>
                            <td>{{ $subCategory->name }}</td>
                            <td>{{ $subCategory->slug }}</td>
                            <td>
                                @if ($subCategory->image)
                                    <img src="{{ asset('uploads/subcategory/' . $subCategory->image) }}" alt="Image" width="50">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if ($subCategory->status === 'active')
                                    <div class="badge badge-sa-success">{{ $subCategory->status }}</div>
                                @else
                                    <div class="badge badge-sa-danger">{{ $subCategory->status }}</div>
                                @endif

                            </td>
                            <td><a href="" class="text-reset">{{ $subCategory->created_at->format('d-m-Y H:i') }}</a></td>
                            <td>
                                <a class="btn btn-sm btn-success"
                                                href="{{ route('subcategories.edit', $subCategory->id) }}">Edit</a>
                                                <form action="{{ route('subcategories.destroy', $subCategory->id) }}" method="POST"
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
