@extends('admin_layouts.app')
{{-- @inject('city' ,'App\Models\City') --}}

@section('page_title')
    Dashboard :
@endsection
@section('small_title')
    Edit Product
@endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Edit Product</h2>
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
                        <form action="{{ route('admin.products.update',$record->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <label class="text-center">Product Name</label>
                            <input type="text" name="name" value="{{ $record->name }}" class="form-control form-control-lg mb-3" placeholder="Product Name">

                            <label class="text-center">Product Price</label>
                            <input type="text" name="price" value="{{ $record->price }}" class="form-control form-control-lg mb-3" placeholder="Product Price">

                            <label class="text-center">Product Image</label>
                            <input type="file" name="image" class="form-control form-control-file form-control-lg mb-3">
                            <div class="mb-3 text-left ml-3">
                                <img src="{{ Storage::url($record->image) }}" height="50">
                            </div>

                            <label class="text-center">Product Description</label>
                            <textarea name="description" rows="4" class="form-control form-control-lg mb-3" placeholder="Product Description">{{ $record->description }}</textarea>

                            <button type="submit" class="btn btn-primary btn-lg mb-3">Update Product</button>
                        </form>
        </div> <!-- card-body -->
    </div> <!-- card -->
    </div> <!-- col-md-8 -->
    </div> <!-- row -->
    </div>

@endsection
