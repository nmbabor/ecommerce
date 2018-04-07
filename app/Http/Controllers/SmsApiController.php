<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Sms;
use App\Model\SmsConfig;
use GuzzleHttp\Client;

class SmsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quantity=SmsConfig::first()->value('sms_quantity');
        $allData=Sms::paginate(50);
        return view('backend.sms.index',compact('allData','quantity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quantity=SmsConfig::first()->value('sms_quantity');
        $allUsers=User::where('email','!=','admin@codeplanners.com')->where('type',2)->paginate(50);
        return view('backend.sms.send',compact('allUsers','quantity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $config=SmsConfig::first();
        if($config['sms_quantity']==0){
            return redirect('sms')->with('error','Insufficient balance ! '); 
        }
        $user= $config->user_name;
        $password= $config->password;
        $from= $config->from;
        $number=$request->number;
        $msg=$request->message;
        $msg=str_replace(' ','%20',$msg);
        $xml = file_get_contents("https://api.mobireach.com.bd/SendTextMultiMessage?Username=$user&Password=$password&From=$from&To=$number&Message=$msg");
        $smsApi=array();
        $number=explode(',', $number);
        $tag='MessageId';
        preg_match_all("/<".$tag."[^>]*>(.*?)<\/$tag>/si", $xml, $matches);
        $smsApi['messageId']=$matches[1];

        $tag='ErrorText';
        preg_match_all("/<".$tag."[^>]*>(.*?)<\/$tag>/si", $xml, $matches);
        $smsApi['errorText']=$matches[1];

        $tag='CurrentCredit';
        preg_match_all("/<".$tag."[^>]*>(.*?)<\/$tag>/si", $xml, $matches);
        $smsApi['currentCredit']=$matches[1];
        $apiDetails=array();
        foreach ($smsApi['messageId'] as $key => $value) {
            $apiDetails[$key]['message_id']=$value;
            $apiDetails[$key]['error']=$smsApi['errorText'][$key];
            $apiDetails[$key]['number']=$number[$key];
            $apiDetails[$key]['message']=str_replace('%20',' ',$msg);
            $status = file_get_contents("https://api.mobireach.com.bd/GetMessageStatus?Username=$user&Password=$password&MessageId=$value");
            $tag='Status';
            preg_match("/<".$tag."[>]*>(.*?)<\/$tag>/si", $status, $matches);
            $smsApi['status']=$matches[1];
        }
        
           
        try{
            foreach ($apiDetails as $value) {
                $insert= Sms::create($value);
            } 
            $qty['sms_quantity']=$config->sms_quantity - count($apiDetails);
            $config->update($qty);

            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect('sms')->with('success','Data Successfully Inserted');
            }else{
                return redirect('sms')->with('error','Something Error Found ! ');
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
        $data=SmsConfig::latest()->first();
        return view('backend.sms.config',compact('data'));
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
        return $request->all();
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

    public function sendToUser(Request $request)
    {
        $number=array();
        foreach ($request->number as $num) {
            if($num!=null and strlen($num)>10){
                if(substr($num,0,2)!='88'){
                    $num="88".$num;
                }
                $number[]=$num;
            }
        }
        $numbers=implode($number, ',');
        $msg=$request->message;
        $config=SmsConfig::first();
        if($config['sms_quantity']==0){
            return redirect('sms')->with('error','Insufficient balance ! '); 
        }
        $user= $config->user_name;
        $password= $config->password;
        $from= $config->from;
        $msg=str_replace(' ','%20',$msg);
        $xml = file_get_contents("https://api.mobireach.com.bd/SendTextMultiMessage?Username=$user&Password=$password&From=$from&To=$numbers&Message=$msg");
        $smsApi=array();
        $tag='MessageId';
        preg_match_all("/<".$tag."[^>]*>(.*?)<\/$tag>/si", $xml, $matches);
        $smsApi['messageId']=$matches[1];

        $tag='ErrorText';
        preg_match_all("/<".$tag."[^>]*>(.*?)<\/$tag>/si", $xml, $matches);
        $smsApi['errorText']=$matches[1];

        $tag='CurrentCredit';
        preg_match_all("/<".$tag."[^>]*>(.*?)<\/$tag>/si", $xml, $matches);
        $smsApi['currentCredit']=$matches[1];
        $number=explode(',', $numbers);
        $apiDetails=array();
        foreach ($smsApi['messageId'] as $key => $value) {
            $apiDetails[$key]['message_id']=$value;
            $apiDetails[$key]['error']=$smsApi['errorText'][$key];
            $apiDetails[$key]['number']=$number[$key];
            $apiDetails[$key]['message']=str_replace('%20',' ',$msg);
            $status = file_get_contents("https://api.mobireach.com.bd/GetMessageStatus?Username=$user&Password=$password&MessageId=$value");
            $tag='Status';
            preg_match("/<".$tag."[>]*>(.*?)<\/$tag>/si", $status, $matches);
            $smsApi['status']=$matches[1];
        }
        
           
        try{
            foreach ($apiDetails as $value) {
                $insert= Sms::create($value);
            } 
            $qty['sms_quantity']=$config->sms_quantity - count($apiDetails);
            $config->update($qty);

            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect('sms')->with('success','Data Successfully Inserted');
            }else{
                return redirect('sms')->with('error','Something Error Found ! ');
            }
        }
     public function config(Request $request)
        {
            $input = $request->all();
            $data=SmsConfig::findOrFail($request->id);
            try{
            $data->update($input);
                
            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect()->back()->with('success','Data Successfully Updated');
            }else{
                return redirect()->back()->with('error','Something Error Found ! ');
            }
    }


}

