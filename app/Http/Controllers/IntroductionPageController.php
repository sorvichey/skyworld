<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IntroductionPageController extends Controller
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
        $data['intropage'] = DB::table('introduction_pages')
            ->join('menus', 'menus.id', 'introduction_pages.menu_id')
            ->where('introduction_pages.active', 1)
            ->select('introduction_pages.*', 'menus.name as mname')
            ->orderBy('introduction_pages.id', 'desc')
            ->paginate(18);
        return view('introduction_pages.index', $data);
    }
    public function create()
    {
        // if(!Right::check('Page', 'i')){
        //     return view('permissions.no');
        // }
        $data['menus'] = DB::table('menus')
            ->where('active', 1)
            ->get();
        return view('introduction_pages.create', $data);
    }
    public function save(Request $r)
    {
        // if(!Right::check('Page', 'i')){
        //     return view('permissions.no');
        // }
        $data = array(
            'title' => $r->title,
            'description' => $r->description,
            'menu_id'=> $r->menu_id,
            
        );
        
        $sms = "The new page has been created successfully.";
        $sms1 = "Fail to create the new page, please check again!";
        $i = DB::table('introduction_pages')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/intropage/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/intropage/create')->withInput();
        }
    }
    public function edit($id)
    {
        // if(!Right::check('Page', 'u')){
        //     return view('permissions.no');
        // }
        $data['intropage'] = DB::table('introduction_pages')
            ->where('id', $id)
            ->first();
            $data['menus'] = DB::table('menus')
            ->where('active', 1)
            ->get();
        return view('introduction_pages.edit', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'title' => $r->title,
            'description' => $r->description,
            'menu_id' => $r->menu_id,
            
        );
        
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('introduction_pages')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/intropage/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/intropage/edit/'.$r->id);
        }
        
    }
    
    public function delete(Request $r)
    {
        // if(!Right::check('Customer', 'd')){
        //     return view('permissions.no');
        // }
        DB::table('introduction_pages')->where('id', $r->id)->update(['active'=>0]);
        $r->session()->flash('sms', 'Data has been deleted successfully!');
        return redirect('admin/intropage');
    }

}
