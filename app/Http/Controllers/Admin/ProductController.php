<?php

namespace App\Http\Controllers\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function Index()
    {
        $products = Product::all();
        return view('admin/products/index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin/products/create', compact('categories','brands'));
    }
    public function store(ProductFormRequest $request)
    {
      $validatedData = $request->validated();
        $category = Category::findOrFail($validatedData['category_id']);
       $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
        
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'brand' => $validatedData['brand'],
        'original_price' => $validatedData['original_price'],
        'selling_price' => $validatedData['selling_price'],
        'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? '1':'0',
            
            'status' => $request->status == true ? '1':'0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);
        if ($request->hasFile('image')) {
          $uploadPath = 'uploads/products/';
        }
        $i=1;
        foreach($request->file('image') as $imageFile){
            $extention = $imageFile->getClientOriginalExtension();
        
            $filename= time().$i++.'.'.$extention;
            $imageFile->move($uploadPath,$filename);
            $finalImagePathName = $uploadPath.$filename;
           
            $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
            ]);
        }

        return redirect('/admin/products')->with('message', 'Product Added Successfully');
    }
    public function edit(int $product_id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($product_id);
        return view('admin.products.edit', compact('categories', 'brands', 'product'));
    }
    public function update(ProductFormRequest $request, int $product_id )
    {
        $validatedData = $request->validated();
        $product = Category::findOrFail( $request->category_id)
        ->products()->where('id', $product_id)->first();
        if ($product) {
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => $validatedData['slug'],
            
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'brand' => $validatedData['brand'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
                'trending' => $request->trending == true ? '1':'0',
                
                'status' => $request->status == true ? '1':'0',
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            
            ]);
            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';
              }
              $i=1;
              foreach($request->file('image') as $imageFile){
                  $extention = $imageFile->getClientOriginalExtension();
              
                  $filename= time().$i++.'.'.$extention;
                  $imageFile->move($uploadPath,$filename);
                  $finalImagePathName = $uploadPath.$filename;
                 
                  $product->productImages()->create([
                          'product_id' => $product->id,
                          'image' => $finalImagePathName,
                  ]);
              }
      
            return redirect('/admin/products')->with('message', 'Product Updated Successfully');
        }
        else {
            return redirect('admin/products')->with('message', 'No Such product Id was Found');
        }
    }
    public function destroy(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->delete();
        return redirect('/admin/products')->with('message', 'Product Deleted Successfully');
    }
    public function destroyimage(int $product_image_id)
    {
       $productImage = ProductImage::findOrFail($product_image_id);
       if(File::exists($productImage->image)){
        File::delete($productImage->image);
       }
       $productImage->delete();
       return redirect('/admin/products')->with('message', 'Image Removed Successfully');
    }
}
