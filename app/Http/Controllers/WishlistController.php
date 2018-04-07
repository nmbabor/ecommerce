<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Wishlist;
use App\Model\ItemPhoto;
use Validator;
use Auth;

class WishlistController extends Controller
{
    public function index(){
    	$allData=Wishlist::leftJoin('items','wishlist.fk_item_id','items.id')->where('wishlist.fk_user_id',Auth::user()->id)->select('wishlist.*','items.item_name','link','sale_price')->get();
    	foreach ($allData as $key =>  $value) {
           $allData[$key]['photo']=ItemPhoto::where('fk_item_id',$value->fk_item_id)->value('photo');
         }
    	return view('frontend.wishlist',compact('allData'));
    }
    public function store(Request $request){
    	$input=$request->all();
    	 $validator = Validator::make($request->all(), [
                'fk_item_id' => 'required',
                'fk_user_id' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
           try{
    		Wishlist::create($input);
            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect()->back();
            }else{
                return redirect()->back()->with('error','Something Error Found ! ');
            }
    }
    public function delete($id){
    	Wishlist::where('id',$id)->delete();
    	return redirect()->back();
    }
}
