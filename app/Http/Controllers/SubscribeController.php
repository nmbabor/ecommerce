<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Subscriber;
use Validator;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData=Subscriber::orderBy('id','desc')->paginate(20);
        return view('backend.subscribe.index',compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allData=Subscriber::orderBy('id','desc')->paginate(20);
        return view('backend.subscribe.send',compact('allData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->except('_token');
        $validator = Validator::make($request->all(), [  
                    'email'          => 'required|email', 
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->with('error','Something Error');
                }
            try{
            Subscriber::create($input);
                
            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect()->back()->with('success','Subscribed Successfully.');
           }elseif($bug==1062){
                return redirect()->back()->with('error','Email has already been taken.');
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
    public function show(Request $request)
    {
        $input=$request->except('_token');
        $subject=$request->subject;


        
         try{
            for ($i=0; $i <sizeof($request->email) ; $i++) { 
                $email=$request->email[$i];
               $mail= \Mail::raw($request->message, function ($message) use($email,$subject) {
                    $message->to($email)->subject($subject);
                 });
                    
                }
                $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect()->back()->with('success','Email Send Successfully');
           }else{
                return redirect()->back()->with('error','Something Error Found ! ');
            }



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Subscriber::findOrFail($id);
        return view('backend.subscribe.edit',compact('data'));
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
        $input=$request->except('_token','_method');
        $validator = Validator::make($request->all(), [  
                    'email'          => 'required|email', 
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->with('error','Something Error');
                }
            Subscriber::where('id',$id)->update($input);
            try{
                
            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect()->back()->with('success','Subscribed Successfully Update.');
           }elseif($bug==1062){
                return redirect()->back()->with('error','Email has already been taken.');
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
        Subscriber::where('id',$id)->delete();
       return redirect()->back()->with('success','Successfully Deleted!');
    }
    public function send(Request $request)
    {
        $input=$request->except('_token');
        $subject=$request->subject;
        $email=$request->email;


        
         try{
               $mail= \Mail::raw($request->message, function ($message) use($email,$subject) {
                    $message->to($email)->subject($subject);
                 });
                    
                $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect()->back()->with('success','Email Send Successfully');
           }else{
                return redirect()->back()->with('error','Something Error Found ! ');
            }



    }
}
