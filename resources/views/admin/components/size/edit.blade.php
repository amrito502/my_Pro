@extends('admin.master')

@section('admin')
    <div class="container">
        <div class="py-5">
            <h1>Edit Size</h1>
        </div>

        <form action="{{ route('sizes.update', $size->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body p-5">
                    <div class="mb-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $size->name) }}" required id="name" />
                    </div>

                    <div class="mb-4">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" value="{{ old('slug', $size->slug) }}" required id="slug" />
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description">{{ old('description', $size->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="active" {{ $size->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $size->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="order" class="form-label">Order</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', $size->order) }}" id="order" />
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('sizes.index') }}" class="btn btn-secondary ml-2">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
