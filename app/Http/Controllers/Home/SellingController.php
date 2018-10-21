<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SellingController extends Controller
{
    public function selling()
    {
    	$selling = DB::table('goods')->get();
    	$stock = DB::table('goods')->orderBy('stock','asc')->take(10)->get();
	    return view('home.selling.index',[
	        	'title'=>'热卖专区',
	        	'selling'=>$selling,
	        	'stock'=>$stock
	        ]);
	}
}
