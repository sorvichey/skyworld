<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class SlideController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // index
    public function index()
    {
        if(!Right::check('Slide', 'l'))
        {
            return view('permissions.no');
        }
        $data['slides'] = DB::table('slides')
            ->where('active',1)
            ->orderBy('id', 'desc')
            ->paginate(18);
        return view('slides.index', $data);
    }
    public function create()
    {
        if(!Right::check('Slide', 'i'))
        {
            return view('permissions.no');
        }
        return view('slides.create');
    }
    public function save(Request $r)
    {
        if(!Right::check('Slide', 'i'))
        {
            return view('permissions.no');
        }
        
        $data = array(
            'order' => $r->order,
            'price' => $r->price,
            'title' => $r->title,
            'short_description' => $r->short_description,
        );
        if($r->photo) {
            $data['photo'] = $r->file('photo')->store('fronts/slides/', 'custom');
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
    public function delete($id)
    {
        if(!Right::check('Slide', 'd'))
        {
            return view('permissions.no');
        }
        DB::table('slides')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/slide');
    }
    public function edit($id)
    {
        if(!Right::check('Slide', 'u'))
        {
            return view('permissions.no');
        }
        $data['slide'] = DB::table('slides')
            ->where('id',$id)->first();
        return view('slides.edit', $data);
    }
    
    public function update(Request $r)
    {
        if(!Right::check('Slide', 'u'))
        {
            return view('permissions.no');
        }
        $data = array(
            'order' => $r->order,
            'price' => $r->price,
            'title' => $r->title,
            'short_description' => $r->short_description,
        );
        if($r->photo) {
            $data['photo'] = $r->file('photo')->store('fronts/slides/', 'custom');
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

