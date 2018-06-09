<?php

namespace App\Modules\Product\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Modules\Product\Models\Category;
use Session;
class CategoryController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->search;

    if (isset($search)) {
      $categories = Category::where('name', 'like', '%' . $search . '%')
      ->paginate(15);
      }
      else {
      $categories = Category::paginate(15);
      }

    return view('product::categories', compact('categories', 'search'));
  }

  public function store(Request $request)
  {
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'La categoria se ha creado correctamente.');

        return redirect('/product/categories');
  }

  public function edit(Category $category)
  {
    return view('product::editcategory', compact('category'));
  }

  public function update(Request $request, Category $category)
  {
    $category->name = $request->name;
    $category->save();

    Session::flash('success', 'la categoria se ha actualizado.');

    return redirect('/product/editcategory/'.$category->id);
  }

  public function destroy(Category $category)
  {
    $category->delete();

    Session::flash('success', 'la categoria se ha eliminado correctamente.');

    return redirect('/product/categories');
  }
}
