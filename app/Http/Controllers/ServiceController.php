<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['services'] = DB::table('services')
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->paginate(18);
        return view('services.index', $data);
    }
    public function create()
    {
        return view('services.create');
    }
    public function save(Request $r)
    {
        // if(!Right::check('Slide', 'i'))
        // {
        //     return view('permissions.no');
        // }
        
        $data = array(
            'title' => $r->title,
            'order' => $r->order,
            'short_description' => $r->short_description,
            'description' => $r->description,
        );
        if($r->icon) {
            $data['icon'] = $r->file('icon')->store('fronts/services/', 'custom');
        }
        $sms = "The new service has been created successfully.";
        $sms1 = "Fail to create the new service, please check again!";
        $i = DB::table('services')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/service/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/service/create')->withInput();
        }
    }
    public function delete(Request $r)
    {
        // if(!Right::check('Customer', 'd')){
        //     return view('permissions.no');
        // }
        DB::table('services')->where('id', $r->id)->update(['active'=>0]);
        $r->session()->flash('sms', 'Data has been deleted successfully!');
        return redirect('admin/service');
    }
    public function edit($id)
    {
        // if(!Right::check('Page', 'u')){
        //     return view('permissions.no');
        // }
        $data['service'] = DB::table('services')
            ->where('id', $id)
            ->first();  
        return view('services.edit', $data);
    }
    public function update(Request $r)
    {
        // if(!Right::check('Slide', 'u'))
        // {
        //     return view('permissions.no');
        // }
        $data = array(
            'title' => $r->title,
            'order' => $r->order,
            'short_description' => $r->short_description,
            'description' => $r->description,
        );
        if($r->icon) {
            $data['icon'] = $r->file('icon')->store('fronts/services/', 'custom');
        }
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('services')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/service/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/service/edit/'.$r->id);
        }
    }
    public function detail($id)
    {
        $data['service'] = DB::table('services')
            ->where('id', $id)
            ->first();
        return view('services.detail', $data);
    }
}
