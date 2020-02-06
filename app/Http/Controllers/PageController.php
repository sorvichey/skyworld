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
        if(!Right::check('Page', 'l')){
            return view('permissions.no');
        }
        $data['pages'] = DB::table('pages')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->paginate(18);
        return view('pages.index', $data);
    }

    public function create()
    {
        if(!Right::check('Page', 'i')){
            return view('permissions.no');
        }
        return view('pages.create');
    }
    public function save(Request $r)
    {
        if(!Right::check('Page', 'i')){
            return view('permissions.no');
        }
        $data = array(
            'title' => $r->title,
            'description' => $r->description,
        );
        if($r->background)
        {
            // upload and rename file
            $data['background'] = $r->file('background')->store('uploads/pages/','custom');
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
    public function sub_save(Request $r)
    {
        if(!Right::check('Page', 'i')){
            return view('permissions.no');
        }
        $data = array(
            'order' => $r->order,
            'description' => $r->sub_description,
            'page_id' => $r->page_id,
            'youtube' => $r->youtube
        );
        if($r->featured_image)
        {
            // upload and rename file
            $data['featured_image'] = $r->file('featured_image')->store('uploads/pages/','custom');
        }
        $sms2 = "The new page has been created successfully.";
        $sms3 = "Fail to create the new page, please check again!";
        $i = DB::table('sub_pages')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms2', $sms2);
            return redirect('/admin/page/edit/'.$r->page_id);
        }
        else
        {
            $r->session()->flash('sms3', $sms3);
            return redirect('/admin/page/edit/'.$r->page_id)->withInput();
        }
    }
    public function edit($id)
    {
        if(!Right::check('Page', 'u')){
            return view('permissions.no');
        }
        $data['page'] = DB::table('pages')->where('id', $id)->first();
        $data['sub_pages'] = DB::table('sub_pages')->orderBy('id', 'desc')->where('active', 1)->where('page_id', $id)->paginate(18);
        return view('pages.edit', $data);
    }

    public function sub_edit($id ,Request $r)
    {
        if(!Right::check('Page', 'u')){
            return view('permissions.no');
        }
        $page_id = $r->query('page_id');
        $data['page'] = DB::table('pages')->where('id', $page_id)->first();
        $data['sub_page'] = DB::table('sub_pages')->orderBy('id', 'desc')->where('active', 1)->where('id', $id)->where('page_id', $page_id)->first();
        return view('pages.edit-sub', $data);
    }
    public function update(Request $r)
    {
        $data = array(
            'title' => $r->title,
            'description' => $r->description,
        );
        if($r->background)
        {
            // upload and rename file
            $data['background'] = $r->file('background')->store('uploads/pages/','custom');
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
    public function sub_update(Request $r)
    {
        if(!Right::check('Page', 'u')){
            return view('permissions.no');
        }
        $data = array(
            'order' => $r->order,
            'description' => $r->sub_description,
            'page_id' => $r->page_id,
            'youtube' => $r->youtube
        );
        if($r->featured_image)
        {
            // upload and rename file
            $data['featured_image'] = $r->file('featured_image')->store('uploads/pages/','custom');
        }
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('sub_pages')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms2', $sms);
            return redirect('/admin/sub-page/edit/'.$r->id.'?page_id='.$r->page_id);
        }
        else
        {
            $r->session()->flash('sms3', $sms1);
            return redirect('/admin/sub-page/edit/'.$r->id.'?page_id='.$r->page_id);
        }
        
    }
   
    
    public function delete(Request $r)
    {
        if(!Right::check('Customer', 'd')){
            return view('permissions.no');
        }
        DB::table('pages')->where('id', $r->id)->update(['active'=>0]);
        $r->session()->flash('sms', 'ទិន្នន័យត្រូវបានលុបដោយជោគជ័យ!');
        return redirect('admin/page');
    }
    public function sub_delete(Request $r)
    {
        if(!Right::check('Customer', 'd')){
            return view('permissions.no');
        }
        $page_id = $r->query('page_id');
        DB::table('sub_pages')->where('id', $r->id)->update(['active'=>0]);
        $r->session()->flash('sms2', 'ទិន្នន័យត្រូវបានលុបដោយជោគជ័យ!');
        return redirect('admin/page/edit/'.$page_id);
    }
}
