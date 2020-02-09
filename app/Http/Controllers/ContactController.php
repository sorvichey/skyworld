<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class ContactController extends Controller
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
        $data['contacts'] = DB::table('contacts')
            ->where('active',1)
            ->orderBy('id', 'desc')
            ->paginate();
        return view('contacts.index', $data);
    }
    public function create()
    {
        return view('contacts.create');
    }
    public function save(Request $r)
    {
        
        $data = array(
            'address' => $r->address,
            'tel1' => $r->tel1,
            'tel2' => $r->tel2,
            'email1' => $r->email1,
            'email2' => $r->email2
        );
        $sms = "The new branch has been created successfully.";
        $sms1 = "Fail to create the new branch, please check again!";
        $i = DB::table('contacts')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/contact/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/contact/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('contacts')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/contact');
    }
    public function edit($id)
    {
        $data['contact'] = DB::table('contacts')
            ->where('id',$id)->first();
        return view('contacts.edit', $data);
    }
    
    public function update(Request $r)
    {
        $data = array(
            'address' => $r->address,
            'tel1' => $r->tel1,
            'tel2' => $r->tel2,
            'email1' => $r->email1,
            'email2' => $r->email2
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('contacts')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/contact/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/contact/edit/'.$r->id);
        }
    }
}
