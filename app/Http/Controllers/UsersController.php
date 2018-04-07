<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Validator;
use Hash;
use Auth;
use Image;
class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of Admin.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index(Request $request)
    {
        if(Auth::user()->type!=1){
           return redirect()->back();
        }
        $allUsers=User::where('email','!=','admin@smartsoft.com')->where('type','!=',2)->paginate(10);
        return view('backend.user.index',compact('allUsers'));
    }

    /**
     * Show the form for creating a new Admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type!=1){
           return redirect()->back();
        }
        return view('backend.user.create');
    }

    /**
     * Store a newly created Admin in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->type!=1){
           return redirect()->back();
        }
        $subDomain=\HelpMe::domain();
       $validator = Validator::make($request->all(), [
                    'name' => 'required|max:20',
                    'email' => 'email|required|unique:users',
                    'password' => 'required|min:6|confirmed',
                    'image' => 'image|Max:500', 
                    /*enable   extension=php_fileinfo*/ 
                ]);
                if ($validator->fails()) {
                    return redirect('users/create')
                        ->withErrors($validator)
                        ->withInput();
                }
                
            $input = $request->all();
            if ($request->hasFile('image')) {
                $photo=$request->file('image');
                $img = Image::make($photo)->resize(100, 100);
                $fileType=$photo->getClientOriginalExtension();
                $fileName=rand(1,1000).date('dmyhis').".".$fileType;
                $path= base_path()."/images/$subDomain/users/";
                    if(is_dir($path)==false){
                    mkdir($path,0755,true);
                    }
                $img->save($path.$fileName );
                $input['image']="images/$subDomain/users/".$fileName;
            }
            
            $input['password']=bcrypt($input['password']);
            //return $input;
            try{
           $insert= User::create($input);

            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect('users')->with('success','Data Successfully Inserted');
            }elseif($bug==1062){
                return redirect('users')->with('error','The Email has already been taken.');
            }else{
                return redirect('users')->with('error','Something Error Found ! ');
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
        $data=User::findOrFail($id);
        return view('backend.user.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=User::findOrFail($id);
        return view('backend.user.password',compact('data'));
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
        $data=User::findOrFail($request->id);
        
        $validator = Validator::make($request->all(), [
                    'name'          => 'required|max:50',
                    'email'         => 'email|required',
                    'image' => 'image|Max:500'
                ]);
        
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }

        $input=$request->all();

        if ($request->hasFile('image')) {
                $photo=$request->file('image');
                $img = Image::make($photo)->resize(100, 100);
                $fileType=$photo->getClientOriginalExtension();
                $fileName=rand(1,1000).date('dmyhis').".".$fileType;
                $path= base_path()."/images/$subDomain/users/";
                    if(is_dir($path)==false){
                    mkdir($path,0755,true);
                    }
                $img->save($path.$fileName );
                $input['image']="images/$subDomain/users/".$fileName;
                $img_path=$data['image'];

                if($data['image']!=null and file_exists($img_path)){
                unlink($img_path);
                }
            }
            /*return $input;*/
            try{
                $data->update($input);
                $result=0;
            }catch(\Exception $e){
                $result=$e->errorInfo[1];
            }

        if($result==0){
        return redirect()->back()->with('success','Category Successfully Updated');
        }elseif($result==1062){
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
       $data=User::findOrFail($id);
       $img_path=$data['image'];
        if($data['image']!=null and file_exists($img_path)){
           unlink($img_path);
        }
       try{
            $data->delete();
            $bug=0;
            $error=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            $error=$e->errorInfo[2];
        }
        if($bug==0){
       return redirect('users')->with('success','Data has been Successfully Deleted!');
        }elseif($bug==1451){
       return redirect('users')->with('error','This Data is Used anywhere ! ');

        }
        elseif($bug>0){
       return redirect('users')->with('error','Some thing error found !');

        }
    }

    public function password(Request $request){
        $input=$request->all();
        $newPass=$input['password'];
        $data=User::findOrFail($request->id);
        if(!empty($input['old_password'])){
            $inputOld=$input['old_password'];
            if(Hash::check($inputOld,$data['password'])){
                $validator = Validator::make($request->all(),[
                    'password' => 'required|min:6|confirmed',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
                $input['password']=bcrypt($newPass);

            }else{
                return redirect()->back()->with('errorPass','Old Password not match !');
            }

        }
        try{
            $data->update($input);
            $bug=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }
        if($bug==0){
            return redirect('users')->with('success','Password Changed Successfully !');
        }else{
            return redirect('users')->with('error','Something is wrong !');

        }

            
        
    }















}