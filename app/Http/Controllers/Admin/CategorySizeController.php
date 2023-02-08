<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategorySize;
use Illuminate\Http\Request;

class CategorySizeController extends Controller
{

            public function index($category_id)
            {
                $sizes = CategorySize::query()->whereCategoryId($category_id)->get();
                $category = Category::query()->find($category_id);
                return view("admin.categories.sizes",compact("category", "sizes"));

            }


            public function store(Request $request , $category_id )
            {
                $category = Category::query()->find($category_id);
                $category->sizes()->create(request()->only("value"));
                return back();

            }

            public function destroy($id){
                CategorySize::query()->findOrFail($id)->delete();
                return back();
            }
}
