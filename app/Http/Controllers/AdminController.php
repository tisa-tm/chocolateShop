<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Extensions\MongoSessionHandler;
use Illuminate\Support\Facades\Session;
//for image
// use Illuminate\Support\Facades\Response;
// use App\Images;
// use Image;
use App\Chocolate;
use App\Order;
use App\OrderDetail;
use App\User;



class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $darkChocolate = DB::table('chocolates')->where('type','Dark Chocolate')->get();
        $milkChocolate = DB::table('chocolates')->where('type','Milk Chocolate')->get();
        $whiteChocolate = DB::table('chocolates')->where('type','White Chocolate')->get();
        return view('admin.admin')->with('darkChocolate',$darkChocolate)->with('milkChocolate',$milkChocolate)->with('whiteChocolate',$whiteChocolate);
    }

  
    public function order(){
        $order = Order::all();
        return view('admin.order')->with('orders',$order);
    }

    //change status of order to shipped
    public function shipped($orderid, Request $request){
        $order = Order::findOrFail($orderid);
        $shipped = $request->input('shipped');
        if($shipped == "on"){
            $order->shipped = 1;
        }
        else{
            $order->shipped = 0; 
        }
        $order->save();
        return $this->order();
    }


    public function orderdetail(){
        $orderdetail = DB::table('orderdetails')->join('orders','orderdetails.orderId','=','orders.id')->join('chocolates','orderdetails.chocolateId','=','chocolates.id')->get();
        return view('admin.orderdetail')->with('orderdetails',$orderdetail);
    }


    public function user(){
        $user = User::all();
        return view('admin.user')->with('users',$user);
    }

    
    public function chocolate(){
        $darkChocolate = DB::table('chocolates')->where('type','Dark Chocolate')->get();
        $milkChocolate = DB::table('chocolates')->where('type','Milk Chocolate')->get();
        $whiteChocolate = DB::table('chocolates')->where('type','White Chocolate')->get();
        return view('admin.chocolate')->with('darkChocolate',$darkChocolate)->with('milkChocolate',$milkChocolate)->with('whiteChocolate',$whiteChocolate);
    }


    public function store(Request $request){
        if( $request->hasFile('image')) {
            $image = $request->file('image');
            $path = public_path(). '/chocolateimages/';
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $filename);
        }

        $data = array('name' => $request->name, 'quantity' => $request->quantity, 'price' => $request->price, 'type' => $request->type, 'image' => $filename);
        DB::table('chocolates')->insert($data);  
        return $this->chocolate();     
    }


    public function update($chocolateid){
        $chocolate = DB::table('chocolates')->where('id',$chocolateid)->first();
        return view('admin.updateChocolate')->with('chocolate',$chocolate);
    }


    public function postUpdate($id,Request $request){
        $chocolate = Chocolate::findOrFail($id);
        $this->validate($request, [
            'quantity' => 'required','numeric',
        ]);  
        $input = $request->all();
        $chocolate->fill($input)->save();
        Session::flash('message', 'The item was successfully altered');
        // $data = $this->chocolateData();
        return $this->chocolate();
    }
}
