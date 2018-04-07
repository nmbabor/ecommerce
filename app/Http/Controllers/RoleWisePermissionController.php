<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\Roles;
use App\Model\Permissions;
use App\Model\RoleWisePermissions;

use Validator;

class RoleWisePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleDatas = Roles::all();
        $permissionDatas = Permissions::all();
        return view('backend.administration.roleWisePermission', compact('roleDatas','permissionDatas'));
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

     /*show permission data */
    public function showPermissionData($value){
        $permissionDatas = Permissions::all();
        $roleWisePermissions = RoleWisePermissions::where('fk_role_id',$value)->get();

        return view('backend.administration.loadPermission', compact('permissionDatas','roleWisePermissions'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'fk_role_id' => 'required'
            ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
     
        $input = $request->all();

        $id = $request->fk_role_id;
        $permissionID = $request->fk_permission_id;
        $permission = $request->permission;
        //print_r($permission);exit;
               



        try {
            /*delete role wise permission in rolewisepermission table*/
            $deletePermission = RoleWisePermissions::deleteRolePermission($id,$permission);
            /*insert role wise permission in rolewisepermission table*/    
            for($i=0;$i<count($permissionID);$i++){

            $searchPermissionID = RoleWisePermissions::checkExistsPermission($id,$permissionID);
            $searchId = RoleWisePermissions::checkExistsRole($id,$permissionID[$i]);
            /*check role wise permission in rolewisepermission table*/
            if($searchId===true){

                }else{
                    RoleWisePermissions::createRoleWisePermission($id,$permissionID[$i]);
                }
            }

            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
        }

        if($bug == 0){
            return redirect('roleWisePermission')->with('success', 'Created Successfully');
        }else{
            return redirect('roleWisePermission')->with('error', 'Something Error Found !, Please try again.');
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
        //
    }
}
