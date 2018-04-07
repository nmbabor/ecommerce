<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use App\Model\Category;
use App\Model\SubCategory;
use App\Model\Items;
use App\Model\ItemPackages;
use App\Model\Attributes;
use App\Model\AttributeOption;
use App\Model\Brand;
use App\Model\ItemPhoto;
use App\Model\SubSubCategory;
use Image;
use Auth;


use Validator;
use DB;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('status',1)->orderBy('serial_num','ASC')->pluck('category_name','id');
        $brands = Brand::where('status',1)->orderBy('serial_num','ASC')->pluck('name','id');
        return view('backend.item.addItem', compact('category','brands'));
    }

    public function view()
    {
        $categoryDatas = Category::all();
        $subCategoryDatas = SubCategory::all();
        //$itemDatas = Items::all();
        $authType=Auth::user()->type;
        if($authType!=1){
            $itemDatas = DB::table('items')
        ->leftJoin('category','items.fk_category_id','=','category.id')
        ->leftJoin('sub_category','items.fk_sub_category_id','=','sub_category.id')
        ->select('items.*','category.category_name','sub_category.sub_category_name')
        ->where('created_by',Auth::user()->id)
        ->orderBy('items.id','desc')
        ->paginate(25);
        }else{
        $itemDatas = DB::table('items')
        ->leftJoin('category','items.fk_category_id','=','category.id')
        ->leftJoin('sub_category','items.fk_sub_category_id','=','sub_category.id')
        ->select('items.*','category.category_name','sub_category.sub_category_name')
        ->orderBy('items.id','desc')
        ->paginate(25);
        }
        
        return view('backend.item.viewItems', compact('categoryDatas','subCategoryDatas','itemDatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //return $request->all();
        if(isset($request->cat)){
            $cat=$request->cat;
            $attributes=Attributes::select('id','name','attribute_type')->where('status',1)->where('fk_category_id',$cat)->get();
            foreach ($attributes as $value) {
                $id=$value['id'];
                $options[$id]=AttributeOption::select('id','name')->where('status',1)->where('fk_attribute_id',$id)->get();
            }
        }elseif(isset($request->sub)){
            $sub=$request->sub;
            $attributes=Attributes::select('id','name','attribute_type')->where('status',1)->where('fk_subcategory_id',$sub)->get();
            foreach ($attributes as $value) {
                $id=$value['id'];
                $options[$id]=AttributeOption::select('id','name')->where('status',1)->where('fk_attribute_id',$id)->get();
            }
        }elseif(isset($request->sub_sub)){
            $subSub=$request->sub_sub;
            $attributes=Attributes::select('id','name','attribute_type')->where('status',1)->where('fk_sub_sub_category_id',$subSub)->get();
            foreach ($attributes as $value) {
                $id=$value['id'];
                $options[$id]=AttributeOption::select('id','name')->where('status',1)->where('fk_attribute_id',$id)->get();
            }
        }
        
        //return $options;
        return view('backend.item.attributes',compact('attributes','options'));
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
        $input = $request->all();
        if(isset($input['fk_brand_id']) and $input['fk_brand_id']==null){
            $input['fk_brand_id']=null;
        }if($input['fk_sub_category_id']==null){
            $input['fk_sub_category_id']=null;
        }if(!isset($input['fk_sub_sub_category_id']) or ($input['fk_sub_sub_category_id']==null)){
            $input['fk_sub_sub_category_id']=null;
        }if($input['quantity']==null){
            $input['quantity']=0;
        }
        $input['created_by']=Auth::user()->id;
        $link=trim($input['link'],' ');
        $link=trim($link,',');
        $link=str_replace(' , ', '-', $link);
        $link=str_replace(', ', '-', $link);
        $link=str_replace(' ,', '-', $link);
        $link=str_replace(',', '-', $link);
        $link=str_replace('/', '-', $link);
        $link=rtrim($link,' ');
        $link=str_replace(' ', '-', $link);
        $link=str_replace('.', '', $link);
        
        $link=strtolower($link);
        $input['link']=$link;
        /*validator all field in ads table*/
        $validator = Validator::make($request->all(),[
            'item_name' => 'required',
            'link' => 'required|max:50|unique:items,link',
            'fk_category_id' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        /*request all input data in ads table*/
        
        if($input['sale_price']==null){
            $input['sale_price']=0;
        }
        if($input['regular_price']==null){
            $input['regular_price']=0;
        }
        if(isset($input['attributes'])){
        $input['attributes'] = json_encode($input['attributes']);
            
        }
        
      /*--Upload photo into package--*/
             if ($request->hasFile('photo')) {
                $j='';
                //print_r($_FILES['photo']['name']);
                for ($i=0; $i < count($_FILES['photo']['name']); $i++) {
                    
                    $photo=$request->file('photo')[$i];
                    $fileType=substr($_FILES['photo']['type'][$i], 6);
                    $fileName = '/'.date("Y/m/d").'/'.rand(1,1000).date('dmyhis').".".$fileType;
                    $path= base_path()."/images/$subDomain/item/".date("Y/m/d");
                    $path2= base_path()."/images/$subDomain/item/small/".date("Y/m/d");
                    if(is_dir($path)==false){
                    mkdir($path,0755,true);
                    }
                    if(is_dir($path2)==false){
                    mkdir($path2,0755,true);
                    }
                    if($j===''){
                        $j=$fileName;
                    }else{
                        $j=$j.','.$fileName;
                    }
                    $validextensions = array("jpeg", "jpg", "png","JPEG","JPG","PNG");  //Extensions which are allowed
                    $ext = explode('.', basename($_FILES['photo']['name'][$i]));//explode file name from dot(.) 
                    $file_extension = end($ext); //store extensions in the variable
                    if (($_FILES["photo"]["size"][$i] > 2000000) //Approx. 2000kb files can be uploaded.
                        | !in_array($file_extension, $validextensions)) {
                        return redirect()->back()->with('error','Invalid file Size or Type ! ')->withInput();
                    }
                    $img=\Image::make($photo);
                    $img->resize(600,600); 
                    $img->save("images/$subDomain/item/".$fileName );
                    $img->resize(310,310); 
                    $img->save("images/$subDomain/item/small".$fileName );
                }
                
            $pagePhoto=explode(',', $j);
            }else{
                unset($input['photo']);
            }
            $currentId=Items::create($input)->id;
            $input2=array();
            if (isset($pagePhoto)) {
            $input2['fk_item_id']=$currentId;
               for ($i=0; $i < sizeof($pagePhoto); $i++) { 
                $input2['photo']="images/$subDomain/item/".$pagePhoto[$i];
                $input2['small_photo']="images/$subDomain/item/small/".$pagePhoto[$i];
                ItemPhoto::create($input2);
                } 
            }

        try {
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
            $bug2 = $e->errorInfo[2];
        }
        
        if($bug === 0){
            return redirect('singleItem/'.$currentId)->with('success','New Item Created Successfully.');
        }else{
            return redirect()->back()->with('error','Something Error Found !, Please try again.'.$bug2);
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
        $authType=Auth::user()->type;
       if($authType!=1){
        $item = Items::leftJoin('category','items.fk_category_id','=','category.id')
        ->leftJoin('users','items.created_by','=','users.id')
        ->leftJoin('users as user1','items.updated_by','=','user1.id')
        ->leftJoin('sub_category','items.fk_sub_category_id','=','sub_category.id')
        ->leftJoin('sub_sub_category','items.fk_sub_sub_category_id','=','sub_sub_category.id')
        ->leftJoin('brand','items.fk_brand_id','=','brand.id')
        ->select('items.*','category.category_name','sub_category.sub_category_name','sub_sub_category.sub_name','brand.name as brand_name','users.name as creator_name','user1.name as editor_name')
        ->where('items.id','=',$id)
        ->where('items.created_by',Auth::user()->id)
        ->first();
       }else{
        $item = Items::leftJoin('category','items.fk_category_id','=','category.id')
        ->leftJoin('users','items.created_by','=','users.id')
        ->leftJoin('users as user1','items.updated_by','=','user1.id')
        ->leftJoin('sub_category','items.fk_sub_category_id','=','sub_category.id')
        ->leftJoin('sub_sub_category','items.fk_sub_sub_category_id','=','sub_sub_category.id')
        ->leftJoin('brand','items.fk_brand_id','=','brand.id')
        ->where('items.id','=',$id)
        ->select('items.*','category.category_name','sub_category.sub_category_name','sub_sub_category.sub_name','brand.name as brand_name','users.name as creator_name','user1.name as editor_name')
        ->orderBy('items.id','desc')
        ->first();
       }
       if(count($item)<1){
        return redirect()->back();
       }
        $attributeOption=json_decode($item->attributes,true);
        if(!empty($attributeOption)){
            foreach ($attributeOption as $key => $value) {
                $attributes[]=Attributes::select('id','name','attribute_type')->where('id',$key)->first();
                foreach($value as $attr){
                    $attributeOptions[$key][]=AttributeOption::select('id','name')->where('id',$attr)->first();
                }
            }   
        }else{
             $attributes=array();
             $attributeOptions=array();
        }
        $photo=ItemPhoto::where('fk_item_id',$id)->get();
        return view('backend.item.viewSingleItem', compact('item','id','attributes','attributeOptions','photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authType=Auth::user()->type;
       if($authType!=1){
        $item = Items::where('id',$id)->where('created_by',Auth::user()->id)->first();
       }else{
        $item = Items::findOrFail($id);
       }
       if(count($item)<1){
        return redirect()->back();
       }
       $category = Category::where('status',1)->orderBy('serial_num','ASC')->get();
        $brands = Brand::where('status',1)->orderBy('serial_num','ASC')->get();
        $subCategory = SubCategory::where('fk_category_id',$item->fk_category_id)->where('status',1)->orderBy('serial_num','ASC')->get();
        $subSubCategory = SubSubCategory::where('fk_sub_category_id',$item->fk_sub_category_id)->where('status',1)->orderBy('serial_num','ASC')->get();
        /*--Show Category and sub category wise attribute--*/
        if($item->fk_sub_category_id==null){
            $cat=$item['fk_category_id'];
            $attributes=Attributes::select('id','name','attribute_type')->where('fk_category_id',$cat)->get();
            foreach ($attributes as $value) {
                $aId=$value['id'];
                $options[$aId]=AttributeOption::select('id','name')->where('fk_attribute_id',$aId)->get();
            }
        }else{
           $sub=$item['fk_sub_category_id'];
            $attributes=Attributes::select('id','name','attribute_type')->where('fk_subcategory_id',$sub)->get();
            foreach ($attributes as $value) {
                $aId=$value['id'];
                $options[$aId]=AttributeOption::select('id','name')->where('fk_attribute_id',$aId)->get();
            } 
        }
        /*---Show item wise attribute----*/
        $attributeOption=json_decode($item->attributes,true);
        if(!empty($attributeOption)){

            foreach ($attributeOption as $key => $value) {
            $itemAttributes[]=Attributes::select('id','name','attribute_type')->where('id',$key)->first();
           foreach($value as $attr){
                    $attributeOptions[$key][]=AttributeOption::select('id','name')->where('id',$attr)->first();
                }
            }
        }else{
            $itemAttributes=array();
            $attributeOptions=array();
        }
        
        $photos=ItemPhoto::where('fk_item_id',$id)->get();
        return view('backend.item.updateItem', compact('category','subCategory','subSubCategory','item','id','attributes','options','itemAttributes','attributeOptions','brands','photos'));
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
        $data = Items::findOrFail($id);
        $input = $request->all();
        if($input['fk_brand_id']==null){
            $input['fk_brand_id']=null;
        }if($input['fk_sub_category_id']==null){
            $input['fk_sub_category_id']=null;
        }if(!isset($input['fk_sub_sub_category_id']) or ($input['fk_sub_sub_category_id']==null)){
            $input['fk_sub_sub_category_id']=null;
        }
        if($input['quantity']==null){
            $input['quantity']=0;
        }
        $input['updated_by']=Auth::user()->id;
        $link=str_replace(' , ', '-', $input['link']);
        $link=str_replace(', ', '-', $link);
        $link=str_replace(' ,', '-', $link);
        $link=str_replace(',', '-', $link);
        $link=str_replace('/', '-', $link);
        $link=rtrim($link,' ');
        $link=str_replace(' ', '-', $link);
        $link=str_replace('.', '', $link);
        $link=strtolower($link);
        $input['link']=$link;
        /*validator all field in ads table*/
        $validator = Validator::make($request->all(),[
            'item_name' => 'required',
            'fk_category_id' => 'required',
            'link' => "required|max:50|unique:items,link,$id",
            'photo_path' => 'image|max:2000',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        /*request all input data in ads table*/
        
        if($input['sale_price']==null){
            $input['sale_price']=0;
        }
        if($input['regular_price']==null){
            $input['regular_price']=0;
        }
        
        if(isset( $input['attributes'])){
        $input['attributes'] = json_encode($input['attributes']);
        }else{
            $input['attributes'] =null;
        }
        /*-- Photo Upload --*/
        if ($request->hasFile('photo')) {
            $p='';
            for ($i=0; $i < count($_FILES['photo']['name']); $i++) {
                    $photo=$request->file('photo')[$i];
                    $fileType=substr($_FILES['photo']['type'][$i], 6);
                    $fileName = '/'.date("Y/m/d").'/'.rand(1,1000).date('dmyhis').".".$fileType;
                    $path= base_path()."/images/$subDomain/item/".date("Y/m/d");
                    $path2= base_path()."/images/$subDomain/item/small/".date("Y/m/d");
                    if(is_dir($path)==false){
                    mkdir($path,0755,true);
                    }
                    if(is_dir($path2)==false){
                    mkdir($path2,0755,true);
                    }
                    if($p===''){
                        $p=$fileName;
                    }else{
                        $p=$p.','.$fileName;
                    }
                    $validextensions = array("jpeg", "jpg", "png","JPEG","JPG","PNG");  //Extensions which are allowed
                    $ext = explode('.', basename($_FILES['photo']['name'][$i]));//explode file name from dot(.) 
                    $file_extension = end($ext); //store extensions in the variable
                    if (($_FILES["photo"]["size"][$i] > 1000000) //Approx. 100kb files can be uploaded.
                        | !in_array($file_extension, $validextensions)) {
                        return redirect()->back()->with('error','Invalid file Size or Type ! ')->withInput();
                    }
                    if($photo!=null){
                    $img=\Image::make($photo);
                    $img->resize(600,600);
                    $img->save("images/$subDomain/item/".$fileName );
                    $img->resize(310,310);  
                    $img->save("images/$subDomain/item/small/".$fileName );   
                    }
                    
                    
                }
                    $itemPhoto=explode(',', $p);

            }
            /*--Delete Photo--*/
            if(isset($input['del_photo'])){
                for ($i=0; $i <sizeof($input['del_photo']) ; $i++) { 
                    $deletePhoto=ItemPhoto::where('id',$input['del_photo'][$i])->first();
                    if($deletePhoto!=null){

                        $img_path=$deletePhoto['photo'];
                        if(file_exists($img_path)){
                            unlink($img_path);
                        }
                        $img_path2 = $deletePhoto['small_photo'];
                        if(file_exists($img_path2)){
                            unlink($img_path2);
                        }
                        $deletePhoto->delete();
                    }
                }
            }
           $data->update($input);
           if (isset($itemPhoto)) {
            $input2['fk_item_id']=$id;
               for ($i=0; $i < sizeof($itemPhoto); $i++) { 
                $input2['photo']="images/$subDomain/item/".$itemPhoto[$i];
                $input2['small_photo']="images/$subDomain/item/small/".$itemPhoto[$i];
                ItemPhoto::create($input2);
                } 
            }
        try {
            
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
            $bug = $e->errorInfo[2];
        }
        
        if($bug === 0){
            return redirect('singleItem/'.$id)->with('success','Item Update Successfully.');
        }else{
            return redirect()->back()->with('error','Something Error Found !, Please try again.'.$bug);
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
        $data = Items::findOrFail($id);
        /*item package*/
        $packageShow = ItemPackages::searchPackageID($id);
        $package_Id = ItemPackages::searchPackage($id);
        if($packageShow === true){

            $packageDelete = ItemPackages::deletePackage($id,$package_Id);

        }
        /*Item delete*/
        $itemPhoto=ItemPhoto::where('fk_item_id',$id)->get();
        foreach ($itemPhoto as $row) {
            $img_path=$row['photo'];
            $img_path2=$row['small_photo'];
            if($row['photo']!=null and file_exists($img_path)){
               unlink($img_path);
            }
            if($row['small_photo']!=null and file_exists($img_path2)){
                unlink($img_path2);
            }
        }
       
       try{
        ItemPhoto::where('fk_item_id',$id)->delete();
        
            $data->delete();
            $bug=0;
            $error=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            $error=$e->errorInfo[2];
        }
        if($bug==0){
       return redirect('viewItems')->with('success','Data has been Successfully Deleted!');
        }elseif($bug==1451){
       return redirect('viewItems')->with('error','This Data is Used anywhere ! ');

        }
        elseif($bug>0){
       return redirect('viewItems')->with('error','Some thing error found !');

        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPackage($id)
    {
        $authType=Auth::user()->type;
       if($authType!=1){
        $item = Items::where('id',$id)->where('created_by',Auth::user()->id)->first();
       }else{
        $item = Items::findOrFail($id);
       }
       if(count($item)<1){
        return redirect()->back();
       }
        $packageDatas = DB::table('item_packages')
        ->where('item_packages.fk_item_id', '=',$id)
        ->get();
        return view('backend.item.addPackage', compact('packageDatas','item','id'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function packageCreate(Request $request, $id)
    {
       
        /*validator all field in ads table*/
        $validator = Validator::make($request->all(),[
            'fk_item_id' => 'required',
            'package_title' => 'required',
            'price' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        /*request all input data in ads table*/
        $input = $request->all();
        
        //print_r($input);exit;
        
        try {
            $item = ItemPackages::cratedPackage($input);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
            $bug = $e->errorInfo[2];
        }
        
        if($bug === 0){
            return redirect('addPackage/'.$id)->with('success','New Item Package Created Successfully.');
        }else{
            return redirect('addPackage/'.$id)->with('error','Something Error Found !, Please try again.'.$bug);
        }
    }

    public function packageUpdate(Request $request, $id)
    {
        $data = ItemPackages::findOrFail($id);
        //return $id;
        $validator = Validator::make($request->all(),[
            'fk_item_id' => 'required',
            'package_title' => 'required',
            'price' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        /*request all input data in ads table*/
        $input = $request->all();
        
        //print_r($input);exit;
        
        try {
            $item = ItemPackages::updatePackage($input,$data);
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
            $bug = $e->errorInfo[2];
        }
        
        if($bug === 0){
            return redirect()->back()->with('success','Item Package Updated Successfully.');
        }else{
            return redirect()->back()->with('error','Something Error Found !, Please try again.'.$bug);
        }
    }

    public function packageDelete($id)
    {
        $package = ItemPackages::findOrFail($id);
        
        $package->delete();
        return redirect()->back()->with('success', 'Item Package Deleted Successfully .');
    }

    /*item category type add sub_category select field*/
    public function loadSubCategory($value){
        if($value!=null){
            $subCat =SubCategory::orderBy('id','desc')
            ->where('fk_category_id','=',$value)->pluck('sub_category_name','id')->toArray();
            return view('backend.item.categoryTypeSubCategory', compact('value','subCat'));
        }
    }
    
     public function categoryWise($id)
    {
        $categoryDatas = Category::all();
        $subCategoryDatas = SubCategory::all();
        //$itemDatas = Items::all();
        $itemDatas = DB::table('items')
        ->leftJoin('category','items.fk_category_id','=','category.id')
        ->leftJoin('sub_category','items.fk_sub_category_id','=','sub_category.id')
        ->select('items.*','category.category_name','sub_category.sub_category_name')
        ->where('items.fk_category_id',$id)
        ->orderBy('items.id','desc')
        ->paginate(25);
        return view('backend.item.viewItems', compact('categoryDatas','subCategoryDatas','itemDatas'));
    }

    public function loadSubSub($value){
        if($value!=null){
            $subSubCat =SubSubCategory::orderBy('id','desc')
            ->where('fk_sub_category_id','=',$value)->pluck('sub_name','id')->toArray();
            return view('backend.item.subSubCategory', compact('value','subSubCat'));
        }
        
    }










}
