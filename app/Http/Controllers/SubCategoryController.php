<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Model\Category;
use App\Model\SubCategory;
use App\Http\Requests;

class SubCategoryController extends Controller
{
    
    function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return redirect('categories');
            
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
          $validator = Validator::make($request->all(), [
                    'sub_category_name' => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect('subCategory')
                        ->withErrors($validator)
                        ->withInput();
                }
        $input = $request->all();
        $link=str_replace(' , ', '-', $input['sub_category_name']);
            $link=str_replace(', ', '-', $link);
            $link=str_replace(' ,', '-', $link);
            $link=str_replace(',', '-', $link);
            $link=str_replace('/', '-', $link);
            $link=rtrim($link,' ');
            $link=str_replace(' ', '-', $link);
            $link=strtolower($link);
            $input['link']=$link;
        //return $input;
        try{
        SubCategory::create($input);
        $bug=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }
         if($bug==0){
        return redirect()->back()->with('success','subCategory Successfully Inserted');
        }elseif($bug==1062){
            return redirect()->back()->with('error','The name has already been taken.');
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
        $max_serial=SubCategory::where('fk_category_id',$id)->max('serial_num');
        $category = Category::findOrFail($id);
        $allData= SubCategory::leftJoin('category','sub_category.fk_category_id','=','category.id')
            ->select('sub_category.*','category.category_name as category_name')
            ->where('fk_category_id',$id)->orderBy('sub_category.serial_num','asc')
            ->paginate(10);
        return view('backend.subCategory.catWiseSubCat', compact('category','allData','max_serial'));
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
        $validator = Validator::make($request->all(), [
                    'sub_category_name' => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect('subCategory')->with('error','Duplicate or empty record found.');
                }
        $input=$request->all();
        $link=str_replace(' , ', '-', $input['sub_category_name']);
            $link=str_replace(', ', '-', $link);
            $link=str_replace(' ,', '-', $link);
            $link=str_replace(',', '-', $link);
            $link=str_replace('/', '-', $link);
            $link=rtrim($link,' ');
            $link=str_replace(' ', '-', $link);
            $link=strtolower($link);
            $input['link']=$link;
        $data=SubCategory::findOrFail($id);
        try{
            $data->update($input);
            $bug=0;
        }catch(\Exception $e){
            $bug = $e->errorInfo[1]; 
        }
        if($bug==0){
        return redirect()->back()->with('success','Data Successfully Updated');
        }elseif($bug==1062){
            return redirect()->back()->with('error','The name has already been taken.');
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
         $data=SubCategory::findOrFail($id);
        try{
            $data->delete();
            $bug=0;
            $error=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            $error=$e->errorInfo[2];
        }
        if($bug==0){
       return redirect('subCategory')->with('success','Data has been Successfully Deleted!');
        }elseif($bug==1451){
       return redirect('subCategory')->with('error','This Data is Used anywhere ! ');

        }
        elseif($bug>0){
       return redirect('subCategory')->with('error','Some thing error found !');

        }    }
}
