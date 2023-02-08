<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{


    public function index()
    {
        $items = Category::all();
        return view("admin.categories.index",compact("items"));
    }


    public function create()
    {
        return view("admin.categories.create");
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title_ar' =>'required',
            'title_en' =>'required',
            'logo' =>"sometimes|image",

        ]);

        $data = $request->only('title_ar','title_en');
       if($request ->hasFile("logo")){
        $data['logo'] = Storage::disk("public")->put('logos',$request->file('logo'));
       }
        Category::query()->create($data);
        return redirect()->route("admin.categories.index");
    }

    public function show($id)
    {

    }


    public function edit($id)
    {
        $item =  Category::query()->find($id);
        return view("admin.categories.edit",compact("item"));

    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title_ar' =>'required',
            'title_en' =>'required',
            'logo' =>"sometimes|image",

        ]);

        $data = $request->only('title_ar','title_en');
       if($request ->hasFile("logo")){
        $data['logo'] = Storage::disk("public")->put('logos',$request->file('logo'));
       }
     Category::query()->find($id)->update($data);

        return redirect()->route("admin.categories.index")->with('update', 'تم التعديل بنجاح');;

    }

    public function destroy($id)
    {
        Category::query()->find($id)->delete();
        return redirect()->route("admin.categories.index")->with('delete', 'تم الحذف بنجاح');

    }
}
