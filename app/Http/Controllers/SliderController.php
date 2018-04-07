<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
use App\Http\Requests;
use Validator;
use App\Model\Slider;
use App\Model\Category;

class SliderController extends Controller
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
        $allData=Slider::orderBy('serial_num','asc')->paginate(10);
        return view('backend.slider.index',compact('allData'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $max_serial=Slider::max('serial_num');
        $categories=Category::where('status',1)->orderBy('serial_num','ASC')->pluck('category_name','id');
        return view('backend.slider.create',compact('max_serial','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $subDomain=\HelpMe::domain();
        //return $request->all();
       $validator = Validator::make($request->all(), [
                    'slide_photo' => 'image|max:1000',   
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
                
            $input = $request->all();
            if ($request->hasFile('slide_photo')) {
                $path= base_path()."/images/$subDomain/slides/";
                if(is_dir($path)==false){
                    mkdir($path,0755,true);
                }
                $photo=$request->file('slide_photo');
                $fileType=$photo->getClientOriginalExtension();
                $fileName=rand(1,1000).date('dmyhis').".".$fileType;
                $img=\Image::make($photo);
                $img->resize(850,370);
                $img->save("$path/$fileName");
                $input['slide_photo']="images/$subDomain/slides/".$fileName;
            }
            Slider::create($input);
            try{
                
            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect('slider')->with('success','Slider Successfully Inserted');
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
        $max_serial=Slider::max('serial_num');
       
        $data=Slider::findOrFail($id);
        $categories=Category::where('status',1)->orderBy('serial_num','ASC')->pluck('category_name','id');
        return view('backend.slider.edit',compact('data','max_serial','categories'));
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
        $subDomain=\HelpMe::domain();
        $data=Slider::findOrFail($request->id);
        
        $validator = Validator::make($request->all(), [
                    'slide_photo' => 'image|max:1000'
                ]);
        
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }

        $input=$request->all();
        
            if ($request->hasFile('slide_photo')) {
                $path= base_path()."/images/$subDomain/slides/";
                if(is_dir($path)==false){
                    mkdir($path,0755,true);
                }
                $photo=$request->file('slide_photo');
                $fileType=$photo->getClientOriginalExtension();
                $fileName=rand(1,1000).date('dmyhis').".".$fileType;
                $img=\Image::make($photo);
                $img->resize(850,370);
                $img->save("$path/$fileName");

                if($data['slide_photo']!=null and file_exists($data['slide_photo'])){
                unlink($data['slide_photo']);
                }
                $input['slide_photo']="images/$subDomain/slides/".$fileName;
            }
            /*return $input;*/
            
        try{
            $data->update($input);
                
            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect()->back()->with('success','Slider Successfully Inserted');
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
       $data=Slider::findOrFail($id);
       $img_path=$data['slide_photo'];
        if($data['slide_photo']!=null and file_exists($img_path)){
           unlink($img_path);
        }
       $data->delete();
       return redirect('slider')->with('success','Slide Successfully Deleted!');
    }










}
