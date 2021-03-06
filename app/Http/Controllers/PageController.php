<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class PageController extends Controller
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
        $data['pages'] = DB::table('pages')
            ->join('menus', 'menus.id',  'pages.menu_id')
            ->where('pages.active', 1)
            ->select('pages.*', 'menus.name as mname')
            ->orderBy('pages.id', 'desc')
            ->paginate(18);
        return view('pages.index', $data);
    }

    public function create()
    {
        // if(!Right::check('Page', 'i')){
        //     return view('permissions.no');
        // }
        $data['menus'] = DB::table('menus')
            ->where('active', 1)
            ->get();
        return view('pages.create', $data);
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
            'order' => $r->order,
        );
        if($r->featured_image)
        {
            // upload and rename file
            $data['featured_image'] = $r->file('featured_image')->store('uploads/pages/','custom');
        }
        $sms = "The new page has been created successfully.";
        $sms1 = "Fail to create the new page, please check again!";
        $i = DB::table('pages')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/page/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/page/create')->withInput();
        }
    }
    
    public function edit($id)
    {
        // if(!Right::check('Page', 'u')){
        //     return view('permissions.no');
        // }
        $data['page'] = DB::table('pages')
            ->where('id', $id)
            ->first();
            $data['menus'] = DB::table('menus')
            ->where('active', 1)
            ->get();
        return view('pages.edit', $data);
    }

    
    public function update(Request $r)
    {
        $data = array(
            'title' => $r->title,
            'description' => $r->description,
            'menu_id' => $r->menu_id,
            'order' => $r->order,
        );
        if($r->featured_image)
        {
            // upload and rename file
            $data['featured_image'] = $r->file('featured_image')->store('uploads/pages/','custom');
        }
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('pages')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/page/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/page/edit/'.$r->id);
        }
        
    }
    
   
    
    public function delete(Request $r)
    {
        // if(!Right::check('Customer', 'd')){
        //     return view('permissions.no');
        // }
        DB::table('pages')->where('id', $r->id)->update(['active'=>0]);
        $r->session()->flash('sms', 'Data has been deleted successfully!');
        return redirect('admin/page');
    }
}
