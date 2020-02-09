<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class IndustryController extends Controller
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
        $data['industries'] = DB::table('industries')
            ->where('active',1)
            ->orderBy('id', 'desc')
            ->paginate();
        return view('industries.index', $data);
    }
    public function create()
    {
        return view('industries.create');
    }
    public function save(Request $r)
    {
        
        $data = array(
            'title' => $r->title
        );
        if($r->featured_image) {
            $data['featured_image'] = $r->file('featured_image')->store('fronts/industries/', 'custom');
        }
        $sms = "The new branch has been created successfully.";
        $sms1 = "Fail to create the new branch, please check again!";
        $i = DB::table('industries')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/industry/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/industry/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('industries')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/industry');
    }
    public function edit($id)
    {
        $data['industry'] = DB::table('industries')
            ->where('id',$id)->first();
        return view('industries.edit', $data);
    }
    
    public function update(Request $r)
    {
        $data = array(
            'title' => $r->title,
        );
        if($r->featured_image) {
            $data['featured_image'] = $r->file('featured_image')->store('fronts/industries/', 'custom');
        }
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('industries')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/industry/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/industry/edit/'.$r->id);
        }
    }
}
