<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Model\Attributes;
use App\Model\Category;
use App\Model\SubCategory;

class SubAttributesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $input = $request->all();
        $validator = Validator::make($request->all(), [
                    'name' => 'required'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }

        try{
        Attributes::create($input);
        $bug=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }
         if($bug==0){
        return redirect()->back()->with('success','Data Successfully Inserted');
        }else{
            return redirect()->back()->with('error','Something Error Found ! ');
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

        $allData['attribute']=Attributes::leftJoin('sub_category','attributes.fk_subcategory_id','=','sub_category.id')
            ->select('attributes.*','sub_category.sub_category_name as sub_category_name')->where('attributes.fk_subcategory_id',$id)->get();
        $allData['fk_subcategory_id']=$id;
        $allData['sub_category']=SubCategory::leftJoin('category','sub_category.fk_category_id','=','category.id')->select('sub_category.sub_category_name','sub_category.id as sub_category_id','category.category_name','category.id as category_id')->where('sub_category.id',$id)->first();
        return view('backend.subCategory.attribute',compact('allData'));
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
        $input=$request->all();
        //return $input;
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->with('error','Name Field is required!');
                }
        
        $data=Attributes::findOrFail($id);
        try{
            $data->update($input);
            $bug=0;
        }catch(\Exception $e){
            $bug = $e->errorInfo[1]; 
        }
        if($bug==0){
        return redirect()->back()->with('success','Attributes Successfully Updated');
        }else{
            return redirect()->back()->with('error','Something Error Found ! ');
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
        $data=Attributes::findOrFail($id);
        try{
            $data->delete();
            $bug=0;
            $error=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            $error=$e->errorInfo[2];
        }
        if($bug==0){
       return redirect()->back()->with('success','Data has been Successfully Deleted!');
        }elseif($bug>0){
       return redirect()->back()->with('error','Some thing error found !');

        }
    }
}
