@extends('seller.master') 
@section('seller')
  <div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-md-12">
            <h2 class="my-3">Vendor Store Information</h2>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card p-4 mt-2">
                <h4>Store Details</h4>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Field</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Seller Name</td>
                            <td>{{ $sellerRequest->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Store Name</td>
                            <td>{{ $sellerRequest->store_name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $sellerRequest->email ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $sellerRequest->phone ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $sellerRequest->address ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{ $sellerRequest->city ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>District</td>
                            <td>{{ $sellerRequest->district ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Sub-District</td>
                            <td>{{ $sellerRequest->sub_district ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>{{ $sellerRequest->country ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Postal Code</td>
                            <td>{{ $sellerRequest->postal_code ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>NID</td>
                            <td>{{ $sellerRequest->nid ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Store Description</td>
                            <td>{{ $sellerRequest->store_description ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td>{{ $sellerRequest->message ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Store Image</td>
                            <td>
                                @if($sellerRequest->store_image)
                                    <img src="{{ asset('uploads/store_image/' . $sellerRequest->store_image) }}" alt="Store Image" class="mt-2" width="100">
                                @else
                                    No image uploaded
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Update Store Information Button -->
                <a href="{{ route('sellerupdateRequest_page') }}" class="btn btn-primary mt-4">Update Store Information</a>
            </div>
        </div>
    </div>
  </div>
@endsection
