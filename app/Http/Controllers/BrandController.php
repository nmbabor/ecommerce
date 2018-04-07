<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Validator;
use App\Model\Brand;

class BrandController extends Controller
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
        $allData=Brand::orderBy('serial_num','asc')->paginate(10);
        return view('backend.brand.index',compact('allData'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $max_serial=Brand::max('serial_num');
        return view('backend.brand.create',compact('max_serial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
       $validator = Validator::make($request->all(), [
                    'photo' => 'image|max:1000',   
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
                
            $input = $request->all();
            $link=trim($input['name'],' ');
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

            if ($request->hasFile('photo')) {
                $photo=$request->file('photo');
                $extension=$photo->getClientOriginalExtension();
                $fileName=rand(1,1000).date('dmyhis').".".$extension;
                /*$fileName=$photo->getClientOriginalName();*/
                $img=\Image::make($photo)->resize(150,100);
                $img->save('public/img/brand/'.$fileName );
                $input['photo']=$fileName;
            }
            
            try{
            Brand::create($input);
                
            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect('all-brand')->with('success','Data Successfully Inserted');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $max_serial=Brand::max('serial_num');
       
        $data=Brand::findOrFail($id);
        return view('backend.brand.edit',compact('data','max_serial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data=Brand::findOrFail($request->id);
        
        $validator = Validator::make($request->all(), [
                    'photo' => 'image|max:1000'
                ]);
        
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }

        $input=$request->all();
        $link=trim($input['name'],' ');
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

        if ($request->hasFile('photo')) {
                $photo=$request->file('photo');
               $extension=$photo->getClientOriginalExtension();
                $fileName=rand(1,1000).date('dmyhis').".".$extension;
                /*$fileName=$photo->getClientOriginalName();*/
                $img=\Image::make($photo)->resize(150,100);
                $img->save('public/img/brand/'.$fileName );
                $input['photo']=$fileName;
                $img_path='public/img/brand/'.$data['photo'];

                if($data['photo']!=null and file_exists($img_path)){
                unlink($img_path);
                }
            }
            /*return $input;*/
            
        try{
            $data->update($input);
                
            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect()->back()->with('success','Data Successfully updated');
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
       $data=Brand::findOrFail($id);
       $img_path='public/img/brand/'.$data['photo'];
        if($data['photo']!=null and file_exists($img_path)){
           unlink($img_path);
        }
       $data->delete();
       return redirect('all-brand')->with('success','Data Successfully Deleted!');
    }










}
