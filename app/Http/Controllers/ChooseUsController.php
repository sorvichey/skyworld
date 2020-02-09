<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class ChooseUsController extends Controller
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
        $data['choose_us'] = DB::table('choose_us')
            ->where('active',1)
            ->orderBy('id', 'desc')
            ->paginate();
        return view('choose_us.index', $data);
    }
    public function create()
    {
        return view('choose_us.create');
    }
    public function save(Request $r)
    {
        
        $data = array(
            'description' => $r->description
        );
        if($r->featured_image) {
            $data['featured_image'] = $r->file('featured_image')->store('fronts/choose_us/', 'custom');
        }
        $sms = "The new branch has been created successfully.";
        $sms1 = "Fail to create the new branch, please check again!";
        $i = DB::table('choose_us')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/choose_us/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/choose_us/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('choose_us')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/choose_us');
    }
    public function edit($id)
    {
        $data['choose_us'] = DB::table('choose_us')
            ->where('id',$id)->first();
        return view('choose_us.edit', $data);
    }
    
    public function update(Request $r)
    {
        $data = array(
            'description' => $r->description,
        );
        if($r->featured_image) {
            $data['featured_image'] = $r->file('featured_image')->store('fronts/choose_us/', 'custom');
        }
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('choose_us')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/choose_us/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/choose_us/edit/'.$r->id);
        }
    }
}
