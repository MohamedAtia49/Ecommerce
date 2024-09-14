<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $records = Product::all();
        return view('admin.products.index',compact('records'));
    }

    public function create()
    {
        return view('admin.products.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            "image" => "required|image|mimes:png,jpg,svg,jpeg",
            'description' => 'required',
        ]);

        //upload image
        $image =$request->file('image');
        $path = $image->storeAs(
            'products',
            $image->hashName(),
            'public'
        );

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path,
        ]);
        return redirect()->route('admin.products.index');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $record = Product::find($id);
        return view('admin.products.edit',compact('record'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            "image" => "image|mimes:png,jpg,svg,jpeg",
            'description' => 'required',
        ]);


        $product = Product::find($id);
        //upload image
       if($request->hasFile('image')){
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
            $image =$request->file('image');
            $path = $image->storeAs(
                'products',
                $image->hashName(),
                'public'
            );
            Product::find($id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $path,
            ]);
       }else{
            $product->update($request->except('image'));
       }

        return redirect()->route('admin.products.index');
    }

    public function destroy(string $id)
    {
        $record = Product::where('id', $id)->first();
        Storage::disk('public')->delete($record->image);
        $record->delete();

        return redirect('admin/products');
    }
}
