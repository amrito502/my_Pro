@extends('admin.master')


@section('admin')

<div class="containers">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Product Sliders</h4>
                    <a href="{{ route('product_sliders.create') }}" class="btn btn-primary">Add New Slider</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Background Image</th>
                                <th>Product</th>
                                <th>Status</th>
                                <th>Sliders</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productSliders as $slider)
                                <tr>
                                    <td><img style="width: 100px;" src="{{ asset('uploads/background_image/'.$slider->background_image) }}" alt=""></td>
                                    <td>{{ $slider->product->name }}</td>
                                    <td>
                                        <span class="badge {{ $slider->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                            {{ ucfirst($slider->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            @foreach($slider->sliderItems as $item)
                                                <div class="me-2 text-center" style="border: 1px solid gray">
                                                    <img src="{{ asset($item->image) }}" width="80" height="50" class="rounded">
                                                    {{-- <img src="{{ asset('slider_images/' . $item->image) }}" width="80" height="50" class="rounded"> --}}
                                                    <p class="small">{{ $item->title_1 }}</p>
                                                    <p class="small">{{ $item->title_2 }}</p>
                                                    <p class="small">{{ $item->title_3 }}</p>
                                                    <p class="small">{{ $item->link_4 }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('product_sliders.edit', $slider->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('product_sliders.destroy', $slider->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $productSliders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
