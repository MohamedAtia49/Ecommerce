@extends('admin_layouts.app')
{{-- @inject('city' ,'App\Models\City') --}}

@section('page_title')
    Dashboard :
@endsection
@section('small_title')
    Create Product
@endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Add New Product</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div> <!-- card-header -->

                    <div class="card-body text-center">
                        <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <label class="text-center">Product Name</label>
                            <input type="text" name="name" class="form-control form-control-lg mb-3" placeholder="Product Name">

                            <label class="text-center">Product Price</label>
                            <input type="text" name="price" class="form-control form-control-lg mb-3" placeholder="Product Price">

                            <label class="text-center">Product Image</label>
                            <input type="file" name="image" class="form-control form-control-file form-control-lg mb-3">

                            <label class="text-center">Product Description</label>
                            <textarea name="description" rows="4" class="form-control form-control-lg mb-3" placeholder="Product Description"></textarea>

                            <button type="submit" class="btn btn-primary btn-lg mb-3">Add Product</button>
                        </form>
        </div> <!-- card-body -->
    </div> <!-- card -->
    </div> <!-- col-md-8 -->
    </div> <!-- row -->
    </div>

@endsection
