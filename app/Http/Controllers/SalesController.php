<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\User;
use App\Models\Delivered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\PseudoTypes\True_;

class SalesController extends Controller
{
    // public function index(){
    //     return view('Sales.login');
    // }
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function index(){
        return redirect()->intended('/dash');
     }  
    public function add_sales()
    {
     
        return view('add_sales');
    }

    public function home()
    {
        $data = Order::all()->count();
        $pend=Order::where('status','pending')->count();
        $comp=Order::where('status','completed')->count();
        return view('Sales.dash', compact('pend','comp','data'));
    }
    public function manage()
    {
        
        $data= User::where('role','sales')->get();
        return view('manage',['manage'=>$data]);
    }
   
   protected function sales(Request $request){
            
  
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'username' => ['required', 'string', 'min:4','unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
        $sales = new User([
            "name" => $request->get('name'),
            'email' => $request->get('email'),
            'username' =>$request->get('username'),
            'role' => $request->get('role'),
            'status'=>$request->get('status')== True ? '1':'0',
            "password"=>Hash::make($request->get('password')),
    
        ]);
        $sales->save();
        return view('add_sales')->with('message','seller added succesfuly');
    }
    
   
   
       
    public function new_orders(){
        $orders=Order::where('status','pending')->get();
        return view('Sales.new_orders',['orders'=>$orders]);
        }
    //  public function delivered($id){
    //     $allthings=Order::where('product_id',$id)->get();
    //     foreach($allthings as $all)
    //         {
    //             $order= new Delivered;
    //             $order->product_id=$all['product_id'];
    //             $order->user_id=$all['user_id'];
    //             $order->status="paid";
    //             $order->payment_status="paid";
    //             $order->payment_method=$all['payment_method'];
    //             $order->address=$all['address'];
    //             $order->quantity=$all['quantity'];
    //         }
    //         $order->save();
    //         Order::destroy($id);
    //         DB::delete('delete from orders where product_id=?',[$id]);
           
    //     return redirect('new_orders');
    //  } 
    // public function paid(){
    //     $delivered= Delivered::all();
    //      return view('delivered',['delivered'=>$delivered]);
    // }
    // public function done($id){
    //     Delivered::destroy($id);
    //     DB::delete('delete from delivered where id=?',[$id]);
    //     return redirect('delivered');
    // }
    public function edit($id){
        $detail = User::find($id);
        return view ('Admin.editSales',['detail'=>$detail]);
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'username' => ['string', 'min:4','unique:users'],
        ]);

           
            $detail=User::where('role','sales')->find($id);
            $detail->name = $request->input('name');
            $detail->username=$request->input('username');
            $detail->email=$request->input('email');
            $detail->status=$request->input('status')==True ? '1':'0';
            $detail->save();
        
        return redirect('/manage')->with('status','sales profile updated');
    }
    public function destroy($id)
    {
        
        User::find($id)->delete();
        
        return redirect('manage');
    }
    public function new(){
        
            $orders=Order::where('status','pending')->get();
            return view('Sales.new_orders',['orders'=>$orders]);
            
    }
      public function done(){
       
            $orders=Order::where('status','completed')->get();
            return view('Sales.completed',['orders'=>$orders]);
        
      }
        
}
