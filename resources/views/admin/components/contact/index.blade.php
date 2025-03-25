@extends('admin.master')

@section('admin')
    <div class="containers">
        <div class="py-5">
            <div class="row g-4 align-items-center">
                <div class="col">
                    <h1 class="h3 m-0">All Message</h1>
                </div>
            </div>
        </div>

        <div class="card">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                </div>
            @endif
            <div class="p-4">
                <input type="text" placeholder="Start typing to search for message"
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
                        <th class="">Send Date</th>
                        <th class="">Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $key => $message)
                        <tr>
                            <td>
                                {{ $key + 1 }}
                            </td>
                            <td><a href="" class="text-reset">{{ $message->created_at }}</a></td>
                            <td><a href="" class="text-reset">{{ $message->name }}</a></td>
                            <td><a href="" class="text-reset">{{ $message->email }}</a></td>
                            <td><a href="" class="text-reset">{{ $message->message }}</a></td>
                            <td>
                                <a class="btn btn-sm btn-danger" href="{{ route('admin_message_delete',$message->id) }}">delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
