@extends('admin.master')

@section('admin')
    <div class="container">
        <div class="py-5">
            <div class="row g-4 align-items-center">
                <div class="col">
                    <h1 class="h3 m-0">Create New Color</h1>
                </div>
            </div>
        </div>

        <form action="{{ route('colors.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xl-6">
                    <div class="card shadow-sm">
                        <div class="card-body p-5">
                            <h2 class="mb-4">Color Information</h2>

                            <div class="mb-4">
                                <label for="name" class="form-label">Color Name</label>
                                <input type="text" name="name" class="form-control" required id="name" />
                            </div>

                            <div class="mb-4">
                                <label for="hex_code" class="form-label">Hex Code</label>
                                <input type="text" name="hex_code" class="form-control" required id="hex_code" />
                            </div>

                            <div class="mb-4">
                                <label for="rgb_code" class="form-label">RGB Code</label>
                                <input type="text" name="rgb_code" class="form-control" required id="rgb_code" />
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('colors.index') }}" class="btn btn-secondary ml-2">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
