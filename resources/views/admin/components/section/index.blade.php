@extends('admin.master')

@section('admin')
    <div class="container">
        <div class="py-5">
            <div class="row g-4 align-items-center">
                <div class="col">
                    <h1 class="h3 m-0">Sections</h1>
                </div>
                <div class="col-auto d-flex"><a href="{{ route('sections.create') }}" class="btn btn-primary">New
                        Section</a></div>
            </div>
        </div>
    
        <div class="card">
            <div class="p-4">
                <input type="text" placeholder="Start typing to search for Section"
                    class="form-control form-control--search mx-auto" id="table-search" />
            </div>
            <div class="sa-divider"></div>
            <table class="sa-datatables-init table table-bordered p-4" data-order='[[ 1, "asc" ]]' data-sa-search-input="#table-search">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Category Name</th>
                        <th>Name</th>
                        <th>Visibility</th>
                        <th>Published At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sections as $key=>$item)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td><a href="" class="text-reset">{{ $item->category->name }}</a></td>
                            <td><a href="" class="text-reset">{{ $item->name }}</a></td>
                            <td>
                                {{ $item->status == 1 ? 'Active' : 'Inactive' }}
                            </td>
                            <td><a href="" class="text-reset">{{ $item->created_at }}</a></td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ route('sections.edit', $item->id) }}">Edit</a>
                                <form action="{{ route('sections.destroy', $item->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>

                           
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
