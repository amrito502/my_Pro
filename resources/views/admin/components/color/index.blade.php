@extends('admin.master')

@section('admin')
    <div class="container">
        <div class="py-5">
            <div class="row g-4 align-items-center">
                <div class="col">
                    <h1 class="h3 m-0">Colors</h1>
                </div>
                <div class="col-auto">
                    <a href="{{ route('colors.create') }}" class="btn btn-primary">New Color</a>
                </div>
            </div>
        </div>

        <!-- Search and Filters -->
        <div class="card mb-4">
            <div class="p-4">
                <input type="text" placeholder="Search for colors" class="form-control form-control--search mx-auto" id="table-search" />
            </div>
        </div>

        <!-- Color Table -->
        <div class="card">
            <div class="p-4">
                <table class="table table-bordered p-4" id="color-table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Hex Code</th>
                            <th>RGB Code</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $key => $color)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td><span class="text-reset">{{ $color->name }}</span></td>
                                <td>{{ $color->hex_code }}</td>
                                <td>{{ $color->rgb_code }}</td>
                                <td>{{ $color->description }}</td>
                                <td>
                                    <a href="{{ route('colors.edit', $color->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ route('colors.destroy', $color->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
