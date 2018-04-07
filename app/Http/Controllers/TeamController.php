<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Model\Team;

class TeamController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData=Team::orderBy('id','desc')
            ->paginate(10);
        return view('backend.team.index',compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $max_serial=Team::max('serial_num');
        return view('backend.team.create',compact('max_serial'));
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
                    'photo'          => 'required|image|max:1000',  
                    'name'          => 'required', 
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
                
            $input = $request->all();
            if ($request->hasFile('photo')) {
                $photo=$request->file('photo');
                $fileType=substr($_FILES['photo']['type'], 6);
                $fileName=rand(1,1000).date('dmyhis').".".$fileType;
                /*$fileName=$photo->getClientOriginalName();*/
                $upload=$photo->move('public/img/team', $fileName );
                $input['photo']=$fileName;
            }
            
            Team::create($input);
            try{
                
            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect('our-team')->with('success','Successfully Inserted');
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
        $max_serial=Team::max('serial_num');
        $data=Team::findOrFail($id);
        return view('backend.team.edit',compact('data','max_serial'));
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
        $data=Team::findOrFail($request->id);
        
        $validator = Validator::make($request->all(), [
                    'photo'          => 'image|max:1000',
                    'name'          => 'required',  
                ]);
        
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }

        $input=$request->all();

        if ($request->hasFile('photo')) {
                $photo=$request->file('photo');
                $fileType=substr($_FILES['photo']['type'], 6);
                $fileName=rand(1,1000).date('dmyhis').".".$fileType;
                $upload=$photo->move('public/img/team', $fileName );
                $input['photo']=$fileName;
                $img_path='public/img/team/'.$data['photo'];

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
            return redirect()->back()->with('success','Successfully Inserted');
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
        $data=Team::findOrFail($id);
       $img_path='public/img/team/'.$data['photo'];
        if($data['photo']!=null and file_exists($img_path)){
           unlink($img_path);
        }
       $data->delete();
       return redirect('our-team')->with('success','Successfully Deleted!');
    }
}
