<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
class SocialController extends Controller
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
        $data['socials'] = DB::table('socials')
            ->where('active',1)
            ->orderBy('id', 'desc')
            ->paginate();
        return view('socials.index', $data);
    }
    public function create()
    {
        return view('socials.create');
    }
    public function save(Request $r)
    {
        
        $data = array(
            'url' => $r->url,
            'name' => $r->name,
        );
        if($r->icon) {
            $data['icon'] = $r->file('icon')->store('fronts/socials/', 'custom');
        }
        $sms = "The new branch has been created successfully.";
        $sms1 = "Fail to create the new branch, please check again!";
        $i = DB::table('socials')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/social/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/social/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('socials')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/social');
    }
    public function edit($id)
    {
        $data['social'] = DB::table('socials')
            ->where('id',$id)->first();
        return view('socials.edit', $data);
    }
    
    public function update(Request $r)
    {
        $data = array(
            'url' => $r->url,
            'name' => $r->name,
        );
        if($r->icon) {
            $data['icon'] = $r->file('icon')->store('fronts/socials/', 'custom');
        }
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('socials')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/social/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/social/edit/'.$r->id);
        }
    }
}

