<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\Refer;
use App\PointHistory;
class AdminController extends Controller
{
    private $user;
    public function __construct(User $user){
        $this->user=$user;
        $this->middleware(function($request,$next){
            $this->u=Auth::check();
            if($this->u==false){
                return redirect('/login');
            }
            else{
                $this->u=Auth::user();
                if($this->u->role ==1){
                    return $next($request);
                }
                else{
                    return redirect('/login');
                }
            }
        });
    }

    public function index(){
        return view('Admin.Pages.dashboard');
    }

    public function profile(){
        $user=Auth::user();
        return view('Admin.Pages.profile')->with('user',$user);
    }

    public function profileEdit($id){
        $u=$this->user->findOrFail($id);
        return view('Admin.Pages.profile_edit')->with('u',$u);
    }

    public function profileUpdate(){
        dd('profile updated');
    }

    public function manageUsers(){
        $users=$this->user->latest()->paginate(10);
        return view('Admin.Pages.manage_users')->with('users',$users);
    }

    public function givePoint($id){
        $user=$this->user->where('id',$id)->firstOrFail();
        return view('Admin.Pages.give_point')->with('user',$user);
    }

    public function giftPoint(Request $request,$id){
        $user=$this->user->where('id',$id)->firstOrFail();
        $user->point=$user->point + $request->point;
        $user->save();
        return redirect()->back()->with('success','Successfully send gifted');
    }

    public function addNote(Request $request,$id){
        $user=$this->user->where('id',$id)->firstOrFail();
        $user->note=$request->note;
        $user->save();
        return redirect()->back()->with('success','Successfully added note');
    }

    public function changePassword(Request $request,$id){
        $user=$this->user->where('id',$id)->firstOrFail();
        $user->password=$request->password;
        $user->save();
        return redirect()->back()->with('success','Successfully changed password');
    }

    public function changeEmail(Request $request,$id){
        $user=$this->user->where('id',$id)->firstOrFail();
        $user->email=$request->email;
        $user->save();
        return redirect()->back()->with('success','Successfully changed Email');
    }
    
    public function registerUser(){
        return view('Admin.Pages.register_user');
    }

    public function postRegisterUser(Request $request){
        $this->validate($request, [
            'username' => 'required|unique:users',
            'email' => 'email|unique:users',
            'password' => 'required|confirmed|min:6',
            // 'refer_id'=>'refer_id'|new Refer,
        ]);
        
        $user=new $this->user;
        $user->name=$request->username;
        $user->username=$request->username;
        $user->email=$request->email;
        $p=$request->password;
        $user->password=$request->password;
        $user->telegram=$request->telegram;
        $user->refer=mt_rand(10000,99999);
        $user->pin=mt_rand(100000,999999);
        $user->save();
        return redirect()->back()->with('success','Successfully registerd');
    }

    public function myWallet(){
        return view('Admin.Pages.my_wallet');
    }

    public function messages(){
        return view('Admin.Pages.message');
    }

    public function affilate(){
        return view('Admin.Pages.affilate');
    }
    public function anouncement(){
        return view('Admin.Pages.anouncement');
    }

    public function pointHistory($id){
        $points=PointHistory::where('user_id',$id)->latest()->paginate(10);
        return view('Admin.Pages.point_history')->with('points',$points);
    }

}
