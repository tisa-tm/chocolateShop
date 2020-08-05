<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input; 
use App\Extensions\MongoSessionHandler;
use Illuminate\Support\Facades\Session;
use App\Chocolate;
use App\Order;
use App\User;
use App\Cart;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showCart(){
        $userid = Auth::user()->id;
        //group by and count
        $chocolates = DB::table('carts')->select('carts.id as cartId','chocolates.name',DB::raw('sum(carts.quantity) as total'))->join('chocolates','carts.chocolateId','=','chocolates.id')->where('carts.userId', $userid)->groupBy('chocolates.name')->get();
        return $chocolates;
    }


    public function index()
    {
        $darkChocolate = DB::table('chocolates')->where('type','Dark Chocolate')->get();
        $milkChocolate = DB::table('chocolates')->where('type','Milk Chocolate')->get();
        $whiteChocolate = DB::table('chocolates')->where('type','White Chocolate')->get();

        $chocolates = $this->showCart();

        if(Auth::user()->type == 'user'){
            return view('home')->with('darkChocolate',$darkChocolate)->with('milkChocolate',$milkChocolate)->with('whiteChocolate',$whiteChocolate)->with('chocolates', $chocolates);
        }

        else{
            return view('admin.admin')->with('darkChocolate',$darkChocolate)->with('milkChocolate',$milkChocolate)->with('whiteChocolate',$whiteChocolate);
        }
        
    }


    public function store(Request $request){
        //for insertion in orders table
        //collecting data
        $userId = Auth::user()->id;

        //insertion
        $data = array('userId' => $userId, 'totalAmount' => 0);
        $orderId = DB::table('orders')->insertGetId($data);

        //for insertion in orderdetails table
        //collecting data
        $ids = $request->input('chocolateId');
        $quantities = $request->input('quantity');
        $count = 0;
        foreach($ids as $chocolateId){
            $chocolate = Chocolate::findOrFail($chocolateId);

            if($chocolate->quantity > 0){
                $chocolatePrice = $chocolate->price;
                $quantity = $quantities[$count];
                $count = $count+1;

                //minus the number of chocolate that was ordered from chocolates database
                $chocolate->quantity = $chocolate->quantity - $quantity;
                $chocolate->where('id',$chocolateId)->update(array('quantity' => $chocolate->quantity));

                //insertion
                $data = array('orderId' => $orderId, 'chocolateId' => $chocolateId, 'price' => $chocolatePrice, 'quantity' => $quantity);
                DB::table('orderdetails')->insert($data); 
                // Session::flash('message',"Successfully updated");
                session()->flash('successmessage',"Order was successfully placed");
            }
            else{
                $delete = Order::findOrFail($orderId);
                $delete->delete();
                // Session::flash('message',$chocolate->name);
                session()->flash('errormessage',$chocolate->name);
                return view('order.message');
            }

        }
        $order = Order::findOrFail($orderId);
        $totalAmount = DB::table('orderdetails')->select('amount')->where('orderId',$orderId)->get()->sum('amount');
        $order->where('id',$orderId)->update(array('totalAmount' => $totalAmount));
        return view('order.message');
        // return redirect('createorder');
    }


    public function placeOrderFromCart(){
         //for insertion in orders table
        //collecting data
        $userId = Auth::user()->id;

        //insertion
        $data = array('userId' => $userId, 'totalAmount' => 0);
        $orderId = DB::table('orders')->insertGetId($data);

        //for insertion in orderdetails table
        //collecting data
        $ids = DB::table('carts')->select('chocolateId')->where('userId',$userId)->get();

        // echo $ids;

        $quantities = DB::table('carts')->select(DB::raw('sum(carts.quantity) as quantity'))->join('chocolates','carts.chocolateId','=','chocolates.id')->where('carts.userId', $userId)->groupBy('chocolates.name')->get();
        // echo $quantities;

        $count = 0;
        foreach($ids as $chocolateId){
            $chocolateId = $chocolateId->chocolateId; 
            $chocolate = Chocolate::findOrFail($chocolateId);

            if($chocolate->quantity > 0){
                $chocolatePrice = $chocolate->price;
                $quantity = $quantities[$count]->quantity;
                // $quantity = (array)$quantity;
                $count = $count+1;

                //minus the number of chocolate that was ordered from chocolates database
                $chocolate->quantity = $chocolate->quantity - $quantity;
                $chocolate->where('id',$chocolateId)->update(array('quantity' => $chocolate->quantity));

                //insertion
                $data = array('orderId' => $orderId, 'chocolateId' => $chocolateId, 'price' => $chocolatePrice, 'quantity' => $quantity);
                DB::table('orderdetails')->insert($data); 
                // Session::flash('message',"Successfully updated");
                session()->flash('successmessage',"Order was successfully placed");
            }
            else{
                $delete = Order::findOrFail($orderId);
                $delete->delete();
                // Session::flash('message',$chocolate->name);
                session()->flash('errormessage',$chocolate->name);
                return view('order.message');
            }

        }
        $order = Order::findOrFail($orderId);
        $totalAmount = DB::table('orderdetails')->select('amount')->where('orderId',$orderId)->get()->sum('amount');
        $order->where('id',$orderId)->update(array('totalAmount' => $totalAmount));
        return view('order.message');

    }


    public function sendOptions(){
        $chocolateName = DB::table('chocolates')->select('id','name')->get();
        return view('order.create')->with('chocolateName',$chocolateName);
    }

    public function sendChocolate($id){
        $chocolate = DB::table('chocolates')->where('id',$id)->first();
        return view('order.singleorder')->with('chocolate',$chocolate);
    }

    
    public function goToCart($chocolateid){
        Session::flash('chocolateId', $chocolateid);
        return redirect()->back();
    }

    public function addToCart(Request $request){
        $userid = Auth::user()->id;
        $chocolateid = $request->input('chocolateId');
        $quantity = $request->input('quantity');
        $data = array('userId' => $userid, 'chocolateId' => $chocolateid, 'quantity' => $quantity);
        DB::table('carts')->insert($data);
        Session::flash('successmessagecart','Added to Cart');
        return redirect('home');
    }


    public function removeFromCart($cartid){
        $item = Cart::findOrFail($cartid);
        $item->delete();
        Session::flash('successmessagecart','Removed from Cart');
        return redirect()->back();
    }
}
 