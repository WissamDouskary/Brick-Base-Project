<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productservice;

    public function __construct(ProductService $product_service)
    {
        $this->productservice = $product_service;
    }

    public function index(){
        return view('Pages.Product.list-product');
    }

    public function getall(){
        $products = $this->productservice->getall();
        return view('Pages.Products', compact('products'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|min:5|max:40',
            'photos' => 'array|max:6',
            'photos.*' => 'image|max:10240',
            'description' => 'required|max:255|min:40',
            'price' => 'required',
            'category' => 'required'
        ]);

        if($request->hasFile('photos')){

            $photos = $request->file('photos');

            $mainImagePath = $photos[0]->store('product_photos', 'public');
            $data['main_image'] = $mainImagePath;
            
            $product = $this->productservice->create($data);

            foreach($photos as $photo){
                $path = $photo->store('product_photos', 'public');

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path
                ]);
            }
        }
        return back()->with('success', 'you have listed product successfully');
    }

}
