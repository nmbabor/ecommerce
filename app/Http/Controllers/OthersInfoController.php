<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Model\PrimaryInfo;

class OthersInfoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display Video Section Information.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show Section Contact photo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Change Video section information, contact section photo and body parallax Background
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display Body Parallax Photo background.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show Organization primary information.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data=PrimaryInfo::first();
        return view('backend.othersInfo.primaryInfo',compact('data'));
    }

    /**
     * Display About Company.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        $data=PrimaryInfo::first();
        return view('backend.othersInfo.about',compact('data'));
    }
    /**
     * Update Primary info and about company.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subDomain=\HelpMe::domain();
       $input = $request->all();
       if(isset($input['map_embed'])){
            /*Embed youtube video link */
            $video=explode('src="', $input['map_embed']);
            if(isset($video[1])){
                $video=explode('"',$video[1] );
            }
            $input['map_embed'] = $video[0];
        }
        
        $data=PrimaryInfo::findOrFail($request->id);
        
        $validator = Validator::make($input, [
                    'map_embed'          => 'url',
                    'logo'          => 'image',
                    'favicon'          => 'image',
                ]);
        
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
        if ($request->hasFile('logo')) {
                $path= base_path()."/images/$subDomain/logo/";
                if(is_dir($path)==false){
                    mkdir($path,0755,true);
                }
                
                $photo=$request->file('logo');
                $img=\Image::make($photo);
                $img->save("$path/logo.png");
                $input['logo']="images/$subDomain/logo/logo.png";
            }
        if ($request->hasFile('favicon')) {
                $path2= base_path()."/images/$subDomain/icon/";
                if(is_dir($path2)==false){
                    mkdir($path2,0755,true);
                }
                $photo=$request->file('favicon');
                $img=\Image::make($photo)->resize(50,50);
                $img->save("$path2/favicon.png");
                $input['favicon']="images/$subDomain/icon/favicon.png";
            }
            $data->update($input);
        try{
                
            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect()->back()->with('success','Successfully Update');
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
        //
    }
}
