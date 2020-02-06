<?php

namespace App\Http\Controllers;
use Auth;
use DB;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('auth'); 
    }
    public function index(){

        if(!Right::check('Role', 'l')){
            return view('permissions.no');
        }
        $data['roles'] = DB::table('roles')
                        ->where("active",1)
                        ->paginate(18);
        return view('roles.index',$data);
    }
    public function create(){
        if(!Right::check('Role', 'i')){
            return view('permissions.no');
        }
        return view('roles.create');
    }
    public function save(Request $r){

        if(!Right::check('Role', 'i')){
            return view('permissions.no');
        }
        $data = array(
            "name" => $r->name
        );
        $i = DB::table('roles')->insert($data);
        if($i){
            $r->session()->flash('sms' , 'New role has been created.');
            return redirect('role/create');
        }else {
            $r->session()->flash('sms1' , 'Can not create. Please check and try again');
            return redirect('role/create')->withInput();
        }
    }
    public function edit($id){
    	$data['roles'] = DB::table("roles")->where("id",$id)->first();
    	return view("roles.edit",$data);
    }
    public function update(Request $r){
        $data = array(
            "name" => $r->name
        );
        $i = DB::table("roles")->where("id", $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash("sms", "All changes have saved successfully!");
            return redirect("/role/edit/". $r->id);
        }
        else{
            $r->session()->flash("sms1", "Fail to save change. You may not make any change!");
            return redirect("/role/edit/". $r->id);
        }
    }
    public function delete($id)
    {
        DB::table('roles')->where('id', $id)->update(["active"=>0]);
        $page = @$_GET['page'];
        if ($page>0)
        {
            return redirect('/role?page='.$page);
        }
        return redirect('/role');
    }
}
