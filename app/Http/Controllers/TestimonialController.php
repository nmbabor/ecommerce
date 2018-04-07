<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Model\Testimonial;
use Image;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData=Testimonial::orderBy('id','desc')->paginate(10);
        return view('backend.reviews.index',compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.reviews.create');

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
        $validator = Validator::make($request->all(), [  
                    'name'          => 'required',
                    'photo'          => 'image|max:1000',
                    'description'          => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
            $input = $request->all();
            if ($request->hasFile('photo')) {
                $photo=$request->file('photo');
                $img = Image::make($photo)->resize(100, 100);
                $fileType=$photo->getClientOriginalExtension();
                $fileName=rand(1,1000).date('dmyhis').".".$fileType;
                $path= base_path()."/images/$subDomain/review/";
                    if(is_dir($path)==false){
                    mkdir($path,0755,true);
                    }
                $img->save($path.$fileName );
                $input['photo']="images/$subDomain/review/".$fileName;
            }
            Testimonial::create($input);
            try{
                
            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect('reviews')->with('success','Reviews Successfully Inserted');
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
        $data=Testimonial::findOrFail($id);
        return view('backend.reviews.edit',compact('data'));
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
        $subDomain=\HelpMe::domain();
        $data=Testimonial::findOrFail($request->id);
        
        $validator = Validator::make($request->all(), [
                    'name'          => 'required',
                    'description'          => 'required',
                ]);
        
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
        $input=$request->all();
                if ($request->hasFile('photo')) {
                $photo=$request->file('photo');
                $img = Image::make($photo)->resize(100, 100);
                $fileType=$photo->getClientOriginalExtension();
                $fileName=rand(1,1000).date('dmyhis').".".$fileType;
                $path= base_path()."/images/$subDomain/review/";
                    if(is_dir($path)==false){
                    mkdir($path,0755,true);
                    }
                $img->save($path.$fileName );
                $input['photo']="images/$subDomain/review/".$fileName;
                $img_path=$data['photo'];

                if($data['photo']!=null and file_exists($img_path)){
                unlink($img_path);
                }
            }
            
        try{
            $data->update($input);
                
            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect()->back()->with('success','Reviews Successfully Inserted');
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
        $data=Testimonial::findOrFail($id);
        $img_path='public/img/review/'.$data['photo'];
        if($data['photo']!=null and file_exists($img_path)){
           unlink($img_path);
        }
       $data->delete();
       return redirect('reviews')->with('success','Successfully Deleted!');
    }
}
