<?php
 
namespace App\Http\Controllers;
use App\Cart;
use App\CartItem;
use Illuminate\Support\Facades\Auth;
 
use Illuminate\Http\Request;
 
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\finalCart;
use Illuminate\Support\Facades\Session;
 
class CartController extends Controller
{
 
   
 
    public function addItem ($productId){
 
        $cart = Cart::where('user_id',Auth::user()->id)->first();
 
        if(!$cart){
            $cart =  new Cart();
            $cart->user_id=Auth::user()->id;
            $cart->save();
        }
 
        $cartItem  = new Cartitem();
        $cartItem->product_id=$productId;
        $cartItem->cart_id= $cart->id;
        $cartItem->save();
        
        $items = $cart->cartItems;
        $total=0;
        foreach($items as $item){
            $total+=$item->product->price;
        }


        return Redirect::back();
 
    }
 
    public function showCart(){
        $cart = Cart::where('user_id',84);
 
        if(!$cart){
            $cart =  new Cart();
            $cart->user_id=84;
            $cart->save();
        }
 
        $items = $cart->cartItems;
        $total=0;
        foreach($items as $item){
           // $total+=$item->product->price;
        }

        return view('cart.view',['items'=>$items]);
    }
    public function calCart(){
        $cart = Cart::where('user_id',Auth::user()->id)->first();
 
        if(!$cart){
            $cart = new Cart();
            $cart->user_id=Auth::user()->id;
            $cart->save();
        }
 
        $items = $cart->cartItems;
        $total=0;
        foreach($items as $item){
            $total+=$item->product->price;
        }
        return $total;
    }
    public function removeAll($id){

    }
    public function removeItem($id){
 
        CartItem::destroy($id);
        return redirect('/cart');
    }
    public function add($imageId){
        $data = DB::table('imagedetails')->where('id', $imageId)->first();

        
        $finalCart = new finalCart();

        $finalCart->user_id = Session::get('userid');
        $finalCart->image_id = $data->id;
        $finalCart->image_details =$data->producut_description;
        $finalCart->price =$data->cost;
        $newTotal = Session::get('carttotal');
        $newTotal+=$data->cost;
        Session::set('carttotal',$newTotal);
        $finalCart->path =$data->image_path;
        $finalCart->save();
        $finalCart = finalCart::all()->where('user_id',Session::get('userid'));
        return view('painting')->with('finalcart',$finalCart)->with('data',$data);

    }
    public function show(){
        $finalCart = finalCart::all()->where('user_id',Session::get('userid'));
        $items=0;
        return view('cart')->with('finalcart',$finalCart);
    }
    public function delete($id){
        $finalCart = finalCart::all()->where('user_id',Session::get('userid'));
       
      //  $data = DB::table('imagedetails')->where('id', $id)->first();
        finalCart::destroy($id);
       // $newTotal = Session::get('carttotal');
       // $newTotal-=$data->cost;
        Session::set('carttotal',0);
        return view('cart')->with('finalcart',$finalCart);
    }
}
