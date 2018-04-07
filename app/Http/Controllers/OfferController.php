<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Offer;
use App\Model\Category;
use App\Model\SubCategory;
use App\Model\Items;
use Validator;

class OfferController extends Controller
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
        $allData=Offer::leftJoin('items','offers.fk_item_id','=','items.id')
                ->select('offers.*','items.item_name')
                ->orderBy('offers.id','desc')->paginate(10);
        
        return view('backend.offer.index',compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::where('status',1)->get();
        return view('backend.offer.create',compact('category'));
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
                    'fk_item_id'    => 'required',
                    'start_date'    => 'required',
                    'end_date'      => 'required',
                    'discount'      => 'required',
                    'regular_price' => 'required',
                    'sale_price'    => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
                
                $input = $request->all();
            
            try{
                Items::where('id',$request->fk_item_id)->update([
                    'discount'=>$request->discount,
                    'regular_price'=>$request->regular_price,
                    'sale_price'=>$request->sale_price,
                ]);
            Offer::create($input);
                
            $bug=0;
            }catch(\Exception $e){
                $bug=$e->errorInfo[1];
            }
             if($bug==0){
            return redirect('offer')->with('success','Data Successfully Inserted');
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
        $price=Items::where('id',$id)->select('regular_price','sale_price','discount')->first();
        return \Response::json($price);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Offer::findOrFail($id);
        $itemInfo=Items::select('fk_category_id','fk_sub_category_id')->where('id',$data->fk_item_id)->first();
        $category=Category::where('status',1)->get();
        $subCategory=SubCategory::where('status',1)->where('fk_category_id',$itemInfo->fk_category_id)->get();
        $items=Items::select('item_name','id')->where('fk_category_id',$itemInfo->fk_category_id)->where('fk_sub_category_id',$itemInfo->fk_sub_category_id)->get();
        return view('backend.offer.edit',compact('data','category','subCategory','itemInfo','items'));
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
        $data=Offer::findOrFail($request->id);
        
        $validator = Validator::make($request->all(), [
                    'fk_item_id'    => 'required',
                    'start_date'    => 'required',
                    'end_date'      => 'required',
                    'discount'      => 'required',
                    'regular_price' => 'required',
                    'sale_price'    => 'required', 
                ]);
        
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }

        $input=$request->all();
            /*return $input;*/
            
        try{
            Items::where('id',$request->fk_item_id)->update([
                'discount'=>$request->discount,
                'regular_price'=>$request->regular_price,
                'sale_price'=>$request->sale_price,
            ]);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Offer::findOrFail($id);
       $img_path='public/img/offer/'.$data['photo'];
        if($data['photo']!=null and file_exists($img_path)){
           unlink($img_path);
        }
       $data->delete();
       return redirect('offer')->with('success','Successfully Deleted!');
    }

    public function subCategory($id){
        if($id!=null){
            $subCategory=SubCategory::where('status',1)->where('fk_category_id',$id)->orderBy('serial_num','ASC')->get();
            if(count($subCategory)>0){
                return view('backend.offer.subCategory',compact('subCategory'));
            }
        }
    }

    public function loadItem(Request $request){
        $id = $request->id;
        $type = $request->type;
        if($id!=null){
            if($type=='cat'){
                $items=Items::where('status',1)->where('fk_category_id',$id)->get();
            }elseif($type=='sub'){
                $items=Items::where('status',1)->where('fk_sub_category_id',$id)->get();
            }
            if(count($items)>0){
                return view('backend.offer.items',compact('items'));
            }
        }
    }


















}
