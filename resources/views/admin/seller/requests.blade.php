@extends('admin.master')

@section('admin')
    <div class="containers mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Seller Requests</h3>
            </div>
            <div class="card-body">


                <table class="table table-bordered table-search table-respponsive">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Store Name</th>
                            <th>Email</th>
                            <th>Bkash Number</th>
                            <th>NID</th>
                            <th>Store Desc</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request)
                            <tr>
                                <td>{{ $request->user->name }}</td>
                                <td>{{ $request->store_name }}</td>
                                <td>{{ $request->email }}</td>
                                <td>{{ $request->phone }}</td>
                                <td>{{ $request->nid }}</td>
                                <td>{{ $request->store_description }}</td>
                             
                                <td>{{ Str::words($request->message, 10, '...') }}</td>
                                <td>{{ $request->status }}</td>
                                <td>
                                    <form action="{{ route('admin.seller.requests.approve', $request->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Approve</button>
                                    </form>
                                    <form action="{{ route('admin.seller.requests.reject', $request->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Reject</button>
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
