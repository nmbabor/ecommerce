<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\Permissions;
use Validator;
use DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissionDatas = Permissions::all();
        return view('backend.administration.permission',compact('permissionDatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*validator all field in ads table*/
        $validator = Validator::make($request->all(),[
            'permission_name' => 'required',
            'status' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        /*request all input data in ads table*/
        $input = $request->all();
        //print_r($input);exit;
        try {
            Permissions::create($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
            $bug = $e->errorInfo[2];
        }
        
        if($bug == 0){
            return redirect('permission')->with('success','New Permission Created Successfully.');
        }else{
            return redirect('permission')->with('error','Something Error Found !, Please try again.'.$bug);
        }
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
    public function edit($id)
    {
        //
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
        $permissionId = Permissions::findOrFail($id);
        /*validator all field in ads table*/
        $validator = Validator::make($request->all(),[
            'permission_name' => 'required',
            'status' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        /*request all input data in ads table*/
        $input = $request->all();

        try {
            Permissions::permissionUpdate($input,$permissionId);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
            $bug = $e->errorInfo[2];
        }
        
        if($bug == 0){
            return redirect('permission')->with('success','permission Updated Successfully.');
        }else{
            return redirect('permission')->with('error','Something Error Found !, Please try again.'.$bug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Permissions::findOrFail($id);
        Permissions::deletePermission($data);
        return redirect('permission')->with('success','Delete Data Successfully ');
    }
}
