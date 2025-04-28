<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\ReviewsService;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $productservice;
    protected $reviewsservice;

    public function __construct(ProductService $product_service, ReviewsService $reviews_service)
    {
        $this->productservice = $product_service;
        $this->reviewsservice = $reviews_service;
    }

    public function index()
    {
        return view('Pages.Product.list-product');
    }

    public function getall(Request $request)
    {
        $products = $this->productservice->filterProducts($request);
        return view('Pages.Products', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:5|max:40',
            'photos' => 'array|max:6',
            'photos.*' => 'image|max:10240',
            'description' => 'required|max:255|min:40',
            'price' => 'required|max:5000|min:10',
            'category' => 'required'
        ]);

        if ($request->hasFile('photos')) {

            $photos = $request->file('photos');

            $mainImagePath = $photos[0]->store('product_photos', 'public');

            $data['main_image'] = $mainImagePath;
            
            $product = $this->productservice->create($data);

            foreach ($photos as $photo) {
                $path = $photo->store('product_photos', 'public');

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path
                ]);
            }
        }
        return back()->with('success', 'you have listed product successfully');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'min:6|max:40',
            'description' => 'min:40|max:200',
            'images' => 'array|max:6',
            'images.*' => 'image|max:10240',
        ]);
        
        $data['in_stock'] = $request->in_stock;

        if ($request->hasFile('images')) {

            $images = $request->file('images');

            $data['main_image'] = $images[0]->store('product_photos', 'public');

            $this->productservice->update($data, $id);
            $products = ProductImage::where('product_id', $id)->get();

            foreach ($products as $product) {
                Storage::disk('public')->delete($product->image_path);
                $product->delete();
            }

            foreach ($images as $image) {
                $path = $image->store('product_photos', 'public');

                ProductImage::create([
                    'product_id' => $id,
                    'image_path' => $path
                ]);
            }
        }

        $this->productservice->update($data, $id);

        return back()->with('success', "You're product updated successfuly!");
    }

    public function destroy($id){
        $this->productservice->delete($id);
        return back()->with('success', 'Product deleted successfuly!');
    }

    public function find($id)
    {
        $products = $this->productservice->get3($id);
        $reviews =  $this->reviewsservice->getReviews($id);
        $product = $this->productservice->findById($id);
        return view('Pages.Product-preview', compact('product', 'products', 'reviews'));
    }

    public function getWorkerProducts()
    {
        $products = $this->productservice->getWorkerProducts();
        return view('Pages.Profiles.worker-profile', compact('products'));
    }
}
