@extends('admin.master')

@section('admin')
   <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-header">
                    <h1>Edit Company</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control" name="logo">
                            @if($company->logo)
                            <img src="{{ asset('uploads/logo/' . $company->logo) }}" width="50" height="50" alt="Logo">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Company Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $company->name }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $company->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $company->email }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address">{{ $company->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="facebook_link">Facebook Link</label>
                            <input type="text" class="form-control" name="facebook_link" value="{{ $company->facebook_link }}">
                        </div>
                        <div class="form-group">
                            <label for="instagram_link">Instagram Link</label>
                            <input type="text" class="form-control" name="instagram_link" value="{{ $company->instagram_link }}">
                        </div>
                        <div class="form-group">
                            <label for="linkedine_link">LinkedIn Link</label>
                            <input type="text" class="form-control" name="linkedine_link" value="{{ $company->linkedine_link }}">
                        </div>
                        <div class="form-group">
                            <label for="youtube_link">YouTube Link</label>
                            <input type="text" class="form-control" name="youtube_link" value="{{ $company->youtube_link }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection

