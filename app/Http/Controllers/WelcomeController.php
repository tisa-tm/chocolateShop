<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function dark(){
    	$darkChocolate = DB::table('chocolates')->where('type','Dark Chocolate')->get();
    	return view('darkChocolate')->with('darkChocolate',$darkChocolate);
    }
     public function milk(){
    	$milkChocolate = DB::table('chocolates')->where('type','Milk Chocolate')->get();
    	return view('milkChocolate')->with('milkChocolate',$milkChocolate);
    }
     public function white(){
    	$whiteChocolate = DB::table('chocolates')->where('type','White Chocolate')->get();
    	return view('whiteChocolate')->with('whiteChocolate',$whiteChocolate);
    }
    
    
}
