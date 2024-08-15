<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all(); // Retrieve all products

        return view('backend.product.index', compact('products')); // Pass the products to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        // $prands and $categories created as varaible for the dynamic data reading in the form blade file

        return view('backend.product.create', compact('brands', 'categories')); // Return the form view for creating a new product
        //will extend the above created varaible for the backend create blade file
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer',
            'quantity' => 'required|integer',
            'color' => 'required|string',
            'size' => 'required|string',
        ]);

        // Handle the image upload if present
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Create the new product
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $imagePath;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->stock = $request->stock;
        $product->quantity = $request->quantity;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->save();

        // Redirect back to the product index with a success message
        // return redirect()->route('product.index')->with('success', 'Product created successfully.');
        return redirect()->back()->with('message', 'Data saved');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id); // Find the product by ID or fail
        $brands = Brand::all();
        $categories = Category::all();
        // $prands and $categories created as varaible for the dynamic data reading in the form blade file

        return view('backend.product.edit', compact('product', 'brands', 'categories')); // Return the form view for creating a new product

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand_id' => 'nullable|exists:brands,id',
            'category_id' => 'nullable|exists:categories,id',
            'stock' => 'required|integer',
            'quantity' => 'required|integer',
            'color' => 'required|string',
            'size' => 'required|string',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($id);

        // Initialize imagePath
        $imagePath = $product->image;

        // Handle the image upload if present
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image) {
                \Storage::delete('public/products/'.$product->image);
            }

            // Store the new image
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('products', $imageName, 'public');
            $imagePath = $imageName;
        }

        // Update the product details
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $imagePath; // Ensure this is set
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->stock = $request->stock;
        $product->quantity = $request->quantity;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->save();

        // Redirect back to the product index with a success message
        return redirect()->back()->with('message', 'Data saved');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Attempt to find the product by ID
        $product = Product::find($id);

        // Check if the product was found
        if (! $product) {
            // If not found, redirect back with an error message
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Delete the image if it exists
        if ($product->image) {
            \Storage::delete('public/'.$product->image);
        }

        // Delete the product
        $product->delete();

        // Redirect back with a success message
        return redirect()->route('product.index')->with('message', 'Product deleted successfully.');
    }
}
