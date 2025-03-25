@extends('admin.master')

@section('admin')
    <div class="container">

        <div class="py-5">
            <div class="row g-4 align-items-center">
                <div class="col">
                    <nav class="mb-2" aria-label="breadcrumb">
                    <h1 class="h3 m-0">Create Section</h1>
                </div>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="row g-4 align-items-center">
            <form action="{{ route('sections.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card pb-4">
                          <div class="card-body p-5">
                              <div class="mb-5"><h2 class="mb-0 fs-exact-18">Section information</h2></div>
                              <div class="mb-3">
                                <label for="category_id" class="form-label">Select Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Choose Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                              <div class="mb-4">
                                  <label for="name" class="form-label">Name</label>
                                  <input type="text" name="name" placeholder="Section Name" class="form-control" required id="name"/>
                              </div>

                              <div class="">
                                  <label class="form-check form-switch"
                                  ><input type="checkbox" name="status" class="form-check-input" /><span
                                      class="form-check-label"
                                      >Status</span
                                  ></label>
                              </div>
                            </div>
                        </div>
                      </div>
                </div>
               <div class="row">
                <div class="col-xl-12 mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('sections.index') }}" class="btn btn-secondary ml-2">Cancel</a>
                </div>
               </div>
            </form>
        </div>
    </div>
@endsection
