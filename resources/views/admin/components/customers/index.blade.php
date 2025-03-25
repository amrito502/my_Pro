@extends('admin.master')

@section('admin')
    <div class="containers">
        <div class="py-5">
            <div class="row g-4 align-items-center">
                <div class="col">
                    <h1 class="h3 m-0">All Customers</h1>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="p-4">
                <input type="text" placeholder="Start typing to search for Customers"
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
                    @foreach ($customers as $key => $customer)
                        <tr>
                            <td>
                                {{ $key + 1 }}
                            </td>
                            <td><a href="" class="text-reset">{{ $customer->name }}</a></td>
                            <td><a href="" class="text-reset">{{ $customer->phone }}</a></td>
                            <td><a href="" class="text-reset">{{ $customer->email }}</a></td>
                            <td><a href="" class="text-reset">{{ $customer->city }}</a></td>
                            <td><a href="" class="text-reset">{{ $customer->district->name }}</a></td>
                            <td><a href="" class="text-reset">{{ $customer->subDistrict->name }}</a></td>
                            <td><a href="" class="text-reset">{{ $customer->address }}</a></td>

                            <td>
                                @if ($customer->image)
                                    <img src="{{ asset('uploads/profile/' . $customer->image) }}" alt="Image" width="50">
                                @else
                                    N/A
                                @endif
                            </td>

                            <td>
                               
                                <div class="badge badge-sa-success">{{ $customer->is_verified == 1 ? 'Verified' : '' }}</div>
                              
                            </td>
                            <td>
                                @if ($customer->status === 'active')
                                    <div class="badge badge-sa-success">{{ $customer->status }}</div>
                                @else
                                    <div class="badge badge-sa-danger">{{ $customer->status }}</div>
                                @endif
                            </td>
                            <td><a href="" class="text-reset">{{ $customer->created_at }}</a></td>
                            <td>
                                <a class="btn btn-sm btn-danger" href="{{ route('admin_customer_delete', $customer->id) }}">Delete</a>
                        
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
