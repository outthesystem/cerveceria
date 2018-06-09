<?php

namespace App\Modules\Product\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Modules\Product\Models\Category;
use App\Modules\Product\Models\Product;
use Session;

class ProductController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->search;

    if (isset($search)) {
      $products = Product::where('name', 'like', '%' . $search . '%')
      ->paginate(15);
      }
      else {
      $products = Product::paginate(15);
      }

      $categories = Category::all();

    return view('product::index', compact('products', 'categories', 'search'));
  }

  public function store(Request $request)
  {
        $product = new Product;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->count_stock = $request->count_stock;
        $product->is_cut = $request->is_cut;
        $product->time = $request->time;
        $product->save();

        Session::flash('success', 'El producto se ha creado correctamente.');

        return redirect('/product/edit/'.$product->id);
  }

  public function edit(Product $product)
  {
    $categories = Category::all();

    $regstocks = $product->regstocks()->orderBy('created_at', 'desc')->paginate(15);

    return view('product::edit', compact('product', 'categories', 'regstocks'));
  }

  public function update(Request $request, Product $product)
  {

    $count_stock = $request->count_stock;
    $is_cut = $request->is_cut;

    if (isset($count_stock)) {
    $product->count_stock = $request->count_stock;
    }
    else {
      $product->count_stock = NULL;
    }

    if (isset($is_cut)) {
    $product->is_cut = $request->is_cut;
    }
    else {
      $product->is_cut = NULL;
    }

    $product->category_id = $request->category_id;
    $product->name = $request->name;
    $product->description = $request->description;
    $product->stock = $request->stock;
    $product->price = $request->price;
    $product->is_cut = $request->is_cut;
    $product->time = $request->time;
    $product->save();

    Session::flash('success', 'El producto se ha actualizado.');

    return redirect('/product/edit/'.$product->id);
  }

  public function destroy(Product $product)
  {
    $product->delete();

    Session::flash('success', 'El producto se ha eliminado correctamente.');

    return redirect('/product/index');
  }
}
