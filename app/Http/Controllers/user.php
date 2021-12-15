<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use App\Models\Register;
use Illuminate\Support\Facades\Hash;

class user extends Controller
{
    public function register(){
      return view('admin.register');
    }
    public function postRegister(Request $req){
        $validateReg=$req->validate([
            'name'=>'required|min:2|max:50',
            'email'=>'required|email',
            'password'=>'required|min:5|max:25',
            'mobileNo'=>'required|integer|min:10',
            'address'=>'required',
        ]);
        if($validateReg){
            $name=$req->name;
            $email=$req->email;
            $pass=Hash::make($req->password);
            $mobileno=$req->mobileNo;
            $address=$req->address;

            $user=new Register();
            $user->name=$name;
            $user->email=$email;
            $user->password=$pass;
            $user->mobileno=$mobileno;
            $user->address=$address;
            if($user->save())
            {
            return back()->with('user_registered',"User registered Successfully");
            }
            else{
                return back()->with('error',"Something went wrong!!");
            }
        }
    }
    public function login(){
        return view('admin.login');
    }
    public function postLogin(Request $req){
        $validatedata=$req->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        if($validatedata){
            $email = $req->email;
            $user = Register::where('email', $email)->first();
            if(!$user){
                return back()->with('error', "User doesn't exist");
            }
            else{
                if(Hash::check($req->password,$user->password)){
                    //Session(['uname'=> $user->uname]);
                    $req->session()->put('user',$user);
                    // return back()->with('success','Login successfull');
                    return redirect('admin/menu');
                }
                else{
                    return back()->with('error', 'Login error');
                }

            }
        }

    } 
    public function editProfile(){
        $prof=session('user');
        $id=$prof->id;
        $profile=Register::where('id',$id)->first();
        return view('admin.pages.editProfile',['profile'=>$profile]);
    }
    public function updateProfile(Request $req){
        $data=$req->validate([
            'name'=>'required|min:2|max:50',
            'email'=>'required|email',
            'mobileNo'=>'required|integer|min:10',
            'address'=>'required',
        ]);
        if($data){
            $id=$req->hidden;
            $name=$req->name;
            $email=$req->email;
            $mobileno=$req->mobileNo;
            $address=$req->address;
            $user=Register::whereId($id)->update([
                'email' => $email,
                'name' => $name, 
                'mobileno' => $mobileno,
                'address' => $address, 
            ]);
            return redirect('admin/profile');
        }
    }
    public function profile(){
        $profile = session()->get('user');
        $id=$profile->id;
        $details=Register::where('id',$id)->get();
        return view('admin.pages.profile',['details'=>$details]);
    }
    public function logout(){
        session()->forget('user');
        return redirect("login");
    }
}
