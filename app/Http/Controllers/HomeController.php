<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Delivered;
use App\Models\Person;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $userId = Auth::user()->id;
        $data = Product::where('user_id', $userId)->count();
        $product = DB::table('order_items')
            ->join('product', 'order_items.product_id', '=', 'product.id')->get();
        
        $sales = User::where('role', 'sales')->count();
        $person = Person::all()->count();
        $pend=Order::where('status','pending')->count();
        $comp=Order::where('status','completed')->count();

        // $completed=Order::where('status','completed')->where('visible','1')->first();
  
        $all=Order::all()->count();
        return view('Admin.home', compact('data','person','sales','product','pend','comp','all'));
    }
   
    // public function redirect()
    // {
    //     $role = Auth::user()->role;


    //     if ($role == 'admin') {


    //         return redirect()->intended('/home');
    //     } elseif ($role == 'admin') {
    //         return redirect()->intended('/dash');
    //     } 

            
        
    // }
    public function setting()
    {

        return view('Admin.setting');
    }
    public function update(Request $req)
    {
        $req->validate([
            'password' => 'required|string|confirmed|min:8',
        ]);
        $id=Auth::id();
        $user = User::find($id);
        $user->name = $req['name'];
        $user->email = $req['email'];
        $user->username = $req['username'];
        $user->password = Hash::make($req['password']);
        $user->update();
        return back()->with('message', 'Profile Updated');
    }
}
