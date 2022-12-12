<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Person;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class productControllerCopy extends Controller
{
    //
    public function index()
    {
        $data = Product::where('status', '1')->get();
        return view('productcopy', ['product' => $data]);
    }
    public function category(Request $req)
    {
        $category = $req['category'];

        if ($category == 'Asbeza') {
            $data = Product::where('category', 'Asbeza')->get();
            return view('asbeza', ['product' => $data]);
        } else {
            $data = Product::where('category', 'super_market')->get();
            return view('super', ['product' => $data]);
        }
    }
    public function detail($id)
    {
        $data = Product::find($id);
        return view('detailcopy', ['product' => $data]);
    }
    public function search(Request $req)
    {

        $data = Product::where('name', 'like', '%' . $req->input('query') . '%')->get();
        return view('searchcopy', compact('data'));
    }
    public function addToCart(Request $req)
    {
        $product_id = $req['product_id'];
        $quantity = $req['qnty']; 
        $name = $req['name'];
        if ($req->session()->has('user')) {  
        $sum=Cart::where('user_id', $req->session()->get('user')['id'])->sum('quantity')+$quantity;
        $available=Product::where('id',$product_id)->value('quantity');   
        $cart_qty=Cart::where('product_id',$product_id)->value('quantity');   
            if ($available < $cart_qty) {
                return redirect()->back()->with('status','ይቅርታ ' .$name. ' ከከክምችት አልቋል');
            }
           
            if ( $sum > 25) {
                return redirect('/')->with('limit', ' የእቃ ገደቡን ደርሰዋል');
            } 
            else {


                if (Cart::where('product_id', $product_id)->where('user_id', $req->session()->get('user')['id'])->exists()) {
                    $id = Cart::where('product_id', $product_id)->where('user_id', $req->session()->get('user')['id'])->value('id');
                    $quantity = $req['qnty'];
                    $cart = Cart::find($id);
                    $cart->quantity = Cart::where('product_id', $product_id)->where('user_id', $req->session()->get('user')['id'])->value('quantity') + $quantity;
                    $cart->save();
                } else {
                    $quantity = $req['qnty'];
                    $price = $req['price'];
                    $name = $req['name'];
                    Cart::create([
                        'user_id' => $req->session()->get('user')['id'],
                        'product_id' => $req['product_id'],
                        'price' => $price,
                        'name' => $name,
                        'quantity' => $quantity

                    ]);
                }
                return redirect()->back()->with('status',$name.' ገብቷል');
               
            }
        } else {
            return redirect('/log')->with('status', 'please first login');
        }
    }

    static function cartItem()
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }
    public function updatecart(Request $req)

    {
        
        $product_id = $req->input('prod_id');
        $quantity = $req->input('qty');
        $sum=Cart::where('user_id', $req->session()->get('user')['id'])->sum('quantity')+$quantity;
        if ( $sum > 25) {
            return redirect('/cartlist')->with('limit', ' የእቃ ገደቡን ደርሰዋል');
        } 
        else{
           
            $cart =  Cart::where('product_id', $product_id)->where('user_id', $req->session()->get('user')['id'])->first();
                    $cart->quantity = $quantity;
                    $cart->update();
        }
        
        
    }


    public function CartList()
    {
        if (Session::has('user')) {
            $userId = Session::get('user')['id'];
            $product = Cart::where('user_id', $userId)->get();

            return view('cartlist', ['product' => $product]);
        } else {
            return redirect('/log')->with('status', 'ስልክ ቁጥር ያስገቡ');
        }
    }


    public function removeCart($id)
    {  
        Cart::destroy($id);

        return redirect('cartlist')->with('status', 'ወቷል');
    }
    public function orderNow(Request $req)
    {
        if ($req->session()->has('user')) {
            $userId = Session::get('user')['id'];
            $total = Cart::where('user_id', $userId)->get();
            $person = Person::where('id', $userId)->get();
            return view('ordernow', ['total' => $total, 'person' => $person]);
        } else {
            return redirect('/log');
        }
    }
    public function orderPlace(Request $req)

    {
        if (Order::where('user_id', $req->session()->get('user')['id'])->where('status', 'pending')->exists()) {
            return redirect('/myorders')->with('status', 'እባኮትን የመጀመሪያ ትእዛዞ እስከኢጨረስ ይጠብቁ');
        } 
        else {

            $order = new Order;
            $order->user_id = Session::get('user')['id'];
            $order->status = "pending";
            $order->address = $req->input('address');
            $order->name = $req->input('fname');
            $order->lname = $req->input('lname');
            $order->phone = $req->input('phone');
            $order->total = $req->input('post_price');
            $order->save();
            $userId = Session::get('user')['id'];
            $allCart = Cart::where('user_id', $userId)->get();
            foreach ($allCart as $cart) {

                $orderItems = new OrderItems;
                $orderItems->order_id = $order->id;
                $orderItems->product_id = $cart['product_id'];
                $orderItems->quantity = $cart['quantity'];
                $orderItems->price = $cart['price'];
                $orderItems->save();

                $prod= Product::where('id',$cart->product_id)->first();
                $prod->quantity-=$cart->quantity;
                $prod->update();
                Cart::where('user_id', $userId)->delete();
            }
        return redirect('/')->with('status', 'ትእዛዞ ወደ ሽያጭ ሰራተኞች ተልኳል');

        }
    }
    public function myOrders()
    {
        if (Session::has('user')) {
            $userId = Session::get('user')['id'];
            $orders = Order::where('user_id', $userId)->where('visible', '1')->get();


            return view('myorders', ['orders' => $orders]);
        } else {
            return redirect('/log')->with('status', 'please first login');
        }
    }
    protected function auth()
    {

        return redirect()->intended('/');
    }
    public function view(Request $req, $id)
    {
        if ($req->session()->has('user')) {

            $userId = Session::get('user')['id'];

            $order = Order::where('id', $id)->where('user_id', $userId)->first();
            return view('orderdetails', compact('order'));
        } else {
            redirect('/log');
        }
    }
}
