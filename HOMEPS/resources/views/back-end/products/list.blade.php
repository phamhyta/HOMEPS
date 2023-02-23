@extends('app')

@section('title', 'example')
@push('styles')
<link href="{{ asset('css/bill-list.css') }}" rel="stylesheet" />
@endpush
@section('content')
<h1 class="h3 mb-2 text-gray-800">Products management</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Products</h6>

        <button type="button" class="btn btn-outline-success mr-2" data-toggle="modal" data-target="#createModel" style="float:right;"><i class="fas fa-plus mt-0 mr-2"></i>Create New Product</button>
        <div class="modal fade" id="createModel" tabindex="-1" role="dialog" aria-labelledby="Create" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModel">CREATE NEW PRODUCT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.product.create') }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div>
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                                <label for="product_desc">Product desc</label>
                                <textarea class="form-control" id="product_desc" name="product_desc" rows="7" required></textarea>
                                <label for="product_desc">Product image</label>
                                <input type="file" name="url_image" required>
                                <label for="product_desc">Product thumbnail</label>
                                <input type="file" name="thumbnail[]" multiple required>
                                <label for="price">Price</label>
                                <input type="number" class="form-control" name="price" id="price" required>
                                <label for="discount">Discount</label>
                                <input type="number" class="form-control" name="discount" id="discount" required>
                                <label for="amount">Amount</label>
                                <input type="text" class="form-control" name="amount" id="amount" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if ( Session::has('success') )
            <div class="alert alert-success" id="popup_notification">
                {{ Session::get('success') }}
            </div>
            @endif
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Create At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td><img src="{{ $product->url_image ?? "https://cdn.shopify.com/s/files/1/0563/5745/4002/products/141_1.png?v=1623399805" }}" alt="" class="image_product"></td>
                        <td>
                            @if($product->amount > 0)
                            <button class="btn btn-success">Available</button>
                            @else
                            <button class="btn btn-secondary">Unavailable</button>
                            @endif
                        </td>
                        <td>{{ date('d-m-Y',strtotime($product->created_at))}}</td>
                        <td>
                            <a href="{{ route('admin.product.detail', $product ->id) }}" class="btn btn-outline-primary mr-2"><i class="fas fa-info-circle mt-0 mr-2"></i> More information</a>
                            <button type="button" class="btn btn-outline-success mr-2" data-toggle="modal" data-target="#updateModal{{ $product->id }}"><i class="fas fa-pencil-alt mt-0 mr-2"></i>Update</button>
                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal{{ $product->id }}"><i class="far fa-trash-alt mt-0 mr-2"></i> Delete</button>
                            <!-- Modal -->
                            <div class="modal fade" id="updateModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel{{ $product->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateModalLabel{{ $product->id }}">Update</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.product.update') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id" id="id" value="{{ $product->id }}" required>
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" required>
                                                <label for="product_desc">Product desc</label>
                                                <textarea class="form-control" id="product_desc" name="product_desc" rows="7" required>{{ $product->product_desc }}</textarea>
                                                <label for="price">Price</label>
                                                <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}" required>
                                                <label for="discount">Discount</label>
                                                <input type="number" class="form-control" name="discount" id="discount" value="{{ $product->discount }}" required>
                                                <label for="amount">Amount</label>
                                                <input type="text" class="form-control" name="amount" id="amount" value="{{ $product->amount }}" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <form action="{{ route('admin.product.delete') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" id="id" value="{{ $product->id }}">
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection