@extends('admin.master')

@section('admin')
    <div class="container">
        <div class="py-5">
            <div class="row g-4 align-items-center">
                <div class="col">
                    <h1 class="h3 m-0">Brands</h1>
                </div>
                <div class="col-auto d-flex"><a href="{{ route('brands.create') }}" class="btn btn-primary">New
                    Brand</a></div>
            </div>
        </div>

        <div class="card">
            <div class="p-4">
                <input type="text" placeholder="Start typing to search for categories"
                    class="form-control form-control--search mx-auto" id="table-search" />
            </div>
            <div class="sa-divider"></div>
            <table style="" class="sa-datatables-init table table-bordered p-4" data-order='[[ 1, "asc" ]]' data-sa-search-input="#table-search">
                <thead>
                    <tr>
                        <th>
                            SL.
                        </th>
                        <th class="">Name</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>Visibility</th>
                        <th>Published At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $key=>$brand)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td><a href="" class="text-reset">{{ $brand->name }}</a></td>
                            <td><a href="" class="text-reset">{{ $brand->slug }}</a></td>
                            <td>
                                @if ($brand->image)
                                    <img src="{{ asset('uploads/brands/' . $brand->image) }}" alt="Image" width="50">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if ($brand->status === 'active')
                                    <div class="badge badge-sa-success">{{ $brand->status }}</div>
                                @else
                                    <div class="badge badge-sa-danger">{{ $brand->status }}</div>
                                @endif

                            </td>
                            <td><a href="" class="text-reset">{{ $brand->created_at }}</a></td>
                            <td>
                                <a class="btn btn-sm btn-primary"
                                                href="{{ route('brands.edit', $brand->id) }}">Edit</a>
                                                <form action="{{ route('brands.destroy', $brand->id) }}" method="POST"
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
