<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Model\Work;
use Image;

class WorkController extends Controller
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
        $url=$request->path();
        

        $allData=Work::where('type',$url)->orderBy('id','DESC')->paginate(10);
        return view('backend.work.index',compact('allData','url'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('backend.work.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url1=$request->path();
        $url2=explode('/', $url1);
        $url=$url2[0];
        $subDomain=\HelpMe::domain();
       $validator = Validator::make($request->all(), [
                    'photo' => 'image|max:1000',   
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
                
            $input = $request->all();
            $input['type']=$url;
            $link=str_replace(' , ', '-', $input['title']);
            $link=str_replace(', ', '-', $link);
            $link=str_replace(' ,', '-', $link);
            $link=str_replace(',', '-', $link);
            $link=str_replace('/', '-', $link);
            $link=rtrim($link,' ');
            $link=str_replace(' ', '-', $link);
            $link=str_replace('.', '', $link);
            $link=str_replace('?', '', $link);
            $link=strtolower($link);
            $input['link']=$link;
            if ($request->hasFile('photo')) {
                $photo=$request->file('photo');
                $img = Image::make($photo)->resize(540, 300);
                $fileType=$photo->getClientOriginalExtension();
                $fileName=rand(1,1000).date('dmyhis').".".$fileType;
                $path= base_path()."/images/$subDomain/works/";
                    if(is_dir($path)==false){
                    mkdir($path,0755,true);
                    }
                $img->save($path.$fileName );
                $input['photo']="images/$subDomain/works/".$fileName;
            }
            
            Work::create($input);
            try{
                
            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect("$url")->with('success','Data Successfully Inserted');
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
        $data=Work::findOrFail($id);
        return view('backend.work.edit',compact('data'));
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
        
        $data=Work::findOrFail($request->id);
        
        $validator = Validator::make($request->all(), [
                    'photo' => 'image|max:1000'
                ]);
        
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }

        $input=$request->all();
        $link=str_replace(' , ', '-', $input['title']);
            $link=str_replace(', ', '-', $link);
            $link=str_replace(' ,', '-', $link);
            $link=str_replace(',', '-', $link);
            $link=str_replace('/', '-', $link);
            $link=rtrim($link,' ');
            $link=str_replace(' ', '-', $link);
            $link=str_replace('?', '', $link);
            $link=strtolower($link);
            $input['link']=$link;

        if ($request->hasFile('photo')) {
               $photo=$request->file('photo');
                $img = Image::make($photo)->resize(540, 300);
                $fileType=$photo->getClientOriginalExtension();
                $fileName=rand(1,1000).date('dmyhis').".".$fileType;
                $path= base_path()."/images/$subDomain/works/";
                    if(is_dir($path)==false){
                    mkdir($path,0755,true);
                    }
                $img->save($path.$fileName );
                $input['photo']="images/$subDomain/works/".$fileName;

                $img_path=$data['photo'];

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
            return redirect()->back()->with('success','Data Successfully Inserted');
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
       $data=Work::findOrFail($id);
       $img_path=$data['photo'];
        if($data['photo']!=null and file_exists($img_path)){
           unlink($img_path);
        }
       $data->delete();
       return redirect()->back()->with('success','Data Successfully Deleted!');
    }










}
