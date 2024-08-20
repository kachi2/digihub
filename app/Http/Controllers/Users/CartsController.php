<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Vinkla\Hashids\Facades\Hashids;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Traits\imageUpload;

class CartsController extends Controller
{
    //
use imageUpload;
    public function add(Request $request, $id)
     {   
      // return response()->json($request);
         $product = Product::find($id);
        //  if(isset($request->image)){
        //     $file = $this->UploadImage($request, '/carts/images');
        //  }
         $response = Cart::add([
             'id' => $product->id,
             'name' => $product->name,
             'price' => $product->sale_price,
             'qty' => 1,
             'image' => $product->image, 
             'weight'=>1, 
         ])->associate(Product::class);
         if($response){
          return response()->json($response);

         }
     }

     public function CartTest(Request $request){
      return $request;
     }



    public function Index()
    { 
      $prod = Product::latest()->take(6)->get();
      foreach($prod as $pp){
        $pp->productUrl = trimInput($pp->name);
        $pp->hashid = Hashids::connection('products')->encode($pp->id);
      }
        return view('users.carts.carts') 
        ->with('carts', Cart::content())
        ->with('latest', $prod)
        ->with('cartSession', Hashids::connection('products')->encode(rand(11111,99999)))
        ->with('breadcrumb', 'Shopping Cart');
    }




    public function destroy( $id)
    {
      //dd($id.' '.$request->rowId);
        Cart::remove($id);
        Session::flash('alert', 'error');
        Session::flash('msg', 'Cart Successfully removed');
        return back();
    }

    public function update(Request $request){
        $cartItemId = $request->cartId;
        $quantity = $request->qty;
        // Update the cart item quantity
        Cart::update($cartItemId, $quantity);
        Session::flash('alert', 'success');
        Session::flash('msg', 'Cart item quantity updated successfully');
        return back();
    }
}
