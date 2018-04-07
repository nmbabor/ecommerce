<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Model\AttributeOption;
use App\Model\Attributes;

class AttributeOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if($input['attribute_price']==null){
        $input['attribute_price']=0;
        }
               

        try{
        AttributeOption::create($input);
        $bug=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }
         if($bug==0){
        return redirect('attribute-option/'.$input['fk_attribute_id'])->with('success','Data Successfully Inserted');
        }else{
            return redirect('attribute-option/'.$input['fk_attribute_id'])->with('error','Something Error Found ! ');
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
        $allData['attribute']=AttributeOption::leftJoin('attributes','attribute_option.fk_attribute_id','=','attributes.id')
            ->leftJoin('category','attributes.fk_category_id','=','category.id')
            ->select('attribute_option.*','attributes.name as attribute_name')
            
            ->where('attribute_option.fk_attribute_id',$id)->get();
        $allData['fk_attribute_id']=$id;
        $allData['attributes']=Attributes::leftJoin('category','attributes.fk_category_id','=','category.id')->leftJoin('sub_category','attributes.fk_subcategory_id','=','sub_category.id')->leftJoin('sub_sub_category','attributes.fk_sub_sub_category_id','=','sub_sub_category.id')->select('attributes.*','category.category_name','category.id as category_id','sub_category.sub_category_name','sub_sub_category.sub_name')->where('attributes.id',$id)->first();
        return view('backend.category.attributeOption',compact('allData'));
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
        
        $data=AttributeOption::findOrFail($id);
        try{
            $data->update($input);
            $bug=0;
        }catch(\Exception $e){
            $bug = $e->errorInfo[1]; 
        }
        if($bug==0){
        return redirect('attribute-option/'.$input['fk_attribute_id'])->with('success','Attributes Successfully Updated');
        }else{
            return redirect('attribute-option/'.$input['fk_attribute_id'])->with('error','Something Error Found ! ');
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
        $data=AttributeOption::findOrFail($id);
        try{
            $data->delete();
            $bug=0;
            $error=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            $error=$e->errorInfo[2];
        }
        if($bug==0){
       return redirect('attribute-option/'.$data->fk_attribute_id)->with('success','Data has been Successfully Deleted!');
        }elseif($bug>0){
       return redirect('attribute-option/'.$data->fk_attribute_id)->with('error','Some thing error found !');

        }
    }
}
