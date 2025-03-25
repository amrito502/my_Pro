
@extends('seller.master')
@section('seller')

    <h1 class="mb-4">Product List</h1>

    <a class="btn btn-primary mb-3" href="{{ route('sellerproducts.create') }}">Create New Product</a>

    <div class="row">
        <div class="col-md-12">
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
                            <th>title</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Current Price</th>
                            <th>Discount Price</th>
                            <th>Status</th>
                            <th>Published At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key=>$product)
                            <tr>
                                <td>
                                    {{ $key+1 }}
                                </td>
                                <td><a href="" class="text-reset">{{ $product->name }}</a></td>
                                <td><a href="" class="text-reset">{{ $product->slug }}</a></td>
                                <td>
                                    @if ($product->image)
                                        <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Image" width="50">
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td><a href="" class="text-reset">{{ $product->current_price }}</a></td>
                                <td><a href="" class="text-reset">{{ $product->discount_price }}</a></td>

                                <td>
                                    @if ($product->status === 'approved')
                                        <div class="badge badge-sa-success">{{ $product->status }}</div>
                                    @elseif ($product->status === 'pending')
                                        <div class="badge badge-sa-warning">{{ $product->status }}</div>
                                    @else
                                        <div class="badge badge-sa-danger">{{ $product->status }}</div>
                                    @endif

                                </td>
                                <td><a href="" class="text-reset">{{ $product->created_at }}</a></td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="{{ route('seller_product.show', $product->id) }}">Show</a>
                                    <a class="btn btn-sm btn-success" href="{{ route('seller_product.edit', $product->id) }}">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="{{ route('seller_product.delete', $product->id) }}">Delete</a>
                                    {{-- <form action="{{ route('seller_product.delete', $product->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form> --}}
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
