<?php

namespace App\Http\Controllers;
use App\Product;
use Image;
use Validator;
use App\User;
use App\Cart;
use App\Order;
use Auth;
use Session;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function createProduct(Request $request)	
    {
    	$this->validate($request, [
            'name' => 'required|max:120',
            'category' => 'required|max:250',
            'price' => 'required|integer',
            'unit' => 'required|max:20',
            'stock' => 'required|integer',

        ]);

    	$product = new Product();
    	$product->name = $request['name'];
    	$product->description = $request['description'];
    	$product->category = $request['category'];
    	$product->price = $request['price'];
    	$product->unit = $request['unit'];
    	$product->stock = $request['stock'];
    	

    	if($request->hasFile('featured')){
    		$featured = $request->file('featured');
    		$filename = time() . '.' . $featured->getClientOriginalExtension();
    		Image::make($featured)->save( public_path('/uploads/product/' . $filename ) );
    		$product->featured = $filename;
    	}
    	if($request->hasFile('image1')){
    		$image1 = $request->file('image1');
    		$filename = time() . '1'.'.' . $image1->getClientOriginalExtension();
    		Image::make($image1)->save( public_path('/uploads/product/' . $filename ) );
    		$product->image1 = $filename;
    	}
    	if($request->hasFile('image2')){
    		$image2 = $request->file('image2');
    		$filename = time() . '2'.'.' . $image2->getClientOriginalExtension();
    		Image::make($image2)->save( public_path('/uploads/product/' . $filename ) );
    		$product->image2 = $filename;
    	}
    	if($request->hasFile('image3')){
    		$image3 = $request->file('image3');
    		$filename = time() . '3'.'.' . $image3->getClientOriginalExtension();
    		Image::make($image3)->save( public_path('/uploads/product/' . $filename ) );
    		$product->image3 = $filename;
    	}
    	$request->user()->products()->save($product);
    	return redirect('/profile/addproduct')->with('status', 'Product Added');

    }

    public function showLatest(){
        $latestProducts = Product::latest()->paginate(12);
        $bestSellers = Product::orderBy('total_purchased', 'desc')->paginate(12);
        //return view('buy', compact('latestProducts'));
        return view('buy',['latestProducts'=>$latestProducts, 'bestSellers'=>$bestSellers]);
    }

    public function showProduct()
    {
        
        $products = DB::table('products')->where('user_id',Auth::user()->id)->get();

        return view('profile.myproduct', ['products' => $products]);

    }

    public function updateProduct(Request $request, $id) 
    {
        $this->validate($request, [
            'name' => 'required|max:120',
            'category' => 'required|max:250',
            'price' => 'required|integer',
            'unit' => 'required|max:20',
            'stock' => 'required|integer',

        ]);

        $product = new Product();
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->category = $request['category'];
        $product->price = $request['price'];
        $product->unit = $request['unit'];
        $product->stock = $request['stock'];


        if($request->hasFile('featured')){
            $featured = $request->file('featured');
            $filename = time() . '.' . $featured->getClientOriginalExtension();
            Image::make($featured)->save( public_path('/uploads/product/' . $filename ) );
            $product->featured = $filename;
        }
        if($request->hasFile('image1')){
            $image1 = $request->file('image1');
            $filename = time() . '1'.'.' . $image1->getClientOriginalExtension();
            Image::make($image1)->save( public_path('/uploads/product/' . $filename ) );
            $product->image1 = $filename;
        }
        if($request->hasFile('image2')){
            $image2 = $request->file('image2');
            $filename = time() . '2'.'.' . $image2->getClientOriginalExtension();
            Image::make($image2)->save( public_path('/uploads/product/' . $filename ) );
            $product->image2 = $filename;
        }
        if($request->hasFile('image3')){
            $image3 = $request->file('image3');
            $filename = time() . '3'.'.' . $image3->getClientOriginalExtension();
            Image::make($image3)->save( public_path('/uploads/product/' . $filename ) );
            $product->image3 = $filename;
        }

        DB::table('products')
            ->where('id', $id)
            ->update(['name' => $product->name]);

        DB::table('products')
            ->where('id', $id)
            ->update(['description' => $product->description]);
        
        DB::table('products')
            ->where('id', $id)
            ->update(['category' => $product->category]);
        
        DB::table('products')
            ->where('id', $id)
            ->update(['price' => $product->price]);
        
        DB::table('products')
            ->where('id', $id)
            ->update(['unit' => $product->unit]);
        
        DB::table('products')
            ->where('id', $id)
            ->update(['stock' => $product->stock]);
        
        
        
        return Redirect::back()->with('status', 'Product Added');

    }
    
    public function deleteProduct($id) 
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('profile.myproduct');
    }

    public function getDetail($id)
    {
        $products = Product::find($id);
        $products->hits++;
        $products->save();
        return view('product.detail',compact('products'));
    }

    public function report($id)
    {
        $products = Product::find($id);
        $products->report++;
        $products->save();
        return view('product.detail',compact('products'));
    }

    public function getDetail1($id)
    {
        $products = Product::find($id);
        $products->hits++;
        $products->save();
        return view('profile.detail',compact('products'));
    }

    public function sortBy(Request $request){

        $event=$request->input('sortby');
        $products = Product::orderBy($event,'desc')->paginate(6);
        return view('shop.index', compact('products'));
    }

    public function getAddToCart(Request $request, $id){
        $products = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart -> add($products, $products->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getCart()
    {
        if (!Session::has('cart'))
        {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'tax' => $cart->tax,
        'grandTotal' =>$cart->grandTotal]);
    }

     public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart -> reduceByOne($id);

        if (count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }
    public function getAddByOne($id){
        $stock = DB::table('products')->where('id', $id)->value('stock');
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart -> addByOne($id, $stock);
        Session::put('cart', $cart);
        return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart -> removeItem($id);

        if (count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    public function getCheckout()
    {
        if (!Session::has('cart'))
        {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout',['products' => $cart->items,'total' => $total]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart'))
        {
            return redirect()->route('shop.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

      //   Stripe::setApiKey('sk_test_VAbaZg0V8xtlnmhy0gF9dslh');
      // try{
      //       $charge = Charge::create(array(
      //           "amount" => $cart->totalPrice * 100,
      //           "currency" => "usd",
      //           //"source" => $request->input('stripeToken'), // obtained with Stripe.js
      //           "description" => "Test Charge"
      //       ));
            $order = new Order();
            $order->cart = serialize($cart);  ///deserialize later
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = str_random(10);

            Auth::user()->orders()->save($order);

        // }
        // catch(\Exception $e){
        //    return redirect()->route('checkout')->with('error', $e->getMessage());
        // }

        foreach($cart->items as $item){
            
            $product_id=$item['item']->id;
            $product=Product::findOrFail($product_id);
            $product->stock = $product->stock - $item['qty'];
            $product->total_purchased += $item['qty'];
            $product->save();
        }

        Session::forget('cart');
        return redirect('buy')->with('success', 'Successfully Purchased Products !');
    }

    public function index(Request $request){

           $products = Product::where(function($query)  use ($request){
            if (($term = $request->get('term'))){
                $query->Where('name', 'like', '%' . $term . '%');
//                $query->orWhere('address', 'like', '%' . $term . '%');
                // ery->orWhere('city', 'like', '%' . $term . '%');
            }
        })
            ->orderBy("id", "desc")
            ->paginate(6);

//
       return view('shop/index', [
            'products' => $products
        ]);
    }

    public function getReport()
    {
        $products = Product::where('report','>','5')->get();
        return view('mainadmin', [
            'products' => $products
        ]);
    }

        
}
