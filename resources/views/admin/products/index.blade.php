@extends('admin_layouts.app')
{{-- @inject('city' ,'App\Models\City') --}}

@section('page_title')
    Dashboard :
@endsection
@section('small_title')
    All Products
@endsection
@section('content')

    <table class="table table-striped table-hover table-bordered text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $record->name }}</td>
                <td>{{ $record->price }}</td>
                <td><img src="{{ Storage::url($record->image) }}" width="50" height="50"></td>
                <td>{{ $record->description }}</td>
                <td><a href="{{ route('admin.products.edit', $record->id) }}" class="btn btn-success">Edit</a></td>
                <td><form action="{{ route('admin.products.destroy', $record->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
