<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.slider.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.slider.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except("_token");
        $this->validate($request,[
            'image' =>'required|image',
        ]);
        $data ['image'] = Storage::disk("public")->put("images",$request->file("image"));
        Slider::query()->create($data);
        return redirect("admin/sliders");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view("admin.slider.edit",compact("slider"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
        $this->validate($request,[
            'small_title_ar' =>'required',
            'small_title_en' =>'required',
            'big_title_en' =>'required',
            'big_title_ar' =>'required',
            'image' =>"image",

        ]);

        $data = $request->only('small_title_ar','small_title_en','big_title_en','big_title_ar');
       if($request ->hasFile("image")){
        $data['image'] = Storage::disk("public")->put('images',$request->file('image'));
       }
     Slider::query()->find($id)->update($data);

        return redirect()->route("admin.sliders.index")->with('update', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect("admin/sliders");

    }
}
