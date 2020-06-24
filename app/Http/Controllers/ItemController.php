<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Item;
class ItemController extends Controller
{
    public function showItems($cat_id){
    $item=item::where('category_id',$cat_id)->get();
    return $item->toJson();
    
    }
  
  public function storeItems(request $request){
    $data=$request->validate([
         'category_id'=>'required',
         'name' =>'required|string|max:191',
         'price' =>'required|numeric'
    ]);
  
    
        $item=new Item();
        $item->category_id=$request->category_id;
        $item->item_name=$request->name;
        $item->price=$request->price;
        $item->save();  
      
    

   }
   
   public function updatenumber( $ItemID,$number){
     $data = item::find($ItemID);
            $x['number']=$data->number - $number;
            item::where('id', $ItemID )->update($x);
     }
   public function updateprice( $Item_id,$price){
    $data = item::find($Item_id);
           $x['price']=$price;
           item::where('id', $Item_id )->update($x);
     }

    public function delete($id)
     {
        $data = item::find($id);
        $data->delete();
        // DB::table('items')->where('id', $id)->delete();
        DB::delete([$id]);
       // DB::table('items')->delete($id);
            // $data  = item::find($id);
            // $data->delete();
     }
     public function getItem($id){
          $data = item::find($id);
          return $data->toJson();

     }


}
