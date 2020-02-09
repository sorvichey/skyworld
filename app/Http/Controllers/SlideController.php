<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class SlideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // index
    public function index()
    {
        // if(!Right::check('Slide', 'l'))
        // {
        //     return view('permissions.no');
        // }
        $data['slides'] = DB::table('slides')
            ->join('menus', 'menus.id', 'slides.menu_id')
            ->where('slides.active',1)
            ->select('slides.*', 'menus.name as mname')
            ->orderBy('slides.id', 'desc')
            ->paginate(18);
        return view('slides.index', $data);
    }
    public function create()
    {
        // if(!Right::check('Slide', 'i'))
        // {
        //     return view('permissions.no');
        // }
        $data['menus'] = DB::table('menus')
            ->where('active', 1)
            ->get();
        return view('slides.create', $data);
    }
    public function save(Request $r)
    {
        // if(!Right::check('Slide', 'i'))
        // {
        //     return view('permissions.no');
        // }
        
        $data = array(
            'order' => $r->order,
            'menu_id' => $r->menu_id,
        );
        if($r->featured_image) {
            $data['featured_image'] = $r->file('featured_image')->store('fronts/slides/', 'custom');
        }
        $sms = "The new slide has been created successfully.";
        $sms1 = "Fail to create the new slide, please check again!";
        $i = DB::table('slides')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/slide/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/slide/create')->withInput();
        }
    }
    // delete
    public function delete(Request $r)
    {
        // if(!Right::check('Customer', 'd')){
        //     return view('permissions.no');
        // }
        DB::table('slides')->where('id', $r->id)->update(['active'=>0]);
        $r->session()->flash('sms', 'Data has been deleted successfully!');
        return redirect('admin/slide');
    }
    public function edit($id)
    {
        // if(!Right::check('Slide', 'u'))
        // {
        //     return view('permissions.no');
        // }
        $data['slide'] = DB::table('slides')
            ->where('id',$id)->first();
        $data['menus'] = DB::table('menus')
            ->where('active', 1)
            ->get();
        return view('slides.edit', $data);
    }
    
    public function update(Request $r)
    {
        // if(!Right::check('Slide', 'u'))
        // {
        //     return view('permissions.no');
        // }
        $data = array(
            'order' => $r->order,
            'menu_id' => $r->menu_id,
        );
        if($r->featured_image) {
            $data['featured_image'] = $r->file('featured_image')->store('fronts/slides/', 'custom');
        }
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('slides')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/slide/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/slide/edit/'.$r->id);
        }
    }
}

