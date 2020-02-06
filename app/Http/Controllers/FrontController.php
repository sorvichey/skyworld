<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class FrontController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = DB::table('products')
            ->where('active', 1)
            // ->orderBy('id', 'desc')
            ->orderBy('order', 'asc')
            ->limit('15')
            ->get();
        $data['videos'] = DB::table('video')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->limit(6)
            ->get();
        $data['benefit'] = DB::table('benefits')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->first();
        return view('fronts.index', $data);
    }

    public function contact() {
        $data['contact'] = DB::table('pages')
            ->where('id', 2)
            ->first();
        return view('fronts.contact', $data);
    }
    public function about() {
        $data['about'] = DB::table('pages')
            ->where('id', 1)
            ->first();
        return view('fronts.about', $data);
    }
    public function product() {
        $data['contact'] = DB::table('pages')
            ->where('id', 3)
            ->first();
        $data['products'] = DB::table('products')
            ->where('active', 1)
            ->orderBy('order', 'desc')
            ->paginate(8);
        return view('fronts.product', $data);
    }

    public function product_detail($id) {
        $data['p'] = DB::table('products')
            ->where('active', 1)
            ->where('id', $id)
            ->orderBy('order', 'desc')
            ->first();
        return view('fronts.detail', $data);
    }

    public function shop() {
        $data['shop'] = DB::table('pages')
            ->where('id', 4)
            ->first();
        $data['shops'] = DB::table('locations')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->paginate(6);
        return view('fronts.shop', $data);
    }
    public function shop_detail($id) {
        $data['shop'] = DB::table('pages')
            ->where('id', 4)
            ->first();
        $data['cshop'] = DB::table('locations')
            ->where('active', 1)
            ->where('id', $id)
            ->first();
            
            if($data['cshop'] == null) {
                return abort(404);
            }
       
        return view('fronts.shop-detail', $data);
    }
}
