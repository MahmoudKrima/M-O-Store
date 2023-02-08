<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Admin::all();
        return view("admin.admin.index",compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.admin.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required',
            'code' =>"required|unique:admins,code",
            'password'=>'required'
        ]);

        $data = $request->only('name','code');
        $data['password'] = Hash::make($request->get("password"));
        Admin::query()->create($data);
        return redirect()->route("admin.admins.index");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item =  Admin::query()->find($id);
        return view("admin.admin.edit",compact("item"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' =>'required',
            'code' =>"unique:admins,code,".$id,
        ]);

        $data = $request->only('name','code');
        if($request ->has('password') and $request->get('password')){
            $data['password'] = Hash::make($request->get("password"));
        }
        Admin::query()->find($id)->update($data);
        return redirect()->route("admin.admins.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::query()->find($id)->delete();
        return redirect()->route("admin.admins.index");

    }
}
