@extends('admin.master')

@section('admin')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-header">
                    <h1>All Companies</h1>
                    <a href="{{ route('companies.create') }}" class="btn btn-primary">Add New Company</a>
                </div>
                <div class="card-body">
                    <table class="table mt-3 table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Links</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td><img src="{{ asset('uploads/logo/' . $company->logo) }}" width="50" height="50" alt="Logo"></td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->phone }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>
                                        <div>
                                            <p> {{ $company->facebook_link }}</p>
                                            <p> {{ $company->instagram_link }}</p>
                                            <p> {{ $company->linkedine_link }}</p>
                                            <p> {{ $company->youtube_link }}</p>
                                        </div>
                                       
                                    </td>
                                    <td>
                                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   </div>
   

   
@endsection
