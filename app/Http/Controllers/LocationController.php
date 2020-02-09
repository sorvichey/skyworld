<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class LocationController extends Controller
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
        $data['locations'] = DB::table('locations')
            ->where('active',1)
            ->orderBy('id', 'desc')
            ->paginate();
        return view('locations.index', $data);
    }
    public function create()
    {
        return view('locations.create');
    }
    public function save(Request $r)
    {
        
        $data = array(
            'name' => $r->name
        );
        $sms = "The new branch has been created successfully.";
        $sms1 = "Fail to create the new branch, please check again!";
        $i = DB::table('locations')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/location/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/location/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('locations')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/location');
    }
    public function edit($id)
    {
        $data['location'] = DB::table('locations')
            ->where('id',$id)->first();
        return view('locations.edit', $data);
    }
    
    public function update(Request $r)
    {
        $data = array(
            'name' => $r->name
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('locations')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/location/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/location/edit/'.$r->id);
        }
    }
}
