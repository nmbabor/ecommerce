<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Review;
use App\Model\Items;
use Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       $input['fk_user_id']=\Auth::user()->id;
         $validator = Validator::make($input, [
                    'rating' => 'required',
                    'fk_user_id' => 'required',
                    'fk_item_id' => 'required'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
        try{
        Review::create($input);
        $rate=Review::where('fk_item_id',$request->fk_item_id)->avg('rating');
            $avgRating=$rate*20;
            Items::where('id',$request->fk_item_id)->update(['rating'=>$avgRating]);

        $bug=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
        }
         if($bug==0){
        return redirect()->back()->with('success','Review is successfully submitted for approval.');
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
        $allData=Review::leftJoin('users','reviews.fk_user_id','=','users.id')->select('reviews.*','users.name','users.email')->where('fk_item_id',$id)->orderBy('reviews.id','DESC')->paginate(20);
        $item=Items::where('id',$id)->value('item_name');
        return view('backend.review.index',compact('allData','item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $input= $request->all();
        $data=Review::findOrFail($id);
        try{
            $data->update($input);
            $rate=Review::where('fk_item_id',$data->fk_item_id)->avg('rating');
            $avgRating=$rate*20;
            Items::where('id',$data->fk_item_id)->update(['rating'=>$avgRating]);
            $bug=0;
        }catch(\Exception $e){
            $bug = $e->errorInfo[1]; 
        }
        if($bug==0){
        return redirect()->back()->with('success','Review is successfully updated.');
        }else{
            return redirect()->back()->with('error','Something Error Found ! ');
        }
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
        $input=$request->only('rating','comment');
        $validator = Validator::make($request->all(), [
                    'rating' => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
        $data=Review::findOrFail($id);
        //$update['updated_data']= json_encode($input);
        try{
            $data->update([
                'rating'=>$input['rating'],
                'comment'=>$input['comment'],
            ]);
            $rate=Review::where('fk_item_id',$data->fk_item_id)->avg('rating');
            $avgRating=$rate*20;
            Items::where('id',$data->fk_item_id)->update(['rating'=>$avgRating]);

            $bug=0;
        }catch(\Exception $e){
            $bug = $e->errorInfo[1]; 
        }
        if($bug==0){
        return redirect()->back()->with('success','Review update is successfully submitted for approval.');
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
    public function updateData(Request $request)
    {
        return $request->all();
    }
}
