<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Hash;

class ViewUsersController extends Controller
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
        
       $allUsers=User::where('type',2)->paginate(10);
        return view('backend.users.index',compact('allUsers'));
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
        $input=$request->all();
        $validator = Validator::make($request->all(),[
                    'password' => 'required|min:6|confirmed',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
        $newPass=$input['password'];
        $input['password']=bcrypt($newPass);
        $data=User::findOrFail($request->id);
        try{
            $data->update($input);
            $bug=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }
        if($bug==0){
            return redirect('view-users')->with('success','Password Changed Successfully !');
        }else{
            return redirect('view-users')->with('error','Something is wrong !');

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
        $data=User::findOrFail($id);
        return view('backend.users.password',compact('data'));
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
       $data=User::findOrFail($request->id);
        
        $validator = Validator::make($request->all(), [
                    'name'          => 'required|max:50',
                    'email'         => 'email|required',
                ]);
        
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }

        $input=$request->all();
            try{
                $data->update($input);
                $result=0;
            }catch(\Exception $e){
                $result = $e->errorInfo[1];
            }

        if($result==0){
            return redirect('view-users')->with('success','Category Successfully Updated');
        }elseif($result==1062){
            return redirect('view-users')->with('error','The name has already been taken.');
        }else{
            return redirect('view-users')->with('error','Something Error Found ! ');
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
       
       try{
            $data->delete();
            $bug=0;
            $error=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            $error=$e->errorInfo[2];
        }
        if($bug==0){
       return redirect('view-users')->with('success','Data has been Successfully Deleted!');
        }elseif($bug==1451){
       return redirect('view-users')->with('error','This Data is Used anywhere ! ');

        }
        elseif($bug>0){
       return redirect('view-users')->with('error','Some thing error found !');

        }
    }
}
