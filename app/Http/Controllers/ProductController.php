<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'brand'])->get();

        return view('product', compact('products'));
    }

    public function dashboard()
    {
        $products = Product::with(['category','brand'])->get();

        $categories = Category::all();
        $brands = Brand::all();

        return view('index', compact(
            'products',
            'categories',
            'brands'
        ));
    }

    public function store(Request $request)
    {
        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')
                ->store('products', 'public');
        }

        Product::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'gambar' => $gambar,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
        ]);

        return back()->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(int $id)
    {
        return redirect()->route('dashboard');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $gambar = $product->gambar;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')
                ->store('products', 'public');
        }

        $product->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'gambar' => $gambar,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
        ]);

        return redirect('/dashboard')
            ->with('success', 'Produk berhasil diupdate');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }

        $product->delete();

        return back()->with('success','Produk berhasil dihapus');
    }
}