<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   public function index(){
   
        $userId=Auth::user()->id;
        $data= Product::where('user_id',$userId)->get();
       
        return view ('Admin.earlier',['earlier'=>$data]);
   }

   public function detail($id){

    $data= Product::find($id);
    return view ('detail',['detail'=>$data]);
   }

   public function search(Request $req){
       $data= Product::
       where('name','like','%'.$req->input('query').'%')->get();
       return view('search',compact('products'));
    }
    // public function update(Request $request){
        
              
    //     if ($request->hasFile('file')) {

    //         $request->validate([
    //             'image' => 'mimes:jpeg,bmp,png' 
    //         ]);

           
    //         $path=$request['file']->store('products','public');

            
    //         $product = new Product([
    //             "name" => $request->get('name'),
    //             "description"=>$request->get('description'),
    //             "category"=>$request->get('category'),
    //             "price"=>$request->get('price'),
    //             "user_id"=>auth()->user()->id,
    //             "gallery" =>$path,

    //         ]);
    //         $product->save(); 
    //     } 
    //     else {
    //         $product = new Product([
    //             "name" => $request->get('name'),
    //             "description"=>$request->get('description'),
    //             "category"=>$request->get('category'),
    //             "price"=>$request->get('price'),
    //             "user_id"=>auth()->user()->id

    //         ]);
    //         $product->save(); 
    //     }
    //     return view('editProduct');
    // }
    public function editProduct($id){
        $data=Product::find($id);
                    
        return view('editProduct',['detail'=>$data]);
    }
  
}
