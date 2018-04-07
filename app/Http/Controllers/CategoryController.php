<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Requests;
use App\Model\Category;
use Validator;
use App\Model\Attributes;
use App\Model\CartFunctionality;

class CategoryController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index(Request $request)
    {
        $allData=Category::orderBy('serial_num','asc')->paginate(10);
        return view('backend.category.index',compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $max_serial=Category::max('serial_num');
        return view('backend.category.create',compact('max_serial'));
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
                    'category_name' => 'required|unique:category,category_name',
                    'photo' => 'image|max:1000'
                ]);
            $link=trim($input['category_name'],' ');
            $link=trim($link,',');
            $link=str_replace(' , ', '-', $link);
            $link=str_replace(', ', '-', $link);
            $link=str_replace(' ,', '-', $link);
            $link=str_replace(',', '-', $link);
            $link=str_replace('/', '-', $link);
            $link=rtrim($link,' ');
            $link=str_replace(' ', '-', $link);
            $link=strtolower($link);
            $input['link']=$link;
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
            if ($request->hasFile('photo')) {
                $photo=$request->file('photo');
                $extension=$photo->getClientOriginalExtension();
                $fileName=rand(1,1000).date('dmyhis').".".$extension;
                /*$fileName=$photo->getClientOriginalName();*/
                $img=\Image::make($photo);
                $img->save('public/img/category/'.$fileName );
                $input['photo']=$fileName;
            }

        try{
        $cat_id=Category::create($input)->id;

        $bug=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }
         if($bug==0){
        return redirect('categories/'.$cat_id.'/edit')->with('success','Category Successfully Inserted');
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
        $max_serial=Category::max('serial_num');
       
        $data=Category::findOrFail($id);
        return view('backend.category.edit',compact('data','max_serial'));

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
         $validator = Validator::make($request->all(), [
                    'category_name' => "required|unique:category,category_name,$id",
                    'photo' => 'image|max:1000'
                ]);
                 if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
        $link=str_replace(' , ', '-', $input['category_name']);
            $link=str_replace(', ', '-', $link);
            $link=str_replace(' ,', '-', $link);
            $link=str_replace(',', '-', $link);
            $link=str_replace('/', '-', $link);
            $link=rtrim($link,' ');
            $link=str_replace(' ', '-', $link);
            $link=strtolower($link);
            $input['link']=$link;
        $data=Category::findOrFail($id);
        if ($request->hasFile('photo')) {
                $photo=$request->file('photo');
               $extension=$photo->getClientOriginalExtension();
                $fileName=rand(1,1000).date('dmyhis').".".$extension;
                /*$fileName=$photo->getClientOriginalName();*/
                $img=\Image::make($photo);
                $img->save('public/img/category/'.$fileName );
                $input['photo']=$fileName;
                $img_path='public/img/category/'.$data['photo'];

                if($data['photo']!=null and file_exists($img_path)){
                unlink($img_path);
                }
            }
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
        $data=Category::findOrFail($id);
        try{
            $img_path='public/img/category/'.$data['photo'];
            if($data['photo']!=null and file_exists($img_path)){
               unlink($img_path);
            }
            $data->delete();
            $bug=0;
            $error=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            $error=$e->errorInfo[2];
        }
        if($bug==0){
       return redirect('categories')->with('success','Data has been Successfully Deleted!');
        }elseif($bug==1451){
       return redirect('categories')->with('error','This Data is Used anywhere ! ');

        }
        elseif($bug>0){
       return redirect('categories')->with('error','Some thing error found !');

        }
    }



    public function attribute($attr_val){
        if($attr_val==1){
        return view('backend.category.attribute');
        }else{
            return '';
        }
        
    }
}