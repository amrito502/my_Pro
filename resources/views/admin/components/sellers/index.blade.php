@extends('admin.master')

@section('admin')
    <div class="containers">
        <div class="py-5">
            <div class="row g-4 align-items-center">
                <div class="col">
                    <h1 class="h3 m-0">All Sellers</h1>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="p-4">
                <input type="text" placeholder="Start typing to search for sellers"
                    class="form-control form-control--search mx-auto" id="table-search" />
            </div>
            <div class="sa-divider"></div>
            <table style="" class="sa-datatables-init table table-bordered p-4" data-order='[[ 1, "asc" ]]'
                data-sa-search-input="#table-search">
                <thead>
                    <tr>
                        <th>
                            SL.
                        </th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>District</th>
                        <th>Sub District</th>
                        <th>Address</th>
                        <th>Profile</th>
                        <th>Is_verified</th>
                        <th>status</th>
                        <th>Register Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sellers as $key => $seller)
                        <tr>
                            <td>
                                {{ $key + 1 }}
                            </td>
                            <td><a href="" class="text-reset">{{ $seller->name }}</a></td>
                            <td><a href="" class="text-reset">{{ $seller->phone }}</a></td>
                            <td><a href="" class="text-reset">{{ $seller->email }}</a></td>
                            <td><a href="" class="text-reset">{{ $seller->city }}</a></td>
                            <td><a href="" class="text-reset">{{ $seller->district->name }}</a></td>
                            <td><a href="" class="text-reset">{{ $seller->subDistrict->name }}</a></td>
                            <td><a href="" class="text-reset">{{ $seller->address }}</a></td>

                            <td>
                                @if ($seller->image)
                                    <img src="{{ asset('uploads/profile/' . $seller->image) }}" alt="Image" width="50">
                                @else
                                    N/A
                                @endif
                            </td>

                            <td>
                               
                                <div class="badge badge-sa-success">{{ $seller->is_verified == 1 ? 'Verified' : '' }}</div>
                              
                            </td>
                            <td>
                                @if ($seller->status === 'active')
                                    <div class="badge badge-sa-success">{{ $seller->status }}</div>
                                @else
                                    <div class="badge badge-sa-danger">{{ $seller->status }}</div>
                                @endif
                            </td>
                            <td><a href="" class="text-reset">{{ $seller->created_at }}</a></td>
                            <td>
                                <a class="btn btn-sm btn-danger" href="{{ route('admin_seller_delete', $seller->id) }}">Delete</a>
                        
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
