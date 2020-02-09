<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class OriginController extends Controller
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
        $data['origins'] = DB::table('origins')
            ->where('active',1)
            ->orderBy('id', 'desc')
            ->paginate();
        return view('origins.index', $data);
    }
    public function create()
    {
        return view('origins.create');
    }
    public function save(Request $r)
    {
        
        $data = array(
            'name' => $r->name
        );
        $sms = "The new branch has been created successfully.";
        $sms1 = "Fail to create the new branch, please check again!";
        $i = DB::table('origins')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/origin/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/origin/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('origins')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/origin');
    }
    public function edit($id)
    {
        $data['origin'] = DB::table('origins')
            ->where('id',$id)->first();
        return view('origins.edit', $data);
    }
    
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('origins')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/origin/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/origin/edit/'.$r->id);
        }
    }
}
