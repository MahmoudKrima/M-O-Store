<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $items = Product::all();
        $category = Category::all();
        return view("admin.products.index",compact("items","category"));
    }


    public function create()
    {
        return view("admin.products.create");
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title_ar' =>'required',
            'title_en' =>'required',
            'main_image' =>"nullable|image|required",
            'price'=>"required|numeric|gt:0",
            'description_ar'=>"required|string",
            'description_en'=>"required|string",
            "category_id" =>"required|integer"

        ]);
        $data = $request->except("_token",'main_image','tags');
       if($request ->hasFile("main_image")){
        $data['main_image'] = Storage::disk("public")->put('images',$request->file('main_image'));
       }
        $product = Product::query()->create($data);
        if($request ->has("tags")){
            $product ->tags()->sync($request->get("tags"));
        }
        return redirect()->route("admin.products.index")->with('success', 'تم الاضافة بنجاح');
    }

    public function show($id)
    {

    }


    public function edit($id)
    {
        $item =  Product::query()->find($id);
        return view("admin.products.edit",compact("item"));

    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title_ar' =>'required',
            'title_en' =>'required',
            'main_image' =>"sometimes|image",
            'price'=>"required|numeric|gt:0",
            'description_ar'=>"required|string",
            'description_en'=>"required|string",
            "category_id" =>"required|integer"

        ]);
        $data = $request->except("_token",'main_image','tags','key_ar','key_en','value_ar','value_en','sizes','color_ar','color_en');

        if($request ->hasFile("main_image")){
            $data['main_image'] = Storage::disk("public")->put('images',$request->file('main_image'));
           }
     $product = Product::query()->find($id);
     $product -> update($data);
     if($request ->has("tags")){
        $product ->tags()->sync($request->get("tags"));
    }
    if($request ->has("sizes")){
        $product ->sizes()->sync($request->get("sizes"));
    }
    if($request ->get("key_ar") and $request->get("key_en") and $request ->get("value_ar") and $request ->get("value_en")){
        $product ->props()->create($request->only("key_ar","key_en","value_ar","value_en"));
    }
    if($request ->get("color_en") and $request->get("color_ar")){
        $product ->colors()->create($request->only("color_en","color_ar"));
    }
        return back()->with('success', 'تم التعديل بنجاح');
    }
    public function destroy($id)
    {
        Product::query()->find($id)->delete();
        return redirect()->route("admin.products.index")->with('danger', 'تم الحذف بنجاح');

    }


}
