<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // if(!Right::check('Page', 'l')){
        //     return view('permissions.no');
        // }
        $data['menus'] = DB::table('menus')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->paginate(18);
        return view('menus.index', $data);
    }
    public function create()
    {
        // if(!Right::check('Page', 'i')){
        //     return view('permissions.no');
        // }
        return view('menus.create');
    }
    public function save(Request $r)
    {
        // if(!Right::check('Page', 'i')){
        //     return view('permissions.no');
        // }
        $data = array(
            'name' => $r->name,
            
        );
        $sms = "The new page has been created successfully.";
        $sms1 = "Fail to create the new page, please check again!";
        $i = DB::table('menus')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/menu/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/menu/create')->withInput();
        }
    }
    public function edit($id)
    {
        // if(!Right::check('Page', 'u')){
        //     return view('permissions.no');
        // }
        $data['menu'] = DB::table('menus')
            ->where('id', $id)
            ->first();  
        return view('menus.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name,
            
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('menus')
            ->where('id', $r->id)
            ->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/menu/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/menu/edit/'.$r->id);
        }   
    }
    public function delete(Request $r)
    {
        // if(!Right::check('Customer', 'd')){
        //     return view('permissions.no');
        // }
        DB::table('menus')->where('id', $r->id)->update(['active'=>0]);
        $r->session()->flash('sms', 'Data has been deleted successfully!');
        return redirect('admin/menu');
    }
}
