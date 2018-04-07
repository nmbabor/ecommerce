<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\AdManager;
use Validator;
use DB;

class AdManagerController extends Controller
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
        

        $allData=AdManager::leftJoin('all_page','ad_manager.fk_page_id','all_page.id')->where('ad_manager.status',1)->orderBy('ad_manager.id','DESC')->select('ad_manager.*','name')->paginate(10);
        return view('backend.adManager.index',compact('allData'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $pages=DB::table('all_page')->where('status',1)->pluck('name','id');
        return view('backend.adManager.create',compact('pages'));
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
                    'photo' => 'image|max:1000',   
                    'link' => 'url',   
                    'fk_page_id' => 'required',   
                    'serial_num' => 'required',   
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
                
            $input = $request->all();
           if ($request->hasFile('photo')) {
                $photo=$request->file('photo');
                $path= base_path()."/images/$subDomain/banners/";
                if(is_dir($path)==false){
                    mkdir($path,0755,true);
                }
                $fileType=$photo->getClientOriginalExtension();
                $fileName=rand(1,1000).date('dmyhis').".".$fileType;
                $upload=$photo->move("images/$subDomain/banners", $fileName );
                $input['photo']="images/$subDomain/banners/".$fileName;
            }
            
            AdManager::create($input);
            try{
                
            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect('banner-manager')->with('success','Data Successfully Inserted');
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
        $max=AdManager::where('fk_page_id',$id)->max('serial_num')+1;
        return view('backend.adManager.loadSerial',compact('max'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data=AdManager::findOrFail($id);
        $pages=DB::table('all_page')->where('status',1)->pluck('name','id');
        $max=AdManager::where('fk_page_id',$data->fk_page_id)->max('serial_num')+1;
        return view('backend.adManager.edit',compact('data','pages','max'));
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
        $data=AdManager::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
                    'photo' => 'image|max:1000',
                    'link' => 'url',
                ]);
        
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

        $input=$request->all();

        if ($request->hasFile('photo')) {
                $photo=$request->file('photo');
                $path= base_path()."/images/$subDomain/banners/";
                if(is_dir($path)==false){
                    mkdir($path,0755,true);
                }
                $fileType=$photo->getClientOriginalExtension();
                $fileName=rand(1,1000).date('dmyhis').".".$fileType;
                $upload=$photo->move("images/$subDomain/banners", $fileName );
                $input['photo']="images/$subDomain/banners/".$fileName;

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
       $data=AdManager::findOrFail($id);
       $img_path='public/img/banners/'.$data['photo'];
        if($data['photo']!=null and file_exists($img_path)){
           unlink($img_path);
        }
       $data->delete();
       return redirect()->back()->with('success','Data Successfully Deleted!');
    }










}
