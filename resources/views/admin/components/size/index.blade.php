@extends('admin.master')

@section('admin')
    <div class="container">
        <div class="py-5">
            <div class="row g-4 align-items-center">
                <div class="col">
                    <h1 class="h3 m-0">Sizes</h1>
                </div>
                <div class="col-auto">
                    <a href="{{ route('sizes.create') }}" class="btn btn-primary">New Size</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="p-4">
                <input type="text" placeholder="Search for sizes" class="form-control form-control--search mx-auto" id="table-search" />
            </div>
            <div class="sa-divider"></div>
            <table class="sa-datatables-init table table-bordered p-4">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sizes as $key => $size)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $size->name }}</td>
                            <td>{{ $size->slug }}</td>
                            <td>
                                <span class="badge {{ $size->status == 'active' ? 'badge-success' : 'badge-danger' }}">
                                    {{ ucfirst($size->status) }}
                                </span>
                            </td>
                            <td>{{ $size->order }}</td>
                            <td>{{ $size->created_at }}</td>
                            <td>
                                <a href="{{ route('sizes.edit', $size->id) }}" class="btn btn-sm btn-success">Edit</a>
                                <form action="{{ route('sizes.destroy', $size->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
