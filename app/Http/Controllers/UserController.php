<?php

namespace App\Http\Controllers;
use Auth;
use DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public  function index()
    {
        if(!Right::check('User', 'l')){
            return view('permissions.no');
        }
        $data['users'] = DB::table('users')
            ->join("roles", "users.role_id","=", "roles.id")
            ->select("users.*", "roles.name as role_name")
            ->paginate(18);
        return view("users.index", $data);
    }
    public function create(){
        if(!Right::check('User', 'i')){
            return view('permissions.no');
        }
        $data['roles'] = DB::table('roles')->where('active', 1)->get();
        return view('users.create',$data);
    }

    public function save(Request $r)
    {
        if(!Right::check('User', 'i')){
            return view('permissions.no');
        }

        
		/* check if email already exist */
        $checkSql = DB::table('users')->where('email', $r->email)->exists();
        if($checkSql){
            $r->session()->flash('sms1' , 'Can not create. Email already exists');
            return redirect('/user/create');
        }
        $data = array(
            'name' => $r->name,
            'email' => $r->email,
            'password' => bcrypt($r->password),
            'role_id' => $r->role_id
        );
        if($r->photo)
        {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'upload/users/'; // usually in public folder
            $file->move($destinationPath, $file_name);
            $data['photo'] = $file_name;
        }
			$i = DB::table('users')->insert($data);
        if ($i)
        {
            $r->session()->flash('sms' , 'New user has been created.');
            return redirect('/user/create');
        }
        else
        {
            $r->session()->flash('sms1' , 'Can not create. Please check and try again');
            return redirect('/user/create');
        }
    }
	public function edit($id)
    {
        if(!Right::check('User', 'u')){
            return view('permissions.no');
        }
        $data['roles'] = DB::table('roles')->get();
		$data['users'] = DB::table("users")->where("id", $id)->first();
        return view("users.edit", $data);
    }
	public function update(Request $r)
    {
        if(!Right::check('User', 'u')){
            return view('permissions.no');
        }
        $file_name = $r->old_photo;
        if($r->photo)
        {
            $file = $r->file('photo');
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'upload/users/'; // usually in public folder
            $file->move($destinationPath, $file_name);
        }
		/* check if email already exist */
			$checkSql = DB::table('users')
						->where('email',  $r->email)
						->where('id', '<>' , $r->id)
						->exists();
			if($checkSql){
				$r->session()->flash('sms1' , 'Can not update. Email already exists');
				return redirect('/user/edit/'.$r->id);
			}
			if($r->password){
				$data = array(
					'name' => $r->name,
					'email' => $r->email,
					'password' => bcrypt($r->password),
					'photo' => $file_name,
					'role_id' => $r->role_id
				);
			}else {
				$data = array(
				'name' => $r->name,
				'email' => $r->email,
				'photo' => $file_name,
				'role_id' => $r->role_id
				);
			}
			$i = DB::table('users')->where("id", $r->id)->update($data);
        if($i)
        {
            $r->session()->flash('sms' , 'User have been updated.');
            return redirect('/user/edit/'.$r->id);
        }
        else
        {
            $r->session()->flash('sms1' , 'Can not update. Please check and try again');
            return redirect('/user/edit/'.$r->id);
        }
    }
    public function delete($id)
    {
        if(!Right::check('User', 'd')){
            return view('permissions.no');
        }
        DB::table('users')->where('id', $id)->delete();
        return redirect('user');
    }
}
