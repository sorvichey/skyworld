<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class StatusController extends Controller
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
        $data['statuss'] = DB::table('statuss')
            ->where('active',1)
            ->orderBy('id', 'desc')
            ->paginate();
        return view('statuss.index', $data);
    }
    public function create()
    {
        return view('statuss.create');
    }
    public function save(Request $r)
    {
        
        $data = array(
            'name' => $r->name
        );
        $sms = "The new branch has been created successfully.";
        $sms1 = "Fail to create the new branch, please check again!";
        $i = DB::table('statuss')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/status/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/status/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('statuss')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/status');
    }
    public function edit($id)
    {
        $data['status'] = DB::table('statuss')
            ->where('id',$id)->first();
        return view('statuss.edit', $data);
    }
    
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('statuss')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/status/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/status/edit/'.$r->id);
        }
    }
}
