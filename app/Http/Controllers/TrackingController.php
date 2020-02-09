<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class TrackingController extends Controller
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
        $data['trackings'] = DB::table('trackings')
            ->join('origins', 'origins.id', 'trackings.origin')
            ->join('destinations', 'destinations.id', 'trackings.destination')
            ->join('statuss', 'statuss.id', 'trackings.status')
            ->where('trackings.active',1)
            ->select('trackings.*', 'origins.name as oname', 'destinations.name as dname', 'statuss.name as sname')
            ->paginate();
        return view('trackings.index', $data);
    }
    public function create()
    {
        $data['ori'] = DB::table('origins')
            ->where('active', 1)
            ->get();
        $data['des'] = DB::table('destinations')
            ->where('active', 1)
            ->get();
        $data['sta'] = DB::table('statuss')
            ->where('active', 1)
            ->get();
        return view('trackings.create', $data);
    }
    public function save(Request $r)
    {
        
        $data = array(
            'waybill' => $r->waybill,
            'origin' => $r->origin,
            'destination' => $r->destination,
            'status' => $r->status,
            'pcs' => $r->pcs,
            'datetime' => $r->datetime,
            'receiver' => $r->receiver,
            'time' => $r->time
        );
        $sms = "The new branch has been created successfully.";
        $sms1 = "Fail to create the new branch, please check again!";
        $i = DB::table('trackings')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/tracking/create');
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/tracking/create')->withInput();
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('trackings')->where('id', $id)->update(['active'=>0]);
        return redirect('/admin/tracking');
    }

    public function edit($id)
    {
        $data['tracking'] = DB::table('trackings')
            ->where('id',$id)->first();
        $data['ori'] = DB::table('origins')
            ->where('active', 1)
            ->get();
        $data['des'] = DB::table('destinations')
            ->where('active', 1)
            ->get();
        $data['sta'] = DB::table('statuss')
            ->where('active', 1)
            ->get();
        return view('trackings.edit', $data);
    }
    
    public function update(Request $r)
    {
        $data = array(
            'waybill' => $r->waybill,
            'origin' => $r->origin,
            'destination' => $r->destination,
            'status' => $r->status,
            'pcs' => $r->pcs,
            'datetime' => $r->datetime,
            'receiver' => $r->receiver,
            'time' => $r->time
        );
        $sms = "All changes have been saved successfully.";
        $sms1 = "Fail to to save changes, please check again!";
        $i = DB::table('trackings')->where('id', $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash('sms', $sms);
            return redirect('/admin/tracking/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1', $sms1);
            return redirect('/admin/tracking/edit/'.$r->id);
        }
    }
    public function detail($id)
    {
        $data['tracking'] = DB::table('trackings')
            ->join('origins', 'origins.id', 'trackings.origin')
            ->join('destinations', 'destinations.id', 'trackings.destination')
            ->join('statuss', 'statuss.id', 'trackings.status')
            ->where('trackings.active',1)
            ->select('trackings.*', 'origins.name as oname', 'destinations.name as dname', 'statuss.name as sname')
            ->first();
        return view('trackings.detail', $data);
    }
}
