<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'image' =>'required|image',
        ]);
        $data = $request->except("_token",'image');
        $data ['path'] = Storage::disk("public")->put("images",$request->file("image"));
        ProductImage::query()->create($data);
        return back();
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prop = ProductImage::find($id);
        $prop->delete();
        return back();
    }
}
